<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title></title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <?php // view('front/layout/header_link');?>
  <?php
    if ( isset($this->data['assets']['header']) && !empty($this->data['assets']['header']) ) {
        foreach ($this->data['assets']['header'] as $_h_asset) {
           $this->load->view($_h_asset);
        }
    }
    ?>

</head>
<body>
<?php  $this->load->view("front/layout/header");?>
<?php  $this->load->view("front/layout/nav");?>
<?php  $this->load->view("front/{$template}");?>
<?php  $this->load->view("front/layout/footer");?>

</body>

<?php
    if( isset($this->data['assets']['footer']) && !empty($this->data['assets']['footer']) ) {
        foreach ($this->data['assets']['footer'] as $_f_asset) {
            $this->load->view($_f_asset);
        }
    }
  ?>