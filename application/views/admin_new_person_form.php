
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





		<form method="post" action="<?= base_url('admin/savemember') ?>" name="PersonEditor">

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
		                            <option value="<?= lang('female'); ?>"> <?= lang('female'); ?>  </option>
		                            <option value="<?= lang('male'); ?>"> <?= lang('male'); ?>  </option>
		                        </select>
		                    </div>
		                    <div class="col-md-3">
		                        <label for="Title"> <?= lang('title'); ?>  :</label>
		                        <input type="text" name="Title" class="form-control">
		                    </div>
		                </div>
		                <p/>
		                <div class="row">
		                    <div class="col-md-4">
		                        <label for="firstname"> <?= lang('first_name'); ?>  :</label>
		                        <input type="text" name="firstname" class="form-control">
		        				<br><font color="red"></font>
		                    </div>

		                    <div class="col-md-2">
		                        <label for="middlename"> <?= lang('middle_name'); ?>  :</label>
		                        <input type="text" name="middlename" class="form-control">

		                    </div>

		                    <div class="col-md-6">
		                        <label for="lastname"> <?= lang('last_name'); ?>  :</label>
		                        <input type="text" name="lastname" class="form-control">                    
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
				                  <input type="text" class="form-control family-head inputmasked" name="birthdate" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
				                </div>
				                <!-- /.input group -->
				            </div>
		                    <div class="col-md-2">
		                        <label> <?= lang('hide_age'); ?>  </label><br/>
		                        <input type="checkbox" name="HideAge" value="1" >
		                    </div>
		                    <div class="col-md-6">
		                        <label for="lastname"> <?= lang('birth_place'); ?>  :</label>
		                        <input type="text" name="lastname" class="form-control">                    
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
								<input type="text" name="mobile_phone" class="form-control inputmasked" data-inputmask='"mask": "(9999) 99-9999"' data-mask>
							</div>
						</div>

						<div class="form-group col-md-6">
							<label><?= lang('email') ?> :</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="glyphicon glyphicon-envelope"></i>
								</div>
								<input type="email" Name="email" class="form-control" value="" size="50" maxlength="50">
							</div>
						</div>

					</div><p/>
					<div class="row">
	                    <div class="col-md-4">
	                        <label> <?= lang('job_type'); ?>  :</label>
	                        <select name="job_type" class="form-control">
	                            <option value="የመንግስት ስራ"> የመንግስት ሥራ </option>
	                            <option value="ነጋዴ"> ነጋዴ </option>
	                            <option value="መንግስታዊ ያልሆነ ድርጅት"> መንግስታዊ ያልሆነ ድርጅት </option>
	                            <option value="የግል ሥራ"> የግል ሥራ </option>
	                            <option value="የቤት እመቤት"> የቤት እመቤት </option>
	                            <option value="ተማሪ"> ተማሪ </option>
	                            <option value="የጉልበት ሰራተኛ"> የጉልበት ሠራተኛ </option>
	                            <option value="ሥራ የሌለው"> ሥራ የሌለው </option>
	                        </select>
	                    </div>

	                    <div class="col-md-4">
	                        <label for="workplace_name"> <?= lang('workplace_name'); ?>  :</label>
	                        <input type="text" name="workplace_name" class="form-control">                    
	                    </div>


						<div class="form-group col-md-4">
							<label><?= lang('work_phone') ?>:</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="glyphicon glyphicon-phone-alt"></i>
								</div>
								<input type="text" name="workphone" class="form-control inputmasked" data-inputmask='"mask": "(999) 999-9999"' data-mask/>
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
	                        	<input type="text" name="membership_year" class="form-control inputmasked" data-inputmask='"mask": "9999"' data-mask>
	                    		<div class="input-group-addon">ዓ.ም</div>

	                    	</div>
	                    </div>

	                    <div class="col-md-4">
	                        <label> <?= lang('cause_of_membership'); ?>  :</label>
	                        <select name="couse_of_membership" class="form-control">
	                        	<option value="በጥምቀት"> በጥምቀት </option>
	                            <option value="በእምነት ማጽኛ ትምህርት"> በእምነት ማጽኛ ትምህርት </option>
	                            <option value="ከሌላ መ/ኢ/ማ/ም በዝውውር"> ከሌላ መ/ኢ/ማ/ም በዝውውር </option>
	                            <option value="ከሌላ ወ/አ/ክርስቲያናት በመምጣት"> ከሌላ ወ/አ/ክርስቲያናት በመምጣት </option>
	                        </select>
	                    </div>

	                    <div class="col-md-4">
	                        <label> <?= lang('level_of_membership'); ?>  :</label>
	                        <select name="level_of_membership" class="form-control">
	                        	<option value="ቆራቢ አባል"> ቆራቢ አባል </option>
	                        	<option value="የድነት ትምህርት ተማሪ"> የድነት ትምህርት ተማሪ </option>
	                            <option value="የእምነት ማጽኛ ተማሪ"> የእምነት ማጽኛ ተማሪ </option>
	                        </select>
	                    </div>
					</div>
					<p/>
					<div class="row">
					<p/>
	                    <div class="col-md-4 serving_as">
	                        <label> <?= lang('serving_as'); ?>  :</label>
	                        <select name="Gender" class="form-control">
	                        	<option value="<?= lang('not_serve'); ?>"><?= lang('not_serve'); ?></option>
	                        	<option value="<?= lang('by_baptism'); ?>"><?= lang('by_baptism'); ?></option>
	                        	<option value="0" disabled >-----------------
	                            <option value="1"> <?= lang('female'); ?>  </option>
	                            <option value="2"> <?= lang('male'); ?>  </option>
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
		                <select name="FamilyRole" class="form-control">
		                    <option value="0"> <?= lang('unassigned') ?>  </option>
		                    <option value="0" disabled>-----------------------</option>
		                    <option value="0"> Head </option>
		                    <option value="0"> Mother </option>
		                    <option value="0"> Son </option>
		                    <option value="0"> Daughter </option>
		                </select>
		            </div>

		            <div class="form-group col-md-6">
		                <label> <?= lang('family') ?>:</label>
		                <select name="family" size="8" class="form-control">
		                    <option value="-1" selected> <?= lang('unassigned') ?>  </option>
		                    <option value="0"> <?= lang('create_new_family_by_name') ?>  </option>
		                    <option value="0" disabled>-----------------------</option>
		                    <?php foreach($families as $family) { ?>
		                    <option value="<?= $family['id']; ?>"><?= $family['name']; ?></option>
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













