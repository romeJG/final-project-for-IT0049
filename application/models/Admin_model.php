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
    function getUsers()
    {
        return $this->db->get('users')->result();
    }

    public function getUser($id)
    {
        $where = array('id' => $id);
        $query = $this->db->get_where('users', $where);
        $result = $query->row();
        return $result;
    }

    public function getAdmin($email)
    {
        $where = array('email' => $email);
        $query = $this->db->get_where('admins', $where);
        $result = $query->row();
        return $result;
    }
    // Update a single user
    public function editUser($id, $data)
    {
        $where = array('id' => $id);
        $this->db->where($where);
        $this->db->update('users', $data);
    }

    // Delete a single user
    public function delete($id)
    {
        $where = array('id' => $id);
        $this->db->where($where);
        $this->db->delete('users');
    }
}
