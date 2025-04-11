<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="themexriver">

    <title> <?=get_appdata('name');?> </title>
    <!--  -->

    <!-- Favicon and Touch Icons -->
    <link href="<?=base_url('frondend/')?>images/vibaxlogo.png" rel="shortcut icon" type="image/png">


    <!-- Icon fonts -->
    <link href="<?=base_url('frondend/')?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=base_url('frondend/')?>css/flaticon.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url('frondend/')?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Plugins for this template -->
    <link href="<?=base_url('frondend/')?>css/animate.css" rel="stylesheet">
    <link href="<?=base_url('frondend/')?>css/owl.carousel.css" rel="stylesheet">
    <link href="<?=base_url('frondend/')?>css/owl.theme.css" rel="stylesheet">
    <link href="<?=base_url('frondend/')?>css/owl.transitions.css" rel="stylesheet">
    <link href="<?=base_url('frondend/')?>css/jquery.fancybox.css" rel="stylesheet">
    <link href="<?=base_url('frondend/')?>css/bootstrap-select.min.css" rel="stylesheet">
    <link href="<?=base_url('frondend/')?>css/magnific-popup.css" rel="stylesheet">
    <link href="<?=base_url('frondend/')?>rs-plugin/css/settings.css" rel="stylesheet"  media="screen">

    <!-- Custom styles for this template -->
    <link href="<?=base_url('frondend/')?>css/style.css" rel="stylesheet">
    <link href="<?=base_url('frondend/')?>css/responsive.css" rel="stylesheet">


     <?php
    if ( isset($this->data['assets']['header']) && !empty($this->data['assets']['header']) ) {
        foreach ($this->data['assets']['header'] as $_h_asset) {
            $this->load->view($_h_asset);
        }
    }
    ?>


 <style>
     .white{
         color:#fff!important;
     }
 </style>

</head>

<body class="home-style3">

    <!-- start page-wrapper -->
    <div class="page-wrapper">

        <!-- start preloader -->
        <div class="preloader">
            <div>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
<?php  $this->load->view('frond/inc/header')?>
<?php  $this->load->view("frond/{$template}");?>
<?php  $this->load->view('frond/inc/footer')?>
<?php  $this->load->view('frond/inc/footer_link')?>
 <?php
    if ( isset($this->data['assets']['footer']) && !empty($this->data['assets']['footer']) ) {
        foreach ($this->data['assets']['footer'] as $_f_asset) {
            $this->load->view($_f_asset);
        }
    }
    ?>