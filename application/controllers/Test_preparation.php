<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_preparation extends Page_Controller {

function __construct() {
		  parent::__construct();
          $this->load->helper('url');
		  $this->load->helper('date');
		  $this->load->model('common');
   }

	public function index($url=FALSE)
	{	
		$pageTitle = "Tst Preparation";
		$preparation = $this->common->select_row('test_preparation','*',array('slug'=>$url , 'status'=>1));
		$preparationList = $this->common->select_data('*','test_preparation',array('status'=>1,'slug !='=>$url),'id desc');
		$this->addData(compact('pageTitle','preparation','preparationList'));
		$this->addAssets([
			
                'footer' => [
                	//'admin/script/datatable',
                    //'frond/script/home_link'
                ]
            ]);
		$this->render("preparation");
	}

}