<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class fixture_model extends CI_Model {

  function __construct(){
    parent::__construct();
    $this->load->database();

  }

  
function fixturedata($postData=null){
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
          $searchQuery = " (team_one like '%".$searchValue."%' or team_two like '%".$searchValue. "% or point like '%".$searchValue. "%') ";
      }


      ## Total number of records without filtering
      $this->db->select('count(*) as allcount');
      $records = $this->db->get('fixture')->result();
      $totalRecords = $records[0]->allcount;

      ## Total number of record with filtering
      $this->db->select('count(*) as allcount');
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $records = $this->db->get('fixture')->result();
      $totalRecordwithFilter = $records[0]->allcount;

      
      ## Fetch records
      $this->db->select('*');
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $this->db->where('status !=',4);
      $this->db->order_by($columnName, $columnSortOrder);
      $this->db->limit($rowperpage, $start);
      $records = $this->db->get('fixture')->result();

      $data = array();
      $i=1;
      foreach($records as $record ){
          
      

  if($record->status == 1){
          $verify = '<a class="badge  badge-success">live</a>';
         }else if($record->status == 2){
           $verify = '<a class="badge  badge-warning" >Upcomming</a>';
         }else{
              $verify = '<a class="badge  badge-danger" >Over</a>';
         }
         
          $data[] = array( 
            //'no'=>$i,
              "id"=>$record->id,
             "team_one"=>$record->team_one,
             "team_one_score"=>$record->team_one_score,
              "team_two"=>$record->team_two,
               "team_two_score"=>$record->team_two_score,
               "date"=>$record->date,
               "status"=>$verify,
               "action"=>'<div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="'.base_url('admin/fixture/create/').$record->id.'"><i class="fa fa-edit"></i>Edit</a>
                            <a class="dropdown-item" href="javascript:void(0)" onclick="deletefixture(this)" data-id="'.$record->id.'"><i class="fa fa-trash"></i>Delete</a>
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