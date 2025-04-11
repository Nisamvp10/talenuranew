<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

  function __construct(){
    parent::__construct();
    $this->load->database();

  }

  public function login($table,$select='*',$where = FALSE){
    if($where){
      $this->db->select('login_id,name,user_name,login_status,last_activity');
      $this->db->from($table);
      $this->db->where($where);
      return $this->db->get()->row();
      //echo $this->db->last_query();
    }else{
      $this->session->set_flashdata('fmsg','user Name or Password incorrect...!');
      redirect('admin/login');
    }
  }
}
