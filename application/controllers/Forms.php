<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Forms extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->spc = $this->load->database('default', TRUE);
        $this->form_validation->CI =& $this;
        $this->data = null;
        $this->load->vars('current_url', $this->uri->uri_to_assoc(1));
        $this->load->module("master");
        $this->load->module("users");
        if (!$this->users->logged_in()) {
            redirect('index.php/users/login', 'refresh');
        }

    }


    public function submitForm()
    {
        if (!$this->users->logged_in()) {
            redirect('index.php/users/login', 'refresh');
        }


        $this->form_validation->set_rules('A101', 'کلسٹر نمبر', 'required|trim|xss_clean');
        $this->form_validation->set_rules('cluster_type', 'Cluster Type', 'required|trim|xss_clean');
        if ($this->form_validation->run() == TRUE) {
            /* $data = array(
                 'username' => $this->input->post('username'),
                 'email' => $this->input->post('email'),
                 'password' => $this->input->post('password'),
                 'full_name' => $this->input->post('full_name'),
                 'designation' => $this->input->post('designation'),
                 'contact' => $this->input->post('contact'),
                 'district' => $this->input->post('district'),
                 'type' => $this->input->post('type'),
                 'app' => $app,
                 'enable' => 1,
                 'status' => 0,
             );
             $this->master->_insert('users', $data);*/
            $flash_msg = "User registered successfully";
            $value = '<div class="callout callout-success"><p>' . $flash_msg . '</p></div>';
            $this->session->set_flashdata('message', $value);
            redirect('users/index');
        }

        $this->data['heading'] = "Forms";
        $this->data['main_content'] = 'forms';
        $this->load->view('includes/template', $this->data);
    }
}