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
  <link href="<?=base_url('layout/front/css/select2.css');?>" rel="stylesheet" />

  <link href="<?=base_url('layout/front/css/style.css');?>" rel="stylesheet" />
  <link href="<?=base_url('layout/front/css/responsive.css');?>" rel="stylesheet" />
  <link href="<?=base_url('layout/front/css/dark.css');?>" rel="stylesheet" />
  <style>
 
 
</style>
</head>

<body class="theme-indigo mainbg">

  <div class="row">
    <div class="container login-container">
      <div class="wrapperContainer  login row">
        <div class="col-sm-5 col-md-5 col-lg-5 p-0" >
           <div class="loginBg" style=" background-image: url('<?=base_url('layout/front/images/login-bg.jpg');?>');">
            <div class="txtHolder">
              <h3 class="text-center ">Teen Biz</h3>
              <hr>
              <p>Teen Biz is more than just a platform; it’s a launchpad for young and aspiring entrepreneurs. It facilitates collaboration among like-minded individuals and provides opportunities to connect with accomplished business owners. Our expanding network of passionate young minds and seasoned professionals offers invaluable mentorship, guidance, and ideas. Teen Biz is more than a platform—it’s a community.</p>
            </div>
           </div>
        </div>
        <div class="col-sm-7 col-md-7 col-lg-7">
           <div class="innerWrap bg-white p-md-3">
              <div class="titleCon text-center pb-3 pt-3 text-uppercase">
                  <h3>Register</h3>
                  <p class="text-capitalize font-12" >Enter your personal details and start  with us</p>
                  <hr>
              </div>
                  <form id="registrationForm" method="post" action="<?=base_url('reg-submit');?>" novalidate autocomplete="off">
                    <div class="row">
                        <div class="col-sm-8 col-md-8 col-lg-8">
                            <div class="form-group">
                                <input type="text" class="form-control" id="firstname" placeholder="Enter Your First Name" name="firstname" required>
                                <div class="invalid-feedback">Please enter your First Name.</div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <input type="text" class="form-control" id="lastname" placeholder="Enter Your Last Name" name="lastname" required>
                                <div class="invalid-feedback">Please enter your Last Name.</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row dob">
                    <p class="col-sm-12 pb-0 mb-2 ">Enter Your Date of Birth </p>
                    <div  class="w-100" style="color:red;">
                        <div id="doberror"></div>
                    </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <input type="number" id="day" class="form-control" name="day" min="1" max="31" placeholder="DD">
                                <div class="invalid-feedback">Please enter Day.</div>
                                <span id="errorday" style="color:red;"></span>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <input type="number" id="month" class="form-control" name="month" min="1" max="12" placeholder="MM" maxlength="2" required>
                                <div class="invalid-feedback">Please enter your Month.</div>
                                <span id="errormonth" style="color:red;"></span>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <input type="number" id="year"  class="form-control"name="year" min="1900" max="2023" placeholder="YYYY" maxlength="4" required>
                                <div class="invalid-feedback">Please enter your Year.</div>
                                <span id="yearerror" style="color:red;"></span>
                            </div>
                        </div>
                    </div>
                  <!-- Username Field -->
                  <div class="row">
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <input type="text" class="form-control" id="zipcode" placeholder="Enter Your Zip Code" name="zipcode" required>
                                <div class="invalid-feedback">Please enter Zip Code.</div>
                            </div>
                        </div>
                        <div class="col-sm-8 col-md-8 col-lg-8">
                            <div class="form-group">
                            <select class="form-control niceselect" id="countryList" name="country" required>
                                    <?php
                                        if(!empty($country))
                                        {
                                           
                                            foreach($country as $country)
                                            {  
                                                echo '<option value="'.$country->id.'">'.$country->name.'</option>';
                                            }
                                        }
                                        ?>
                                </select>
                                <div class="invalid-feedback">Please enter your Country.</div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                            <select class="form-control" id="graduationYear" name="graduationyear" required>
                            <option >High school graduation year   </option>
                                    <?php
                                     for($i=2022;$i <= 2039;$i++){
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                     }
                                    ?>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg68">
                            <div class="form-group">
                            <select class="form-control" id="school" name="school" required>
                            <option >Select your school </option>
                                    <?php
                                     for($i=2022;$i <= 2039;$i++){
                                        echo '<option value="'.$i.'">American History High School, Newark</option>';
                                     }
                                    ?>
                                </select>
                                <div class="invalid-feedback">Please enter your Country.</div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="row">
                    
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                            <select class="form-control select2 businessarea" multiple="multiple" name="businessarea[]" id="businessArea" required>
                            <option value="" >Business interest area </option>
                                    <?php
                                        if(!empty($business_areas))
                                        {
                                            foreach($business_areas as $bsarea)
                                            {  
                                                echo '<option value="'.$bsarea->id.'">'.$bsarea->name.'</option>';
                                            }
                                        }
                                        ?>
                                </select>
                                <div class="invalid-feedback">Please enter your Business Area.</div>
                            </div>
                        </div>
                    </div>
                  
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <input type="number" class="form-control" id="contactnumber" placeholder="Enter Your Contact Number" name="contactnumber" required>
                                <div class="invalid-feedback">Please enter your PH.</div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <input type="email" class="form-control" id="username" placeholder="Enter Your Email" name="email" required>
                                <div class="invalid-feedback">Please enter your Email.</div>
                            </div>
                        </div>
                    </div>
                    
                 

                  <!-- Password Field -->
                  <div class="form-group">
                      <div class="eye">  <i class="fa fa-eye eye-icon"  id="togglePassword"></i></div>
                      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
                      <div class="invalid-feedback">Please enter your password.</div>
                  </div>

                  <!-- Login Button -->
                  <button type="submit" class="btn btn-primary btn-block mb-4">Sign Up Now</button>

                  <!-- Forget Password Link -->
                   <div class="forgotsec">
                

                  <!-- Sign Up Link -->
                  <div class="text-center mt-0">
                      <span>Already have an account ? </span><a href="<?=base_url('login');?>" class="text-primary">LOGIN</a>
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
  
  <script src="<?=base_url('layout/front/js/notify.min.js');?>"></script>
  <script src="<?=base_url('layout/front/js/notify.js');?>"></script>
  <script src="<?=base_url('layout/front/js/sweetalert2.min.js');?>"></script>

  <script src="<?=base_url('layout/front/js/custom.js');?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>
<!--  -->

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>


    <script>
        $(document).ready(function() {
            
            // Initialize Select2
            $('select.select2').select2({
                placeholder: "Business interest area",
            });
       

        $('.businessarea').on('change', function() {
                var selectedItems = $(this).val(); // Get selected items
                
                if (selectedItems.length > 3) {
                    // Show a warning if more than 3 items are selected
                    alert('You can only select a maximum of 3 items.');
                    
                    // Remove the last selected item to enforce the limit
                    selectedItems.pop();
                    
                    // Re-assign the values after removing the last item
                    $(this).val(selectedItems).trigger('change');
                }
            });
        });
    </script>

</body>

</html>