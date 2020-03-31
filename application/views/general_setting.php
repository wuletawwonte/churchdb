
<script src="<?= base_url(); ?>assets/vendors/bootstrap-slider/bootstrap-slider.js"></script>

<link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/bootstrap-slider/slider.css">




  

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>
        	አጠቃላይ ማስተካከያዎች
        	<small>ዋና የሲስተም ለውጦች ማስተካከያ</small>
      	</h1>
      	<ol class="breadcrumb">
        	<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> ዳሽቦርድ  </a></li>
        	<li class="active">አጠቃላይ ማስተካከያዎች </li>
      	</ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">


		<!-- Default box -->
		<div class="box box-info">
		    <div class="box-body">

		        <div class="callout callout-info">
		            ልብ ይበሉ: አጠቃላይ መቼት ዋና የሚባሉ የሲስተም ለውጦችን የሚያድርግ ሲሆን ለውጦቹን ለማየት እንደገና መግባት ያስፈልጋል።
		        </div>


			     <?php if($this->session->flashdata('success')) { ?>
			        <div class="callout callout-info">
			            <?php echo $this->session->flashdata('success'); ?>
			        </div>
			    <?php } else if($this->session->flashdata('error')) { ?>
			        <div class="callout callout-danger">
			            <?php echo $this->session->flashdata('error'); ?>
			        </div>
			    <?php } ?>

		        <form method="post" action="<?php echo base_url(); ?>admin/savesetting">
		            <div class="table-responsive" width="100%">
		                <table class="table table-hover">

		                    <tr>
		                        <td width="50%" >የሲስተም ስም:</td>
		                        <td><input type="text" name="system_name" value="<?php echo $system_name; ?>" class="form-control" width="32" ></td>
		                    </tr>

		                    <tr>
		                        <td>የሲስተም ስም በአጭሩ:</td>
		                        <td><input type="text" name="system_name_short" value="<?php echo $system_name_short; ?>" class="form-control" width="5"></td>
		                    </tr>

		                    <tr>
		                        <td>የቤተክርስቲያኒቱ ስም:</td>
		                        <td><input type="text" name="church_name" value="<?php echo $church_name; ?>" class="form-control" width="5"></td>
		                    </tr>

		                    <tr>
		                        <td>ዋና የይለፍ ቃል:</td>
		                        <td><input type="text" name="default_password" value="<?php echo $default_password; ?>" class="form-control" width="32"></td>
		                    </tr>

		                    <tr>
		                    	<td></td>
		                        <td colspan="2">
		                            <input type="submit" class="btn btn-primary btn-flat" value="መዝግብ" name="save">&nbsp;
		                            <input type="reset" class="btn btn-flat" value="አጥፋ">
		                        </td>
		                    </tr>
		                </table>
		            </div>
		        </form>
		    </div>
		    <!-- /.box-body -->
		</div>
		<!-- /.box -->
		<div class="box box-default">
			<div class="box-header with-border">
				<span>የእድሜ ቡድን</span>
			</div>
			<div class="box-body">

			     <?php if($this->session->flashdata('edit_age_group_success')) { ?>
			        <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" style="opacity: 1; color: #ffffff;" aria-hidden="true">×</button>
			            <?php echo $this->session->flashdata('edit_age_group_success'); ?>
			        </div>
			    <?php } else if($this->session->flashdata('edit_age_group_error')) { ?>
			        <div class="callout callout-danger">
                        <button type="button" class="close" data-dismiss="alert" style="opacity: 1; color: #ffffff;" aria-hidden="true">×</button>
			            <?php echo $this->session->flashdata('edit_age_group_error'); ?>
			        </div>
			    <?php } ?>

				<div class="row">
					<form method="post" action="<?= base_url()?>admin/editagegroup">
                    <div class="col-md-3">
                        <select name="id" id="ageGroupId" class="form-control s2" required>
                            <option value=''> የእድሜ ቡድን </option>
                            <?php foreach($age_groups as $ag) { ?>
	                            <option value="<?= $ag['id']?>"> <?= $ag['age_group_name']?> </option>
	                        <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <input type="text" name="start_age" id="startAge" class="form-control" placeholder="መነሻ እድሜ">
                    </div>

                    <div class="col-md-2">
                        <input type="text" name="end_age" id="endAge" class="form-control" placeholder="ማለቂያ እድሜ">
                    </div>

                    <div class="col-md-2">
                        <input type="submit" class="btn btn-primary btn-flat" value="ቀይር">
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

					if(ag == kk[i].id) {
						$('#startAge').val(kk[i].start_age);
						$('#endAge').val(kk[i].end_age);
					}
				}
			}
		});


	});
</script>