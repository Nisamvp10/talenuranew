<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aboutus extends Page_Controller {

function __construct() {
		  parent::__construct();
          $this->load->helper('url');
		  $this->load->helper('date');
		  $this->load->model('common');
   }

	public function index()
	{	
		$pageTitle = "Players";
		$bg = "kaba.webp";
		$clients   = $this->common->select_data('*','clients',array('status'=>1));
		$this->addData(compact('pageTitle','clients','bg'));
		$this->addAssets([
			
                'footer' => [
                	//'admin/script/datatable',
                    //'frond/script/home_link'
                ]
            ]);
		$this->render("about");
	}
}