<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * class Base_Controller
 */
class Base_Controller extends CI_Controller { 

    public $data=[
        'assets'=>[],
        'footer' => []
    ];

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(['url']);
        //$this->addMetaTitle();
    }

    public function addData( array $data=array() )
    {

        $this->data = array_merge($this->data, $data);
        
    }
    
    
     public function addAssets( array $assets=array() )
    {
        $this->data['assets'] = array_merge_recursive($this->data['assets'], $assets);
    }
    
}

class ACP_Controller extends Base_Controller {
    public function __construct()
    {
        parent::__construct();
        user_login_check();
        
         if($this->session->has_userdata('student_logged_in') ){
            $this->user_id = $this->session->userdata('login_id');
          //  $this->current_role = $this->session->userdata('role');
        }else{
            redirect('login');
        }
        
    }

    protected function render( $template,  $data=array(),  $return=FALSE)
    {
        if ( $template === 'json' ) {

            header('Content-Type: application/json');
            $this->addData($data);
            echo $this->sendJsonResponse();
            exit;
        } else {

            $data['template'] = $template; 

            $this->addData($data);
            if ( $return === TRUE ) {
                return $this->load->view('frond/inc/header_link', $this->data, $return);
            }

            $this->load->view('frond/inc/header_link', $this->data);
        }
    }
}

class Page_Controller extends Base_Controller {
    public function __construct()
    {
        parent::__construct();
         if($this->session->has_userdata('student_logged_in') ){
            $this->user_id = $this->session->userdata('login_id');
          //  $this->current_role = $this->session->userdata('role');
        }else{
          //  redirect('login');
        }
        
    }

    protected function render( $template,  $data=array(),  $return=FALSE)
    {
        if ( $template === 'json' ) {

            header('Content-Type: application/json');
            $this->addData($data);
            echo $this->sendJsonResponse();
            exit;
        } else {

            $data['template'] = $template; 

            $this->addData($data);
            if ( $return === TRUE ) {
                return $this->load->view('frond/inc/main', $this->data, $return);
            }

            $this->load->view('frond/inc/main', $this->data);
        }
    }
}