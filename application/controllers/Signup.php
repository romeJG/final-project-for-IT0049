<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Signup extends CI_Controller
{
    public function __construct()
    {
        //never load libraries or models in here.
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('signup_model');
        $this->load->model('login_model');
    }

    public function index()
    {
        //check if session exist
        $this->redirectIfSessExist();
        $data['title'] = "Sign Up | Lukso";
        $data['active'] = "signup";
        $this->load->view('include/header_view', $data);
        $this->load->view('include/navbar_view', $data);
        $this->load->view('signup_view');
    }
    public function processSignup()
    {
        //load database for checking if email is unique
        $this->load->database();

        //set validatio rules
        $this->form_validation->set_rules('firstName', 'First Name', 'required');
        $this->form_validation->set_rules('lastName', 'Last Name', 'required');

        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]', array('is_unique' => 'This Email already exists.'));
        $this->form_validation->set_rules('number', 'Number', 'required|numeric');

        $this->form_validation->set_rules('birthday', 'Birthday', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');

        $this->form_validation->set_rules('address', 'Address', 'required');

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[30]');
        $this->form_validation->set_rules('confirmPass', 'Confirm Password', 'required|matches[password]');

        //run form validation and check if its false
        if ($this->form_validation->run() == FALSE) {
            //refresh the page if the fields are not valid
            $this->index();
        } else {

            //Get form values
            // $this->input->post('atr NAME NG INPUT');
            $firstName = $this->input->post('firstName');
            $lastName = $this->input->post('lastName');

            $email = $this->input->post('email');
            $number = "63" . $this->input->post('number');

            $birthday = $this->input->post('birthday');
            $gender = $this->input->post('gender');

            $address = $this->input->post('address');

            $password = $this->input->post('password');

            //generate simple random code
            $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $otp = substr(str_shuffle($set), 0, 12);

            //insert user to users table and get id
            $user['firstname'] = $firstName;
            $user['lastname'] = $lastName;
            $user['address'] = $address;
            $user['number'] = $number;
            $user['email'] = $email;
            $user['password'] = $password;
            $user['gender'] = $gender;
            $user['birthday'] = $birthday;
            $user['code'] = $otp;
            $user['active'] = false;
            $id = $this->signup_model->insert($user);

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
                //app password from google "app passwords"
                //account real password: "luksowands12345678"
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
            //gets the email in the input.
            $this->email->to($this->input->post('email'));
            $this->email->from("otp@luksowands.com");
            $this->email->subject("LUKSO WANDS VERIFICATION");
            $this->email->message("
            <html>
            <head>
                <title>Verification Code</title>
            </head>
            <body>
                <h2>Thank you for Registering.</h2>
                <p>Please click the link below to activate your account.</p>
                <h4><a href='" . base_url() . "signup/activate/" . $id . "/" . $otp . "'>Activate My Account</a></h4>
            </body>
            </html>
            ");
            //sends the email and redirect if email is sent.

            if ($this->email->send()) {
                redirect('');
            } else {
                // redirect('ayawgumana');
                echo $this->email->print_debugger();
            }
            //<-------------------- END of MAILER --------------------->

        }
    }

    public function activate()
    {
        //load database for checking if otp is same in DB
        $this->load->database();

        $id =  $this->uri->segment(3);
        $code = $this->uri->segment(4);

        //fetch user details
        $user = $this->signup_model->getUser($id);

        //if code matches
        if ($user['code'] == $code) {
            //update user active status
            $data['active'] = true;
            $query = $this->signup_model->activate($data, $id);

            // if ($query) {
            //     $this->session->set_flashdata('message', 'User activated successfully');
            // } else {
            //     $this->session->set_flashdata('message', 'Something went wrong in activating account');
            // }
        } else {
            // $this->session->set_flashdata('message', 'Cannot activate account. Code didnt match');
        }

        redirect('');
    }
    public function redirectIfSessExist()
    {
        //if no session it will not try to login.
        if ($this->session->userdata('email')) {
            //logs in the user if there is a session
            if ($this->login_model->isAdmin($this->session->userdata('email'))) {
                redirect('admin');
            } else {
                echo "is admin?" . $this->session->userdata('isAdmin');
            }
        }
    }
}
