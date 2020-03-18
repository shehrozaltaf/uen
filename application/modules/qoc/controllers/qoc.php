<?php

class Qoc extends MX_Controller {

	function __construct() {
	
		parent::__construct();
		
		$this->data = null;
		$this->form_validation->CI =& $this;
		//$this->load->vars('current_url', $this->uri->uri_to_assoc(1));
		$this->load->module("master");
		$this->load->model("qoc_model");
		$this->qoc = $this->load->database('qoc', TRUE);

		$this->load->module("users");
		if (!$this->users->logged_in()){
			redirect('users/login', 'refresh');
		}
	}
	
	
	// Dashboard
	public function dashboard(){
		
		if($this->users->in_group('admin') || $this->users->in_group('management')){
			
			$hf_visited = "select district_code, tehsil_code, uc_code, hf_name, CONVERT(date, substring(formDate, 1, 10), 105) form_date ,count(*) forms from forms_qoc_20191116 
where username not in('test1234', 'dmu@aku') and istatus = 1";



			$hf_by_district = "select district_code,
sum(case when qa0101a = '1'  then 1 else 0 end) as qa0101a_yes,
(((sum(case when qa0101a = '1'  then 1 else 0 end) * 100.0)/sum(case when qa0101a in('1', '2', 'NA') then 1 else 0 end))) as qa0101a_yes_p,

sum(case when qa0101a = '2'  then 1 else 0 end) as qa0101a_no,
(((sum(case when qa0101a = '2'  then 1 else 0 end) * 100.0)/sum(case when qa0101a in('1', '2', 'NA') then 1 else 0 end))) as qa0101a_no_p,

sum(case when qa0101a = 'NA' then 1 else 0 end) as qa0101a_na,
(((sum(case when qa0101a = 'NA'  then 1 else 0 end) * 100.0)/sum(case when qa0101a in('1', '2', 'NA') then 1 else 0 end))) as qa0101a_na_p,

sum(case when qa0101a in('1', '2', 'NA') then 1 else 0 end) as total

from forms_qoc_20191116
where username not in('test1234', 'dmu@aku') and istatus = 1";
			
			
		} else {
			
			$id 	  = $this->users->get_user()->id;
			$district = $this->users->get_district($id);
			$hf_visited = "select district_code, tehsil_code, uc_code, hf_name, CONVERT(date, substring(formDate, 1, 10), 105) form_date ,count(*) forms from forms_qoc_20191116 
where username not in('test1234', 'dmu@aku') and istatus = 1 and district_code = $district";


			$hf_by_district = "select district_code,
sum(case when qa0101a = '1'  then 1 else 0 end) as qa0101a_yes,
(((sum(case when qa0101a = '1'  then 1 else 0 end) * 100.0)/sum(case when qa0101a in('1', '2', 'NA') then 1 else 0 end))) as qa0101a_yes_p,

sum(case when qa0101a = '2'  then 1 else 0 end) as qa0101a_no,
(((sum(case when qa0101a = '2'  then 1 else 0 end) * 100.0)/sum(case when qa0101a in('1', '2', 'NA') then 1 else 0 end))) as qa0101a_no_p,

sum(case when qa0101a = 'NA' then 1 else 0 end) as qa0101a_na,
(((sum(case when qa0101a = 'NA'  then 1 else 0 end) * 100.0)/sum(case when qa0101a in('1', '2', 'NA') then 1 else 0 end))) as qa0101a_na_p,

sum(case when qa0101a in('1', '2', 'NA') then 1 else 0 end) as total

from forms_qoc_20191116
where username not in('test1234', 'dmu@aku') and istatus = 1 and district_code = '$district'";
			
		}
		
		
		
		$start_date = $this->input->post('start_date');
		$end_date 	= $this->input->post('end_date');
		
		if(!empty($start_date) && !empty($end_date)){
			$hf_visited     .=" and CONVERT(date, substring(formDate, 1, 10), 105) between '".$start_date."' and '".$end_date."' group by district_code, tehsil_code, uc_code, hf_name, CONVERT(date, substring(formDate, 1, 10), 105) order by district_code, CONVERT(date, substring(formDate, 1, 10), 105)";
			
			$hf_by_district .=" and CONVERT(date, substring(formDate, 1, 10), 105) between '".$start_date."' and '".$end_date."' group by district_code";
			
		} else {
			$hf_visited     .=" and month(CONVERT(date, substring(formDate, 1, 10), 105)) = month(getdate()) group by district_code, tehsil_code, uc_code, hf_name, CONVERT(date, substring(formDate, 1, 10), 105) order by district_code, CONVERT(date, substring(formDate, 1, 10), 105)";
			
			$hf_by_district .=" and month(CONVERT(date, substring(formDate, 1, 10), 105)) = month(getdate()) group by district_code";    
		}
		
		$this->data['hf_visited'] 	  = $this->qoc->query($hf_visited);
		$this->data['hf_by_district'] = $this->qoc->query($hf_by_district);
		
		$hf_by_district_arr = array();
		foreach($this->data['hf_by_district']->result() as $row){ // Craete Array of variables (Step 2)
			$hf_by_district_arr[] = array(
				'district_code' => $row->district_code,
				'qa0101a_yes'   => $row->qa0101a_yes,
				'qa0101a_no' 	=> $row->qa0101a_no,
				'qa0101a_na' 	=> $row->qa0101a_na,
			);	
		}
		
		$this->data['hf_by_district_arr'] = $hf_by_district_arr;
		//var_dump($this->data['hf_by_district_arr']);die();
		
		$this->data['heading']    = "Quality of Care";
		
		$this->data['main_content'] = 'dashboard';
    	$this->load->view('includes/template', $this->data);
	}
	
	
	// View Health Facility Deatil
	public function hf_detail(){
		
		//$hf_name = $this->uri->segment(3);
		$uc 	 = $this->uri->segment(3);
		$date    = $this->uri->segment(4);
		
		$this->data['hf'] = $this->qoc->query("select * from forms_qoc_20191116 
where uc_code = $uc and CONVERT(date, substring(formDate, 1, 10), 105) = '$date'")->row();

		//var_dump($this->data['hf']->result());die();
		
		$this->data['heading'] = "HF Detail";
		//$this->data['message'] = $this->session->flashdata('message');
		
		$this->data['main_content'] = 'hf_detail';
    	$this->load->view('includes/template', $this->data);
	}

	// View Users
	public function view_users(){
		
		$this->data['users'] = $this->qoc->query("select * from users");
		
		$this->data['heading'] = "QOC Users";
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['main_content'] = 'view_users';
    	$this->load->view('includes/template', $this->data);
	}
	
	
	
	
	// Add Health Facility
	public function add_health_facility() {
		
		$submit = $this->input->post('submit');

		if(!empty($submit) and $submit == 'Cancel') {
			redirect('qoc/health_facilities');
		} else {
			$this->form_validation->set_rules('type', 'Health Facility Type', 'required');
			$this->form_validation->set_rules('level', 'Health Facility Level', 'required');
			$this->form_validation->set_rules('dhis_code', 'DHIS Code', 'required');
			$this->form_validation->set_rules('district', 'District', 'required');
			$this->form_validation->set_rules('tehsil', 'Tehsil', 'required');
			$this->form_validation->set_rules('uc', 'UC', 'required');
			$this->form_validation->set_rules('address', 'Health Facility Address', 'required');
			$this->form_validation->set_rules('name', 'Health Facility Name', 'required');
			$this->form_validation->set_rules('govt_name', 'Health Facility Government Name', 'required');
			$this->form_validation->set_rules('uen_code', 'Health Facility UEN Code', 'required');
		
			if ($this->form_validation->run() == TRUE) {

                $district = $this->input->post('district');
                if($district == 113 || $district == 123){
                	$province = 1;
                } elseif($district == 211 || $district == 234 || $district == 252){
                	$province = 2;
                } else {
                	$province = 4;
                }
				
				$data = array(
					'hf_type'		   => $this->input->post('type'),
					'hf_dhis' 		   => $this->input->post('dhis_code'),
					'hf_prov_code' 	   => $province,
					'hf_district_code' => $district,
					'hf_tehsil' 	   => $this->input->post('tehsil'),
					'hf_uc' 		   => $this->input->post('uc'),
					'hf_address' 	   => $this->input->post('address'),
					'hf_name' 		   => $this->input->post('name'),
					'hf_name_govt' 	   => $this->input->post('govt_name'),
					'hf_level' 		   => $this->input->post('level'),
					'hf_uen_code' 	   => $this->input->post('uen_code'),
				);
				

				$this->qoc->insert('health_facilities', $data);

				if($this->qoc->affected_rows() > 0) {
					$flash_msg = "Health Facility added successfully";
					$value = '<div class="callout callout-success"><p>'.$flash_msg.'</p></div>';
					$this->session->set_flashdata('message', $value);	
				} else {
					$flash_msg = "Some error occured";
					$value = '<div class="callout callout-danger"><p>'.$flash_msg.'</p></div>';
					$this->session->set_flashdata('message', $value);
				}

				redirect('qoc/health_facilities');
			}
		}
		
		$this->data['heading'] = "QOC/AD Add Health Facility";
		$this->data['main_content'] = 'add_health_facility';
    	$this->load->view('includes/template', $this->data);
	}
	
	
	// View Health Facilities
	public function health_facilities(){
		
		$this->data['facilities'] = $this->qoc->query("select * from health_facilities order by id");
		
		$this->data['heading'] = "QOC/AD Health Facilities";
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['main_content'] = 'view_health_facilities';
    	$this->load->view('includes/template', $this->data);
	}
	
	// Create User
	public function create_user() {
		
		$submit = $this->input->post('submit');

		if(!empty($submit) and $submit == 'Cancel') {
			redirect('qoc/view_users');
		} else {
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|callback_username_check');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('district', 'District', 'required');
			$this->form_validation->set_rules('designation', 'Designation', 'required');
			$this->form_validation->set_rules('auth_level', 'Auth Level', 'required');
		
			if ($this->form_validation->run() == TRUE) {

				$data = array(
					'full_name'     => $this->input->post('name'),
					'username'      => $this->input->post('username'),
					'password'      => $this->input->post('password'),
					'district_code' => $this->input->post('district'),
					'designation'   => $this->input->post('designation'),
					'auth_level'    => $this->input->post('auth_level')
				);

				$this->qoc->insert('users', $data);

				if($this->qoc->affected_rows() > 0) {
					$flash_msg = "User created successfully";
					$value = '<div class="callout callout-success"><p>'.$flash_msg.'</p></div>';
					$this->session->set_flashdata('message', $value);	
				} else {
					$flash_msg = "Some error occured";
					$value = '<div class="callout callout-danger"><p>'.$flash_msg.'</p></div>';
					$this->session->set_flashdata('message', $value);
				}

				redirect('qoc/view_users');
			}
		}
		
		$this->data['heading'] = "QOC Create User";
		$this->data['main_content'] = 'create_user';
    	$this->load->view('includes/template', $this->data);
	}


	// Edit User
	public function edit_user(){
		
		$submit = $this->input->post('submit');
		$username = $this->uri->segment(3);

		if(!empty($submit) and $submit == 'Cancel') {
			redirect('qoc/view_users');
		} else {
			$this->form_validation->set_rules('name', 'Name', 'required');
			//$this->form_validation->set_rules('username', 'Username', 'required|callback_username_check');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('district', 'District', 'required');
			$this->form_validation->set_rules('designation', 'Designation', 'required');
			$this->form_validation->set_rules('auth_level', 'Auth Level', 'required');
			
			if ($this->form_validation->run() == TRUE){

				$data = array(
					'full_name'     => $this->input->post('name'),
					'username'      => $this->input->post('username'),
					'password'      => $this->input->post('password'),
					'district_code' => $this->input->post('district'),
					'designation'   => $this->input->post('designation'),
					'auth_level'    => $this->input->post('auth_level')
				);

				$this->qoc->where('username', $username);
        		$this->qoc->update('users', $data);

				if($this->qoc->affected_rows() > 0){
					$flash_msg = "User updated successfully";
					$value = '<div class="callout callout-success"><p>'.$flash_msg.'</p></div>';
					$this->session->set_flashdata('message', $value);	
				}else{
					$flash_msg = "No field is changed or some error occured";
					$value = '<div class="callout callout-danger"><p>'.$flash_msg.'</p></div>';
					$this->session->set_flashdata('message', $value);
				}

				redirect('qoc/view_users');
			}
		}
		
		$this->data['user'] = $this->qoc->query("select * from users where username = '$username'")->row();
		
		$this->data['heading'] = "QOC Edit User";
		$this->data['main_content'] = 'edit_user';
    	$this->load->view('includes/template', $this->data);
	}

	function delete_user(){
		
		$username = $this->uri->segment(3);
		$this->qoc->where('username', $username);
		$this->qoc->delete('users');

		if($this->qoc->affected_rows() > 0){
			$flash_msg = "User deleted successfully";
			$value = '<div class="callout callout-success"><p>'.$flash_msg.'</p></div>';
			$this->session->set_flashdata('message', $value);	
		}else{
			$flash_msg = "Some error occured";
			$value = '<div class="callout callout-danger"><p>'.$flash_msg.'</p></div>';
			$this->session->set_flashdata('message', $value);
		}

		redirect('qoc/view_users');
	}

	
	// Callbacks
	function username_check($str){
		
		$query = $this->qoc->query("SELECT * FROM users where username = '$str'");
		$num_rows = $query->num_rows();
		
		if($num_rows > 0){
			$this->form_validation->set_message('username_check', "This user already exists");
			return FALSE;
		}else{
			return TRUE;
		}
	}
	
	
	//////  Test Functions  //////////
	
	function test_hf(){
		
		$query = $this->qoc->query("select district_code, tehsil_code, uc_code, hf_name, CONVERT(date, substring(formDate, 1, 10), 105) form_date ,count(*) num from forms_qoc_20191116 
where username not in('test1234', 'dmu@aku') and istatus = 1
group by district_code, tehsil_code, uc_code, hf_name, CONVERT(date, substring(formDate, 1, 10), 105) order by district_code, CONVERT(date, substring(formDate, 1, 10), 105)");

		$ok 	= 0;
		$not_ok = 0;
		foreach($query->result() as $row){
			$query2 = $this->master->_custom_query("select * from health_facilities where district_code = $row->district_code and tehsil_code = $row->tehsil_code and facility_name = '$row->hf_name'");
			
			if($query2->num_rows() > 0){
				$ok     = $ok + 1;
			} else {
				$not_ok = $not_ok + 1;
			}
		}
		
		echo "Maching HFs : ".$ok."<br> Not Maching Hfs : ".$not_ok;
	}
	
}
