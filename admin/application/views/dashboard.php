<!-- begin #content -->
<?php
    $sessiondata = $this->session->userdata;
    $currentdate = date('Y-m-d');
    error_reporting(0);
?>
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Dashboard<small></small></h1>
    <!-- end page-header -->
    <?php if($sessiondata['type'] == 'admin' || $sessiondata['type'] == 'superadmin'){ ?>
        <!-- begin row -->
        <div class="row">
            <!-- begin col-3 -->
            <?php
                $visiters = $this->Model_dashboard->selectdata('sms_visiters_data',array('school_id'=>$school_id,'branch_id'=>$branch_id,'DATE(created)'=>$currentdate,'status'=>1));
                $totalvisiters = $this->Model_dashboard->selectdata('sms_visiters_data',array('school_id'=>$school_id,'branch_id'=>$branch_id,'status'=>1));
                @$persentvisiters = count($visiters) / count($totalvisiters) * 100;
                @$totalpercentage = count($totalvisiters) / count($totalvisiters) * 100;
            ?>
            <div class="col-lg-3 col-md-6">
                <div class="widget widget-stats bg-gradient-teal">
                    <div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
                    <div class="stats-content">
                        <div class="stats-title">TODAY'S / TOTAL VISITS</div>
                        <div class="stats-number"><?=count($visiters).' / '.count($totalvisiters);?></div>
                        <div class="stats-progress progress">
                            <div class="progress-bar" style="width: <?=$persentvisiters?>%;"></div>
                        </div>
                        <div class="stats-desc">Total Visiters List ( <?=count($totalvisiters)?> )</div>
                    </div>
                </div>
            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <?php
                $enquiry = $this->Model_dashboard->selectdata('sms_enquiry',array('school_id'=>$school_id,'branch_id'=>$branch_id,'DATE(created)'=>$currentdate,'status'=>1));
                $totalenquiry = $this->Model_dashboard->selectdata('sms_enquiry',array('school_id'=>$school_id,'branch_id'=>$branch_id,'status'=>1));
                @$percentage_enquiry = count($enquiry) / count($totalenquiry) * 100;
            ?>
            <div class="col-lg-3 col-md-6">
                <div class="widget widget-stats bg-gradient-blue">
                    <div class="stats-icon stats-icon-lg"><i class="fa fa-dollar-sign fa-fw"></i></div>
                    <div class="stats-content">
                        <div class="stats-title">TODAY'S / TOTAL ENQUIRY'S</div>
                        <div class="stats-number"><?=count($enquiry).' / '.count($totalenquiry)?></div>
                        <div class="stats-progress progress">
                            <div class="progress-bar" style="width:<?=$percentage_enquiry?>%;"></div>
                        </div>
                        <div class="stats-desc">Total Enquiry List (<?=count($totalenquiry)?>)</div>
                    </div>
                </div>
            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <?php
                $admission = $this->Model_dashboard->selectdata('sms_admissions',array('school_id'=>$school_id,'branch_id'=>$branch_id,'DATE(created)'=>$currentdate,'status'=>1));
                $totaladmission = $this->Model_dashboard->selectdata('sms_admissions',array('school_id'=>$school_id,'branch_id'=>$branch_id,'status'=>1));
                @$percentage_admission = count($admission) / count($totaladmission) * 100;
            ?>
            <div class="col-lg-3 col-md-6">
                <div class="widget widget-stats bg-gradient-purple">
                    <div class="stats-icon stats-icon-lg"><i class="fa fa-archive fa-fw"></i></div>
                    <div class="stats-content">
                        <div class="stats-title">TODAY'S / TOTAL ADMISSION'S</div>
                        <div class="stats-number"><?= count($admission).' / '. count($totaladmission)?></div>
                        <div class="stats-progress progress">
                            <div class="progress-bar" style="width: <?=$percentage_admission?>%;"></div>
                        </div>
                        <div class="stats-desc">Total Admission List ( <?=count($totaladmission)?> )</div>
                    </div>
                </div>
            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <?php
                $employee = $this->Model_dashboard->selectdata('sms_employee',array('school_id'=>$school_id,'branch_id'=>$branch_id,'employeetype'=>'staff','status'=>1));
                $totalemployee = $this->Model_dashboard->selectdata('sms_employee',array('school_id'=>$school_id,'branch_id'=>$branch_id,'status'=>1));
                @$percentage_employee = count($employee) / count($totalemployee) * 100;
            ?>
            <div class="col-lg-3 col-md-6">
                <div class="widget widget-stats bg-gradient-black">
                    <div class="stats-icon stats-icon-lg"><i class="fa fa-comment-alt fa-fw"></i></div>
                    <div class="stats-content">
                        <div class="stats-title">TOTAL STAFF EMPLOYEE'S</div>
                        <div class="stats-number"><?=count($employee)?></div>
                        <div class="stats-progress progress">
                            <div class="progress-bar" style="width: <?=$percentage_employee?>%;"></div>
                        </div>
                        <div class="stats-desc">Total Employee's List (<?=count($totalemployee)?>)</div>
                    </div>
                </div>
            </div>
            <!-- end col-3 -->
        </div>
        <!-- end row -->
        <!-- begin row -->
        <div class="row">
            <!-- begin col-8 -->
            <div class="col-lg-8">
                <div class="widget-chart with-sidebar inverse-mode">
                    <div class="widget-chart-content bg-black">
                        <h4 class="chart-title">
                            Visitors Analytics
                            <small>Where do our visitors come from</small>
                        </h4>
                        <div id="visitors-line-chart" class="widget-chart-full-width nvd3-inverse-mode" style="height: 260px;"></div>
                    </div>
                    <div class="widget-chart-sidebar bg-black-darker">
                        <div class="chart-number">
                            1,225,729
                            <small>Total visitors</small>
                        </div>
                        <div id="visitors-donut-chart" class="nvd3-inverse-mode p-t-10" style="height: 180px"></div>
                        <ul class="chart-legend f-s-11">
                            <li><i class="fa fa-circle fa-fw text-primary f-s-9 m-r-5 t-minus-1"></i> 34.0% <span>New Visitors</span></li>
                            <li><i class="fa fa-circle fa-fw text-success f-s-9 m-r-5 t-minus-1"></i> 56.0% <span>Return Visitors</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end col-8 -->
            <!-- begin col-4 -->
            <div class="col-lg-4">
                <div class="panel panel-inverse" data-sortable-id="index-1">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            Visitors Origin
                        </h4>
                    </div>
                    <div id="visitors-map" class="bg-black" style="height: 179px;"></div>
                    <div class="list-group">
                        <a href="javascript:;" class="list-group-item list-group-item-inverse d-flex justify-content-between align-items-center text-ellipsis">
                            1. United State
                            <span class="badge f-w-500 bg-gradient-teal f-s-10">20.95%</span>
                        </a>
                        <a href="javascript:;" class="list-group-item list-group-item-inverse d-flex justify-content-between align-items-center text-ellipsis">
                            2. India
                            <span class="badge f-w-500 bg-gradient-blue f-s-10">16.12%</span>
                        </a>
                        <a href="javascript:;" class="list-group-item list-group-item-inverse d-flex justify-content-between align-items-center text-ellipsis">
                            3. Mongolia
                            <span class="badge f-w-500 bg-gradient-grey f-s-10">14.99%</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- end col-4 -->
        </div>
        <!-- end row -->
        <!-- begin row -->
        <div class="row">
            <!-- begin col-4 -->
            <div class="col-lg-4">
                <!-- begin panel -->
                <div class="panel panel-inverse" data-sortable-id="index-2">
                    <div class="panel-heading">
                        <h4 class="panel-title">Chat History <span class="label bg-gradient-teal pull-right">4 message</span></h4>
                    </div>
                    <div class="panel-body bg-silver">
                        <div class="chats" data-scrollbar="true" data-height="225px">
                            <div class="left">
                                <span class="date-time">yesterday 11:23pm</span>
                                <a href="javascript:;" class="name">Sowse Bawdy</a>
                                <a href="javascript:;" class="image"><img alt="" src="../assets/img/user/user-12.jpg" /></a>
                                <div class="message">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit volutpat. Praesent mattis interdum arcu eu feugiat.
                                </div>
                            </div>
                            <div class="right">
                                <span class="date-time">08:12am</span>
                                <a href="javascript:;" class="name"><span class="label label-primary">ADMIN</span> Me</a>
                                <a href="javascript:;" class="image"><img alt="" src="../assets/img/user/user-13.jpg" /></a>
                                <div class="message">
                                    Nullam posuere, nisl a varius rhoncus, risus tellus hendrerit neque.
                                </div>
                            </div>
                            <div class="left">
                                <span class="date-time">09:20am</span>
                                <a href="javascript:;" class="name">Neck Jolly</a>
                                <a href="javascript:;" class="image"><img alt="" src="../assets/img/user/user-10.jpg" /></a>
                                <div class="message">
                                    Euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                </div>
                            </div>
                            <div class="left">
                                <span class="date-time">11:15am</span>
                                <a href="javascript:;" class="name">Shag Strap</a>
                                <a href="javascript:;" class="image"><img alt="" src="../assets/img/user/user-14.jpg" /></a>
                                <div class="message">
                                    Nullam iaculis pharetra pharetra. Proin sodales tristique sapien mattis placerat.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <form name="send_message_form" data-id="message-form">
                            <div class="input-group">
                                <input type="text" class="form-control" name="message" placeholder="Enter your message here.">
                                <span class="input-group-append">
                                            <button class="btn btn-primary" type="button"><i class="fa fa-camera"></i></button>
                                            <button class="btn btn-primary" type="button"><i class="fa fa-link"></i></button>
                                        </span>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end panel -->
            </div>
            <!-- end col-4 -->
            <!-- begin col-4 -->
            <div class="col-lg-4">
                <!-- begin panel -->
                <div class="panel panel-inverse" data-sortable-id="index-3">
                    <div class="panel-heading">
                        <h4 class="panel-title">Today's Schedule</h4>
                    </div>
                    <div id="schedule-calendar" class="bootstrap-calendar"></div>
                    <div class="list-group">
                        <a href="javascript:;" class="list-group-item d-flex justify-content-between align-items-center text-ellipsis">
                            Sales Reporting
                            <span class="badge f-w-500 bg-gradient-teal f-s-10">9:00 am</span>
                        </a>
                        <a href="javascript:;" class="list-group-item d-flex justify-content-between align-items-center text-ellipsis">
                            Have a meeting with sales team
                            <span class="badge f-w-500 bg-gradient-blue f-s-10">2:45 pm</span>
                        </a>
                    </div>
                </div>
                <!-- end panel -->
            </div>
            <!-- end col-4 -->
            <!-- begin col-4 -->
            <div class="col-lg-4">
                <!-- begin panel -->
                <div class="panel panel-inverse" data-sortable-id="index-4">
                    <div class="panel-heading">
                        <h4 class="panel-title">New Registered Users <span class="pull-right label bg-gradient-teal">24 new users</span></h4>
                    </div>
                    <ul class="registered-users-list clearfix">
                        <li>
                            <a href="javascript:;"><img src="../assets/img/user/user-5.jpg" alt="" /></a>
                            <h4 class="username text-ellipsis">
                                Savory Posh
                                <small>Algerian</small>
                            </h4>
                        </li>
                        <li>
                            <a href="javascript:;"><img src="../assets/img/user/user-3.jpg" alt="" /></a>
                            <h4 class="username text-ellipsis">
                                Ancient Caviar
                                <small>Korean</small>
                            </h4>
                        </li>
                        <li>
                            <a href="javascript:;"><img src="../assets/img/user/user-1.jpg" alt="" /></a>
                            <h4 class="username text-ellipsis">
                                Marble Lungs
                                <small>Indian</small>
                            </h4>
                        </li>
                        <li>
                            <a href="javascript:;"><img src="../assets/img/user/user-8.jpg" alt="" /></a>
                            <h4 class="username text-ellipsis">
                                Blank Bloke
                                <small>Japanese</small>
                            </h4>
                        </li>
                        <li>
                            <a href="javascript:;"><img src="../assets/img/user/user-2.jpg" alt="" /></a>
                            <h4 class="username text-ellipsis">
                                Hip Sculling
                                <small>Cuban</small>
                            </h4>
                        </li>
                        <li>
                            <a href="javascript:;"><img src="../assets/img/user/user-6.jpg" alt="" /></a>
                            <h4 class="username text-ellipsis">
                                Flat Moon
                                <small>Nepalese</small>
                            </h4>
                        </li>
                        <li>
                            <a href="javascript:;"><img src="../assets/img/user/user-4.jpg" alt="" /></a>
                            <h4 class="username text-ellipsis">
                                Packed Puffs
                                <small>Malaysian></small>
                            </h4>
                        </li>
                        <li>
                            <a href="javascript:;"><img src="../assets/img/user/user-9.jpg" alt="" /></a>
                            <h4 class="username text-ellipsis">
                                Clay Hike
                                <small>Swedish</small>
                            </h4>
                        </li>
                    </ul>
                    <div class="panel-footer text-center">
                        <a href="javascript:;" class="text-inverse">View All</a>
                    </div>
                </div>
                <!-- end panel -->
            </div>
            <!-- end col-4 -->
        </div>
        <!-- end row -->
    <?php } ?>
