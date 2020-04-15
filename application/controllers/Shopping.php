<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Shopping extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        if($this->global_pref->siteMaintenance())
        {
            redirect('maintenance-mode');
            exit();
        }
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

    public function shopping_cart()
    {
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
        $view['my_carts'] = $this->Customer_account_model->loadCarts($uid);
        $view['cus_pages'] = $this->Pages_model->list_pages();
        $view['wishlist_stat'] = $this->Customer_wishlist_model->getStat($uid);
        $view['profile_info'] = $this->Customer_account_model->profileInfo($mine);
        $view['load_sliders'] = $this->Product_advert_slider_model->load();
        $view['home_featured_products'] = $this->Product_model->home_featured_list();
        $view['fresh_products'] = $this->Product_model->home_list();
        $view['home_main_cats'] = $this->Main_category_model->home_cat();
        $view['home_sub_cats'] = $this->Sub_categories_model->home_cat();
        $view['website_info'] = $this->Pref_settings_model->pref_settings_values();
        $view['shopping_cart_view'] = 'main/cart/shopping-cart';
        $this->load->view('sections/main/cart/shopping-cart', $view);
    }

    public function update_qty($id)
    {
        $uid = $this->session->userdata('cus_id');
        $data = array(
            'shop_cart_quantity' => $this->input->post('qty')
        );
        if($this->Product_model->updateQty($id, $uid, $data)) {
            redirect('shopping-cart');
        }
    }

    public function chnage_cart_color($id)
    {
        $uid = $this->session->userdata('cus_id');
        $data = array(
            'shop_cart_color' => $this->input->post('cart_color')
        );
        if($this->Product_model->updateColor($id, $uid, $data)) {
            redirect('shopping-cart');
        }
    }

    public function remove_from_cart($id)
    {
        $uid = $this->session->userdata('cus_id');
        if($this->Product_model->removeCart($id, $uid)) {
            return TRUE;
        }
    }

    public function empty_cart()
    {
        $uid = $this->session->userdata('cus_id');
        if($uid == $this->input->post('mine')) {
            if($this->Product_model->emptyCustomerCart($uid)) {
                redirect('shopping-cart');
            }
        }else {
            redirect('shopping-cart');
        }
    }

}