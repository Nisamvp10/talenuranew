<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function update_app($name,$value){
  //print_r($value);
  $CI =& get_instance();
  $CI->load->database();

  // if($query->num_rows() > 0)
	// 	return false;
  //
	// $data_type='text';
	if(is_array($value))
	{
	//	$data_type='array';
		$value=serialize($value);
	}
	elseif(is_object($value))
	{
	//	$data_type='object';
		$value=serialize($value);
	}

	$data=array(
		'app_name'           => $name,
		'app_value'          => $value,
    'app_profile_status' => 1,
		//'option_type'=>$data_type,
	);
	//$CI->db->insert('app_profile',$data);
  $query = $CI->db->select('*')->from('app_profile')->where('app_name',$name)->get();

	//if option already exists then update else insert new
	if($query->num_rows() < 1) return $CI->db->insert('app_profile',$data);
	else		  		  	         return $CI->db->update('app_profile',$data,array('app_name'=>$name));
}

function get_appdata($name){
  $CI =& get_instance();
  $CI->load->database();
  $query=$CI->db->select("*")->from('app_profile')->where('app_name',$name)->get();
  //echo $CI->db->last_query();

  if($query->num_rows() < 1)return false;
    $option = $query->row();
    if($option->app_profile_status){$value = $option->app_value;}
    return $value;
}
