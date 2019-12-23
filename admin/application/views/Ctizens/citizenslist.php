<!-- Container fluid  -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Citizens</a></li>
        <li class="breadcrumb-item active">Citizens list</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Citizens List <small></small></h1>
    <!-- end page-header -->
    <!-- Start Page Content -->
    <div class="row">
        
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                    </div>
                    <h4 class="panel-title">Citizens List</h4>
                </div>
                <div class="panel-body">
                    <div class="col-md-12 table-responsive">
                        <?php if(count($citizenslists) != 0){ ?>
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>SNo</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>eMail</th>
                                    <th>Dob</th>
                                    <th>Aadhaar</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; foreach ($citizenslists as $citizen) { ?>

                                    <tr style="color: <?php if($citizen->in_organization == 1){ ?> green; <?php } ?>" >
                                        <td align="center"><?=$i++;?></td>
                                        <td><?=$citizen->first_name.'.'.$citizen->last_name?></td>
                                        <td><?=$citizen->mobile?></td>
                                        <td><?=$citizen->email?></td>
                                        <td><?=$citizen->dob?></td>
                                        <td><?=$citizen->addhaar_num?></td>
                                        <td align="center">
                                            <?php $session = $this->session->userdata;
                                                if(isset($session['role']) && $session['role']==0){
                                                    if($citizen->in_organization == 0){ ?>
                                                        <a href="<?=base_url('dashboard/citizens/citizentoorg/'.$citizen->id)?>" onclick="return confirm('Are you want to add <?=$citizen->first_name?> to Organization..!')" data-keyboard="false" class="font-20"><i class="fa fa-user-plus fa-dx"></i></a>&nbsp;
                                            <?php }else{ ?>
                                                    <a href="<?=base_url('dashboard/citizens/citizentounorg/'.$citizen->id)?>" onclick="return confirm('Are you want to remove <?=$citizen->first_name?> from Organization..!')" data-keyboard="false" class="font-20"><i class="fa fa-user-times fa-dx text-danger"></i></a>&nbsp;&nbsp;
                                            <?php } } ?>
                                            <a href="javascript:;" data-toggle="modal" data-target="#EditFrontofficevisiter<?=$citizen->id?>" data-backdrop="static" data-keyboard="false" class="font-20"><i class="fa fa-edit fa-dx"></i></a>
                                            &nbsp;
                                            <a href="javascript:;" data-toggle="modal" data-target="#EditFrontofficevisiter<?=$citizen->id?>" data-backdrop="static" data-keyboard="false" class="font-20"><i class="fa fa-eye fa-dx"></i></a>
                                            &nbsp;
                                            <a href="<?=base_url('dashboard/gallery/gallerydelete/'.$citizen->id)?>" onclick="return confirm('Are you want to delete <?=$citizen->first_name?>')" class="font-20"><i class="fa fa-trash-o fa-dx"></i></a>
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