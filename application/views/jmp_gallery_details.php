<!-- Start main-content -->
<style>
   /* .gallery-item{
        height:210px; 
    }
    .flexslider-wrapper{
        height: -webkit-fill-available;
    }*/
/*
    .gallery-item .thumb img{
        height: -webkit-fill-available;
    }
*/
    .portfolio-view {
        bottom: 40%;
        opacity: 0;
        position: absolute;
        right: 42%;
        transition: all 600ms ease 0s;
        z-index: 111;
    }
    .font-24 {
        font-size: 50px !important;
    }
</style>
<?php 
    $gallerylist = $gallerylists[0]; 
     $uploads =   $this->Model_default->selectconduction('jmp_gallery_files',array('event_id'=>$gallerylist->id));
?>
    <div class="main-content">
        <!-- Section: inner-header -->
        <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?=base_url();?>assets/images/aboutus_banner.jpg">
          <div class="container pt-100 pb-50">
            <!-- Section Content -->
            <div class="section-content pt-100">
              <div class="row"> 
                <div class="col-md-12">
                  <h3 class="title text-white">Gallery : <small style="color:#FFFFFF"><?= $gallerylist->title ?></small></h3>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- Gallery Grid 4 -->
        <!-- Section: Our Portfolio -->
        <section>
            
          <div class="container">
            <div class="section-title text-center">
              <div class="row">
                <div class="col-md-10 col-md-offset-1">
                  <h2 class="text-uppercase line-bottom-center mt-0">Photo <span class="text-theme-colored font-weight-600">Gallery</span></h2>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                
                <!-- Portfolio Gallery Grid -->
                <div id="grid" class="gallery-isotope grid-3 masonry gutter-10 clearfix">
                    <?php if($gallerylist->upload_type == 1){ 
                        foreach($uploads as $upload){
                    ?>
                          <!-- Portfolio Item Start -->
                          <div class="gallery-item breakfast">
                              <a class="image-popup-vertical-fit" title="view image" href="<?=base_url('admin/'.$upload->names);?>">
                            <div class="thumb">
                              <img class="img-fullwidth" src="<?=base_url('admin/'.$upload->names);?>" alt="project">
                              <div class="overlay-shade"></div>
                              <!--<div class="portfolio-upper-part">
                                <h4 class="font-22 mb-0">Title Place Here</h4>
                                <h5 class="font-14 text-gray-darkgray mt-0">- Photo</h5>
                              </div>-->
                              <!--<div class="portfolio-bottom-part">
                                <ul class="list-inline">
                                  <li><i class="fa fa-heart-o font-16 text-theme-colored vertical-align-middle"></i><span class="text-gray-darkgray font-14 ml-5">839</span></li>
                                  <li><i class="fa fa-comments-o font-16 text-theme-colored vertical-align-middle"></i><span class="text-gray-darkgray font-14 ml-5">360</span></li>
                                </ul>
                              </div>-->
                              <div class="portfolio-view">
                                
                                  <i class="fa fa-camera font-24 text-theme-colored"></i>
                                
                              </div>
                            </div>
                                  </a>
                          </div>
                        <?php  } ?>
                          <!-- Portfolio Item End -->
                    <?php } ?>

                 

                </div>
                <!-- End Portfolio Gallery Grid -->
              </div>
            </div>
          </div>
        </section>
        
        
    </div>
<!-- end main-content -->