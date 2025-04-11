
        <section class="page-title">
            <div class="container">
                <div class="title-box">
                    <h1>Contact</h1>
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li>Contact</li>
                    </ol>
                </div>
            </div> <!-- end container -->
        </section>
        <!-- end page-title -->


        <!-- start contact-section -->
        <section class="contact-section-wrapper">
            <div class="contact-section">
                <div class="container contact-block" >
                    <div class="row">
                        <div class="col col-xs-12">
                            <h2>Contact our support guys or make appointment with our consultants</h2>
                            <div class="contact-info">
                                <p>Please contact us using the information below. For additional information on our management consulting services, please visit the appropriate page on our site.</p>
                                <ul>
                                    <li>
                                        <span class="icon">
                                            <i class="fi flaticon-home"></i></span>
                                       <?=get_appdata('address')?>
                                    </li>
                                    <li>
                                        <span class="icon">
                                            <i class="fi flaticon-telephone"></i>
                                        </span>
                                       <?=get_appdata('contact_number')?>
                                    </li>
                                    <li>
                                        <span class="icon">
                                            <i class="fi flaticon-mail-black-envelope-symbol"></i>
                                        </span>
                                        <?=get_appdata('app_email')?>
                                    </li>
                                </ul>
                            </div>
                            <div class="contact-form">
                                <form class="form" id="contact-form">
                                    <div>
                                        <input type="text" name="name" class="form-control" placeholder="Full Name">
                                    </div>
                                    <div>
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div>
                                        <select class="form-control" name="topic">
                                            <option selected disabled>Select topic</option>
                                            <option>Topic 1</option>
                                            <option>Topic 2</option>
                                            <option>Topic 3</option>
                                        </select>
                                    </div>
                                    <div>
                                        <textarea class="form-control" name="message" placeholder="write"></textarea>
                                    </div>
                                    <div class="submit-btn">
                                        <div class="btn-wrapper">
                                            <button type="submit" class="btn">Submit</button>
                                            <span id="loader"><img src="images/contact-ajax-loader.gif" alt="Loader"></span>
                                        </div>
                                    </div>
                                    <div class="col col-md-12 error-handling-messages">
                                        <div id="success">Thank you</div>
                                        <div id="error"> Error occurred while sending email. Please try again later. </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> <!-- end row -->
                </div> <!-- end container -->

                <div style="position: relative;">
                <div class="map-wrapper active" data-style="1">
                  
                    <div id="map" class="map"></div>
                </div>
            </div>
                
            </div>

           
        </section>
        <!-- end contact-section -->        

      

    <script src="http://maps.googleapis.com/maps/api/js?key="></script>
