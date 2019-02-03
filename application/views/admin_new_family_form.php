<script type="text/javascript" src="<?= base_url('assets/plugins/jquery.validate.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/jquery.inputmask.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/jquery.inputmask.date.extensions.js'); ?>"></script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= lang('family_registration'); ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="glyphicon glyphicon-user"></i> <?= lang('people'); ?></a></li>
        <li class="active"><?= lang('add_new_person'); ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">


<!-- 		    <div class="alert alert-info alert-dismissable">
		        <i class="fa fa-info"></i>
		        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		        <strong><span style="color: red;"> Red text  </span></strong> indicates items inherited from the associated family record.
		    </div>
 -->

 			<form  method='POST' id="savefamily" action="<?= base_url('admin/savefamily'); ?>">
		    <div class="box box-info clearfix">
		        <div class="box-header">
		            <h3 class="box-title"> <?= lang('family_info'); ?>  </h3>
		        </div><!-- /.box-header -->
		        <div class="box-body">
		            <div class="form-group">
						<div class="row" id="inputs">

							<div class="col-md-4">
								<label> <?= lang('first_name') ?>:</label>
								<input type="text" id="hFirstName" name="head_first_name" maxlength="48"  class="form-control family-head" required>
							</div>
							<div class="col-md-4">
								<label> <?= lang('middle_name') ?>:</label>
								<input type="text" id="hMiddleName" name="head_middle_name" maxlength="48"  class="form-control family-head" required>
							</div>
							<div class="col-md-4">
								<label> <?= lang('last_name') ?>:</label>
								<input type="text" id="hLastName" name="head_last_name" maxlength="48"  class="form-control family-head" required>
							</div>

						</div><p/>		            
						<div class="row">
							<div class="col-md-6">
								<label> <?= lang('family_name') ?>:</label>
								<input type="text" id="FamilyName" name="family_name" maxlength="48"  class="form-control" readonly>
							</div>

			                <div class="col-md-6 form-group">
				                <label><?= lang('birth_date') ?>:</label>

				                <div class="input-group">
				                  <div class="input-group-addon">
				                    <i class="glyphicon glyphicon-calendar"></i>
				                  </div>
				                  <input type="text" class="form-control family-head birthdate" id="hBirthDate" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
				                </div>
				                <!-- /.input group -->
				            </div>

						</div><p/><hr>		            
		                <div class="row">
		                    <div class="col-md-4">
		                        <label> <?= lang('living_subcity'); ?>  :</label>
		                        <select id="subcity" name="subcity" class="form-control">
		                        	<option value="<?= lang('nechsar'); ?>"><?= lang('nechsar'); ?></option>
		                        	<option value="0" disabled >-----------------
		                            <option value="<?= lang('female'); ?>"><?= lang('female'); ?></option>
		                            <option value="<?= lang('male'); ?>"><?= lang('male'); ?></option>
		                        </select>
		                    </div>
		                    <div class="col-md-4">
		                        <label> <?= lang('living_kebele'); ?>  :</label>
		                        <select id="kebele" name="kebele" class="form-control">
		                        	<option value="<?= lang('idget_ber'); ?>"><?= lang('idget_ber'); ?></option>
		                        	<option value="0" disabled >-----------------
		                            <option value="1"><?= lang('female'); ?></option>
		                            <option value="2"><?= lang('male'); ?>  </option>
		                        </select>
		                    </div>
		                    <div class="col-md-4">
		                        <label for="houseNumber"> <?= lang('house_number'); ?>  :</label>
		                        <input type="text" id="houseNumber" name="house_number" class="form-control">
		                    </div>
						</div>
						<p/>
						<div class="row">
							<div class="form-group col-md-4">
			                    <label for="homePhoneNumber">
			                    	<?= lang('home_phone') ?> :
			                    </label>
			                    <div class="input-group">
			                        <div class="input-group-addon">
			                            <i class="glyphicon glyphicon-phone-alt"></i>
			                        </div>
			                        <input type="text" id="homePhoneNumber" name="home_phone_number" value="" size="30" maxlength="100" class="form-control">
			                    </div>
			                </div>

		                    <div class="col-md-6 col-md-offset-2">
		                        <label for="weddingYear"> <?= lang('wedding_year'); ?>  :</label>
		                        <input type="text" id="weddingYear" name="wedding_year" class="form-control">
		        				<br><font color="red"></font>
		                    </div>

		                </div>

		            </div>
		        </div>
		    </div>



			<div class="box box-info clearfix">
				<div class="box-header">
					<h3 class="box-title"><?= lang('family_members') ?></h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<div class="MediumText">
						<center><?= lang('family_members_registration_table_precaution') ?></center>
					</div><br><br>
		            <div class="table-responsive">
						<table width="100%" class="table table-bordered" id="member_table">
							<thead>
								<tr class="TableHeader" align="center">
									<th><?= lang('family_role') ?></th>
									<th style="width:120px"><?= lang('first_name') ?></th>
									<th style="width:120px"><?= lang('middle_name') ?></th>
									<th style="width:120px"><?= lang('last_name') ?></th>
									<th><?= lang('birth_date') ?></th>
									<th><?= gettext('Action') ?></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<input type="hidden" name="PersonID" value="">

									<td class="TextColumn"><?= lang('husband') ?></td>
									<td class="TextColumn" name="eFirstName" id="eFirstName"></td>
									<td class="TextColumn" name="eMiddleName" id="eMiddleName"></td>
									<td class="TextColumn" name="eLastName" id="eLastName"></td>
									<td class="TextColumn" name="eBirthDate" id="eBirthDate"></td>

									<td class="TextColumn"></td>

								</tr>
							</tbody>
						</table>
					
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-2">
								<?= lang('family_role') ?><br>
								<select id="role" class="form-control input-sm">
									<option value="<?= lang('wife') ?>" ><?= lang('wife') ?></option>
									<option value="<?= lang('husband') ?>" ><?= lang('husband') ?></option>
									<option value="<?= lang('son') ?>" ><?= lang('son') ?></option>
									<option value="<?= lang('daughter') ?>" ><?= lang('daughter') ?></option>
								</select>							
							</div>
							<div class="col-md-2">
								<?= lang('first_name') ?><br>
								<input type="text" id="first_name" class="form-control input-sm">
							</div>	
							<div class="col-md-2">
								<?= lang('middle_name') ?>
								<input type="text" id="middle_name" class="form-control input-sm">
							</div>	
							<div class="col-md-2">
								<?= lang('last_name') ?>
								<input type="text" id="last_name" class="form-control input-sm">
							</div>	
							<div class="col-md-3">
								<?= lang('birth_date') ?>
								<input type="text" id="birth_day" class="form-control birthdate input-sm" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
							</div>
							<div class="col-md-1"><br>
								<button type="button" id="btn_add" class="btn btn-sm btn-success pull-right"><i class="glyphicon glyphicon-plus"></i></button>							
							</div>	
						</div>
					</div>

				</div>
			</div>
            <button type="submit" class="btn btn-primary"><?= lang('save') ?></button>
			<input class="btn btn-info" value="Save and Add" name="addchurchsubmit">
    		</form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




