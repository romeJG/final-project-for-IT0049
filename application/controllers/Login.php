<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        //never load libraries or models in here.
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('login_model');
        $this->load->library('session');
    }
    public function index()
    {
        $data['title'] = "Sign in | Lukso";
        $data['active'] = "login";
        $this->load->view('include/header_view', $data);
        $this->load->view('include/navbar_view', $data);
        $this->load->view('login_view');
    }

    public function processLogin()
    {

        $this->load->database();

        //gets the post value of the email and password

        $data = array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        );


        $this->form_validation->set_rules('email', 'Email', 'required|callback_emailExist|callback_login', array('emailExist' => 'This Email does not exist', 'login' => 'Wrong Password'));
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            //refresh the page if the fields are not valid
            $this->index();
        } else {
            if ($this->login_model->isAdmin($data['email'])) {
                //sets the value to true if admin
                $this->session->set_userdata(array('isAdmin' => true));
                $this->session->set_userdata(array('email' => $data['email']));
                echo "is admin?" . $this->session->userdata('isAdmin');
            } else {
                //sets the value to false cuz its a user

                $this->session->set_userdata(array('isAdmin' => false));
                $this->session->set_userdata(array('email' => $data['email']));
                echo "is admin?" . $this->session->userdata('isAdmin');
            }
        }
    }

    public function login()
    {
        $data = array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        );
        return $this->login_model->login($data);
    }


    public function emailExist($email)
    {
        return $this->login_model->emailExist($email);
    }
}
