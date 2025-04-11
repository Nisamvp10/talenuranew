<?php
defined('BASEPATH') OR exit('No direct script allowed');

class Common extends CI_Model{
    function insertdataTodatabase($table,$data)
    {
        if($data)
        {
            $this->db->insert($table, $data);
            return $idOfInsertedData = $this->db->insert_id();
        }
    }

    public function get_user_by_email_or_contact($identifier) {
        $this->db->where('email', $identifier);
        $this->db->or_where('contact_number', $identifier);
        $query = $this->db->get('users');
        return $query->row_array(); // Returns user data as an array
    }
    public function dataUpdate($table,$where,$set) 
	{
		$this->db->where($where);
		$this->db->update($table, $set);
		return true;
	}

    function value_number_exists($table=false,$condition=false)
    {
        if(empty($table)){
            $table = 'student_tbl';
        }
        if(!empty($condition))
        {
            $this->db->where($condition);
            $query = $this->db->get($table);
            return $query->num_rows() > 0;
        }
    }
    function check_row($select='*',$table=false,$condition=false)
    {
        $this->db->select($select);
        $this->db->from($table);
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->num_rows() > 0;
    }
    function get_row($select='*',$table=false,$condition=false)
    {
        $this->db->select($select);
        $this->db->from($table);
        $this->db->where($condition);
        $query = $this->db->get()->row();
        return $query;
    }
    function getProfiledata($select='*',$table=false,$id=false)
    {
        $this->db->select('u.first_name, u.last_name, u.dob, u.zip_code, u.country, u.contact_number, u.status, u.role, c.name as countryname, 
        m.graduationyear, m.school, GROUP_CONCAT(b.name) as businessareas');
        $this->db->from('users as u');
        $this->db->join('country as c', 'c.id = u.country', 'left');
        $this->db->join('mentee_details as m', 'm.userId = u.id AND u.status = 1', 'left');  // Join mentee_details only if status is 1
        $this->db->join('business_interest_areas as b', 'FIND_IN_SET(b.id, m.businessarea)', 'left');
        $this->db->where('u.id', $this->userId);
        //$this->db->group_by('b.name');
        //$this->db->group_by('p.id'); 
        $query = $this->db->get()->row();
        return $query;
    
    }
    function delete_record($table,$condition,$folder=FALSE,$path = FALSE)
    {
    	if(!empty($path ))
        {
        	if(file_exists('uploads/'.$folder.'/'.$path))
            {
           		unlink('uploads/'.$folder.'/'.$path);
        	}
      	}
      	$this ->db->where($condition);
      	$this ->db->delete($table);
    }
    public function column_exists($table, $column) {
        $fields = $this->db->list_fields($table);
        return in_array($column, $fields);
    }

    function deleteData($table=false,$condition=false,$folder=false,$path=false)
    {
        if(!empty($path))
		{
			$imagePath = base_url('uploads/'.$folder.'/'.$path);
			if(file_exists($imagePath))
			{
				unlink($imagePath);
			}
		}
    }
    function getdataFromdatabase($select='*',$table=false,$condition=false,$order=false,$arrayin=false,$start=false,$end=false){
        $this->db->select($select);
        $this->db->from($table);
        $this->db->where_in($arrayin);
        (!empty($condition) ? $this->db->where($condition):'');
        (!empty($arrayin) ?  $this->db->where_in('status',$arrayin):'');
        (!empty($order)? $this->db->order_by($order):'');
        (!empty($start)? $this->db->limit($start,$end):'');
        $query = $this->db->get()->result();
        return $query;
    }
    function getdastaffjoinwithcategory($select='*',$table=false,$condition=false,$order=false,$arrayin=false,$start=false,$end=false)
    {
        $this->db->select($select,'category.category');
        $this->db->from($table);
        $this->db->join('category','employee_tbl.employee_category = category.id','left');
        $this->db->where_in($arrayin);
        (!empty($condition) ? $this->db->where($condition):'');
        (!empty($arrayin) ?  $this->db->where_in('employee_tbl.status',$arrayin):'');
        (!empty($order)? $this->db->order_by($order):'');
        (!empty($start)? $this->db->limit($start,$end):'');
        $query = $this->db->get()->result();
        return $query;
    }
    function get_row_bylogin($select='*',$table=false,$condition=false)
    {
        if($table == "employee_tbl"){
            $this->db->select('employee_tbl.*,employee_tbl.employee_name as name');
        }
        $this->db->from($table);
        $this->db->where($condition);
        $query = $this->db->get()->row();
        return $query;
    }
    public function multiple_insert($table = false,$image = array())
	{
		return $this->db->insert_batch($table,$image);
	}
    function get_election_participants($id=false){
        if($id)
        {
        //     $this->db->select('table_name, column_name');
        // $this->db->from('metadata');
        // $this->db->where('id', 1);
        // $metadata = $this->db->get()->row();

        // // Construct dynamic SQL query
        
        // $column_name = $metadata->column_name;

            $metadata = $this->common->get_row('user','candidates',array('election_id'=>$id));
           
            if(!empty( $metadata)){
                $table_name = $metadata->user;
                if($table_name == 1){
                    $table_name = 'student_tbl';
                    $this->db->select('c.student_id,c.id,s.name,s.profile,cp.position');
                    $folder = 'students';
                }elseif($table_name == 2)
                {   $this->db->select('c.student_id,c.id,s.employee_name as name,s.profile,cp.position');
                    $table_name = 'employee_tbl';
                    $folder = 'employee';
                }elseif($table_name == 3){
                    $this->db->select('c.student_id,c.id,s.name,s.profile,cp.position');
                    $table_name = 'members_tbl';
                    $folder = 'members';
                }
            }else{
                $table_name = 'student_tbl';
                $this->db->select('c.student_id,c.id,s.name,s.profile,cp.position');
                $folder = 'students';
            }
            
            $this->db->from('candidates as c');
            //$this->db->join('student_tbl as s','s.id = c.student_id','left');
            $this->db->join($table_name .' as s','s.id = c.student_id','left');
            $this->db->join('candidate_position as cp','cp.id = c.position','left');
            $this->db->where('s.status',1);
            $this->db->where('c.election_id',$id);
            $query = $this->db->get()->result();
            return [
                    'candidate' => $query,
                    'folder'    => $folder,
                   ];
        }
    }

    public function insert_vote($category_id, $candidate_id, $nota,$student_id,$lection_id) {
        // Check if the student has already voted in this category
        //$type = findtable($this->loginuser);
        if($this->loginuser == 'student'){
                $this->type = findtable(1);
            }else if($this->loginuser == 'staff'){
                 $this->type = findtable(2);
            }else{
                $this->type = findtable(3);
            }
        $this->db->where('student_id', $student_id);
        $this->db->where('position_id', $category_id);
        $this->db->where('type', $this->type);
        $query = $this->db->get('votes_tbl');
        if ($query->num_rows() > 0) { 
            // Student has already voted in this category
            return false;
        } else {
           // echo $this->db->last_query();
            // Insert the vote
            $data = [
                'candidate_id' => $candidate_id == 'nota' ? NULL : $candidate_id,
                'position_id'  => $category_id,
                'election_id'  => $lection_id,
                'nota'         => $nota,
                'student_id'   => $student_id,
                'type'         => $this->table,
            ];
           $this->db->insert('votes_tbl', $data);
            return true;
        }
    }


    function getelections(){
        $today = date('Y-m-d');
        $election = $this->get_row('*','elections',['start_date'=>$today,'status'=>1]);
        if(!empty($election))
        {
            $this->db->select('e.id,s.name,s.profile,cp.position');
            $this->db->from('elections as e');
            $this->db->join('candidates as c','c.election_id = e.id','left');
            $this->db->join('student_tbl as s','s.id = c.student_id','left');
           
            // $this->db->where('s.status',1);
            // $this->db->where('c.election_id',$id);
            $this->db->where('e.start_date <=', $today);
            $this->db->where('e.end_date >=', $election->end_date);
            $query = $this->db->get()->result();
            return [
                'election'  => $election,
                'candidate' => $query
            ];
        }
        
    }
    
}