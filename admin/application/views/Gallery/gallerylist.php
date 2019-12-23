<!-- Container fluid  -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Gallery</a></li>
        <li class="breadcrumb-item active">Gallery list</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Gallery List <small></small></h1>
    <!-- end page-header -->
    <!-- Start Page Content -->
    <div class="row">
        
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                    </div>
                    <h4 class="panel-title">Uploaded Gallery List</h4>
                </div>
                <div class="panel-body">
                    <div class="col-md-12 table-responsive">
                        <?php if(count($gallerylists) != 0){ ?>
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th width="3%">SNo</th>
                                    <th with="10%">Type</th>
                                    <th width="30%">Event Title</th>
                                    <th width="5%">Uploads</th>
                                    <th width="47%">Note</th>
                                    <th class="text-center" width="12%"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; foreach ($gallerylists as $gallerylist) { ?>

                                    <tr>
                                        <td align="center"><?=$i++;?></td>
                                        <td>
                                            <?php
                                                $uploadtype =   $this->Model_default->selectconduction('jmp_upload_types',array('id'=>$gallerylist->upload_type));
                                                echo $uploadtype[0]->name;
                                            ?>
                                        </td>
                                        <td><a href="#"><?=$gallerylist->title?></a></td>
                                        <td>
                                            <?php
                                                $uploads =   $this->Model_default->selectconduction('jmp_gallery_files',array('event_id'=>$gallerylist->id));
                                            ?>
                                            <a href="#"><?=count($uploads).' uploads';?></a>
                                        </td>
                                        <td style="text-transform: capitalize"><?=substr($gallerylist->note,0,60)?>...</td>
                                        <td align="center">
                                            <a href="javascript:;" data-toggle="modal" data-target="#EditFrontofficevisiter<?=$gallerylist->id?>" data-backdrop="static" data-keyboard="false" class="font-20"><i class="fa fa-edit fa-dx"></i></a>
                                            &nbsp;
                                            <a href="javascript:;" data-toggle="modal" data-target="#EditFrontofficevisiter<?=$gallerylist->id?>" data-backdrop="static" data-keyboard="false" class="font-20"><i class="fa fa-eye fa-dx"></i></a>
                                            &nbsp;
                                            <a href="<?=base_url('dashboard/gallery/gallerydelete/'.$gallerylist->id)?>" onclick="return confirm('Are you want to delete <?=$gallerylist->title?>..!')" class="font-20"><i class="fa fa-trash-o fa-dx"></i></a>
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