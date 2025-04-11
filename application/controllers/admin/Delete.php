<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delete extends CI_Controller {

function __construct() {
	
	  parent::__construct();
      $this->load->helper('url');
	  $this->load->helper('date');
      $this->load->model('common');
      $this->load->model('country_model');
	  $this->load->library('form_validation');
      $this->load->model('Image_uploading_model');
      login_check();
   }

	function delete(){

    	$data['Success'] = array('status'=>400,'msg'=>array());

        $id     = $this->input->post('id');
        $path   = $this->input->post('path');
        $table  = $this->input->post('table');
        $folder = $this->input->post('folder');
        $where  = $this->input->post('tblId');

	     if($id){

	         $data['messages'] = $this->common->deleteData($table,array($where=>$id),$folder,$path);

	          $data['status'] = 200;
	         // $this->session->set_flashdata('msg','Delete Success');
	          $data['msg'] ='Success';

	       }else{

	         $data['msg'] ='Data not found';
	         $data['status'] = 500;
	        // $this->session->set_flashdata('xmsg','Please try later');
	       }
	      echo json_encode($data);
    }

	public function page(){
	 	$data['Success'] = array('status'=>400,'msg'=>array());
        $id     = $this->input->post('id');
        $path   = $this->input->post('path');
        $table  = $this->input->post('table');
        $folder = $this->input->post('folder');
        $where  = $this->input->post('tblId');

        if ($id) {
        	 $data['messages'] = $this->common->deleteData($table,array($where=>$id),$folder,$path);
        	 $this->common->deleteData('cost',array('country_id'=>$id),'','');
        	 $this->common->deleteData('course',array('country_id'=>$id),'','');
        	 $this->common->deleteData('university',array('country_id'=>$id),'','');

        	 $data['status'] = 200;
        	 $data['msg'] ='Success';
        }else{
	         $data['msg'] ='Data not found';
	         $data['status'] = 500;
	    }
	    echo json_encode($data);
	}
}