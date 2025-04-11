<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Country_model extends CI_Model {

  function __construct(){
    parent::__construct();
    $this->load->database();

  }

  public function university($postData=null){

  	
  		
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
          $searchQuery = " (title like '%".$searchValue."%' or category like '%".$searchValue."%') ";
      }
      if (!empty($postData['id'])) {

	      ## Total number of records without filtering
	      $this->db->select('count(*) as allcount');
	      $this->db->where('country_id',$postData['id']);
	      $records = $this->db->get('university')->result();
	      $totalRecords = $records[0]->allcount;

	      ## Total number of record with filtering
	      $this->db->select('count(*) as allcount');
	      $this->db->where('country_id',$postData['id']);
	      if($searchQuery != '')
	      $this->db->where($searchQuery);
	      $records = $this->db->get('university')->result();
	      $totalRecordwithFilter = $records[0]->allcount;

	      
	      ## Fetch records
	      $this->db->select('*');
	      $this->db->where('country_id',$postData['id']);
	      if($searchQuery != '')
	      $this->db->where($searchQuery);
	      $this->db->order_by($columnName, $columnSortOrder);
	      $this->db->limit($rowperpage, $start);
	      $records = $this->db->get('university')->result();

  	  }else{
  	  	$records = '';
  	  }

      $data = array();
      $i=1;
      foreach($records as $record ){
      	$path = 'uploads/university/'.$record->path;
        if (file_exists($path)) {
          $img= '<img src="'.base_url('uploads/university/').$record->path.'" width="100px">';
        }else{
          $img= '<img src="'.base_url('style/img/deafult.png').'" width="100px" alt="'.$path.'">';
        }
        
          $data[] = array( 
              'id' 			 => $record->id,
               "university"  => $record->university,
               "path"        => $img,
               "action"      => '<div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="javascript:;" onclick="editUniversity(this,'.$record->id.')"><i class="fa fa-edit"></i>Edit</a>
                             <a class="dropdown-item" href="'.base_url('admin/country/courses_list/').$record->country_id.'" ><i class="fa fa-book"></i>Courses</a>
                             <a class="dropdown-item" href="'.base_url('admin/country/cost_list/').$record->country_id.'" ><i class="fa fa-money-check"></i>Cost </a>
                             <a class="dropdown-item" href="javascript:void(0)" onclick="deleteuniversity(this)" data-id="'.$record->id.'"><i class="fa fa-trash"></i>Delete</a>
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
function coursedata($postData=null){

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
          $searchQuery = " (course like '%".$searchValue."%') ";
      }
      if (!empty($postData['id'])) {

	      ## Total number of records without filtering
	      $this->db->select('count(*) as allcount');
	      $this->db->where('country_id',$postData['id']);
	      $records = $this->db->get('course')->result();
	      $totalRecords = $records[0]->allcount;

	      ## Total number of record with filtering
	      $this->db->select('count(*) as allcount');
	      $this->db->where('country_id',$postData['id']);
	      if($searchQuery != '')
	      $this->db->where($searchQuery);
	      $records = $this->db->get('course')->result();
	      $totalRecordwithFilter = $records[0]->allcount;

	      
	      ## Fetch records
	      $this->db->select('*');
	      $this->db->where('country_id',$postData['id']);
	      if($searchQuery != '')
	      $this->db->where($searchQuery);
	      $this->db->order_by($columnName, $columnSortOrder);
	      $this->db->limit($rowperpage, $start);
	      $records = $this->db->get('course')->result();
  	  }else{
  	  	$records = '';
  	  }

      $data = array();
      $i=1;
      foreach($records as $record ){
      	
          $data[] = array( 
              'course_id' 	 => $record->course_id,
               "course"      => $record->course,
               "status"      => '<div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="javascript:;" onclick="editCourses(this,'.$record->course_id.')"><i class="fa fa-edit"></i>Edit</a>
                             <a class="dropdown-item" href="'.base_url('admin/country/university_list/').$record->country_id.'" ><i class="fa fa-book"></i>Universities</a>
                             <a class="dropdown-item" href="'.base_url('admin/country/cost_list/').$record->country_id.'" ><i class="fa fa-money-check"></i>Cost </a>
                             <a class="dropdown-item" href="javascript:void(0)" onclick="deletecourse(this)" data-id="'.$record->course_id.'"><i class="fa fa-trash"></i>Delete</a>
                          </div>
                        </div>',
          	); 
       	$i++;
       	}
      	## Response
      	$response = array(
          "draw"          => intval($draw),
          "iTotalRecords" => $totalRecords,
          "iTotalDisplayRecords" => $totalRecordwithFilter,
          "aaData"        => $data
      	);

      return $response;
	}
function costedata($postData=null){

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
          $searchQuery = " (type_exppense like '%".$searchValue."%') ";
      }
      if (!empty($postData['id'])) {

	      ## Total number of records without filtering
	      $this->db->select('count(*) as allcount');
	      $this->db->where('country_id',$postData['id']);
	      $records = $this->db->get('cost')->result();
	      $totalRecords = $records[0]->allcount;

	      ## Total number of record with filtering
	      $this->db->select('count(*) as allcount');
	      $this->db->where('country_id',$postData['id']);
	      if($searchQuery != '')
	      $this->db->where($searchQuery);
	      $records = $this->db->get('cost')->result();
	      $totalRecordwithFilter = $records[0]->allcount;

	      
	      ## Fetch records
	      $this->db->select('*');
	      $this->db->where('country_id',$postData['id']);
	      if($searchQuery != '')
	      $this->db->where($searchQuery);
	      $this->db->order_by($columnName, $columnSortOrder);
	      $this->db->limit($rowperpage, $start);
	      $records = $this->db->get('cost')->result();
  	  }else{
  	  	$records = '';
  	  }

      $data = array();
      $i=1;
      foreach($records as $record ){
      	
          $data[] = array( 
              'id' 	             => $record->id,
               "type_exppense"   => $record->type_exppense,
               'cost'            => $record->cost,
               "status"          => '<div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="javascript:;" onclick="editCost(this,'.$record->id.')"><i class="fa fa-edit"></i>Edit</a>
                             <a class="dropdown-item" href="'.base_url('admin/country/university_list/').$record->country_id.'" ><i class="fa fa-book"></i>Universities</a>
                             <a class="dropdown-item" href="'.base_url('admin/country/courses_list/').$record->country_id.'" ><i class="fa fa-money-check"></i>Courses </a>
                             <a class="dropdown-item" href="javascript:void(0)" onclick="deletecost(this)" data-id="'.$record->id.'"><i class="fa fa-trash"></i>Delete</a>
                          </div>
                        </div>',
          	); 
       	$i++;
       	}
      	## Response
      	$response = array(
          "draw"          => intval($draw),
          "iTotalRecords" => $totalRecords,
          "iTotalDisplayRecords" => $totalRecordwithFilter,
          "aaData"        => $data
      	);

      return $response;
	}
}