<?php

class Ce extends MX_Controller {

	function __construct() {
	
		parent::__construct();
		
		$this->data = null;
		//$this->form_validation->CI =& $this;
		$this->load->vars('current_url', $this->uri->uri_to_assoc(1));
		$this->load->module("master");
		
		$this->load->module("users");
		if (!$this->users->logged_in()){
			redirect('users/login', 'refresh');
		}
	}
	
	
	// Dashboard
	public function dashboard(){
		
		$ce = $this->load->database('ce', TRUE);

		$start_date = $this->input->post('start_date');
		$end_date   = $this->input->post('end_date');

		
		///////   Group By District   ////////////////////
		
		if($this->users->in_group('admin') || $this->users->in_group('management')){
			
			//return show_error('You must be an authorized user to view this page');
			
			$q11 = "SELECT distinct hw.district_id,
	count(distinct lhw.lhwf1a2) as visited_hfs,
	count(distinct lhw.lhwf1a3) as visited_lhws,
	sum(case when u.status > 0 then 1 else 0 end) hh_collected,
	sum(case when u.status = 2 then 1 else 0 end) hh_visited
	FROM (
	SELECT LhwSectionPKId, lhwf1b1, status FROM TableF1F2SectionC where status > 0 UNION
	SELECT LhwSectionPKId, lhwf1b1, status FROM TableF1F2SectionD where status > 0 UNION
	SELECT LhwSectionPKId, lhwf1b1, status FROM TableF1F2SectionE where status > 0 UNION
	SELECT LhwSectionPKId, lhwf1b1, status FROM TableF1F2SectionF where status > 0 UNION
	SELECT LhwSectionPKId, lhwf1b1, status FROM TableF1F2SectionG where status > 0 UNION
	SELECT LhwSectionPKId, lhwf1b1, status FROM TableF1F2SectionH where status > 0) AS u
	JOIN TableLHWSection lhw on lhw.id = u.LhwSectionPKId
	JOIN HW_user hw on hw.id = lhw.lhwf1a3
	JOIN TableMetaData md on md.LHWSectionId = lhw.id
	JOIN TableF3SectionB vhc on vhc.LhwSectionPKId = u.LhwSectionPKId
	where hw.district_id is not null and md.InterviewAceptable = 1";
			///////   Group By District   ////////////////////
			
			///////   Group By Tehsil   ////////////////////
			$q44 = "SELECT distinct hw.tehsil_id,
	count(distinct lhw.lhwf1a2) as visited_hfs,
	count(distinct lhw.lhwf1a3) as visited_lhws,
	sum(case when u.status > 0 then 1 else 0 end) hh_collected,
	sum(case when u.status = 2 then 1 else 0 end) hh_visited
	FROM (
	SELECT LhwSectionPKId, lhwf1b1, status FROM TableF1F2SectionC where status > 0 UNION
	SELECT LhwSectionPKId, lhwf1b1, status FROM TableF1F2SectionD where status > 0 UNION
	SELECT LhwSectionPKId, lhwf1b1, status FROM TableF1F2SectionE where status > 0 UNION
	SELECT LhwSectionPKId, lhwf1b1, status FROM TableF1F2SectionF where status > 0 UNION
	SELECT LhwSectionPKId, lhwf1b1, status FROM TableF1F2SectionG where status > 0 UNION
	SELECT LhwSectionPKId, lhwf1b1, status FROM TableF1F2SectionH where status > 0) AS u
	JOIN TableLHWSection lhw on lhw.id = u.LhwSectionPKId
	JOIN HW_user hw on hw.id = lhw.lhwf1a3
	JOIN TableMetaData md on md.LHWSectionId = lhw.id
	JOIN TableF3SectionB vhc on vhc.LhwSectionPKId = u.LhwSectionPKId
	where hw.tehsil_id is not null and md.InterviewAceptable = 1";

		} else {
			
			$id 	  = $this->users->get_user()->id;
			$district = $this->users->get_district($id);
			
			$q11 = "SELECT distinct hw.district_id,
	count(distinct lhw.lhwf1a2) as visited_hfs,
	count(distinct lhw.lhwf1a3) as visited_lhws,
	sum(case when u.status > 0 then 1 else 0 end) hh_collected,
	sum(case when u.status = 2 then 1 else 0 end) hh_visited
	FROM (
	SELECT LhwSectionPKId, lhwf1b1, status FROM TableF1F2SectionC where status > 0 UNION
	SELECT LhwSectionPKId, lhwf1b1, status FROM TableF1F2SectionD where status > 0 UNION
	SELECT LhwSectionPKId, lhwf1b1, status FROM TableF1F2SectionE where status > 0 UNION
	SELECT LhwSectionPKId, lhwf1b1, status FROM TableF1F2SectionF where status > 0 UNION
	SELECT LhwSectionPKId, lhwf1b1, status FROM TableF1F2SectionG where status > 0 UNION
	SELECT LhwSectionPKId, lhwf1b1, status FROM TableF1F2SectionH where status > 0) AS u
	JOIN TableLHWSection lhw on lhw.id = u.LhwSectionPKId
	JOIN HW_user hw on hw.id = lhw.lhwf1a3
	JOIN TableMetaData md on md.LHWSectionId = lhw.id
	JOIN TableF3SectionB vhc on vhc.LhwSectionPKId = u.LhwSectionPKId
	where hw.district_id is not null and md.InterviewAceptable = 1 and hw.district_id = $district";
			///////   Group By District   ////////////////////
			
			///////   Group By Tehsil   ////////////////////
			$q44 = "SELECT distinct hw.tehsil_id,
	count(distinct lhw.lhwf1a2) as visited_hfs,
	count(distinct lhw.lhwf1a3) as visited_lhws,
	sum(case when u.status > 0 then 1 else 0 end) hh_collected,
	sum(case when u.status = 2 then 1 else 0 end) hh_visited
	FROM (
	SELECT LhwSectionPKId, lhwf1b1, status FROM TableF1F2SectionC where status > 0 UNION
	SELECT LhwSectionPKId, lhwf1b1, status FROM TableF1F2SectionD where status > 0 UNION
	SELECT LhwSectionPKId, lhwf1b1, status FROM TableF1F2SectionE where status > 0 UNION
	SELECT LhwSectionPKId, lhwf1b1, status FROM TableF1F2SectionF where status > 0 UNION
	SELECT LhwSectionPKId, lhwf1b1, status FROM TableF1F2SectionG where status > 0 UNION
	SELECT LhwSectionPKId, lhwf1b1, status FROM TableF1F2SectionH where status > 0) AS u
	JOIN TableLHWSection lhw on lhw.id = u.LhwSectionPKId
	JOIN HW_user hw on hw.id = lhw.lhwf1a3
	JOIN TableMetaData md on md.LHWSectionId = lhw.id
	JOIN TableF3SectionB vhc on vhc.LhwSectionPKId = u.LhwSectionPKId
	where hw.tehsil_id is not null and md.InterviewAceptable = 1 and hw.district_id = $district";
		}
		
		///////   Group By Tehsil   ////////////////////


		
		if(!empty($start_date) && !empty($end_date)){
		
			$q11 .= " and CONVERT(date, substring(md.datetimeupload, 1, 10), 105) between '$start_date' and '$end_date'";
			
			$this->data['start_date'] = $start_date;
			$this->data['end_date']   = $end_date;
		} else {
			$q11 .= " and month(CONVERT(date, substring(md.datetimeupload, 1, 10), 105)) = month(getdate())";
		}
		
		$q11 .= " group by hw.district_id order by hw.district_id";
		$q1  = $ce->query($q11)->result();
		
		$result = array();
		
		foreach($q1 as $r1){
			
			$result[] = array(
				'district_id'  =>$r1->district_id,
				'visited_hfs'  =>$r1->visited_hfs,
				'visited_lhws' =>$r1->visited_lhws,
				'hh_collected' =>$r1->hh_collected,
				'hh_visited'   =>$r1->hh_visited,
			);
		}
		
		$this->data['result'] = $result;
		
		
		
		
		if(!empty($start_date) && !empty($end_date)){
		
			$q44 .= " and CONVERT(date, substring(md.datetimeupload, 1, 10), 105) between '$start_date' and '$end_date'";
		} else {
			$q44 .= " and month(CONVERT(date, substring(md.datetimeupload, 1, 10), 105)) = month(getdate())";
		}
		
		$q44 .= " group by hw.tehsil_id order by hw.tehsil_id";

		$q4 = $ce->query($q44)->result();
		
		$result2 = array();
		
		foreach($q4 as $r4){
			
			$result2[] = array(
				'tehsil_id'    =>$r4->tehsil_id,
				'visited_hfs'  =>$r4->visited_hfs,
				'visited_lhws' =>$r4->visited_lhws,
				'hh_collected' =>$r4->hh_collected,
				'hh_visited'   =>$r4->hh_visited,
			);
		}
		
		$this->data['result2'] = $result2;
		
		$this->data['heading'] = "Community Engagement";
		
		$this->data['main_content'] = 'dashboard';
		$this->load->view('includes/template', $this->data);
	}
	
	
	
	
	
