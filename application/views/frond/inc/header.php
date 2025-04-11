<style>

    .site-header-style3 .navigation, .site-header-style3 #navbar {
    background-color: transparent;
    margin-top: -6px;
}
</style>
<header class="site-header-style3" >

            
            <!-- end upper-topbar -->

            <nav class="navigation navbar navbar-default">
                <div class="container">
                    <div class="row nav-topheader">
                    <div class="navbar-header">
                        <button type="button" class="open-btn">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">
                            <img class="main-logo" src="<?=base_url('frondend/')?>images/vibaLogo.svg" >
                        </a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse navbar-left">
                        <button class="close-navbar"><i class="fa fa-close"></i></button>
                        <ul class="nav navbar-nav">
                            <li class="">
                                <a href="<?=base_url();?>">Home</a>
                            </li>
                            <!-- <li><a href="<?=base_url('aboutus')?>">About</a></li> -->
                             <li class="sub-menu">
                                 <a href="#">Immigration</a> 
                                 <ul>
                                     <?php $res = immigrationNav();
                                        if(!empty($res)){
                                            foreach ($res as $key ) { ?>
                                            <li><a href="<?=base_url('immigration/'.$key->slug.'')?>"><?=$key->country?></a></li>
                                    <?php            
                                            }
                                        }
                                    ?>
                                   
                                </ul>
                             </li>

                               
                             <li class="sub-menu"><a href="<?=base_url('education');?>">Education</a></li>  
                            <li class="">
                                <a href="<?=base_url('blog')?>">Recruitment</a>
                            </li> 
                            <li class="sub-menu"><a href="<?=base_url('blog');?>">Blogs</a></li>  
                            <!-- <li><a href="<?=base_url('contactus')?>">Contact</a></li> -->
                        </ul>
                    </div><!-- end of nav-collapse -->
                    <div class="pbmit-right-box d-flex align-items-center">
                        <a class="pbmit-btn">Get in touch</a> 
                    </div>
                    </div>
                </div><!-- end of container -->
            </nav>
        </header>
        <!-- end of header -->
