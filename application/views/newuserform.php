



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Account
        <small>Registration</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>sadmin/users"><i class="fa fa-users"></i> Churches</a></li>
        <li class="active">Register</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">




			<?php if($this->session->flashdata('success')) : ?>
		        <div class="callout callout-info">
		            <?php echo $this->session->flashdata('success'); ?>
		        </div>
			<?php endif; ?>





		<form method="post" action="<?php echo base_url(); ?>sadmin/registeruser">
			<div class="box box-info clearfix">
				<div class="box-header">
					<h3 class="box-title">Account Info</h3>

<!-- 					<div class="pull-right"><br/>
						<input type="submit" class="btn btn-primary" value="Save" name="ChurchAdd">
					</div>
 -->				

 				</div><!-- /.box-header -->
				
				<div class="box-body">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label>Initials</label>
								<input type="text" name="firstname" placeholder="አቶ, ወሮ"  class="form-control">
							</div>
							<div class="col-md-4">
								<label>First Name</label>
								<input type="text" name="firstname" maxlength="48"  class="form-control" required>
							</div>
							<div class="col-md-5">
								<label>Last Name</label>
								<input type="text" name="lastname" maxlength="48"  class="form-control" required>
							</div>
						</div>
						<p/>
						<div class="row">
							<div class="col-md-6">
								<label><?php echo lang('Username'); ?>:</label>
									<input type="text" Name="username" value="" size="50" maxlength="250"  class="form-control" required>
							</div>
							<div class="col-md-6">
								<label><?php echo lang('Password'); ?>:</label>
								<input type="password" Name="password" value="" size="50" maxlength="250"  class="form-control" required>
							</div>
						</div>
						<p/>
						</p></p>
					</div>
				</div>
			</div>

			<div class="box box-info clearfix">
		        <div class="box-header">
		            <h3 class="box-title">Church Info</h3>
		        </div><!-- /.box-header -->
		        <div class="box-body">
		            <div class="form-group col-md-6">
		                <label>System Role:</label>
		                <select name="role" class="form-control">
		                    <option value="Unassigned">Unassigned</option>
		                    <option value="0" disabled>-----------------------</option>
		                    <option value="Administrator">Administrator&nbsp;
		                    <option value="Standard-User">Standard-User&nbsp;
		                </select>
		            </div>

		            <div class="form-group col-md-6">
		                <label>Church:</label>
		                <select name="church" size="8" class="form-control">
		                    <option value="0" selected>Unassigned</option>
		                    <option value="0" disabled>-----------------------</option>
		                    <?php foreach($churches as $church) { ?>
			                    <option value="<?php echo $church['id']; ?>"><?php echo $church['name']; ?>           
			                <?php } ?>

		                </select>
		            </div>
		        </div>
		    </div>



            <input type="submit" class="btn btn-primary" value="Save" Name="addusersubmit">
			<input type="submit" class="btn btn-info" value="Save and Add" name="addusersubmit">
			<input type="button" class="btn" value="Cancel">

		</form>







    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
