<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        //never load libraries or models in here.
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model(array('login_model', 'store_model'));
    }
    public function index()
    {
        //check if session exist
        $this->redirectIfSessExist();
        $data['title'] = "Sign in | Lukso";
        $data['active'] = "login";
        $this->load->view('include/header_view', $data);
        $this->load->view('include/navbar_view', $data);
        $this->load->view('login_view');
    }

    public function processLogin()
    {

        $this->load->database();

        //gets the post value of the email and password in the html input
        $data = array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        );

        //this rule will do a call back on form submission checks if email exists and try to login the user.
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
                redirect('admin');
            } else {
                //sets the value to false cuz its a user
                $this->session->set_userdata(array('isAdmin' => false));
                $this->session->set_userdata(array('email' => $data['email']));
                //gets the user's id using email then add it to session
                $data['user'] = $this->store_model->getUserWithEmail($this->session->userdata('email'));
                $this->session->set_userdata(array('id' => $data['user']->id));
                redirect('');
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
