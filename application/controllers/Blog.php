<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends Page_Controller {

function __construct() {
		  parent::__construct();
          $this->load->helper('url');
		  $this->load->helper('date');
		  $this->load->model('common');
   }

	public function index()
	{	
		$pageTitle = "Blog";
		$blogs     = $this->common->select_data('*','blog',array('status'=>1),'id desc');
		$this->addData(compact('pageTitle','blogs'));
		$this->addAssets([
			
                'footer' => [
                	//'admin/script/datatable',
                    //'frond/script/home_link'
                ]
            ]);
		$this->render("blog");
	}
	public function view($url =FALSE){
		if($url){
			$currentblog = $this->common->select_row('blog','*',array('slug'=>$url , 'status'=>1));
			$blogs       = $this->common->select_data('*','blog',array('status'=>1,'slug !='=>$url),'id desc');
			$this->addData(compact('currentblog','blogs'));
			$this->addAssets([
			
                'footer' => [
                	//'admin/script/datatable',
                    //'frond/script/home_link'
                ]
            ]);
		
		}
		$this->render("blog-details");
	}
}