
<style>
    .overlay {
    position: absolute;
    content: '';
    width: 100%;
    height: 100%;
    background: rgb(0 0 0 / 16%);
    top: 0;
}
</style>

<div id="slider" class="carousel slide" data-bs-ride="carousel">
    <!-- <div class="carousel-indicators">
        <button type="button" data-bs-target="#slider" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#slider" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#slider" data-bs-slide-to="2"></button>
    </div> -->

    <div class="carousel-inner">
    <?php 
    $i=1;
        foreach ($slider as $key ) { ?>
        <div class="carousel-item <?=($i==1 ?'active' :'');?>">
            <img src="<?=base_url('uploads/slider/').$key->path?>"  class="d-block w-100" width="100%" alt="Slide 1">
            <div class="carousel-caption">
                <h3><?=$key->title;?></h3>
                <p><?=$key->description;?></p>
            </div>
            <div class="bgoverlay"></div>
        </div>
        <?php $i++; } ?>
    
        </div>
    </div>
<!-- 
    <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button> -->
</div>

        <!-- start of hero -->   
           
        <!-- end of hero slider -->


        <!-- start featured -->
        <section class="featured section-padding">
            <div class="container">
                <div class="row content d-flex ">
                    <div class="col col-lg-3 col-xs-3 d-flex flex-column iconBOx">
                        <div class="grid">
                            <div class="img-holder">
                                <img src="<?=base_url('frondend/')?>images/visa.svg" alt class="img img-responsive">
                            </div>
                            <div class="details">
                                <h3>Permanent Resident Visa</h3>
                                <p>Facilitate international business endeavors, attend meetings, conferences, and explore investment opportunities in foreign markets.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col col-lg-3 col-xs-3 d-flex flex-column iconBOx">
                        <div class="grid">
                            <div class="img-holder">
                                <img src="<?=base_url('frondend/')?>images/familyvisa.svg" alt class="img img-responsive">
                            </div>
                            <div class="details">
                                <h3>Family Visa</h3>
                                <p>
                                    Reunite with close family members living overseas and establish a new home together in a foreign land.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col col-lg-3 col-xs-3 d-flex flex-column iconBOx">
                        <div class="grid">
                            <div class="img-holder">
                                <img src="<?=base_url('frondend/')?>images/investor.svg" alt class="img img-responsive">
                            </div>
                            <div class="details">
                                <h3>Investor Visa</h3>
                                <p>
                                Invest in a foreign country's economy and gain residency or citizenship, combining business opportunities with international living.
                            </p>
                            </div>
                        </div>
                    </div>
                    <div class="col col-lg-3 col-xs-3 d-flex flex-column iconBOx">
                        <div class="grid">
                            <div class="img-holder">
                                <img src="<?=base_url('frondend/images/')?>student.svg" alt class="img img-responsive">
                            </div>
                            <div class="details">
                                <h3>Student Visa</h3>
                                <p>
                                Pursue higher education abroad, enroll in academic programs, and experience cultural exchange while studying in a foreign country.
                            </p>
                            </div>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end featured -->


        <!-- start about-us-section -->
        <section class="about-us-section about-us-section-style3 section-padding">
            <div class="container">
               
                <div class="row content">
                    <div class="col col-md-7">

                        <div class="box">
                        <div class="row section-title">
                            <h2>About company</h2>
                        </div> <!-- end section-title -->
                
                            <h3>We advise global leaders on their most critical issues and opportunities</h3>
                            <p>
                                Talenaura  is a team of best immigration consultants based out of Kochi. Our expert team is built on a foundation of years of diverse experience and professional service. Migration, higher education, or even investing in another nation is major life decisions that must be made with extreme caution.
                                </p>
                            <p>
                                 Even a minor error can result in a rejection. Our professionals have been in the industry for many years and have dealt with a wide range of situations, including last-minute blunders. As a result, having counselled over a million students and professionals, Talenaura  is the finest choice for visa and study abroad counseling.
                            </p>
                            <!--<div class="signature">-->
                            <!--    <img src="<?=base_url('frondend/')?>images/signature.jpg" alt class="img img-responsive">-->
                            <!--</div>-->
                        </div>
                    </div>

                    <div class="col col-md-5 about-company-slider-wrapper">
                        <div class="">
                                <img src="<?=base_url('frondend/')?>images/about-thumb.jpg" style="width:100%" alt>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end about-us-section -->

             

        <!-- start services -->
        <section class="services-style2 section-padding">
            <div class="container">
                <div class="row section-title">
                    <div class="col col-md-8 col-md-offset-2">
                        <h2>Services We Provide</h2>
                        <p>For The Immigration Choose Your Country</p>
                    </div>
                </div> <!-- end section-title -->
        
                <div class="row content services-style2-grids">
                    <?php
                        if(!empty($services)){
                            foreach ($services as $key) { ?>
                                
                    <div class="col col-md-3 wow fadeInLeftSlow">
                        <div class="grid">
                             <img src="<?=img_vlid('services',$key->path)?>" width="100%" />
                            <div class="inner-grid">
                              
                                <h3><?=$key->title;?></h3>
                                <p><?=$key->description;?></p>
                            </div>
                        </div>
                    </div>

                <?php }
                } ?>
                    
                    
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end services -->


      


        <!-- start testimonials-->
        <section class="testimonials testimonials-style2 section-padding" >
            <div class="container">
                <div class="row">
                    <div class="col col-md-10 col-md-offset-1">
                          <div class="row section-title" style="margin-bottom:30px">
                    <!-- <h2 style="color:#fff">Success stories of Our Candidate </h2> -->
                </div> <!-- end section-title -->
                        <div class="testimonials-slider-style2">
                            <?php
                        if(!empty($testimonial)){
                            foreach ($testimonial as $key) { ?>
                            <div class="box">
                                <div class="client-pic d-flex">
                                    <img src="<?=img_vlid('testimonial',$key->path)?>" alt="<?=$key->name;?>" class="img img-responsive" style="width:50px;height:50px">
                                    <div class="details" style="margin-top:15px"> <h4><?=$key->name;?></h4></div>
                                </div>
                                
                                <div class="details">
                                    <p><?=$key->description;?></p>
                                    
                                   
                                </div>
                            </div>
                            <?php } 
                            }
                         ?>
                            
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end testimonials-->


        <!-- start blog-section -->
        





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
        <!-- end partner -->

