
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title><?=$pageTitle?></title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="<?=base_url()?>assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/plugins/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/plugins/font-awesome/5.3/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/css/default/style.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/css/default/style-responsive.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/css/default/theme/default.css" rel="stylesheet" id="theme" />
    <!-- ================== END BASE CSS STYLE ================== -->
    <!-- ================== BEGIN BASE JS ================== -->
    <script src="<?=base_url()?>assets/plugins/pace/pace.min.js"></script>
    <!-- ================== END BASE JS ================== -->
    <style>
        .customalert{
            width: max-content;
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 1111111111;
        }
    </style>
</head>
<body class="pace-top">
<?php
if($this->session->flashdata('error')){
    echo '<div class="alert-warning alert customalert" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span style="padding-right:10px">'.$this->session->flashdata('error').'</span></div>';
}else if($this->session->flashdata('success')){
    echo '<div class="alert-success alert customalert" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span style="padding-right:10px">'.$this->session->flashdata('success').'</span></div>';
}
?>
<!-- begin #page-loader -->
<div id="page-loader" class="fade show"><span class="spinner"></span></div>
<!-- end #page-loader -->

<div class="login-cover">
    <div class="login-cover-image" data-id="login-cover-image"></div>
    <div class="login-cover-bg"></div>
</div>

<!-- begin #page-container -->
<div id="page-container" class="fade">
    <!-- begin login -->
    <div class="login login-v2" style="margin: 20px auto 0 auto;top:60px;left:0" data-pageload-addclass="animated fadeIn">
        <!-- begin brand -->
        <div class="login-header">
            <div class="brand">
                <span class="logo"></span> <b>User </b> Registration
                <small>Register New Account..!</small>
            </div>
            <div class="icon">
                <i class="fa fa-lock"></i>
            </div>
        </div>
        <!-- end brand -->
        <!-- begin login-content -->
        <div class="login-content">
            <form  method="post" id="SetSchooldetails" action="<?= base_url('user/saveregisteraccount') ?>">
                <div class="col-md-12 text-center" id="resmessage"></div>
                <div class="row mt-4">

                    <div class="col-md-12 form-group">
                        <label for="Fname">Enter Full Name</label>
                        <input type="text" name="Fname" class="form-control" required id="Fname" placeholder="Enter First Name">
                        <small id="fnameerror"></small>
                    </div>

                    <div class="col-md-12 form-group">
                        <label for="Mobile">Enter Mobile Number</label>
                        <input type="tel" minlength="10" style="width:100%;" placeholder="Enter Mobile Number" required name="Mobile" class="form-control" id="Mobile">
                        <small id="mobileerror"></small>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="Mailid">Enter Mail id</label>
                        <input type="email" autocomplete="off" required placeholder="Enter Mail id" name="Mailid" class="form-control" id="Mailid">
                        <small id="emailerror"></small>
                    </div>

<!--
                    <div class="col-md-12 form-group">
                        <label for="Address">Enter Address</label>
                        <input type="text" required name="Address" class="form-control" id="address" placeholder="Enter Address">
                        <small id="addresserror"></small>
                    </div>

                    <div class="col-md-12 form-group">
                        <label for="UserName">Enter Username</label>
                        <input type="text" maxlength="" required name="username" placeholder="Enter Username" class="form-control" id="UserName">
                        <small id="usernameerror"></small>
                    </div>
-->

                    <div class="col-md-12 form-group">
                        <label for="Password">Enter Password</label>
                        <input type="password" autocomplete="off" maxlength="" required name="Password" placeholder="Enter Password" class="form-control" id="Password">
                        <small id="usernameerror"></small>
                    </div>

                    <div class="col-md-12 form-group">
                        <center><input type="submit" id="registerAccount" class="btn btn-success" value="Register New Account" /></center>
                    </div>
                </div>
            </form>

        </div>
        <!-- end login-content -->
    </div>
    <!-- end login -->
</div>
<!-- end page container -->

<!-- ================== BEGIN BASE JS ================== -->
<script src="<?=base_url()?>assets/plugins/jquery/jquery-3.3.1.min.js"></script>
<script src="<?=base_url()?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<!--[if lt IE 9]>
<script src="<?=base_url()?>assets/crossbrowserjs/html5shiv.js"></script>
<script src="<?=base_url()?>assets/crossbrowserjs/respond.min.js"></script>
<script src="<?=base_url()?>assets/crossbrowserjs/excanvas.min.js"></script>
<![endif]-->
<script src="<?=base_url()?>assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?=base_url()?>assets/plugins/js-cookie/js.cookie.js"></script>
<script src="<?=base_url()?>assets/js/theme/default.min.js"></script>
<script src="<?=base_url()?>assets/js/apps.min.js"></script>
<!-- ================== END BASE JS ================== -->
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="<?=base_url()?>assets/js/demo/login-v2.demo.min.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->

<script>
    $(document).ready(function() {
        App.init();
        LoginV2.init();
    });
</script>
</body>
</html>