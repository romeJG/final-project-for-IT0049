<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{
    public function __construct()
    {
        //never load libraries or models in here.
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model(array('cart_model', 'login_model'));
    }

    public function index()
    {
        $this->redirectIfSessExist();
        $data['title'] = "Store | Lukso";
        $data['active'] = "store";
        $this->load->view('include/header_view', $data);
        $this->load->view('include/navbar_view', $data);
        $data['items'] = $this->cart_model->getCartItems($this->session->userdata('id'));
        $data['total'] = 0.00;
        foreach ($data['items'] as $item) {
            $data['total'] += $item->price;
        }
        $this->session->set_userdata(array('total' => $data['total']));
        $this->load->view('user/cart_items_view', $data);
    }


    public function redirectIfSessExist()
    {
        //if no session it will not try to login.
        if ($this->session->userdata('email')) {
            //logs in the user if there is a session
            if ($this->login_model->isAdmin($this->session->userdata('email'))) {
                redirect('admin');
            }
        }
    }
    public function remove($cart_item_id)
    {
        $data['title'] = "Done | Lukso";
        $data['active'] = "store";
        $this->load->view('include/header_view', $data);
        $this->load->view('include/navbar_view', $data);
        //shows feedback to user
        $data['message'] = "Removed From Cart!";
        $this->load->view('success_view', $data);
        $this->cart_model->deleteItemFromCart($cart_item_id);
    }
    public function removeAll($userID)
    {
        $data['title'] = "Done | Lukso";
        $data['active'] = "store";
        $this->load->view('include/header_view', $data);
        $this->load->view('include/navbar_view', $data);
        //shows feedback to user
        $data['message'] = "Removed All From Cart!";
        $this->load->view('success_view', $data);
        $this->cart_model->deleteAllCart($userID);
    }


    public function checkout()
    {
        $data['title'] = "Done | Lukso";
        $data['active'] = "store";
        $this->load->view('include/header_view', $data);
        $this->load->view('include/navbar_view', $data);
        $data['items'] = $this->cart_model->getCartItems($this->session->userdata('id'));
        $data['total'] = 0.00;
        foreach ($data['items'] as $item) {
            $data['total'] += $item->price;
        }
        $this->load->view('user/checkout_view', $data);
    }
    public function confirmCheckout()
    {
        $order_id = mt_rand(100000, 999999);
        $data['items'] = $this->cart_model->getCartItems($this->session->userdata('id'));
        foreach ($data['items'] as $item) {
            $order = array(
                'order_id' => $order_id,
                'item_name' => $item->name,
                'user_id' => $this->session->userdata('id'),
                'address' => $this->input->post('address'),
            );
            $this->cart_model->insertOrder($order);
        }
        $this->cart_model->deleteAllCart($this->session->userdata('id'));
        $data['title'] = "Done | Lukso";
        $data['active'] = "store";
        $this->load->view('include/header_view', $data);
        $this->load->view('include/navbar_view', $data);
        //shows feedback to user
        $data['message'] = "Order Successful";
        $this->load->view('success_view', $data);
    }
}
