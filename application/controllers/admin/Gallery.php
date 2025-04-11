<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

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
        $this->load->view('admin/gallery/index');
	   
    }

    function gallerydatas(){   
    	$data=array();
     $postData = $this->input->post();
     $data = $this->common->gallerydatas($postData);
     echo json_encode($data);
    }

  public function create($id = FALSE){  
        if($id){
             $data['gallery'] = $this->common->select_row('gallery','*',array('gallery_id'=>$id , 'status'=>1));
             $this->load->view('admin/gallery/create_gallery',$data);
        }else{
            $this->load->view('admin/gallery/create_gallery');
        }
        
    }

    function submit(){

      $id= $this->input->post('id');
      $oldPath = $this->input->post('path');

      $this->form_validation->set_rules('title','Title','required');
        if($this->form_validation->run() == TRUE){

            $file_data = $this->Image_uploading_model->image_uploader('','gallery');

           $dataa =  array(
                        'title'=>$this->input->post('title'),
                        'logger' => $this->session->userdata('login_id'),
                        'status'=>1);

          if($id){

          

            $imagePath = $file_data['file_name'];
            $dataa['updated_at'] =  date('Y-m-d,H:i:s');

            if ($file_data == FALSE) {
               $up_id = $this->common->update_data('gallery',$dataa,array('gallery_id' => $id)); //$this->session->set_flashdata('fmsg',' updation Failed Please check imahe name Or try Better one');
                $this->session->set_flashdata('msg','Udation Success');
            }else{
              if(!empty($oldPath)){
                if(file_exists('./uploads/gallery/'.$oldPath)){
                    if(unlink('./uploads/gallery/'.$oldPath)){

                        $dataa['path'] = $imagePath;
                        $up_id = $this->common->update_data('gallery',$dataa,array('gallery_id' => $id));
                        if ($id) {
                          $this->session->set_flashdata('msg','Udation Success');

                        }else{
                              $this->session->set_flashdata('xmsg','Udation updation failed');
                        }
                }else{
                   $up_id = $this->common->update_data('gallery',$dataa,array('gallery_id' => $id));
                    $this->session->set_flashdata('msg','Udation Success');
                }
              }else{
                 if(!empty($imagePath)){
                 $dataa['path'] = $imagePath;
              }
               
                 $up_id = $this->common->update_data('gallery',$dataa,array('gallery_id' => $id));
                  $this->session->set_flashdata('msg','Udation Success');
              }
             }else{
               if(!empty($imagePath)){
                 $dataa['path'] = $imagePath;
              }
               $up_id = $this->common->update_data('gallery',$dataa,array('gallery_id' => $id));
               $this->session->set_flashdata('msg','Udation Success');

            }
          }
           
        }else{
               
          //  $file_data = $this->Image_uploading_model->image_uploader();
            //print_r($file_data);
            $imagePath = $file_data['file_name'];
            $dataa['path'] = $imagePath;
            $dataa['created_at'] =  date('Y-m-d,H:i:s');
            $id = $this->common->insertData('gallery',$dataa);

                        if(!empty($id)){

                            $this->session->set_flashdata('xmsg','Your New gallery Added Success');
                            redirect('admin/gallery');

                        }else{

                            $this->session->set_flashdata('xmsg','Your New gallery Ading Failed');
                            redirect('admin/gallery');
                        }
        }
      }else{

      }
         redirect('admin/gallery');
       }
  function delete(){
    $data['Success'] = array('status'=>400,'msg'=>array());

      $id = $this->input->post('id');
      $path = $this->input->post('path');

     if($id){
         $data['messages'] = $this->common->deleteData('gallery',array('gallery_id'=>$id),'gallery',$path);

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
