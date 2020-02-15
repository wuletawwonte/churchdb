<script type="text/javascript" src="<?= base_url('assets/vendors/chartjs/Chart.min.js'); ?>" ></script>



<style type="text/css">

.profile-image {
  width: 75px;
  height: 75px;
  border-radius: 50%;
  border: 3px solid #d2d6de;
  font-size: 30px;
  color: #fff;
  text-align: center;
  line-height: 75px;
  margin: 0 auto; 
}

</style>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= lang('welcome') ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Home</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">











      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p><?= lang('website_hits') ?></p>
            </div>
            <div class="icon">
              <i class="fa fa-globe"></i>
            </div>
            <a href="#" class="small-box-footer"><?= lang('more_info') ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $total_families; ?></h3>

              <p><?= lang('families') ?></p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?= base_url('admin/listfamilies'); ?>" class="small-box-footer"><?= lang('more_info') ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $total_members; ?></h3>

              <p><?= lang('members') ?></p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="<?= base_url('admin/listmembers'); ?>" class="small-box-footer"><?= lang('more_info') ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $total_groups; ?></h3>

              <p><?= lang('groups') ?></p>
            </div>
            <div class="icon">
              <i class="fa fa-tag"></i>
            </div>
            <a href="<?= base_url('admin/listgroups'); ?>" class="small-box-footer"><?= lang('more_info') ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->





<div class="row">
    <div class="col-lg-6">
        <div class="box box-solid">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= lang('latest_members'); ?></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <ul class="users-list clearfix">
                            <?php foreach($latest_members as $member) { ?>
                            <li>
                                <a href="<?= base_url('admin/memberdetails/'.$member['id']); ?>"><div class="profile-image" style="background: <?= $member['profile_color']; ?>"><?= $member['firstname'][0].$member['middlename'][0]; ?></div></a>
                                <span class="user-details"><?= $member['firstname'].' '.$member['middlename']; ?></span>
                                <span class="users-list-date">04/15/2017&nbsp;</span>
                            </li>
                            <?php } ?>
                    </ul>
                    <!-- /.users-list -->
                </div>
            </div>
        </div>
    </div>
</div>









    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->











