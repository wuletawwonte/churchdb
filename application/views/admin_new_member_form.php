
<script type="text/javascript" src="<?= base_url('assets/plugins/jquery.inputmask.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/jquery.inputmask.date.extensions.js'); ?>"></script>
<script src="<?= base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css">



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= lang('person_registration'); ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="glyphicon glyphicon-user"></i> <?= lang('people'); ?></a></li>
        <li class="active"><?= lang('add_new_person'); ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">





	<form method="post" action="<?= base_url('admin/savemember') ?>" name="PersonEditor">


     <?php if($this->session->flashdata('success')) { ?>
        <div class="callout callout-info">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php } else if($this->session->flashdata('error')) { ?>
        <div class="callout callout-error">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php } ?>

		    <div class="box box-info clearfix">
		        <div class="box-header">
		            <h3 class="box-title"> የግል መረጃ </h3>
		        </div><!-- /.box-header -->
		        <div class="box-body">
		            <div class="form-group">
		                <div class="row">
		                    <div class="col-md-2">
		                        <label> ፆታ  :</label>
		                        <select name="gender" class="form-control s2">
		                            <option value="ሴት"> ሴት </option>
		                            <option value="ወንድ"> ወንድ </option>
		                        </select>
		                    </div>
		                    <div class="col-md-3">
		                        <label for="title"> ማዕረግ  :</label>
		                        <input type="text" name="title" class="form-control">
		                    </div>
		                </div>
		                <p/>
		                <div class="row">
		                    <div class="col-md-4">
		                        <label for="firstname"> ስም  :</label>
		                        <input type="text" name="firstname" class="form-control" required>
		        				<br><font color="red"></font>
		                    </div>

		                    <div class="col-md-2">
		                        <label for="middlename"> የአባት ስም  :</label>
		                        <input type="text" name="middlename" class="form-control" required>

		                    </div>

		                    <div class="col-md-6">
		                        <label for="lastname"> የአያት ስም :</label>
		                        <input type="text" name="lastname" class="form-control" required>                    
		                    </div>
		                </div>
		                <p/>
		                <div class="row">
			                <div class="col-md-4 form-group">
				                <label>የተወለዱበት ቀን :</label>

				                <div class="input-group">
				                  <div class="input-group-addon">
				                    <i class="glyphicon glyphicon-calendar"></i>
				                  </div>
				                  <input type="text" class="form-control family-head inputmasked" name="birthdate" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask required>
				                </div>
				                <!-- /.input group -->
				            </div>
		                    <div class="col-md-2">
		                        <label> ዕድሜ ይደበቅ  </label><br/>
		                        <div class="checkbox icheck">
			                        <input type="checkbox" name="hide_age">
		                    	</div>
		                    </div>
		                    <div class="col-md-6">
		                        <label for="birth_place"> የትውልድ ሥፍራ :</label>
		                        <input type="text" name="birth_place" class="form-control">                    
		                    </div>

		                </div>
		            </div>
		        </div>
		    </div>




			<div class="box box-info clearfix">
				<div class="box-header">
					<h3 class="box-title"> አድራሻና የሥራ ሁኔታ </h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<div class="row">
						<div class="form-group col-md-6">
							<label>የሞባይል ስልክ ቁጥር:</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="glyphicon glyphicon-earphone"></i>
								</div>
								<input type="text" name="mobile_phone" class="form-control" placeholder="09..">
							</div>
						</div>

						<div class="form-group col-md-6">
							<label>ኢሜል :</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="glyphicon glyphicon-envelope"></i>
								</div>
								<input type="email" Name="email" class="form-control" size="50" maxlength="50">
							</div>
						</div>

					</div><p/>
					<div class="row">
	                    <div class="col-md-4">
	                        <label> የሥራ አይነት  :</label>
	                        <select name="job_type" class="form-control s2">
	                        	<?php foreach($job_types as $job_type) { ?>
		                            <option value="<?= $job_type['job_type_id'] ?>"> <?= $job_type['job_type']; ?> </option>
		                        <?php } ?>
	                        </select>
	                    </div>

	                    <div class="col-md-4">
	                        <label for="workplace_name"> የመሥሪያ ቤቱ ስም :</label>
	                        <input type="text" name="workplace_name" class="form-control">                    
	                    </div>


						<div class="form-group col-md-4">
							<label>የመሥሪያ ቤት ስልክ ቁጥር :</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="glyphicon glyphicon-phone-alt"></i>
								</div>
								<input type="text" name="workplace_phone" class="form-control inputmasked" data-inputmask='"mask": "(999) 999-9999"' data-mask/>
							</div>
						</div>

					</div>
				</div>
			</div>


			<div class="box box-info clearfix">
				<div class="box-header">
					<h3 class="box-title"> የቤተክርስትያን ተሳትፎ </h3>
				</div><!-- /.box-header -->
				<div class="box-body">

					<div class="row">

	                    <div class="col-md-4">
	                        <label for="Title"> አባል የሆኑበት ዘመን :</label>
	                        <div class="input-group">
	                        	<input type="text" name="membership_year" class="form-control inputmasked" data-inputmask='"mask": "9999"' data-mask>
	                    		<div class="input-group-addon">ዓ.ም</div>

	                    	</div>
	                    </div>

	                    <div class="col-md-4">
	                        <label> አባል የሆኑበት ሁኔታ :</label>
	                        <select name="membership_cause" class="form-control s2">
	                        	<?php foreach($membership_causes as $membership_cause) { ?>
		                        	<option value="<?= $membership_cause['membership_cause_id']; ?>"> <?= $membership_cause['membership_cause']; ?> </option>
		                        <?php } ?>
	                        </select>
	                    </div>

	                    <div class="col-md-4">
	                        <label> የአባልነት ደረጃ :</label>
	                        <select name="membership_level" class="form-control s2">
	                        	<?php foreach($membership_levels as $membership_level) { ?>
		                        	<option value="<?= $membership_level['membership_level_id']; ?>"> <?= $membership_level['membership_level']; ?> </option>
		                        <?php } ?>
	                        </select>
	                    </div>
					</div>
					<p/>
					<div class="row">
					<p/>
	                    <div class="col-md-4 ministries">
	                        <label> የአገልግሎት ዘርፍ :</label>
	                        <select name="ministries" class="form-control s2">
	                        	<?php foreach($ministries as $ministry) { ?>
		                        	<option value="<?= $ministry['ministry_id']; ?>"> <?= $ministry['ministry']; ?> </option>
		                        <?php } ?>
	                        </select>
	                    </div>

					</div>
					<p/>
				</div>
			</div>



		    <div class="box box-info clearfix">
		        <div class="box-header">
		            <h3 class="box-title"> የቤተሰብ መረጃ </h3>
		        </div><!-- /.box-header -->
		        <div class="box-body">
		            <div class="form-group col-md-6">
		                <label> <?= lang('family_role') ?> :</label>
		                <select name="family_role" class="form-control s2">
		                    <option value="አልተመረጠም">አልተመረጠም</option>
		                    <option value="0" disabled>-----------------------</option>
		                    <option value="ባል">ባል</option>
		                    <option value="ሚስት">ሚስት</option>
		                    <option value="ወንድ ልጅ">ወንድ ልጅ</option>
		                    <option value="ሴት ልጅ">ሴት ልጅ</option>
		                </select>
		            </div>

		            <div class="form-group col-md-6">
		                <label> <?= lang('family') ?>:</label>
		                <select name="family" class="form-control" id="spouse">
		                    <option value="አልተመረጠም" selected>አልተመረጠም</option>
		                    <option disabled>-----------------------</option>
		                    <?php foreach($members as $member) { ?>
		                    <option value="<?= $member['id']; ?>"><?= $member['firstname'].' '.$member['lastname']; ?></option>
		                    <?php } ?>
		                </select>
		            </div>
		        </div>
		    </div>


            <input type="submit" class="btn btn-primary" value="<?= lang('save') ?>" Name="addchurchsubmit">
			<input type="submit" class="btn btn-info" value="Save and Add" name="addchurchsubmit">
			<input type="button" class="btn" value="Cancel">


		</form>



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->





<script type="text/javaScript">
	
	function toggle(className, obj) {
	    if ( obj.checked ) $(className).show();
	    else $(className).hide();
	}

	$(".inputmasked").inputmask(); 

	$("#spouse").select2();

    $(function () {
        $('input').iCheck({
	      checkboxClass: 'icheckbox_square-blue',
	      radioClass: 'iradio_square-blue',
	      increaseArea: '20%' /* optional */
	    });
    });


</script>













