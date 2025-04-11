<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends Page_Controller {

function __construct() {
		  parent::__construct();
          $this->load->helper('url');
		  $this->load->helper('date');
		  $this->load->model('common');
   }

	public function index()
	{	
		$pageTitle = "Events";
		$bg = "kaba.webp";
		$events= $this->common->select_data('*','events',array('status'=>1,'event_status'=>1));
		$upcoming= $this->common->select_data('*','events',array('status'=>1,'event_status'=>2));
		$this->addData(compact('pageTitle','events','upcoming','bg'));
		$this->addAssets([
			
                'footer' => [
                	//'admin/script/datatable',
                    'frond/script/home_link'
                ]
            ]);
		$this->render("events");
	}
}