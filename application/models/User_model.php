<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }




    // ooooo     ooo                                  oooooooooooo                                       .    o8o                                 
    // `888'     `8'                                  `888'     `8                                     .o8    `"'                                 
    //  888       8   .oooo.o  .ooooo.  oooo d8b       888         oooo  oooo  ooo. .oo.    .ooooo.  .o888oo oooo   .ooooo.  ooo. .oo.    .oooo.o 
    //  888       8  d88(  "8 d88' `88b `888""8P       888oooo8    `888  `888  `888P"Y88b  d88' `"Y8   888   `888  d88' `88b `888P"Y88b  d88(  "8 
    //  888       8  `"Y88b.  888ooo888  888           888    "     888   888   888   888  888         888    888  888   888  888   888  `"Y88b.  
    //  `88.    .8'  o.  )88b 888    .o  888           888          888   888   888   888  888   .o8   888 .  888  888   888  888   888  o.  )88b 
    //    `YbodP'    8""888P' `Y8bod8P' d888b         o888o         `V88V"V8P' o888o o888o `Y8bod8P'   "888" o888o `Y8bod8P' o888o o888o 8""888P' 


    function getUserWithEmail($email)
    {
        $where = array('email' => $email);
        $query = $this->db->get_where('users', $where);
        $result = $query->row();
        return $result;
    }
    function editUser($email, $data)
    {
        $where = array('email' => $email);
        $this->db->where($where);
        $this->db->update('users', $data);
    }
}
