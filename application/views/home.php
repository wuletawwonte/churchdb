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
    <div class="col-lg-7">
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
                            <a href="<?= base_url('admin/memberdetails/'.$member['id']); ?>"><div class="profile-image" style="background: <?= $member['profile_color']; ?>"><b><?= mb_substr($member['firstname'], 0, 1).mb_substr($member['middlename'], 0, 1); ?></b></div></a>
                            <span class="user-details"><?= $member['firstname'].' '.$member['middlename']; ?></span>
                            <span class="users-list-date">04/15/2017&nbsp;</span>
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


    <div class="col-lg-5">
      <!-- DONUT CHART -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Donut Chart</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <canvas id="pieChart" style="height:250px"></canvas>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
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
      {
        value    : 700,
        color    : '#f56954',
        highlight: '#f56954',
        label    : 'Chrome'
      },
      {
        value    : 500,
        color    : '#00a65a',
        highlight: '#00a65a',
        label    : 'IE'
      },
      {
        value    : 400,
        color    : '#f39c12',
        highlight: '#f39c12',
        label    : 'FireFox'
      },
      {
        value    : 600,
        color    : '#00c0ef',
        highlight: '#00c0ef',
        label    : 'Safari'
      },
      {
        value    : 300,
        color    : '#3c8dbc',
        highlight: '#3c8dbc',
        label    : 'Opera'
      },
      {
        value    : 100,
        color    : '#d2d6de',
        highlight: '#d2d6de',
        label    : 'Navigator'
      }
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
      animateScale         : false,
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






