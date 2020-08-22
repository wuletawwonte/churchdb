<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $_SESSION['system_name'].': '.$_SESSION['church_name']; ?> - ደረሰኝ</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/bootstrap/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/font-awesome/css/font-awesome.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css'); ?>">

<style type="text/css">
	.profile-image {
  margin: 0 auto;
  margin-top: 15px;
  width: 200px;
  height: 200px;
  padding: 3px;
  border-radius: 50%;
  border: 3px solid #d2d6de; 
  font-size: 50px;
  color: #fff;
  text-align: center;
  line-height: 188px;
}

</style>

</head>

<body style="background-color: #eee;padding: 10px;" onload="window.print();">



			<dl class="dl-horizontal">
                <dt>ቤተክርስቲያን</dt>
                <dd><?= $_SESSION['church_name']?></dd>
                <dt>የከፋይ ሰም</dt>
                <dd><?= $details['firstname'].' '.$details['middlename']?></dd>
                <dt>የክፍያ መለያ</dt>
                <dd><?= $details['pid']?></dd>
                <dt>ምክንያት</dt>
                <dd><?= $details['payment_type']?></dd>
                <dt>የገንዘብ መጠን</dt>
                <dd><?= $details['payment_amount']?></dd>
                <dt>ያስተናገደው ሰው</dt>
                <dd><?= $_SESSION['current_user']['firstname'].' '.$_SESSION['current_user']['lastname']?></dd>
                <dt>ቀን</dt>
                <dd><?= nice_date($details['date_issued'], 'M d, Y')?></dd>
            </dl>


</body>

</html>
