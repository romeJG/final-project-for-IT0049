<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        //never load libraries or models in here.
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('login_model');
    }

    public function index()
    {
        $this->redirectIfSessExist();
        $data['title'] = "Lukso Wands";
        $data['active'] = "home";
        $this->load->view('include/header_view', $data);
        $this->load->view('include/navbar_view', $data);
        $this->load->view('home_view');
    }
    public function redirectIfSessExist()
    {
        //if no session it will not try to login.
        if ($this->session->userdata('email')) {
            //logs in the user if there is a session
            if ($this->login_model->isAdmin($this->session->userdata('email'))) {
                redirect('admin');
            } else {
                redirect('');
            }
        }
    }
}
