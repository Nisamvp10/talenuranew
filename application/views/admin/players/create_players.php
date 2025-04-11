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

if(!empty($players)){
  $id = $players->id;
  $name = $players->name;
  $email = $players->email;
  $contactnumber = $players->contactnumber;
  $clubName = $players->clubName;
  $city = $players->city;
  $state = $players->state;
  $country = $players->country;
  $image = $players->profile;
  $position  = $players->selected_payers;
}else{
  $id=$name=$email=$contactnumber=$clubName=$city=$state=$country=$image= $position='';
}

?>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create players</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('admin/home')?>">Home</a></li>
              <li class="breadcrumb-item active"> Create players </li>
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
                <h3 class="card-title">Create players <small></small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" novalidate="novalidate" action="<?=base_url('admin/players/submit')?>"  enctype="multipart/form-data" method="post">
                  <?=messages();?>
                <input type="hidden" name="id" value="<?=$id;?>">
                 <input type="hidden" name="path" value="<?=$image;?>">
                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" value="<?=$name;?>" id="name" placeholder="Enter name">
                  </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" value="<?=$email;?>" id="email" placeholder="Enter Title">
                  </div>


                   <div class="form-group">
                    <label for="exampleInputEmail1">Contact Number</label>
                    <input type="text" name="contactnumber" class="form-control" value="<?=$contactnumber;?>" id="contactnumber" placeholder="Enter contact number">
                  </div>


                   <div class="form-group">
                    <label for="exampleInputEmail1">Club Name</label>
                    <input type="text" name="clubName" class="form-control" value="<?=$clubName;?>" id="clubName" placeholder="Enter Club Name">
                  </div>


                   <div class="form-group">
                    <label for="exampleInputEmail1">City</label>
                    <input type="text" name="city" class="form-control" value="<?=$city;?>" id="city" placeholder="Enter City">
                  </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">State</label>
                    <input type="text" name="state" class="form-control" value="<?=$state;?>" id="state" placeholder="Enter state">
                  </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Country</label>
                    <input type="text" name="country" class="form-control" value="<?=$country;?>" id="country" placeholder="Enter Country">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Player Position</label>
                    <input type="text" name="position" class="form-control" value="<?=$position;?>" id="country" placeholder="Player Position">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputFile">Profile</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file" id="exampleInputFile">
                        <label class="custom-file-label"  for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
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
      title: {
        required: true,
      },
      description: {
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