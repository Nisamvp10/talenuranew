

<?php 
    if(!empty($preparation)){
        $title       = $preparation->title;
        $language    = $preparation->language;
        $created_at  = $preparation->created_at;
        $short       = $preparation->short_description;
        $description = $preparation->description;
        $path        = $preparation->path;
    }else{
        $title=$language=$created_at=$short=$description= $path='';
    }?>
<style>
    .imidesc ul{

    list-style-type: initial;
    padding-left: 0;
    margin: 0;

    }
    .prelist li{
      background: #f1f0f7;
     
      border-radius: 10px;
      margin-bottom: 15px!important;
    }
    .prelist li > a {
        display: block;
        color: #404040;
        position: relative;
        display: flow-root!important;
        z-index: 1;
    }
     .prelist li a:hover,.prelist li a:hover h4{
        color: #fff;
     }
    .prelist li a:hover:before {
        width: 100%;
    }
   .prelist li a:before {
    position: absolute;
    content: '';
    background: #1b182f;
    width: 0%;
    height: 100%;
    left: 0px;
    top: 0px;
    border-radius: 10px;
    z-index: -1;
    transition: all 500ms ease;
}
.prelist li a img{
     padding: 15px;
}

@media (max-width: 767px){
    .prelist {
        margin: 0!important;
    }
    .prelist li{
        padding: 10px!important;
    }
    .prelist .post-pic {
        width: 30%!important;
        float: left!important;
        position: relative!important;
        left: 0!important;
    }
    .blog-sidebar .recent-post-widget .details {
     width: 68%; 
    float: right;
    }
}
</style>
    <!-- start page-wrapper -->
    <div class="page-wrapper blog-single-page">

      
    


        <!-- start page-title -->
        <section class="page-title">
            <div class="container">
                <div class="title-box">
                    <h1><?$pageTitle;?></h1>
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        
                        <li><?=$pageTitle;?></li>
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
                                   
                                
                                </ul>
                            </div>
                            <div class="post-body">
                                <p><?=$short;?></p>

                                <div class="gallery-post">
                                   
                                    <div class="gallery">
                                            <img src="<?=img_vlid('test_preparation',$path)?>" alt class="img img-responsive">
                                      
                                       
                                    </div>
                                    <div class="imidesc">
                                     <p><?=$description;?></p>
                                 </div>
                                </div>
                            </div>
                        </div> <!-- end post -->

                    </div> <!-- end blog-content -->

                    <div class="blog-sidebar col col-lg-3 col-lg-pull-9 col-md-4 col-md-pull-8 col-sm-5">
                        
                        <?php
                         if(!empty($preparationList)){ ?>
                        <div class="widget recent-post-widget">
                            <h3>Test Preparation</h3>
                            <ul class="prelist">
                            <?php 
                                foreach ($preparationList as  $value) { ?>
                                <li>
                                    <a href="<?=base_url('test_preparation/').$value->slug?>">
                                    <div class="post-pic">
                                        <img src="<?=img_vlid('test_preparation',$value->path)?>" alt class="img img-responsive">
                                    </div>
                                    <div class="details">
                                        <h4><?=$value->language;?></h4>
                                    
                                    </div>
                                    </a>
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


