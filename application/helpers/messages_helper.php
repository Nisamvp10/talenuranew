<?php


        function messages(){
  $CI =& get_instance();
  if($CI->session->flashdata('msg')) {
    ?>
<div class="alertbox alert alert-success background-success">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<i class="icofont icofont-close-line-circled text-white"></i>
</button>
<strong>Success!</strong> <?=$CI->session->flashdata('msg');?>
</div>
<?php
  }
  if($CI->session->flashdata('xmsg')) {
    ?>

<div class="alertbox alert alert-danger background-danger">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<i class="icofont icofont-close-line-circled text-white"></i>
</button>
<strong>Error!</strong> <?=$CI->session->flashdata('xmsg');?>
</div>

    <?php
  }
  if($CI->session->flashdata('wmsg')) {
    ?>
    <div class="alert alert-warning">
      <!-- <strong>Warning</strong> -->
      <p><?=$CI->session->flashdata('wmsg')?></p>
    </div>
    <?php
  }
if($CI->session->flashdata('frontsuccessmsg'))
{
?>
<div class="alert alert-success alert-dismissible fade show" role="alert"><?=$CI->session->flashdata('frontsuccessmsg')?></div>
<?php
}

if($CI->session->flashdata('fronterrormsg'))
{
?>
<div class="alert alert-danger alert-dismissible fade show" role="alert"><?=$CI->session->flashdata('fronterrormsg')?></div>
<?php
}

if($CI->session->flashdata('frontwarnmessage'))
{
?>
<div class="alert alert-info alert-dismissible fade show" role="alert"><?=$CI->session->flashdata('frontwarnmessage')?></div>
<?php
}

  if($CI->session->flashdata('imsg')) {
    ?>
    <div class="alert alert-info">
      <strong>Info</strong>
      <p><?=$CI->session->flashdata('imsg')?></p>
    </div>
    <?php
  }
  if( isset(  $_GET['res']  ) ){
    if( $_GET['res'] == "added" ){
      ?>
      <div class="alert alert-success">
        <strong>Success</strong>
        <p>Data added successfully</p>
      </div>
      <?php
    }
  if( $_GET['res'] == "error" ){
    ?>
    <div class="alert alert-danger">
      <strong>Error</strong>
      <p>Opzz something went wrong please try again</p>
    </div>
    <?php
  }
  if( $_GET['res'] == "deleted" ){
    ?>
    <div class="alert alert-success">
      <strong>Success</strong>
      <p>Data deleted successfully</p>
    </div>
    <?php
  }

  }
}


?>