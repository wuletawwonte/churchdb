
<script type="text/javascript" src="<?= base_url('assets/plugins/jquery.inputmask.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/jquery.inputmask.date.extensions.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/jquery.inputmask.phone.extensions.js'); ?>"></script>



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





		<form method="post" action="<?= base_url('admin/savememberchanges') ?>" name="PersonEditor">

<!-- 		    <div class="alert alert-info alert-dismissable">
		        <i class="fa fa-info"></i>
		        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		        <strong><span style="color: red;"> Red text  </span></strong> indicates items inherited from the associated family record.
		    </div>
 -->


     <?php if($this->session->flashdata('success')) { ?>
        <div class="callout callout-info">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php } else if($this->session->flashdata('error')) { ?>
        <div class="callout callout-error">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php } ?>


    		<input type="text" name='id' value="<?= $member['id'] ?>" hidden>

		    <div class="box box-info clearfix">
		        <div class="box-header">
		            <h3 class="box-title"> <?= lang('personal_info'); ?>  </h3>
		        </div><!-- /.box-header -->
		        <div class="box-body">
		            <div class="form-group">
		                <div class="row">
		                    <div class="col-md-2">
		                        <label> <?= lang('gender'); ?>  :</label>
		                        <select name="gender" class="form-control">
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
		                        <label> <?= lang('hide_age'); ?>  </label><br/>
		                        <input type="checkbox" name="hide_age" <?php if($member['hide_age'] == 'on') echo 'checked';?> >
		                    </div>
		                    <div class="col-md-6">
		                        <label for="birth_place"> <?= lang('birth_place'); ?>  :</label>
		                        <input type="text" name="birth_place" value="<?= $member['birth_place'] ?>" class="form-control">                    
		                    </div>

		                </div>
		            </div>
		        </div>
		    </div>




			<div class="box box-info clearfix">
				<div class="box-header">
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
								<input type="text" name="mobile_phone" value="<?= $member['mobile_phone'] ?>" class="form-control inputmasked" data-inputmask='"mask": "(9999) 99-9999"' data-mask>
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
	                        <select name="job_type" class="form-control">
	                            <option <?php if($member['job_type'] == 'የመንግስት ስራ'){echo 'selected'; } ?> value="የመንግስት ስራ"> የመንግስት ሥራ </option>
	                            <option <?php if($member['job_type'] == 'ነጋዴ'){echo 'selected'; } ?> value="ነጋዴ"> ነጋዴ </option>
	                            <option <?php if($member['job_type'] == 'መንግስታዊ ያልሆነ ድርጅት'){echo 'selected'; } ?> value="መንግስታዊ ያልሆነ ድርጅት"> መንግስታዊ ያልሆነ ድርጅት </option>
	                            <option <?php if($member['job_type'] == 'የግል ሥራ'){echo 'selected'; } ?> value="የግል ሥራ"> የግል ሥራ </option>
	                            <option <?php if($member['job_type'] == 'የቤት እመቤት'){echo 'selected'; } ?> value="የቤት እመቤት"> የቤት እመቤት </option>
	                            <option <?php if($member['job_type'] == 'ተማሪ'){echo 'selected'; } ?> value="ተማሪ"> ተማሪ </option>
	                            <option <?php if($member['job_type'] == 'የጉልበት ሰራተኛ'){echo 'selected'; } ?> value="የጉልበት ሰራተኛ"> የጉልበት ሠራተኛ </option>
	                            <option <?php if($member['job_type'] == 'ሥራ የሌለው'){echo 'selected'; } ?> value="ሥራ የሌለው"> ሥራ የሌለው </option>
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
				<div class="box-header">
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
	                        <select name="couse_of_membership" class="form-control">
	                        	<option <?php if($member['cause_of_membership'] == 'በጥምቀት'){echo 'selected'; }?> value="በጥምቀት"> በጥምቀት </option>
	                            <option <?php if($member['cause_of_membership'] == 'በእምነት ማጽኛ ትምህርት'){echo 'selected'; }?> value="በእምነት ማጽኛ ትምህርት"> በእምነት ማጽኛ ትምህርት </option>
	                            <option <?php if($member['cause_of_membership'] == 'ከሌላ መ/ኢ/ማ/ም በዝውውር'){echo 'selected'; }?> value="ከሌላ መ/ኢ/ማ/ም በዝውውር"> ከሌላ መ/ኢ/ማ/ም በዝውውር </option>
	                            <option <?php if($member['cause_of_membership'] == 'ከሌላ ወ/አ/ክርስቲያናት በመምጣት'){echo 'selected'; }?> value="ከሌላ ወ/አ/ክርስቲያናት በመምጣት"> ከሌላ ወ/አ/ክርስቲያናት በመምጣት </option>
	                        </select>
	                    </div>

	                    <div class="col-md-4">
	                        <label> <?= lang('level_of_membership'); ?>  :</label>
	                        <select name="level_of_membership" class="form-control">
	                        	<option <?php if($member['level_of_membership'] == 'ቆራቢ አባል'){echo 'selected'; }?> value="ቆራቢ አባል"> ቆራቢ አባል </option>
	                        	<option <?php if($member['level_of_membership'] == 'የድነት ትምህርት ተማሪ'){echo 'selected'; }?> value="የድነት ትምህርት ተማሪ"> የድነት ትምህርት ተማሪ </option>
	                            <option <?php if($member['level_of_membership'] == 'የእምነት ማጽኛ ተማሪ'){echo 'selected'; }?> value="የእምነት ማጽኛ ተማሪ"> የእምነት ማጽኛ ተማሪ </option>
	                        </select>
	                    </div>
					</div>
					<p/>
					<div class="row">
					<p/>
	                    <div class="col-md-4 serving_as">
	                        <label> <?= lang('serving_as'); ?>  :</label>
	                        <select name="serving_as" class="form-control">
	                        	<option <?php if($member['serving_as'] == 'አያገለግሉም'){echo 'selected'; }?> value="አያገለግሉም">አያገለግሉም</option>
	                        	<option <?php if($member['serving_as'] == 'አስተናጋጅ'){echo 'selected'; }?> value="አስተናጋጅ">አስተናጋጅ</option>
	                            <option <?php if($member['serving_as'] == 'ኳየር'){echo 'selected'; }?> value="ኳየር">ኳየር</option>
	                            <option <?php if($member['serving_as'] == 'አስተዳደር'){echo 'selected'; }?> value="አስተዳደር">አስተዳደር</option>
	                            <option <?php if($member['serving_as'] == 'ወንጌላዊ'){echo 'selected'; }?> value="ወንጌላዊ">ወንጌላዊ</option>
	                        </select>
	                    </div>

					</div>
					<p/>
				</div>
			</div>






		    <div class="box box-info clearfix">
		        <div class="box-header">
		            <h3 class="box-title"> <?= lang('family_info') ?>  </h3>
		            <div class="pull-right"><br/>
		                <button class="btn btn-primary" name="PersonSubmit"><?= lang('continue') ?></button>
		            </div>
		        </div><!-- /.box-header -->
		        <div class="box-body">
		            <div class="form-group col-md-6">
		                <label> <?= lang('family_role') ?> :</label>
		                <select name="family_role" class="form-control">
		                    <option <?php if($member['family_role'] == 'አልተመረጠም'){echo 'selected'; }?> value="አልተመረጠም">አልተመረጠም</option>
		                    <option disabled>-----------------------</option>
		                    <option <?php if($member['family_role'] == 'ባል'){echo 'selected'; }?> value="ባል">ባል</option>
		                    <option <?php if($member['family_role'] == 'ሚስት'){echo 'selected'; }?> value="ሚስት">ሚስት</option>
		                    <option <?php if($member['family_role'] == 'ወንድ ልጅ'){echo 'selected'; }?> value="ወንድ ልጅ">ወንድ ልጅ</option>
		                    <option <?php if($member['family_role'] == 'ሴት ልጅ'){echo 'selected'; }?> value="ሴት ልጅ">ሴት ልጅ</option>
		                </select>
		            </div>

		            <div class="form-group col-md-6">
		                <label> <?= lang('family') ?>:</label>
		                <select name="family" size="8" class="form-control">
		                    <option <?php if($member['family_id'] == 0){echo 'selected'; }?> value="0"> <?= lang('unassigned') ?>  </option>
		                    <option value="0"> <?= lang('create_new_family_by_name') ?>  </option>
		                    <option disabled>-----------------------</option>
		                    <?php foreach($families as $family) { ?>
		                    <option <?php if($member['family_id'] == $family['id']){echo 'selected'; }?> value="<?= $family['id']; ?>"><?= $family['name']; ?></option>
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

</script>













