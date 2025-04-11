<?php
defined('BASEPATH') OR exit('No direct script allowed');
class Profile extends Frond_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('common');
        $this->load->model('PostModel');
    }
    function index(){
        $pageTitle      = "Profile";
        $active         = 'profile';
        $profile = $this->common->getProfiledata('users');
      //  echo $this->db->last_query();exit();
        $this->addData(compact('pageTitle', 'active','profile'));
        $this->addAssets([
           'footer'=>['front/script/ft_post']
        ]);
        $this->render("profile");
    }

    public function saveprofile() {
        $this->load->helper('file');
        $this->load->library('upload');
        $valid['success']= ['status'=> 400,'msg'=>[]];
        create_folder('uploads/profile/','index','index');

        if (empty($_FILES['profileImage']['name'])) {
            // Return error if no file is uploaded
            $valid['msg'] = 'No file was uploaded.';
            echo json_encode($valid);
            return;
        }
       
        $pro = $this->common->get_row('profile','users',['id'=>$this->userId]);
        // Configure upload options
        $config['upload_path']   = './uploads/profile/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif'; // Only allow jpeg, png, gif
        $config['max_size']      = 2048; // Maximum file size of 2MB
        $config['encrypt_name'] = TRUE; // to avoid overwriting

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('profileImage')) {
            $valid['msg'] =  $this->upload->display_errors('<p>', '</p>');
        } else {
            $uploadData = $this->upload->data(); // Get file info
            $filePath = 'uploads/profile/' . $uploadData['file_name'];
            
            $data = array(
				'profile'        =>  $filePath,
                'updated_at'     => date('Y-m-d,H:i:s')
			);
            if($this->common->dataUpdate('users',array('id' => $this->userId),$data))
            {
                if(!empty($pro->profile)){
                    $imagePath = $pro->profile;
                    if(file_exists($imagePath))
                    { 
                        unlink($imagePath);
                    }
                }
                $valid['status'] = 200;
                $valid['msg'] =  'Image uploaded successfully!';
                 
              
            }else{
                $valid['msg'] =  'Oops Try again';
            }
        }
        // Return response as JSON
        echo json_encode($valid);
        //ALTER TABLE `users` ADD `profile` VARCHAR(200) NULL AFTER `role`;
    }
}