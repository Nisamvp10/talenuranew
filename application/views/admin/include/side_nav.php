 <style type="text/css">
   .hide{
    display: none;
   }
 </style>
 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <input type="hidden" id="base_url" value="<?=base_url()?>">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?=base_url('backend/')?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?=get_appdata('name')?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url('backend/')?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=loger($this->session->userdata('login_id'));?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-ope">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Home
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('admin/slider')?>" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Slider</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/slider/create')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Slider</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="<?=base_url('admin/aboutus')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Aboutus list</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="<?=base_url('admin/aboutus/create')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Aboutus Create</p>
                </a>
              </li>

              
              


            </ul>
          </li>

<!-- 
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Services
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('admin/services')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Services list</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/services/create')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Service</p>
                </a>
              </li>
              
             
            </ul>
          </li> -->
          

<!-- 
            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Testimonials
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('admin/testimonials')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Testimonials</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/testimonials/create')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Testimonial</p>
                </a>
              </li>
             
             
            </ul>
          </li> -->

       


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Study Abroad
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('admin/country')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pagelist list</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/country/create')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Page</p>
                </a>
              </li>
            </ul>
          </li>


           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Services
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('admin/services')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Services list</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/services/create')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Services</p>
                </a>
              </li>
              
             
            </ul>
          </li>


           

           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Testimonials
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('admin/testimonials')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Testimonials list</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/testimonials/create')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Testimonials</p>
                </a>
              </li>
              
             
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Blogs
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('admin/events')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blog list</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/events/create')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Blogs</p>
                </a>
              </li>
              
             
            </ul>
          </li>

           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Clients
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('admin/clients')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Clients list</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/clients/create')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Clients</p>
                </a>
              </li>
              
             
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Immigration
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('admin/immigration')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Immigration list</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/immigration/create')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Immigration</p>
                </a>
              </li>
              
             
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Test Preparation
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('admin/test_preparation')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Preparation list</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/test_preparation/create')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Preparation</p>
                </a>
              </li>
              
             
            </ul>
          </li>
          

        

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Site Options
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('admin/system/appdata')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>App Data</p>
                </a>
              </li>
              
             
             
            </ul>
          </li>
           

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
