<!-- Container fluid  -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Events</a></li>
        <li class="breadcrumb-item active">Events list</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Events List <small></small></h1>
    <!-- end page-header -->
    <!-- Start Page Content -->
    <div class="row">
        
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                    </div>
                    <h4 class="panel-title">Events List</h4>
                </div>
                <div class="panel-body">
                    <div class="col-md-12 table-responsive">
                        <?php if(count($events) != 0){ ?>
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th width="3%">SNo</th>
                                    <th with="30%">Event title</th>
                                    <th width="12%">Date form</th>
                                    <th width="10%">Date To</th>
                                    <th width="35%">Note</th>
                                    <th class="text-center" width="6%"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; foreach ($events as $event) { ?>

                                    <tr>
                                        <td align="center"><?=$i++;?></td>
                                        <td><a href="#"><?=$event->title?></a></td>
                                        <td><?=date('d-m-Y',strtotime($event->start))?></td>
                                        <td><?=date('d-m-Y',strtotime($event->end))?></td>
                                        <td style="text-transform: capitalize"><?=substr($event->note,0,60)?>...</td>
                                        <td align="center">
                                            <a href="<?=base_url('dashboard/gallery/gallerydelete/'.$event->id)?>" onclick="return confirm('Are you want to delete <?=$event->title?>..!')" class="font-20"><i class="fa fa-trash-o fa-dx"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        <?php }else{ ?>
                            <?= $this->Model_dashboard->norecords(); ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>     
        
    </div>
    <!-- End PAge Content -->
</div>
<!-- End Container fluid  -->

<script>
    $(document).ready(function(){
        //$("#uploadbox").hide();
        $('#uploadtype').on('change',function(){
            var uptype = $(this).val();
            //alert(uptype);
            if(uptype == 1){
                $("#uploadbox").show();
                $('#uploadtypes').attr('accept','.jpg,.png,.JPEG,.jpeg');
                //document.getElementById("uploadtypes").disabled = true;
                //$('#uploadtypes').removeAttr('disabled');
                $("#uploadtypes").change(function(){
                     $('#image_preview').html("");
                     var total_file=document.getElementById("uploadtypes").files.length;
                     for(var i=0;i<total_file;i++)
                     {
                      $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");
                     }
                });
            }else if(uptype == 2){
                $("#uploadbox").show();
                $('#image_preview').html("");
                $('#uploadtypes').attr('accept','.mp4,.avi,.wmv,.vob');
                //$('#uploadtypes').removeAttr('disabled');
            }else if(uptype == 3){
                $("#uploadbox").show();
                $('#image_preview').html("");
                $('#uploadtypes').attr('accept','.jpg,.png,.JPEG,.jpeg,.mp4,.avi,.wmv,.vob');
                //$('#uploadtypes').removeAttr('disabled');
            }else if(uptype == ''){
                $('#uploadtypes').removeAttr('accept');
                /*$("#uploadbox").hide();
                $('#uploadtypes').val(null);
                document.getElementById("uploadtypes").value = null;*/
                $('#image_preview').html("");
                alert('Please select upload type');
            }
        })
        
        //$('#uploadtypes').Attr('disabled');
        //document.getElementById("uploadtypes").disabled = true;


        
    })
</script>