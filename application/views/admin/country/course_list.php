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

 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Course list Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><a href="<?=base_url('admin/country/course/'.$id.' ');?>"> Add New Course  </a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
           
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Course list </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <input type="hidden" id="courseFinder" value="<?=$id;?>">
                <table id="course_pageDatatable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Course</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
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


<div class="modal fade" id="editcourses" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form id="courseForm" novalidate="novalidate" action="<?=base_url('admin/country/coursesUpdate')?>"  enctype="multipart/form-data" method="post">
               
                <input type="hidden" id="courseId" name="id" value="">
                <div class="card-body">

                   <div class="form-group">
                    <label for="exampleInputEmail1">Course</label>
                    <input type="text" id="coursenme" name="title" class="form-control" value="" >
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" id="subBtn" class="btn btn-primary">Submit</button>
                </div>
              </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


 <script src="<?=base_url('backend/')?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('backend/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?=base_url('backend/')?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url('backend/')?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url('backend/')?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url('backend/')?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=base_url('backend/')?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url('backend/')?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url('backend/')?>plugins/jszip/jszip.min.js"></script>
<script src="<?=base_url('backend/')?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=base_url('backend/')?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=base_url('backend/')?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url('backend/')?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url('backend/')?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('backend/')?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url('backend/')?>dist/js/demo.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?=base_url('backend/')?>plugins/jquery-validation/jquery.validate.min.js"></script>

 <script src="<?=base_url('style/js/university.js')?>"></script>
<script>
 
</script>