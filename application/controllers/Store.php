<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Store extends CI_Controller
{
    public function __construct()
    {
        //never load libraries or models in here.
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model(array('store_model', 'login_model'));
    }

    public function index()
    {
        $this->redirectIfSessExist();
        $data['title'] = "Store | Lukso";
        $data['active'] = "store";
        $this->load->view('include/header_view', $data);
        $this->load->view('include/navbar_view', $data);
        $data['items'] = $this->store_model->getItems();
        $this->load->view('items_view', $data);
    }



    public function addToCart($itemID)
    {
        $data['title'] = "Success | Lukso";
        $data['active'] = "store";
        $this->load->view('include/header_view', $data);
        $this->load->view('include/navbar_view', $data);

        //shows feedback to user
        $data['message'] = "Added To Cart!";
        $this->load->view('success_view', $data);

        $data['item'] = $this->store_model->getItem($itemID);
        $name =
            $userID = $this->session->userdata('id');
        $data = array(
            'name' => $data['item']->name,
            'price' => $data['item']->price,
            'image' => $data['item']->image,
            'user_id' => $userID

        );
        $this->store_model->insertToCart($data);
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
    public function lookItem($id)
    {
        $data['title'] = "Item | Lukso";
        $data['active'] = "store";
        $this->load->view('include/header_view', $data);
        $this->load->view('include/navbar_view', $data);
        $data['item'] = $this->store_model->getItem($id);
        $this->load->view('user/item_preview', $data);
    }
}
