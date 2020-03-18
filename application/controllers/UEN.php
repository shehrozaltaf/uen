<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UEN extends MX_Controller
{


	function __construct()
	{

		parent::__construct();

		$this->data = null;
		$this->load->module('master');

		$this->load->module('users');
		if (!$this->users->logged_in()) {
			redirect('users/login');
		}
	}

	public function home()
	{

		$this->data['heading'] = "Home";

		$this->data['main_content'] = 'UEN/home';
		$this->load->view('includes/template', $this->data);
	}


	public function implementation()
	{

		$this->data['heading'] = "UEN Implementation";

		$this->data['main_content'] = 'UEN/implementation';
		$this->load->view('includes/template', $this->data);
	}

	public function trials()
	{

		$this->data['heading'] = "UEN Trials";

		$this->data['main_content'] = 'UEN/trials';
		$this->load->view('includes/template', $this->data);
	}


	public function health_facilities()
	{

		$this->data['heading'] = "Health Facilities";
		$this->data['message'] = $this->session->flashdata('message');

		if($this->users->in_group('admin') || $this->users->in_group('management')){
			
			$this->data['facilities'] = $this->master->get('health_facilities');
	
			$this->data['facilities_by_district'] = $this->master->_custom_query("select district_code, district, count(*) as facilities from health_facilities group by district_code, district order by district_code");
	
			$this->data['facilities_by_tehsil'] = $this->master->_custom_query("select district_code, district, tehsil, count(*) as facilities from health_facilities group by district_code, district, tehsil order by district_code");
			
		} else {
			
			$id 	  = $this->users->get_user()->id;
			$district = $this->users->get_district($id);
			
			$this->data['facilities'] = $this->master->_custom_query("select * from health_facilities where district_code = $district");
	
			$this->data['facilities_by_district'] = $this->master->_custom_query("select district_code, district, count(*) as facilities from health_facilities where district_code = $district group by district_code, district order by district_code");
	
			$this->data['facilities_by_tehsil'] = $this->master->_custom_query("select district_code, district, tehsil, count(*) as facilities from health_facilities where district_code = $district group by district_code, district, tehsil order by district_code");
			
		}


		$this->data['main_content'] = 'uen/health_facilities';
		$this->load->view('includes/template', $this->data);
	}

	// Add Health Facility
	public function add_health_facility()
	{

		$submit = $this->input->post('submit');

		if (!empty($submit) and $submit == 'Cancel') {
			redirect('uen/health_facilities');
		} else {

			$this->form_validation->set_rules('hf_type', 'Health Facility Type', 'required');
			$this->form_validation->set_rules('hf_sub_type', 'Health Facility Sub Type', 'required');
			$this->form_validation->set_rules('division', 'Division', 'required');
			$this->form_validation->set_rules('district', 'District', 'required');
			$this->form_validation->set_rules('tehsil', 'Tehsil', 'required');
			$this->form_validation->set_rules('hf_name', 'Health Facility Name', 'required');
			$this->form_validation->set_rules('dhis_code', 'DHIS Code', 'required');
			$this->form_validation->set_rules('app[]', 'App', 'required');
			$this->form_validation->set_rules('functional', 'Functional', 'required');

			if ($this->form_validation->run() == TRUE) {

				$data = array(
					'hf_type' 	    => $this->input->post('hf_type'),
					'hf_sub_type'   => $this->input->post('hf_sub_type'),
					'division' 	    => $this->input->post('division'),
					'district_code' => $this->input->post('district'),
					'district' 	    => $this->master->_get_district_name($this->input->post('district')),
					'tehsil_code'   => $this->input->post('tehsil'),
					'tehsil' 	    => $this->master->_get_tehsil_name($this->input->post('tehsil')),
					'union_council' => '--',
					'facility_name' => $this->input->post('hf_name'),
					'dhis_code'     => $this->input->post('dhis_code'),
					'app' 	   	    => implode(",", $this->input->post('app')),
					'functional'    => $this->input->post('functional'),
					'status' 	    => 0,
				);


				$this->master->_insert('health_facilities', $data);

				if ($this->db->affected_rows() > 0) {
					$flash_msg = "Health Facility added successfully";
					$value = '<div class="callout callout-success"><p>' . $flash_msg . '</p></div>';
					$this->session->set_flashdata('message', $value);
				} else {
					$flash_msg = "Some error occured";
					$value = '<div class="callout callout-danger"><p>' . $flash_msg . '</p></div>';
					$this->session->set_flashdata('message', $value);
				}

				redirect('uen/health_facilities');
			}
		}

		$this->data['heading'] = "Add Health Facility";
		$this->data['main_content'] = 'uen/add_health_facility';
		$this->load->view('includes/template', $this->data);
	}
	
	
	// Add Health Facility
	public function edit_health_facility()
	{

		$hf_code = $this->uri->segment(3);
		
		$submit = $this->input->post('submit');

		if (!empty($submit) and $submit == 'Cancel') {
			redirect('uen/health_facilities');
		} else {

			$this->form_validation->set_rules('hf_type', 'Health Facility Type', 'required');
			$this->form_validation->set_rules('hf_sub_type', 'Health Facility Sub Type', 'required');
			$this->form_validation->set_rules('division', 'Division', 'required');
			$this->form_validation->set_rules('district', 'District', 'required');
			$this->form_validation->set_rules('tehsil', 'Tehsil', 'required');
			$this->form_validation->set_rules('hf_name', 'Health Facility Name', 'required');
			$this->form_validation->set_rules('dhis_code', 'DHIS Code', 'required');
			$this->form_validation->set_rules('app[]', 'App', 'required');
			$this->form_validation->set_rules('functional', 'Functional', 'required');

			if ($this->form_validation->run() == TRUE) {

				$data = array(
					'hf_type' 	    => $this->input->post('hf_type'),
					'hf_sub_type'   => $this->input->post('hf_sub_type'),
					'division' 	    => $this->input->post('division'),
					'district_code' => $this->input->post('district'),
					'district' 	    => $this->master->_get_district_name($this->input->post('district')),
					'tehsil_code'   => $this->input->post('tehsil'),
					'tehsil' 	    => $this->master->_get_tehsil_name($this->input->post('tehsil')),
					'union_council' => '--',
					'facility_name' => $this->input->post('hf_name'),
					'dhis_code'     => $this->input->post('dhis_code'),
					'app' 	   	    => implode(",", $this->input->post('app')),
					'functional'    => $this->input->post('functional'),
					'status' 	    => 0,
				);


				$this->master->_update_where_custom('health_facilities', 'dhis_code', $hf_code, $data);

				if ($this->db->affected_rows() > 0) {
					$flash_msg = "Health Facility updated successfully";
					$value = '<div class="callout callout-success"><p>' . $flash_msg . '</p></div>';
					$this->session->set_flashdata('message', $value);
				} else {
					$flash_msg = "Some error occured";
					$value = '<div class="callout callout-danger"><p>' . $flash_msg . '</p></div>';
					$this->session->set_flashdata('message', $value);
				}

				redirect('uen/health_facilities');
			}
		}

		$this->data['hf'] = $this->master->get_where_custom('health_facilities', 'dhis_code', $hf_code)->row();
		$this->data['heading'] = "Update Health Facility";
		$this->data['main_content'] = 'uen/edit_health_facility';
		$this->load->view('includes/template', $this->data);
	}


	function getDistricts()
	{

		if ($this->input->post('division') && !empty($this->input->post('division'))) {

			$division = $this->input->post('division');

			echo '<option value="" selected>Select District</option>';

			if ($division == 'Bahawalpur') {
				echo '<option value="113">Rahimyar Khan</option>';
			} else if ($division == 'Dera Ghazi Khan') {
				echo '<option value="123">Muzaffargarh</option>';
			} else if ($division == 'Hyderabad') {
				echo '<option value="211">Badin</option>';
			} else if ($division == 'Kalat') {
				echo '<option value="414">Lasbella</option>';
			} else if ($division == 'Larkana') {
				echo '<option value="234">Kamber</option>';
			} else if ($division == 'Naseerabad') {
				echo '<option value="432">Jaffarabad</option>';
				echo '<option value="434">Naseerabad</option>';
			} else if ($division == 'Shaheed Benazirabad') {
				echo '<option value="252">Sanghar</option>';
			}
		}
	}

	function getTehsils()
	{

		if ($this->input->post('district') && !empty($this->input->post('district'))) {

			$district = $this->input->post('district');
			//Get all tehsils data
			$query = $this->master->_custom_query("SELECT * FROM tehsils WHERE district_code = $district");

			//Count total number of rows
			$rowCount = $query->num_rows();

			//Display states list
			if ($rowCount > 0) {
				echo '<option value="">Select Tehsil</option>';
				foreach ($query->result() as $row) {
					echo '<option value="' . $row->tehsil_code . '">' . $row->tehsil_name . '</option>';
				}
			}
		}
	}

	function getUCs()
	{

		if ($this->input->post('tehsil') && !empty($this->input->post('tehsil'))) {

			$tehsil = $this->input->post('tehsil');
			//Get all tehsils data
			$query = $this->master->_custom_query("SELECT * FROM ucs WHERE tehsil_code = $tehsil");

			//Count total number of rows
			$rowCount = $query->num_rows();

			//Display states list
			if ($rowCount > 0) {
				echo '<option value="">Select UC</option>';
				foreach ($query->result() as $row) {
					echo '<option value="' . $row->uc_code . '">' . $row->uc_name . '</option>';
				}
			}
		}
	}


	function getLevels()
	{

		if ($this->input->post('type') && !empty($this->input->post('type'))) {

			$type = $this->input->post('type');

			//Count total number of rows

			if ($type == 1) {
				echo '<option value="">Select Facility Type</option>';
				echo '<option value="1">DHQ</option>';
				echo '<option value="2">Civil Hospital</option>';
				echo '<option value="3">THQ</option>';
				echo '<option value="4">Specialized Teaching Institute</option>';
				echo '<option value="5">Teaching Hospital</option>';
				echo '<option value="6">RHC</option>';
				echo '<option value="7">BHU</option>';
				echo '<option value="8">MCH</option>';
				echo '<option value="9">CD/GD</option>';
			} else if ($type == 2) {
				echo '<option value="">Select Facility Type</option>';
				echo '<option value="10">Maternity Home</option>';
				echo '<option value="11">Private Hospital</option>';
				echo '<option value="12">Private Clinic</option>';
			}
		}
	}

	//////////////////////////  Web Services   //////////////////////////

	public function syncData()
	{

		$app_id = $this->input->post('app_id');

		/*$app_id = 4;
		$this->data['users'] 	  = $this->master->_custom_query("select * from users where status = 0")->result();*/

		$this->data['users'] = $this->master->_custom_query("select * from users where status = 0 and app like '%$app_id%'")->result();
		$this->data['facilities'] = $this->master->_custom_query("select * from health_facilities where status = 0")->result();

		echo json_encode($this->data);
	}


	public function syncData2()
	{

		//$app_id = $this->input->post('app_id');
		$app_id = 4;

		$this->data['users'] = $this->master->_custom_query("select * from users where status = 0 and app like '%$app_id%'")->result();
		$this->data['facilities'] = $this->master->_custom_query("select * from health_facilities where status = 0")->result();

		echo json_encode($this->data);
	}

	//////////////////////////  Web Services   //////////////////////////


	/*public function import_to_food(){
		
		$food_app = $this->load->database('food_app', TRUE);
		
		$auth = $this->master->_custom_query("select * from food_app");
		
		$i = 1;
		foreach($auth->result() as $row){
			
			$data = array(
				'id' 		=> $i,
				'study_id' 	=> $row->study_id,
				'water' 	=> $row->water,
				'energy' 	=> $row->energy,
				'protein' 	=> $row->protein,
				'lipid' 	=> $row->total_lipid,
				'cho' 		=> $row->cho,
				'ca' 		=> $row->ca,
				'iron' 		=> $row->iron,
				'vitamin_c' => $row->vitamin_c
			);
			
			$food_app->insert('nutrition', $data);
			
			$i++;
		}
		
		echo $i." Records Inserted...";
	}*/


	public function getSm()
	{

		for ($i = 1; $i <= 1000000; $i++) {
			echo $this->sm->calculate_percentage(20, 80) . "<br>";
		}

		echo "Done.....";
	}

	////// close db connection //////
	public function __destruct()
	{
		$this->db->close();
	}
}
