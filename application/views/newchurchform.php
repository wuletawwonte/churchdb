



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




			<?php if($this->session->flashdata('success')) : ?>
		        <div class="callout callout-info">
		            <?php echo $this->session->flashdata('success'); ?>
		        </div>
			<?php endif; ?>





		<form method="post" action="<?php echo base_url(); ?>sadmin/registerchurch" name="ChurchAdd">
			<div class="box box-info clearfix">
				<div class="box-header">
					<h3 class="box-title">Church Info</h3>

<!-- 					<div class="pull-right"><br/>
						<input type="submit" class="btn btn-primary" value="Save" name="ChurchAdd">
					</div>
 -->				

 				</div><!-- /.box-header -->
				
				<div class="box-body">
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label>Name</label>
								<input type="text" name="name" maxlength="100"  class="form-control" required>
							</div>

							<div class="col-md-4">
								<label>Short Name</label>
								<input type="text" name="short_name" maxlength="20"  class="form-control" required>
							</div>

							<div class="col-md-2">
								<label>Mini logo</label>
								<input type="text" name="mini_logo" maxlength="3"  class="form-control" required>
							</div>

				            <div class="form-group col-md-6">
				                <label>Denomination</label>
				                <select name="denomination" class="form-control">
				                    <option value="መካነኢየሱስ">መካነኢየሱስ</option>
				                    <option value="ቃለሕይወት">ቃለሕይወት</option>
				                    <option value="ሙሉወንጌል">ሙሉወንጌል</option>
				                    <option value="መሰረተክርስቶስ">መሰረተክርስቶስ</option>
				                    <option value="0" disabled>-----------------------</option>
				                    <option value="ሌላ">ሌላ</option>
				                </select>
				            </div>

							<div class="form-group col-md-6">
								<label>Description</label>
								<textarea class="form-control" rows="3" name="description"></textarea>
							</div> 
						</div>
						<p/>
						<div class="row">
						</div>
						<p/>
						</p></p>
					</div>
				</div>
			</div>


			<div class="box box-info clearfix">
				<div class="box-header">
					<h3 class="box-title">Address Info</h3>
								
				</div><!-- /.box-header -->
				<div class="box-body">
					<div class="row">
						<div class="col-md-6">
							<label>City:</label>
								<input type="text" Name="Address1" value="" size="50" maxlength="250"  class="form-control">
						</div>
						<div class="col-md-6">
							<label>Kebele:</label>
							<input type="text" Name="Address2" value="" size="50" maxlength="250"  class="form-control">
						</div>
						<div class="col-md-6">
							<label>Region:</label>
							<input type="text" Name="City" value="" maxlength="50"  class="form-control">
						</div>
					</div>
				</div>
			</div>


            <input type="submit" class="btn btn-primary" value="Save" Name="addchurchsubmit">
			<input type="submit" class="btn btn-info" value="Save and Add" name="addchurchsubmit">
			<input type="button" class="btn" value="Cancel">




		</form>







    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
