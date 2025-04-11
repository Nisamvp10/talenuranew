<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends Page_Controller {

function __construct() {
		  parent::__construct();
          $this->load->helper('url');
		  $this->load->helper('date');
		  $this->load->model('common');
		  $this->load->model('Image_uploading_model');
		  $this->load->library('form_validation');
   }

	public function index()
	{	
		$pageTitle = "Register";
		$bg = "kaba.webp";
		$events= $this->common->select_data('*','events',array('status'=>1,'event_status'=>1));
		$upcoming= $this->common->select_data('*','events',array('status'=>1,'event_status'=>2));
		$this->addData(compact('pageTitle','events','upcoming','bg'));
		$this->addAssets([
			
                'header' => [
                	//'admin/script/datatable',
                    'frond/header/form_link'
                ],'footer' => [
                	//'admin/script/datatable',
                    'frond/script/registration_links'
                ]
            ]);
		$this->render("register");
	}

		public function check()
	{

	  $email_id= trim($this->input->post('email',TRUE));    
	  echo $res=$this->common->check_mail_exist($email_id);

	}

	public function submit(){
		$valid['success'] = array('status'=> 400,'msg'=>array());

		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('contactnumber','Contact Number','required');
		$this->form_validation->set_rules('clubName','Club Name','required');
		$this->form_validation->set_rules('city','City','required');
		$this->form_validation->set_rules('state','State','required');
		$this->form_validation->set_rules('country','Country','required');

		if($this->form_validation->run() == TRUE){

			   $dup = $this->common->check_dublicate_data('register','email',array('email'=>$this->input->post('email')));;

			   if($dup === true){
				   	$data = array(

						'name'       => $this->input->post('name'),
						//'email'      => $this->input->post('email'),
						'contactnumber'  => $this->input->post('contactnumber'),
						'clubName'   => $this->input->post('clubName'),
						'city'       => $this->input->post('city'),
						'state'      => $this->input->post('state'),
						'country'    => $this->input->post('country'),
				);
				  $file_data = $this->Image_uploading_model->image_uploader('','players');

				   $imagePath = $file_data['file_name'];
		            $data['profile'] = $imagePath;
		            $data['created_at'] =  date('Y-m-d,H:i:s');
		            $data['email'] = $this->input->post('email');
		            $data['status'] = 2;
		            $id = $this->common->insertData('register',$data);

				  	$valid['msg'] = "Registration successfuly completed| our team will be in contact you Shortly";
					$valid['status'] = 200;
			   }else{
			   	 $valid['msg'] = 'This  email address['.$this->input->post('email').'] already exists. Please try a different email address to register';
			   }

		}else{
			$valid['msg'] = "Please fillout all required Fields";
		}

		echo json_encode($valid);

	}
}