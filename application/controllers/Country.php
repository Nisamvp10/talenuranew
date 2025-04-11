<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class country extends Page_Controller {

function __construct() {
		  parent::__construct();
          $this->load->helper('url');
		  $this->load->helper('date');
		  $this->load->model('common');
   }

	public function index($slug=false)
	{	
		$pageTitle = "Players";
		$bg = "kaba.webp";
		$clients   = $this->common->select_data('*','clients',array('status'=>1));
		$country   = $this->common->select_row('country_page','*',array('slug'=>$slug,'status'=>1));
		if(!empty($country)){
			$pageId  = $country->country_page_id;
		}else{
			$pageId = '';
		}
		$university = $this->common->select_data('*','university',array('country_id'=>$pageId,'status'=>1));
		$cost       = $this->common->select_data('*','cost',array('country_id'=>$pageId,'status'=>1));
		$course     = $this->common->select_data('*','course',array('country_id'=>$pageId,'status'=>1));
		$this->addData(compact('pageTitle','clients','country','university','cost','course'));
		$this->addAssets([
			
                'footer' => [
                	//'admin/script/datatable',
                    //'frond/script/home_link'
                ]
            ]);
		if(!empty($country)){
			$this->render("study");
		}else{
			$this->render("404");
		}
		
	}
}