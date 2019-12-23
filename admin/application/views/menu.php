<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <!--<ul class="nav">
             <li class="nav-profile">
                <a href="javascript:;" data-toggle="nav-profile">
                    <div class="image">
                        <img src="../assets/img/user/user-13.jpg" alt="" />
                    </div>
                    <div class="info">
                        <b class="caret pull-right"></b>
                        Sean Ngu
                        <small>Front end developer</small>
                    </div>
                </a>
            </li>
            <li>
                <ul class="nav nav-profile">
                    <li><a href="javascript:;"><i class="fa fa-cog"></i> Settings</a></li>
                    <li><a href="javascript:;"><i class="fa fa-pencil-alt"></i> Send Feedback</a></li>
                    <li><a href="javascript:;"><i class="fa fa-question-circle"></i> Helps</a></li>
                </ul>
            </li>
        </ul> -->
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav">
            <li class="nav-header text-uppercase">Navigation</li>
            <?php $sessiondata = $this->session->userdata; ?>
            
                <li><a href="<?=base_url('dashboard')?>"><i class="fa fa-th-large"></i><span>Dashboard </span></a></li>
            
                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            <i class="fa fa-image"></i>
                            <span>Gallery <!-- <span class="label label-theme m-l-5"></span> --></span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="<?=base_url('dashboard/gallery/newgallery')?>">New Gallery</a></li>
                            <li><a href="<?=base_url('dashboard/gallery/gallerylist')?>">Gallery List</a></li>
                            <?php if($sessiondata['role'] == 0){ ?>
                                <li><a href="<?=base_url('dashboard/gallery/setup')?>">Setup Gallery</a></li>
                            <?php } ?>
                            
                        </ul>
                    </li>

                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            <i class="fa fa-users"></i>
                            <span> Citizens Details <!-- <span class="label label-theme m-l-5"></span> --></span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="<?=base_url('dashboard/citizens/newcitizens')?>">New citizen</a></li>
                            <li><a href="<?=base_url('dashboard/citizens/citizenslist')?>">citizens List</a></li>
                        </ul>
                    </li>
                    
                    
                    <li><a href="#"><i class="fa fa-user"></i><span>Community members</span></a></li>
            
                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            <i class="fa fa-user"></i>
                            <span>User Accounts</span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="#">New User</a></li>
                            <li><a href="#">Users List</a></li>
                        </ul>
                    </li>

                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            <i class="fa fa-list"></i>
                            <span>Articals</span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="#">New Artical</a></li>
                            <li><a href="#">Articals List</a></li>
                            <li><a href="#">Setup Artical</a></li>
                        </ul>
                    </li>

                
                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            <i class="fa fa-calendar-o"></i>
                            <span>Events</span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="<?=base_url('dashboard/events/addevents')?>">New Event</a></li>
                            <li><a href="<?=base_url('dashboard/events/eventslist')?>">Events List</a></li>
                        </ul>
                    </li>
            
                   
                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            <i class="fa fa-cogs"></i>
                            <span>Settings</span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="#">Roles</a></li>
                            <li><a href="#">Site Settings</a></li>
                        </ul>
                    </li>
            
                    <li><a href="<?=base_url('dashboard/profile')?>"><i class="fa fa-user"></i><span>Profile</span></a></li>

               
            
            <!-- begin sidebar minify button -->
            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
            <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>