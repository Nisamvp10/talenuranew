<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_preparation extends CI_Controller {

 function __construct(){

    parent::__construct();

    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->model('common');
    $this->load->model('Preparation_model');
    $this->load->library('form_validation');
    $this->load->model('Image_uploading_model');
      login_check();
  }

  public function index($id = false){  
    $data['pageTitle'] = "Test - Preparation"; 
    $this->load->view('admin/test_preparation/index',$data);
  }
  function preparationdataa(){   
     $data=array();
     $postData = $this->input->post();
     $data = $this->Preparation_model->preparationdataa($postData);
     echo json_encode($data);
  }

  public function create($id = false){ 
    if(!empty($id)){
       $data['preparation']  = $this->common->select_row('test_preparation','*',array('id'=>$id , 'status'=>1));
       $data['pageTitle'] = "Update Preparation"; 
    }else{
       $data['pageTitle'] = "Create Preparation"; 
    }
    $this->load->view('admin/test_preparation/create',$data);
  }

  function submit(){

      $id= $this->input->post('id');
      $oldPath = $this->input->post('path');

      $this->form_validation->set_rules('title','Title','required');
      // $this->form_validation->set_rules('description','Description','required');
        if($this->form_validation->run() == TRUE){

            $file_data = $this->Image_uploading_model->image_uploader('','test_preparation');

           $dataa =  array(
                        'title'             => $this->input->post('title'),
                        'language'          => $this->input->post('language'),
                        'short_description' => $this->input->post('short_description'),
                        'description'       => $this->input->post('description'),
                        'status'            => 1,

                      );
          if($id){

            $dataa['updated_by'] =  $this->session->userdata('login_id');
            $imagePath = $file_data['file_name'];
            $dataa['updated_at']  =  date('Y-m-d,H:i:s');
            $dataa['updated_by'] =  $this->session->userdata('login_id');

            if ($file_data == FALSE) {
               $up_id = $this->common->update_data('test_preparation',$dataa,array('id' => $id)); //$this->session->set_flashdata('fmsg',' updation Failed Please check imahe name Or try Better one');
                $this->session->set_flashdata('msg','Udation Success');
            }else{
              if(!empty($oldPath)){
                if(file_exists('./uploads/test_preparation/'.$oldPath)){
                    if(unlink('./uploads/test_preparation/'.$oldPath)){

                        $dataa['path'] = $imagePath;
                        $up_id = $this->common->update_data('test_preparation',$dataa,array('id' => $id));
                        if ($id) {
                          $this->session->set_flashdata('msg','Udation Success');

                        }else{
                              $this->session->set_flashdata('xmsg','Udation updation failed');
                        }
                }else{
                   $up_id = $this->common->update_data('test_preparation',$dataa,array('id' => $id));
                    $this->session->set_flashdata('msg','Udation Success');
                }
              }else{
                 if(!empty($imagePath)){
                 $dataa['path'] = $imagePath;
              }
               
                 $up_id = $this->common->update_data('test_preparation',$dataa,array('id' => $id));
                  $this->session->set_flashdata('msg','Udation Success');
              }
             }else{
               if(!empty($imagePath)){
                 $dataa['path'] = $imagePath;
              }
               $up_id = $this->common->update_data('test_preparation',$dataa,array('id' => $id));
               $this->session->set_flashdata('msg','Udation Success');

            }
          }
           
        }else{
               
             //$file_data = $this->Image_uploading_model->image_uploader();
            //print_r($file_data);

            $imagePath = $file_data['file_name'];
            $dataa['slug'] = $this->input->post('blogurl');
            $dataa['path'] = $imagePath;
            $dataa['created_at'] =  date('Y-m-d,H:i:s');
            $dataa['created_by'] =  $this->session->userdata('login_id');
            $id = $this->common->insertData('test_preparation',$dataa);
              if(!empty($id)){

                    $this->session->set_flashdata('xmsg','Your New gallery Added Success');
                    redirect('admin/test_preparation');
              }else{
                  $this->session->set_flashdata('msg','Your New gallery Ading Failed');
                  redirect('admin/test_preparation');
              }
        }
        }else{
          $this->session->set_flashdata('xmsg','Please Fillout all reauired fields');
          redirect('admin/test_preparation/create');
        }
         redirect('admin/test_preparation');
    }
}