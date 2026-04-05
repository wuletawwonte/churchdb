<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $church_name; ?> - የምዕመን መረጃ</title>
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

<table style="background-color: white;" height="100%" width="100%" border="0" cellpadding="5" cellspacing="0" align="center">
  <tr>
    <td valign="top" width="100%" align="center">
      <table width="98%" border="0">
        <tr>
          <td valign="top">
            <br>

            <p class="PageTitle"><?= $_SESSION['system_name']?> - የሚታተም ገፅ</p>

<table width="200"><tr><td>
<p class="ShadedBox">

<table>	<tr>	<td  style="padding:5px;">

                	<?php if($member['avatar'] == NULL) { ?>
                        <div class="profile-image">
                            <div style="width: 100%; height: 100%; border-radius: 50%; background: <?= $member['profile_color']; ?>">
                                <b><?= mb_substr($member['firstname'], 0, 1).mb_substr($member['middlename'], 0, 1); ?></b>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div style="margin: 0 auto;height: 200px; width: 200px;margin-top: 15px;">
                            <img class="img-circle" style="border: 3px solid <?= $member['profile_color']; ?>;padding: 3px;height: 200px; width: 200px;" src="<?= base_url(); ?>assets/avatars/<?= $member['avatar']?>">
                        </div>

                    <?php } ?>


	</td>
	<td><b><font size="4"><?= $member['firstname'].' '.$member['middlename'].' '.$member['lastname']?></font></b>
	<br></td>
</tr></table>
</p></td></tr></table>
<BR>

<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr>
	<td width="20%" valign="top" align="left">
		<table cellspacing="1" cellpadding="4">
		<tr>
			<td class="LabelColumn">የሞባይል ስልክ ቁጥር:</td>
			<td width="10"></td>
			<td class="TextColumn"><?= $member['mobile_phone']?>&nbsp;</td>
		</tr>
		<tr>
			<td class="LabelColumn">የመሥሪያ ቤት ስልክ ቁጥር:</td>
			<td width="10"></td>
			<td class="TextColumn"><?= $member['workplace_phone']?>&nbsp;</td>
		</tr>
				</table>
	</td>

	<td width="30%" valign="top" align="left">
		<table cellspacing="1" cellpadding="4">
			<tr>
				<td class="LabelColumn">ፆታ:</td>
				<td width="10"></td>
				<td class="TextColumn">
					<?= $member['gender']?></td>
			</tr>
			<tr>
				<td class="LabelColumn">የተወለዱበት ቀን:</td>
				<td width="10"></td>
				<td class="TextColumn"><?= $member['birthdate']?>&nbsp;</td>
			</tr>
			<tr>
				<td class="LabelColumn">የጋብቻ ሁኔታ:</td>
				<td width="10"></td>
				<td class="TextColumn">
				<?= $member['marital_status']; ?>&nbsp;</td>
			</tr>
			<tr>
				<td class="LabelColumn">ኢሜል:</td>
				<td width="10"></td>
				<td class="TextColumnWithBottomBorder"><?= $member['email']; ?>&nbsp;</td>
			</tr>
			<tr>
				<td class="LabelColumn">የሥራ አይነት:</td>
				<td width="10"></td>
				<td class="TextColumnWithBottomBorder"><?= $member['job_type']?>&nbsp;</td>
			</tr>
			<tr>
				<td class="LabelColumn">የመሥሪያ ቤቱ ስም:</td>
				<td width="10"></td>
				<td class="TextColumn"><?= $member['workplace_name']?>&nbsp;</td>
			</tr>
		</table>
    </td>
    <td width="30%" valign="top" align="left">
    	<table cellspacing="1" cellpadding="4">
			<tr>
				<td class="LabelColumn">አባል የሆኑበት ዘመን:</td>
				<td width="10"></td>
				<td class="TextColumn"><?php if($member['membership_year']) { echo $member['membership_year']; } else { echo ""; }?>&nbsp;</td>
			</tr>
			<tr>
				<td class="LabelColumn">የአባልነት ደረጃ:</td>
				<td width="10"></td>
				<td class="TextColumn"><?= $member['membership_level']?>&nbsp;</td>
			</tr>
			<tr>
				<td class="LabelColumn">አባል የሆኑበት ሁኔታ:</td>
				<td width="10"></td>
				<td class="TextColumn"><?= $member['membership_cause']?>&nbsp;</td>
			</tr>
			<tr>
				<td class="LabelColumn">የአገልግሎት ዘርፍ:</td>
				<td width="10"></td>
				<td class="TextColumn"><?= $member['ministry']?>&nbsp;</td>
			</tr>
    	</table>
    </td>
</tr>
</table>
<br>


<b>Assigned Groups:</b>

                    <?php if($assigned_groups != false) { ?>
                        <table cellpadding=5 cellspacing=0 width="100%">
							<tr class="TableHeader">
                                <td><span>ስም</span></td>
                                <td  class="text-center"><span>የቡድን አይነት</span></td>
                                <td><span>አባልነት</span></td>
                                <td><span>የተፈጠረበት</span></td>
                            </tr>
                            <?php foreach($assigned_groups as $group) {?>
                                <tr>
                                    <td>                      
                                    	<?= $group['name'];?>
                                    </td>
                                    <td class="text-center">
                                        <span class='label label-default'><?= $group['type']?> </span>
                                    </td>
                                    <td><?= $group['role'] ?></td>
                                    <td><?= $group['created'] ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table><p/><hr> 
                    <?php } else { ?>                  
	                    <p align="center">በምንም ቡድን ውስጥ አልተመድቡም።</p><BR>
                    <?php } ?>


<p class="ShadedBox")>የምዕመን መረጃ የተያዘበት ቀን</p><span class="SmallText"><?= $member['created']?></span><br>					</td>
				</tr>
			</table>

		</td>
	</tr>
</table>

</body>

</html>
