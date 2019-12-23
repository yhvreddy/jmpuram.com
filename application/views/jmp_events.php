<!-- Start main-content -->
  <div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?=base_url();?>assets/images/aboutus_banner.jpg">
      <div class="container pt-100 pb-50">
        <!-- Section Content -->
        <div class="section-content pt-100">
          <div class="row"> 
            <div class="col-md-12">
              <h3 class="title text-white">Events</h3>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Events Grid -->
    <section>
      <div class="container pb-30">
        <div class="section-content">
          <div class="row">
              <div class="section-title text-center">
                  <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                      <h2 class="text-uppercase line-bottom-center mt-0"> ~ <span class="text-theme-colored font-weight-600">Events</span> ~ </h2>
<!--
                      <div class="title-icon">
                        <i class="flaticon-charity-hand-holding-a-heart"></i>
                      </div>
-->

                    </div>
                  </div>
            </div>
            <?php if(count($events) != 0){ ?>
                
                  <?php foreach($events as $event){ ?>
              
                      <div class="col-sm-3 col-md-3 col-lg-3">
                      <div class="schedule-box maxwidth500 bg-lighter mb-30">
                        <div class="thumb">
                            <?php if(!empty($event->cover_image)){ ?>
                                <img class="img-fullwidth" alt="" src="<?=base_url('admin/'.$event->cover_image);?>">
                            <?php }else{ ?>
                                <img class="img-fullwidth" alt="" src="<?=base_url();?>assets/images/banner_1.jpg">
                            <?php } ?>
                          
                        </div>
                        <div class="schedule-details border-bottom-theme-color-2px clearfix p-15 pt-10">
                          <div class="text-center pull-left flip bg-theme-colored p-10 pt-5 pb-5 mr-10">
                            <ul>
                              <li class="font-19 text-white font-weight-600 border-bottom "><?=date('d',strtotime($event->start))?></li>
                              <li class="font-12 text-white text-uppercase"><?=date('M',strtotime($event->start))?></li>
                            </ul>
                          </div>
                          <h4 class="title mt-5 mb-5"><a href="#"><?=$event->title?></a></h4>
                          <ul class="list-inline font-11 text-gray">
                            <li><i class="fa fa-calendar mr-5"></i> <?=date('d-D Y',strtotime($event->start))?> at <?=date('H:i a',strtotime($event->start))?></li>
                          </ul>
                          <div class="clearfix"></div>
                          <p class="mt-10" style="display: none"><?php if(!empty($event->note)){ echo substr($event->note,0,60).'...'; } ?></p>
                          <div class="mt-10">
                           <center><a class="btn btn-dark btn-theme-colored btn-sm mt-10" href="#">More details</a></center>
                          </div>
                        </div>
                      </div>
                    </div>
              
                  <?php } ?>
              
            <?php } ?>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->