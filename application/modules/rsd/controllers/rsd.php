<?php

class Rsd extends MX_Controller {

	function __construct() {
	
		parent::__construct();
		
		$this->data = null;
		$this->form_validation->CI =& $this;
		//$this->load->vars('current_url', $this->uri->uri_to_assoc(1));
		$this->load->module("master");
		$this->load->model("rsd_model");
		$this->qoc = $this->load->database('qoc', TRUE);

		$this->load->module("users");
		if (!$this->users->logged_in()){
			redirect('users/login', 'refresh');
		}
	}
	
	
	// Dashboard
	public function dashboard(){
		
		if($this->users->in_group('admin') || $this->users->in_group('management')){
		
			$this->data['shc_visited'] = $this->master->_custom_query("select distinct hf_code, hf_name, district, tehsil from dhis_validation_jul18_sep19");
			$this->data['phc_visited'] = $this->master->_custom_query("select distinct hf_code, hf_name, district, tehsil from dhis_validation_jul18_sep19_primary");
		} else {
			
			$id 	  = $this->users->get_user()->id;
			$district = $this->users->get_district($id);
			
			$this->data['shc_visited'] = $this->master->_custom_query("select distinct hf_code, hf_name, district, tehsil from dhis_validation_jul18_sep19 where district_code = $district");
			$this->data['phc_visited'] = $this->master->_custom_query("select distinct hf_code, hf_name, district, tehsil from dhis_validation_jul18_sep19_primary where district_code = $district");
		}
		
		
		$this->data['heading']    = "Routine Service Delivery";
		
		$this->data['main_content'] = 'dashboard';
    	$this->load->view('includes/template', $this->data);
	}
	
	
	/////////   Akbar Database    /////////
	
	public function dhis_shc(){
		
		if($this->users->in_group('admin') || $this->users->in_group('management')){
			
			$this->data['health_facilities'] = $this->master->_custom_query("select distinct hf_code, hf_name, district, tehsil from dhis_validation_jul18_sep19");
		} else {
			
			$id 	  = $this->users->get_user()->id;
			$district = $this->users->get_district($id);
			
			$this->data['health_facilities'] = $this->master->_custom_query("select distinct hf_code, hf_name, district, tehsil from dhis_validation_jul18_sep19 where district_code = $district");
		}
		
		
		$this->data['heading'] = "DHIS SHC Facilities Jul, 2018 to Sep, 2019";
		
		$this->data['main_content'] = 'dhis_shc';
    	$this->load->view('includes/template', $this->data);
	}
	
	public function dhis_shc_facility_detail(){
		
		$hf_code  = $this->uri->segment(3);
		$id 	  = $this->users->get_user()->id;
		$district = $this->users->get_district($id);
		//var_dump(substr($hf_code, 0, 3)); die();
		
		if(substr($hf_code, 0, 3) == $district || $this->users->in_group('admin') || $this->users->in_group('management')){
		
			$this->data['months'] = $this->master->_custom_query("select * from dhis_validation_jul18_sep19 where hf_code = $hf_code order by year, month asc");
		} else {
			
			return show_error('You are not authorized to view this Health Facility');
		}
		
		//var_dump($this->data['health_facilities']->result());die();
		
		$this->data['heading'] = "All Reports for health facility : ".$hf_code;
		
		$this->data['main_content'] = 'dhis_shc_facility_detail';
    	$this->load->view('includes/template', $this->data);
	}
	
	public function month_detail(){
		
		$hf_code = $this->uri->segment(3);
		$month 	 = $this->uri->segment(4);
		$year 	 = $this->uri->segment(5);
		
		$id 	  = $this->users->get_user()->id;
		$district = $this->users->get_district($id);
		//var_dump(substr($hf_code, 0, 3)); die();
		
		if(substr($hf_code, 0, 3) == $district || $this->users->in_group('admin') || $this->users->in_group('management')){
		
			$this->data['month'] = $this->master->_custom_query("select * from dhis_validation_jul18_sep19 where hf_code = $hf_code and month = $month and year = $year")->row();
		} else {
			
			return show_error('You are not authorized to view this record');
		}
		
		//var_dump($this->data['month']->result());die();
		
		$this->data['heading'] = "Report for the month of : ".$month.", ".$year." | Health Facility : ".$hf_code;
		
		$this->data['main_content'] = 'month';
    	$this->load->view('includes/template', $this->data);
	}
	
	
	////////   Primary Health Facailities
	
	public function dhis_phc(){
		
		if($this->users->in_group('admin') || $this->users->in_group('management')){
		
			$this->data['health_facilities'] = $this->master->_custom_query("select distinct hf_code, hf_name, district, tehsil from dhis_validation_jul18_sep19_primary");
		} else {
			
			$id 	  = $this->users->get_user()->id;
			$district = $this->users->get_district($id);
			
			$this->data['health_facilities'] = $this->master->_custom_query("select distinct hf_code, hf_name, district, tehsil from dhis_validation_jul18_sep19_primary where district_code = $district");
		}
		
		$this->data['heading'] = "DHIS SHC Facilities Jul, 2018 to Sep, 2019";
		
		$this->data['main_content'] = 'dhis_shc_primary';
    	$this->load->view('includes/template', $this->data);
	}
	
	public function dhis_phc_facility_detail(){
		
		$hf_code = $this->uri->segment(3);
		$id 	  = $this->users->get_user()->id;
		$district = $this->users->get_district($id);
		//var_dump(substr($hf_code, 0, 3)); die();
		
		if(substr($hf_code, 0, 3) == $district || $this->users->in_group('admin') || $this->users->in_group('management')){
		
			$this->data['months'] = $this->master->_custom_query("select * from dhis_validation_jul18_sep19_primary where hf_code = $hf_code order by year, month asc");
		} else {
			
			return show_error('You are not authorized to view this Health Facility');
		}
		
		//var_dump($this->data['health_facilities']->result());die();
		
		$this->data['heading'] = "All Reports for health facility : ".$hf_code;
		
		$this->data['main_content'] = 'dhis_shc_facility_detail_primary';
    	$this->load->view('includes/template', $this->data);
	}
	
	public function phc_month_detail(){
		
		$hf_code = $this->uri->segment(3);
		$month 	 = $this->uri->segment(4);
		$year 	 = $this->uri->segment(5);
		$id 	  = $this->users->get_user()->id;
		$district = $this->users->get_district($id);
		//var_dump(substr($hf_code, 0, 3)); die();
		
		if(substr($hf_code, 0, 3) == $district || $this->users->in_group('admin') || $this->users->in_group('management')){
		
			$this->data['month'] = $this->master->_custom_query("select * from dhis_validation_jul18_sep19_primary where hf_code = $hf_code and month = $month and year = $year")->row();
		} else {
			
			return show_error('You are not authorized to view this record');
		}
		
		//var_dump($this->data['month']->result());die();
		
		$this->data['heading'] = "Report for the month of : ".$month.", ".$year." | Health Facility : ".$hf_code;
		
		$this->data['main_content'] = 'month_primary';
    	$this->load->view('includes/template', $this->data);
	}
	
}
