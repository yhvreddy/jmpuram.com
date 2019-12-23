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
        <li class="breadcrumb-item"><a href="javascript:;">Citizens</a></li>
        <li class="breadcrumb-item active">New citizen</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">New citizen <small></small></h1>
    <!-- end page-header -->
    <!-- Start Page Content -->
    <div class="row">
        
        <div class="col-md-8">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                    </div>
                    <h4 class="panel-title">New citizen</h4>
                </div>
                <div class="panel-body">
                    <div class="">
                        <form method="post" class="row" action="<?=base_url('dashboard/citizens/savecitizen')?>" enctype="multipart/form-data">
                            <div class="col-md-4 form-group">
                                <label>Enter First Name</label>
                                <input type="text" class="form-control" placeholder="Enter First name" name="first_name" required="required">
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Enter Middel Name</label>
                                <input type="text" placeholder="Enter Middel Name" name="middel_name" class="form-control">
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Enter Last Name</label>
                                <input type="text" placeholder="Enter last Name" name="last_name" class="form-control">
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Enter Father Name</label>
                                <input type="text" placeholder="Enter Father Name" name="father_name" class="form-control">
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Enter Mother Name</label>
                                <input type="text" placeholder="Enter Mother Name" name="mother_name" class="form-control">
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Enter Mobile Number</label>
                                <input type="text" id="Mobileno" placeholder="Enter mobile number" name="mobile" class="form-control" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Enter mail id</label>
                                <input type="email" placeholder="Enter email id" name="email_id" class="form-control">
                            </div>
                            <div class="col-md-3 form-group">
                                <label>Pick Dateofbirth</label>
                                <input type="text" placeholder="Pick dateofbirth" name="eventdate" class="form-control mydatepicker">
                            </div>
                            <div class="col-md-3 form-group">
                                <label>Enter age</label>
                                <input type="number" min="1" placeholder="Enter age" name="age" class="form-control">
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Enter Qualification</label>
                                <input type="text" placeholder="Enter Qualification" name="qualification" class="form-control">
                            </div>
                            
                            <div class="col-md-4 form-group">
                                <label>Enter Professional</label>
                                <input type="text" placeholder="Enter Professional" name="professional" class="form-control">
                            </div>
                            
                            <div class="col-md-4 form-group">
                                <label>Enter Rationcard num</label>
                                <input type="text" placeholder="Enter rationcard num" name="rationcard_num" class="form-control">
                            </div>
                            
                            <div class="col-md-4 form-group">
                                <label>Enter Pancard</label>
                                <input type="text" placeholder="Enter pancard" name="pancard" class="form-control">
                            </div>
                            
                            <div class="col-md-4 form-group">
                                <label>Enter Addhaar Number</label>
                                <input type="text" placeholder="Enter addhaar number" name="addhaar_num" class="form-control">
                            </div>
                            
                            <div class="col-md-4 form-group">
                                <label>Select Married / Unmarried</label>
                                <select class="form-control select2" name="marriedtype">
                                    <option value="">select married / unmarried</option>
                                    <option value="married">Married</option>
                                    <option value="unmarried">Un Married</option>
                                </select>
                            </div>
                            
                            
                            <div class="col-md-4 form-group" id="uploadbox">
                                <label>uploads Image</label>
                                <input type="file"  placeholder="Enter Event Title.." name="uploadsource" id="uploadtypes" class="form-control dropify">
                            </div>
                            
                            <div class="col-md-12 mt-2 mb-2 form-group">
                                <label>Comment / Information</label>
                                <textarea rows="5" placeholder="Type Information..." name="uploadnote" class="form-control"></textarea>
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