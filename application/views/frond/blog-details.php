

<?php 
    if(!empty($currentblog)){
        $title       = $currentblog->title;
        $author      = $currentblog->author;
        $created_at  = $currentblog->created_at;
        $short       = $currentblog->short_description;
        $description = $currentblog->description;
        $path        = $currentblog->path;
    }else{
        $title=$author=$created_at=$short=$description= $path='';
    }?>

    <!-- start page-wrapper -->
    <div class="page-wrapper blog-single-page">

      
    


        <!-- start page-title -->
        <section class="page-title">
            <div class="container">
                <div class="title-box">
                    <h1>Blog single</h1>
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Page</a></li>
                        <li>Blog single</li>
                    </ol>
                </div>
            </div> <!-- end container -->
        </section>
        <!-- end page-title -->


        <!-- start blog-single-content -->
        <section class="blog-single-content section-padding">
            <div class="container">
                <div class="row blog-with-sidebar">
                    <div class="col col-lg-9 col-lg-push-3 col-md-8 col-md-push-4">
                        <div class="post">
                            <div class="post-title-meta">
                                <h2><?=$title;?></h2>
                                <ul class="meta-info">
                                    <li><a href="#">By: <?=$author;?></a></li>
                                    <li><a href="#"><i class="fa fa-clock-o"></i><?=date('D-M-Y',strtotime($created_at));?></a></li>
                                
                                </ul>
                            </div>
                            <div class="post-body">
                                <p><?=$short;?></p>

                                <div class="gallery-post">
                                   
                                    <div class="gallery">
                                            <img src="<?=img_vlid('blog',$path)?>" alt class="img img-responsive">
                                      
                                       
                                    </div>
                                     <p><?=$description;?></p>
                                </div>
                            </div>
                        </div> <!-- end post -->

                    </div> <!-- end blog-content -->

                    <div class="blog-sidebar col col-lg-3 col-lg-pull-9 col-md-4 col-md-pull-8 col-sm-5">
                        
                        <?php
                         if(!empty($blogs)){ ?>
                        <div class="widget recent-post-widget">
                            <h3>bLOGS</h3>
                            <ul>
                            <?php 
                                foreach ($blogs as  $value) { ?>
                                <li>
                                    <div class="post-pic">
                                        <img src="<?=img_vlid('blog',$value->path)?>" alt class="img img-responsive">
                                    </div>
                                    <div class="details">
                                        <h4><a href="<?=base_url('blog/view/').$value->slug?>"><?=$value->title;?></a></h4>
                                        <span><?=date('M-D-Y',strtotime($value->created_at))?></span>
                                    </div>
                                </li>
                            <?php } ?>
                               
                            </ul>
                        </div>
                    <?php } ?>
                     
                        
                        
                    </div>                    
                </div>
            </div> <!-- end container -->
        </section>
        <!-- end blog-single-content -->


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


     
        <!-- end sectionname-->
    </div>
    <!-- end of page-wrapper -->


