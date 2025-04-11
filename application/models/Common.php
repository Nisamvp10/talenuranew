<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Model {

  function __construct(){
    parent::__construct();
    $this->load->database();

  }

  function allCount($table,$cond=false){
  	$query = $this->db->query('SELECT COUNT(*) AS allcount FROM '.$table.' WHERE '.$cond.' ');
	return  $query->row();
  }
    public function teamGroups(){
         $this->db->select('clubName, city ,profile');
                $this->db->from('register');
                  $this->db->where('status',1);
                $this->db->group_by('clubName'); 
                $this->db->having('count(*) >=', 1);
                $this->db->order_by('id','DESC');
               return  $query = $this->db->get()->result(); 
    }

    function check_mail_exist($email_id)
    {
    $this->db->select('email');
    $this->db->from('register');
    $this->db->where('email',$email_id); 
    // $this->db->where('user_type!=',2); 
    $query=$this->db->get();
    if($query->num_rows() > 0)
    {
    return 'false';
    }
    else
    {
    return 'true';
    }  
        
    }


    function check_dublicate_data($table = false,$select=false,$where=false){
    $this->db->select($select);
    $this->db->from($table);
    $this->db->where($where);
    // $this->db->where('user_type!=',2);
    $query=$this->db->get();
    if($query->num_rows() > 0)
    {
    return false;
    }
    else
    {
    return true;
    }

    }




function country_pagetsdatas($postData=null){
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


      ## Total number of records without filtering
      $this->db->select('count(*) as allcount');
      $records = $this->db->get('country_page')->result();
      $totalRecords = $records[0]->allcount;

      ## Total number of record with filtering
      $this->db->select('count(*) as allcount');
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $records = $this->db->get('country_page')->result();
      $totalRecordwithFilter = $records[0]->allcount;

      
      ## Fetch records
      $this->db->select('*');
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $this->db->order_by($columnName, $columnSortOrder);
      $this->db->limit($rowperpage, $start);
      $records = $this->db->get('country_page')->result();

      $data = array();
      $i=1;
      foreach($records as $record ){
        $path = 'uploads/country/'.$record->path;
        if (file_exists($path)) {
          $img= '<img src="'.base_url('uploads/country/').$record->path.'" width="100px">';
         }else{
          $img= '<img src="'.base_url('style/img/deafult.png').'" width="100px" alt="'.$path.'">';
         }

         
          $data[] = array( 
              'country_page_id' => $record->country_page_id,
               "title"       => $record->title,
               "category"    => $record->category,
               "main"        => substr($record->main_content,0,100),
               "path"        => $img,
               "action"      => '<div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="'.base_url('admin/country/create/').$record->country_page_id.'"><i class="fa fa-edit"></i>Edit</a>
                             <a class="dropdown-item" href="'.base_url('admin/country/university_list/').$record->country_page_id.'" ><i class="fa fa-home"></i>Universities</a>
                             <a class="dropdown-item" href="'.base_url('admin/country/courses_list/').$record->country_page_id.'" ><i class="fa fa-book"></i>Courses</a>
                             <a class="dropdown-item" href="'.base_url('admin/country/cost_list/').$record->country_page_id.'" ><i class="fa fa-money-check"></i>Cost </a>
                             <a class="dropdown-item" href="javascript:void(0)" data-path="'.$record->path.'" onclick="deletecountryabroad(this)" data-path="<?='.$record->path.'?>" data-id="'.$record->country_page_id.'"><i class="fa fa-trash"></i>Delete</a>
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

function eventsdatas($postData=null){
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
          $searchQuery = " (title like '%".$searchValue."%' or author like '%".$searchValue."%') ";
      }


      ## Total number of records without filtering
      $this->db->select('count(*) as allcount');
      $records = $this->db->get('blog')->result();
      $totalRecords = $records[0]->allcount;

      ## Total number of record with filtering
      $this->db->select('count(*) as allcount');
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $records = $this->db->get('blog')->result();
      $totalRecordwithFilter = $records[0]->allcount;

      
      ## Fetch records
      $this->db->select('*');
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $this->db->order_by($columnName, $columnSortOrder);
      $this->db->limit($rowperpage, $start);
      $records = $this->db->get('blog')->result();

      $data = array();
      $i=1;
      foreach($records as $record ){
        $path = 'uploads/blog/'.$record->path;
        if (file_exists($path)) {
          $img= '<img src="'.base_url('uploads/blog/').$record->path.'" width="100px">';
         }else{
          $img= '<img src="'.base_url('style/img/deafult.png').'" width="100px" alt="'.$path.'">';
         }

         
          $data[] = array( 
            //'no'=>$i,
               "title"       => $record->title,
               "author"      => $record->author,
               "description" => $record->short_description,
               "path"        => $img,
               "action"      => '<div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="'.base_url('admin/events/create/').$record->id.'"><i class="fa fa-edit"></i>Edit</a>
                            <a class="dropdown-item" href="javascript:void(0)" data-path="'.$record->path.'" onclick="deleteevents(this)" data-id="'.$record->id.'"><i class="fa fa-trash"></i>Delete</a>
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
function sliderdata($postData=null){
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
          $searchQuery = " (title like '%".$searchValue."%' or description like '%".$searchValue."%') ";
      }


      ## Total number of records without filtering
      $this->db->select('count(*) as allcount');
      $records = $this->db->get('slider')->result();
      $totalRecords = $records[0]->allcount;

      ## Total number of record with filtering
      $this->db->select('count(*) as allcount');
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $records = $this->db->get('slider')->result();
      $totalRecordwithFilter = $records[0]->allcount;

      
      ## Fetch records
      $this->db->select('*');
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $this->db->order_by($columnName, $columnSortOrder);
      $this->db->limit($rowperpage, $start);
      $records = $this->db->get('slider')->result();

      $data = array();
      $i=1;
      foreach($records as $record ){
        $path = 'uploads/slider/'.$record->path;
        if (file_exists($path)) {
          $img= '<img src="'.base_url('uploads/slider/').$record->path.'" width="100px">';
         }else{
          $img= '<img src="'.base_url('style/img/deafult.png').'" width="100px" alt="'.$path.'">';
         }

         
          $data[] = array( 
          	//'no'=>$i,
              "title"=>$record->title,
               "description"=>$record->description,
               "path"=>$img,
               "action"=>'<div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="'.base_url('admin/slider/create/').$record->slider_id.'"><i class="fa fa-edit"></i>Edit</a>
                            <a class="dropdown-item" href="javascript:void(0)" data-path="'.$record->path.'" onclick="deleteslider(this)" data-id="'.$record->slider_id.'"><i class="fa fa-trash"></i>Delete</a>
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

    function gallerydatas($postData=null){
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
          $searchQuery = " (title like '%".$searchValue."%') ";
      }


      ## Total number of records without filtering
      $this->db->select('count(*) as allcount');
      $records = $this->db->get('gallery')->result();
      $totalRecords = $records[0]->allcount;

      ## Total number of record with filtering
      $this->db->select('count(*) as allcount');
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $records = $this->db->get('gallery')->result();
      $totalRecordwithFilter = $records[0]->allcount;

      
      ## Fetch records
      $this->db->select('*');
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $this->db->order_by($columnName, $columnSortOrder);
      $this->db->limit($rowperpage, $start);
      $records = $this->db->get('gallery')->result();

      $data = array();
      $i=1;
      foreach($records as $record ){
        $path = 'uploads/gallery/'.$record->path;
        if (file_exists($path)) {
          $img= '<img src="'.base_url('uploads/gallery/').$record->path.'" width="100px">';
         }else{
          $img= '<img src="'.base_url('style/img/deafult.png').'" width="100px" alt="'.$path.'">';
         }

         
          $data[] = array( 
            //'no'=>$i,
              "title"=>$record->title,
               "path"=>$img,
               "action"=>'<div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="'.base_url('admin/gallery/create/').$record->gallery_id.'"><i class="fa fa-edit"></i>Edit</a>
                            <a class="dropdown-item" href="javascript:void(0)" data-path="'.$record->path.'" onclick="deletegallery(this)" data-id="'.$record->gallery_id.'"><i class="fa fa-trash"></i>Delete</a>
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


    function servicesdatas($postData = null){
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
          $searchQuery = " (title like '%".$searchValue."%') ";
      }


      ## Total number of records without filtering
      $this->db->select('count(*) as allcount');
      $records = $this->db->get('services')->result();
      $totalRecords = $records[0]->allcount;

      ## Total number of record with filtering
      $this->db->select('count(*) as allcount');
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $records = $this->db->get('services')->result();
      $totalRecordwithFilter = $records[0]->allcount;

      
      ## Fetch records
      $this->db->select('*');
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $this->db->order_by($columnName, $columnSortOrder);
      $this->db->limit($rowperpage, $start);
      $records = $this->db->get('services')->result();

      $data = array();
      $i=1;
      foreach($records as $record ){
        $path = 'uploads/services/'.$record->path;
        if (file_exists($path)) {
          $img= '<img src="'.base_url('uploads/services/').$record->path.'" width="100px">';
         }else{
          $img= '<img src="'.base_url('style/img/deafult.png').'" width="100px" alt="'.$path.'">';
         }

         
          $data[] = array( 
            //'no'=>$i,
              "title"=>$record->title,
               "description"=>$record->description,
               "path"=>$img,
               "action"=>'<div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="'.base_url('admin/services/create/').$record->service_id.'"><i class="fa fa-edit"></i>Edit</a>
                            <a class="dropdown-item" href="javascript:void(0)" data-path="'.$record->path.'" onclick="deleteservices(this)" data-id="'.$record->service_id.'"><i class="fa fa-trash"></i>Delete</a>
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

    


    function historydata($postData = null){
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
          $searchQuery = " (title like '%".$searchValue."%' or description like '%".$searchValue."%') ";
      }


      ## Total number of records without filtering
      $this->db->select('count(*) as allcount');
      $records = $this->db->get('temple_history')->result();
      $totalRecords = $records[0]->allcount;

      ## Total number of record with filtering
      $this->db->select('count(*) as allcount');
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $records = $this->db->get('temple_history')->result();
      $totalRecordwithFilter = $records[0]->allcount;

      
      ## Fetch records
      $this->db->select('*');
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $this->db->order_by($columnName, $columnSortOrder);
      $this->db->limit($rowperpage, $start);
      $records = $this->db->get('temple_history')->result();

      $data = array();
            

      foreach($records as $record ){
          $data[] = array( 
            //'no'=>$i,
              "title"=>$record->title,
               "description"=>$record->description,
               "more"=>$record->more,
               "action"=>'<div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="'.base_url('admin/history/create/').$record->history_id.'"><i class="fa fa-edit"></i>Edit</a>
                            <a class="dropdown-item" href="javascript:void(0)"  onclick="deletehistory(this)" data-id="'.$record->history_id.'"><i class="fa fa-trash"></i>Delete</a>
                          </div>
                        </div>',
              
          ); 
       }
      ## Response
      $response = array(
          "draw" => intval($draw),
          "iTotalRecords" => $totalRecords,
          "iTotalDisplayRecords" => $totalRecordwithFilter,
          "aaData" => $data
      );


      return $response; 
    }




    function testimonialdatas($postData=null){
          $response = array();

      ## Read value
      $draw = $postData['draw'];
      $start = $postData['start'];
      $rowperpage = $postData['length']; // Rows display per page
      $columnIndex = $postData['order'][0]['column']; // Column index
      $columnName = $postData['columns'][$columnIndex]['data']; // Column name
      $columnSortOrder = $postData['order'][0]['dir']; // asc or 
      $searchValue = $postData['search']['value']; // Search value

      ## Search 
      $searchQuery = "";
      if($searchValue != ''){
          $searchQuery = " (name like '%".$searchValue."%' or description like '%".$searchValue."%'  or author like '%".$searchValue."%') ";
      }
  

      ## Total number of records without filtering
      $this->db->select('count(*) as allcount');
      $records = $this->db->get('testimonials')->result();
      $totalRecords = $records[0]->allcount;

      ## Total number of record with filtering
      $this->db->select('count(*) as allcount');
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $records = $this->db->get('testimonials')->result();
      $totalRecordwithFilter = $records[0]->allcount;

      
      ## Fetch records
      $this->db->select('*');
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $this->db->order_by($columnName, $columnSortOrder);
      $this->db->limit($rowperpage, $start);
      $records = $this->db->get('testimonials')->result();

      $data = array();
      $i=1;
      foreach($records as $record ){
        $path = 'uploads/testimonial/'.$record->path;
        if (file_exists($path)) {
          $img= '<img src="'.base_url('uploads/testimonial/').$record->path.'" width="100px">';
         }else{
          $img= '<img src="'.base_url('style/img/deafult.png').'" width="100px" alt="'.$path.'">';
         }

         
          $data[] = array( 
            //'no'=>$i,
              "name"=>$record->name,
               "author"=>$record->author,
               "description"=>$record->description,
               "path"=>$img,
               "action"=>'<div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="'.base_url('admin/testimonials/create/').$record->testimonial_id.'"><i class="fa fa-edit"></i>Edit</a>
                            <a class="dropdown-item" href="javascript:void(0)" data-path="'.$record->path.'" onclick="deletetestimonials(this)" data-id="'.$record->testimonial_id.'"><i class="fa fa-trash"></i>Delete</a>
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




    function select_row($table=false,$select='*',$where=false){
      $this->db->select($select);
      $this->db->from($table);
      $this->db->where($where);
      $query=$this->db->get();
      $row=$query->row();
      return $row;
  }

    function insertData($table,$data){
    if($data){
      $this->db->insert($table, $data);
       return $idOfInsertedData = $this->db->insert_id();
    }
  }

  public function update_data($table,$set,$where) {
    $this->db->where($where);
    $this->db->update($table, $set);
  }
  public function select_data($select='*',$table=FALSE,$condition=FALSE,$order = FALSE) {
    $this->db->select($select);
    $this->db->from($table);
    $this->db->where($condition);
    if($order){
         $this->db->order_by($order);
    }
    return  $this->db->get()->result();

  }

  public function deleteData($table,$condition,$folder=FALSE,$path = FALSE){
      if($path){
        if(file_exists('./uploads/'.$folder.'/'.$path)){
           unlink('./uploads/'.$folder.'/'.$path);
        }
      }
      $this -> db -> where($condition);
      $this -> db -> delete($table);
  }


}
