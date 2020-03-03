



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        የቅፅ ማስተካከያ 
        <small>የሚሞላው ፎርም ውስጥ ያሉ አማራጮች</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i> <?= lang('people'); ?></a></li>
        <li class="active"> የቅፅ ማስተካከያ </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">


         <?php if($this->session->flashdata('success')) { ?>
            <div class="callout callout-info">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php } else if($this->session->flashdata('error')) { ?>
            <div class="callout callout-danger">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php } ?>


      <div class="row">
        <div class="col-md-6">


          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">የአባልነት ደረጃ</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-hover">
                <form method="post" action="<?= base_url(); ?>admin/addmembershiplevelchoice">
                    <tr>
                        <td><input type="text" class="form-control input-sm" name="membership_level_title" required /></td>
                        <td style="text-align: center"><input type="submit" class="btn btn-primary btn-sm" value="መዝግብ"></td>
                    </tr>
                </form>
                <?php foreach($membership_levels as $membership_level) { ?>
                    <tr>
                        <td><?= $membership_level['membership_level_title']; ?></td>
                        <?php if($membership_level['membership_level_title'] != 'አልተመረጠም') { ?>
                            <td style="text-align: center"> 
                                <a href="<?= base_url(); ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;                            
                                <a data-toggle="modal" href="#myModal<?= $membership_level['membership_level_id']?>"><i class="fa fa-trash" style="color: #dd4b39;" aria-hidden="true"></i></a>&nbsp;&nbsp;


                                    <div id="myModal<?= $membership_level['membership_level_id']?>" class="modal fade" role="dialog">
                                      <div class="modal-dialog modal-sm">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                          <div class="modal-header" align="left">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">እርግጠኛ ኖት?</h4><p>መልሶ ማስተካከል አይቻልም</p>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">አይ</button>
                                            <a href="<?= base_url(); ?>admin/deletemembershiplevelchoice/<?= $membership_level['membership_level_id']; ?>" class="btn btn-primary">አዎ</a>
                                          </div>
                                        </div>

                                      </div>
                                    </div>




                            </td>
                        <?php } ?>
                    </tr>
                <?php } ?>
              </table>
            </div>
          </div>
          <!-- /.box -->



          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">የሥራ አይነት</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-hover">
                <form method="post" action="<?= base_url(); ?>admin/addjobtypechoice">
                    <tr>
                        <td><input type="text" class="form-control input-sm" name="job_type_title"></td>
                        <td style="text-align: center"><input type="submit" class="btn btn-primary btn-sm" value="መዝግብ"></td>
                    </tr>
                </form>
                <?php foreach($job_types as $job_type) { ?>
                    <tr>
                        <td><?= $job_type['job_type_title']; ?></td>
                        <?php if($job_type['job_type_title'] != 'አልተመረጠም') { ?>
                            <td style="text-align: center"> 
                                <a href="<?= base_url(); ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;                            
                                <a href="<?= base_url(); ?>admin/deletejobtypechoice/<?= $job_type['job_type_id']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>&nbsp;&nbsp;
                            </td>
                        <?php } ?>

                    </tr>
                <?php } ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-6">

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">አባል የሆኑበት ሁኔታ</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-hover">
                <form method="post" action="<?= base_url(); ?>admin/addmembershipcausechoice">
                    <tr>
                        <td><input type="text" class="form-control input-sm" name="membership_cause_title"></td>
                        <td style="text-align: center"><input type="submit" class="btn btn-primary btn-sm" value="መዝግብ"></td>
                    </tr>
                </form>
                <?php foreach($membership_causes as $membership_cause) { ?>
                    <tr>
                        <td><?= $membership_cause['membership_cause_title']; ?></td>
                        <td style="text-align: center"> 
                            <a href="<?= base_url(); ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;                            
                            <a href="<?= base_url(); ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>&nbsp;&nbsp;
                        </td>

                    </tr>
                <?php } ?>
              </table>
            </div>
          </div>
          <!-- /.box -->


          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">የአገልግሎት ዘርፍ</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-hover">
                <form method="post" action="<?= base_url(); ?>admin/addministrychoice">
                    <tr>
                        <td><input type="text" class="form-control input-sm" name="ministry_title"></td>
                        <td style="text-align: center"><input type="submit" class="btn btn-primary btn-sm" value="መዝግብ"></td>
                    </tr>
                </form>
                <?php foreach($ministries as $ministry) { ?>
                    <tr>
                        <td><?= $ministry['ministry_title']; ?></td>
                        <td style="text-align: center"> 
                            <a href="<?= base_url(); ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;                            
                            <a href="<?= base_url(); ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>&nbsp;&nbsp;
                        </td>

                    </tr>
                <?php } ?>
              </table>
            </div>
          </div>
          <!-- /.box -->


        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
