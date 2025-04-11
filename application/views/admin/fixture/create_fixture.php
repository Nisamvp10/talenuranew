<?php // $this->load->view('admin/include/header_link');?>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('backend/')?>plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('backend/')?>dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?=base_url('backend/')?>plugins/summernote/summernote-bs4.min.css">
  <!-- CodeMirror -->
  <link rel="stylesheet" href="<?=base_url('backend/')?>plugins/codemirror/codemirror.css">
  <link rel="stylesheet" href="<?=base_url('backend/')?>plugins/codemirror/theme/monokai.css">
  <!-- SimpleMDE -->
  <link rel="stylesheet" href="<?=base_url('backend/')?>plugins/simplemde/simplemde.min.css">
  <link rel="stylesheet" href="<?=base_url('backend/')?>plugins/summernote/summernote-bs4.min.css">
    <script type="text/javascript" src="https://melivenews.com/template/main/ck/ck/ckeditor/ckeditor.js"> </script>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?=base_url('backend//')?>dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

<?php $this->load->view('admin/include/top_header');?>

<!-- call top header  nav  -->
<?php $this->load->view('admin/include/side_nav');?>

<!--call  side  nav  -->
<?php

if(!empty($fixture)){
  $id = $fixture->id;
  $team_one = $fixture->team_one;
  $team_one_score = $fixture->team_one_score;
  $team_two = $fixture->team_two;
  $team_two_score = $fixture->team_two_score;
  $date = $fixture->date;
   $status = $fixture->status;

}else{
    $id=$team_one=$team_two=$score=$date=$status=$team_one_score=$team_two_score='';
}

?>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Fixture</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('admin/home')?>">Home</a></li>
              <li class="breadcrumb-item active"> Create Fixture </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Fixture <small></small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" novalidate="novalidate" action="<?=base_url('admin/fixture/submit')?>"  enctype="multipart/form-data" method="post">
                  <?=messages();?>
                <input type="hidden" name="id" value="<?=$id;?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6"> 
                            <div class="form-group">
                            <label for="exampleInputEmail1">Team One </label>
                            <input type="text" name="team_one" class="form-control" value="<?=$team_one;?>" id="exampleInputEmail1" placeholder="Team One">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label for="exampleInputEmail1">Team One Score</label>
                            <input type="text" name="team_one_score" class="form-control" value="<?=$team_one_score;?>" id="exampleInputEmail1" placeholder="Team One Score">
                            </div>
                        </div>
                    </div>
                    
                      <div class="row">
                        <div class="col-sm-6"> 
                           <div class="form-group">
                                <label for="exampleInputEmail1">Team Two</label>
                                <input type="text" name="team_two" class="form-control" value="<?=$team_two;?>" id="exampleInputEmail1" placeholder="Team Two">
                              </div>
                        </div>
                         <div class="col-sm-6"> 
                           
                               <div class="form-group">
                                <label for="exampleInputEmail1">Team Two Score</label>
                                <input type="text" name="team_two_score" class="form-control" value="<?=$team_two_score;?>" id="exampleInputEmail1" placeholder="Team two Score">
                              </div>
                         </div>
                        </div>
                    
                    
                  
                
                

                    <div class="form-group">
                    <label for="exampleInputEmail1"> status</label>
                   <select class="form-control" name="fixture_status" >
                    <option  <?php if($status == 1){ echo "selected" ;}?> value="1">Live</option>
                     <option <?php if($status == 2){ echo "selected" ;}?> value="2">Upcoming </option>
                     <option <?php if($status == 3){ echo "selected" ;}?> value="3"> over </option>
                   </select>
                  </div>
                  
                    <div class="row">
                    <div class="col-sm-4">
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Date</label>
                      <input type="date" name="date" class="form-control" value="<?=date("Y-m-d", strtotime($date));?>" id="exampleInputEmail1" >
                    </div>
                  </div>

              </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" id="subBtn" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

<?php $this->load->view('admin/include/footer');?>
<?php // $this->load->view('admin/include/footer_link');?>


<!-- jQuery -->
<script src="<?=base_url('backend/')?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('backend/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('backend/')?>dist/js/adminlte.min.js"></script>
<!-- Summernote -->
<script src="<?=base_url('backend/')?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- CodeMirror -->
<script src="<?=base_url('backend/')?>plugins/codemirror/codemirror.js"></script>
<script src="<?=base_url('backend/')?>plugins/codemirror/mode/css/css.js"></script>
<script src="<?=base_url('backend/')?>plugins/codemirror/mode/xml/xml.js"></script>
<script src="<?=base_url('backend/')?>plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url('backend/')?>dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
  
  })
</script>

<script src="<?=base_url('backend//')?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="<?=base_url('backend//')?>plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?=base_url('backend//')?>plugins/summernote/summernote-bs4.min.js"></script>


<script>

  $(function () {
  bsCustomFileInput.init();
});

  $(function () {
  $.validator.setDefaults({
    submitHandler: function () {
     $('#subBtn').attr('disabled',true);
      return true;
    }
  });
  $('#quickForm').validate({
    rules: {
      team_one: {
        required: true,
      },
      team_two: {
        required: true,
        minlength: 5
      },
      
    },
    messages: {
      email: {
        required: "Please fill out this field",
      },
      password: {
        required: "lease fill out this field",
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>

<script>
  


</script>