<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

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
        $this->load->view('admin/events/index');
     
    }

    function eventsdatas(){   
      $data=array();
     $postData = $this->input->post();
     $data = $this->common->eventsdatas($postData);
     echo json_encode($data);
    }

  public function create($id = FALSE){  
        if($id){
             $data['blog'] = $this->common->select_row('blog','*',array('id'=>$id , 'status'=>1));
             $this->load->view('admin/events/create_events',$data);
        }else{
            $this->load->view('admin/events/create_events');
        }
        
    }

    function submit(){

      $id= $this->input->post('id');
      $oldPath = $this->input->post('path');

      $this->form_validation->set_rules('title','Title','required');
      // $this->form_validation->set_rules('description','Description','required');
        if($this->form_validation->run() == TRUE){

            $file_data = $this->Image_uploading_model->image_uploader('','blog');

           $dataa =  array(
                        'title'             => $this->input->post('title'),
                        'short_description' => $this->input->post('short_description'),
                        'author'            => $this->input->post('author'),
                        'description'       => $this->input->post('description'),
                        'status'            => 1,

                      );
          if($id){
            $dataa['updated_by'] =  $this->session->userdata('login_id');
            $imagePath = $file_data['file_name'];
            $dataa['updated_at'] =  date('Y-m-d,H:i:s');

            if ($file_data == FALSE) {
               $up_id = $this->common->update_data('blog',$dataa,array('id' => $id)); //$this->session->set_flashdata('fmsg',' updation Failed Please check imahe name Or try Better one');
                $this->session->set_flashdata('msg','Udation Success');
            }else{
              if(!empty($oldPath)){
                if(file_exists('./uploads/blog/'.$oldPath)){
                    if(unlink('./uploads/blog/'.$oldPath)){

                        $dataa['path'] = $imagePath;
                        $up_id = $this->common->update_data('blog',$dataa,array('id' => $id));
                        if ($id) {
                          $this->session->set_flashdata('msg','Udation Success');

                        }else{
                              $this->session->set_flashdata('xmsg','Udation updation failed');
                        }
                }else{
                   $up_id = $this->common->update_data('testimonials',$dataa,array('id' => $id));
                    $this->session->set_flashdata('msg','Udation Success');
                }
              }else{
                 if(!empty($imagePath)){
                 $dataa['path'] = $imagePath;
              }
               
                 $up_id = $this->common->update_data('events',$dataa,array('id' => $id));
                  $this->session->set_flashdata('msg','Udation Success');
              }
             }else{
               if(!empty($imagePath)){
                 $dataa['path'] = $imagePath;
              }
               $up_id = $this->common->update_data('events',$dataa,array('id' => $id));
               $this->session->set_flashdata('msg','Udation Success');

            }
          }
           
        }else{
               
          //  $file_data = $this->Image_uploading_model->image_uploader();
            //print_r($file_data);
            $imagePath = $file_data['file_name'];
            $dataa['slug'] = $this->input->post('blogurl');
            $dataa['path'] = $imagePath;
            $dataa['created_at'] =  date('Y-m-d,H:i:s');
            $dataa['created_by'] =  $this->session->userdata('login_id');
            $id = $this->common->insertData('blog',$dataa);
              if(!empty($id)){

                    $this->session->set_flashdata('xmsg','Your New gallery Added Success');
                    redirect('admin/events');
              }else{
                  $this->session->set_flashdata('xmsg','Your New gallery Ading Failed');
                  redirect('admin/events');
              }
        }
        }else{

        }
         redirect('admin/events');
    }
  function delete(){
    $data['Success'] = array('status'=>400,'msg'=>array());

      $id = $this->input->post('id');
      $path = $this->input->post('path');

     if($id){
         $data['messages'] = $this->common->deleteData('blog',array('id'=>$id),'blog',$path);

          $data['status'] = 200;
          $this->session->set_flashdata('msg','Delete Success');
            $data['msg'] ='Success';
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
