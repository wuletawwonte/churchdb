
<script type="text/javascript" src="<?= base_url('assets/plugins/jquery.inputmask.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/jquery.inputmask.date.extensions.js'); ?>"></script>
<script src="<?= base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css">


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        የምዕመን መራጃ ማስተካከያ
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>admin/memberdetails/<?= $member['id']; ?>"><i class="fa fa-user"></i> የምዕመን መረጃ </a></li>
        <li class="active"> መረጃ ቀይር </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">





		<form method="post" action="<?= base_url('admin/savememberchanges') ?>" enctype="multipart/form-data" name="PersonEditor">


	    <?php if($this->session->flashdata('success')) { ?>
	        <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" style="opacity: 1; color: #ffffff;" aria-hidden="true">×</button>
	            <?php echo $this->session->flashdata('success'); ?>
	        </div>
	    <?php } else if($this->session->flashdata('error')) { ?>
		    <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" style="opacity: 1; color: #ffffff;" aria-hidden="true">×</button>
	            <?php echo $this->session->flashdata('error'); ?>
	        </div>
	    <?php } ?>


    		<input type="text" name='id' value="<?= $member['id'] ?>" hidden>

    		<div class="row">

	    		<div class="col-md-3 col-sm-3 col-lg-3">
	    			<div class="box box-info clearfix ">
	    				<div class="box-header with-border">
	    					<h3 class="box-title">የምዕመን ፎቶ</h3>
	    				</div>
	    				<div class="box-body" align="center">
			              	<img class="img-responsive img-circle" for="avatarInput" id="avatar" style="border: 3px solid #d2d6de;padding: 3px;height: 130px; width: 130px;" src="<?php if($member['avatar'] == NULL) { echo base_url().'assets/img/user.png'; } else { echo base_url('assets/avatars/'. $member['avatar']); } ?>" alt="User profile picture"><br>


						<div class="input-group input-group-lg">
			                <input type="file" accept="image/*"  class="form-control" id="avatarInput" name="avatar_input" onchange="document.getElementById('avatar').src = window.URL.createObjectURL(this.files[0]);" style="display: none;">
			                    <button type="button" class="btn btn-lg btn-primary btn-flat" onclick="document.getElementById('avatarInput').click();"><i class="fa fa-folder-open"></i></button>
		                        <button type="button" class="btn btn-lg btn-info btn-flat" onclick="document.getElementById('avatarInput').value = ''; document.getElementById('avatar').src = '<?= base_url(); ?>assets/<?php if($member['avatar'] == NULL) { echo '/img/user.png'; } else { echo 'avatars/'.$member['avatar']; } ?>'"  style="border-radius: 0px;"><i class="fa fa-refresh"></i></button>
			            </div>
		                <p></p>


			              	<p class="text-muted text-center">የፎቶው ከ1500KB ቢያንስ ይመረጣል </p>
	    				</div>
	    			</div>
	    		</div>




	    		<div class="col-md-9 col-sm-9 col-lg-9">
				    <div class="box box-info clearfix">
				        <div class="box-header with-border">
				            <h3 class="box-title"> <?= lang('personal_info'); ?>  </h3>
				        </div><!-- /.box-header -->
				        <div class="box-body">
				            <div class="form-group">
				                <div class="row">
				                    <div class="col-md-2">
				                        <label> <?= lang('gender'); ?>  :</label>
				                        <select name="gender" class="form-control s2">
				                            <option <?php if($member['gender'] == 'ሴት') { echo 'selected'; }?> value="ሴት">ሴት</option>
				                            <option <?php if($member['gender'] == 'ወንድ') { echo 'selected'; }?> value="ወንድ">ወንድ</option>
				                        </select>
				                    </div>
				                    <div class="col-md-3">
				                        <label for="Title"> <?= lang('title'); ?>  :</label>
				                        <input type="text" name="Title" value="<?= $member['title']; ?>" class="form-control">
				                    </div>
				                </div>
				                <p/>
				                <div class="row">
				                    <div class="col-md-4">
				                        <label for="firstname"> <?= lang('first_name'); ?>  :</label>
				                        <input type="text" name="firstname" value="<?= $member['firstname'] ?>" class="form-control">
				        				<br><font color="red"></font>
				                    </div>

				                    <div class="col-md-2">
				                        <label for="middlename"> <?= lang('middle_name'); ?>  :</label>
				                        <input type="text" name="middlename" value="<?= $member['middlename'] ?>" class="form-control">

				                    </div>

				                    <div class="col-md-6">
				                        <label for="lastname"> <?= lang('last_name'); ?>  :</label>
				                        <input type="text" name="lastname" value="<?= $member['lastname'] ?>" class="form-control">                    
				                    </div>
				                </div>
				                <p/>
				                <div class="row">
					                <div class="col-md-4 form-group">
						                <label><?= lang('birth_date') ?>:</label>

						                <div class="input-group">
						                  <div class="input-group-addon">
						                    <i class="glyphicon glyphicon-calendar"></i>
						                  </div>
						                  <input type="text" class="form-control family-head inputmasked" name="birthdate" value="<?= $member['birthdate'] ?>" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
						                </div>
						                <!-- /.input group -->
						            </div>
				                    <div class="col-md-2">
				                        <label> ዕድሜ ይደበቅ  </label><br/>
				                        <div class="checkbox icheck">
					                        <input type="checkbox" name="hide_age" <?php if($member['hide_age'] == 'on') echo 'checked';?> >
				                    	</div>
				                    </div>

				                    <div class="col-md-6">
				                        <label for="birth_place"> <?= lang('birth_place'); ?>  :</label>
				                        <input type="text" name="birth_place" value="<?= $member['birth_place'] ?>" class="form-control">                    
				                    </div>

				                </div>
				            </div>
				        </div>
				    </div>
				</div>
			</div>


			<div class="box box-info clearfix">
				<div class="box-header with-border">
					<h3 class="box-title"><?= lang('contact_and_job_info') ?></h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<div class="row">

	                    <div class="col-md-4">
	                        <label> ክፍለ ከተማ: </label>
		                    <select name="kifle_ketema" id="kifle_ketema" class="form-control s2">
	                        	<option value="" <?php if($member['kifle_ketema'] == '') echo 'selected'; ?> >አልተመረጠም</option>
	                        	<?php foreach($kifle_ketemas as $kifle_ketema) { ?>
		                        	<option value="<?= $kifle_ketema['kifle_ketema_title']?>" <?php if($member['kifle_ketema'] == $kifle_ketema['kifle_ketema_title']) echo 'selected'; ?> > <?= $kifle_ketema['kifle_ketema_title']; ?> </option>
		                        <?php } ?>
	                        </select>
	                    </div>

	                    <div class="col-md-4">
	                        <label> ቀበሌ: </label>
	                        <select name="kebele" id="kebele" class="form-control s2">
	                        	<option value="" <?php if($member['kebele'] == '') echo 'selected'; ?> >አልተመረጠም</option>
	                        	<?php foreach($kebeles as $kebele) { ?>
		                        	<option value="<?= $kebele['kebele_title'] ?>" <?php if($member['kebele'] == $kebele['kebele_title']) echo 'selected'; ?> > <?= $kebele['kebele_title']; ?> </option>
		                        <?php } ?>
	                        </select>
	                    </div>

	                    <div class="col-md-4">
	                        <label> መንደር: </label>
	                        <select name="mender" id="mender" class="form-control s2">
	                        	<option value="" <?php if($member['mender'] == '') echo 'selected'; ?> >አልተመረጠም</option>
	                        	<?php foreach($menders as $mender) { ?>
		                        	<option value="<?= $mender['mender_title']; ?>" <?php if($member['mender'] == $mender['mender_title']) echo 'selected'; ?> > <?= $mender['mender_title']; ?> </option>
		                        <?php } ?>
	                        </select>
	                    </div>
					</div><br>
					<div class="row">

	                    <div class="col-md-2">
	                        <label for="house_number"> የቤት ቁጥር: </label>
	                        <input type="text" name="house_number" value="<?= $member['house_number']?>" class="form-control">                    
	                    </div>

						<div class="form-group col-md-4">
							<label for="home_phone"> የመኖርያ ቤት ስልክ ቁጥር: </label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-tty"></i>
								</div>
								<input type="text" name="home_phone" value="<?= $member['home_phone']?>" class="form-control" placeholder="046..">
							</div>
						</div>

					</div><br>

					<div class="row">
						<div class="form-group col-md-6">
							<label><?= lang('mobile_phone') ?>:</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="glyphicon glyphicon-earphone"></i>
								</div>
								<input type="text" name="mobile_phone" value="<?= $member['mobile_phone'] ?>" class="form-control">
							</div>
						</div>

						<div class="form-group col-md-6">
							<label><?= lang('email') ?> :</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="glyphicon glyphicon-envelope"></i>
								</div>
								<input type="email" Name="email" value="<?= $member['email'] ?>" class="form-control" value="" size="50" maxlength="50">
							</div>
						</div>

					</div><p/>
				</div>
			</div>
			<div class="box box-info clearfix">
				<div class="box-header with-border">
					<h3 class="box-title"> የምዕመን የስራ ሁኔታ </h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<div class="row">

						<div class="col-md-6">
							<label>የትምህርት ደረጃ:</label>
	                        <select name="level_of_education" class="form-control s2">
		                        <option <?php if($member['level_of_education'] == 'አልተመረጠም') echo 'selected'; ?> value="አልተመረጠም"> አልተመረጠም </option>
		                        <option <?php if($member['level_of_education'] == '8ኛ ያጠናቀቀ') echo 'selected'; ?> value="8ኛ ያጠናቀቀ"> 8ኛ ያጠናቀቀ </option>
		                        <option <?php if($member['level_of_education'] == '10ኛ ያጠናቀቀ') echo 'selected'; ?> value="10ኛ ያጠናቀቀ"> 10ኛ ያጠናቀቀ </option>
		                        <option <?php if($member['level_of_education'] == '10+2') echo 'selected'; ?> value="10+2"> 10+2 </option>
		                        <option <?php if($member['level_of_education'] == 'ዲፕሎማ') echo 'selected'; ?> value="ዲፕሎማ"> ዲፕሎማ </option>
		                        <option <?php if($member['level_of_education'] == 'የመጀመርያ ዲግሪ') echo 'selected'; ?> value="የመጀመርያ ዲግሪ"> የመጀመርያ ዲግሪ </option>
		                        <option <?php if($member['level_of_education'] == 'የማስተርስ ዲግሪ') echo 'selected'; ?> value="የማስተርስ ዲግሪ"> የማስተርስ ዲግሪ </option>
		                        <option <?php if($member['level_of_education'] == 'ሶስተኛ ዲግሪ') echo 'selected'; ?> value="ሶስተኛ ዲግሪ"> ሶስተኛ ዲግሪ </option>
		                        <option <?php if($member['level_of_education'] == 'ፕሮፌሰር') echo 'selected'; ?> value="ፕሮፌሰር"> ፕሮፌሰር </option>
	                        </select>
						</div>

						<div class="col-md-6">
							<label>የሰለጠኑበት ሙያ መስክ:</label>
							<input type="text" name="field_of_study" value="<?= $member['field_of_study']?>" class="form-control" maxlength="50">
						</div>

					</div><br>
					<div class="row">
	                    <div class="col-md-4">
	                        <label> የሥራ መስክ: </label>
	                        <select name="job_type" class="form-control s2">
	                        	<option value="አልተመረጠም" <?php if($member['job_type'] == 'አልተመረጠም') echo 'selected'; ?> >አልተመረጠም</option>
				                <?php foreach($job_types as $job_type) { ?>
			                        <option value="<?= $job_type['job_type_title'] ?>" <?php if($member['job_type'] == $job_type['job_type_title']) echo 'selected'; ?>> 
			                          <?= $job_type['job_type_title']; ?> 
			                        </option>
			                    <?php } ?>

	                        </select>
	                    </div>

	                    <div class="col-md-4">
	                        <label for="workplace_name"> የመሥሪያ ቤቱ ስም: </label>
	                        <input type="text" name="workplace_name" value="<?= $member['workplace_name'] ?>" class="form-control">                    
	                    </div>


						<div class="form-group col-md-4">
							<label> የመሥሪያ ቤት ስልክ ቁጥር: </label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="glyphicon glyphicon-phone-alt"></i>
								</div>
								<input type="text" name="workplace_phone" value="<?= $member['workplace_phone'] ?>" class="form-control inputmasked" data-inputmask='"mask": "(999) 999-9999"' data-mask/>
							</div>
						</div>

					</div><br>
					<div class="row">

	                    <div class="col-md-4">
	                        <label for="monthly_income"> ወርሐዊ ገቢ: </label>
	                        <div class="input-group">
	                        	<input type="tel" name="monthly_income" value="<?php if($member['monthly_income']) echo $member['monthly_income']; ?>" class="form-control">
	                    		<div class="input-group-addon">ብር</div>

	                    	</div>
	                    </div>

					</div>

				</div>
			</div>




			<div class="box box-info clearfix">
				<div class="box-header  with-border">
					<h3 class="box-title"><?= lang('church_participation') ?></h3>
				</div><!-- /.box-header -->
				<div class="box-body">

					<div class="row">

	                    <div class="col-md-4">
	                        <label for="Title"> <?= lang('membership_year'); ?>  :</label>
	                        <div class="input-group">
	                        	<input type="text" name="membership_year" value="<?php if($member['membership_year']) { echo $member['membership_year']; } ?>" class="form-control inputmasked" data-inputmask='"mask": "9999"' data-mask>
	                    		<div class="input-group-addon">ዓ.ም</div>

	                    	</div>
	                    </div>

	                    <div class="col-md-4">
	                        <label> <?= lang('cause_of_membership'); ?>  :</label>
	                        <select name="membership_cause" class="form-control s2">
	                        	<option value="አልተመረጠም" <?php if($member['membership_cause'] == 'አልተመረጠም') echo 'selected'; ?> >አልተመረጠም</option>
	                        	<?php foreach($membership_causes as $membership_cause) { ?>
		                        	<option <?php if($membership_cause['membership_cause_title'] == $member['membership_cause']){echo 'selected'; }?> value="<?= $membership_cause['membership_cause_title']; ?>"> 
		                        		<?= $membership_cause['membership_cause_title']; ?> 
		                        	</option>
		                        <?php } ?>
	                        </select>
	                    </div>

	                    <div class="col-md-4">
	                        <label> <?= lang('level_of_membership'); ?>  :</label>
	                        <select name="membership_level" class="form-control s2">
	                        	<option value="አልተመረጠም" <?php if($member['membership_level'] == 'አልተመረጠም') echo 'selected'; ?> >አልተመረጠም</option>
	                        	<?php foreach($membership_levels as $membership_level) { ?>
		                        	<option <?php if($membership_level['membership_level_title'] == $member['membership_level']){echo 'selected'; }?> value="<?= $membership_level['membership_level_title']; ?>"> 
		                        		<?= $membership_level['membership_level_title']; ?> 
		                        	</option>
		                        <?php } ?>
	                        </select>
	                    </div>
					</div>
					<p/>
					<div class="row">
					<p/>
	                    <div class="col-md-4 serving_as">
	                        <label> የአገልግሎት ዘርፍ :</label>
	                        <select name="ministry" class="form-control s2">
	                        	<option value="አልተመረጠም" <?php if($member['ministry'] == 'አልተመረጠም') echo 'selected'; ?> >አልተመረጠም</option>
	                        	<?php foreach($ministries as $ministry) { ?>
		                        	<option <?php if($ministry['ministry_title'] == $member['ministry']){echo 'selected'; }?> value="<?= $ministry['ministry_title']; ?>"> 
		                        		<?= $ministry['ministry_title']; ?> 
		                        	</option>
		                        <?php } ?>
	                        </select>
	                    </div>

					</div>
					<p/>
				</div>
			</div>






		    <div class="box box-info clearfix">
		        <div class="box-header  with-border">
		            <h3 class="box-title"> የቤተሰብ መረጃ </h3>
		        </div><!-- /.box-header -->
		        <div class="box-body">
		            <div class="form-group col-md-6">
		                <label> የጋብቻ ሁኔታ :</label>
		                <select name="marital_status" class="form-control s2" id="maritalStatus">
		                    <option value="አልተመረጠም" <?php if($member['marital_status'] == 'አልተመረጠም') { echo 'selected'; } ?> >አልተመረጠም</option>
		                    <option disabled>-----------------------</option>
		                    <option value="ያላገባ/ች" <?php if($member['marital_status'] == 'ያላገባ/ች') { echo 'selected'; } ?> >ያላገባ/ች</option>
		                    <option value="ያገባ/ች" <?php if($member['marital_status'] == 'ያገባ/ች') { echo 'selected'; } ?> >ያገባ/ች</option>		                    
		                    <option value="የፈታ/ች" <?php if($member['marital_status'] == 'የፈታ/ች') { echo 'selected'; } ?> >የፈታ/ች</option>
		                </select>
		            </div>

		            <div class="form-group col-md-6">
		                <label> የትዳር አጋር:</label>
		                <select name="spouse" class="form-control" id="spouse" disabled>
		                    <option value="" <?php if($member['spouse'] == NULL) { echo 'selected'; }?> >አልተመረጠም</option>
		                    <option disabled>-----------------------</option>
		                    <?php foreach($members as $m) { ?>
		                    <option <?php if($member['spouse'] == $m['id']) { echo 'selected'; }?> value="<?= $m['id']; ?>"><?= $m['text']; ?></option>
		                    <?php } ?>
		                </select>
		            </div>
		        </div>
		    </div>


            <input type="submit" class="btn btn-primary" value="ቀይር" Name="addchurchsubmit">
			<a href="<?= base_url(); ?>admin/listmembers" class="btn">Cancel</a>


		</form>



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->





