<div class="main">

<section class="offer_section layout_padding-bottom">
    <div class="offer_container">
      <div class="container ">
        <div class="row">
          <div class="col-md-4 profile-panel ">
            <div class="box ">
                <div class="box-wrapper">
                <div class="img-box">
                    <div class="profilePic">
                        <img src="<?=base_url('layout/front/images/user.svg');?>" alt="">
                    </div>
                    <div class="userDetail">
                        <h4><?=$this->fname;?></h4>
                        <span><?=$this->email;?></span>
                        <label></label>
                    </div>
                </div>
                <div class="detail-box">
                  <ul>
                    <li>
                        <a href=""><i class="fa fa-user"></i> Profile</a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-gear"></i> Settings</a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-bell"></i> Notification</a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-sign-out"></i> Logout</a>
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
                    <form>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="singel-form form-group">
                                    <textarea name="thought"  placeholder="What is in your mind ...."  class="form-control" required="required" rows="7"></textarea>
                                    <div class="d-flex btnContainer">
                                    <div class="form-group upImg">
                                        <label for="fileUpload" class="d-flex align-items-center">
                                            <i class="fa fa-paperclip"></i> <!-- FontAwesome paperclip icon -->
                                           
                                        </label>
                                        <input type="file" class="form-control-file d-none" id="fileUpload" name="attachment">
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

            <div class="box mt-3">
                <div class="box-wrapper">
                        <div class="userPost">
                            <div class="img-box">
                                <div class="profilePic">
                                    <img src="<?=base_url('layout/front/images/client1.jpg');?>" alt="">
                                </div>
                                <div class="userDetail">
                                    <h4><?='Dona Elizabath'?></h4>
                                    <span>1 hr</span>
                                    <label class="online" ></label>
                                </div>
                            </div>
                        <div class="userText">
                            <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                                 and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            </p>
                        </div>
                        <div class="userimgPost">
                            <img src="<?=base_url('layout/front/images/hero-bg.jpg');?>" width="100%" alt="">
                        </div>
                        <div class="userActionPanel">
                            <div class="like">
                                <i class="fa fa-heart-o"></i> <span>104 </span>
                            </div>
                            <div class="like">
                                <i class="fa fa-commenting-o "></i> <span>13 </span>
                            </div>
                        </div>

                        <div class="comment">
                            <div class="img-box">
                                <div class="profilePic">
                                    <img src="<?=base_url('layout/front/images/client2.jpg');?>" alt="">
                                </div>
                                <div class="userDetail">
                                    <h4><?='Alby Niz'?></h4>
                                    <span>23 min</span>
                                </div>
                            </div>
                            <div class="comments">
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book
                                    </p>
                            </div>
                        </div>

                        <div class="commentWrite">
                            <div class="img-box">
                                <div class="profilePic">
                                    <img src="<?=base_url('layout/front/images/login-bg.jpg');?>" alt="">
                                </div>
                             
                                <div class="comments w-100">
                                    <form class="p-0">
                                    <div class="row">
                                    <div class="col-md-12">
                                        <div class="singel-form form-group">
                                        <textarea name="thought"  placeholder="Add  your interactions"  class="form-control" required="required" rows="1"></textarea>
                                            <div class="help-block with-errors"></div>
                                            <button class="btn" type="submit">Post</button>
                                        </div> <!-- singel form -->
                                    </div>
                                    </form>
                               </div>
                            </div>
                           
                        </div>

                    </div>
                </div>
            </div>

        </div>
            <!--  -->
            <div class="box mt-3">
                <div class="box-wrapper">
                        <div class="userPost">
                            <div class="img-box">
                                <div class="profilePic">
                                    <img src="<?=base_url('layout/front/images/02-4.jpg');?>" alt="">
                                </div>
                                <div class="userDetail">
                                    <h4><?='Sarun'?></h4>
                                    <span>1 hr</span>
                                    <label class="online" ></label>
                                </div>
                            </div>
                        <div class="userText">
                            <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                                 and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            </p>
                        </div>
                        <div class="userimgPost">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <!-- Carousel Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>

                            <!-- Carousel Inner -->
                            <div class="carousel-inner">
                                <!-- Slide 1 -->
                                <div class="carousel-item active">
                                    <img src="https://via.placeholder.com/800x400?text=First+Slide" class="d-block w-100" alt="First Slide">
                                </div>
                                <!-- Slide 2 -->
                                <div class="carousel-item">
                                    <img src="https://via.placeholder.com/800x400?text=Second+Slide" class="d-block w-100" alt="Second Slide">
                                </div>
                                <!-- Slide 3 -->
                                <div class="carousel-item">
                                    <img src="https://via.placeholder.com/800x400?text=Third+Slide" class="d-block w-100" alt="Third Slide">
                                </div>
                            </div>

                            <!-- Previous Button -->
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>

                            <!-- Next Button -->
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        </div>
                        <div class="userActionPanel">
                            <div class="like">
                                <i class="fa fa-heart-o"></i> <span>104 </span>
                            </div>
                            <div class="like">
                                <i class="fa fa-commenting-o "></i> <span>13 </span>
                            </div>
                        </div>

                        <div class="comment">
                            <div class="img-box">
                                <div class="profilePic">
                                    <img src="<?=base_url('layout/front/images/client2.jpg');?>" alt="">
                                </div>
                                <div class="userDetail">
                                    <h4><?='Alby Niz'?></h4>
                                    <span>23 min</span>
                                </div>
                            </div>
                            <div class="comments">
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book
                                    </p>
                            </div>
                        </div>

                        <div class="commentWrite">
                            <div class="img-box">
                                <div class="profilePic">
                                    <img src="<?=base_url('layout/front/images/login-bg.jpg');?>" alt="">
                                </div>
                             
                                <div class="comments w-100">
                                    <form class="p-0">
                                    <div class="row">
                                    <div class="col-md-12">
                                        <div class="singel-form form-group">
                                        <textarea name="thought"  placeholder="Add  your interactions"  class="form-control" required="required" rows="1"></textarea>
                                            <div class="help-block with-errors"></div>
                                            <button class="btn" type="submit">Post</button>
                                        </div> <!-- singel form -->
                                    </div>
                                    </form>
                               </div>
                            </div>
                           
                        </div>

                    </div>
                </div>
            </div>
            <!--  -->

          
        </div>
      </div>
    </div>
  </section>


    </div> <!--close main-->