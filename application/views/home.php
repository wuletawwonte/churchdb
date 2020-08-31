<script type="text/javascript" src="<?= base_url('assets/vendors/chartjs/Chart.min.js'); ?>" ></script>



<style type="text/css">

.profile-image {
  width: 70px;
  height: 70px;
  border-radius: 50%;
  padding: 2px;
  border: 2px solid #d2d6de;
  font-size: 25px;
  color: #fff;
  text-align: center;
  line-height: 70px;
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
            <div class="box box-info">
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
                        <li style="padding-left: 0px; padding-right: 0px;">
                            <a href="<?= base_url('admin/memberdetails/'.$member['id']); ?>">
                                <?php if($member['avatar'] == NULL) { ?>
                                    <div class="profile-image">
                                        <div style="width: 100%; height: 100%; border-radius: 50%; background: <?= $member['profile_color']; ?>">
                                            <b><?= mb_substr($member['firstname'], 0, 1).mb_substr($member['middlename'], 0, 1); ?></b>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <div>
                                        <img class="img-circle" style="border: 2px solid <?= $member['profile_color']; ?>;padding: 2px;height: 70px; width: 70px;" src="<?= base_url(); ?>assets/avatars/<?= $member['avatar']?>">
                                    </div>
                                <?php } ?>

                            </a>
                            <span class="user-details"><?= $member['firstname'].' '.$member['middlename']; ?></span>
                            <span class="users-list-date"><?= timespan(human_to_unix($member['created']), null, 1).' በፊት'; ?>&nbsp;</span>
                        </li>
                        <?php } ?>
                    </ul>
                    <!-- /.users-list -->
                </div>
                <div class="box-footer text-center">
                  <a href="<?= base_url(); ?>admin/listmembers" class="uppercase">ወደ ምዕመናን ሁሉ</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"> የአባልነት ደራጃ ተዋፅኦ </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="col-md-7">
                        <div class="chart-responsive">
                            <canvas id="pieChart" height="160" width="207" style="width: 207px; height: 160px;"></canvas>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <ul class="chart-legend clearfix">
                        <?php foreach($membership_levels as $membership_level) { ?>
                            <li><i class="fa fa-circle-o" style="color: <?= $membership_level['color']; ?>;"></i> <?= $membership_level['title']; ?> </li>
                        <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

            <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="fa fa-female"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"> ሴት </span>
                    <span class="info-box-number"><?= $gender_count['female']; ?></span>

                    <div class="progress">
                        <div class="progress-bar" style="width: <?php echo ($gender_count['female']/$total_members)*100; ?>%"></div>
                    </div>
                    <span class="progress-description">
                        በፐርሰንት ሲቀመጥ፡ <?php echo round(($gender_count['female']/$total_members)*100); ?>%
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <div class="info-box bg-purple">
                <span class="info-box-icon"><i class="fa fa-male"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"> ወንድ </span>
                    <span class="info-box-number"><?= $gender_count['male']; ?></span>

                    <div class="progress">
                        <div class="progress-bar" style="width: <?php echo ($gender_count['male']/$total_members)*100; ?>%"></div>
                    </div>
                    <span class="progress-description">
                        በፐርሰንት ሲቀመጥ፡ <?php echo round(($gender_count['male']/$total_members)*100); ?>%
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
    </div>



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




<script type="text/javascript">
  $(document).ready(function () {


    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
    <?php foreach($membership_levels as $membership_level) { ?>
      {
        value    : <?= $membership_level['count']?>,
        color    : '<?= $membership_level['color']?>',
        highlight: '<?= $membership_level['color']?>',
        label    : "<?= $membership_level['title']?>"
      },
    <?php } ?>
    ]
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)



  });
</script>






