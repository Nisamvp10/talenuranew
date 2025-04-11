<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Players extends Page_Controller {

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
		$players= $this->common->select_data('*','register',array('status'=>1),'selected_payers ASC');
		$this->addData(compact('pageTitle','players','bg'));
		$this->addAssets([
			
                'footer' => [
                	//'admin/script/datatable',
                    //'frond/script/home_link'
                ]
            ]);
		$this->render("players");
	}
}