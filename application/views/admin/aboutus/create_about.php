<?php $this->load->view('admin/include/header_link');?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


<?php $this->load->view('admin/include/top_header');?>

<!-- call top header  nav  -->
<?php $this->load->view('admin/include/side_nav');?>

<!--call  side  nav  -->
<?php

if(!empty($aboutus)){
  $id = $aboutus->id;
  $title = $aboutus->title;
  $description = $aboutus->description;
  $image = $aboutus->path;
}else{
  $id=$title = $description = $image  ='';
}

?>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


  <?php $this->load->view('admin/include/panel_header') ;?>
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?$pageTitle;?> <small></small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" novalidate="novalidate" action="<?=base_url('admin/aboutus/submit')?>"  enctype="multipart/form-data" method="post">
                  <?=messages();?>
                <input type="hidden" name="id" value="<?=$id;?>">
                 <input type="hidden" name="path" value="<?=$image;?>">
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
                    <label for="exampleInputFile">File input</label>
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