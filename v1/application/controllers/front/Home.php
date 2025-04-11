<?php
defined('BASEPATH') OR exit('No direct script allowed');
class Home extends Frond_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('common');
    }
    function index(){
        $pageTitle      = "home";
        $active         = 'Home';
      
        $this->addData(compact('pageTitle','active'));
        $this->addAssets([
           // 'footer'=>['frondend/script/ft_staff']
        ]);
        $this->render("home");
    }
}