<div class="modal" id="mymodal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?= lang('save_family_info') ?></h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?= lang('close') ?></button>
        <button type="button" class="btn btn-primary" id="submit_form"><?= lang('save') ?></button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->








<script type="text/javaScript">
$(function() {

	$('.family-head').blur(function() {

		var firstname = $('#hFirstName').val();
		var middlename = $('#hMiddleName').val();
		var lastname = $('#hLastName').val();
		var birthdate = $('#hBirthDate').val();
		$('#FamilyName').val(firstname+' '+middlename);
		$('#eFirstName').text(firstname);
		$('#eMiddleName').text(middlename);
		$('#eLastName').text(lastname);
		$('#eBirthDate').text(birthdate);

	});

	$('#btn_add').click(function() {

		var role = $('#role').val();
		var firstName = $('#first_name').val();
		var middleName = $('#middle_name').val();
		var lastName = $('#last_name').val();
		var birthDate = $('#birth_day').val();
		var deleteBtn = "<button type='button' name='btn_delete' class='btn btn-sm btn-warning'><i class='glyphicon glyphicon-minus'></i></button>";
	
		$('#member_table tbody').append(
			'<tr>'+
				'<td>'+role+'</td>'+
				'<td>'+firstName+'</td>'+
				'<td>'+middleName+'</td>'+
				'<td>'+lastName+'</td>'+
				'<td>'+birthDate+'</td>'+
				'<td>'+deleteBtn+'</td>'+
			'</tr>'
			);
		$('#role').val('<?= lang('wife') ?>');
		$('#first_name').text('');
		$('#middle_name').text('');
		$('#last_name').text('');
		$('#birth_day').text('');
	});

	$('#savefamily').validate({
		submitHandler: function(form) {
			$("#mymodal").modal('show');
			$("#submit_form").click(function() {
		
				var table_data = [];
				$('#member_table tbody tr').each(function(row,tr){

					var row = {
						'firstname': $(tr).find('td:eq(1)').text(), 
						'middlename': $(tr).find('td:eq(2)').text(), 
						'lastname': $(tr).find('td:eq(3)').text(), 
						'birthdate': $(tr).find('td:eq(4)').text() 
					};
					table_data.push(row);
				});
				var encoded = JSON.stringify(table_data);
				$('#inputs').append("<input type='text' name='members' value='"+encoded+"' hidden>");

				form.submit();
			}); 
		}

	});


	$(".birthdate").inputmask(); 

});
</script>








