<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Players_model extends CI_Model {

  function __construct(){
    parent::__construct();
    $this->load->database();

  }

  
function playersdatas($postData=null){
  $response = array();

      ## Read value
      $draw = $postData['draw'];
      $start = $postData['start'];
      $rowperpage = $postData['length']; // Rows display per page
      $columnIndex = $postData['order'][0]['column']; // Column index
      $columnName = $postData['columns'][$columnIndex]['data']; // Column name
      $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
      $searchValue = $postData['search']['value']; // Search value

      ## Search 
      $searchQuery = "";
      if($searchValue != ''){
          $searchQuery = " (name like '%".$searchValue."%' or clubName like '%".$searchValue. "%') ";
      }


      ## Total number of records without filtering
      $this->db->select('count(*) as allcount');
      $records = $this->db->get('register')->result();
      $totalRecords = $records[0]->allcount;

      ## Total number of record with filtering
      $this->db->select('count(*) as allcount');
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $records = $this->db->get('register')->result();
      $totalRecordwithFilter = $records[0]->allcount;

      
      ## Fetch records
      $this->db->select('*');
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $this->db->order_by($columnName, $columnSortOrder);
      $this->db->limit($rowperpage, $start);
      $records = $this->db->get('register')->result();

      $data = array();
      $i=1;
      foreach($records as $record ){
        $path = './uploads/players/'.$record->profile;
        if(!empty($record->profile)){


        if (file_exists($path)) {
          $img= '<img src="'.base_url('uploads/players/').$record->profile.'" width="50px">';
         }else{
          $img= '<img src="'.base_url('style/img/deafult.png').'" width="50px" alt="'.$record->profile.'">';
         }
       }else{
         $img= '<img src="'.base_url('style/img/deafult.png').'" width="50px" alt="'.$record->profile.'">';
       }
         $address = $record->city.','.$record->state.','.$record->country;

  if($record->status == 1){
          $verify = '<a class="badge  badge-success" onclick="accountRejected('.$record->id.')">A/c Verified</a>';
         }else{
           $verify = '<a class="badge  badge-danger" onclick="accountVerify('.$record->id.')">A/c not Verified</a>';
         }
         
          $data[] = array( 
            //'no'=>$i,
             "name"=>$record->name.'<br>'.$verify,
              "email"=>$record->email,
               "contactnumber"=>$record->contactnumber,
               "clubName"=>$record->clubName,
               "address"=>$address,
               "ptofile"=>$img,
               "selected_payers"=>$record->selected_payers,
               "action"=>'<div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="'.base_url('admin/players/create/').$record->id.'"><i class="fa fa-edit"></i>Edit</a>
                            <a class="dropdown-item" href="javascript:void(0)" data-path="'.$record->profile.'" onclick="deleteplayers(this)" data-id="'.$record->id.'"><i class="fa fa-trash"></i>Delete</a>
                          </div>
                        </div>',
              
          ); 
       $i++; }
      ## Response
      $response = array(
          "draw" => intval($draw),
          "iTotalRecords" => $totalRecords,
          "iTotalDisplayRecords" => $totalRecordwithFilter,
          "aaData" => $data
      );


      return $response; 

}



function delete(){
    $data['Success'] = array('status'=>400,'msg'=>array());

      $id = $this->input->post('id');
      $path = $this->input->post('path');

     if($id){
         $data['messages'] = $this->common->deleteData('testimonials',array('events_id'=>$id),'testimonial',$path);

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
            $dataa = array('privilege'=> 1 );
             $this->common->update_data('students',$dataa,array('id' => $id));

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
            $dataa = array('privilege'=> 2 );
             $this->common->update_data('students',$dataa,array('id' => $id));

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
}