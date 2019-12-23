<!-- Start main-content -->
<div class="main-content">

<!-- Section: inner-header -->
<section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?=base_url();?>assets/images/aboutus_banner.jpg">
  <div class="container pt-100 pb-50">
    <!-- Section Content -->
    <div class="section-content pt-100">
      <div class="row"> 
        <div class="col-md-12">
          <h3 class="title text-white">Organization members</h3>
        </div>
      </div>
    </div>
  </div>
</section>

    
    
<!-- Section: volunteers -->
<section class="bg-lighter">
  <div class="container">
    <div class="section-title text-center">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <h2 class="text-uppercase line-bottom-center mt-0"> ~ <span class="text-theme-colored font-weight-600">SVO - Orgination Members</span> ~ </h2>
<!--
          <div class="title-icon">
            <i class="flaticon-charity-hand-holding-a-heart"></i>
          </div>
-->
            <p>Thanks to each and every one for your direct / indirect participation in SVO Activities.</p>
          </div>
      </div>
    </div>
    <div class="section-content">
      <div class="row">
            <?php if(count($orglists) != 0){ ?>
                <?php foreach($orglists as $org){ ?>
                    <div class="col-sm-6 col-md-3">
                      <div class="team box-hover-effect effect3 border-1px border-bottom-theme-color-2px sm-text-center maxwidth400 mb-sm-30">
                        <div class="thumb">
                            <?php if(!empty($org->image)){ ?>
                                <img class="img-fullwidth" src="<?=base_url('admin/'.$org->image)?>" alt="<?=$org->first_name.'.'.$org->last_name?>" style="height: 260px !important">    
                            <?php }else{ ?>
                                <img class="img-fullwidth" src="<?=base_url('admin/assets/images/avatar.png')?>" alt="<?=$org->first_name.'.'.$org->last_name?>" >
                            <?php } ?>
                        </div>
                        <div class="content bg-white p-20 text-center">
                          <h4 class="name mb-0 mt-0">
                            <a class="text-theme-colored" data-toggle="popover" title="<?=$org->first_name.'.'.$org->last_name?>" data-content="&lt;div&gt;S/O : <?=$org->father_name?>&lt;/div&gt; &lt;div&gt;Mobile : <?=$org->mobile?>&lt;/div&gt; &lt;div&gt;Mail : <?=$org->email?>&lt;/div&gt;"  href="javascript:;"><?=$org->first_name?></a>
                          </h4>
                          <p style="display: none"><i class="fa fa-envelope-o" aria-hidden="true"></i> <?=$org->email?> / <i class="fa fa-mobile"></i> <?=$org->mobile?></p>
                          <!--<ul class="styled-icons icon-dark icon-theme-colored icon-sm">
                            <li><a href="#" class="img-circle"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="img-circle"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="img-circle"><i class="fa fa-skype"></i></a></li>
                          </ul>-->
                        </div>
                      </div>
                    </div>
                  
              
                    <script>
                      $(document).ready(function(){
                        $('[data-toggle="popover"]').popover({
                            placement : 'top',
                            trigger : 'hover',
                            html : true
                        });
                      });
                    </script>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
  </div>   
</section>
    

<!-- divider: Emergency Services -->
<!--
<section class="divider parallax layer-overlay overlay-dark-9" data-stellar-background-ratio="0.2"  data-bg-img="images/bg/bg2.jpg">
  <div class="container">
    <div class="section-content text-center">
      <div class="row">
        <div class="col-md-12">
          <h3 class="mt-0 text-white">How you can help us</h3>
          <h2 class="text-white">Just call at <span class="text-theme-colored">(01) 234 5678</span> to make a donation</h2>
        </div>
      </div>
    </div>
  </div>      
</section>
-->

</div>
<!-- end main-content -->