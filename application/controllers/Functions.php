<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Functions extends MX_Controller
{
	// Constructor
	function __construct(){
		parent::__construct();
		$this->data = null;
	}

	
	
	// Functions
	
	function f_addcslashes(){
		
		echo addcslashes("prounce","n");
	}
	

	////// close db connection //////
	public function __destruct()
	{
		$this->db->close();
	}
}
