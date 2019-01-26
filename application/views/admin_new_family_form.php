


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= lang('family_registration'); ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-users"></i> <?= lang('people'); ?></a></li>
        <li class="active"><?= lang('add_new_person'); ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">





		<form method="post" action="" name="PersonEditor">

<!-- 		    <div class="alert alert-info alert-dismissable">
		        <i class="fa fa-info"></i>
		        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		        <strong><span style="color: red;"> Red text  </span></strong> indicates items inherited from the associated family record.
		    </div>
 -->
		    <div class="box box-info clearfix">
		        <div class="box-header">
		            <h3 class="box-title"> <?= lang('family_info'); ?>  </h3>
		        </div><!-- /.box-header -->
		        <div class="box-body">
		            <div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label> <?= lang('family_name') ?>:</label>
								<input type="text" Name="Name" id="FamilyName" value="" maxlength="48"  class="form-control">
							</div>
						</div><p/>		            
		                <div class="row">
		                    <div class="col-md-2">
		                        <label> <?= lang('gender'); ?>  :</label>
		                        <select name="Gender" class="form-control">
		                        	<option value="0"> <?= lang('choose_gender'); ?></option>
		                        	<option value="0" disabled >-----------------
		                            <option value="1"> <?= lang('female'); ?>  </option>
		                            <option value="2"> <?= lang('male'); ?>  </option>
		                        </select>
		                    </div>
		                    <div class="col-md-3">
		                        <label for="Title"> <?= lang('title'); ?>  :</label>
		                        <input type="text" name="Title" id="Title"
		                               value="" class="form-control">
		                    </div>
		                </div>
		                <p/>
		                <div class="row">
		                    <div class="col-md-4">
		                        <label for="FirstName"> <?= lang('first_name'); ?>  :</label>
		                        <input type="text" name="FirstName" id="FirstName" class="form-control">
		        				<br><font color="red"></font>
		                    </div>

		                    <div class="col-md-2">
		                        <label for="MiddleName"> <?= lang('middle_name'); ?>  :</label>
		                        <input type="text" name="MiddleName" id="MiddleName" class="form-control">

		                    </div>

		                    <div class="col-md-6">
		                        <label for="LastName"> <?= lang('last_name'); ?>  :</label>
		                        <input type="text" name="LastName" id="LastName" class="form-control">                    
		                    </div>
		                </div>
		                <p/>
		                <div class="row">
		                    <div class="col-md-2">
		                        <label> <?= lang('birth_month'); ?>  :</label>
		                        <select name="BirthMonth" class="form-control">
		                            <option value="0" > <?= lang('select_month'); ?>  </option>
		                            <option value="0" > -----------------
		                            <option value="01" > <?= lang('january'); ?>  </option>
		                            <option value="02" > <?= lang('february'); ?>  </option>
		                            <option value="03" > <?= lang('march'); ?>  </option>
		                            <option value="04" > <?= lang('april'); ?>  </option>
		                            <option value="05" > <?= lang('may'); ?>  </option>
		                            <option value="06" > <?= lang('june'); ?>  </option>
		                            <option value="07" > <?= lang('july'); ?>  </option>
		                            <option value="08" > <?= lang('august'); ?>  </option>
		                            <option value="09" > <?= lang('september'); ?>  </option>
		                            <option value="10" > <?= lang('october'); ?>  </option>
		                            <option value="11" > <?= lang('november'); ?>  </option>
		                            <option value="12" > <?= lang('december'); ?>  </option>
		                        </select>
		                    </div>
		                    <div class="col-md-2">
		                        <label> <?= lang('birth_date'); ?> :</label>
		                        <input type="text" name="BirthDate" max='31'
		                               class="form-control">
		                    </div>
		                    <div class="col-md-2">
		                        <label> <?= lang('birth_year'); ?> :</label>
		                        <input type="text" name="BirthYear" value="" maxlength="4" size="5"
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
									<i class="fa fa-phone"></i>
								</div>
								<input type="text" Name="HomePhone" value="" size="30" maxlength="30" class="form-control" data-inputmask='' data-mask>
								<input type="checkbox" name="NoFormat_HomePhone" value="1"> <?= lang('do_not_auto_format') ?>
							</div>
						</div>
						<div class="form-group col-md-6">
							<label><?= lang('work_phone') ?>:</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-phone"></i>
								</div>
								<input type="text" name="WorkPhone" value="" size="30" maxlength="30" class="form-control" data-inputmask='"mask": ""' data-mask/>
								<input type="checkbox" name="NoFormat_WorkPhone" value="1"> <?= lang('do_not_auto_format') ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label><?= lang('email') ?> :</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-envelope"></i>
								</div>
								<input type="text" Name="Email" class="form-control" value="" size="30" maxlength="100"><font color="red"><BR></font>
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

	                    <div class="col-md-2">
	                        <label for="Title"> <?= lang('membership_year'); ?>  :</label>
	                        <input type="text" name="membership_year" maxlength="4" size="5" class="form-control">
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
	                    <div class="col-md-2">
	                        <label> <?= lang('do_you_serve'); ?>  </label><br/>
	                        <input type="checkbox" name="do_you_serve" onclick="toggle('.serving_as', this)" value="1" checked>
	                    </div>

	                    <div class="col-md-4 serving_as">
	                        <label> <?= lang('serving_as'); ?>  :</label>
	                        <select name="Gender" class="form-control">
	                        	<option value="0"> <?= lang('by_baptism'); ?></option>
	                        	<option value="0" disabled >-----------------
	                            <option value="1"> <?= lang('female'); ?>  </option>
	                            <option value="2"> <?= lang('male'); ?>  </option>
	                        </select>
	                    </div>

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










