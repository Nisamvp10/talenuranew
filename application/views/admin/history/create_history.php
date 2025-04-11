<?php $this->load->view('admin/include/header_link');?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?=base_url('backend/')?>dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

<?php $this->load->view('admin/include/top_header');?>

<!-- call top header  nav  -->
<?php $this->load->view('admin/include/side_nav');?>

<!--call  side  nav  -->
<?php

if(!empty($history)){
  $id = $history->history_id;
  $title = $history->title;
  $description = $history->description;
  $more = $history->more;
}else{
  $id=$title = $description = $more  ='';
}

?>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create temple history</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('admin/home')?>">Home</a></li>
              <li class="breadcrumb-item active"> Create temple history </li>
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
                <h3 class="card-title">Create temple History <small></small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" novalidate="novalidate" action="<?=base_url('admin/history/submit')?>"  enctype="multipart/form-data" method="post">
                  <?=messages();?>
                <input type="hidden" name="id" value="<?=$id;?>">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" name="title" class="form-control" value="<?=$title;?>" id="exampleInputEmail1" placeholder="Enter Title">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <input type="text" name="description" class="form-control" value="<?=$description;?>" id="exampleInputPassword1" placeholder="Enter decription">
                  </div>

                    <div class="form-group">
                    <label for="exampleInputPassword1">more</label>
                    <input type="text" name="more" class="form-control" value="<?=$more;?>" id="exampleInputPassword1" placeholder="Enter More details">
                  </div>


               

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" id="formSubmit" class="btn btn-primary">Submit</button>
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
<?php $this->load->view('admin/include/footer_link');?>
<script src="<?=base_url('backend/')?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="<?=base_url('backend/')?>plugins/jquery-validation/jquery.validate.min.js"></script>
<script>

  $(function () {
  bsCustomFileInput.init();
});

  $(function () {
  $.validator.setDefaults({
    submitHandler: function () {
     // alert( "Form successful submitted!" );
            $('#formSubmit').hml('<i class="fa fa-spinner fa-spin"></i>');

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
       more: {
        required: true,
        minlength: 3
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