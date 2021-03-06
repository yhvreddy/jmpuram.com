<link href="<?=base_url()?>assets/plugins/fullcalendar/fullcalendar.print.css" rel="stylesheet" media='print' />
<link href="<?=base_url()?>assets/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" />
<style>
    .fc-button{
        background: black !important;
        color: white !important;
    }
</style>
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
        <li class="breadcrumb-item active">Events Calendar</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Events Calendar <small></small></h1>
    <!-- end page-header -->
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                    <h4 class="panel-title">Events Calendar</h4>
                </div>
                <div class="panel-body">
                    <div id="calendar"></div>
                </div>

                <!-- BEGIN MODAL -->
                <div class="modal none-border" id="my-event">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"><strong>Add Event</strong></h4>
                            </div>
                            <div class="modal-body"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                                <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Add Category -->
                <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form class="form-horizontal" method="POST" action="<?=base_url('dashboard/events/saveevents')?>" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Add Event</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body row">

                                    <div class="form-group col-md-12">
                                        <label for="title" class="control-label">Event Title</label>
                                        <input type="text" name="title" class="form-control" id="title" placeholder="Event Title">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="eventdescription" class="control-label">Event Description</label>
                                        <textarea type="text" rows="3" name="eventdescription" class="form-control" id="eventdescription" placeholder="Event Description"></textarea>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="color" class="control-label">Color</label>
                                                <select name="color" class="form-control" id="color">
                                                    <option value="">Choose</option>
                                                    <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
                                                    <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
                                                    <option style="color:#008000;" value="#008000">&#9724; Green</option>
                                                    <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                                                    <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                                                    <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
                                                    <option style="color:#000;" value="#000">&#9724; Black</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="start" class="control-label">Start date</label>
                                                <input type="text" name="start" class="form-control" id="start" readonly>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="end" class="control-label">End date</label>
                                                <input type="text" name="end" class="form-control" id="end" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label> Upload cover image</label>
                                        <input type="file" name="uploadsource" id="uploadtypes" class="form-control dropify" ac accept=".jpg,.png,.jpeg">
                                    </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END MODAL -->

                <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form class="form-horizontal" method="POST" action="<?=base_url('dashboard/academiccalendar/calendareditEvent')?>">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Edit Event</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body row">

                                    <input type="hidden" name="id" class="form-control" id="id">
                                    <div class="form-group col-md-12">
                                        <label for="title" class="control-label">Event Title</label>
                                        <input type="text" name="title" class="form-control" id="title" placeholder="Event Title">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="eventdescription" class="control-label">Event Description</label>
                                        <textarea type="text" name="eventdescription" class="form-control" id="eventdescription" placeholder="Event Description"></textarea>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="color" class="control-label">Color</label>
                                        <select name="color" class="form-control" id="color">
                                            <option value="">Choose</option>
                                            <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
                                            <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
                                            <option style="color:#008000;" value="#008000">&#9724; Green</option>
                                            <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                                            <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                                            <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
                                            <option style="color:#000;" value="#000">&#9724; Black</option>

                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="checkbox checkbox-css">
                                                    <input type="checkbox" id="cssCheckbox1" value="yes" name="delete">
                                                    <label for="cssCheckbox1">Delete This Event..!</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Edit Event Details</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
        <!--<div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Upcomming Events</h4>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
    </div>
    <!-- End PAge Content -->
</div>
<!-- End Container fluid  -->
<script src="<?=base_url()?>assets/plugins/fullcalendar/lib/moment.min.js"></script>
<script src="<?=base_url()?>assets/plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="<?=base_url()?>assets/js/demo/calendar.demo.min.js"></script>
<script>
    $(document).ready(function () {
        //Calendar.init();
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listMonth'
            },
            defaultDate: Date('Y-m'),
            navLinks: true, // can click day/week names to navigate views
            selectable: true,
            selectHelper: true,
            select: function(start, end) {
                $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                $('#ModalAdd').modal({backdrop: 'static', keyboard: false});
                $('#ModalAdd').modal('show');
            },
            eventRender: function(event, element) {
                element.bind('dblclick', function() {
                    $('#ModalEdit #id').val(event.id);
                    $('#ModalEdit #eventdescription').val(event.eventdescription);
                    $('#ModalEdit #title').val(event.title);
                    $('#ModalEdit #color').val(event.color);
                    $('#ModalEdit').modal({backdrop: 'static', keyboard: false});
                    $('#ModalEdit').modal('show');
                });
            },
            eventDrop: function(event, delta, revertFunc) {
                edit(event);
            },
            eventResize: function(event,dayDelta,minuteDelta,revertFunc) {
                edit(event);
            },
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [
                <?php foreach($events as $event){

                $start = explode(" ", $event->start);
                $end = explode(" ", $event->end);
                if($start[1] == '00:00:00'){
                    $start = $start[0];
                }else{
                    $start = $event->start;
                }
                if($end[1] == '00:00:00'){
                    $end = $end[0];
                }else{
                    $end = $event->end;
                }
                ?>
                {
                    id: '<?php echo $event->id; ?>',
                    title: '<?php echo $event->title; ?>',
                    start: '<?php echo $start; ?>',
                    end: '<?php echo $end; ?>',
                    color: '<?php echo $event->color; ?>',
                    eventdescription:'<?=$event->note?>',
                },
                <?php } ?>
            ]
        });
    });

    function edit(event){
        start = event.start.format('YYYY-MM-DD HH:mm:ss');
        if(event.end){
            end = event.end.format('YYYY-MM-DD HH:mm:ss');
        }else{
            end = start;
        }

        id =  event.id;

        Event = [];
        Event[0] = id;
        Event[1] = start;
        Event[2] = end;

        $.ajax({
            url: '<?=base_url("dashboard/academiccalendar/changeEventdates");?>',
            type: "POST",
            data: {Event:Event},
            success: function(rep) {
                console.log(rep);
                if(rep.key == 1){
                    alert(rep.msg);
                }else{
                    alert(rep.msg);
                }
            }
        });
    }

</script>