<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Page_Controller {

function __construct() {
		  parent::__construct();
          $this->load->helper('url');
		  $this->load->helper('date');
		  $this->load->model('common');
   }

	public function index()
	{	

		$events    = $this->common->select_data('*','events',array('status'=>1,'event_status'=>1));
		$upcoming  = $this->common->select_data('*','events',array('status'=>1,'event_status'=>2));
		$testimonial = $this->common->select_data('*','testimonials',array('status'=>1));
		$services  = $this->common->select_data('*','services',array('status'=>1)); 
		$slider    = $this->common->select_data('*','slider',array('status'=>1));
		$fixture   = $this->common->select_data('*','fixture',array('status !='=> 4),'status ASC');
		$clients   = $this->common->select_data('*','clients',array('status'=>1));
		$aboutus   = $this->common->select_data('*','aboutus',array('status'=>1));
		 
	   
        $page_heading = '';
		$this->addData(compact('page_heading','slider','events','testimonial','upcoming','clients','services','aboutus'));
		$this->addAssets([
			'header' => [
                   // 'frond/header/home_link',
                ],
                'footer' => [
                	//'admin/script/datatable',
                    //'frond/script/home_link'
                ]
            ]);
		$this->render("index");


		//$this->load->view('frond/index',$data);

	}
}
