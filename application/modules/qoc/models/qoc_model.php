<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Qoc_model extends CI_Model
{

	function __construct() {
		parent::__construct();

		$this->qoc = $this->load->database('qoc', TRUE);
	}


	function _get_district_name($district_code){
		$get_district = $this->qoc->query("select district_name from districts where district_code = $district_code")->row();
		$name = $get_district->district_name;
		return $name;
	}
}