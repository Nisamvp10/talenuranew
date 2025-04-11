<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller {

 function __construct()
    {
        parent::__construct();

      $this->load->helper('url');
      $this->load->helper('form');
      $this->load->model('common');
      $this->load->library('form_validation');
      $this->load->model('Image_uploading_model');
      $this->load->model('About_model');
      login_check();
    }

   
  public function index($id = false){ 
        $data['pageTitle'] = "Clients Listing";
        $this->load->view('admin/clients/index',$data);
     
    }

    function clientsdatas(){   
      $data=array();
     $postData = $this->input->post();
     $data = $this->About_model->clientsdatas($postData);
     echo json_encode($data);
    }

  public function create($id = FALSE){  
        if($id){
            $data['pageTitle'] = "Edit Client";
            $data['clients'] = $this->common->select_row('clients','*',array('id'=>$id , 'status'=>1));
        }else{
            $data['pageTitle'] = "Create Client ";
        }
        $this->load->view('admin/clients/create_client',$data);
        
    }

    function submit(){

      $id= $this->input->post('id');
      $oldPath = $this->input->post('path');

          if (empty($_FILES['file']['name']))
          {
              $this->form_validation->set_rules('file', 'Document', 'required');
          }
        //if($this->form_validation->run() == TRUE){ echo"niz";
           $file_data = $this->Image_uploading_model->image_uploader('','clients');
          $dataa = array('status'=> 1 );
          if($id){

            $imagePath = $file_data['file_name'];
            $dataa['updated_at'] =  date('Y-m-d,H:i:s');

            if ($file_data == FALSE) {
               $up_id = $this->common->update_data('clients',$dataa,array('id' => $id)); //$this->session->set_flashdata('fmsg',' updation Failed Please check imahe name Or try Better one');
                $this->session->set_flashdata('msg','Updation Success');
            }else{
              if(!empty($oldPath)){
                if(file_exists('./uploads/clients/'.$oldPath)){
                    if(unlink('./uploads/clients/'.$oldPath)){

                        $dataa['path'] = $imagePath;
                        $up_id = $this->common->update_data('clients',$dataa,array('id' => $id));
                        if ($id) {
                          $this->session->set_flashdata('msg','Updation Success');

                        }else{
                              $this->session->set_flashdata('xmsg','Updation updation failed');
                        }
                }else{
                   $up_id = $this->common->update_data('clients',$dataa,array('id' => $id));
                    $this->session->set_flashdata('msg','Updation Success');
                }
              }else{
                 if(!empty($imagePath)){
                 $dataa['path'] = $imagePath;
              }
               
                 $up_id = $this->common->update_data('clients',$dataa,array('id' => $id));
                  $this->session->set_flashdata('msg','Updation Success');
              }
             }else{
               if(!empty($imagePath)){
                 $dataa['path'] = $imagePath;
              }
               $up_id = $this->common->update_data('clients',$dataa,array('id' => $id));
               $this->session->set_flashdata('msg','Udation Success');

            }
          }
           
        }else{
               
          //  $file_data = $this->Image_uploading_model->image_uploader();
            //print_r($file_data);
            $imagePath = $file_data['file_name'];
            $dataa['path'] = $imagePath;
            $dataa['created_at'] =  date('Y-m-d,H:i:s');
            $id = $this->common->insertData('clients',$dataa);

            if(!empty($id)){

                $this->session->set_flashdata('smsg',' Success');
               // redirect('admin/clients');

            }else{
                  $this->session->set_flashdata('xmsg','Your New gallery Ading Failed');
                 // redirect('admin/clients');
            }
        }
     // }else{
        //  $this->session->set_flashdata('xmsg','Select Your client image ');
     // }
         redirect('admin/clients/create');
       }
  function delete(){
    $data['Success'] = array('status'=>400,'msg'=>array());

      $id = $this->input->post('id');
      $path = $this->input->post('path');

     if($id){
         $data['messages'] = $this->common->deleteData('clients',array('id'=>$id),'clients',$path);

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
