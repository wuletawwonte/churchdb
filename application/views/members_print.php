<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>General Report</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/bootstrap/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/font-awesome/css/font-awesome.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css'); ?>">

</head>
<body onload="window.print();">

	  <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper" style="margin-left: 0px;background-color: #fff; padding-top: 20px;">

	    <!-- Main content -->
	    <section class="invoice">
	      <!-- title row -->
	      <div class="row">
	        <div class="col-xs-12">
	          <h2 class="page-header">
	            <i class="fa fa-globe"></i> <?php echo $this->session->userdata('system_name'); ?>, Inc.
	            <small class="pull-right">Date: <?= date('M-d-Y'); ?></small>
	          </h2>
	        </div>
	        <!-- /.col -->
	      </div>
	  
	      <!-- Table row -->
	      <div class="row">
	        <div class="col-xs-12">
	          <table class="table table-striped">
	            <thead>
	            <tr>
	              <th>ስም</th>
	              <th>የአባት ስም</th>
	              <th>የአያት ስም</th>
	              <th>ፆታ</th>
	              <th>የተወለዱበት ቀን</th>
	              <th>እድሜ</th>
	              <th>የትውልድ ሥፍራ</th>
	              <th>የሞባይል ስልክ ቁጥር</th>
	              <th>ኢሜል</th>
	              <th>የሥራ አይነት</th>
	              <th>የመሥሪያ ቤቱ ስም</th>
	              <th>የመሥሪያ ቤት ስልክ ቁጥር</th>
	              <th>የቤተክርስትያኒቱ አባል የሆኑበት ዘመን</th>
	              <th>የቤተክርስትያኒቱ አባል የሆኑበት ሁኔታ</th>
	              <th>በቤተክርስትያኒቱ የአባልነት ደረጃ</th>
	              <th>የአገልግሎት ዘርፍ</th>
	              <th>የጋብቻ ሁኔታ</th>
	            </tr>
	            </thead>
	            <tbody>
	            <?php foreach($members as $member) { ?>
		            <tr>
						<td><?= $member['firstname']; ?></td>
						<td><?= $member['middlename']; ?></td>
						<td><?= $member['lastname']; ?></td>
						<td><?= $member['gender']; ?></td>
						<td><?= $member['birthdate']; ?></td>
						<td><?= $member['age']; ?></td>
						<td><?= $member['birth_place']; ?></td>
						<td><?= $member['mobile_phone']; ?></td>
						<td><?= $member['email']; ?></td>
						<td><?= $member['job_type']; ?></td>
						<td><?= $member['workplace_name']; ?></td>
						<td><?= $member['workplace_phone']; ?></td>
						<td><?php if($member['membership_year']) { echo $member['membership_year']; } ?></td>
						<td><?= $member['membership_cause']; ?></td>
						<td><?= $member['membership_level']; ?></td>
						<td><?= $member['ministry']; ?></td>
						<td><?= $member['marital_status']; ?></td>
		            </tr>
		        <?php } ?>
	            </tbody>
	          </table>
	        </div>
	        <!-- /.col -->
	      </div>
	      <!-- /.row -->

	    </section>
	    <!-- /.content -->
	    <div class="clearfix"></div>
	  </div>

  </body>
</html>

