<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Players extends CI_Controller {

 function __construct()
    {
        parent::__construct();

      $this->load->helper('url');
      $this->load->helper('form');
      $this->load->model('common');
      $this->load->model('Players_model');
      $this->load->library('form_validation');
      $this->load->model('Image_uploading_model');
      login_check();
    }

   
  public function index($id = false){  
        $this->load->view('admin/players/index');
     
    }

    function playersdatas(){   
      $data=array();
     $postData = $this->input->post();
     $data = $this->Players_model->playersdatas($postData);
     echo json_encode($data);
    }

  public function create($id = FALSE){  
        if($id){
             $data['players'] = $this->common->select_row('register','*',array('id'=>$id));
             $this->load->view('admin/players/create_players',$data);
        }else{
            $this->load->view('admin/players/create_players');
        }
        
    }




     function submit(){

      $id= $this->input->post('id');
      $oldPath = $this->input->post('path');

    
    $this->form_validation->set_rules('name','Name','required');
    $this->form_validation->set_rules('email','Email','required');
    $this->form_validation->set_rules('contactnumber','Contact Number','required');
    $this->form_validation->set_rules('clubName','Club Name','required');
    $this->form_validation->set_rules('city','City','required');
    $this->form_validation->set_rules('state','State','required');
    $this->form_validation->set_rules('country','Country','required');


        if($this->form_validation->run() == TRUE){

            $file_data =  $this->Image_uploading_model->image_uploader('','players');

            $dataa = array(

            'name'       => $this->input->post('name'),
            //'email'      => $this->input->post('email'),
            'contactnumber'  => $this->input->post('contactnumber'),
            'clubName'   => $this->input->post('clubName'),
            'city'       => $this->input->post('city'),
            'state'      => $this->input->post('state'),
            'country'    => $this->input->post('country'),
            'selected_payers' => $this->input->post('position'),
            'status'     => 1,
        );

          if($id){

          

            $imagePath = $file_data['file_name'];
            $dataa['updated_at'] =  date('Y-m-d,H:i:s');

            if ($file_data == FALSE) {
               $up_id = $this->common->update_data('register',$dataa,array('id' => $id)); //$this->session->set_flashdata('fmsg',' updation Failed Please check imahe name Or try Better one');
                $this->session->set_flashdata('msg','Udation Success');
            }else{
              if(!empty($oldPath)){
                if(file_exists('./uploads/players/'.$oldPath)){
                    if(unlink('./uploads/players/'.$oldPath)){

                        $dataa['profile'] = $imagePath;
                        $up_id = $this->common->update_data('register',$dataa,array('id' => $id));
                        if ($id) {
                          $this->session->set_flashdata('msg','Udation Success');

                        }else{
                              $this->session->set_flashdata('xmsg','Udation updation failed');
                        }
                }else{
                   $up_id = $this->common->update_data('register',$dataa,array('id' => $id));
                    $this->session->set_flashdata('msg','Udation Success');
                }
              }else{
                 if(!empty($imagePath)){
                 $dataa['profile'] = $imagePath;
              }
               
                 $up_id = $this->common->update_data('register',$dataa,array('id' => $id));
                  $this->session->set_flashdata('msg','Udation Success');
              }
             }else{
               if(!empty($imagePath)){
                 $dataa['profile'] = $imagePath;
              }
               $up_id = $this->common->update_data('register',$dataa,array('id' => $id));
               $this->session->set_flashdata('msg','Udation Success');

            }
          }
           
        }else{
               
          //  $file_data = $this->Image_uploading_model->image_uploader();
            //print_r($file_data);
            $imagePath = $file_data['file_name'];
            $dataa['profile'] = $imagePath;
            $dataa['created_at'] =  date('Y-m-d,H:i:s');

            $id = $this->common->insertData('register',$dataa);

                        if(!empty($id)){

                            $this->session->set_flashdata('xmsg','Your New gallery Added Success');
                            redirect('admin/players');

                        }else{

                            $this->session->set_flashdata('xmsg','Your New gallery Ading Failed');
                            redirect('admin/players');
                        }
        }
      }else{

      }
         redirect('admin/players');
       }


    function delete(){
    $data['Success'] = array('status'=>400,'msg'=>array());

      $id = $this->input->post('id');
      $path = $this->input->post('path');

     if($id){
         $data['messages'] = $this->common->deleteData('register',array('id'=>$id),'players',$path);

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
  
  public function accountverified(){
            $data['Success'] = array('status'=>400,'msg'=>array());
            $id = $this->input->post('id');
            
        if($id){
            $dataa = array('status'=> 1 );
             $this->common->update_data('register',$dataa,array('id' => $id));

          $data['status'] = 200;
          
            $data['msg'] ='Account Successfully Verified';
       }else{
         $data['msg'] ='Account verification failed please try later';
         $data['status'] = 500;
       }
      //$data['messages'] =$this->db->last_query();;
      //$data['status'] = 500;
      echo json_encode($data);
      
  }
  
    public function accountrejected(){
            $data['Success'] = array('status'=>400,'msg'=>array());
            $id = $this->input->post('id');
            
        if($id){
            $dataa = array('status'=> 2 );
             $this->common->update_data('register',$dataa,array('id' => $id));

          $data['status'] = 200;
          
            $data['msg'] ='Account Successfully Rejected';
       }else{
         $data['msg'] ='Account Rejected failed please try later ';
         $data['status'] = 500;
       }
      //$data['messages'] =$this->db->last_query();;
      //$data['status'] = 500;
      echo json_encode($data);
      
  }
  
  function scoreboard(){
      $this->load->view('admin/scoreboard/index');
  }
  
  public function app(){
     
        if(isset($_FILES['scoreboard']['name'])){
              $about_file_oldPath   = $this->input->post('old_scoreboard'); 
              $about_file = $this->imageuploader('scoreboard','scoreboard','scoreboard',$about_file_oldPath);
            if ($about_file) {
              update_app('scoreboard',$about_file);
              
            }
          }
          redirect('admin/players/scoreboard');
  }
      
 function imageuploader($file,$folder,$path,$oldpath){
  if(!empty($_FILES[$file]['name'])){
      $file_data = $this->Image_uploading_model->fun_image_uploader($file,$folder,$path);
      $imagePath = $file_data['file_name'];

        if(file_exists('./uploads/'.$folder.'/'.$oldpath)){
          if(!empty( $oldpath)){ unlink('./uploads/'.$folder.'/'.$oldpath); }
            }else{
              echo "Updation File not on location"; 
                $this->session->set_flashdata('fmsg','Updation File not on location');
            }
      return  $imagePath;
    }else{
      return false;
    }
 }
  

  }