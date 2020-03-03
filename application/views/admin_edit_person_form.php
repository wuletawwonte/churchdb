
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





		<form method="post" action="<?= base_url('admin/savememberchanges') ?>" enctype="multipart/form-data" name="PersonEditor">


	     <?php if($this->session->flashdata('success')) { ?>
	        <div class="callout callout-info">
	            <?php echo $this->session->flashdata('success'); ?>
	        </div>
	    <?php } else if($this->session->flashdata('error')) { ?>
	        <div class="callout callout-danger">
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
			                    <button type="button" class="btn btn-lg btn-primary" onclick="document.getElementById('avatarInput').click();"><i class="fa fa-folder-open"></i></button>
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
					<div class="row">
	                    <div class="col-md-4">
	                        <label> <?= lang('job_type'); ?>  :</label>
	                        <select name="job_type" class="form-control s2">
				                <?php foreach($job_types as $job_type) { ?>
			                        <option value="<?= $job_type['job_type_id'] ?>" <?php if($member['job_type'] == $job_type['job_type_id']) echo 'selected'; ?>> 
			                          <?= $job_type['job_type_title']; ?> 
			                        </option>
			                    <?php } ?>

	                        </select>
	                    </div>

	                    <div class="col-md-4">
	                        <label for="workplace_name"> <?= lang('workplace_name'); ?>  :</label>
	                        <input type="text" name="workplace_name" value="<?= $member['workplace_name'] ?>" class="form-control">                    
	                    </div>


						<div class="form-group col-md-4">
							<label><?= lang('work_phone') ?>:</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="glyphicon glyphicon-phone-alt"></i>
								</div>
								<input type="text" name="workplace_phone" value="<?= $member['workplace_phone'] ?>" class="form-control inputmasked" data-inputmask='"mask": "(999) 999-9999"' data-mask/>
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
	                        	<input type="text" name="membership_year" value="<?= $member['membership_year'] ?>" class="form-control inputmasked" data-inputmask='"mask": "9999"' data-mask>
	                    		<div class="input-group-addon">ዓ.ም</div>

	                    	</div>
	                    </div>

	                    <div class="col-md-4">
	                        <label> <?= lang('cause_of_membership'); ?>  :</label>
	                        <select name="membership_cause" class="form-control s2">
	                        	<?php foreach($membership_causes as $membership_cause) { ?>
		                        	<option <?php if($membership_cause['membership_cause_id'] == $member['membership_cause']){echo 'selected'; }?> value="<?= $membership_cause['membership_cause_id']; ?>"> 
		                        		<?= $membership_cause['membership_cause_title']; ?> 
		                        	</option>
		                        <?php } ?>
	                        </select>
	                    </div>

	                    <div class="col-md-4">
	                        <label> <?= lang('level_of_membership'); ?>  :</label>
	                        <select name="membership_level" class="form-control s2">
	                        	<?php foreach($membership_levels as $membership_level) { ?>
		                        	<option <?php if($membership_level['membership_level_id'] == $member['membership_level']){echo 'selected'; }?> value="<?= $membership_level['membership_level_id']; ?>"> 
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
	                        <label> <?= lang('serving_as'); ?>  :</label>
	                        <select name="serving_as" class="form-control s2">
	                        	<?php foreach($ministries as $ministry) { ?>
		                        	<option <?php if($ministry['ministry_id'] == $member['ministry']){echo 'selected'; }?> value="<?= $ministry['ministry_id']; ?>"> 
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
		                <select name="spouse" class="form-control s2" id="spouse" disabled>
		                    <option value="አልተመረጠም" selected>አልተመረጠም</option>
		                    <option disabled>-----------------------</option>
		                    <?php foreach($members as $m) { ?>
		                    <option <?php if($member['spouse'] == $m['id']) { echo 'selected'; }?> value="<?= $m['id']; ?>"><?= $m['firstname'].' '.$m['middlename']; ?></option>
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
	});
</script>













