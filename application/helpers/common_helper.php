<?php

function login_check(){
  $CI =& get_instance();
  if($CI->session->has_userdata('logged_in') && $CI->session->userdata('logged_in') ==1){
    return true;
  }else {
    redirect('admin/login');
  }
}

function __getcount($cond= FALSE,$table=FALSE){
  $CI =& get_instance();
  $CI->load->database();
  $CI->db->select('*');
  $CI->db->from($table);
  if(!empty($cond)){
     $CI->db->where('status',$cond);
  }
  $count = $CI->db->get()->num_rows();

  return $count;
}


 function last_activity(){

  $CI =& get_instance();
  $CI->load->database();
  $user_id = $CI->session->userdata('login_id');
    $time_since = now() - $CI->session->userdata('last_activity');
    $interval = 300;

    // Do nothing if last activity is recent
    if ($time_since < $interval) return;

    // Update database
    $updated = $CI->db
          ->set('last_activity', now())
          ->where('login_id', $user_id)
          ->update('login');

    // Log errors if you please
    $updated or log_message('error', 'Failed to update last activity.');
}

function loger($id = FALSE){
  $CI =& get_instance();
  $result = $CI->db->query("SELECT * FROM login WHERE login_id = $id AND login_status = 1")->result();
  if(!empty($result)){
    $name = $result[0]->name;
  }else{
     $name = "Sports Globe";
  }
  return $name;
}

 function study_abroad(){
   $CI =& get_instance();
   $result = $CI->db->query("SELECT * FROM country_page WHERE status = 1")->result();
   return $result;

 }

 function study_abroad_list($slug=false){
   $CI =& get_instance();
   $result = $CI->db->query('SELECT * FROM country_page WHERE status = 1 AND slug !="'.$slug.'"')->result();
    return $result;
 }

 function immigrationNav($slug=FALSE){
  $CI =& get_instance();
  $result = $CI->db->query('SELECT * FROM immigration WHERE status = 1 ')->result();
  return $result;
 }

function preparation($slug=FALSE){
  $CI =& get_instance();
  $result = $CI->db->query('SELECT * FROM test_preparation WHERE status = 1 ')->result();
  return $result;
}

function img_vlid($folder,$imgName){
  if(!empty($imgName)){
    if (file_exists('./uploads/'.$folder.'/'.$imgName)) {
      $img = base_url('uploads/').$folder.'/'.$imgName;
    }else{
      $img = base_url('style/img/deafult.png');
    }

  }else{
    $img = base_url('style/img/deafult.png');
  }
  return $img;
}

function create_folder($path=FALSE,$page_name= FALSE, $controller_name= FALSE){
  $CI =& get_instance();
  $path = $path;
  if (!is_dir($path)){

      mkdir($path,0777,TRUE);

  }

   $file = $path.$controller_name.'.php';

  if(!file_exists($file)){
    // Create Controller
   $controller = fopen($path.'/'.$controller_name.'.php', "a") or die("Unable to open file!");

   $controller_content ="<?php
   defined('BASEPATH') OR exit('No direct script access allowed');";

    fwrite($controller, "\n". $controller_content);
    fclose($controller);
  }else{
    $CI->session->set_flashdata('fmsg','"The directory or file cannot be created" message appears when copying files');
  }
}

function defaultimg($folder,$img){
  if($img){
     if(file_exists('./uploads/'.$folder.'/'.$img)){ 
      $image = base_url('uploads/'.$folder.'/').$img;
     }else{
        $image = base_url('style/img/deafult.png');
     }
  }else{
    $image = base_url('style/img/deafult.png');
  }

return  $image;

}
?>