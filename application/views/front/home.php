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
                    <form id="thoughtForm" class="thoughtForm" enctype="multipart/form-data">
                        <div class="progress-container">
                            <div class="progress-bar" id="progress-bar"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="singel-form form-group selfThought">
                                    <textarea name="thought"  placeholder="What is in your mind ...."  class="form-control" required="required" rows="7"></textarea>
                                    <div id="preview"></div>
                                    <div class="d-flex btnContainer">
                                    <div class="form-group upImg">
                                        <label for="fileUpload" class="d-flex align-items-center">
                                            <i class="fa fa-paperclip"></i> <!-- FontAwesome paperclip icon -->
                                           
                                        </label>
                                    </div>

                                    <!-- test -->
                                    <div class="file-input">
                                        <input type="file" id="file-input" name="media_files[]"  accept="image/*,video/*" multiple>
                                    </div>
                                   

                                    <!-- Submit button -->
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-paper-plane"></i> Submit
                                    </button>
                                    </div>
                                        <div class="help-block with-errors"></div>
                                </div> <!-- singel form -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div id="post-container">
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