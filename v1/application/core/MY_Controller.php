<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

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
            adminLoginCheck();
             if($this->session->has_userdata('logged_in') ){
                $this->adminid      = $this->session->userdata('admin_id');
                $this->current_role = $this->session->userdata('login_status');
                $this->current_type = $this->session->userdata('type');
                $this->profile      = $this->session->userdata('profile');
                $this->broker_id    = $this->session->userdata('broker_id');
            }else{
                redirect('admin/login');
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
                    return $this->load->view('admin/inc/main', $this->data, $return);
                }
    
                $this->load->view('admin/inc/main', $this->data);
            }
        }
    }


    class Page_Controller extends Base_Controller {
        public $count_visitor;
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('common');
           // $this->count_visitor = count_visitor();
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
                    return $this->load->view('frondend/main/main', $this->data, $return);
                }
    
                $this->load->view('frondend/main/main', $this->data);
            }
        }
    }


    class Frond_Controller extends Base_Controller {
       
        public function __construct()
        {
            parent::__construct();
            //adminLoginCheck();
             if($this->session->has_userdata('logged_in') ){
              
                $this->email      = $this->session->userdata('username');
                $this->fname      = $this->session->userdata('name');
                $this->userId     = $this->session->userdata('userId');
                $this->table      = $this->session->userdata('table');
                $this->privilege  = $this->session->userdata('privilege');
                $this->loginuser  = $this->session->userdata('loginuser');
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
                    return $this->load->view('frondend/main/main', $this->data, $return);
                }
    
                $this->load->view('front/layout/main', $this->data);
            }
        }
    }

?>