	// Household
	public function household(){
		
		$ce = $this->load->database('ce', TRUE);

		$this->data['neonatal_deaths']       = $ce->query("select * from TableF1F2SectionE where lhwf1b1 != '00' and lhwf1e8  = 1")->num_rows();
		$this->data['child_deaths_diarrhea'] = $ce->query("select * from TableF1F2SectionF where lhwf1b1 != '00' and lhwf1f10 = 1")->num_rows();
		$this->data['child_deaths_cough']    = $ce->query("select * from TableF1F2SectionG where lhwf1b1 != '00' and lhwf1g9 = 1")->num_rows();
		
		$this->data['heading'] = "Household";
		
		$this->data['main_content'] = 'household';
    	$this->load->view('includes/template', $this->data);
	}
	
	
	// VHC
	public function vhc(){
		
		$ce = $this->load->database('ce', TRUE);

		$vhc = "select count(f3sb.id) total_vhc_visited,
sum(case when f3sb.lhwf3b1 = 1 then 1 else 0 end) form_vhc_yes,
sum(case when f3sb.lhwf3b1 in(0, 2) then 1 else 0 end) form_vhc_no,

sum(case when f3sb.lhwf3b2 = 1 then 1 else 0 end) vhc_meeting_recording_form_yes,
sum(case when f3sb.lhwf3b2 in(0, 2) then 1 else 0 end) vhc_meeting_recording_form_no,

sum(case when f3sb.lhwf3b5 = 1 then 1 else 0 end) meeting_counducted_last_month_yes,
sum(case when f3sb.lhwf3b5 in(0, 2) then 1 else 0 end) meeting_counducted_last_month_no,

sum(case when f3sb.lhwf3b6 = 1 then 1 else 0 end) record_kept_last_meeting_yes,
sum(case when f3sb.lhwf3b6 in(0, 2) then 1 else 0 end) record_kept_last_meeting_no

from TableF3SectionB f3sb
join TableLHWSection lhw on f3sb.LhwSectionPKId = lhw.id
join TableMetaData md on md.LHWSectionId = lhw.id where f3sb.lhwf3b1 != '00'";

		$start_date = $this->input->post('start_date');
		$end_date   = $this->input->post('end_date');
		
		if(!empty($start_date) && !empty($end_date)){
		
			$vhc         .=" and CONVERT(date, substring(md.datetimeupload, 1, 10), 105) between '".$start_date."' and '".$end_date."'";
		} else {
			
			$vhc         .=" and month(CONVERT(date, substring(md.datetimeupload, 1, 10), 105)) = month(getdate())";
		}
		
		$this->data['vhc'] = $ce->query($vhc)->row();
		
		$this->data['heading'] = "Village Health Committees";
		
		$this->data['main_content'] = 'vhc';
    	$this->load->view('includes/template', $this->data);
	}
	
	
	// WSG
	public function wsg(){
		
		$ce = $this->load->database('ce', TRUE);

		$wsg = "select count(f5sb.id) total_wsg_visited,
sum(case when f5sb.lhwf5b1 = 1 then 1 else 0 end) form_wsg_yes,
sum(case when f5sb.lhwf5b1 = 2 then 1 else 0 end) form_wsg_no,
sum(case when f5sb.lhwf5b1 = 0 then 1 else 0 end) form_wsg_zerofill,
sum(cast(f5sb.lhwf5b2 as int)) as wsg_formed_by_lhw,
sum(cast(f5sb.lhwf5b3 as int)) as meeting_held
from TableF5SectionB f5sb
join TableLHWSection lhw on f5sb.LhwSectionPKId = lhw.id
join TableMetaData md on md.LHWSectionId = lhw.id where f5sb.lhwf5b1 != '00'";

		$start_date = $this->input->post('start_date');
		$end_date   = $this->input->post('end_date');
		
		if(!empty($start_date) && !empty($end_date)){
		
			$wsg         .=" and CONVERT(date, substring(md.datetimeupload, 1, 10), 105) between '".$start_date."' and '".$end_date."'";
		} else {
			
			$wsg         .=" and month(CONVERT(date, substring(md.datetimeupload, 1, 10), 105)) = month(getdate())";
		}
		
		$this->data['wsg'] = $ce->query($wsg)->row();
		$this->data['heading'] = "Women Support Groups";
		
		$this->data['main_content'] = 'wsg';
    	$this->load->view('includes/template', $this->data);
	}
	
}