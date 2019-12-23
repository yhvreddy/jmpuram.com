<!-- Container fluid  -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Gallery</a></li>
        <li class="breadcrumb-item active">Setup</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Gallery Setup <small></small></h1>
    <!-- end page-header -->
    <!-- Start Page Content -->
    <div class="row">
        
        <div class="col-sm-12 col-md-12 col-lg-12">

            <div class="row">
                <div class="col-md-5">
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                            </div>
                            <h4 class="panel-title">Upload types</h4>
                        </div>
                        <div class="panel-body">
                            <form method="post" action="<?=base_url('dashboard/gallery/savesetup')?>">
                                <div class="form-group col-md-12">
                                    <label>Enter upload types</label>
                                    <input type="text" placeholder="Enter upload Type" required name="uploadtype" class="form-control">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Comment / Information</label>
                                    <textarea placeholder="Type Information..." name="uploadnote" class="form-control"></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="submit" value="Save Data" name="uploadtypes" class="btn btn-success pull-right">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                            </div>
                            <h4 class="panel-title">Upload types</h4>
                        </div>
                        <div class="panel-body">
                            <?php if(count($gtypes) != 0){ ?>
                                <table id="myTable" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th width="4%">SNo</th>
                                        <th width="30%">Name</th>
                                        <th width="55%">Note</th>
                                        <th class="text-center" width="10%"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1; foreach ($gtypes as $gtype) { ?>
                                        
                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$gtype->name?></td>
                                            <td><?=$gtype->note?></td>
                                            <td align="center">
                                                <a href="javascript:;" data-toggle="modal" data-target="#EditFrontofficevisiter<?=$gtype->id?>" data-backdrop="static" data-keyboard="false" class="font-20"><i class="fa fa-edit fa-dx"></i></a>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div id="EditFrontofficevisiter<?=$gtype->id?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog modal-md">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit : <?=$gtype->name?></h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <form method="post" action="<?=base_url('dashboard/gallery/editsetup/'.$gtype->id);?>">
                                                                <div class="form-group col-md-12">
                                                                    <label>Enter upload types</label>
                                                                    <input type="text" placeholder="Enter upload Type" required name="uploadtype" class="form-control" value="<?=$gtype->name?>">
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label>Comment / Information</label>
                                                                    <textarea placeholder="Type Information..." name="uploadnote" class="form-control"><?=$gtype->note?></textarea>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="submit" value="Update Data" name="update" class="btn btn-success pull-right">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

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
             
    </div>
    <!-- End PAge Content -->
</div>
<!-- End Container fluid  -->