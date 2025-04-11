
        <!-- end preloader -->

        <!-- Start header -->
    

        <!-- start page-title -->
        <section class="page-title">
            <div class="container">
                <div class="title-box">
                    <h1>About us</h1>
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li>About us</li>
                    </ol>
                </div>
            </div> <!-- end container -->
        </section>
        <!-- end page-title -->

        
        <!-- start featured -->
        <section class="about-company-s2 section-padding ">
            <div class="container">
                <div class="row">
                    <div class="col col-sm-12 ">
                        <div class="section-title row">
                            <div class="col col-xs-12">
                                <h2>WHO WE ARE</h2>
                            </div>
                        </div> <!-- end section-title -->

                        <div class="row">
                             <div class="col-sm-6">
                                    <p>
                                       Vibaa Consulting is a team of best immigration consultants based out of Kochi. Our expert team is built on a foundation of years of diverse experience and professional service. Migration, higher education, or even investing in another nation is major life decisions that must be made with extreme caution.
                                    </p>

                                      <p>
                                            Even a minor error can result in a rejection. Our professionals have been in the industry for many years and have dealt with a wide range of situations, including last-minute blunders. As a result, having counselled over a million students and professionals, Vibaa Consulting is the finest choice for visa and study abroad counseling.
                                      </p>
                               </div>
                            <div class="col col-xs-12 col-sm-6 about-company-s2-slider-wrapper">
                                <div class="about-company-s2-slider ">
                                    <div>
                                        <img src="<?=base_url('frondend/images/featured/newzealand.jpg')?>" alt>
                                    </div>
                                    <div>
                                        <img src="<?=base_url('frondend/images/featured/canada.jpg')?>" alt>
                                    </div>
                                </div>
                              
                            </div>
                        </div>

                       
                    </div>

                    

                </div>
            </div> <!-- end container -->
        </section>
        <!-- end featured -->

        <section class="about-company-s2 section-padding attachbg1 ">
            <div class="container">
             <div class="mission">
                            <div class="title row">
                                <div class="col col-md-4">
                                    <div class="section-title">
                                        <h2 style="color: #fff">viba Consultancy</h2>
                                    </div>
                                </div>
                                <div class="col col-md-8">
                                    <p><?=get_appdata('who_we_are')?></p>
                                </div>
                            </div>

                            <div class="row details " >
                                <div class="col col-md-12 left-col">
                                   <div class="col-sm-4 mb-10">
                                       <div class="details-container">
                                           <h3>Our Vission</h3>
                                           <div class="warap">
                                                <p><?=get_appdata('vission')?> </p>
                                           </div>
                                       </div>
                                   </div>


                                    <div class="col-sm-4 mb-10">
                                       <div class="details-container">
                                           <h3>Our Mission</h3>
                                           <div class="warap">
                                                <p><?=get_appdata('mission')?>  </p>
                                           </div>
                                       </div>
                                   </div>

                                    <div class="col-sm-4 mb-10">
                                       <div class="details-container">
                                           <h3>Our Value</h3>
                                           <div class="warap">
                                                <p><?=get_appdata('value')?> </p>
                                           </div>
                                       </div>
                                   </div>

                                </div>
                                
                            </div>
                        </div> <!-- end mission -->
                        </div>
        </section>

        
   

     

        <!-- start partner -->
        <section class="partner section-padding">
            <h2 class="hidden">Partners</h2>
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="partner-slider">
                            <?php 
                            if(!empty($clients)){
                                foreach ($clients as $key ) { ?>
                                   
                            <div class="grid">
                                <img src="<?=img_vlid('clients',$key->path)?>" alt>
                            </div>

                            <?php
                                }
                            }
                            ?>
                            
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>


        <!-- start cta -->
        <section class="cta parallax" data-bg-image="<?=base_url('frondend/images/cta-bg.jpg')?>">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <h5>Meet our team 24 X 7 Suppoert </h5>
                        <a href="#" class="btn">Request Quote</a>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end cta -->


