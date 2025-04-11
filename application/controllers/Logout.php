<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	function __construct() {
		  parent::__construct();
      $this->load->helper('url');
			$this->load->library('form_validation');
			$this->load->helper('date');
   }

	public function index()
	{
    $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity' && $key != 'email' && $key !='fname' && $key != 'userId' && $key !='status' && $key != 'privilege'  && $key != 'loginuser' && $key != 'table' && $key != 'userlogged_in') {
                $this->session->unset_userdata($key);
            }
        }
    $this->session->sess_destroy();
    redirect('login');
	}
}
