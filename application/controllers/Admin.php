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
        $data['users'] = $this->admin_model->getUsers();
        $this->load->view('admin/admin_home_view', $data);
    }
    //will kill the session of the admin
    public function killsess()
    {
        $this->session->sess_destroy();
        redirect();
    }
    //view the user's info via id in the URL
    public function viewUser($id)
    {
        $data['title'] = "View User | Lukso";
        $data['active'] = "user";
        $data['user'] = $this->admin_model->getUser($id);
        $this->load->view('admin/admin_header_view', $data);
        $this->load->view('admin/include/admin_nav_view', $data);
        $this->load->view('admin/view_user_view', $data);
    }
    //shows the profile of the current admin in session
    public function profile()
    {
        $data['title'] = "View User | Lukso";
        $data['active'] = "user";
        $data['user'] = $this->admin_model->getAdmin($this->session->userdata('email'));

        $this->load->view('admin/admin_header_view', $data);
        $this->load->view('admin/include/admin_nav_view', $data);
        $this->load->view('admin/profile_view', $data);
    }
}
