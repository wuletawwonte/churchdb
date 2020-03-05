
<style type="text/css">
	#avatar {
		width: 130px;
		height: 130px;
	}
</style>

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
        <li><a href="#"><i class="fa fa-users"></i> <?= lang('people'); ?></a></li>
        <li class="active"><?= lang('add_new_person'); ?></li>
      </ol>
    </section>





	<?php echo form_open_multipart('admin/savemember');?>



    <!-- Main content -->
    <section class="content container-fluid">

	     <?php if($this->session->flashdata('success')) { ?>
	        <div class="callout callout-info">
	            <?php echo $this->session->flashdata('success'); ?>
	        </div>
	    <?php } else if($this->session->flashdata('error')) { ?>
	        <div class="callout callout-danger">
	            <?php echo $this->session->flashdata('error'); ?>
	        </div>
	    <?php } ?>


    	<div class="row">
    		<div class="col-md-3 col-sm-3 col-lg-3">
    			<div class="box box-info clearfix ">
    				<div class="box-header with-border">
    					<h3 class="box-title">የምዕመን ፎቶ</h3>
    				</div>
    				<div class="box-body" align="center">
		              	<img class="img-responsive img-circle" for="avatarInput" id="avatar" style="border: 3px solid #d2d6de;padding: 3px;height: 130px; width: 130px;" src="<?= base_url(); ?>assets/img/user.png" alt="User profile picture"><br>


					<div class="input-group">
		                <input type="file" accept="image/*" onchange="document.getElementById('avatar').src = window.URL.createObjectURL(this.files[0]);" id="avatarInput" name="avatar_input" style="display: none;">
			                    <button type="button" class="btn btn-lg btn-primary" onclick="document.getElementById('avatarInput').click();"><i class="fa fa-folder-open"></i></button>
			                    <button type="button" class="btn btn-lg btn-info btn-flat" onclick="document.getElementById('avatarInput').value = ''; document.getElementById('avatar').src = '<?= base_url(); ?>assets/img/user.png'"  style="border-radius: 0px;"><i class="fa fa-times"></i></button>
		            </div>
	                <p></p>


		              	<p class="text-muted text-center">የፎቶው ከ1500KB ቢያንስ ይመረጣል </p>
    				</div>
    			</div>
    		</div>
    		<div class="col-md-9 col-lg-9 col-sm-9">
			    <div class="box box-info clearfix">
			        <div class="box-header with-border">
			            <h3 class="box-title"> የግል መረጃ </h3>
			        </div><!-- /.box-header -->
			        <div class="box-body">
			            <div class="form-group">
			                <div class="row">
			                    <div class="col-md-2">
			                        <label> ፆታ  :</label>
			                        <select name="gender" id="gender" class="form-control s2">
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
			</div>
		</div>



			<div class="box box-info clearfix">
				<div class="box-header with-border">
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
		                            <option value="<?= $job_type['job_type_id'] ?>"> <?= $job_type['job_type_title']; ?> </option>
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
				<div class="box-header with-border">
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
		                        	<option value="<?= $membership_cause['membership_cause_id']; ?>"> <?= $membership_cause['membership_cause_title']; ?> </option>
		                        <?php } ?>
	                        </select>
	                    </div>

	                    <div class="col-md-4">
	                        <label> የአባልነት ደረጃ :</label>
	                        <select name="membership_level" class="form-control s2">
	                        	<?php foreach($membership_levels as $membership_level) { ?>
		                        	<option value="<?= $membership_level['membership_level_id']; ?>"> <?= $membership_level['membership_level_title']; ?> </option>
		                        <?php } ?>
	                        </select>
	                    </div>
					</div>
					<p/>
					<div class="row">
					<p/>
	                    <div class="col-md-4 ministries">
	                        <label> የአገልግሎት ዘርፍ :</label>
	                        <select name="ministry" class="form-control s2">
	                        	<?php foreach($ministries as $ministry) { ?>
		                        	<option value="<?= $ministry['ministry_id']; ?>"> <?= $ministry['ministry_title']; ?> </option>
		                        <?php } ?>
	                        </select>
	                    </div>

					</div>
					<p/>
				</div>
			</div>



		    <div class="box box-info clearfix">
		        <div class="box-header with-border">
		            <h3 class="box-title"> የቤተሰብ መረጃ </h3>
		        </div><!-- /.box-header -->
		        <div class="box-body">
		            <div class="form-group col-md-6">
		                <label> የጋብቻ ሁኔታ :</label>
		                <select name="marital_status" class="form-control s2" id="maritalStatus">
		                    
		                </select>
		            </div>

		            <div class="form-group col-md-6">
		                <label> የትዳር አጋር:</label>
		                <select name="spouse" class="form-control" id="spouse" disabled>
		                    <option value="አልተመረጠም" selected>አልተመረጠም</option>
		                    <option disabled>-----------------------</option>
		                    <?php foreach($members as $member) { ?>
		                    <option value="<?= $member['id']; ?>"><?= $member['firstname'].' '.$member['middlename']; ?></option>
		                    <?php } ?>
		                </select>
		            </div>
		        </div>
		    </div>


            <input type="submit" class="btn btn-primary" value="<?= lang('save') ?>" Name="addchurchsubmit">
			<input type="submit" class="btn btn-info" value="Save and Add" name="addchurchsubmit">
			<a href="<?= base_url(); ?>admin/listmembers" class="btn">Cancel</a>


	    </section>
	    <!-- /.content -->


	</form>



  </div>
  <!-- /.content-wrapper -->





<script type="text/javaScript">
	$(document).ready(function () {

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

	    $("#maritalStatus").change(function(){
	    	var selected = $(this).val();
	    	if(selected == "ያገባ" || selected == "ያገባች") {
	    		$("#spouse").prop('disabled', false);
	    	} 
	    	else {
	    		$("#spouse").prop('disabled', true);
	    	}
	    });

	    function maleMaritalStatus() {
	    	$("#maritalStatus").html("<option value='አልተመረጠም'>አልተመረጠም</option><option disabled>-----------------------</option><option value='ያላገባ'>ያላገባ</option><option value='ያገባ'>ያገባ</option><option value='የፈታ'>የፈታ</option>");    	
	    }

	    function femaleMaritalStatus() {
	    	$("#maritalStatus").html("<option value='አልተመረጠም'>አልተመረጠም</option><option disabled>-----------------------</option><option value='ያላገባች'>ያላገባች</option><option value='ያገባች'>ያገባች</option><option value='የፈታች'>የፈታች</option>");
	    }

	    femaleMaritalStatus();

	    $("#gender").change(function() {
	    	var gender = $(this).val();
	    	if(gender == "ወንድ") {
	    		maleMaritalStatus();
	    	} 
	    	else if(gender == "ሴት") {
	    		femaleMaritalStatus();
	    	}
	    });


	    // $(function fileupload(input) {
	    // 	if(input.files && input.files[0]) {
	    // 		var reader = new FileReader();

	    // 		reader.onload = function(e) {
	    // 			$("#avatar")
	    // 			.attr("src", e.target.result)
	    // 			.width(130)
	    // 			.height(130);
	    // 		};

	    // 		reader.readAsDataURL(input.files[0]);
	    // 	}
	    // });

	});
</script>













