<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="">

  <title> Teen Biz Login </title>
  <link rel="stylesheet" type="text/css" href="<?=base_url('layout/front/css/bootstrap.css');?>" />

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <link href="<?=base_url('layout/front/css/font-awesome.min.css');?>" rel="stylesheet" />
  <link href="<?=base_url('layout/front/css/style.css');?>" rel="stylesheet" />
  <link href="<?=base_url('layout/front/css/responsive.css');?>" rel="stylesheet" />

</head>

<body class="theme-indigo mainbg">

  <div class="row">
    <div class="container login-container">
      <div class="wrapperContainer  login row">
        <div class="col-sm-6 col-md-6 col-lg-6 p-0" >
           <div class="loginBg" style=" background-image: url('<?=base_url('layout/front/images/login-bg.jpg');?>');">
            <div class="txtHolder">
              <h3 class="text-center ">Teen Biz</h3>
              <hr>
              <p>Teen Biz is more than just a platform; it’s a launchpad for young and aspiring entrepreneurs. It facilitates collaboration among like-minded individuals and provides opportunities to connect with accomplished business owners. Our expanding network of passionate young minds and seasoned professionals offers invaluable mentorship, guidance, and ideas. Teen Biz is more than a platform—it’s a community.</p>
            </div>
           </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
           <div class="innerWrap bg-white p-md-3">
              <div class="titleCon text-center pb-3 pt-3 text-uppercase">
                  <h3>Login</h3>
                  <p class="text-capitalize font-12" >Enter your personal details and start  with us</p>
                  <hr>
              </div>
                  <form id="loginForm" action="<?=base_url('login-submit');?>" method="post" novalidate autocomplete="off">
                  <!-- Username Field -->
                  <div class="form-group">
                      <label for="username">Username</label>
                      <i class="fa fa-user"></i>
                      <input type="text" class="form-control" id="username" name="username" placeholder="Enter username or Registerd Phone Number" required>
                      <div class="invalid-feedback">Please enter your username.</div>
                  </div>

                  <!-- Password Field -->
                  <div class="form-group">
                      <label for="password">Password</label>
                      <i class="fa fa-lock"></i>
                      <div class="eye">  <i class="fa fa-eye eye-icon"  id="togglePassword"></i></div>
                      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
                      <div class="invalid-feedback">Please enter your password.</div>
                  </div>

                  <!-- Login Button -->
                  <button type="submit" class="btn btn-primary btn-block mb-4">Login</button>

                  <!-- Forget Password Link -->
                   <div class="forgotsec">
                  <div class="text-right mt-2">
                      <a href="#" class="text-primary">Forgot password?</a>
                  </div>

                  <!-- Sign Up Link -->
                  <div class="text-center mt-3">
                      <span>Don't have an account? </span><a href="<?=base_url('register');?>" class="text-primary">Sign up</a>
                  </div>
                  </div>
              </form>
             
            </div>
           </div>
        </div>
      </div>
    </div>
  </div>


  <script src="<?=base_url('layout/front/js/jquery-3.4.1.min.js');?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="<?=base_url('layout/front/js/bootstrap.js');?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"> </script>
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>

  <script src="<?=base_url('layout/front/js/validate.js');?>"></script>
  <script src="<?=base_url('layout/front/js/sweetalert2.min.js');?>"></script>
  <script src="<?=base_url('layout/front/js/custom.js');?>"></script>
  <script src="<?=base_url('layout/front/js/login.js');?>"></script>
</body>

</html>