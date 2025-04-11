<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {

 function __construct()
    {
        parent::__construct();

      $this->load->helper('url');
      $this->load->helper('form');
      $this->load->model('common');
      $this->load->library('form_validation');
      $this->load->model('Image_uploading_model');
      login_check();
    }

   
	public function index($id = false){  
        $this->load->view('admin/history/index');
	   
    }

    function historydatas(){   
    	$data=array();
     $postData = $this->input->post();
     $data = $this->common->historydata($postData);
     echo json_encode($data);
    }

  public function create($id = FALSE){  
        if($id){
             $data['history'] = $this->common->select_row('temple_history','*',array('history_id'=>$id , 'status'=>1));
             $this->load->view('admin/history/create_history',$data);
        }else{
            $this->load->view('admin/history/create_history');
        }
        
    }
     function submit(){

      $id= $this->input->post('id');

      $this->form_validation->set_rules('title','Title','required');
      $this->form_validation->set_rules('description','Description','required');
        if($this->form_validation->run() == TRUE){
           $dataa =  array(
                         'title'=>$this->input->post('title'),
                        'description'=>$this->input->post('description'),
                        'more' => $this->input->post('more'),
                        'status'=>1);

          if($id){
            $dataa['updated_at'] =  date('Y-m-d,H:i:s');
                $up_id = $this->common->update_data('temple_history',$dataa,array('history_id' => $id));
                $this->session->set_flashdata('msg','Udation Success');   
                    redirect('admin/history');
        }else{
               
         $dataa['created_at'] =  date('Y-m-d,H:i:s');
            $id = $this->common->insertData('temple_history',$dataa);

              if(!empty($id)){
                  $this->session->set_flashdata('xmsg','Your New slider Added Success');
                  redirect('admin/history');

                }else{

                  $this->session->set_flashdata('xmsg','Your New slider Ading Failed');
                  redirect('admin/histor/create');
                }
        }
      }else{
        $this->session->set_flashdata('xmsg','Please follout all required fields');
         redirect('admin/histor/create');
      }
  }


   function delete(){
    $data['Success'] = array('status'=>400,'msg'=>array());

      $id = $this->input->post('id');

     if($id){
         $data['messages'] = $this->common->deleteData('temple_history',array('history_id'=>$id),' ',' ');

          $data['status'] = 200;
            $data['msg'] = 'Delete Success';
         // $this->session->set_flashdata('msg','Delete Success');
       }else{
         $data['msg'] ='Data not found';
         $data['status'] = 500;
         $this->session->set_flashdata('xmsg','Please try later');
       }
      //$data['messages'] =$this->db->last_query();;
      //$data['status'] = 500;
      echo json_encode($data);
  }


}