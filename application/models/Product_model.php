<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product_model extends CI_Model {

    public function create($data)
    {
        $this->db->insert('products', $data);
        return TRUE;
    }

    public function findSlug($slug)
    {
        $this->db->where('product_slug', $slug);
        $query = $this->db->get('products');
        return $query->row(0);
    }

    public function admin_list($page)
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->join('product_brands', 'product_brands.brand_id = products.product_brand_id');
        $this->db->order_by('product_name', 'asc');
        $this->db->limit(20, $page);
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function findProductSlug($slug)
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->join('product_brands', 'product_brands.brand_id = products.product_brand_id');
        $this->db->join('sub_categories', 'sub_categories.sid = products.sub_cat_id');
        $this->db->where('product_slug', $slug);
        $query = $this->db->get();
        return $query->row(0);
    }

    public function update($data, $slug)
    {
        $this->db->where('product_slug', $slug);
        $this->db->update('products', $data);
        return TRUE;
    }

    public function remove($id)
    {
        $this->db->where('product_id', $id);
        $this->db->delete('products');
        return TRUE;
    }

    public function count_product()
    {
        $query = $this->db->get('products');
        return $query->num_rows();
    }

    public function home_list()
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->join('product_brands', 'product_brands.brand_id = products.product_brand_id');
        $this->db->where('product_status', 1);
        $this->db->order_by('product_id', 'desc');
        $this->db->limit(20);
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result();
        }

    }

    public function show_all_product($page)
    {
        $this->db->where('product_status', 1);
        $this->db->order_by('product_id', 'desc');
        $this->db->limit(18, $page);
        $query = $this->db->get('products');
        if($query->num_rows() > 0){
            return $query->result();
        }else {
            return FALSE;
        }
    }

    public function count_all_stock()
    {
        $this->db->where('product_status', 1);
        $query = $this->db->get('products');
        return $query->num_rows();
    }

    public function productSlug($slug)
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('products.product_slug', $slug);
        $this->db->where('products.product_status', 1);
        $this->db->join('sub_categories', 'sub_categories.sid = products.sub_cat_id');
        $this->db->join('main_categories', 'main_categories.id = sub_categories.main_cat_id');
        $this->db->join('product_brands', 'product_brands.brand_id = products.product_brand_id');
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->row(0);
        }else {
            return FALSE;
        }
    }

    public function releted($relete_id, $product_id)
    {
        $this->db->where('sub_cat_id', $relete_id);
        $this->db->where('product_status', 1);
        $this->db->where('product_id !=', $product_id);
        $this->db->order_by('product_name', 'RANDOM');
        $this->db->limit(4);
        $query = $this->db->get('products');
        if($query->num_rows() > 0) {
            return $query->result();
        }else {
            return FALSE;
        }
    }

    public function addToFeatured($id)
    {
        $data = array(
            'product_id' => $id
        );
        $make = $this->db->insert('featured_product', $data);
        if($make) {
            return TRUE;
        }else {
            return FALSE;
        }
    }

    public function checkFeatured($id)
    {
        $this->db->where('product_id', $id);
        $check = $this->db->get('featured_product');
        if($check->num_rows() == 0) {
            return TRUE;
        }else {
            return FALSE;
        }
    }

    public function admin_featured_list()
    {
        $this->db->select('*');
        $this->db->from('featured_product');
        $this->db->join('products', 'products.product_id = featured_product.product_id');
        $this->db->join('sub_categories', 'sub_categories.sid = products.sub_cat_id');
        $this->db->join('main_categories', 'main_categories.id = sub_categories.main_cat_id');
        $this->db->order_by('featured_product.fp_id', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result();
        }else {
            return FALSE;
        }
    }

    public function remove_featured($id)
    {
        $this->db->where('fp_id', $id);
        $this->db->delete('featured_product');
        return TRUE;
    }

    public function home_featured_list()
    {
        $this->db->select('*');
        $this->db->from('featured_product');
        $this->db->join('products', 'products.product_id = featured_product.product_id');
        $this->db->join('sub_categories', 'sub_categories.sid = products.sub_cat_id');
        $this->db->join('main_categories', 'main_categories.id = sub_categories.main_cat_id');
        $this->db->order_by('featured_product.fp_id', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result();
        }else {
            return FALSE;
        }
    }

    public function isFeatured($product_id)
    {
        $this->db->where('product_id', $product_id);
        $query = $this->db->get('featured_product');
        if($query->num_rows() > 0) {
            return TRUE;
        }else {
            return FALSE;
        }
    }

    public function addToWishlist($id, $uid)
    {
        $data = array(
            'cw_account_id' => $uid,
            'cw_product_id' => $id
        );
        $this->db->insert('customer_wishlist', $data);
        return TRUE;
    }

    public function checkWishlist($id, $uid)
    {
        $this->db->where('cw_product_id', $id, $uid);
        $this->db->where('cw_account_id', $uid);
        $query = $this->db->get('customer_wishlist');
        if($query->num_rows() > 0) {
            return TRUE;
        }else {
            return FALSE;
        }
    }

    public function removeCart($id, $uid)
    {
        $this->db->where('shop_cart_id', $id);
        $this->db->where('shop_cart_account_id', $uid);
        $this->db->delete('shopping_carts');
        return TRUE;
    }

    public function addToCart($id, $uid)
    {
        $data = array(
            'shop_cart_product_id' => $id,
            'shop_cart_account_id' => $uid
        );
        $new = $this->db->insert('shopping_carts', $data);
        if($new) {
            return TRUE;
        }else {
            return FALSE;
        }
    }

    public function checkCart($id, $uid)
    {
        $this->db->where('shop_cart_product_id', $id);
        $this->db->where('shop_cart_account_id', $uid);
        $confirm = $this->db->get('shopping_carts');
        if($confirm->num_rows() > 0) {
            return TRUE;
        }else {
            return FALSE;
        }
    }

    public function updateQty($id, $uid, $data)
    {
        $this->db->where('shop_cart_id', $id);
        $this->db->where('shop_cart_account_id', $uid);
        $this->db->update('shopping_carts', $data);
        return TRUE;
    }

    public function updateColor($id, $uid, $data)
    {
        $this->db->where('shop_cart_id', $id);
        $this->db->where('shop_cart_account_id', $uid);
        $this->db->update('shopping_carts', $data);
        return TRUE;
    }

    public function emptyCustomerCart($uid)
    {
        $this->db->where('shop_cart_account_id', $uid);
        $this->db->delete('shopping_carts');
        return TRUE;
    }

    public function getTax()
    {
        $this->db->where('shop_tax_id', 1);
        $query = $this->db->get('shopping_tax');
        return $query->row(0);
    }

    public function getSingleRate($pr_get_id)
    {
        $this->db->where('pr_product_id', $pr_get_id);
        $rates = $this->db->get('product_rating');
        return $rates->result_array();
    }

    public function getAverageRating($pr_get_id)
    {
        $this->db->select('ROUND(AVG(pr_rating),1) as averageRating');
        $this->db->from('product_rating');
        $this->db->where("pr_product_id", $pr_get_id);
        $ratingquery = $this->db->get();

        $postResult = $ratingquery->result_array();

        $rating = $postResult[0]['averageRating'];
        return $rating;
    }

    public function getCountRate($pr_get_id)
    {
        $this->db->where('pr_product_id', $pr_get_id);
        $count = $this->db->get('product_rating');
        return $count->num_rows();
    }

    public function getReviews($pr_get_id)
    {
        $this->db->select('*');
        $this->db->from('product_rating');
        $this->db->where('pr_product_id', $pr_get_id);
        $this->db->join('customer_accounts', 'customer_accounts.ca_id = product_rating.pr_account_id');
        $this->db->join('customer_details', 'customer_details.cu_account_id = product_rating.pr_account_id');
        $this->db->order_by('product_rating.pr_id', 'DESC');
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result();
        }else {
            return FALSE;
        }
    }

    public function newReview($data)
    {
        $this->db->insert('product_rating', $data);
        return TRUE;
    }

    public function remove_review($id, $uid)
    {
        $this->db->where('pr_id', $id);
        $this->db->where('pr_account_id', $uid);
        if($this->db->delete('product_rating'))
        {
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    public function searchProduct($query)
    {
        if($query != '')
        {
            $this->db->like('product_name', $query);
            $this->db->order_by('product_id', 'DESC');
            return $this->db->get('products');
        }
        else
        {
            return FALSE;
        }
    }

    public function searchAdminProduct($query)
    {
        if($query != '')
        {
            $this->db->select('*');
            $this->db->from('products');
            $this->db->like('product_name', $query);
            $this->db->join('product_brands', 'product_brands.brand_id = products.product_brand_id');
            $this->db->order_by('product_name', 'asc');
            $query = $this->db->get();
            return $query;
        }
        else
        {
            return FALSE;
        }
    }

    public function getSearch($keyword, $page)
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->like('product_name', $keyword);
        $this->db->join('product_brands', 'product_brands.brand_id = products.product_brand_id', 'left');
        $this->db->limit(10, $page);
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return FALSE;
        }
    }

    public function count_search($keyword)
    {
        $this->db->like('product_name', $keyword);
        $query = $this->db->get('products');
        return $query->num_rows();
    }

    public function sitemapProducts()
    {
        $this->db->where('product_status', 1);
        $this->db->order_by('product_id', 'desc');
        $query = $this->db->get('products');
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return FALSE;
        }
    }
}