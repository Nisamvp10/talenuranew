<?php
function create_folder($path=FALSE,$page_name=FALSE, $controller_name=FALSE){
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

  
function encryptor($string) {
    $output = false;
    $encrypt_method = "AES-128-CBC";
    //pls set your unique hashing key
    $secret_key = 'nisam';
    $secret_iv = 'developerchooice';
    // hash
    $key = hash('sha256', $secret_key);
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    //do the encyption given text/string/number
    $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
    $output = base64_encode($output);
    return $output;
  }
  
  function decryptor( $string) {
    $output = false;
    $encrypt_method = "AES-128-CBC";
    //pls set your unique hashing key
    $secret_key = 'nisam';
    $secret_iv = 'developerchooice';
    // hash
    $key = hash('sha256', $secret_key);
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    //decrypt the given text/string/number
    $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    return $output;
  }
  function timeAgo($datetime, $full = FALSE) {
    date_default_timezone_set('Asia/Kolkata'); // e.g., 'UTC', 'America/New_York'

    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function img_valid($imgName){
  if(!empty($imgName)){
    if (file_exists($imgName)) {
      $img = base_url($imgName);
    }else{
      $img = base_url('layout/front/images/user.svg');
    }

  }else{
    $img = base_url('layout/front/images/user.svg');
  }
  return $img;
}
