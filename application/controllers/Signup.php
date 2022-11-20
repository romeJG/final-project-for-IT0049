<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Signup extends CI_Controller
{
    public function __construct()
    {
        //never load libraries or models in here.
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $data['title'] = "Sign Up | Lukso";
        $data['active'] = "signup";
        $this->load->view('include/header_view', $data);
        $this->load->view('include/navbar_view', $data);
        $this->load->view('signup_view');
    }
    public function processSignup()
    {

        //<-------------------- MAILER --------------------->

        //init email library for sending OTP email verification
        $this->load->library("email");

        //config for email lib
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smptp_timeout' => 5,
            'smtp_port' => 465,
            'smtp_user' => 'luksowands@gmail.com',
            'smtp_pass' => 'tzweisaqfiohkjpw',
            'charset' => 'utf-8',
            'mailtype' => 'html',
            'newline' => '\r\n'
        );
        //initialize email config
        $this->email->initialize($config);

        //setup email to send
        $this->email->set_newline("\r\n");
        $this->email->set_crlf("\r\n");
        $this->email->to($this->input->post('email'));
        $this->email->from("otp@luksowands.com");
        $this->email->subject("LUKSO WANDS OTP");
        $this->email->message("OTP");
        //sends the email and redirect if email is sent.

        if ($this->email->send()) {
            redirect('');
        } else {
            // redirect('ayawgumana');
            echo $this->email->print_debugger();
        }
        //<-------------------- END of MAILER --------------------->



        // $this->form_validation->set_rules('firstName', 'First Name', 'required');
        // $this->form_validation->set_rules('lastName', 'Last Name', 'required');
        // $this->form_validation->set_rules('email', 'E Mail', 'required|is_unique[users.email]', array('is_unique' => 'This Email already exists.'));

        // $this->form_validation->set_rules('firstName', 'First Name', 'required');
        // $this->form_validation->set_rules('firstName', 'First Name', 'required');

    }
}
