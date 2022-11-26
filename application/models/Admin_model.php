<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function getAdminName($email)
    {
        //Gets the admin name if there is a match on $email on the admin table
        $this->db->select('name');
        $this->db->where('email', $email);
        $adminquery = $this->db->get('admins');
        $result = $adminquery->result();
        $name = '';
        foreach ($result as $data) {
            $name = $data->name;
        }
        return $name;
    }
}
