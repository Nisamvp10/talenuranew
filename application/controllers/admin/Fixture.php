<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fixture extends CI_Controller {

 function __construct()
    {
        parent::__construct();

      $this->load->helper('url');
      $this->load->helper('form');
      $this->load->model('common');
      $this->load->model('fixture_model');
      $this->load->library('form_validation');
      $this->load->model('Image_uploading_model');
      login_check();
    }

   
	public function index($id = false){  
        $this->load->view('admin/fixture/index');
	   
    }

    function fixturedatas(){   
    	$data=array();
     $postData = $this->input->post();
     $data = $this->fixture_model->fixturedata($postData);
     echo json_encode($data);
    }

  public function create($id = FALSE){  
        if($id){
             $data['fixture'] = $this->common->select_row('fixture','*',array('id'=>$id,'status !='=>4));
             $this->load->view('admin/fixture/create_fixture',$data);
        }else{
            $this->load->view('admin/fixture/create_fixture');
        }
        
    }
     function submit(){

      $id= $this->input->post('id');

      $this->form_validation->set_rules('team_one','Team One','required');
      $this->form_validation->set_rules('team_two','Team Two','required');
        if($this->form_validation->run() == TRUE){
           $dataa =  array(
                         'team_one'=>$this->input->post('team_one'),
                        'team_two'=>$this->input->post('team_two'),
                        'team_two_score'=>$this->input->post('team_two_score'),
                        'team_one_score'=>$this->input->post('team_one_score'),
                         'date' => $this->input->post('date'),
                        'status' => $this->input->post('fixture_status'),
                        );

          if($id){
            $dataa['updated_at'] =  date('Y-m-d,H:i:s');
                $up_id = $this->common->update_data('fixture',$dataa,array('id' => $id));
                $this->session->set_flashdata('msg','Udation Success');   
                    redirect('admin/fixture');
        }else{
               
         $dataa['created_at'] =  date('Y-m-d,H:i:s');
            $id = $this->common->insertData('fixture',$dataa);

              if(!empty($id)){
                  $this->session->set_flashdata('xmsg','Your New slider Added Success');
                  redirect('admin/fixture');

                }else{

                  $this->session->set_flashdata('xmsg','Your New slider Ading Failed');
                  redirect('admin/fixture/create');
                }
        }
      }else{
        $this->session->set_flashdata('xmsg','Please Fillout all required fields');
         redirect('admin/fixture/create');
      }
  }


   function delete(){
    $data['Success'] = array('status'=>400,'msg'=>array());

      $id = $this->input->post('id');

     if($id){
         $data['messages'] = $this->common->update_data('fixture',array('status'=>4),array('id' => $id));

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