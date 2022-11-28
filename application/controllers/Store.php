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
}
