<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

function __construct() {
		  parent::__construct();
          $this->load->helper('url');
		  $this->load->helper('date');
		  $this->load->model('login_model');
   }

	public function index()
	{
		$this->load->view('admin/login');
	}

	public function login()
	{
		$this->form_validation->set_rules('email','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run() == true){

				$loginData = array(
					'user_name' => $this->input->post('email'),
					'password' => md5($this->input->post('password')),
				);

				$resultLogin = $this->login_model->login('login','*',$loginData);
				if($resultLogin){

					if($resultLogin->login_status ==1 || $resultLogin->login_status ==2 || $resultLogin->login_status ==3 || $resultLogin->login_status ==4  ){
						if ($resultLogin->login_status ==1) {
								$type ="Developer";
						}
						if ($resultLogin->login_status ==2) {
								$type="Admin";
						}
						if ($resultLogin->login_status ==3) {
								$type="Super Admin";
						}
						if ($resultLogin->login_status == 4) {
								$type="Staff";
						}

						$this->session->set_userdata(array(
			            'user_name'    =>  $resultLogin->user_name,
			            'name'         =>  $resultLogin->name,
			            'login_id'     =>  $resultLogin->login_id,
			            'login_status' =>  $resultLogin->login_status,
			            'type'         =>  $type,
			            'last_activity'=>  $resultLogin->last_activity,
			            'logged_in'    =>  TRUE
			          ));
			          last_activity();
			          redirect('admin/home');

					}else {
						$this->session->set_flashdata('fmsg','You Are Not Allowed to Access...!');
						redirect('admin/login');
					}
				}else {
					$this->session->set_flashdata('fronterrormsg','user Name or Password incorrect...!');
	        redirect('admin/login');
				}

		}else{
			$this->session->set_flashdata('fronterrormsg','User Name or Password incorrect...!');
	        redirect('admin/login');
		}
	
	}
}
