<!DOCTYPE html>
<html lang="am" data-theme="light">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>General Report</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/font-awesome/css/font-awesome.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/tailwind.css'); ?>">
</head>
<body class="bg-base-100 text-base-content" onload="window.print();">

	  <div class="mx-auto max-w-[100%] bg-base-100 p-6 print:p-2">

	    <section class="invoice">
	      <div class="mb-6 flex flex-wrap items-start justify-between gap-4 border-b border-base-300 pb-4">
	        <h2 class="text-xl font-bold">
	            <i class="fa fa-globe"></i> <?php echo esc(session()->get('system_name')); ?>, Inc.
	        </h2>
            <small class="text-sm opacity-80">Date: <?= date('M-d-Y'); ?></small>
	      </div>

	      <div class="overflow-x-auto">
	          <table class="table table-zebra table-sm w-full border border-base-300 text-sm">
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
						<td><?= esc($member['firstname']); ?></td>
						<td><?= esc($member['middlename']); ?></td>
						<td><?= esc($member['lastname']); ?></td>
						<td><?= esc($member['gender']); ?></td>
						<td><?= esc($member['birthdate']); ?></td>
						<td><?= esc($member['age']); ?></td>
						<td><?= esc($member['birth_place']); ?></td>
						<td><?= esc($member['mobile_phone']); ?></td>
						<td><?= esc($member['email']); ?></td>
						<td><?= esc($member['job_type']); ?></td>
						<td><?= esc($member['workplace_name']); ?></td>
						<td><?= esc($member['workplace_phone']); ?></td>
						<td><?php if($member['membership_year']) { echo esc($member['membership_year']); } ?></td>
						<td><?= esc($member['membership_cause']); ?></td>
						<td><?= esc($member['membership_level']); ?></td>
						<td><?= esc($member['ministry']); ?></td>
						<td><?= esc($member['marital_status']); ?></td>
		            </tr>
		        <?php } ?>
	            </tbody>
	          </table>
	      </div>

	    </section>
	  </div>

  </body>
</html>
