<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

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
        $this->load->view('admin/slider/index');
	   
    }

    function sliderdatas(){   
    	$data=array();
     $postData = $this->input->post();
     $data = $this->common->sliderdata($postData);
     echo json_encode($data);
    }

  public function create($id = FALSE){  
        if($id){
             $data['slider'] = $this->common->select_row('slider','*',array('slider_id'=>$id , 'status'=>1));
             $this->load->view('admin/slider/create_slider',$data);
        }else{
            $this->load->view('admin/slider/create_slider');
        }
        
    }

    function submit(){

      $id= $this->input->post('id');
      $oldPath = $this->input->post('path');

      $this->form_validation->set_rules('title','Title','required');
      $this->form_validation->set_rules('description','Description','required');
        if($this->form_validation->run() == TRUE){
          if($id){

            $file_data = $this->Image_uploading_model->image_uploader();

            $imagePath = $file_data['file_name'];
            $dataa =  array(
                         'title'=>$this->input->post('title'),
                        'description'=>$this->input->post('description'),
                        'loger' => $this->session->userdata('login_id'),
                        'status'=>1);

            if ($file_data == FALSE) {
               $up_id = $this->common->update_data('slider',$dataa,array('slider_id' => $id)); //$this->session->set_flashdata('fmsg',' updation Failed Please check imahe name Or try Better one');
                $this->session->set_flashdata('msg','Udation Success');
            }else{
              if(!empty($oldPath)){
                if(file_exists('./uploads/slider/'.$oldPath)){
                    if(unlink('./uploads/slider/'.$oldPath)){

                        $dataa['path'] = $imagePath;
                        $up_id = $this->common->update_data('slider',$dataa,array('slider_id' => $id));
                        if ($id) {
                          $this->session->set_flashdata('msg','Udation Success');

                        }else{
                              $this->session->set_flashdata('xmsg','Udation updation failed');
                        }
                }else{
                   $up_id = $this->common->update_data('slider',$dataa,array('slider_id' => $id));
                    $this->session->set_flashdata('msg','Udation Success');
                }
              }else{
                 if(!empty($imagePath)){
                 $dataa['path'] = $imagePath;
              }
               
                 $up_id = $this->common->update_data('slider',$dataa,array('slider_id' => $id));
                  $this->session->set_flashdata('msg','Udation Success');
              }
             }else{
               if(!empty($imagePath)){
                 $dataa['path'] = $imagePath;
              }
               $up_id = $this->common->update_data('slider',$dataa,array('slider_id' => $id));
               $this->session->set_flashdata('msg','Udation Success');

            }
          }
           
        }else{
               
            $file_data = $this->Image_uploading_model->image_uploader();
            //print_r($file_data);
            $imagePath = $file_data['file_name'];
            $dataa =  array(
                        'title'=>$this->input->post('title'),
                        'description'=>$this->input->post('description'),
                        'path' => $imagePath ,
                        'loger' => $this->session->userdata('login_id'),
                        'status'=>1);
            $id = $this->common->insertData('slider',$dataa);

                        if(!empty($id)){

                            $this->session->set_flashdata('xmsg','Your New slider Added Success');
                            redirect('admin/slider');

                        }else{

                            $this->session->set_flashdata('xmsg','Your New slider Ading Failed');
                            redirect('admin/slider');
                        }
        }
      }else{

      }
         redirect('admin/slider');
       }
  function delete(){
    $valid['Success'] = array('status'=>400,'msg'=>array());

      $id = $this->input->post('id');
      $path = $this->input->post('path');

     if($id){
         $data['messages'] = $this->common->deleteData('slider',array('slider_id'=>$id),'slider',$path);

          $data['status'] = 200;
          $this->session->set_flashdata('msg','Delete Success');
       }else{
         $data['messages'] ='Data not found';
         $data['status'] = 500;
         $this->session->set_flashdata('xmsg','Please try later');
       }
      //$data['messages'] =$this->db->last_query();;
      //$data['status'] = 500;
      echo json_encode($data);
  }
}
