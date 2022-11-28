<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        //never load libraries or models in here.
        parent::__construct();
        $this->load->helper(array('form', 'url', 'file'));
        $this->load->library(array('form_validation', 'session', 'upload', 'image_lib'));
        $this->load->model('user_model');
    }
    public function index()
    {
        $data['title'] = "Profile | User";
        $data['active'] = "users";
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $this->load->view('include/header_view', $data);
        $this->load->view('include/navbar_view', $data);
        $this->load->view('user/profile_view', $data);
    }




    // ooooo     ooo                                  oooooooooooo                                       .    o8o                                 
    // `888'     `8'                                  `888'     `8                                     .o8    `"'                                 
    //  888       8   .oooo.o  .ooooo.  oooo d8b       888         oooo  oooo  ooo. .oo.    .ooooo.  .o888oo oooo   .ooooo.  ooo. .oo.    .oooo.o 
    //  888       8  d88(  "8 d88' `88b `888""8P       888oooo8    `888  `888  `888P"Y88b  d88' `"Y8   888   `888  d88' `88b `888P"Y88b  d88(  "8 
    //  888       8  `"Y88b.  888ooo888  888           888    "     888   888   888   888  888         888    888  888   888  888   888  `"Y88b.  
    //  `88.    .8'  o.  )88b 888    .o  888           888          888   888   888   888  888   .o8   888 .  888  888   888  888   888  o.  )88b 
    //    `YbodP'    8""888P' `Y8bod8P' d888b         o888o         `V88V"V8P' o888o o888o `Y8bod8P'   "888" o888o `Y8bod8P' o888o o888o 8""888P' 

    //will kill the session of the admin
    public function killsess()
    {
        $this->session->sess_destroy();
        redirect();
    }
}
