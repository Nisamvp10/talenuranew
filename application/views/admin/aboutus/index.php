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


   <?php $this->load->view('admin/include/panel_header');?>

 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
           
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?=$pageTitle;?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="aboutusDatatable" class="table table-bordered table-striped">

       <thead>
         <tr>
              
                    <th>No</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                  
          
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
 <script src="<?=base_url('style/js/ajax.js')?>"></script>
