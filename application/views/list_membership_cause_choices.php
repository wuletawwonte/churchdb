



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        አባል የሆኑበት ሁኔታ 
        <small>አባል የሆኑበት ሁኔታ የሚሞላው ፎርም ውስጥ ያሉ አማራጮች</small>
      </h1>
      <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> ዳሽቦርድ  </a></li>
          <li class="active"><a href="<?= base_url(); ?>admin/listformelements"> የቅፅ ማስተካከያ </a></li>
          <li class="active"> አባል የሆኑበት ሁኔታ </li>
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
        <div class="col-md-12">


          <div class="box box-primary">
            <div class="box-header with-border">
                <div class="form-group">
                    <form method="POST" action="<?= base_url('admin/addmembershipcausechoice'); ?>">
                        <div class="col-md-5">
                            <input type="text" placeholder="አባል የሆኑበት ሁኔታ" name="membership_cause_title" maxlength="48"  class="form-control" required>
                        </div>
                        <div class="col-md-2">
                            <input type="submit" class="btn btn-primary btn-flat" name="" value="<?= lang('save') ?>">
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <?php foreach($membership_cause_choices as $choice) { ?>
                        <tr>
                            <td>
                                <?= $choice['membership_cause_title']; ?>
                            </td>
                            <td style="text-align: center">
                                <a data-toggle="modal" href="#editMCause<?= $choice['membership_cause_id']; ?>" ><i class="fa fa-pencil"  style="color: #00c0ef;" aria-hidden="true"></i></a>
                                <a data-toggle="modal" href="#deleteMCause<?= $choice['membership_cause_id']; ?>" ><i class="fa fa-trash"  style="color: #dd4b39;" aria-hidden="true"></i></a>



                                    <div id="editMCause<?= $choice['membership_cause_id']?>" class="modal fade" role="dialog">
                                      <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                          <div class="modal-header" align="left">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">አባል የሆኑበት ሁኔታ  ማስተካከያ</h4><p>እባክዎ በጥንቃቄ ይሙሉ</p>
                                          </div>
                                          <div class="modal-body">
                                            <div class="row">
                                                <form method="POST" action="<?= base_url('admin/editmembershipcausechoice'); ?>" id="#editForm<?= $choice['membership_cause_id']; ?>">
                                                    <input type="text" name="membership_cause_old_title" value="<?= $choice['membership_cause_title']; ?>" hidden>
                                                    <div class="col-md-5">
                                                        <input type="text" name="membership_cause_new_title" maxlength="48" value="<?= $choice['membership_cause_title']; ?>" class="form-control" required>
                                                    </div>
                                                </form>
                                            </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">ይቅር</button>
                                            <input type="submit" form="#editForm<?= $choice['membership_cause_id']; ?>" class="btn btn-info btn-flat" name="" value="አስተካክል">
                                          </div>
                                        </div>

                                      </div>
                                    </div>




                                    <div id="deleteMCause<?= $choice['membership_cause_id']?>" class="modal modal-danger fade" role="dialog">
                                      <div class="modal-dialog modal-sm">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                          <div class="modal-header" align="left">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">እርግጠኛ ኖት?</h4><p>መልሶ ማስተካከል አይቻልም</p>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">አይ</button>
                                            <a href="<?= base_url(); ?>admin/deletemembershipcause/<?= $choice['membership_cause_id']; ?>" class="btn btn-danger">አዎ</a>
                                          </div>
                                        </div>

                                      </div>
                                    </div>                            

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
