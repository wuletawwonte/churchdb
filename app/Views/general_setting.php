
<script src="<?= base_url(); ?>assets/vendors/bootstrap-slider/bootstrap-slider.js"></script>

<link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/bootstrap-slider/slider.css">




  

<!-- Content Wrapper. Contains page content -->
<div class="space-y-4">
    <!-- Content Header (Page header) -->
    <?= view('templates/partials/page_heading', [
        'title_html' => 'አጠቃላይ ማስተካከያዎች<span class="mt-1 block text-base font-normal opacity-70">ዋና የሲስተም ለውጦች ማስተካከያ</span>',
        'breadcrumbs_html' => '<ul><li><a href="' . esc(base_url(), 'url') . '" class="link link-hover"><i class="fa fa-dashboard"></i> ዳሽቦርድ  </a></li><li class="text-base-content/80">አጠቃላይ ማስተካከያዎች </li></ul>',
    ]); ?>
    <section class="content container-fluid">


		<!-- Default box -->
		<div class="card border border-base-content/15 bg-base-100 shadow-md">
		    <div class="card-body">

		        <div class="alert alert-info">
		            ልብ ይበሉ: አጠቃላይ መቼት ዋና የሚባሉ የሲስተም ለውጦችን የሚያድርግ ሲሆን ለውጦቹን ለማየት እንደገና መግባት ያስፈልጋል።
		        </div>


			     <?php if(session()->getFlashdata('success')) { ?>
			        <div class="alert alert-info">
			            <?php echo session()->getFlashdata('success'); ?>
			        </div>
			    <?php } else if(session()->getFlashdata('error')) { ?>
			        <div class="alert alert-error">
			            <?php echo session()->getFlashdata('error'); ?>
			        </div>
			    <?php } ?>

		        <form method="post" action="<?php echo base_url(); ?>admin/savesetting">
		            <div class="table-responsive" width="100%">
		                <table class="table table-zebra w-full">

		                    <tr>
		                        <td width="50%" >የሲስተም ስም:</td>
		                        <td><input type="text" name="system_name" value="<?php echo $system_name; ?>" class="input input-bordered w-full max-w-full" width="32" ></td>
		                    </tr>

		                    <tr>
		                        <td>የሲስተም ስም በአጭሩ:</td>
		                        <td><input type="text" name="system_name_short" value="<?php echo $system_name_short; ?>" class="input input-bordered w-full max-w-full" width="5"></td>
		                    </tr>

		                    <tr>
		                        <td>የቤተክርስቲያኒቱ ስም:</td>
		                        <td><input type="text" name="church_name" value="<?php echo $church_name; ?>" class="input input-bordered w-full max-w-full" width="5"></td>
		                    </tr>

		                    <tr>
		                        <td>ዋና የይለፍ ቃል:</td>
		                        <td><input type="text" name="default_password" value="<?php echo $default_password; ?>" class="input input-bordered w-full max-w-full" width="32"></td>
		                    </tr>

		                    <tr>
		                    	<td></td>
		                        <td colspan="2">
		                            <input type="submit" class="btn btn-primary" value="መዝግብ" name="save">&nbsp;
		                            <input type="reset" class="btn btn-neutral" value="አጥፋ">
		                        </td>
		                    </tr>
		                </table>
		            </div>
		        </form>
		    </div>
		    <!-- /.card-body -->
		</div>
		<!-- /.box -->
		<div class="card border border-base-content/15 bg-base-100 shadow-md">
			<div class="card-body border-b border-base-content/15 pb-3 mb-3">
				<span>የእድሜ ቡድን</span>
			</div>
			<div class="card-body">

			     <?php if(session()->getFlashdata('edit_age_group_success')) { ?>
			        <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" style="opacity: 1; color: #ffffff;" aria-hidden="true">×</button>
			            <?php echo session()->getFlashdata('edit_age_group_success'); ?>
			        </div>
			    <?php } else if(session()->getFlashdata('edit_age_group_error')) { ?>
			        <div class="alert alert-error">
                        <button type="button" class="close" data-dismiss="alert" style="opacity: 1; color: #ffffff;" aria-hidden="true">×</button>
			            <?php echo session()->getFlashdata('edit_age_group_error'); ?>
			        </div>
			    <?php } ?>

				<div class="row">
					<form method="post" action="<?= base_url()?>admin/editagegroup">
                    <div class="col-md-3">
                        <select name="ag_id" id="ageGroupId" class="input input-bordered w-full max-w-full s2" required>
                            <option value=''> የእድሜ ቡድን </option>
                            <?php foreach($age_groups as $ag) { ?>
	                            <option value="<?= $ag['ag_id']?>"> <?= $ag['age_group_name']?> </option>
	                        <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <input type="text" name="start_age" id="startAge" class="input input-bordered w-full max-w-full" placeholder="መነሻ እድሜ">
                    </div>

                    <div class="col-md-2">
                        <input type="text" name="end_age" id="endAge" class="input input-bordered w-full max-w-full" placeholder="ማለቂያ እድሜ">
                    </div>

                    <div class="col-md-2">
                        <input type="submit" class="btn btn-primary" value="ቀይር">
                    </div>

				</div><br>
				<div width="100%">
					<form method="post" action="<?= base_url(); ?>admin/saveagegroup">
						<table class="table table-bordered">
							<thead>
								<th> የእድሜ ቡድን </th>
								<th> መነሻ እድሜ </th>
								<th> ማለቂያ እድሜ </th>
							</thead>
							<tbody>
								<?php foreach($age_groups as $age_group) {?>
									<tr>
										<td> <?= $age_group['age_group_name']?> </td>
										<td width="30%"> <?= $age_group['start_age']?> </td>
										<td width="30%"> <?= $age_group['end_age']?> </td>
					                </tr>
					            <?php } ?>
			                </tbody>
		                </table>
		            </form>
				</div>				
			</div>
			
		</div>
	</section>
	<!-- /.section -->
</div>


<script type="text/javascript">
	$(document).ready(function() {
		var kk = <?= json_encode($age_groups); ?>

		$('#ageGroupId').change(function() {
			var ag = $(this).val();
			if(ag == '') {
				$('#startAge').val('');
				$('#endAge').val('');				
			} else {
				for(i=0; i < kk.length; i++) {

					if(ag == kk[i].ag_id) {
						$('#startAge').val(kk[i].start_age);
						$('#endAge').val(kk[i].end_age);
					}
				}
			}
		});


	});
</script>