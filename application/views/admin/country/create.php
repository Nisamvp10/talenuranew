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

if(!empty($page)){
  $id           = $page->country_page_id;
  $title        = $page->title;
  $maincontent  = $page->main_content;
  $description  = $page->description;
  $image        = $page->path;
  $country      = $page->category;
  $why          = $page->why_study;
}else{
  $id =$title =$maincontent =$description =$image =$country = $why ='';
}

?>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Study Abroad</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('admin/home')?>">Home</a></li>
              <li class="breadcrumb-item active"> Create Study Abroad </li>
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
                <h3 class="card-title">Create Study Abroad <small></small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" novalidate="novalidate" action="<?=base_url('admin/country/submit')?>"  enctype="multipart/form-data" method="post">
                  <?=messages();?>
                <input type="hidden" name="id" value="<?=$id;?>">
                 <input type="hidden" name="path" value="<?=$image;?>">
                <div class="card-body">

                   <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" id="slugtitle" name="title" class="form-control" value="<?=$title;?>" id="exampleInputEmail1" placeholder="Enter Title">
                      <input type="hidden" id="slug" name="blogurl" class="form-control">
                  </div>

                    <div class="form-group">
                    <label for="exampleInputEmail1">Country</label>
                    <input type="text"  name="country" class="form-control" value="<?=$country;?>" id="exampleInputEmail1" placeholder="Country">
                  </div>

                 <div class="form-group">
                    <label for="exampleInputEmail1">why study</label>
                    <input type="text"  name="why" class="form-control" value="<?=$why;?>" id="exampleInputEmail1" placeholder="Enter Title">
                  </div>

                  
                   <div class="form-group">
                    <label for="exampleInputEmail1">Main Content</label>
                    <textarea name="maincontent" cols="15" class="form-control" placeholder="Main Content"><?=$maincontent;?></textarea>
                  </div>


                    <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                     <textarea required="" id="editor" name="description"><?=$description;?></textarea>
                      </textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Image</label>
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
  


  $(document).ready(function(){
      
                 
      CKEDITOR.replace('editor' ,{
        filebrowserUploadUrl: '<?=base_url('backend')?>/ck/ckeditor/ck_upload.php',
        filebrowserUploadMethod:'form',
       extraPlugins: 'embed,autoembed,image2',
      height: 500,

      // Load the default contents.css file plus customizations for this sample.
      contentsCss: [
        'https://cdn.ckeditor.com/4.15.1/full-all/contents.css',
        'https://ckeditor.com/docs/ckeditor4/4.15.1/examples/assets/css/widgetstyles.css'
      ],
      // Setup content provider. See https://ckeditor.com/docs/ckeditor4/latest/features/media_embed
      embed_provider: '//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}',

      // Configure the Enhanced Image plugin to use classes instead of styles and to disable the
      // resizer (because image size is controlled by widget styles or the image takes maximum
      // 100% of the editor width).
      image2_alignClasses: ['image-align-left', 'image-align-center', 'image-align-right'],
      image2_disableResizer: true

      });

    });


  $("#slugtitle").keyup(function() {
  var Text = $(this).val();
  Text = Text.toLowerCase();
  Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
  $("#slug").val(Text);        
});

</script>