


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
		                    <div class="col-md-2">
		                        <label> <?= lang('birth_date'); ?> :</label>
		                        <input type="text" name="birthdate" max='31'
		                               class="form-control">
		                    </div>
		                    <div class="col-md-2">
		                        <label> <?= lang('birth_month'); ?> :</label>
		                        <input type="text" name="birthmonth" max='31'
		                               class="form-control">
		                    </div>
		                    <div class="col-md-2">
		                        <label> <?= lang('birth_year'); ?> :</label>
		                        <input type="text" name="birthyear" maxlength="4" size="5"
		                               class="form-control">
		                    </div>
		                    <div class="col-md-2">
		                        <label> <?= lang('hide_age'); ?>  </label><br/>
		                        <input type="checkbox" name="HideAge" value="1" >
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>




			<div class="box box-info clearfix">
				<div class="box-header">
					<h3 class="box-title"><?= lang('contact_info') ?></h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<div class="row">
						<div class="form-group col-md-6">
							<label><?= lang('mobile_phone') ?>:</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="glyphicon glyphicon-earphone"></i>
								</div>
								<input type="text" Name="mobilephone" value="" size="30" maxlength="30" class="form-control" data-inputmask='' data-mask>
								<input type="checkbox" name="NoFormat_HomePhone" value="1"> <?= lang('do_not_auto_format') ?>
							</div>
						</div>
						<div class="form-group col-md-6">
							<label><?= lang('work_phone') ?>:</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="glyphicon glyphicon-earphone"></i>
								</div>
								<input type="text" name="workphone" value="" size="30" maxlength="30" class="form-control" data-inputmask='"mask": ""' data-mask/>
								<input type="checkbox" name="NoFormat_WorkPhone" value="1"> <?= lang('do_not_auto_format') ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label><?= lang('email') ?> :</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="glyphicon glyphicon-envelope"></i>
								</div>
								<input type="text" Name="email" class="form-control" value="" size="30" maxlength="100"><font color="red"><BR></font>
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

	                    <div class="col-md-3">
	                        <label for="Title"> <?= lang('membership_year'); ?>  :</label>
	                        <input type="text" name="membership_year" maxlength="4" size="5" class="form-control">
	                    </div>

	                    <div class="col-md-5">
	                        <label> <?= lang('cause_of_membership'); ?>  :</label>
	                        <select name="Gender" class="form-control">
	                        	<option value="0"> <?= lang('by_baptism'); ?></option>
	                        	<option value="0" disabled >-----------------
	                            <option value="1"> <?= lang('female'); ?>  </option>
	                            <option value="2"> <?= lang('male'); ?>  </option>
	                        </select>
	                    </div>

	                    <div class="col-md-4">
	                        <label> <?= lang('cause_of_membership'); ?>  :</label>
	                        <select name="Gender" class="form-control">
	                        	<option value="0"> <?= lang('by_baptism'); ?></option>
	                        	<option value="0" disabled >-----------------
	                            <option value="1"> <?= lang('female'); ?>  </option>
	                            <option value="2"> <?= lang('male'); ?>  </option>
	                        </select>
	                    </div>
					</div>
					<p/>
					<div class="row">
					<p/>
<!-- 	                    <div class="col-md-2">
	                        <label> <?= lang('do_you_serve'); ?>  </label><br/>
	                        <input type="checkbox" name="do_you_serve" onclick="toggle('.serving_as', this)" value="1" checked><p/>
	                    </div>
 -->
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

</script>













