<header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <img src="<?=base_url('layout/front/images/logo.svg');?>">
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <form class="form-inline">
          <div class="input-group">
                    <input type="text" name="search_query" class="form-control" placeholder="Search..." aria-label="Search" aria-describedby="search-button">
                    <!-- Search button -->
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" id="search-button">
                            <i class="fa fa-search"></i> <!-- FontAwesome icon -->
                        </button>
                    </div>
                </div>
              </form>

            <ul class="navbar-nav  mx-auto ">
              <li class="nav-item active">
                <a class="nav-link" href="">
                <img src="<?=base_url('layout/front/images/home.svg');?>" >
                   <span class="">Home</span>
                  </a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="">
                <img src="<?=base_url('layout/front/images/message.svg');?>" >
                <span class="">Messages</span>
                </a>
              </li>
           
              <li class="nav-item">
              <a class="nav-link" href="">
                <img src="<?=base_url('layout/front/images/notification.svg');?>" >
                <span class="">Notifications</span>
                </a>
              </li>

              <li class="nav-item">
              <a class="nav-link" href="">
                <label class="profilePicheader">
                <img src="<?=(!empty($this->profilepic) ? base_url($this->profilepic) : base_url('layout/front/images/user.svg'));?>" class="w-100" >
                </label>
                <!-- <span class="">Profile</span> -->
                </a>
              </li>
            </ul>
            
          </div>
        </nav>
      </div>
    </header>