



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        የአገልግሎት ዘርፍ
        <small>የአገልግሎት ዘርፍ የሚሞላው ፎርም ውስጥ ያሉ አማራጮች</small>
      </h1>
      <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> ዳሽቦርድ  </a></li>
          <li class="active"><a href="<?= base_url(); ?>admin/listformelements"> የቅፅ ማስተካከያ </a></li>
          <li class="active"> የአገልግሎት ዘርፍ </li>
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
                    <form method="POST" action="<?= base_url('admin/addministrychoice'); ?>">
                        <div class="col-md-5">
                            <input type="text" placeholder="የአገልግሎት ዘርፍ" name="ministry_title" maxlength="48"  class="form-control" required>
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
                    <?php foreach($ministries as $choice) { ?>
                        <tr>
                            <td>
                                <?= $choice['ministry_title']; ?>
                            </td>
                            <td style="text-align: center">
                                <a href="<?= base_url(); ?>admin/editministries"><i class="fa fa-pencil"  style="color: #00c0ef;" aria-hidden="true"></i></a>
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
