<!-- Header -->
<header class="header">
  <div class="header-top bg-theme-colored sm-text-center">
    <div class="container">
      <div class="row">
        <div class="col-md-2">
          <div class="widget no-border m-0">
            <ul class="styled-icons icon-dark icon-theme-colored icon-sm sm-text-center">
              <li><a href="https://www.facebook.com/myjmpuram/" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://twitter.com/myjmpuram" target="_blank"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-10">
          <div class="widget no-border m-0">
            <ul class="list-inline pull-right flip sm-pull-none sm-text-center mt-5">
                <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-white"></i> <a class="text-white" href="#">info@jmpuram.com</a> </li>
                <li class="m-0 pl-10 pr-10"><a class="text-white" href="#"> <i class="fa fa-user text-white"></i> login account</a> </li>    
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="header-nav">
    <div class="header-nav-wrapper navbar-scrolltofixed bg-silver-light">
      <div class="container">
        <nav id="menuzord-right" class="menuzord default no-bg">
          <a class="menuzord-brand pull-left flip" href="<?=base_url();?>"><img src="<?=base_url()?>assets/images/logo-wide.jpg" alt=""></a>
          <ul class="menuzord-menu">
            <li class="active"><a href="<?=base_url();?>">Home</a></li>
            <li><a href="<?=base_url('aboutus');?>">About us</a></li>
            <li><a href="#">svo organization</a>
                <ul class="dropdown">
                  <li><a href="<?=base_url('organization/aims')?>">Org Aim's</a></li>
                  <li><a href="<?=base_url('organization/members')?>">Org members</a></li>
                </ul>
            </li>  
            <li><a href="#">Resources</a>
                <ul class="dropdown">
                    <li><a href="<?=base_url('resources/temples')?>">Temples</a></li>
                    <li style="display: none"><a href="<?=base_url('resources/functionhalls')?>">Function Halls</a></li>
                    <li><a href="<?=base_url('resources/education')?>">Schools & College</a></li>          
                </ul>
            </li> 
            <li><a href="<?=base_url('gallery')?>">Gallery</a></li>
            <li><a href="<?=base_url('events')?>">events</a></li>
            <li style="display: none"><a href="<?=base_url('contactus')?>">Contact Us</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</header>