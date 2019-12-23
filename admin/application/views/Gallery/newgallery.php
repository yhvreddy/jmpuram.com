<!-- Container fluid  -->
<style>
    .dropify-wrapper{
        height: 35px !important;
        font-size:15px !important;
    }
    .dropify-message{
        padding-bottom: 8px;
    }
    .dropify-wrapper .dropify-message span.file-icon {
        font-size: 20px;
        display: initial;
    }
    .dropify-message p{
        margin: 0px !important;
        font-size: 6px;
        line-height: 1px;
    }
    .dropify-font:before{

    }
</style>
<style type="text/css">
    input[type=file]{
      display: inline;
    }
    #image_preview{

    }
    #image_preview img{
      width: 100px;
      padding: 5px;
    }
</style>

<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Gallery</a></li>
        <li class="breadcrumb-item active">New Gallery</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">New Gallery <small></small></h1>
    <!-- end page-header -->
    <!-- Start Page Content -->
    <div class="row">
        
        <div class="col-md-8">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                    </div>
                    <h4 class="panel-title">Upload New Gallery</h4>
                </div>
                <div class="panel-body">
                    <div class="form-group ">
                        <form method="post" class="row" action="<?=base_url('dashboard/gallery/savegallery')?>" enctype="multipart/form-data">
                            <div class="col-md-4">
                                <label>select upload type</label>
                                <select class="form-control select2" required="required" id="uploadtype" name="uploadtype">
                                    <option value="">Select upload type</option>
                                    <?php $i=1; foreach ($gtypes as $gtype) { ?>
                                        <option value="<?=$gtype->id?>"><?=$gtype->name?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-8">
                                <label>Enter Event Title</label>
                                <input type="text" placeholder="Enter Event Title.." required name="uploadtitle" class="form-control">
                            </div>
                            
                            <div class="col-md-12 mt-2 mb-2">
                                <label>Comment / Information</label>
                                <textarea rows="5" placeholder="Type Information..." name="uploadnote" class="form-control"></textarea>
                            </div>
                            
                            <div class="col-md-3">
                                <label>Event Date</label>
                                <input type="text"  placeholder="Pick event date" required name="eventdate" class="form-control mydatepicker">
                            </div>
                            
                            <div class="col-md-4" id="uploadbox">
                                <label>uploads Images</label>
                                <input type="file"  placeholder="Enter Event Title.." required name="uploadsource[]" id="uploadtypes" class="form-control dropify" multiple>
                            </div>
                            
                            <div class="col-md-5">
                                <label>Link Events</label>
                                <select class="form-control select2" multiple name="eventslink[]">
                                    <option value="">link Events</option>
                                    <?php foreach($gevents as $gevent){ ?>
                                        <option value="<?=$gevent->id?>"><?=$gevent->title?></option> 
                                    <?php } ?>
                                </select>
                            </div>
                            
                            
                            <div id="image_preview" class="col-md-12 mt-2"></div>
                            
                            <div class="col-md-12 mt-2">
                                <input type="submit" value="Save Data" name="uploadingtypes" class="btn btn-success pull-right">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                    </div>
                    <h4 class="panel-title">Recent Uploads</h4>
                </div>
                <div class="panel-body">
                    <?php if(count($gtypes) != 0){ ?>
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>SNo</th>
                                <th>Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach ($gtypes as $gtype) { ?>

                                <tr>
                                    <td><?=$i++;?></td>
                                    <td><?=$gtype->name?></td>
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