</div>
<!-- end #content -->
<script>
    $(document).ready(function () {
        var handleVisitorsAreaChart = function(){
            var t=function(t){
                var e=new Date;
                return e=e.setDate(e.getDate()-t)},
                e=[
                    {
                        key:"Unique Visitors",
                        color:COLOR_AQUA,
                        values:[[t(77),13],[t(76),13],[t(75),6],[t(73),6],[t(72),6],[t(71),5],[t(70),5],[t(69),5],[t(68),6],[t(67),7],[t(66),6],[t(65),9],[t(64),9],[t(63),8],[t(62),10],[t(61),10],[t(60),10],[t(59),10],[t(58),9],[t(57),9],[t(56),10],[t(55),9],[t(54),9],[t(53),8],[t(52),8],[t(51),8],[t(50),8],[t(49),8],[t(48),7],[t(47),7],[t(46),6],[t(45),6],[t(44),6],[t(43),6],[t(42),5],[t(41),5],[t(40),4],[t(39),4],[t(38),5],[t(37),5],[t(36),5],[t(35),7],[t(34),7],[t(33),7],[t(32),10],[t(31),9],[t(30),9],[t(29),10],[t(28),11],[t(27),11],[t(26),8],[t(25),8],[t(24),7],[t(23),8],[t(22),9],[t(21),8],[t(20),9],[t(19),10],[t(18),9],[t(17),10],[t(16),16],[t(15),17],[t(14),16],[t(13),17],[t(12),16],[t(11),15],[t(10),14],[t(9),24],[t(8),18],[t(7),15],[t(6),14],[t(5),16],[t(4),16],[t(3),17],[t(2),7],[t(1),7],[t(0),7]]}
                    ,{
                        key:"Page Views",
                        color:COLOR_BLUE,
                        values:[[t(77),14],[t(76),13],[t(75),15],[t(73),14],[t(72),13],[t(71),15],[t(70),16],[t(69),16],[t(68),14],[t(67),14],[t(66),13],[t(65),12],[t(64),13],[t(63),13],[t(62),15],[t(61),16],[t(60),16],[t(59),17],[t(58),17],[t(57),18],[t(56),15],[t(55),15],[t(54),15],[t(53),19],[t(52),19],[t(51),18],[t(50),18],[t(49),17],[t(48),16],[t(47),18],[t(46),18],[t(45),18],[t(44),16],[t(43),14],[t(42),14],[t(41),13],[t(40),14],[t(39),13],[t(38),10],[t(37),9],[t(36),10],[t(35),11],[t(34),11],[t(33),11],[t(32),10],[t(31),9],[t(30),10],[t(29),13],[t(28),14],[t(27),14],[t(26),13],[t(25),12],[t(24),11],[t(23),13],[t(22),13],[t(21),13],[t(20),13],[t(19),14],[t(18),13],[t(17),13],[t(16),19],[t(15),21],[t(14),22],[t(13),25],[t(12),24],[t(11),24],[t(10),22],[t(9),16],[t(8),15],[t(7),12],[t(6),12],[t(5),15],[t(4),15],[t(3),15],[t(2),18],[t(2),18],[t(0),17]]
                    }];
                nv.addGraph(function(){
                    var t=nv.models.stackedAreaChart().useInteractiveGuideline(!0).x(function(t){
                        return t[0]}).y(function(t){return t[1]}).pointSize(.5).margin({left:35,right:25,top:20,bottom:20}).controlLabels({stacked:"Stacked"}).showControls(!1).duration(300);return t.xAxis.tickFormat(function(t){
                            var e=["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];return t=new Date(t),t=e[t.getMonth()]+" "+t.getDate()}),t.yAxis.tickFormat(d3.format(",.0f")),d3.select("#visitors-line-chart").append("svg").datum(e).transition().duration(1e3).call(t).each("start",function(){setTimeout(function(){d3.selectAll("#visitors-line-chart *").each(function(){this.__transition__&&(this.__transition__.duration=1)})},0)}),nv.utils.windowResize(t.update),t})
        }
        handleVisitorsAreaChart();

        //calender
        var handleScheduleCalendar=function(){
            var t=["January","February","March","April","May","June","July","August","September","October","November","December"],
                e=["S","M","T","W","T","F","S"],
                r=new Date,n=r.getMonth()+1,o=r.getFullYear(),a=[["2/"+n+"/"+o,"Popover Title","#",COLOR_GREEN,"Some contents here"],["5/"+n+"/"+o,"Tooltip with link","#",COLOR_BLACK],["18/"+n+"/"+o,"Popover with HTML Content","#",COLOR_BLACK,'Some contents here <div class="text-right"><a href="http://www.google.com">view more >>></a></div>'],["28/"+n+"/"+o,"Color Admin V1.3 Launched","http://www.seantheme.com/color-admin-v1.3",COLOR_BLACK]],i=$("#schedule-calendar");$(i).calendar({months:t,days:e,events:a,popover_options:{placement:"top",html:!0}}),$(i).find("td.event").each(function(){var t=$(this).css("background-color");$(this).removeAttr("style"),$(this).find("a").css("background-color",t)}),$(i).find(".icon-arrow-left, .icon-arrow-right").parent().on("click",function(){$(i).find("td.event").each(function(){var t=$(this).css("background-color");$(this).removeAttr("style"),$(this).find("a").css("background-color",t)})})
        }

        handleScheduleCalendar();
    })
</script>
