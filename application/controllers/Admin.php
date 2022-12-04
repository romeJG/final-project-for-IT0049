<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        //never load libraries or models in here.
        parent::__construct();
        $this->load->helper(array('form', 'url', 'file'));
        $this->load->library(array('form_validation', 'session', 'upload', 'image_lib'));
        $this->load->model(array('admin_model', 'login_model'));

        //checks if user is admin if not they will end up in a 404page works on all the controllers
        $adminEmail = $this->session->userdata('email');
        //redirect you home if you have no email in the session.
        if (!$adminEmail || !$this->login_model->isAdmin($adminEmail)) {
            redirect('404');
        }
    }
    public function index()
    {

        $data['title'] = "Home | Admin";
        $data['active'] = "users";
        $this->load->view('admin/admin_header_view', $data);
        $this->load->view('admin/include/admin_nav_view', $data);

        $adminEmail = $this->session->userdata('email');
        //gets the admin name and put it into a session.
        $adminName = $this->admin_model->getAdminName($adminEmail);
        $this->session->set_userdata(array('name' => $adminName));

        //loads the body of the admin home
        $data['users'] = $this->admin_model->getUsers();
        $this->load->view('admin/admin_home_view', $data);
    }


    //      .o.             .o8                     o8o                   oooooooooooo                                       .    o8o                                 
    //     .888.           "888                     `"'                   `888'     `8                                     .o8    `"'                                 
    //    .8"888.      .oooo888  ooo. .oo.  .oo.   oooo  ooo. .oo.         888         oooo  oooo  ooo. .oo.    .ooooo.  .o888oo oooo   .ooooo.  ooo. .oo.    .oooo.o 
    //   .8' `888.    d88' `888  `888P"Y88bP"Y88b  `888  `888P"Y88b        888oooo8    `888  `888  `888P"Y88b  d88' `"Y8   888   `888  d88' `88b `888P"Y88b  d88(  "8 
    //  .88ooo8888.   888   888   888   888   888   888   888   888        888    "     888   888   888   888  888         888    888  888   888  888   888  `"Y88b.  
    // .8'     `888.  888   888   888   888   888   888   888   888        888          888   888   888   888  888   .o8   888 .  888  888   888  888   888  o.  )88b 
    //o88o     o8888o `Y8bod88P" o888o o888o o888o o888o o888o o888o      o888o         `V88V"V8P' o888o o888o `Y8bod8P'   "888" o888o `Y8bod8P' o888o o888o 8""888P' 




    //will kill the session of the admin
    public function killsess()
    {
        $this->session->sess_destroy();
        redirect();
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

    // ooooo     ooo                                  oooooooooooo                                       .    o8o                                 
    // `888'     `8'                                  `888'     `8                                     .o8    `"'                                 
    //  888       8   .oooo.o  .ooooo.  oooo d8b       888         oooo  oooo  ooo. .oo.    .ooooo.  .o888oo oooo   .ooooo.  ooo. .oo.    .oooo.o 
    //  888       8  d88(  "8 d88' `88b `888""8P       888oooo8    `888  `888  `888P"Y88b  d88' `"Y8   888   `888  d88' `88b `888P"Y88b  d88(  "8 
    //  888       8  `"Y88b.  888ooo888  888           888    "     888   888   888   888  888         888    888  888   888  888   888  `"Y88b.  
    //  `88.    .8'  o.  )88b 888    .o  888           888          888   888   888   888  888   .o8   888 .  888  888   888  888   888  o.  )88b 
    //    `YbodP'    8""888P' `Y8bod8P' d888b         o888o         `V88V"V8P' o888o o888o `Y8bod8P'   "888" o888o `Y8bod8P' o888o o888o 8""888P' 

//testing


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
        $this->load->database();

        //set validation rules for inputs set_rules('nameInHTML', Error masage name to show, rules)
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

            //Get form input values in the HTML
            // $this->input->post('atr NAME NG INPUT');
            $firstName = $this->input->post('firstName');
            $lastName = $this->input->post('lastName');
            $email = $this->input->post('email');
            $number = "63" . $this->input->post('number');
            $birthday = $this->input->post('birthday');
            $gender = $this->input->post('gender');
            $address = $this->input->post('address');
            $user = array(
                'firstname' => $firstName,
                'lastname' => $lastName,
                'address' => $address,
                'number' => $number,
                'email' => $email,
                'gender' => $gender,
                'birthday' => $birthday
            );
            $this->admin_model->editUser($id, $user);

            //setup the views
            $data['title'] = "Success | Admin";
            $data['active'] = "user";
            $data['user'] = $this->admin_model->getUser($id);
            $this->load->view('admin/admin_header_view', $data);
            $this->load->view('admin/include/admin_nav_view', $data);
            $this->load->view('admin/success_view', $data);
        }
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
    public function processDeleteUser($id)
    {
        $this->admin_model->delete($id);
        $this->index();
    }




    // ooooo     .                                             oooooooooooo                                       .    o8o                                 
    // `888'   .o8                                             `888'     `8                                     .o8    `"'                                 
    //  888  .o888oo  .ooooo.  ooo. .oo.  .oo.    .oooo.o       888         oooo  oooo  ooo. .oo.    .ooooo.  .o888oo oooo   .ooooo.  ooo. .oo.    .oooo.o 
    //  888    888   d88' `88b `888P"Y88bP"Y88b  d88(  "8       888oooo8    `888  `888  `888P"Y88b  d88' `"Y8   888   `888  d88' `88b `888P"Y88b  d88(  "8 
    //  888    888   888ooo888  888   888   888  `"Y88b.        888    "     888   888   888   888  888         888    888  888   888  888   888  `"Y88b.  
    //  888    888 . 888    .o  888   888   888  o.  )88b       888          888   888   888   888  888   .o8   888 .  888  888   888  888   888  o.  )88b 
    // o888o   "888" `Y8bod8P' o888o o888o o888o 8""888P'      o888o         `V88V"V8P' o888o o888o `Y8bod8P'   "888" o888o `Y8bod8P' o888o o888o 8""888P' 


    public function items($show)
    {

        $adminEmail = $this->session->userdata('email');
        //redirect you home if you have no email in the session.
        if (!$adminEmail) {
            redirect('login');
        }
        $data['title'] = "Items | Admin";
        $data['active'] = "items";
        $this->load->view('admin/admin_header_view', $data);
        $this->load->view('admin/include/admin_nav_view', $data);

        //gets the items
        $data['items'] = $this->admin_model->getItems($show);
        $this->load->view('admin/admin_items_view', $data);
    }
    public function addItem()
    {
        $this->load->database();
        $adminEmail = $this->session->userdata('email');
        //redirect you home if you have no email in the session.
        if (!$adminEmail) {
            redirect('login');
        }
        $data['title'] = "Add Item | Admin";
        $data['active'] = "items";
        $this->load->view('admin/admin_header_view', $data);
        $this->load->view('admin/include/admin_nav_view', $data);
        $this->load->view('admin/admin_add_item_view');
    }
    public function processAddItem()
    {
        // Set configuration for the upload library
        $image_config['upload_path'] = './uploads/images/';
        $image_config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        //$config['max_size'] = '10000';
        //$config['max_width'] = '10240';
        //$config['max_height'] = '7680';
        //$config['encrypt_name'] = TRUE;
        $this->upload->initialize($image_config);

        //Set form validation rules
        $this->form_validation->set_rules('name', 'Item Name', 'required|is_unique[items.name]', array('is_unique' => 'This Item name already exists.'));
        $this->form_validation->set_rules('price', 'Item Price', 'required|numeric');
        $this->form_validation->set_rules('short_description', 'Item Short Description', 'required');
        $this->form_validation->set_rules('description', 'Item Description', 'required');
        //Run the form validation
        if ($this->form_validation->run() == FALSE) {
            $this->addItem();
        } else {
            //Upload image

            if ($this->upload->do_upload('image')) {
                $image_data = $this->upload->data();
            } else {
                $image_data['file_name'] = "wala ihh";
            }
            // Get the form data
            $data = array(
                'name' => $this->input->post('name'),
                'price' => $this->input->post('price'),
                'short_description' => $this->input->post('short_description'),
                'description' => $this->input->post('description'),
                'image' => $image_data['file_name']
            );
            $this->admin_model->saveItem($data);

            $this->items("all");
        }
    }
    public function viewItem($id)
    {
        $data['title'] = "View Item | Admin";
        $data['active'] = "item";
        $data['item'] = $this->admin_model->getItem($id);
        $this->load->view('admin/admin_header_view', $data);
        $this->load->view('admin/include/admin_nav_view', $data);
        $this->load->view('admin/admin_view_item_view', $data);
    }
    //shows the views for editing an item
    public function editItem($id)
    {
        $data['title'] = "Edit Item | Admin";
        $data['active'] = "item";
        $data['item'] = $this->admin_model->getItem($id);
        $this->load->view('admin/admin_header_view', $data);
        $this->load->view('admin/include/admin_nav_view', $data);
        $this->load->view('admin/admin_edit_item_view', $data);
    }

    //process the editing of item (validations)
    public function processEditItem($id)
    {
        $data['item'] = $this->admin_model->getItem($id);
        // Set configuration for the upload library
        $image_config['upload_path'] = './uploads/images/';
        $image_config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        //$config['max_size'] = '10000';
        //$config['max_width'] = '10240';
        //$config['max_height'] = '7680';
        //$config['encrypt_name'] = TRUE;
        $this->upload->initialize($image_config);

        //Set form validation rules
        $this->form_validation->set_rules('name', 'Item Name', 'required');
        $this->form_validation->set_rules('price', 'Item Price', 'required|numeric');
        $this->form_validation->set_rules('short_description', 'Item Short Description', 'required');
        $this->form_validation->set_rules('description', 'Item Description', 'required');
        //Run the form validation
        if ($this->form_validation->run() == FALSE) {
            $this->addItem();
        } else {
            //Upload image

            if ($this->upload->do_upload('image')) {
                $image_data = $this->upload->data();
                unlink('./uploads/images/' . $data['item']->image);
            } else {
                $image_data['file_name'] = $data['item']->image;
            }
            // Get the form data
            $data = array(
                'name' => $this->input->post('name'),
                'price' => $this->input->post('price'),
                'short_description' => $this->input->post('short_description'),
                'description' => $this->input->post('description'),
                'image' => $image_data['file_name'],
                'is_active' => $this->input->post('is_active')
            );
            $this->admin_model->editItem($id, $data);
            //setup the views
            $data['title'] = "Success | Admin";
            $data['active'] = "user";
            $data['item'] = $this->admin_model->getItem($id);
            $this->load->view('admin/admin_header_view', $data);
            $this->load->view('admin/include/admin_nav_view', $data);
            $this->load->view('admin/success_item_view', $data);
        }
    }

    // Function for deleting a user
    public function confirmDeleteItem($id)
    {
        $data['title'] = "Items | Admin";
        $data['active'] = "user";
        $data['item'] = $this->admin_model->getItem($id);

        $this->load->view('admin/admin_header_view', $data);
        $this->load->view('admin/include/admin_nav_view', $data);
        $this->load->view('admin/confirm_delete_item_view', $data);
    }
    public function processDeleteItem($id)
    {   //gets the item's data (used for deleting the image)
        $data['item'] = $this->admin_model->getItem($id);
        //deletes the item's image from the directory/server
        unlink('./uploads/images/' . $data['item']->image);

        //delete the data
        $this->admin_model->deleteItem($id);
        $this->items("all");
    }


    //     .oooooo.                  .o8                          oooooooooooo                                       .    o8o                                 
    //     d8P'  `Y8b                "888                          `888'     `8                                     .o8    `"'                                 
    //    888      888 oooo d8b  .oooo888   .ooooo.  oooo d8b       888         oooo  oooo  ooo. .oo.    .ooooo.  .o888oo oooo   .ooooo.  ooo. .oo.    .oooo.o 
    //    888      888 `888""8P d88' `888  d88' `88b `888""8P       888oooo8    `888  `888  `888P"Y88b  d88' `"Y8   888   `888  d88' `88b `888P"Y88b  d88(  "8 
    //    888      888  888     888   888  888ooo888  888           888    "     888   888   888   888  888         888    888  888   888  888   888  `"Y88b.  
    //    `88b    d88'  888     888   888  888    .o  888           888          888   888   888   888  888   .o8   888 .  888  888   888  888   888  o.  )88b 
    //     `Y8bood8P'  d888b    `Y8bod88P" `Y8bod8P' d888b         o888o         `V88V"V8P' o888o o888o `Y8bod8P'   "888" o888o `Y8bod8P' o888o o888o 8""888P' 

    public function order($show)
    {
        $data['title'] = "View Orders | Admin";
        $data['active'] = "orders";
        $data['items'] = $this->admin_model->getOrders($show);
        $this->load->view('admin/admin_header_view', $data);
        $this->load->view('admin/include/admin_nav_view', $data);
        $this->load->view('admin/admin_orders_view', $data);
    }
    public function searchOrder()
    {
        $value = $this->input->post('search');
        if (!($this->input->post('search'))) {
            $value = "all";
        }
        $this->order($value);
    }
    public function completeOrder($order_id)
    {
        $this->admin_model->deleteOrder($order_id);
        $this->order("all");
    }
    public function cancelOrder($order_id)
    {
        $this->admin_model->deleteOrder($order_id);
        $this->order("all");
    }
}
