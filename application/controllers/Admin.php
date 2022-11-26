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
        $data['active'] = "users";
        $this->load->view('admin/admin_header_view', $data);
        $this->load->view('admin/include/admin_nav_view', $data);

        $adminEmail = $this->session->userdata('email');
        //redirect you home if you have no email in the session.
        if (!$adminEmail) {
            redirect('login');
        }
        //gets the admin name and put it into a session.
        $adminName = $this->admin_model->getAdminName($adminEmail);
        $this->session->set_userdata(array('name' => $adminName));
        //loads the body of the admin home
        $this->load->view('admin/admin_home_view', $data);
    }
    public function killsess()
    {
        $this->session->sess_destroy();
        redirect();
    }
}
