



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        የቅፅ ማስተካከያ 
        <small>የሚሞላው ፎርም ውስጥ ያሉ አማራጮች</small>
      </h1>
      <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> ዳሽቦርድ  </a></li>
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
        <div class="col-md-12">


          <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-large table-hover">
                <tr style="text-align:center;">
                    <td><a href="<?= base_url(); ?>admin/editmembershiplevels">የአባልነት ደረጃ</a></td>
                </tr>
                <tr style="text-align:center;">
                    <td><a href="<?= base_url(); ?>admin/editministries">የአገልግሎት ዘርፍ</a></td>
                </tr>
                <tr style="text-align:center;">
                    <td><a href="<?= base_url(); ?>admin/editmembershipcauses">አባል የሆኑበት ሁኔታ</a></td>
                </tr>
                <tr style="text-align:center;">
                    <td><a href="<?= base_url(); ?>admin/editkifleketemas">ክፍለ ከተማ</a></td>
                </tr>
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
