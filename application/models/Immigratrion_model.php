<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Immigratrion_model extends CI_Model {

  function __construct(){
    parent::__construct();
    $this->load->database();

  }

  public function immigrationdataa($postData=null){  		
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
          $searchQuery = " (title like '%".$searchValue."%' or short_description  like '%".$searchValue."%') ";
      }

	      ## Total number of records without filtering
	      $this->db->select('count(*) as allcount');
	      $records = $this->db->get('immigration')->result();
	      $totalRecords = $records[0]->allcount;

	      ## Total number of record with filtering
	      $this->db->select('count(*) as allcount');
	      if($searchQuery != '')
	      $this->db->where($searchQuery);
	      $records = $this->db->get('immigration')->result();
	      $totalRecordwithFilter = $records[0]->allcount;

	      
	      ## Fetch records
	      $this->db->select('*');
	      if($searchQuery != '')
	      $this->db->where($searchQuery);
	      $this->db->order_by($columnName, $columnSortOrder);
	      $this->db->limit($rowperpage, $start);
	      $records = $this->db->get('immigration')->result();

  	 

      $data = array();
      $i=1;
      foreach($records as $record ){
      	$path = 'uploads/immigration/'.$record->path;
        if (file_exists($path)) {
          $img= '<img src="'.base_url('uploads/immigration/').$record->path.'" width="100px">';
        }else{
          $img= '<img src="'.base_url('style/img/deafult.png').'" width="100px" alt="'.$path.'">';
        }
        
          $data[] = array( 
              'id' 			            => $record->id,
              'title'               => $record->title,
               "short_description"  => $record->short_description,
               "path"               => $img,
               "action"             => '<div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="'.base_url('admin/immigration/create/').$record->id.'"><i class="fa fa-edit"></i>Edit</a>
                             <a class="dropdown-item" href="javascript:void(0)" onclick="deleteimmigration(this)" data-path="'.$record->path.'" data-id="'.$record->id.'"><i class="fa fa-trash"></i>Delete</a>
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
}