<script type="text/javaScript">
	$(document).ready(function() {
		function toggle(className, obj) {
		    if ( obj.checked ) $(className).show();
		    else $(className).hide();
		}

	    $(function () {
	        $('input').iCheck({
		      checkboxClass: 'icheckbox_square-blue',
		      radioClass: 'iradio_square-blue',
		      increaseArea: '20%' /* optional */
		    });
	    });

	    $("#spouse").select2();

	    var mstatus = $("#maritalStatus").val();
		if(mstatus == "ያገባ/ች") {
			$("#spouse").prop('disabled', false);
		} 
		else {
			$("#spouse").prop('disabled', true);
		}

	    $("#maritalStatus").change(function(){
	    	var selected = $(this).val();
	    	if(selected == "ያገባ/ች") {
	    		$("#spouse").prop('disabled', false);
	    	} 
	    	else {
	    		$("#spouse").prop('disabled', true);
	    	}
	    });

		$(".inputmasked").inputmask(); 



	    $("#kifle_ketema").change(function(){
	    	var kifle_ketema_title = $("#kifle_ketema").val();
	    	if(kifle_ketema_title != '') {
	    		$.ajax({
	    			url: "<?php echo base_url(); ?>admin/fetch_kebeles",
	    			method: "POST",
	    			data: {kifle_ketema_title: kifle_ketema_title},
	    			success: function(data) {
	    				$("#kebele").html(data);
			    		$("#mender").html('<option value="">አልተመረጠም</option>');
	    			}
	    		});
	    	} else {
	    		$("#kebele").html('<option value="">አልተመረጠም</option>');
	    		$("#mender").html('<option value="">አልተመረጠም</option>');
	    	}
	    });

	    $("#kebele").change(function(){
	    	var kebele_title = $("#kebele").val();
	    	if(kebele_title != ''){
	    		$.ajax({
	    			url: "<?php echo base_url(); ?>admin/fetch_menders",
	    			method: "POST",
	    			data:{kebele_title: kebele_title},
	    			success: function(data) {
	    				$("#mender").html(data);
	    			}
	    		});
	    	} else {
	    		$("#mender").html('<option value="">አልተመረጠም</option>');
	    	}
	    });


	});
</script>













