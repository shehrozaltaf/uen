<?php

class Uploads extends MX_Controller {

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
		if(!$this->users->in_group('admin') and !$this->users->in_group('management')){
			return show_error('You must be an authorized user to view this page');
		}
	}
	
	
	
//////////////////// Upload Section ///////////////////

	public function index(){
		
		$this->data['heading'] = 'Picture Uploads';
		
		$this->data['main_content'] = 'index';
    	$this->load->view('includes/template', $this->data);
	}

	public function upload(){
	
		if (!empty($_FILES)){
		
			$config['upload_path'] = "./application/modules/uploads/files";
			$config['allowed_types'] = 'gif|jpg|png|mp4|ogv|zip';

			$this->load->library('upload');

			$files           = $_FILES;
			$number_of_files = count($_FILES['file']['name']);
			$errors = 0;

			// codeigniter upload just support one file
			// to upload. so we need a litte trick
			for ($i = 0; $i < $number_of_files; $i++){
			
				$_FILES['file']['name']     = $files['file']['name'][$i];
				$_FILES['file']['type']     = $files['file']['type'][$i];
				$_FILES['file']['tmp_name'] = $files['file']['tmp_name'][$i];
				$_FILES['file']['error']    = $files['file']['error'][$i];
				$_FILES['file']['size']     = $files['file']['size'][$i];

				// we have to initialize before upload
				$this->upload->initialize($config);

				if (! $this->upload->do_upload("file")) {
					$errors++;
				}
			}

			if ($errors > 0){
				echo $errors . "File(s) cannot be uploaded";
			}

		} elseif($this->input->post('file_to_remove')){
		
			$file_to_remove = $this->input->post('file_to_remove');
			unlink("./application/modules/uploads/files/" . $file_to_remove);	
		
		} else {
			$this->listFiles();
		}
	}

	private function listFiles(){
		
		$this->load->helper('file');
		$files = get_filenames("./application/modules/uploads/files");
		echo json_encode($files);
	}
	
	

	// Close DB Connection
	function __destruct() {
		
		$this->db->close();
	}
	
}