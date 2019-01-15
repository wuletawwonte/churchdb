



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Church
        <small>Registration</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>sadmin/churches"><i class="fa fa-institution"></i> Churches</a></li>
        <li class="active">Register</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">





		<form method="post" action="<?php echo base_url(); ?>sadmin/registerchurch" name="ChurchAdd">
			<div class="box box-info clearfix">
				<div class="box-header">
					<h3 class="box-title">Church Info</h3>
					<div class="pull-right"><br/>
						<input type="submit" class="btn btn-primary" value="Save" name="ChurchAdd">
					</div>
				</div><!-- /.box-header -->
				<div class="box-body">
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label>Church Name</label>
								<input type="text" Name="Name" id="FamilyName" value="" maxlength="48"  class="form-control" required>
							</div>
						</div>
						<p/>
						<div class="row">
							<div class="col-md-6">
								<label>City:</label>
									<input type="text" Name="Address1" value="" size="50" maxlength="250"  class="form-control" required>
							</div>
							<div class="col-md-6">
								<label>Kebele:</label>
								<input type="text" Name="Address2" value="" size="50" maxlength="250"  class="form-control" required>
							</div>
							<div class="col-md-6">
								<label>Region:</label>
								<input type="text" Name="City" value="" maxlength="50"  class="form-control" required>
							</div>
						</div>
						<p/>
						</p></p>
					</div>
				</div>
			</div>


			<div class="box box-info clearfix">
				<div class="box-header">
					<h3 class="box-title">Contact Info</h3>
					<div class="pull-right"><br/>
						<input type="submit" class="btn btn-primary" value="Save" name="FamilySubmit" >
					</div>
				</div><!-- /.box-header -->
				<div class="box-body">
					<div class="row">
						<div class="form-group col-md-6">
							<label>Office Phone:</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-phone"></i>
								</div>
								<input type="text" Name="HomePhone" value="" size="30" maxlength="30" class="form-control" data-inputmask='sPhoneFormat' data-mask>
								<input type="checkbox" name="NoFormat_HomePhone" value="1" >Do not auto-format
							</div>
						</div>
						<div class="form-group col-md-6">
							<label>Work Phone:</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-phone"></i>
								</div>
								<input type="text" name="WorkPhone" value="" size="30" maxlength="30" class="form-control" data-inputmask='' data-mask/>
								<input type="checkbox" name="NoFormat_WorkPhone" value="1" >Do not auto-format
							</div>
						</div>
						<div class="form-group col-md-6">
							<label>Mobile Phone:</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-phone"></i>
								</div>
								<input type="text" name="CellPhone" value="" size="30" maxlength="30" class="form-control" data-inputmask='' data-mask>
								<input type="checkbox" name="NoFormat_CellPhone" value="1" >Do not auto-format
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label>Email:</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-envelope"></i>
								</div>
								<input type="text" Name="Email" class="form-control" value="" size="30" maxlength="100"><font color="red"></font>
							</div>
						</div>
						<div class="form-group col-md-4">
							<label><?= gettext('Send Newsletter') ?>:</label><br/>
							<input type="checkbox" Name="SendNewsLetter" value="1">
						</div>
					</div>
				</div>
			</div>


            <input type="submit" class="btn btn-primary" value="Save" Name="ChurchAdd">
			<input type="submit" class="btn btn-info" value="Save and Add" name="ChurchAdd">
			<input type="button" class="btn" value="Cancel" form="ChurchAdd">




		</form>







    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
