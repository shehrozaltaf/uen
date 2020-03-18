<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spc extends MX_Controller
{


	function __construct(){

		$this->spc = $this->load->database('uen_ml', TRUE);


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
	
	function app_version(){
		
		$id 	  = $this->users->get_user()->id;
		if($id == 1 or $id == 2 or $id == 3){
		
			$app_version1 = '1.2.820';
			$app_version2 = '1.2.819';
			
			$this->data['get_list'] = $this->spc->query("SELECT * FROM 
			(SELECT substring(cluster_code, 1, 3) as district, deviceid, col_id, convert(date, col_dt) datee, 
			appversion, tagid, username, 
			ROW_NUMBER() OVER (PARTITION BY deviceid ORDER BY col_id DESC) AS [ROW NUMBER] FROM forms) groups
			WHERE groups.[ROW NUMBER] = 1 and username != 'afg12345'
			ORDER BY groups.datee ASC");

			$this->data['app_version1'] = $app_version1;
			$this->data['app_version2'] = $app_version2;

			/*$this->data['get_list2'] = $this->spc->query("SELECT * FROM 
			(SELECT substring(cluster_code, 1, 3) as district, deviceid, col_id, convert(date, col_dt) datee, 
			appversion, tagid, username, 
			ROW_NUMBER() OVER (PARTITION BY deviceid ORDER BY col_id DESC) AS [ROW NUMBER] FROM forms) groups
			WHERE groups.[ROW NUMBER] = 1 and username != 'afg12345' and(appversion like concat('%','".$app_version1."','%') or appversion like concat('%','".$app_version2."','%'))
			ORDER BY groups.datee ASC");

			$this->data['get_list3'] = $this->spc->query("SELECT * FROM 
			(SELECT substring(cluster_code, 1, 3) as district, deviceid, col_id, convert(date, col_dt) datee, 
			appversion, tagid, username, 
			ROW_NUMBER() OVER (PARTITION BY deviceid ORDER BY col_id DESC) AS [ROW NUMBER] FROM forms) groups
			WHERE groups.[ROW NUMBER] = 1 and username != 'afg12345' and(appversion not like concat('%','".$app_version1."','%') and appversion not like concat('%','".$app_version2."', '%'))
			ORDER BY groups.datee ASC");*/

			//var_dump($this->data['get_list3']->result());die();

		} else {
			return show_error('You must be an authorized user to view this page.');
		}
		
		$this->data['heading']  	= "Tab Version";
		$this->data['message']  	= $this->session->flashdata('message');
		$this->data['main_content'] = 'spc/app_version';
		$this->load->view('includes/template', $this->data);
	}
	
	
	function ml_dashboard(){
		
		$this->data['heading'] = "Midline Household Survey Collection Progress";
		
		if($this->users->in_group('admin') || $this->users->in_group('management')){

			$this->data['clusters_by_district'] = $this->spc->query("select dist_id, 
			count(*) clusters_by_district from clusters where cluster_no not like '%501' and cluster_no not like '%502' and col_flag = '0'
			group by dist_id order by dist_id");

			$this->data['randomized_clusters'] = $this->spc->query("select dist_id,
			sum(case when randomized = '1' then 1 else 0 end) randomized_c
			from clusters where cluster_no not like '%501' and cluster_no not like '%502' and cluster_no != 'null' and col_flag = '0'
			group by dist_id order by dist_id");

			$completed_clusters = $this->spc->query("select c.dist_id, c.cluster_no,
			(select count(*) from ml_randomised where dist_id = c.dist_id and hh02 = c.cluster_no) as hh_randomized,
			(select count(distinct hhno) from forms where dist_id = c.dist_id and cluster_code = c.cluster_no and istatus in('1', '2', '3', '4', '5', '6', '7', '96') and username not in('afg12345','user0001','user0113','user0123','user0211','user0234','user0252','user0414','user0432', 'user0434')) as hh_collected
			from clusters c
			where c.cluster_no not like '%501' and c.cluster_no not like '%502' and c.cluster_no != 'null' and c.randomized = '1' and c.col_flag = '0'
			group by c.dist_id, c.cluster_no order by c.dist_id");

			$cc_d113 = 0;
			$cc_d123 = 0;
			$cc_d211 = 0;
			$cc_d234 = 0;
			$cc_d252 = 0;
			$cc_d414 = 0;
			$cc_d432 = 0;
			$cc_d434 = 0;
			
			foreach($completed_clusters->result() as $r1){

				if($r1->dist_id == '113' and $r1->hh_randomized == $r1->hh_collected){
					$cc_d113 = $cc_d113 + 1;
				} else if($r1->dist_id == '123' and $r1->hh_randomized == $r1->hh_collected){
					$cc_d123 = $cc_d123 + 1;
				} else if($r1->dist_id == '211' and $r1->hh_randomized == $r1->hh_collected){
					$cc_d211 = $cc_d211 + 1;
				} else if($r1->dist_id == '234' and $r1->hh_randomized == $r1->hh_collected){
					$cc_d234 = $cc_d234 + 1;
				} else if($r1->dist_id == '252' and $r1->hh_randomized == $r1->hh_collected){
					$cc_d252 = $cc_d252 + 1;
				} else if($r1->dist_id == '414' and $r1->hh_randomized == $r1->hh_collected){
					$cc_d414 = $cc_d414 + 1;
				} else if($r1->dist_id == '432' and $r1->hh_randomized == $r1->hh_collected){
					$cc_d432 = $cc_d432 + 1;
				} else if($r1->dist_id == '434' and $r1->hh_randomized == $r1->hh_collected){
					$cc_d434 = $cc_d434 + 1;
				}
			}

			$this->data['cc_d113'] = $cc_d113;
			$this->data['cc_d123'] = $cc_d123;
			$this->data['cc_d211'] = $cc_d211;
			$this->data['cc_d234'] = $cc_d234;
			$this->data['cc_d252'] = $cc_d252;
			$this->data['cc_d414'] = $cc_d414;
			$this->data['cc_d432'] = $cc_d432;
			$this->data['cc_d434'] = $cc_d434;

			$this->data['cc_total'] = $cc_d113 + $cc_d123 + $cc_d211 + $cc_d234 + $cc_d252 + $cc_d414 + $cc_d432 + $cc_d434;


			$remaining_clusters = $this->spc->query("select c.dist_id, c.cluster_no,
			(select count(*) from ml_randomised where dist_id = c.dist_id and hh02 = c.cluster_no) as hh_randomized,
			(select count(distinct hhno) from forms where dist_id = c.dist_id and cluster_code = c.cluster_no and istatus in('1', '2', '3', '4', '5', '6', '7', '96') and username not in('afg12345','user0001','user0113','user0123','user0211','user0234','user0252','user0414','user0432', 'user0434')) as hh_collected
			from clusters c
			where c.cluster_no not like '%501' and c.cluster_no not like '%502' and c.cluster_no != 'null' and c.randomized = '1' and c.col_flag = '0'
			group by c.dist_id, c.cluster_no order by c.dist_id");

			$rc_d113 = 0;
			$rc_d123 = 0;
			$rc_d211 = 0;
			$rc_d234 = 0;
			$rc_d252 = 0;
			$rc_d414 = 0;
			$rc_d432 = 0;
			$rc_d434 = 0;
			
			foreach($remaining_clusters->result() as $r2){

				if($r2->dist_id == '113' and $r2->hh_collected < $r2->hh_randomized){
					$rc_d113 = $rc_d113 + 1;
				} else if($r2->dist_id == '123' and $r2->hh_collected < $r2->hh_randomized){
					$rc_d123 = $rc_d123 + 1;
				} else if($r2->dist_id == '211' and $r2->hh_collected < $r2->hh_randomized){
					$rc_d211 = $rc_d211 + 1;
				} else if($r2->dist_id == '234' and $r2->hh_collected < $r2->hh_randomized){
					$rc_d234 = $rc_d234 + 1;
				} else if($r2->dist_id == '252' and $r2->hh_collected < $r2->hh_randomized){
					$rc_d252 = $rc_d252 + 1;
				} else if($r2->dist_id == '414' and $r2->hh_collected < $r2->hh_randomized){
					$rc_d414 = $rc_d414 + 1;
				} else if($r2->dist_id == '432' and $r2->hh_collected < $r2->hh_randomized){
					$rc_d432 = $rc_d432 + 1;
				} else if($r2->dist_id == '434' and $r2->hh_collected < $r2->hh_randomized){
					$rc_d434 = $rc_d434 + 1;
				}
			}

			$this->data['rc_d113'] = $rc_d113;
			$this->data['rc_d123'] = $rc_d123;
			$this->data['rc_d211'] = $rc_d211;
			$this->data['rc_d234'] = $rc_d234;
			$this->data['rc_d252'] = $rc_d252;
			$this->data['rc_d414'] = $rc_d414;
			$this->data['rc_d432'] = $rc_d432;
			$this->data['rc_d434'] = $rc_d434;

			$this->data['rc_total'] = $rc_d113 + $rc_d123 + $rc_d211 + $rc_d234 + $rc_d252 + $rc_d414 + $rc_d432 + $rc_d434;
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			if(!empty($this->uri->segment(3))){
				
				$type = substr($this->uri->segment(3), 0, 2);
				$d    = substr($this->uri->segment(3), 4, 3);

				if($type == 'rc'){

					$this->data['get_list'] = $this->spc->query("select l.enumcode, l.hh02,
					(select count(*) from(select distinct hh03, tabNo from listings where hh04 in('1','2') and hh02 = l.hh02) as structures) as structures,
					(select count(*) from(select distinct hh03, tabNo from listings where hh04 = '1' and hh02 = l.hh02) as structures) as residential_structures,
					sum(case when hh04 = '1' and hh15 != '1' then 1 else 0 end) as households,
					sum(case when hh04 = '1' and hh15 != '1' and hh10 = '1' then 1 else 0 end) as eligible_households,
					(select count(*) from ml_randomised where hh02 = l.hh02) as randomized_households,
					(select count(distinct rndid) from forms where cluster_code = l.hh02 and istatus in('1', '2', '3', '4', '5', '6', '7', '96') and username not in('afg12345','user0001','user0113','user0123','user0211','user0234','user0252','user0414','user0432', 'user0434')) as collected_households,
					(select sum(cast(hh11 as int)) from listings where hh04 = '1' and hh15 != '1' and hh10 = '1' and hh02 = l.hh02) as no_of_eligible_wras,
					(select count(distinct deviceid) from listings where hh02 = l.hh02) as collecting_tabs,
					(select count(*) completed_tabs from(select deviceid, max(cast(hh03 as int)) ms from listings where hh02 = l.hh02 and hh04 = '9' group by deviceid) AS completed_tabs) completed_tabs
					from clusters c
					left join listings l on l.hh02 = c.cluster_no
					where l.enumcode = '$d' and l.hh02 not like '%501' and l.hh02 not like '%502' and l.hh02 != 'null' and c.randomized = '1'
					and l.username not in('afg12345','user0001','user0113','user0123','user0211','user0234','user0252','user0414','user0432', 'user0434')
					and c.col_flag = '0'
					group by l.enumcode, l.hh02
					order by l.enumcode,l.hh02");
					
				} else if($type == 'cc'){

					$this->data['get_list'] = $this->spc->query("select l.enumcode, l.hh02,
					(select count(*) from(select distinct hh03, tabNo from listings where hh04 in('1','2') and hh02 = l.hh02) as structures) as structures,
					(select count(*) from(select distinct hh03, tabNo from listings where hh04 = '1' and hh02 = l.hh02) as structures) as residential_structures,
					sum(case when hh04 = '1' and hh15 != '1' then 1 else 0 end) as households,
					sum(case when hh04 = '1' and hh15 != '1' and hh10 = '1' then 1 else 0 end) as eligible_households,
					(select count(*) from ml_randomised where hh02 = l.hh02) as randomized_households,
					(select count(distinct rndid) from forms where cluster_code = l.hh02 and istatus in('1', '2', '3', '4', '5', '6', '7', '96') and username not in('afg12345','user0001','user0113','user0123','user0211','user0234','user0252','user0414','user0432', 'user0434')) as collected_households,
					(select sum(cast(hh11 as int)) from listings where hh04 = '1' and hh15 != '1' and hh10 = '1' and hh02 = l.hh02) as no_of_eligible_wras,
					(select count(distinct deviceid) from listings where hh02 = l.hh02) as collecting_tabs,
					(select count(*) completed_tabs from(select deviceid, max(cast(hh03 as int)) ms from listings where hh02 = l.hh02 and hh04 = '9' group by deviceid) AS completed_tabs) completed_tabs
					from clusters c
					left join listings l on l.hh02 = c.cluster_no
					where l.enumcode = '$d' and l.hh02 not like '%501' and l.hh02 not like '%502' and l.hh02 != 'null' and c.randomized = '1'
					and l.username not in('afg12345','user0001','user0113','user0123','user0211','user0234','user0252','user0414','user0432', 'user0434')
					and (select count(*) from ml_randomised where dist_id = l.enumcode and hh02 = l.hh02) = (select count(distinct rndid) from forms where SUBSTRING(cluster_code, 1, 3) = l.enumcode and cluster_code = l.hh02 and istatus in('1', '2', '3', '4', '5', '6', '7', '96') and username not in('afg12345','user0001','user0113','user0123','user0211','user0234','user0252','user0414','user0432', 'user0434'))
					and c.col_flag = '0'
					group by l.enumcode, l.hh02
					order by l.enumcode,l.hh02");

				} else if($type == 'ic'){

					$this->data['get_list'] = $this->spc->query("select l.enumcode, l.hh02,
					(select count(*) from(select distinct hh03, tabNo from listings where hh04 in('1','2') and hh02 = l.hh02) as structures) as structures,
					(select count(*) from(select distinct hh03, tabNo from listings where hh04 = '1' and hh02 = l.hh02) as structures) as residential_structures,
					sum(case when hh04 = '1' and hh15 != '1' then 1 else 0 end) as households,
					sum(case when hh04 = '1' and hh15 != '1' and hh10 = '1' then 1 else 0 end) as eligible_households,
					(select count(*) from ml_randomised where hh02 = l.hh02) as randomized_households,
					(select count(distinct rndid) from forms where cluster_code = l.hh02 and istatus in('1', '2', '3', '4', '5', '6', '7', '96') and username not in('afg12345','user0001','user0113','user0123','user0211','user0234','user0252','user0414','user0432', 'user0434')) as collected_households,
					(select sum(cast(hh11 as int)) from listings where hh04 = '1' and hh15 != '1' and hh10 = '1' and hh02 = l.hh02) as no_of_eligible_wras,
					(select count(distinct deviceid) from listings where hh02 = l.hh02) as collecting_tabs,
					(select count(*) completed_tabs from(select deviceid, max(cast(hh03 as int)) ms from listings where hh02 = l.hh02 and hh04 = '9' group by deviceid) AS completed_tabs) completed_tabs
					from clusters c
					left join listings l on l.hh02 = c.cluster_no
					where l.enumcode = '$d' and l.hh02 not like '%501' and l.hh02 not like '%502' and l.hh02 != 'null' and c.randomized = '1'
					and l.username not in('afg12345','user0001','user0113','user0123','user0211','user0234','user0252','user0414','user0432', 'user0434')
					and (select count(*) from ml_randomised where dist_id = l.enumcode and hh02 = l.hh02) != (select count(distinct rndid) from forms where SUBSTRING(cluster_code, 1, 3) = l.enumcode and cluster_code = l.hh02 and istatus in('1', '2', '3', '4', '5', '6', '7', '96') and username not in('afg12345','user0001','user0113','user0123','user0211','user0234','user0252','user0414','user0432', 'user0434'))
					and c.col_flag = '0'
					group by l.enumcode, l.hh02
					order by l.enumcode,l.hh02");

				}

			} else {
				
				$this->data['get_list'] = $this->spc->query("select l.enumcode, l.hh02,
				(select count(*) from(select distinct hh03, tabNo from listings where hh04 in('1','2') and hh02 = l.hh02) as structures) as structures,
				(select count(*) from(select distinct hh03, tabNo from listings where hh04 = '1' and hh02 = l.hh02) as structures) as residential_structures,
				sum(case when hh04 = '1' and hh15 != '1' then 1 else 0 end) as households,
				sum(case when hh04 = '1' and hh15 != '1' and hh10 = '1' then 1 else 0 end) as eligible_households,
				(select count(*) from ml_randomised where hh02 = l.hh02) as randomized_households,
				(select count(distinct rndid) from forms where cluster_code = l.hh02 and istatus in('1', '2', '3', '4', '5', '6', '7', '96') and username not in('afg12345','user0001','user0113','user0123','user0211','user0234','user0252','user0414','user0432', 'user0434')) as collected_households,
				(select sum(cast(hh11 as int)) from listings where hh04 = '1' and hh15 != '1' and hh10 = '1' and hh02 = l.hh02) as no_of_eligible_wras,
				(select count(distinct deviceid) from listings where hh02 = l.hh02) as collecting_tabs,
				(select count(*) completed_tabs from(select deviceid, max(cast(hh03 as int)) ms from listings where hh02 = l.hh02 and hh04 = '9' group by deviceid) AS completed_tabs) completed_tabs
				from clusters c
				left join listings l on l.hh02 = c.cluster_no
				where l.hh02 not like '%501' and l.hh02 not like '%502' and l.hh02 != 'null' and c.randomized = '1'
				and l.username not in('afg12345','user0001','user0113','user0123','user0211','user0234','user0252','user0414','user0432', 'user0434')
				and c.col_flag = '0'
				group by l.enumcode, l.hh02
				order by l.enumcode,l.hh02");
			} 

			
		} else {

			$id 	  = $this->users->get_user()->id;
			$district = $this->users->get_district($id);
			
			$this->data['clusters_by_district'] = $this->spc->query("select dist_id, 
			count(*) clusters_by_district from clusters where cluster_no not like '%501' and cluster_no not like '%502' and dist_id = '$district' and col_flag = '0'
			group by dist_id order by dist_id");


			$this->data['randomized_clusters'] = $this->spc->query("select dist_id,
			sum(case when randomized = '1' then 1 else 0 end) randomized_c
			from clusters where cluster_no not like '%501' and cluster_no not like '%502' and cluster_no != 'null' and dist_id = '$district' and col_flag = '0'
			group by dist_id order by dist_id");


			$completed_clusters = $this->spc->query("select c.dist_id, c.cluster_no,
			(select count(*) from ml_randomised where dist_id = c.dist_id and hh02 = c.cluster_no) as hh_randomized,
			(select count(distinct hhno) from forms where dist_id = c.dist_id and cluster_code = c.cluster_no and istatus in('1', '2', '3', '4', '5', '6', '7', '96') and username not in('afg12345','user0001','user0113','user0123','user0211','user0234','user0252','user0414','user0432', 'user0434')) as hh_collected
			from clusters c
			where c.cluster_no not like '%501' and c.cluster_no not like '%502' and c.cluster_no != 'null' and c.randomized = '1'  and c.dist_id = '$district' and c.col_flag = '0'
			group by c.dist_id, c.cluster_no order by c.dist_id");

			$cc_d113 = 0;
			$cc_d123 = 0;
			$cc_d211 = 0;
			$cc_d234 = 0;
			$cc_d252 = 0;
			$cc_d414 = 0;
			$cc_d432 = 0;
			$cc_d434 = 0;
			
			foreach($completed_clusters->result() as $r1){

				if($r1->dist_id == '113' and $r1->hh_randomized == $r1->hh_collected){
					$cc_d113 = $cc_d113 + 1;
				} else if($r1->dist_id == '123' and $r1->hh_randomized == $r1->hh_collected){
					$cc_d123 = $cc_d123 + 1;
				} else if($r1->dist_id == '211' and $r1->hh_randomized == $r1->hh_collected){
					$cc_d211 = $cc_d211 + 1;
				} else if($r1->dist_id == '234' and $r1->hh_randomized == $r1->hh_collected){
					$cc_d234 = $cc_d234 + 1;
				} else if($r1->dist_id == '252' and $r1->hh_randomized == $r1->hh_collected){
					$cc_d252 = $cc_d252 + 1;
				} else if($r1->dist_id == '414' and $r1->hh_randomized == $r1->hh_collected){
					$cc_d414 = $cc_d414 + 1;
				} else if($r1->dist_id == '432' and $r1->hh_randomized == $r1->hh_collected){
					$cc_d432 = $cc_d432 + 1;
				} else if($r1->dist_id == '434' and $r1->hh_randomized == $r1->hh_collected){
					$cc_d434 = $cc_d434 + 1;
				}
			}

			$this->data['cc_d113'] = $cc_d113;
			$this->data['cc_d123'] = $cc_d123;
			$this->data['cc_d211'] = $cc_d211;
			$this->data['cc_d234'] = $cc_d234;
			$this->data['cc_d252'] = $cc_d252;
			$this->data['cc_d414'] = $cc_d414;
			$this->data['cc_d432'] = $cc_d432;
			$this->data['cc_d434'] = $cc_d434;

			$this->data['cc_total'] = $cc_d113 + $cc_d123 + $cc_d211 + $cc_d234 + $cc_d252 + $cc_d414 + $cc_d432 + $cc_d434;


			$remaining_clusters = $this->spc->query("select c.dist_id, c.cluster_no,
			(select count(*) from ml_randomised where dist_id = c.dist_id and hh02 = c.cluster_no) as hh_randomized,
			(select count(distinct hhno) from forms where dist_id = c.dist_id and cluster_code = c.cluster_no and istatus in('1', '2', '3', '4', '5', '6', '7', '96') and username not in('afg12345','user0001','user0113','user0123','user0211','user0234','user0252','user0414','user0432', 'user0434')) as hh_collected
			from clusters c
			where c.cluster_no not like '%501' and c.cluster_no not like '%502' and c.cluster_no != 'null' and c.randomized = '1' and c.dist_id = '$district' and c.col_flag = '0'
			group by c.dist_id, c.cluster_no order by c.dist_id");

			$rc_d113 = 0;
			$rc_d123 = 0;
			$rc_d211 = 0;
			$rc_d234 = 0;
			$rc_d252 = 0;
			$rc_d414 = 0;
			$rc_d432 = 0;
			$rc_d434 = 0;
			
			foreach($remaining_clusters->result() as $r2){

				if($r2->dist_id == '113' and $r2->hh_collected < $r2->hh_randomized){
					$rc_d113 = $rc_d113 + 1;
				} else if($r2->dist_id == '123' and $r2->hh_collected < $r2->hh_randomized){
					$rc_d123 = $rc_d123 + 1;
				} else if($r2->dist_id == '211' and $r2->hh_collected < $r2->hh_randomized){
					$rc_d211 = $rc_d211 + 1;
				} else if($r2->dist_id == '234' and $r2->hh_collected < $r2->hh_randomized){
					$rc_d234 = $rc_d234 + 1;
				} else if($r2->dist_id == '252' and $r2->hh_collected < $r2->hh_randomized){
					$rc_d252 = $rc_d252 + 1;
				} else if($r2->dist_id == '414' and $r2->hh_collected < $r2->hh_randomized){
					$rc_d414 = $rc_d414 + 1;
				} else if($r2->dist_id == '432' and $r2->hh_collected < $r2->hh_randomized){
					$rc_d432 = $rc_d432 + 1;
				} else if($r2->dist_id == '434' and $r2->hh_collected < $r2->hh_randomized){
					$rc_d434 = $rc_d434 + 1;
				}
			}

			$this->data['rc_d113'] = $rc_d113;
			$this->data['rc_d123'] = $rc_d123;
			$this->data['rc_d211'] = $rc_d211;
			$this->data['rc_d234'] = $rc_d234;
			$this->data['rc_d252'] = $rc_d252;
			$this->data['rc_d414'] = $rc_d414;
			$this->data['rc_d432'] = $rc_d432;
			$this->data['rc_d434'] = $rc_d434;

			$this->data['rc_total'] = $rc_d113 + $rc_d123 + $rc_d211 + $rc_d234 + $rc_d252 + $rc_d414 + $rc_d432 + $rc_d434;


			$this->data['get_list'] = $this->spc->query("select l.enumcode, l.hh02,
			(select count(*) from(select distinct hh03, tabNo from listings where hh04 in('1','2') and hh02 = l.hh02) as structures) as structures,
			(select count(*) from(select distinct hh03, tabNo from listings where hh04 = '1' and hh02 = l.hh02) as structures) as residential_structures,
			sum(case when hh04 = '1' and hh15 != '1' then 1 else 0 end) as households,
			sum(case when hh04 = '1' and hh15 != '1' and hh10 = '1' then 1 else 0 end) as eligible_households,
			(select count(*) from ml_randomised where hh02 = l.hh02) as randomized_households,
			(select count(distinct rndid) from forms where cluster_code = l.hh02 and istatus in('1', '2', '3', '4', '5', '6', '7', '96') and username not in('afg12345','user0001','user0113','user0123','user0211','user0234','user0252','user0414','user0432', 'user0434')) as collected_households,
			(select sum(cast(hh11 as int)) from listings where hh04 = '1' and hh15 != '1' and hh10 = '1' and hh02 = l.hh02) as no_of_eligible_wras,
			(select count(distinct deviceid) from listings where hh02 = l.hh02) as collecting_tabs,
			(select count(*) completed_tabs from(select deviceid, max(cast(hh03 as int)) ms from listings where hh02 = l.hh02 and hh04 = '9' group by deviceid) AS completed_tabs) completed_tabs
			from clusters c
			left join listings l on l.hh02 = c.cluster_no
			where l.enumcode = '$district' and l.hh02 not like '%501' and l.hh02 not like '%502' and l.hh02 != 'null' and c.randomized = '1'
			and l.username not in('afg12345','user0001','user0113','user0123','user0211','user0234','user0252','user0414','user0432', 'user0434')
			and c.col_flag = '0'
			group by l.enumcode, l.hh02
			order by l.enumcode,l.hh02");

		}

		$this->data['message']  	= $this->session->flashdata('message');
		$this->data['main_content'] = 'spc/ml_dashboard';
		$this->load->view('includes/template', $this->data);
	}

	function index(){
		
		$this->data['heading'] = "Midline Household Survey Linelisting Progress";
		
		if($this->users->in_group('admin') || $this->users->in_group('management')){
			
			$this->data['clusters_by_district'] = $this->spc->query("select dist_id, 
			count(*) clusters_by_district from clusters where cluster_no not like '%501' and cluster_no not like '%502' and col_flag = '0'
			group by dist_id order by dist_id");

			$cip_clusters = $this->spc->query("select l.enumcode, l.hh02,
			(select count(distinct deviceid) from listings where hh02 = l.hh02 and enumcode = l.enumcode) as collecting_tabs,
			(select count(*) completed_tabs from(select deviceid, max(cast(hh03 as int)) ms from listings where enumcode = l.enumcode and hh02 = l.hh02 and hh04 = 9 group by deviceid) AS completed_tabs) completed_tabs
			from clusters c
			left join listings l on l.hh02 = c.cluster_no
			where l.hh02 not like '%501' and l.hh02 not like '%502' and l.hh02 != 'null'
			and l.username not in('afg12345','user0001','user0113','user0123','user0211','user0234','user0252','user0414','user0432', 'user0434')
			and c.col_flag = '0'
			group by l.enumcode, l.hh02
			order by l.enumcode,l.hh02");

			$d113_t = 0;
			$d123_t = 0;
			$d211_t = 0;
			$d234_t = 0;
			$d252_t = 0;
			$d414_t = 0;
			$d432_t = 0;
			$d434_t = 0;

			$d113_c = 0;
			$d123_c = 0;
			$d211_c = 0;
			$d234_c = 0;
			$d252_c = 0;
			$d414_c = 0;
			$d432_c = 0;
			$d434_c = 0;

			$d113_ip = 0;
			$d123_ip = 0;
			$d211_ip = 0;
			$d234_ip = 0;
			$d252_ip = 0;
			$d414_ip = 0;
			$d432_ip = 0;
			$d434_ip = 0;

			foreach($cip_clusters->result() as $row){
			
				if($row->enumcode == 113){
			
					$d113_t = $d113_t + 1;

					if($row->collecting_tabs == $row->completed_tabs){
						$d113_c = $d113_c + 1;
					} else {
						$d113_ip = $d113_ip + 1;
					}

				} else if($row->enumcode == 123){
			
					$d123_t = $d123_t + 1;

					if($row->collecting_tabs == $row->completed_tabs){
						$d123_c = $d123_c + 1;
					} else {
						$d123_ip = $d123_ip + 1;
					}

				} else if($row->enumcode == 211){
			
					$d211_t = $d211_t + 1;

					if($row->collecting_tabs == $row->completed_tabs){
						$d211_c = $d211_c + 1;
					} else {
						$d211_ip = $d211_ip + 1;
					}

				} else if($row->enumcode == 234){
			
					$d234_t = $d234_t + 1;

					if($row->collecting_tabs == $row->completed_tabs){
						$d234_c = $d234_c + 1;
					} else {
						$d234_ip = $d234_ip + 1;
					}

				} else if($row->enumcode == 252){
			
					$d252_t = $d252_t + 1;

					if($row->collecting_tabs == $row->completed_tabs){
						$d252_c = $d252_c + 1;
					} else {
						$d252_ip = $d252_ip + 1;
					}

				} else if($row->enumcode == 414){
			
					$d414_t = $d414_t + 1;

					if($row->collecting_tabs == $row->completed_tabs){
						$d414_c = $d414_c + 1;
					} else {
						$d414_ip = $d414_ip + 1;
					}

				} else if($row->enumcode == 432){
			
					$d432_t = $d432_t + 1;

					if($row->collecting_tabs == $row->completed_tabs){
						$d432_c = $d432_c + 1;
					} else {
						$d432_ip = $d432_ip + 1;
					}

				} else if($row->enumcode == 434){
			
					$d434_t = $d434_t + 1;

					if($row->collecting_tabs == $row->completed_tabs){
						$d434_c = $d434_c + 1;
					} else {
						$d434_ip = $d434_ip + 1;
					}
				}
			}

			$this->data['d113_t'] = $d113_t;
			$this->data['d123_t'] = $d123_t;
			$this->data['d211_t'] = $d211_t;
			$this->data['d234_t'] = $d234_t;
			$this->data['d252_t'] = $d252_t;
			$this->data['d414_t'] = $d414_t;
			$this->data['d432_t'] = $d432_t;
			$this->data['d434_t'] = $d434_t;

			$this->data['d113_c'] = $d113_c;
			$this->data['d123_c'] = $d123_c;
			$this->data['d211_c'] = $d211_c;
			$this->data['d234_c'] = $d234_c;
			$this->data['d252_c'] = $d252_c;
			$this->data['d414_c'] = $d414_c;
			$this->data['d432_c'] = $d432_c;
			$this->data['d434_c'] = $d434_c;

			$this->data['d113_ip'] = $d113_ip;
			$this->data['d123_ip'] = $d123_ip;
			$this->data['d211_ip'] = $d211_ip;
			$this->data['d234_ip'] = $d234_ip;
			$this->data['d252_ip'] = $d252_ip;
			$this->data['d414_ip'] = $d414_ip;
			$this->data['d432_ip'] = $d432_ip;
			$this->data['d434_ip'] = $d434_ip;

			$all_clusters = $this->spc->query("select dist_id, 
			count(*) clusters_by_district from clusters where cluster_no not like '%501' and cluster_no not like '%502' and col_flag = '0'
			group by dist_id order by dist_id");
		
			$this->data['d434_r'] = 0;
			
			foreach($all_clusters->result() as $row2){

				if($row2->dist_id == 113){
					$this->data['d113_r'] = $row2->clusters_by_district - $d113_t;
				} else if($row2->dist_id == 123) {
					$this->data['d123_r'] = $row2->clusters_by_district - $d123_t;
				} else if($row2->dist_id == 211) {
					$this->data['d211_r'] = $row2->clusters_by_district - $d211_t;
				} else if($row2->dist_id == 234) {
					$this->data['d234_r'] = $row2->clusters_by_district - $d234_t;
				} else if($row2->dist_id == 252) {
					$this->data['d252_r'] = $row2->clusters_by_district - $d252_t;
				} else if($row2->dist_id == 414) {
					$this->data['d414_r'] = $row2->clusters_by_district - $d414_t;
				} else if($row2->dist_id == 432) {
					$this->data['d432_r'] = $row2->clusters_by_district - $d432_t;
				} else if($row2->dist_id == 434) {
					$this->data['d434_r'] = $row2->clusters_by_district - $d434_t;
				}
			}


			$this->data['gt_c']  = $d113_c + $d123_c + $d211_c + $d234_c + $d252_c + $d414_c + $d432_c + $d434_c;
			$this->data['gt_ip'] = $d113_ip + $d123_ip + $d211_ip + $d234_ip + $d252_ip + $d414_ip + $d432_ip + $d434_ip;
			$this->data['gt_r'] = $this->data['d113_r'] + $this->data['d123_r'] + $this->data['d211_r'] + $this->data['d234_r'] 
			+ $this->data['d252_r'] + $this->data['d414_r'] + $this->data['d432_r'] + $this->data['d434_r'];

			$district_cluster_type = $this->uri->segment(3);
			if(!empty($district_cluster_type)){

				$district 	  = substr($district_cluster_type, 1, 3);
				$cluster_type = substr($district_cluster_type, 5, 1);

				if($cluster_type == 'c'){

					$this->data['get_list'] = $this->spc->query("select l.enumcode, l.hh02,
					(select count(*) from(select distinct hh03, tabNo from listings where hh04 in('1','2') and enumcode = l.enumcode and hh02 = l.hh02) as structures) as structures,
					(select count(*) from(select distinct hh03, tabNo from listings where hh04 = '1' and enumcode = l.enumcode and hh02 = l.hh02) as structures) as residential_structures,
					sum(case when hh04 = '1' and hh15 != '1' then 1 else 0 end) as households,
					sum(case when hh04 = '1' and hh15 != '1' and hh10 = '1' then 1 else 0 end) as eligible_households,
					(select count(*) from ml_randomised where dist_id = l.enumcode and hh02 = l.hh02) as randomized_households,
					(select sum(cast(hh11 as int)) from listings where hh04 = '1' and hh15 != '1' and hh10 = '1' and enumcode = l.enumcode and hh02 = l.hh02) as no_of_eligible_wras,
					(select count(distinct deviceid) from listings where hh02 = l.hh02 and enumcode = l.enumcode) as collecting_tabs,
					(select count(*) completed_tabs from(select deviceid, max(cast(hh03 as int)) ms from listings where enumcode = l.enumcode and hh02 = l.hh02 and hh04 = 9 group by deviceid) AS completed_tabs) completed_tabs
					from clusters c
					left join listings l on l.hh02 = c.cluster_no
					where l.enumcode = '$district' and l.hh02 not like '%501' and l.hh02 not like '%502' and l.hh02 != 'null'
					and l.username not in('afg12345','user0001','user0113','user0123','user0211','user0234','user0252','user0414','user0432', 'user0434')
					and (select count(distinct deviceid) from listings where hh02 = l.hh02 and enumcode = l.enumcode) = (select count(*) completed_tabs from(select deviceid, max(cast(hh03 as int)) ms from listings where enumcode = l.enumcode and hh02 = l.hh02 and hh04 = 9 group by deviceid) AS completed_tabs)
					and c.col_flag = '0'
					group by l.enumcode, l.hh02
					order by l.enumcode,l.hh02");

				} else if($cluster_type == 'i'){
					
					$this->data['get_list'] = $this->spc->query("select l.enumcode, l.hh02,
					(select count(*) from(select distinct hh03, tabNo from listings where hh04 in('1','2') and enumcode = l.enumcode and hh02 = l.hh02) as structures) as structures,
					(select count(*) from(select distinct hh03, tabNo from listings where hh04 = '1' and enumcode = l.enumcode and hh02 = l.hh02) as structures) as residential_structures,
					sum(case when hh04 = '1' and hh15 != '1' then 1 else 0 end) as households,
					sum(case when hh04 = '1' and hh15 != '1' and hh10 = '1' then 1 else 0 end) as eligible_households,
					(select count(*) from ml_randomised where dist_id = l.enumcode and hh02 = l.hh02) as randomized_households,
					(select sum(cast(hh11 as int)) from listings where hh04 = '1' and hh15 != '1' and hh10 = '1' and enumcode = l.enumcode and hh02 = l.hh02) as no_of_eligible_wras,
					(select count(distinct deviceid) from listings where hh02 = l.hh02 and enumcode = l.enumcode) as collecting_tabs,
					(select count(*) completed_tabs from(select deviceid, max(cast(hh03 as int)) ms from listings where enumcode = l.enumcode and hh02 = l.hh02 and hh04 = 9 group by deviceid) AS completed_tabs) completed_tabs
					from clusters c
					left join listings l on l.hh02 = c.cluster_no
					where l.enumcode = '$district' and l.hh02 not like '%501' and l.hh02 not like '%502' and l.hh02 != 'null'
					and l.username not in('afg12345','user0001','user0113','user0123','user0211','user0234','user0252','user0414','user0432', 'user0434')
					and (select count(distinct deviceid) from listings where hh02 = l.hh02 and enumcode = l.enumcode) != (select count(*) completed_tabs from(select deviceid, max(cast(hh03 as int)) ms from listings where enumcode = l.enumcode and hh02 = l.hh02 and hh04 = 9 group by deviceid) AS completed_tabs)
					and c.col_flag = '0'
					group by l.enumcode, l.hh02
					order by l.enumcode,l.hh02");
				
				} else if($cluster_type == 'r'){

					$this->data['get_list'] = $this->spc->query("select c.dist_id as enumcode, c.cluster_no as hh02,
					(select count(*) from(select distinct hh03, tabNo from listings where hh04 in('1','2') and hh02 = c.cluster_no) as structures) as structures,
					(select count(*) from(select distinct hh03, tabNo from listings where hh04 = '1' and hh02 = c.cluster_no) as structures) as residential_structures,
					(select count(*) from listings where hh02 = c.cluster_no and hh04 = '1' and hh15 != '1') as households,
					(select count(*) from listings where hh02 = c.cluster_no and hh04 = '1' and hh15 != '1' and hh10 = '1') as eligible_households,
					(select count(*) from ml_randomised where hh02 = c.cluster_no) as randomized_households,
					(select sum(cast(hh11 as int)) from listings where hh04 = '1' and hh15 != '1' and hh10 = '1' and hh02 = c.cluster_no) as no_of_eligible_wras,
					(select count(distinct deviceid) from listings where hh02 = c.cluster_no) as collecting_tabs,
					(select count(*) completed_tabs from(select deviceid, max(cast(hh03 as int)) ms from listings where hh02 = c.cluster_no and hh04 = 9 group by deviceid) AS completed_tabs) completed_tabs
					from clusters c
					where c.dist_id = '$district' and c.cluster_no not like '%501' and c.cluster_no not like '%502' and c.cluster_no != 'null'
					and (select sum(cast(hh11 as int)) from listings where hh04 = '1' and hh15 != '1' and hh10 = '1' and hh02 = c.cluster_no) is null
					and c.col_flag = '0'
					group by c.dist_id, c.cluster_no
					order by c.dist_id, c.cluster_no");
				}

			} else {
			
				$this->data['get_list'] = $this->spc->query("select l.enumcode, l.hh02,
				(select count(*) from(select distinct hh03, tabNo from listings where hh04 in('1','2') and enumcode = l.enumcode and hh02 = l.hh02) as structures) as structures,
				(select count(*) from(select distinct hh03, tabNo from listings where hh04 = '1' and enumcode = l.enumcode and hh02 = l.hh02) as structures) as residential_structures,
				sum(case when hh04 = '1' and hh15 != '1' then 1 else 0 end) as households,
				sum(case when hh04 = '1' and hh15 != '1' and hh10 = '1' then 1 else 0 end) as eligible_households,
				(select count(*) from ml_randomised where dist_id = l.enumcode and hh02 = l.hh02) as randomized_households,
				(select sum(cast(hh11 as int)) from listings where hh04 = '1' and hh15 != '1' and hh10 = '1' and enumcode = l.enumcode and hh02 = l.hh02) as no_of_eligible_wras,
				(select count(distinct deviceid) from listings where hh02 = l.hh02 and enumcode = l.enumcode) as collecting_tabs,
				(select count(*) completed_tabs from(select deviceid, max(cast(hh03 as int)) ms from listings where enumcode = l.enumcode and hh02 = l.hh02 and hh04 = 9 group by deviceid) AS completed_tabs) completed_tabs
				from clusters c
				left join listings l on l.hh02 = c.cluster_no
				where l.hh02 not like '%501' and l.hh02 not like '%502' and l.hh02 != 'null'
				and l.username not in('afg12345','user0001','user0113','user0123','user0211','user0234','user0252','user0414','user0432', 'user0434')
				and (select count(distinct deviceid) from listings where hh02 = l.hh02 and enumcode = l.enumcode) = (select count(*) completed_tabs from(select deviceid, max(cast(hh03 as int)) ms from listings where enumcode = l.enumcode and hh02 = l.hh02 and hh04 = 9 group by deviceid) AS completed_tabs)
				and c.col_flag = '0'
				group by l.enumcode, l.hh02
				order by l.enumcode,l.hh02");
			}

		} else {

			$id 	  = $this->users->get_user()->id;
			$district = $this->users->get_district($id);
			
			$this->data['clusters_by_district'] = $this->spc->query("select dist_id, 
			count(*) clusters_by_district from clusters where cluster_no not like '%501' and cluster_no not like '%502' and dist_id = '$district' and col_flag = '0'
			group by dist_id order by dist_id");

			$cip_clusters = $this->spc->query("select l.enumcode, l.hh02,
			(select count(distinct deviceid) from listings where hh02 = l.hh02 and enumcode = l.enumcode) as collecting_tabs,
			(select count(*) completed_tabs from(select deviceid, max(cast(hh03 as int)) ms from listings where enumcode = l.enumcode and hh02 = l.hh02 and hh04 = 9 group by deviceid) AS completed_tabs) completed_tabs
			from clusters c
			left join listings l on l.hh02 = c.cluster_no
			where l.enumcode = '$district' and l.hh02 not like '%501' and l.hh02 not like '%502' and l.hh02 != 'null'
			and l.username not in('afg12345','user0001','user0113','user0123','user0211','user0234','user0252','user0414','user0432', 'user0434')
			and c.col_flag = '0'
			group by l.enumcode, l.hh02
			order by l.enumcode,l.hh02");

			$d113_t = 0;
			$d123_t = 0;
			$d211_t = 0;
			$d234_t = 0;
			$d252_t = 0;
			$d414_t = 0;
			$d432_t = 0;
			$d434_t = 0;

			$d113_c = 0;
			$d123_c = 0;
			$d211_c = 0;
			$d234_c = 0;
			$d252_c = 0;
			$d414_c = 0;
			$d432_c = 0;
			$d434_c = 0;

			$d113_ip = 0;
			$d123_ip = 0;
			$d211_ip = 0;
			$d234_ip = 0;
			$d252_ip = 0;
			$d414_ip = 0;
			$d432_ip = 0;
			$d434_ip = 0;

			foreach($cip_clusters->result() as $row){
			
				if($row->enumcode == 113){
			
					$d113_t = $d113_t + 1;

					if($row->collecting_tabs == $row->completed_tabs){
						$d113_c = $d113_c + 1;
					} else {
						$d113_ip = $d113_ip + 1;
					}

				} else if($row->enumcode == 123){
			
					$d123_t = $d123_t + 1;

					if($row->collecting_tabs == $row->completed_tabs){
						$d123_c = $d123_c + 1;
					} else {
						$d123_ip = $d123_ip + 1;
					}

				} else if($row->enumcode == 211){
			
					$d211_t = $d211_t + 1;

					if($row->collecting_tabs == $row->completed_tabs){
						$d211_c = $d211_c + 1;
					} else {
						$d211_ip = $d211_ip + 1;
					}

				} else if($row->enumcode == 234){
			
					$d234_t = $d234_t + 1;

					if($row->collecting_tabs == $row->completed_tabs){
						$d234_c = $d234_c + 1;
					} else {
						$d234_ip = $d234_ip + 1;
					}

				} else if($row->enumcode == 252){
			
					$d252_t = $d252_t + 1;

					if($row->collecting_tabs == $row->completed_tabs){
						$d252_c = $d252_c + 1;
					} else {
						$d252_ip = $d252_ip + 1;
					}

				} else if($row->enumcode == 414){
			
					$d414_t = $d414_t + 1;

					if($row->collecting_tabs == $row->completed_tabs){
						$d414_c = $d414_c + 1;
					} else {
						$d414_ip = $d414_ip + 1;
					}

				} else if($row->enumcode == 432){
			
					$d432_t = $d432_t + 1;

					if($row->collecting_tabs == $row->completed_tabs){
						$d432_c = $d432_c + 1;
					} else {
						$d432_ip = $d432_ip + 1;
					}

				} else if($row->enumcode == 434){
			
					$d434_t = $d434_t + 1;

					if($row->collecting_tabs == $row->completed_tabs){
						$d434_c = $d434_c + 1;
					} else {
						$d434_ip = $d434_ip + 1;
					}
				}
			}

			$this->data['d113_t'] = $d113_t;
			$this->data['d123_t'] = $d123_t;
			$this->data['d211_t'] = $d211_t;
			$this->data['d234_t'] = $d234_t;
			$this->data['d252_t'] = $d252_t;
			$this->data['d414_t'] = $d414_t;
			$this->data['d432_t'] = $d432_t;
			$this->data['d434_t'] = $d434_t;

			$this->data['d113_c'] = $d113_c;
			$this->data['d123_c'] = $d123_c;
			$this->data['d211_c'] = $d211_c;
			$this->data['d234_c'] = $d234_c;
			$this->data['d252_c'] = $d252_c;
			$this->data['d414_c'] = $d414_c;
			$this->data['d432_c'] = $d432_c;
			$this->data['d434_c'] = $d434_c;

			$this->data['d113_ip'] = $d113_ip;
			$this->data['d123_ip'] = $d123_ip;
			$this->data['d211_ip'] = $d211_ip;
			$this->data['d234_ip'] = $d234_ip;
			$this->data['d252_ip'] = $d252_ip;
			$this->data['d414_ip'] = $d414_ip;
			$this->data['d432_ip'] = $d432_ip;
			$this->data['d434_ip'] = $d434_ip;

			$all_clusters = $this->spc->query("select dist_id, 
			count(*) clusters_by_district from clusters where cluster_no not like '%501' and cluster_no not like '%502'
			and dist_id = '$district' and col_flag = '0'
			group by dist_id order by dist_id");
		
			$this->data['d113_r'] = 0;
			$this->data['d123_r'] = 0;
			$this->data['d211_r'] = 0;
			$this->data['d234_r'] = 0;
			$this->data['d252_r'] = 0;
			$this->data['d414_r'] = 0;
			$this->data['d432_r'] = 0;
			$this->data['d434_r'] = 0;

			foreach($all_clusters->result() as $row2){

				if($row2->dist_id == 113){
					$this->data['d113_r'] = $row2->clusters_by_district - $d113_t;
				} else if($row2->dist_id == 123) {
					$this->data['d123_r'] = $row2->clusters_by_district - $d123_t;
				} else if($row2->dist_id == 211) {
					$this->data['d211_r'] = $row2->clusters_by_district - $d211_t;
				} else if($row2->dist_id == 234) {
					$this->data['d234_r'] = $row2->clusters_by_district - $d234_t;
				} else if($row2->dist_id == 252) {
					$this->data['d252_r'] = $row2->clusters_by_district - $d252_t;
				} else if($row2->dist_id == 414) {
					$this->data['d414_r'] = $row2->clusters_by_district - $d414_t;
				} else if($row2->dist_id == 432) {
					$this->data['d432_r'] = $row2->clusters_by_district - $d432_t;
				} else if($row2->dist_id == 434) {
					$this->data['d434_r'] = $row2->clusters_by_district - $d434_t;
				}
			}


			$this->data['gt_c']  = $d113_c + $d123_c + $d211_c + $d234_c + $d252_c + $d414_c + $d432_c + $d434_c;
			$this->data['gt_ip'] = $d113_ip + $d123_ip + $d211_ip + $d234_ip + $d252_ip + $d414_ip + $d432_ip + $d434_ip;
			$this->data['gt_r'] = $this->data['d113_r'] + $this->data['d123_r'] + $this->data['d211_r'] + $this->data['d234_r'] 
			+ $this->data['d252_r'] + $this->data['d414_r'] + $this->data['d432_r'] + $this->data['d434_r'];

			
			$cluster_type = $this->uri->segment(3);
			
			if(!empty($cluster_type)){


				//var_dump($cluster_type);die();

				if($cluster_type == 't'){

					//var_dump($cluster_type);die();

					$this->data['get_list'] = $this->spc->query("select l.enumcode, l.hh02,
					(select count(*) from(select distinct hh03, tabNo from listings where hh04 in('1','2') and enumcode = l.enumcode and hh02 = l.hh02) as structures) as structures,
					(select count(*) from(select distinct hh03, tabNo from listings where hh04 = '1' and enumcode = l.enumcode and hh02 = l.hh02) as structures) as residential_structures,
					sum(case when hh04 = '1' and hh15 != '1' then 1 else 0 end) as households,
					sum(case when hh04 = '1' and hh15 != '1' and hh10 = '1' then 1 else 0 end) as eligible_households,
					(select count(*) from ml_randomised where dist_id = l.enumcode and hh02 = l.hh02) as randomized_households,
					(select sum(cast(hh11 as int)) from listings where hh04 = '1' and hh15 != '1' and hh10 = '1' and enumcode = l.enumcode and hh02 = l.hh02) as no_of_eligible_wras,
					(select count(distinct deviceid) from listings where hh02 = l.hh02 and enumcode = l.enumcode) as collecting_tabs,
					(select count(*) completed_tabs from(select deviceid, max(cast(hh03 as int)) ms from listings where enumcode = l.enumcode and hh02 = l.hh02 and hh04 = 9 group by deviceid) AS completed_tabs) completed_tabs
					from clusters c
					left join listings l on l.hh02 = c.cluster_no
					where l.enumcode = '$district' and l.hh02 not like '%501' and l.hh02 not like '%502' and l.hh02 != 'null'
					and l.username not in('afg12345','user0001','user0113','user0123','user0211','user0234','user0252','user0414','user0432', 'user0434')
					and c.col_flag = '0'
					group by l.enumcode, l.hh02
					order by l.enumcode,l.hh02");

				} else if($cluster_type == 'c') {

					$this->data['get_list'] = $this->spc->query("select l.enumcode, l.hh02,
					(select count(*) from(select distinct hh03, tabNo from listings where hh04 in('1','2') and enumcode = l.enumcode and hh02 = l.hh02) as structures) as structures,
					(select count(*) from(select distinct hh03, tabNo from listings where hh04 = '1' and enumcode = l.enumcode and hh02 = l.hh02) as structures) as residential_structures,
					sum(case when hh04 = '1' and hh15 != '1' then 1 else 0 end) as households,
					sum(case when hh04 = '1' and hh15 != '1' and hh10 = '1' then 1 else 0 end) as eligible_households,
					(select count(*) from ml_randomised where dist_id = l.enumcode and hh02 = l.hh02) as randomized_households,
					(select sum(cast(hh11 as int)) from listings where hh04 = '1' and hh15 != '1' and hh10 = '1' and enumcode = l.enumcode and hh02 = l.hh02) as no_of_eligible_wras,
					(select count(distinct deviceid) from listings where hh02 = l.hh02 and enumcode = l.enumcode) as collecting_tabs,
					(select count(*) completed_tabs from(select deviceid, max(cast(hh03 as int)) ms from listings where enumcode = l.enumcode and hh02 = l.hh02 and hh04 = 9 group by deviceid) AS completed_tabs) completed_tabs
					from clusters c
					left join listings l on l.hh02 = c.cluster_no
					where l.enumcode = '$district' and l.hh02 not like '%501' and l.hh02 not like '%502' and l.hh02 != 'null'
					and l.username not in('afg12345','user0001','user0113','user0123','user0211','user0234','user0252','user0414','user0432', 'user0434')
					and (select count(distinct deviceid) from listings where hh02 = l.hh02 and enumcode = l.enumcode) = (select count(*) completed_tabs from(select deviceid, max(cast(hh03 as int)) ms from listings where enumcode = l.enumcode and hh02 = l.hh02 and hh04 = 9 group by deviceid) AS completed_tabs)
					and c.col_flag = '0'
					group by l.enumcode, l.hh02
					order by l.enumcode,l.hh02");
					
				} else if($cluster_type == 'i') {

					$this->data['get_list'] = $this->spc->query("select l.enumcode, l.hh02,
					(select count(*) from(select distinct hh03, tabNo from listings where hh04 in('1','2') and enumcode = l.enumcode and hh02 = l.hh02) as structures) as structures,
					(select count(*) from(select distinct hh03, tabNo from listings where hh04 = '1' and enumcode = l.enumcode and hh02 = l.hh02) as structures) as residential_structures,
					sum(case when hh04 = '1' and hh15 != '1' then 1 else 0 end) as households,
					sum(case when hh04 = '1' and hh15 != '1' and hh10 = '1' then 1 else 0 end) as eligible_households,
					(select count(*) from ml_randomised where dist_id = l.enumcode and hh02 = l.hh02) as randomized_households,
					(select sum(cast(hh11 as int)) from listings where hh04 = '1' and hh15 != '1' and hh10 = '1' and enumcode = l.enumcode and hh02 = l.hh02) as no_of_eligible_wras,
					(select count(distinct deviceid) from listings where hh02 = l.hh02 and enumcode = l.enumcode) as collecting_tabs,
					(select count(*) completed_tabs from(select deviceid, max(cast(hh03 as int)) ms from listings where enumcode = l.enumcode and hh02 = l.hh02 and hh04 = 9 group by deviceid) AS completed_tabs) completed_tabs
					from clusters c
					left join listings l on l.hh02 = c.cluster_no
					where l.enumcode = '$district' and l.hh02 not like '%501' and l.hh02 not like '%502' and l.hh02 != 'null'
					and l.username not in('afg12345','user0001','user0113','user0123','user0211','user0234','user0252','user0414','user0432', 'user0434')
					and (select count(distinct deviceid) from listings where hh02 = l.hh02 and enumcode = l.enumcode) != (select count(*) completed_tabs from(select deviceid, max(cast(hh03 as int)) ms from listings where enumcode = l.enumcode and hh02 = l.hh02 and hh04 = 9 group by deviceid) AS completed_tabs)
					and c.col_flag = '0'
					group by l.enumcode, l.hh02
					order by l.enumcode,l.hh02");

				} else if($cluster_type == 'r') {

					$this->data['get_list'] = $this->spc->query("select c.dist_id as enumcode, c.cluster_no as hh02,
					(select count(*) from(select distinct hh03, tabNo from listings where hh04 in('1','2') and hh02 = c.cluster_no) as structures) as structures,
					(select count(*) from(select distinct hh03, tabNo from listings where hh04 = '1' and hh02 = c.cluster_no) as structures) as residential_structures,
					(select count(*) from listings where hh02 = c.cluster_no and hh04 = '1' and hh15 != '1') as households,
					(select count(*) from listings where hh02 = c.cluster_no and hh04 = '1' and hh15 != '1' and hh10 = '1') as eligible_households,
					(select count(*) from ml_randomised where hh02 = c.cluster_no) as randomized_households,
					(select sum(cast(hh11 as int)) from listings where hh04 = '1' and hh15 != '1' and hh10 = '1' and hh02 = c.cluster_no) as no_of_eligible_wras,
					(select count(distinct deviceid) from listings where hh02 = c.cluster_no) as collecting_tabs,
					(select count(*) completed_tabs from(select deviceid, max(cast(hh03 as int)) ms from listings where hh02 = c.cluster_no and hh04 = 9 group by deviceid) AS completed_tabs) completed_tabs
					from clusters c
					where c.dist_id = '$district' and c.cluster_no not like '%501' and c.cluster_no not like '%502' and c.cluster_no != 'null'
					and (select sum(cast(hh11 as int)) from listings where hh04 = '1' and hh15 != '1' and hh10 = '1' and hh02 = c.cluster_no) is null
					and c.col_flag = '0'
					group by c.dist_id, c.cluster_no
					order by c.dist_id, c.cluster_no");
				}
				
			
			} else {


				$this->data['get_list'] = $this->spc->query("select l.enumcode, l.hh02,
				(select count(*) from(select distinct hh03, tabNo from listings where hh04 in('1','2') and enumcode = l.enumcode and hh02 = l.hh02) as structures) as structures,
				(select count(*) from(select distinct hh03, tabNo from listings where hh04 = '1' and enumcode = l.enumcode and hh02 = l.hh02) as structures) as residential_structures,
				sum(case when hh04 = '1' and hh15 != '1' then 1 else 0 end) as households,
				sum(case when hh04 = '1' and hh15 != '1' and hh10 = '1' then 1 else 0 end) as eligible_households,
				(select count(*) from ml_randomised where dist_id = l.enumcode and hh02 = l.hh02) as randomized_households,
				(select sum(cast(hh11 as int)) from listings where hh04 = '1' and hh15 != '1' and hh10 = '1' and enumcode = l.enumcode and hh02 = l.hh02) as no_of_eligible_wras,
				(select count(distinct deviceid) from listings where hh02 = l.hh02 and enumcode = l.enumcode) as collecting_tabs,
				(select count(*) completed_tabs from(select deviceid, max(cast(hh03 as int)) ms from listings where enumcode = l.enumcode and hh02 = l.hh02 and hh04 = 9 group by deviceid) AS completed_tabs) completed_tabs
				from clusters c
				left join listings l on l.hh02 = c.cluster_no
				where l.enumcode = '$district' and l.hh02 not like '%501' and l.hh02 not like '%502' and l.hh02 != 'null'
				and l.username not in('afg12345','user0001','user0113','user0123','user0211','user0234','user0252','user0414','user0432', 'user0434')
				and (select count(distinct deviceid) from listings where hh02 = l.hh02 and enumcode = l.enumcode) = (select count(*) completed_tabs from(select deviceid, max(cast(hh03 as int)) ms from listings where enumcode = l.enumcode and hh02 = l.hh02 and hh04 = 9 group by deviceid) AS completed_tabs)
				and c.col_flag = '0'
				group by l.enumcode, l.hh02
				order by l.enumcode,l.hh02");
			}
		}


		$this->data['message']  	= $this->session->flashdata('message');
		$this->data['main_content'] = 'spc/index';
		$this->load->view('includes/template', $this->data);
	}
	

	function systematic_randomizer(){

		//echo $this->uri->segment(3)."<br>".$this->uri->segment(4);die();
		
		$source 	 = 'listings';
		$destination = 'destination';
		$sample 	 = 20;

		$columns = 'col_id, hh02, tabNo, hh03, hh07, hh08, hh09, hhdt, enumcode, uid';

		$cluster = $this->uri->segment(3);

		$randomization_status = $this->spc->query("select randomized from clusters where cluster_no = '$cluster'")->row()->randomized;
		if($randomization_status == 1){
			
			$flash_msg = "Cluster No ".$cluster." is Already Randomized";
			$value = '<div class="callout callout-warning"><p>'.$flash_msg.'</p></div>';
			$this->session->set_flashdata('message', $value);
			
			if($this->users->in_group('admin') || $this->users->in_group('management')){
				redirect('spc/index/'.$this->uri->segment(4));
			} else {
				redirect('spc/index');
			}
		}

		$dataset = $this->spc->query("select ".$columns." from ".$source."
		where username not in('afg12345','user0001','user0113','user0123','user0211','user0234','user0252','user0414','user0432', 'user0434')
		and hh04 = '1' and hh10 = '1' and hh15 != '1' and hh02 = '$cluster' order by tabNo, deviceid, cast(hh03 as int), cast(hh07 as int)");
		
		if($dataset->num_rows() > 0){
			
			$residential_structures = $this->spc->query("select distinct hh03, tabNo from listings where hh02 = '$cluster' and hh04 = '1'")->num_rows();

			$this->spc->query("update clusters set randomized = '1' where cluster_no = '$cluster'");
			
			if($dataset->num_rows() > $sample){
				
				$quotient     = $dataset->num_rows()/$sample;
				$random_start = rand(1, $quotient);
				$random_point = $random_start;
				$index 		  = floor($random_start);
				$result 	  = $dataset->result_array();

				//echo '<p><strong>Dataset = '.$dataset->num_rows().' | Sample = '.$sample.' | Random Start = '.$random_start.' | Quotient = '.$quotient.'</strong></p>';

				for($i = 1; $i <= 20; $i++){

					$data = array(
						'randDT'  => date('Y-m-d h:i:s'),
						'uid' 	  => $result[$index - 1]['uid'],
						'sno' 	  => $i,
						'hh02' 	  => $result[$index - 1]['hh02'],
						'hh03' 	  => $result[$index - 1]['hh03'],
						'hh07' 	  => $result[$index - 1]['hh07'],
						'hh08' 	  => $result[$index - 1]['hh08'],
						'hh09' 	  => $result[$index - 1]['hh09'],
						'total'   => $residential_structures,
						'randno'  => $random_start,
						'quot' 	  => $quotient,
						'hhdt' 	  => $result[$index - 1]['hhdt'],
						'dist_id' => $result[$index - 1]['enumcode'],
						'compid'  => $result[$index - 1]['hh02']."-".str_pad($result[$index - 1]['hh03'],4,"0",STR_PAD_LEFT)."-".str_pad($result[$index - 1]['hh07'],3,"0",STR_PAD_LEFT),
						'tabNo'   => $result[$index - 1]['tabNo'],
					);

					$this->spc->insert('ml_randomised', $data);

					$random_point = $random_point + $quotient;
					$index = floor($random_point);					
				}

				$flash_msg = "Cluster No ".$cluster." Randomized successfully";
				$value = '<div class="callout callout-success"><p>'.$flash_msg.'</p></div>';
				$this->session->set_flashdata('message', $value);

				if($this->users->in_group('admin') || $this->users->in_group('management')){
					redirect('spc/index/'.$this->uri->segment(4));
				} else {
					redirect('spc/index');
				}

			} else {

				$result 	  = $dataset->result_array();
				$quotient     = $dataset->num_rows()/count($result);
				$random_start = rand(1, $quotient);
				
				for($i = 0; $i < count($result); $i++){

					$data = array(
						'randDT'  => date('Y-m-d h:i:s'),
						'uid' 	  => $result[$i]['uid'],
						'sno' 	  => $i + 1,
						'hh02' 	  => $result[$i]['hh02'],
						'hh03' 	  => $result[$i]['hh03'],
						'hh07' 	  => $result[$i]['hh07'],
						'hh08' 	  => $result[$i]['hh08'],
						'hh09' 	  => $result[$i]['hh09'],
						'total'   => $residential_structures,
						'randno'  => $random_start,
						'quot' 	  => $quotient,
						'hhdt' 	  => $result[$i]['hhdt'],
						'dist_id' => $result[$i]['enumcode'],
						'compid'  => $result[$i]['hh02']."-".str_pad($result[$i]['hh03'],4,"0",STR_PAD_LEFT)."-".str_pad($result[$i]['hh07'],3,"0",STR_PAD_LEFT),
						'tabNo'   => $result[$i]['tabNo'],
					);

					$this->spc->insert('ml_randomised', $data);
				}
					
				$flash_msg = "Cluster No ".$cluster." Randomized successfully";
				$value = '<div class="callout callout-success"><p>'.$flash_msg.'</p></div>';
				$this->session->set_flashdata('message', $value);
				if($this->users->in_group('admin') || $this->users->in_group('management')){
					redirect('spc/index/'.$this->uri->segment(4));
				} else {
					redirect('spc/index');
				}
			} 

		} else {

			$flash_msg = "Cluster No ".$cluster." Has Zero Households";
			$value = '<div class="callout callout-danger"><p>'.$flash_msg.'</p></div>';
			$this->session->set_flashdata('message', $value);
			if($this->users->in_group('admin') || $this->users->in_group('management')){
				redirect('spc/index/'.$this->uri->segment(4));
			} else {
				redirect('spc/index');
			}
		}
	}
	

	function make_pdf(){

		$cluster = $this->uri->segment(3);

		$this->data['cluster'] = $this->uri->segment(3);

		$this->data['cluster_data'] = $this->spc->query("select * from ml_randomised where hh02 = '$cluster'");
		$rd 						= $this->spc->query("select top 1 randDT from ml_randomised where hh02 = '$cluster'")->row()->randDT;

		$this->data['randomization_date'] = substr($rd, 0, 10);

		$this->load->library('Pdf');

		
		$this->data['main_content'] = 'spc/make_pdf';
		$this->load->view('includes/template', $this->data);
	}
	
	function test_data(){

		echo dirname(__FILE__);
	}
	
	
	function randomized_households(){

		$cluster = $this->uri->segment(3);
		$this->data['get_list'] = $this->spc->query("select hh02, sno, concat(tabNO, '-', substring(compid, 8, 8)) as hhno from ml_randomised where hh02 = '$cluster' order by cast(sno as int)");

		//var_dump($this->data['get_list']->result());die();

		$this->data['heading'] = "Randomized Households for Cluster No: ".$cluster;
		
		$this->data['main_content'] = 'spc/randomized_households';
		$this->load->view('includes/template', $this->data);
	}

	function collected_households(){

		$cluster = $this->uri->segment(3);
		$this->data['get_list'] = $this->spc->query("select distinct cluster_code, hhno from forms where cluster_code = '$cluster' and istatus in('1', '2', '3', '4', '5', '6', '7', '96')");

		//var_dump($this->data['get_list']->result());die();

		$this->data['heading'] = "Collected Households for Cluster No: ".$cluster;
		
		$this->data['main_content'] = 'spc/collected_households';
		$this->load->view('includes/template', $this->data);
	}


	function members($cluster, $hhno, $type){

		$cluster = $this->uri->segment(3);
		$hhno 	 = $this->uri->segment(4);
		$type 	 = $this->uri->segment(5);

		if($type == 1){
			
			$this->data['get_list'] = $this->spc->query("select cast(serial_no as int) as serial_no, name, mother_name, gender, d108a, d108b, d108c, age, marital, d110, d111 from familymembers where clusterno = '$cluster' and hhno = '$hhno' order by cast(serial_no as int)");

		} else if($type == 2){

			$this->data['get_list'] = $this->spc->query("select cast(serial_no as int) as serial_no, name, mother_name, gender, d108a, d108b, d108c, age, marital, d110, d111 from familymembers where clusterno = '$cluster' and hhno = '$hhno' and gender = '2' and cast(age as int) > 14 and cast(age as int) < 50 and marital in('1', '3', '4') order by cast(serial_no as int)");
		
		} else if($type == 3){

			$this->data['get_list'] = $this->spc->query("select cast(serial_no as int) as serial_no, name, mother_name, gender, d108a, d108b, d108c, age, marital, d110, d111 from familymembers where clusterno = '$cluster' and hhno = '$hhno' and cast(age as int) < 5 order by cast(serial_no as int)");
		}

		$this->data['heading'] = "Cluster No: ".$cluster." Household: ".$hhno;
		
		$this->data['main_content'] = 'spc/members';
		$this->load->view('includes/template', $this->data);
	}
	
	
	
	/*
	
	function systematic_randomizer(){

		$random_no = floor(1000/20);

		$random_point = rand(1, $random_no);

		//echo $random_point; die();

		for($i = 1; $i <= 20; $i++){

			echo $i.":".$random_point.'<br>';

			$random_point = floor($random_point + $random_no);
		}
	}
	
	
	function insert_data(){

		for($i = 1; $i <= 1000; $i++){

			$form = 'form_'.$i;

			$this->db->query("INSERT INTO source(form_no, cluster) VALUES ('$form', 113001)");
		}
	}
	
	function progress(){
		
		$survey = $this->uri->segment(3);
		
		$this->data['heading'] = $survey;
		
		$this->data['progress_by_district'] = $this->spc->query("select * from tbl02_progress where survey = $survey");
		
		$this->data['main_content'] = 'spc/index';
		$this->load->view('includes/template', $this->data);
	}
	
	*/

	function hh_greater_than_20(){

		$data = $this->spc->query("select c.dist_id, c.cluster_no,
		(select count(*) from listings where enumcode = c.dist_id and hh02 = c.cluster_no and hh04 = '1' and hh15 != '1' and hh10 = '1') as hh_total,
		(select count(*) from ml_randomised where dist_id = c.dist_id and hh02 = c.cluster_no) as hh_randomized
		from clusters c
		where c.cluster_no not like '%501' and c.cluster_no not like '%502' and c.cluster_no != 'null' and c.randomized = '1'
		and (((select count(*) from ml_randomised where dist_id = c.dist_id and hh02 = c.cluster_no) > (select count(*) from listings where enumcode = c.dist_id and hh02 = c.cluster_no and hh04 = '1' and hh15 != '1' and hh10 = '1')) or  (select count(*) from ml_randomised where dist_id = c.dist_id and hh02 = c.cluster_no) > 20)
		group by c.dist_id, c.cluster_no order by c.dist_id");

		if($data->num_rows() > 0){

			foreach($data->result() as $row){
				echo $row->cluster_no."----".$row->hh_total."----".$row->hh_randomized."<br>";
			}
		} else {
			echo "Randomization is OK";
		}
	}


	function update_data(){

		/*$data = $this->spc->query("select distinct m.cluster_no, m.deviceid, m.hhno as m_hhno, f.hhno as f_hhno from mortality m
		left join forms f on f.cluster_code = m.cluster_no and substring(f.hhno, 3, 10) = m.hhno and f.deviceid = m.deviceid
		where m.username not in('afg12345','user0001','user0113','user0123','user0211','user0234','user0252','user0414','user0432', 'user0434')
		and m.cluster_no not like '%501' and m.cluster_no not like '%502'
		and len(m.hhno) = 8");

		$i = 0;

		foreach($data->result() as $row){

			$this->spc->query("update mortality set hhno = '$row->f_hhno' where cluster_no = '$row->cluster_no' and hhno = '$row->m_hhno' and deviceid = '$row->deviceid'");

			$i = $i + 1;
		}

		echo $i." Enteries are effected...";*/
	}
	
	////// close db connection //////
	public function __destruct(){
		
		$this->db->close();
	}
}