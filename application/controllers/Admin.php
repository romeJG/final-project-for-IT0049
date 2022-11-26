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
        $data['title'] = "Home | Admin";
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
        $data['title'] = "View User | Admin";
        $data['active'] = "user";
        $data['user'] = $this->admin_model->getUser($id);
        $this->load->view('admin/admin_header_view', $data);
        $this->load->view('admin/include/admin_nav_view', $data);
        $this->load->view('admin/view_user_view', $data);
    }
    //edits the user's info via the id in the URL
    public function editUser($id)
    {
        $data['title'] = "Edit User | Admin";
        $data['active'] = "user";
        $data['user'] = $this->admin_model->getUser($id);
        $this->load->view('admin/admin_header_view', $data);
        $this->load->view('admin/include/admin_nav_view', $data);
        $this->load->view('admin/edit_user_view', $data);
    }
    public function processEdit($id)
    {
        //load database for checking if email is unique
        $this->load->database();

        //set validatio rules
        $this->form_validation->set_rules('firstName', 'First Name', 'required');
        $this->form_validation->set_rules('lastName', 'Last Name', 'required');

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('number', 'Number', 'required|numeric');

        $this->form_validation->set_rules('birthday', 'Birthday', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');

        $this->form_validation->set_rules('address', 'Address', 'required');


        //run form validation and check if its false
        if ($this->form_validation->run() == FALSE) {
            //refresh the page if the fields are not valid
            $this->editUser($id);
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
            //insert user to users table and get id
            $user['firstname'] = $firstName;
            $user['lastname'] = $lastName;
            $user['address'] = $address;
            $user['number'] = $number;
            $user['email'] = $email;
            $user['gender'] = $gender;
            $user['birthday'] = $birthday;
            $this->admin_model->editUser($id, $user);
            $data['title'] = "Sucess! | Admin";
            $data['active'] = "user";
            $this->load->view('admin/admin_header_view', $data);

            $data['title'] = "Success | Admin";
            $data['active'] = "user";
            $data['user'] = $this->admin_model->getUser($id);
            $this->load->view('admin/admin_header_view', $data);
            $this->load->view('admin/include/admin_nav_view', $data);
            $this->load->view('admin/success_view', $data);
        }
    }


    //shows the profile of the current admin in session
    public function profile()
    {
        $data['title'] = "Profile | Admin";
        $data['active'] = "user";
        $data['user'] = $this->admin_model->getAdmin($this->session->userdata('email'));

        $this->load->view('admin/admin_header_view', $data);
        $this->load->view('admin/include/admin_nav_view', $data);
        $this->load->view('admin/profile_view', $data);
    }
    // Function for deleting a user
    public function confirmDeleteUser($id)
    {
        $data['title'] = "Profile | Admin";
        $data['active'] = "user";
        $data['user'] = $this->admin_model->getUser($id);

        $this->load->view('admin/admin_header_view', $data);
        $this->load->view('admin/include/admin_nav_view', $data);
        $this->load->view('admin/confirm_delete_view', $data);
    }
    public function processDelete($id)
    {
        $this->admin_model->delete($id);
        $this->index();
    }
}
