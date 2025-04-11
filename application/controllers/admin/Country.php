<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Country extends CI_Controller {

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

	public function index()
	{	
		$this->load->view('admin/country/index');
	}

  public function university_list($id = FALSE)
  { $data['id'] = $id;
    $this->load->view('admin/country/university_list',$data);
  }

  public function courses_list($id = FALSE)
  { $data['id'] = $id;
    $this->load->view('admin/country/course_list',$data);
  }

  public function cost_list($id = FALSE)
  { $data['id'] = $id;
    $this->load->view('admin/country/cost_list',$data);
  }

   function costedata(){   
     $data     = array();
     $postData = $this->input->post();
     $data     = $this->country_model->costedata($postData);
     echo json_encode($data);
    }

    function universitylist(){   
     $data     = array();
     $postData = $this->input->post();
     $data     = $this->country_model->university($postData);
     echo json_encode($data);
    }

    function courselist(){   
     $data     = array();
     $postData = $this->input->post();
     $data     = $this->country_model->coursedata($postData);
     echo json_encode($data);
    }

     function coursedata(){   
     $data     = array();
     $postData = $this->input->post();
     $data     = $this->country_model->coursedata($postData);
     echo json_encode($data);
    }

	function list(){   
     $data     = array();
     $postData = $this->input->post();
     $data     = $this->common->country_pagetsdatas($postData);
     echo json_encode($data);
  }

  public function create($id = FALSE){  
        if($id){
             $data['page'] = $this->common->select_row('country_page','*',array('country_page_id'=>$id , 'status'=>1));
             $this->load->view('admin/country/create',$data);
        }else{
            $this->load->view('admin/country/create');
        }
        
    }

    function submit(){

      $id= $this->input->post('id');
      $oldPath = $this->input->post('path');

      $this->form_validation->set_rules('title','Title','required');
      // $this->form_validation->set_rules('description','Description','required');
        if($this->form_validation->run() == TRUE){

            $file_data = $this->Image_uploading_model->image_uploader('','country');

           $dataa =  array(
                        'title'             => $this->input->post('title'),
                        'category'          => $this->input->post('country'),
                        'main_content'      => $this->input->post('maincontent'),
                        'description'       => $this->input->post('description'),
                        'why_study'         => $this->input->post('why'),
                        'status'            => 1,

                      );
          if($id){
            $dataa['updated_by'] =  $this->session->userdata('login_id');
            $imagePath = $file_data['file_name'];
            $dataa['updated_at'] =  date('Y-m-d,H:i:s');

            if ($file_data == FALSE) {
               $up_id = $this->common->update_data('country_page',$dataa,array('country_page_id' => $id)); //$this->session->set_flashdata('fmsg',' updation Failed Please check imahe name Or try Better one');
                $this->session->set_flashdata('msg','Udation Success');
            }else{
              if(!empty($oldPath)){
                if(file_exists('./uploads/country/'.$oldPath)){
                    if(unlink('./uploads/country/'.$oldPath)){

                        $dataa['path'] = $imagePath;
                        $up_id = $this->common->update_data('country_page',$dataa,array('country_page_id' => $id));
                        if ($id) {
                          $this->session->set_flashdata('msg','Udation Success');

                        }else{
                              $this->session->set_flashdata('xmsg','Udation updation failed');
                        }
                }else{
                   $up_id = $this->common->update_data('country_page',$dataa,array('country_page_id' => $id));
                    $this->session->set_flashdata('msg','Udation Success');
                }
              }else{
                 if(!empty($imagePath)){
                 $dataa['path'] = $imagePath;
              }
               
                 $up_id = $this->common->update_data('country_page',$dataa,array('country_page_id' => $id));
                  $this->session->set_flashdata('msg','Udation Success');
              }
             }else{
               if(!empty($imagePath)){
                 $dataa['path'] = $imagePath;
              }
               $up_id = $this->common->update_data('country_page',$dataa,array('country_page_id' => $id));
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
            $inc = $this->common->insertData('country_page',$dataa);
              if(!empty($inc)){
                    $this->session->set_flashdata('msg','Your New page Created Successfully');
                    redirect('admin/country/create');
              }else{
                  $this->session->set_flashdata('xmsg','Your New gallery Ading Failed');
                  redirect('admin/country/create');
              }
        }
        }else{

        }
        redirect('admin/country');
    }

  function universities($id =FALSE){
    if(empty($id)){
      $data['id'] = '';
     }else{
      $data['id'] = $id;
     }
    $this->load->view('admin/country/universities',$data);
  }

  public function countryUniversity(){
    $valid['succes'] = array('status'=>400,'msg'=> array());
    $id = $this->input->post('id');
    if($id){
      $valid['data']   = $this->common->select_row('university','*',array('id'=>$id , 'status'=>1));
      $valid['status'] = 200;
    }
    echo json_encode($valid);
  }

  function countrycourses(){
    $valid['succes'] = array('status'=>400,'msg'=> array());
    $id = $this->input->post('id');
    if($id){
      $valid['data']   = $this->common->select_row('course','*',array('course_id'=>$id , 'status'=>1));
      $valid['status'] = 200;
    }
    echo json_encode($valid);
  }

  function countrycost(){   
    $valid['succes'] = array('status'=>400,'msg'=> array());
    $id = $this->input->post('id');
    if($id){
      $valid['data']   = $this->common->select_row('cost','*',array('id'=>$id , 'status'=>1));
      $valid['status'] = 200;
    }
    echo json_encode($valid);
  }

  public function universitiesUpdate (){
    $valid['succes'] = array('status' => 400,'msg');
    $this->form_validation->set_rules('title','Title','required');

    if($this->form_validation->run() == TRUE){

        $id = $this->input->post('id');
        $oldPath = $this->input->post('path');

      if($id){
          $file_data = $this->Image_uploading_model->image_uploader('','university');
          $dataa = array(
            'university' => $this->input->post('title'),
          );
          if(!empty($_FILES['file']['name'][0])){
            $imagePath = $file_data['file_name'];
          }
            $dataa['updated_at'] =  date('Y-m-d,H:i:s');

            if ($file_data == FALSE) {
                $this->session->set_flashdata('msg','Udation Success');
            }else{
              if(!empty($oldPath)){
                if(file_exists('./uploads/university/'.$oldPath)){
                    if(unlink('./uploads/university/'.$oldPath)){
                        $dataa['path'] = $imagePath;
                      }else{
                        $this->session->set_flashdata('msg','Udation Success');
                      }
                  }else{
                    if(!empty($imagePath)){
                      $dataa['path'] = $imagePath;
                    }
                  }
              }else{
                if(!empty($imagePath)){
                 $dataa['path'] = $imagePath;
              }
               $this->session->set_flashdata('msg','Udation Success');
            }
          }

          $this->common->update_data('university',$dataa,array('id' => $id));
          $valid['status'] = 200;
          $valid['msg']    = "Update Success";
      }
    }else{
      $valid['msg'] = "Please Enter University name";
    }
    echo json_encode($valid);
  }
  public function universitiessubmit(){

    $id= $this->input->post('id');
    $oldPath = $this->input->post('path');
    $this->form_validation->set_rules('title','Title','required');

    if($this->form_validation->run() == TRUE){
        $file_data = $this->Image_uploading_model->image_uploader('','university');

        $dataa =  array(
          'university'        => $this->input->post('title'),
          'country_id'        => $id,
          'status'            => 1,
          );

         if($universityid){

            $imagePath = $file_data['file_name'];
            $dataa['updated_at'] =  date('Y-m-d,H:i:s');

            if ($file_data == FALSE) {
                $this->session->set_flashdata('msg','Udation Success');
            }else{
              if(!empty($oldPath)){
                if(file_exists('./uploads/university/'.$oldPath)){
                    if(unlink('./uploads/university/'.$oldPath)){
                        $dataa['path'] = $imagePath;
                      }else{
                        $this->session->set_flashdata('msg','Udation Success');
                      }
                  }else{
                    if(!empty($imagePath)){
                      $dataa['path'] = $imagePath;
                    }
                  }
              }else{
                if(!empty($imagePath)){
                 $dataa['path'] = $imagePath;
              }
               $this->session->set_flashdata('msg','Udation Success');
            }
          }
          $this->common->update_data('university',$dataa,array('id' => $id));

          }else{

            $imagePath = $file_data['file_name'];
            $dataa['path'] = $imagePath;
            $dataa['created_at'] =  date('Y-m-d,H:i:s');
            $uniinc = $this->common->insertData('university',$dataa);
              if(!empty($uniinc)){

                    $this->session->set_flashdata('msg','Your New gallery Added Success');
                    redirect('admin/country/universities/'.$id);
              }else{
                  $this->session->set_flashdata('xmsg','Your New gallery Ading Failed');
                  redirect('admin/country/universities/'.$id);
              }
          }
    }else{

    }
  }
  public function courses($id = FALSE){
    $data['id'] = $id; 
    $this->load->view('admin/country/courses',$data);
  }

  public function coursesUpdate(){

    $valid['succes'] = array('status' => 400,'msg');
    $id = $this->input->post('id');
    $this->form_validation->set_rules('title','Title','required');

    if($this->form_validation->run() == TRUE){
      if(!empty($id)){
          $dataa['course']     = $this->input->post('title');
          $dataa['updated_at'] =  date('Y-m-d,H:i:s');
          $this->common->update_data('course',$dataa,array('course_id' => $id));
          $valid['status'] = 200;
          $valid['msg']    = "Success";
      }
    }else{
      $valid['msg'] = "Please Enter University name";
    }
    echo json_encode($valid);
  }

  public function coursesubmit(){
    $id = $this->input->post('id');
    $courseid = $this->input->post('courseid');
    $this->form_validation->set_rules('title','Title','required');

    if($this->form_validation->run() == TRUE){

        $dataa =  array(
          'course'            => $this->input->post('title'),
          'country_id'        => $id,
          'status'            => 1,
          );

         if($courseid){

            $dataa['updated_at'] =  date('Y-m-d,H:i:s');
            $this->common->update_data('course',$dataa,array('id' => $id));

          }else{
            $dataa['created_at'] =  date('Y-m-d,H:i:s');
            $coursere = $this->common->insertData('course',$dataa);
              if(!empty($coursere)){

                    $this->session->set_flashdata('msg','Your New gallery Added Success');
                    redirect('admin/country/courses/'.$id);
              }else{
                  $this->session->set_flashdata('xmsg','Failed');
                  redirect('admin/country/courses/'.$id);
              }
          }
    }else{

    }
  }

  public function cost($id = FALSE){
    $data['id'] = $id; 
    $this->load->view('admin/country/cost',$data);
  }

  public function costUpdate(){

    $valid['succes'] = array('status' => 400,'msg');
    $id = $this->input->post('id');
    $this->form_validation->set_rules('title','Title','required');

    if($this->form_validation->run() == TRUE){
      if(!empty($id)){
          $dataa['type_exppense'] = $this->input->post('title');
          $dataa['cost']          = $this->input->post('cost');
          $dataa['updated_at']    =  date('Y-m-d,H:i:s');
          $this->common->update_data('cost',$dataa,array('id' => $id));
          $valid['status'] = 200;
          $valid['msg']    = "Success";
      }
    }else{
      $valid['msg'] = "Please Enter University name";
    }
    echo json_encode($valid);
  }


  public function costsubmit(){
    $id= $this->input->post('id');
    $courseid = $this->input->post('courseid');
    $this->form_validation->set_rules('title','Title','required');

    if($this->form_validation->run() == TRUE){

        $dataa =  array(
          'type_exppense'     => $this->input->post('title'),
          'cost'              => $this->input->post('cost'),
          'country_id'        => $id,
          'status'            => 1,
          );

         if($courseid){

            $dataa['updated_at'] =  date('Y-m-d,H:i:s');
            $this->common->update_data('cost',$dataa,array('id' => $id));

          }else{
            $dataa['created_at'] =  date('Y-m-d,H:i:s');
            $coursere = $this->common->insertData('cost',$dataa);
              if(!empty($coursere)){

                    $this->session->set_flashdata('msg','Your New gallery Added Success');
                    redirect('admin/country/cost/'.$id);
              }else{
                  $this->session->set_flashdata('xmsg','Failed');
                  redirect('admin/country/cost/'.$id);
              }
          }
    }else{
       $this->session->set_flashdata('xmsg','Please fillout all required fields');
       redirect('admin/country/cost/'.$id);
    }
  }

  function delete(){
    $data['Success'] = array('status'=>400,'msg'=>array());

      $id = $this->input->post('id');
      $path = $this->input->post('path');

     if($id){
         $data['messages'] = $this->common->deleteData('country_page',array('country_page_id'=>$id),'country',$path);

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