<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function emailExist($email)
    {
        //Gets the admin if there is a match on $ email
        $this->db->where('email', $email);
        $adminquery = $this->db->get('admins');

        //Gets the user if there is a match on $ email
        $this->db->where('email', $email);
        $userquery = $this->db->get('users');

        //checks if there is a row returned by the user and admin query
        if ($adminquery->num_rows() > 0 || $userquery->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //this function will check if the email used is an admin.
    function isAdmin($email)
    {
        //checks if its in the admins table
        $this->db->where('email', $email);
        $query = $this->db->get('admins');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //checks if an admin or a user has the right password 
    function login($data)
    {
        $condition = "email =" . "'" . $data['email'] . "' AND " . "password =" . "'" . $data['password'] . "'";
        //query for admins
        $this->db->select('*');
        $this->db->from('admins');
        $this->db->where($condition);
        $this->db->limit(1);
        $adminquery = $this->db->get();

        //query for users
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($condition);
        $this->db->limit(1);
        $userquery = $this->db->get();

        //checks if the querry of the user or the admin will give a single result
        if ($adminquery->num_rows() == 1 || $userquery->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
}
