<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        //never load libraries or models in here.
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('admin_model');
    }
    public function index()
    {
        $data['title'] = "Admin | Lukso";
        $data['active'] = "admin";
        $this->load->view('include/header_view', $data);
        $this->load->view('include/navbar_view', $data);
        // $this->load->view('admin_view');
    }
}
