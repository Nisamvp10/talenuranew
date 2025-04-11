<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System extends CI_Controller {

function __construct() {
		  parent::__construct();
          $this->load->helper('url');
		  $this->load->helper('date');
		  login_check();
   }

	public function index()
	{
		$this->load->view('admin/home');
	}

	public function appdata()
	{
		$this->load->view('admin/appdata');
	}

	function appdataSubmit(){
		$data = $this->input->post();
		foreach ($data as $name => $value) {
			 update_app($name,$value);
		}
		redirect('admin/system/appdata');
	}
}

 