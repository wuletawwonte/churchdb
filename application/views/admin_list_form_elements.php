
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
                        <td style="text-align: center"> 
                            <a href="<?= base_url() ?>"><i class="fa fa-search-plus"></i></a>&nbsp;&nbsp;
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
                        <td style="text-align: center"> 
                            <a href="<?= base_url() ?>"><i class="fa fa-search-plus"></i></a>&nbsp;&nbsp;
                            <a href="<?= base_url(); ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;                            
                            <a href="<?= base_url(); ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>&nbsp;&nbsp;
                        </td>

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
                            <a href="<?= base_url() ?>"><i class="fa fa-search-plus"></i></a>&nbsp;&nbsp;
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
                            <a href="<?= base_url() ?>"><i class="fa fa-search-plus"></i></a>&nbsp;&nbsp;
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
