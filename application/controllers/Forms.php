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


        $this->form_validation->set_rules('cluster_no', 'کلسٹر نمبر', 'required|trim|xss_clean');
        $this->form_validation->set_rules('hhno', ' گھریلو نمبر', 'required|trim|xss_clean');
        $this->form_validation->set_rules('hhhead', 'گھر کے سربراہ کا نام', 'required|trim|xss_clean');
        $this->form_validation->set_rules('d102', 'جواب دہندگان / ایم ڈبلیو آر اے کا نام', 'required|trim|xss_clean');
        $this->form_validation->set_rules('d103', ' بچے کا نام', 'required|trim|xss_clean');
        if ($this->form_validation->run() == TRUE) {
            $data = array();
            foreach ($_POST as $k => $v) {
                if ($k != 'submit') {
                    $data[$k] = $v;
                }

            }
            /*$data = array(
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
            );*/
            $this->master->_insert('covidq', $data);
            $flash_msg = "Form Submit successfully";
            $value = '<div class="callout callout-success"><p>' . $flash_msg . '</p></div>';
            $this->session->set_flashdata('message', $value);
            redirect('index.php/Forms/submitForm');
        }

        $this->data['heading'] = "Forms";
        $this->data['main_content'] = 'forms';
        $this->load->view('includes/template', $this->data);
    }

    public function checkCluster()
    {
        $result = array();
        $this->uen_ml_local = $this->load->database('uen_ml_local', TRUE);
        $flag = 0;
        if (isset($_POST['cluster_no']) && $_POST['cluster_no'] != '') {
            $cluster = $_POST['cluster_no'];
        } else {
            $result['result'] = 3;
            $flag = 1;
        }
        if (isset($_POST['hhno']) && $_POST['hhno'] != '') {
            $hhno = $_POST['hhno'];
        } else {
            $result['result'] = 4;
            $flag = 1;
        }

        if ($flag == 0) {
            $cluster = $this->uen_ml_local->query("SELECT cluster_code,hhno FROM [dbo].[covid_clusters] where cluster_code='" . $cluster . "' 
        and hhno='" . $hhno . "' group by cluster_code,hhno");
            if ($cluster->num_rows() > 0) {
                foreach ($cluster->result() as $row) {

                    $result['result'] = 1;
                    $result['cluster_code'] = $row->cluster_code;
                    $result['hhno'] = $row->hhno;
                }
            } else {
                $result['result'] = 2;
            }
        } else {
            $result['result'] = 2;
        }
        echo json_encode($result, true);
    }
}