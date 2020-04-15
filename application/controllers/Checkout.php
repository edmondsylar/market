<?php
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Customer;
defined('BASEPATH') OR exit('No direct script access allowed');
class Checkout extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        if($this->global_pref->siteMaintenance())
        {
            redirect('maintenance-mode');
            exit();
        }
        $this->session->keep_flashdata('order_done_comp');
        if($this->session->userdata('cusLogged')) {
            $status_stage = $this->session->userdata('cus_status');
            $cus_username = $this->session->userdata('cus_username');

            if($status_stage != 1) {
                redirect('blocked-status');
            }
        }else {
            redirect('authentication');
        }
    }

    public function shop_checkout()
    {
        if($this->uri->segment(2)) {
            $url = $this->uri->segment(2);
            $uid = $this->session->userdata('cus_id');
            $view['cus_user'] = $this->session->userdata('cus_username');
            $mine = $view['cus_user'];
            //shoping carts
            if($this->session->userdata('cus_id')) {
                $uid = $this->session->userdata('cus_id');
                $view['carts'] = $this->Customer_account_model->loadCarts($uid);
            }else {
                $view['carts'] = NULL;
            }
            $view['cus_pages'] = $this->Pages_model->list_pages();
            $view['wishlist_stat'] = $this->Customer_wishlist_model->getStat($uid);
            $view['profile_info'] = $this->Customer_account_model->profileInfo($mine);
            $view['load_sliders'] = $this->Product_advert_slider_model->load();
            $view['home_featured_products'] = $this->Product_model->home_featured_list();
            $view['fresh_products'] = $this->Product_model->home_list();
            $view['home_main_cats'] = $this->Main_category_model->home_cat();
            $view['home_sub_cats'] = $this->Sub_categories_model->home_cat();
            $view['website_info'] = $this->Pref_settings_model->pref_settings_values();
            $view['shopping_tax'] = $this->Product_model->getTax();
            $view['paypal'] = $this->Payment_gateways_model->paypal();
            $view['my_stripe'] = $this->Payment_gateways_model->stripe();
            $view['my_paystack'] = $this->Payment_gateways_model->paystack();
            switch ($url) {
                case 'shipping-address':
                if($this->session->userdata('cartReady')) {
                    $view['get_checkout_address_info'] = $this->Customer_account_model->getAddressCheckout($uid);
                    $view['shipping_address_view'] = 'main/checkout/shipping-address';
                    $this->load->view('sections/main/checkout/shipping-address', $view);
                }else {
                    redirect('shopping-cart');
                }
                    break;
                case 'payment':
                if($this->session->userdata('readyToPay')) {
                    $view['get_checkout_address_info'] = $this->Customer_account_model->getAddressCheckout($uid);
                    $view['payment_method_view'] = 'main/checkout/payment-method';
                    $this->load->view('sections/main/checkout/payment-method', $view);
                }else {
                    redirect('404');
                }
                break;
                case 'complete':
                if($this->session->userdata('readyToComplete')) {
                    $view['get_checkout_address_info'] = $this->Customer_account_model->getAddressCheckout($uid);
                    $view['complete_view'] = 'main/checkout/complete';
                    $this->load->view('sections/main/checkout/complete', $view);
                }else {
                    redirect('404');
                }
                    break;
                case 'confirmation':
                if($this->session->userdata('orderNumberSet')) {
                    $view['orderId'] = $this->session->userdata('orderNumberSet');
                    $rid = $view['orderId'];
                    if($this->Customer_order_model->confirmPayment($rid)) {
                        $this->session->unset_userdata('orderNumberSet');
                        $view['complete_order_view'] = 'main/checkout/complete-thanks';
                        $this->load->view('sections/main/checkout/complete-thanks', $view);
                    }else {
                        redirect(404);
                    }
                }else {
                    redirect('/');
                }
                    break;
                default:
                redirect('404');
            }
        }else {
            $this->load->view('errors/custorm/404');
        }
    }

    public function checkout_current_cat()
    {
        //shoping carts
        if($this->session->userdata('cus_id')) {
            $uid = $this->session->userdata('cus_id');
            $view['carts'] = $this->Customer_account_model->loadCarts($uid);
        }else {
            $view['carts'] = NULL;
        }
        $view['pages'] = $this->Pages_model->list_pages();
        $view['website_info'] = $this->Pref_settings_model->pref_settings_values();
        $this->load->view('sections/main/inc/checkout-current-cart', $view);
    }

    public function prepare()
    {
        if($this->session->userdata('cusLogged')) {
            $uid = $this->session->userdata('cus_id');
            $carts = $this->Customer_account_model->loadCarts($uid);
            if($carts) {
                $amts = 0;
                foreach($carts as $cart) {
                    $get_names[] = $cart->product_name;
                    $amt = $cart->shop_cart_quantity * $cart->product_price;
                    $amts+= $amt;
                }
                // echo implode(", ", $get_names).'<br>';
                // echo $amts;
                $cart_product_info = array(
                    'cart_descrip' => 'Puchasing ' . implode(", ", $get_names),
                    'cart_subtotal' => $amts,
                    'cart_customer_id' => $uid,
                    'cartReady' => TRUE
                );

                $this->session->set_userdata($cart_product_info);
                redirect('shop-checkout/shipping-address');
            } else {
                redirect('404');
            }
        }
    }

    public function generate_order()
    {
        if($this->session->userdata('cartReady')) {
            $uid = $this->session->userdata('cus_id');
            $this->form_validation->set_rules('order_shipping_company', 'Company', 'trim|xss_clean|strip_tags');
            $this->form_validation->set_rules('order_shipping_zip_code', 'Zip Code', 'trim|xss_clean|strip_tags');
            $this->form_validation->set_rules('order_shipping_address_1', 'Address1', 'trim|strip_tags|xss_clean');
            $this->form_validation->set_rules('order_shipping_address_2', 'Address2', 'trim|xss_clean|strip_tags');
            
            if ($this->form_validation->run() == FALSE) {
                redirect('/');
            } else {
                $tax = $this->Product_model->getTax();
                $rand = strtoupper(substr(uniqid(sha1(time())), 0, 9));
                $order_number = $uid . $rand;
                
                $order = array(
                    'order_account_id' => $uid,
                    'order_number' => $order_number,
                    'order_description' => $this->session->userdata('cart_descrip'),
                    'order_total_amount' => $this->session->userdata('cart_subtotal') + $tax->shop_tax,
                    'order_day' => date('d'),
                    'order_month' => date('F'),
                    'order_year' => date('Y')
                );

                if($this->Checkout_model->createOrdersTable($order)) {
                    //let now create the shipping address
                    $order_info_id = $this->Checkout_model->getLastOrderId($order_number);

                    $ship = array(
                        'order_info_id' => $order_info_id,
                        'order_shipping_company' => $this->input->post('order_shipping_company'),
                        'order_shipping_country' => $this->input->post('order_shipping_country'),
                        'order_shipping_state' => $this->input->post('order_shipping_state'),
                        'order_shipping_zip_code' => $this->input->post('order_shipping_zip_code'),
                        'order_shipping_address_1' => $this->input->post('order_shipping_address_1'),
                        'order_shipping_address_2' => $this->input->post('order_shipping_address_2')
                    );

                    if($this->Checkout_model->createOrderShipping($ship)) {
                        //let genrate the order bundle
                        $carts = $this->Customer_account_model->loadCarts($uid);
                        foreach($carts as $cart) {
                            $do_cart = array(
                                'cob_account_id' => $uid,
                                'cob_order_number' => $order_number,
                                'cob_product_id' => $cart->product_id,
                                'cob_qty' => $cart->shop_cart_quantity,
                                'cob_color' => $cart->shop_cart_color
                            );
                            $this->Checkout_model->createCob($do_cart);

                        }

                        //let clear up the customer carts
                        $paymentPace = array(
                            'orderNumberSet' => $order_number,
                            'readyToPay' => TRUE
                        );
                        $this->Product_model->emptyCustomerCart($uid);
                        $this->session->set_userdata($paymentPace);
                        redirect('shop-checkout/payment');
                    }
                }
            }
            
        }
    }

    public function pay($order)
    {
        //Let confirm if the number is valid
        if($this->Customer_order_model->checkOrderNum($order)) {

            $paymentPace = array(
                'orderNumberSet' => $order,
                'readyToPay' => TRUE
            );

            $this->session->set_userdata($paymentPace);
            redirect('shop-checkout/payment');
        }else {
            redirect('404');
        }
    }

    public function payment_method_set()
    {
        $payment_meth = $this->input->post('payment');
        switch ($payment_meth) {
            case 'paypal':
            //let grab the order infomations
            $my_paypal = $this->Payment_gateways_model->paypal();
            $uid = $this->session->userdata('cus_id');
            $order_number = $this->session->userdata('orderNumberSet');
            $find_currency = $this->Pref_settings_model->pref_settings_values();
            if($pay_for_order = $this->Customer_order_model->getOrderInfo($order_number, $uid)) {

                $business = $my_paypal->pg_bussiness_email;
                $item_name = $pay_for_order->order_description;
                $item_number = $pay_for_order->order_number;
                $amount = $pay_for_order->order_total_amount;
                $currency_code = strtoupper($find_currency->website_currency);
                $secure = bin2hex($key = $this->encryption->create_key(16));
                if($this->Customer_order_model->createCode($secure, $item_number, $uid)) {
                    redirect('https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business='.$business.'&item_name=' . $item_name . '&item_number='. $item_number . '&amount=' . $amount . '&currency_code='.$currency_code.'&cancel_return='.base_url() .'checkout/payment_error&return='.base_url() .'checkout/checkout_payment_cool/'.$order_number.'/'.$uid.'/'.$payment_meth.'/'.$secure);
                }

            } 
                break;
            case 'stripe':
                require_once('vendor/autoload.php');
                //let grab the order infomations
                $uid = $this->session->userdata('cus_id');
                $secure = bin2hex($key = $this->encryption->create_key(16));
                $order_number = $this->session->userdata('orderNumberSet');
                $paying = $this->Customer_order_model->getOrderInfo($order_number, $uid);
                $item_number = $paying->order_number;
                if($this->Customer_order_model->createCode($secure, $item_number, $uid)) {
                
                    $secur = array(
                        'key' => $secure
                    );
                    
                    $this->session->set_userdata($secur);
                    
                    if($pay_for_order = $this->Customer_order_model->getOrderInfo($order_number, $uid)) {
                        $business = 'seunex@zubdev.net';
                        $view = array(
                            'item_name' => $pay_for_order->order_description,
                            'item_number' => $pay_for_order->order_number,
                            'amount' => $pay_for_order->order_total_amount,
                            'currency' => 'USD'
                        );
                        $view['my_stripe'] = $this->Payment_gateways_model->stripe();
                        $view['website_info'] = $this->Pref_settings_model->pref_settings_values();
                        $this->load->view('main/stripe', $view);
                    }
                }else {
                    exit('Something went wrong');
                }
                break;

            case 'paystack':
                require ('vendor/paystack/src/autoload.php');
                $uid = $this->session->userdata('cus_id');
                $order_number = $this->session->userdata('orderNumberSet');
                $email = $this->Customer_account_model->getUserEmail($uid);
                $reference = mt_rand(000000, 999999) . '_' . $order_number;
                $secure = $reference;
                $find_currency = $this->Pref_settings_model->pref_settings_values();

                $paying = $this->Customer_order_model->getOrderInfo($order_number, $uid);
                $item_number = $paying->order_number;

                if($this->Customer_order_model->createCode($secure, $item_number, $uid)) {
                
                    $secur = array(
                        'key' => $secure
                    );
                    
                    $this->session->set_userdata($secur);
                    $my_paystack = $this->Payment_gateways_model->paystack();

                    if($pay_for_order = $this->Customer_order_model->getOrderInfo($order_number, $uid)) {
        
                        $paystack = new Yabacon\Paystack($my_paystack->ps_secret_key);
                        try
                        {
                        $tranx = $paystack->transaction->initialize([
                            'amount'=>$pay_for_order->order_total_amount . '00',       // in kobo
                            'email'=>$email,         // unique to customers
                            'reference'=>$reference, // unique to transactions
                            'currency' => $find_currency->website_currency,
                        ]);
                        
                        } catch(\Yabacon\Paystack\Exception\ApiException $e){
                        print_r($e->getResponseObject());
                        die($e->getMessage());
                        }
                
                        header('Location: ' . $tranx->data->authorization_url);
                        }
                    }else {
                        exit('Something went wrong');
                    }
                break;
            
            default:
                redirect(404);
                break;
        }
    }

    public function payment_error()
    {
        echo "payment error";
    }

    public function checkout_payment_cool($rder, $uid, $payment_meth, $secure)
    {
        if($this->Customer_order_model->verifyPayThrough($secure)) {
            $this->Customer_order_model->updateSecureD($secure, $rder);
            $pay = array(
                'inp_order_number' => $order_number = $this->session->userdata('orderNumberSet'),
                'inp_method' => $payment_meth,
                'inp_day' => date('d'),
                'inp_month' => date('M'),
                'inp_year' => date('Y')
            );

            if($this->Customer_order_model->createIncomePayment($pay)) {
                $comp = array(
                    'readyToComplete' =>TRUE
                );
                
                $this->session->set_userdata($comp);

                $order_pay_id = $pay['inp_order_number'];
                $uid = $uid;

                if($this->Customer_order_model->setPaying($order_pay_id, $uid)) {

                    //let send verification code via email

                    $send_to = $this->Customer_account_model->sendOrderTo($uid);
                    
                    $site_info = $this->Pref_settings_model->pref_settings_values();

                    $view['site_info'] = $this->Pref_settings_model->pref_settings_values();
                    $order_no = $pay['inp_order_number'];
                    $view['p_order'] = $this->Customer_order_model->searchOrderPaid($order_no);
                    $view['p_bundles'] = $this->Customer_order_model->PaidBundles();
                    $view['tax'] = $this->Product_model->getTax();
 
                     $messages = $this->load->view('mailers/order_paid/send', $view, true);
 
                     $email_set = $this->Smtp_settings_model->get();
                     if($email_set->smtp_type == 'ssl') {
                         $config['protocol']  = 'smtp';
                         $config['smtp_host'] = $email_set->smtp_type . '://' . $email_set->smtp_host;
                         $config['smtp_port'] = $email_set->smtp_port;
                         $config{'smtp_user'} = $email_set->smtp_username;
                         $config{'smtp_pass'} = $email_set->smtp_password;
                         $config['mailtype']  = 'html';
                         $config['charset']   = 'utf-8';
                         $config['newline'] = '\n';
                     } else {
                         $config['protocol']  = 'smtp';
                         $config['smtp_host'] = $email_set->smtp_host;
                         $config['smtp_port'] = $email_set->smtp_port;
                         $config{'smtp_user'} = $email_set->smtp_username;
                         $config{'smtp_pass'} = $email_set->smtp_password;
                         $config['mailtype']  = 'html';
                         $config['charset']   = 'utf-8';
                         $config['newline'] = '\n';
                     }
 
                     $this->email->initialize($config);
                     $this->email->set_mailtype("html");
                     $this->email->set_newline("\r\n");
                     $this->email->from($email_set->smtp_default_email, $email_set->smtp_display_name);
                     $this->email->to($send_to->ca_email);
                     $this->email->subject('Receipt For Your Order From '.$site_info->website_name);
                     $this->email->message($messages);
                     $this->email->send();



                
                    redirect('shop-checkout/complete');
                } else {
                    redirect('checkout/payment_error');
                }
            } else {
                redirect('checkout/payment_error');
            }
        }else {
            echo "Forbiden";
        }
    }

    public function order_comp()
    {
        
        $this->session->unset_userdata('cart_descrip');
        $this->session->unset_userdata('cart_subtotal');
        $this->session->unset_userdata('cart_customer_id');
        $this->session->unset_userdata('cartReady');
        $this->session->unset_userdata('readyToPay');
        $this->session->unset_userdata('readyToPay');
        $this->session->unset_userdata('readyToComplete');

        redirect('shop-checkout/confirmation');
        
    }

    //for stripe payment
    public function strip_pay_process($order, $uid, $secure)
    {
        $my_stripe = $this->Payment_gateways_model->stripe();
        $uid = $this->session->userdata('cus_id');
        $order_number = $this->session->userdata('orderNumberSet');
        require_once('vendor/autoload.php');

        if($this->Customer_order_model->verifyPayThrough($secure)) {
            $this->Customer_order_model->updateSecureD($secure, $order);

            if(!empty($_POST['stripeToken']))
            {
                \Stripe\Stripe::setApiKey($my_stripe->sg_secret_key);

                // Token submitted by the plan form:
                $stripetoken = $_POST['stripeToken'];

                // Charge the user card:
                $pay_for_order = $this->Customer_order_model->getOrderInfo($order_number, $uid);
                $site_info = $this->Pref_settings_model->pref_settings_values();
                $view = array(
                    'item_name' => $pay_for_order->order_description,
                    'item_number' => $pay_for_order->order_number,
                    'amount' => $pay_for_order->order_total_amount,
                    'currency' => $site_info->website_currency
                );
                $charge = \Stripe\Charge::create(array(
                "amount" => $view['amount'].'00',
                "currency" => $view['currency'],
                "description" => $view['item_name'],
                "source" => $stripetoken,
                "metadata" => array("purchase_order_id" => "SKA123456") // Custom parameter
                ));
                $chargeJson = json_decode($charge);

                if($chargeJson['amount_refunded'] == 0) 
                {
                    $pay = array(
                        'inp_order_number' => $order_number = $this->session->userdata('orderNumberSet'),
                        'inp_method' => 'stripe',
                        'inp_day' => date('d'),
                        'inp_month' => date('M'),
                        'inp_year' => date('Y')
                    );
                    if($this->Customer_order_model->createIncomePayment($pay)) {
                        $comp = array(
                            'readyToComplete' =>TRUE
                        );
                        $this->session->set_userdata($comp);

                        $order_pay_id = $pay['inp_order_number'];
                        $uid = $uid;

                        if($this->Customer_order_model->setPaying($order_pay_id, $uid)) {

                            //let send verification code via email
        
                            $send_to = $this->Customer_account_model->sendOrderTo($uid);
                            
                            $site_info = $this->Pref_settings_model->pref_settings_values();
        
                            $view['site_info'] = $this->Pref_settings_model->pref_settings_values();
                            $order_no = $pay['inp_order_number'];
                            $view['p_order'] = $this->Customer_order_model->searchOrderPaid($order_no);
                            $view['p_bundles'] = $this->Customer_order_model->PaidBundles();
                            $view['tax'] = $this->Product_model->getTax();
         
                             $messages = $this->load->view('mailers/order_paid/send', $view, true);
         
                             $email_set = $this->Smtp_settings_model->get();
                             if($email_set->smtp_type == 'ssl') {
                                 $config['protocol']  = 'smtp';
                                 $config['smtp_host'] = $email_set->smtp_type . '://' . $email_set->smtp_host;
                                 $config['smtp_port'] = $email_set->smtp_port;
                                 $config{'smtp_user'} = $email_set->smtp_username;
                                 $config{'smtp_pass'} = $email_set->smtp_password;
                                 $config['mailtype']  = 'html';
                                 $config['charset']   = 'utf-8';
                                 $config['newline'] = '\n';
                             } else {
                                 $config['protocol']  = 'smtp';
                                 $config['smtp_host'] = $email_set->smtp_host;
                                 $config['smtp_port'] = $email_set->smtp_port;
                                 $config{'smtp_user'} = $email_set->smtp_username;
                                 $config{'smtp_pass'} = $email_set->smtp_password;
                                 $config['mailtype']  = 'html';
                                 $config['charset']   = 'utf-8';
                                 $config['newline'] = '\n';
                             }
         
                             $this->email->initialize($config);
                             $this->email->set_mailtype("html");
                             $this->email->set_newline("\r\n");
                             $this->email->from($email_set->smtp_default_email, $email_set->smtp_display_name);
                             $this->email->to($send_to->ca_email);
                             $this->email->subject('Receipt For Your Order From '.$site_info->website_name);
                             $this->email->message($messages);
                             $this->email->send();
        
        
        
                        
                            redirect('shop-checkout/complete');
                        } else {
                            redirect('checkout/payment_error');
                        }
                    }
                    else
                    {
                        echo "Not Good";
                    }
                }
                else
                {
                    echo "Transaction has been failed";
                }
            }
            else
            {
                echo "Transaction has been failed Token Emp";
            }
        }
        else
        {
            echo "Not allowed";
        }
    }

    public function paystack()
    {
        require ('vendor/paystack/src/autoload.php');
        $secure = $_GET['reference'];
        $uid = $this->session->userdata('cus_id');
        $order_number = $this->session->userdata('orderNumberSet');

        if($this->Customer_order_model->verifyPayThrough($secure)) {
            $this->Customer_order_model->updateSecureD($secure, $order_number);

            $reference = isset($_GET['reference']) ? $_GET['reference'] : '';
            if(!$reference){
            die('Something went wrong');
            }

            // initiate the Library's Paystack Object
            $my_paystack = $this->Payment_gateways_model->paystack();
            $paystack = new Yabacon\Paystack($my_paystack->ps_secret_key);
            try
            {
            // verify using the library
            $tranx = $paystack->transaction->verify([
                'reference'=>$reference, // unique to transactions
            ]);
            } catch(\Yabacon\Paystack\Exception\ApiException $e){
            print_r($e->getResponseObject());
            die($e->getMessage());
            }

            if ('success' === $tranx->data->status) {
            
                $pay = array(
                    'inp_order_number' => $order_number = $this->session->userdata('orderNumberSet'),
                    'inp_method' => 'paystack',
                    'inp_day' => date('d'),
                    'inp_month' => date('M'),
                    'inp_year' => date('Y')
                );
                if($this->Customer_order_model->createIncomePayment($pay)) {
                    $comp = array(
                        'readyToComplete' =>TRUE
                    );
                    $this->session->set_userdata($comp);

                    $order_pay_id = $pay['inp_order_number'];
                    $uid = $uid;

                    if($this->Customer_order_model->setPaying($order_pay_id, $uid)) {

                        //let send verification code via email
    
                        $send_to = $this->Customer_account_model->sendOrderTo($uid);
                        
                        $site_info = $this->Pref_settings_model->pref_settings_values();
    
                        $view['site_info'] = $this->Pref_settings_model->pref_settings_values();
                        $order_no = $pay['inp_order_number'];
                        $view['p_order'] = $this->Customer_order_model->searchOrderPaid($order_no);
                        $view['p_bundles'] = $this->Customer_order_model->PaidBundles();
                        $view['tax'] = $this->Product_model->getTax();
     
                         $messages = $this->load->view('mailers/order_paid/send', $view, true);
     
                         $email_set = $this->Smtp_settings_model->get();
                         if($email_set->smtp_type == 'ssl') {
                             $config['protocol']  = 'smtp';
                             $config['smtp_host'] = $email_set->smtp_type . '://' . $email_set->smtp_host;
                             $config['smtp_port'] = $email_set->smtp_port;
                             $config{'smtp_user'} = $email_set->smtp_username;
                             $config{'smtp_pass'} = $email_set->smtp_password;
                             $config['mailtype']  = 'html';
                             $config['charset']   = 'utf-8';
                             $config['newline'] = '\n';
                         } else {
                             $config['protocol']  = 'smtp';
                             $config['smtp_host'] = $email_set->smtp_host;
                             $config['smtp_port'] = $email_set->smtp_port;
                             $config{'smtp_user'} = $email_set->smtp_username;
                             $config{'smtp_pass'} = $email_set->smtp_password;
                             $config['mailtype']  = 'html';
                             $config['charset']   = 'utf-8';
                             $config['newline'] = '\n';
                         }
     
                         $this->email->initialize($config);
                         $this->email->set_mailtype("html");
                         $this->email->set_newline("\r\n");
                         $this->email->from($email_set->smtp_default_email, $email_set->smtp_display_name);
                         $this->email->to($send_to->ca_email);
                         $this->email->subject('Receipt For Your Order From '.$site_info->website_name);
                         $this->email->message($messages);
                         $this->email->send();
    
    
    
                    
                        redirect('shop-checkout/complete');
                    } else {
                        redirect('checkout/payment_error');
                    }
                }
                else
                {
                    echo "Not Good";
                }

            }
        }
    }
}