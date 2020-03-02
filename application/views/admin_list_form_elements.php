
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
      <div class="row">
        <div class="col-md-6">


          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">የአባልነት ደረጃ</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-hover">
                <tr>
                    <td><input type="text" class="form-control input-sm" name="job_type_input"></td>
                    <td style="text-align: center"><input type="submit" class="btn btn-primary btn-sm" value="መዝግብ"></td>
                </tr>
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
                <tr>
                    <td><input type="text" class="form-control input-sm" name="job_type_input"></td>
                    <td style="text-align: center"><input type="submit" class="btn btn-primary btn-sm" value="መዝግብ"></td>
                </tr>
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
                <tr>
                    <td><input type="text" class="form-control input-sm" name="job_type_input"></td>
                    <td style="text-align: center"><input type="submit" class="btn btn-primary btn-sm" value="መዝግብ"></td>
                </tr>
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
                <tr>
                    <td><input type="text" class="form-control input-sm" name="job_type_input"></td>
                    <td style="text-align: center"><input type="submit" class="btn btn-primary btn-sm" value="መዝግብ"></td>
                </tr>
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
