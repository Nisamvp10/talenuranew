<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Immigration extends Page_Controller {

function __construct() {
		  parent::__construct();
          $this->load->helper('url');
		  $this->load->helper('date');
		  $this->load->model('common');
   }

	public function index($url=FALSE)
	{	
		$pageTitle = "Immigration";
		$immigration = $this->common->select_row('immigration','*',array('slug'=>$url , 'status'=>1));
		$immigrationList = $this->common->select_data('*','immigration',array('status'=>1,'slug !='=>$url),'id desc');
		$this->addData(compact('pageTitle','immigration','immigrationList'));
		$this->addAssets([
			
                'footer' => [
                	//'admin/script/datatable',
                    //'frond/script/home_link'
                ]
            ]);
		$this->render("immigration");
	}

}