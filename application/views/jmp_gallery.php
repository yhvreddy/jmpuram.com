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
</style>
    <div class="main-content">
        <!-- Section: inner-header -->
        <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?=base_url();?>assets/images/aboutus_banner.jpg">
          <div class="container pt-100 pb-50">
            <!-- Section Content -->
            <div class="section-content pt-100">
              <div class="row"> 
                <div class="col-md-12">
                  <h3 class="title text-white">Gallery</h3>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- Gallery Grid 4 -->
        <section>
          <div class="container pb-20">
            <div class="section-content">
              <div class="row">
                <div class="section-title text-center">
                      <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                          <h2 class="text-uppercase line-bottom-center mt-0"> ~ <span class="text-theme-colored font-weight-600">Gallery</span> ~ </h2>
<!--
                          <div class="title-icon">
                            <i class="flaticon-charity-hand-holding-a-heart"></i>
                          </div>
-->
                         
                        </div>
                      </div>
                </div>
                <div class="col-md-12">

                  <!-- Portfolio Gallery Grid -->
                  <div id="grid" class="gallery-isotope grid-4 gutter clearfix">
                        
                      <?php if(count($gallerylists) != 0){ ?>
                          <!-- Portfolio Gallery Grid -->

                            <?php foreach($gallerylists as $gallerylist){ 

                                    if($gallerylist->upload_type == 1){ 
                                        $uploads =   $this->Model_default->selectconduction('jmp_gallery_files',array('event_id'=>$gallerylist->id));
                                        //print_r($uploads);
                                ?>
                                    <!-- Portfolio Item Start -->
                                    <div class="gallery-item design">
                                      <div class="thumb">
                                        <div class="flexslider-wrapper">
                                          <div class="flexslider">
                                            <ul class="slides">
                                                <?php $ai = 0; foreach($uploads as $upload){ 
                                                    if($ai < 10){
                                                ?>
                                                    <li style="height:210px !important"><a href="<?=base_url('admin/'.$upload->names);?>" ><img src="<?=base_url('admin/'.$upload->names);?>"></a></li>
                                                <?php } $ai++; } ?>
                                            </ul>
                                          </div>
                                        </div>
                                        <div class="overlay-shade"></div>
                                        <div class="icons-holder">
                                          <div class="icons-holder-inner">
                                            <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                              <a href="#"><i class="fa fa-picture-o"></i></a>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <h5 class="text-center mt-15 mb-40"><a href="<?=base_url('gallery/'.$gallerylist->id.'/'.url_title($gallerylist->title))?>"><?=substr($gallerylist->title,0,38)?>.. </a></h5>
                                    </div>
                                    <!-- Portfolio Item End -->
                                <?php } ?>
                                <?php if($gallerylist->upload_type == 3){ ?>  
                                    <!-- Portfolio Item Start -->
                                    <div class="gallery-item photography">
                                      <div class="thumb">
                                        <img class="img-fullwidth" src="<?=base_url();?>assets/images/gallery/gallery-lg1.jpg" alt="project">
                                        <div class="overlay-shade"></div>
                                        <div class="icons-holder">
                                          <div class="icons-holder-inner">
                                            <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                              <a data-lightbox="image" href="<?=base_url();?>assets/images/gallery/gallery-lg1.jpg"><i class="fa fa-plus"></i></a>
                                              <a href="#"><i class="fa fa-link"></i></a>
                                            </div>
                                          </div>
                                        </div>
                                        <a class="hover-link" data-lightbox="image" href="<?=base_url();?>assets/images/gallery/gallery-lg1.jpg">View more</a>
                                      </div>
                                      <h5 class="text-center mt-15 mb-40">Place here your original caption </h5>
                                    </div>
                                    <!-- Portfolio Item End -->
                                <?php } ?>
                                <?php if($gallerylist->upload_type == 2){ ?>
                                    <!-- Portfolio Item Start -->
                                    <div class="gallery-item branding">
                                      <div class="thumb">
                                        <img class="img-fullwidth" src="<?=base_url();?>assets/images/gallery/gallery-lg5.jpg" alt="project">
                                        <div class="overlay-shade"></div>
                                        <div class="icons-holder">
                                          <div class="icons-holder-inner">
                                            <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                              <a class="popup-vimeo" href="https://vimeo.com/45830194"><i class="fa fa-play"></i></a>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <h5 class="text-center mt-15 mb-40">Place here your original caption </h5>
                                    </div>
                                    <!-- Portfolio Item End -->
                                <?php } ?>
                            <?php } ?>


                        <?php }else{ ?>
                        
                        <?php }  ?>
                      
                  </div>
                  <!-- End Portfolio Gallery Grid -->

                </div>
              </div>
            </div>
          </div>
        </section>
    </div>
<!-- end main-content -->