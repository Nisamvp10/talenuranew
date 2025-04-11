<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Image_uploading_model extends CI_Model {
	 function __construct(){
        $this->load->database();
    }

   public function image_uploader($path=FALSE,$folder=FALSE){
   	create_folder('uploads/'.$folder.'/','index','index');
   	if(empty($folder)){
   		$path = './uploads/slider';
   	}else{
   		$path = './uploads/'.$folder;
   	}
   	if(!empty($_FILES['file']['name'])){
   		$image = time().$_FILES['file']['name'];
	    $imagePath = str_replace(' ', '_', $image);
	    $config['upload_path'] = $path;
	    $config['file_name'] = $imagePath;
	    $config['overwrite'] = TRUE;
	    $config['encrypt_name'] = TRUE;
	    $config['allowed_types'] = 'jpg|png|jpeg|gif|pdf|webp|mp4';


	     $this->load->library('upload', $config);
	     $this->upload->initialize($config);
	        if(! $this->upload->do_upload('file')){
	        	 $errors = $this->upload->display_errors();
	             $this->session->set_flashdata('up_Nimg','0');

	        }
	        else{
	            return $this->upload->data();
	        }
	    }else{
	    	return FALSE;
	    }

    	
	}


public function video_uploader($path=FALSE,$folder=FALSE){
   	create_folder('uploads/'.$folder,'index','index');
   	
   	if(empty($folder)){
   		$path = './uploads/slider';
   	}else{
   		$path = './uploads/'.$folder;
   	}
   	if(!empty($_FILES['video_file']['name']))
	{
   		$image = time().$_FILES['video_file']['name'];
	    $imagePath = str_replace(' ', '_', $image);
	    $config['upload_path'] = $path;
	    $config['file_name'] = $imagePath;
	    $config['overwrite'] = TRUE;
	    $config['encrypt_name'] = TRUE;
	    $config['allowed_types'] = 'jpg|png|jpeg|gif|pdf|webp|mp4';

	    $this->load->library('upload', $config);
	    $this->upload->initialize($config);
	        if(! $this->upload->do_upload('video_file')){
	        	 $errors = $this->upload->display_errors();
	             $this->session->set_flashdata('up_Nimg','0');
	        }
	        else{
	            return $this->upload->data();
	        }
	    }else{
	    	return FALSE;
	    }
	}

public function fun_image_uploader($file,$folder=FALSE,$path=FALSE){
	create_folder('uploads/'.$folder.'/','index','index');
   	
   	if(empty($path)){
   		 $path = './uploads/'.$path;
   	}else{
   		 $path = './uploads/'.$path;
   	}
   	if(!empty($_FILES[$file]['name']))
	{
   		$image = time().$_FILES[$file]['name'];
	    $imagePath = str_replace(' ', '_', $image);
	    $config['upload_path'] = $path;
	    $config['file_name'] = $imagePath;
	    $config['overwrite'] =TRUE;
	    $config['encrypt_name']         = TRUE;
	    $config['allowed_types'] = 'jpg|png|jpeg|gif|pdf|webp|svg|docx';

	    $this->load->library('upload', $config);
	    $this->upload->initialize($config);
	        if(! $this->upload->do_upload($file)){
	        	 $errors = $this->upload->display_errors();
	             $this->session->set_flashdata('up_Nimg','0');
	        }
	        else{
	            return $this->upload->data();
	        }
	    }else{
	    	return FALSE;
	    }
	}

public function deleteData($table,$folder,$condition,$path=FALSE){
    if($path){
        unlink('uploads/'.$folder.'/'.$path);
    }
    $this->db->where($condition);
    $this->db->delete($table);
}

	  public function brochure_uploader(){

        $image = time().$_FILES['catelog']['name'];
	    $imagePath = str_replace(' ', '_', $image);
	    $config['upload_path'] = './productImages';
	    $config['file_name'] = $imagePath;
	    $config['overwrite'] =TRUE;
	    $config['encrypt_name']         = TRUE;
	    $config['allowed_types'] = 'pdf|jpeg|jpg|png';

	     $this->load->library('upload', $config);
	     $this->upload->initialize($config);
	        if(! $this->upload->do_upload('catelog')){
	            $this->session->set_flashdata('up_pdf','0');
	            
	        }
	        else{
	        	// $this->session->set_flashdata('up_pdf','1');
	            return $this->upload->data();
	        }
	}
}






