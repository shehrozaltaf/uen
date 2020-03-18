<?php

class Cb extends MX_Controller {

	function __construct() {
	
		parent::__construct();
		
		$this->data = null;
		$this->form_validation->CI =& $this;
		//$this->load->vars('current_url', $this->uri->uri_to_assoc(1));
		$this->load->module("master");
		$this->load->model("cb_model");
		$this->cb = $this->load->database('cb', TRUE);
		
		$this->load->module("users");
		if (!$this->users->logged_in()){
			redirect('users/login', 'refresh');
		}
	}
	
	
	// Dashboard
	public function dashboard(){
		
		//echo $this->users->get_user()->id; die();
		
		if($this->users->in_group('admin') || $this->users->in_group('management')){
			
			$this->data['trainings']   = $this->cb->query("select * from cb_trainings")->num_rows();
			$trainees    			   = $this->cb->query("select count(*) trainees from cb_trainings_detail;")->row();
			$this->data['trainees']    = $trainees->trainees;
			
			$this->data['trainees_70'] = $this->cb->query("select * from cb_trainings_detail where posttest_percentage > 70")->num_rows();
	
			// New Data Queries
	
			$this->data['pretest_trainees_by_percentage'] = $this->cb->query("SELECT
			SUM(CASE WHEN pretest_percentage < 60   THEN 1 ELSE 0 END) AS below_60,
			SUM(CASE WHEN pretest_percentage >= 60  AND pretest_percentage < 70   THEN 1 ELSE 0 END) AS sixty_70,
			SUM(CASE WHEN pretest_percentage >= 70  AND pretest_percentage < 80   THEN 1 ELSE 0 END) AS seventy_80,
			SUM(CASE WHEN pretest_percentage >= 80  AND pretest_percentage < 90   THEN 1 ELSE 0 END) AS eighty_90,
			SUM(CASE WHEN pretest_percentage >= 90  AND pretest_percentage <= 100 THEN 1 ELSE 0 END) AS ninty_100
			FROM cb_trainings_detail")->row();
	
			$this->data['posttest_trainees_by_percentage'] = $this->cb->query("SELECT
			SUM(CASE WHEN posttest_percentage < 60   THEN 1 ELSE 0 END) AS below_60,
			SUM(CASE WHEN posttest_percentage >= 60  AND posttest_percentage < 70   THEN 1 ELSE 0 END) AS sixty_70,
			SUM(CASE WHEN posttest_percentage >= 70  AND posttest_percentage < 80   THEN 1 ELSE 0 END) AS seventy_80,
			SUM(CASE WHEN posttest_percentage >= 80  AND posttest_percentage < 90   THEN 1 ELSE 0 END) AS eighty_90,
			SUM(CASE WHEN posttest_percentage >= 90  AND posttest_percentage <= 100 THEN 1 ELSE 0 END) AS ninty_100
			FROM cb_trainings_detail")->row();
			
			
			$this->data['events_by_name'] = $this->cb->query("SELECT
	SUM(CASE WHEN training_name = 'ALSO' THEN 1 ELSE 0 END) AS ALSO,
	SUM(CASE WHEN training_name = 'GAPP-D' THEN 1 ELSE 0 END) AS GAPPD,
	SUM(CASE WHEN training_name = 'HBB & HBS' THEN 1 ELSE 0 END) AS HBBHBS,
	SUM(CASE WHEN training_name = 'HBB/HBS And Maternal Health Course' THEN 1 ELSE 0 END) AS HBBHBSMH,
	SUM(CASE WHEN training_name = 'Maternal Health' THEN 1 ELSE 0 END) AS MH
	FROM cb_trainings")->row();
	
	
			$this->data['events_by_type'] = $this->cb->query("SELECT
	SUM(CASE WHEN training_type = 'TOT HCPs' THEN 1 ELSE 0 END) AS TOT_HCPs,
	SUM(CASE WHEN training_type = 'TDT HCPs' THEN 1 ELSE 0 END) AS TDT_HCPs,
	SUM(CASE WHEN training_type = 'TOT LHSs' THEN 1 ELSE 0 END) AS TOT_LHSs,
	SUM(CASE WHEN training_type = 'TDT LHWs' THEN 1 ELSE 0 END) AS TDT_LHWs
	FROM cb_trainings")->row();

		} else {
			
			$id 	  = $this->users->get_user()->id;
			$district = $this->users->get_district($id);
			
			$this->data['trainings']   = $this->cb->query("select distinct t.training_id from cb_trainings t
join cb_trainings_detail td on td.training_id = t.training_id
where td.district_code = $district
order by t.training_id")->num_rows();
			
			$trainees    			   = $this->cb->query("select count(*) trainees from cb_trainings_detail where district_code = $district")->row();
			$this->data['trainees']    = $trainees->trainees;
			
			$this->data['trainees_70'] = $this->cb->query("select * from cb_trainings_detail where posttest_percentage > 70 and district_code = $district")->num_rows();
	
			// New Data Queries
	
			$this->data['pretest_trainees_by_percentage'] = $this->cb->query("SELECT
			SUM(CASE WHEN pretest_percentage < 60   THEN 1 ELSE 0 END) AS below_60,
			SUM(CASE WHEN pretest_percentage >= 60  AND pretest_percentage < 70   THEN 1 ELSE 0 END) AS sixty_70,
			SUM(CASE WHEN pretest_percentage >= 70  AND pretest_percentage < 80   THEN 1 ELSE 0 END) AS seventy_80,
			SUM(CASE WHEN pretest_percentage >= 80  AND pretest_percentage < 90   THEN 1 ELSE 0 END) AS eighty_90,
			SUM(CASE WHEN pretest_percentage >= 90  AND pretest_percentage <= 100 THEN 1 ELSE 0 END) AS ninty_100
			FROM cb_trainings_detail where district_code = $district")->row();
	
			$this->data['posttest_trainees_by_percentage'] = $this->cb->query("SELECT
			SUM(CASE WHEN posttest_percentage < 60   THEN 1 ELSE 0 END) AS below_60,
			SUM(CASE WHEN posttest_percentage >= 60  AND posttest_percentage < 70   THEN 1 ELSE 0 END) AS sixty_70,
			SUM(CASE WHEN posttest_percentage >= 70  AND posttest_percentage < 80   THEN 1 ELSE 0 END) AS seventy_80,
			SUM(CASE WHEN posttest_percentage >= 80  AND posttest_percentage < 90   THEN 1 ELSE 0 END) AS eighty_90,
			SUM(CASE WHEN posttest_percentage >= 90  AND posttest_percentage <= 100 THEN 1 ELSE 0 END) AS ninty_100
			FROM cb_trainings_detail where district_code = $district")->row();
			
			
			$this->data['events_by_name'] = $this->cb->query("SELECT
SUM(CASE WHEN training_name = 'ALSO' THEN 1 ELSE 0 END) AS ALSO,
SUM(CASE WHEN training_name = 'GAPP-D' THEN 1 ELSE 0 END) AS GAPPD,
SUM(CASE WHEN training_name = 'HBB & HBS' THEN 1 ELSE 0 END) AS HBBHBS,
SUM(CASE WHEN training_name = 'HBB/HBS And Maternal Health Course' THEN 1 ELSE 0 END) AS HBBHBSMH,
SUM(CASE WHEN training_name = 'Maternal Health' THEN 1 ELSE 0 END) AS MH
FROM cb_trainings where training_id in(select training_id from cb_trainings_detail where district_code = $district)")->row();
	
	
			$this->data['events_by_type'] = $this->cb->query("SELECT
SUM(CASE WHEN training_type = 'TOT HCPs' THEN 1 ELSE 0 END) AS TOT_HCPs,
SUM(CASE WHEN training_type = 'TDT HCPs' THEN 1 ELSE 0 END) AS TDT_HCPs,
SUM(CASE WHEN training_type = 'TOT LHSs' THEN 1 ELSE 0 END) AS TOT_LHSs,
SUM(CASE WHEN training_type = 'TDT LHWs' THEN 1 ELSE 0 END) AS TDT_LHWs
FROM cb_trainings where training_id in(select training_id from cb_trainings_detail where district_code = $district)")->row();
	
		}

		$this->data['heading'] = "Capacity Building";
		
		$this->data['main_content'] = 'dashboard';
    	$this->load->view('includes/template', $this->data);
	}

	// Close DB Connection
	function __destruct() {
		
		$this->db->close();
	}
	
}