

        <!-- start page-title -->
        <section class="page-title">
            <div class="container">
                <div class="title-box">
                    <h1>Latest Insights</h1>
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li>Blog</li>
                    </ol>
                </div>
            </div> <!-- end container -->
        </section>
        <!-- end page-title -->


        <!-- start blog-section -->
        <section class="blog-section section-padding">
            <div class="container">
                <div class="row blog-section-grids">
                    <?php 
                    if(!empty($blogs)){
                        foreach ($blogs as $key => $value) {
                             if ($key % 3 == 0) {
                                echo '<div class = "row mtb20">';
                            }
                            ?>
                             <div class="col col-lg-4 col-xs-12 mb-10">
                        <div class="grid">
                            <div class="entry-media">
                                <img src="<?=img_vlid('blog',$value->path)?>" alt class="img img-responsive">
                            </div>
                            <div class="border blgdtls">
                            <div class="entry-title">
                                <h3><a href="<?=base_url('blog/view/').$value->slug?>"><?=$value->title;?></a></h3>
                            </div>
                                <div class="entry-meta">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-clock-o"></i> <?=date('M-D-Y',strtotime($value->created_at))?></a></li>
                                    </ul>
                                </div>
                                <div class="entry-details">
                                    <p><?=$value->short_description;?></p>

                                    <a href="<?=base_url('blog/view/').$value->slug?>" class="read-more">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <?php 
                            if ($key % 3 == 2) {
                                echo '</div>';
                            }
                            }
                        }
                    ?>
                
                </div> <!-- end row -->

            
            </div> <!-- end container -->
        </section>
        <!-- end blog-section -->


        <!-- start cta -->
        <section class="cta parallax" data-bg-image="images/cta-bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <h5>Are you ready to start ?</h5>
                        <a href="#" class="btn">Request Quote</a>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end cta -->
