<?php
defined('BASEPATH') OR exit('No direct script allowed');
class Home extends Frond_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('common');
        $this->load->model('PostModel');
    }
    function index(){
        $pageTitle      = "home";
        $active         = 'Home';
        $this->addData(compact('pageTitle', 'active'));
        $this->addAssets([
           'footer'=>['front/script/ft_post']
        ]);
        $this->render("home");
    }
}