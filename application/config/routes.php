<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['shop-category'] = 'home/category';
$route['shop-category/(:num)'] = 'home/category/$1';
$route['shop-category/(:any)'] = 'home/product_category/$1';
$route['shop-category/(:any)/(:num)'] = 'home/product_category/$1/$2';
$route['stock'] = 'home/all_product';
$route['stock/(:num)'] = 'home/all_product/$1';
$route['product/(:any)'] = 'product/index/$1';
$route['authentication'] = 'customer/auth';
$route['activate-account/(:any)'] = 'customer/account_verification/$1';
$route['account-verify'] = 'customer/account_verify';
$route['my-account'] = 'account/my_account';
$route['upload-profile-picture'] = 'account/upload_profile_picture';
$route['my-account/(:any)'] = 'account/my_account_detail/$1';
$route['remove-cart/(:num)'] = 'account/remove_cat/$1';
$route['shopping-cart'] = 'shopping/shopping_cart';
$route['my-cat-qty/(:num)'] = 'shopping/update_qty/$1';
$route['change-cart-color/(:num)'] = 'shopping/chnage_cart_color/$1';
$route['empty-my-shopping-cart'] = 'shopping/empty_cart';
$route['shop-checkout/(:any)'] = 'checkout/shop_checkout/$1';
$route['payment-method'] = 'checkout/payment_method_set';
$route['order-tracker/(:any)'] = 'account/order_tracking/$1';
$route['item-review/(:num)/(:any)'] = 'account/product_review/$1/$2';
$route['un-review/(:num)/(:any)'] = 'account/delete_review/$1/$2';
$route['about-us'] = 'home/about_us';
$route['pages/(:any)'] = 'home/pages/$1';
$route['payment/(:any)/(:num)/(:any)'] = 'checkout/strip_pay_process/$1/$2/$3';
$route['lost-password'] = 'customer/lost_password';
$route['contact-us'] = 'home/contact_us';
$route['search-product'] = 'product/search_product_ajax';
$route['admin-find-product'] = 'product/admin_search_product_ajax';
$route['search'] = 'product/search';
$route['search-result/(:any)'] = 'product/search_result/$1';
$route['search-result/(:any)/(:num)'] = 'product/search_result/$1/$2';
$route['sitemap\.xml'] = 'home/sitemap';
$route['maintenance-mode'] = 'maintenance/under';
