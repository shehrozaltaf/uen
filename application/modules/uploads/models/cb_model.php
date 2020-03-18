<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cb_model extends CI_Model
{

	function __construct() {
		parent::__construct();

		$this->cb = $this->load->database('cb', TRUE);
	}


	function _get_district_name($district_code){
		$get_district = $this->cb->query("select district_name from districts where district_code = $district_code")->row();
		$name = $get_district->district_name;
		return $name;
	}
	
}