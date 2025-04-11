<?php $this->load->view('admin/include/header_link');?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">



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
            <h1>App Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">App data</li>
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">App  Info <small> </small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="<?=base_url('admin/system/appdataSubmit')?>" method="post"> 
                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Site Name</label>
                    <input type="text" name="name" value="<?=get_appdata('name')?>" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Contact Number</label>
                    <input type="text" name="contact_number" value="<?=get_appdata('contact_number')?>" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>



                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="app_email" class="form-control"  value="<?=get_appdata('app_email')?>" id="exampleInputEmail1" placeholder="Enter email">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <input type="text" name="address" class="form-control" value="<?=get_appdata('address')?>" id="exampleInputPassword1" placeholder="Address">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Our Mission</label>
                    <input type="text" name="vission" class="form-control" value="<?=get_appdata('vission')?>" id="" placeholder="Our vission">
                  </div>

                   <div class="form-group">
                    <label for="exampleInputPassword1">Our Vission</label>
                    <input type="text" name="mission" class="form-control" value="<?=get_appdata('mission')?>" id="" placeholder="Our mission">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Our value</label>
                    <input type="text" name="value" class="form-control" value="<?=get_appdata('value')?>" id="" placeholder="Our mission">
                  </div>
                  
                     <div class="form-group">
                    <label for="exampleInputPassword1">Viba Consultancy</label>
                    <input type="text" name="who_we_are" class="form-control" value="<?=get_appdata('who_we_are')?>" id="exampleInputPassword1" placeholder="Top headline">
                  </div>
                  
                    <div class="form-group">
                    <label for="exampleInputPassword1">Home Left</label>
                    <input type="text" name="home_left" class="form-control" value="<?=get_appdata('home_left')?>" id="exampleInputPassword1" placeholder="Home Left Content">
                  </div>
                  
                    <div class="form-group">
                    <label for="exampleInputPassword1">Match Round</label>
                    <input type="text" name="match_round" class="form-control" value="<?=get_appdata('match_round')?>" id="exampleInputPassword1" placeholder="Match Round">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Page footer</label>
                    <input type="text" name="page_footer" class="form-control" value="<?=get_appdata('page_footer')?>" id="exampleInputPassword1" placeholder="page footer">
                  </div>

                   
                    

                  
                   <div class="form-group">
                    <label for="exampleInputPassword1">Facebook</label>
                    <input type="text" name="facebook" class="form-control" value="<?=get_appdata('facebook')?>" id="exampleInputPassword1" placeholder="Facebook">
                  </div>
                  
                    <div class="form-group">
                    <label for="exampleInputPassword1">Instagram</label>
                    <input type="text" name="instagram" class="form-control" value="<?=get_appdata('instagram')?>" id="exampleInputPassword1" placeholder="Instagram">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">Linkedin</label>
                    <input type="text" name="linkedin" class="form-control" value="<?=get_appdata('linkedin')?>" id="exampleInputPassword1" placeholder="Instagram">
                  </div>

                   <div class="form-group">
                    <label for="exampleInputPassword1">Twitter</label>
                    <input type="text" name="instagram" class="form-control" value="<?=get_appdata('twitter')?>" id="exampleInputPassword1" placeholder="twitter">
                  </div>
                  
                    <div class="form-group">
                    <label for="exampleInputPassword1">Youtube</label>
                    <input type="text" name="youtube" class="form-control" value="<?=get_appdata('youtube')?>" id="exampleInputPassword1" placeholder="Youtube">
                  </div>

                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

<?php $this->load->view('admin/include/footer');?>

<?php $this->load->view('admin/include/footer_link');?>