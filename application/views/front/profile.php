<div class="main">

<section class="offer_section layout_padding-bottom">
    <div class="offer_container">
      <div class="container ">
        <div class="row">
          <div class="col-md-4 profile-panel ">
            <?php $this->load->view('front/layout/nav_profile');?>

            <div class="box mt-3">
                <div class="box-wrapper">
                
                <div class="detail-box">
                    <h4 class="titlepanel" >Bio</h4>
                  <ul class="aboutPanel" >
                    <li>
                        <a href="javascript:void(0)"><i class="fa fa-user"></i> 
                        <?=(!empty($profile->first_name)? $profile->first_name:'');?>  
                         <?=(!empty($profile->last_name)? $profile->last_name:'');?>

                    </a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-birthday-cake"></i> 
                        <?=(!empty($profile->dob)? date("m-d-Y",strtotime($profile->dob)):'');?>
                    </a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-map-pin"></i> 
                        <?=(!empty($profile->zip_code)? $profile->zip_code:'');?>
                    </a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-flag"></i>
                        <?=(!empty($profile->countryname)? $profile->countryname:'');?>
                    </a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-graduation-cap"></i>
                        Graduation Year: <?=(!empty($profile->graduationyear)? $profile->graduationyear:'');?>
                    </a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-bank"></i>
                        School Year: <?=(!empty($profile->graduationyear)? $profile->graduationyear:'');?>
                    </a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-briefcase"></i>
                        <?= $profile->businessareas ? str_replace(",", " , ", $profile->businessareas) : 'No business areas selected'; ?>

                    </a>
                    </li>
                  </ul>
                
                </div>
                </div>
            </div>
            

            <div class="box mt-3">
                <div class="box-wrapper">
                
                <div class="detail-box">
                  <ul class="aboutPanel" >
                    <li>
                        <a href=""><i class="fa fa-caret-right"></i> About us</a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-caret-right"></i> Help Center</a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-caret-right"></i> Privacy & Policy</a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-caret-right"></i> info@teenbiz.com</a>
                    </li>
                  </ul>
                
                </div>
                </div>
            </div>
          </div>
          <div class="col-md-8 customrePanel ">
            <div class="box ">
                <div class="box-wrapper">
                    <style>
                      
                    </style>
                    <form id="profileForm" class="" enctype="multipart/form-data">
                        <div class="progress-container">
                            <div class="progress-bar" id="progress-bar"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="singel-form form-group profilepicturepanel">
                                    
                                    <div class="row">
                                        <div class="col-md-2 medium-2 col-lg-2 columns">
                                            <div class="circle">
                                            <img class="profile-pic w-100" src="<?=(!empty($this->profilepic) ? base_url($this->profilepic) : base_url('layout/front/images/user.svg'));?>">
                                            
                                            </div>
                                            <div class="p-image">
                                            <i class="fa fa-camera upload-button"></i>
                                                <input class="file-upload" id="profileImage" name="profileImage"  type="file" accept="image/*"/>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">
                                            Save Profile
                                        </button>
                                    </div>
                                   

                                    <!-- Submit button -->
                                  
                                    </div>
                                    <div id="feedbackError"></div>
                                </div> <!-- singel form -->
                            </div>
                        </div>
                    </form>
                </div>
         

            <div id="post-container-profile">
                <!-- Posts will be loaded here -->
            </div>
            <div id="loading">Loading...</div>

            <!--             
            <div class="row">
            <h2>Audio Record and Playback</h2>

                <button id="recordButton">Start Recording</button>
                <button id="stopButton" disabled>Stop Recording</button>
                <h3>Recorded Audio:</h3>
                <audio id="audioPlayback" controls></audio>
            </div> -->
        </div><!--close MD-8  -->
        

          
        </div>
      </div>
    </div>
  </section>


    </div> <!--close main-->