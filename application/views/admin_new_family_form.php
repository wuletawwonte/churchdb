


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

							<div class="col-md-4">
								<label> <?= lang('first_name') ?>:</label>
								<input type="text" id="hFirstName" maxlength="48"  class="form-control family-head" required>
							</div>
							<div class="col-md-4">
								<label> <?= lang('middle_name') ?>:</label>
								<input type="text" id="hMiddleName" maxlength="48"  class="form-control family-head" required>
							</div>
							<div class="col-md-4">
								<label> <?= lang('last_name') ?>:</label>
								<input type="text" id="hLastName" maxlength="48"  class="form-control family-head" required>
							</div>

						</div><p/>		            
						<div class="row">
							<div class="col-md-6">
								<label> <?= lang('family_name') ?>:</label>
								<input type="text" id="FamilyName" maxlength="48"  class="form-control" readonly>
							</div>
						</div><p/><hr>		            
		                <div class="row">
		                    <div class="col-md-4">
		                        <label> <?= lang('living_subcity'); ?>  :</label>
		                        <select id="subcity" class="form-control">
		                        	<option value="<?= lang('nechsar'); ?>"><?= lang('nechsar'); ?></option>
		                        	<option value="0" disabled >-----------------
		                            <option value="<?= lang('female'); ?>"><?= lang('female'); ?></option>
		                            <option value="<?= lang('male'); ?>"><?= lang('male'); ?></option>
		                        </select>
		                    </div>
		                    <div class="col-md-4">
		                        <label> <?= lang('living_kebele'); ?>  :</label>
		                        <select id="kebele" class="form-control">
		                        	<option value="<?= lang('idget_ber'); ?>"><?= lang('idget_ber'); ?></option>
		                        	<option value="0" disabled >-----------------
		                            <option value="1"><?= lang('female'); ?></option>
		                            <option value="2"><?= lang('male'); ?>  </option>
		                        </select>
		                    </div>
		                    <div class="col-md-4">
		                        <label for="houseNumber"> <?= lang('house_number'); ?>  :</label>
		                        <input type="text" id="houseNumber" class="form-control">
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
			                            <i class="fa fa-phone"></i>
			                        </div>
			                        <input type="text" id="homePhoneNumber"
			                               value="" size="30"
			                               maxlength="100" class="form-control">
			                    </div>
			                </div>

		                    <div class="col-md-6 col-md-offset-2">
		                        <label for="weddingYear"> <?= lang('wedding_year'); ?>  :</label>
		                        <input type="text" id="weddingYear" class="form-control">
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
									<th><?= lang('birth_month') ?></th>
									<th><?= lang('birth_year') ?></th>
									<th><?= gettext('Action') ?></th>
								</tr>
								<tr>

									<td class="TextColumn">
										<select id="role">
											<option value="<?= lang('wife') ?>" ><?= lang('wife') ?></option>
											<option value="<?= lang('husband') ?>" ><?= lang('husband') ?></option>
											<option value="<?= lang('son') ?>" ><?= lang('son') ?></option>
											<option value="<?= lang('daughter') ?>" ><?= lang('daughter') ?></option>
										</select>
									</td>
									<td class="TextColumn" contenteditable id="first_name"></td>
									<td class="TextColumn" contenteditable id="middle_name"></td>
									<td class="TextColumn" contenteditable id="last_name"></td>
									<td class="TextColumn" contenteditable id="birth_day"></td>
				                    <td class="TextColumn" contenteditable id='birth_month'></td>
									<td class="TextColumn" contenteditable id="birth_year"></td>

									<td class="TextColumn">
										<button type="button" id="btn_add" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
									</td>

								</tr>
							</thead>
							<tbody>
								<tr>
									<input type="hidden" name="PersonID" value="">

									<td class="TextColumn"><?= lang('husband') ?></td>
									<td class="TextColumn" name="eFirstName" id="eFirstName"></td>
									<td class="TextColumn" name="eMiddleName" id="eMiddleName"></td>
									<td class="TextColumn" name="eLastName" id="eLastName"></td>
									<td class="TextColumn" contenteditable name="eBirthDay"></td>
				                    <td class="TextColumn" contenteditable name='eBirthMonth'></td>
									<td class="TextColumn" contenteditable name="eBirthYear"></td>

									<td class="TextColumn"></td>

								</tr>

								</tbody>
							</tbody>

						</table>
					</div>

				</div>
			</div>
            <button class="btn btn-primary" data-toggle="modal" data-target="#mymodal"><?= lang('save') ?></button>
			<input type="submit" class="btn btn-info" value="Save and Add" name="addchurchsubmit">
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




<div class="modal" id="mymodal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?= lang('save_family_info') ?></h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?= lang('close') ?></button>
        <button type="button" id="btn_save" class="btn btn-primary"><?= lang('save') ?></button>
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
		$('#FamilyName').val(firstname+' '+middlename);
		$('#eFirstName').text(firstname);
		$('#eMiddleName').text(middlename);
		$('#eLastName').text(lastname);

	});

	$('#btn_add').click(function() {

		var role = $('#role').val();
		var firstName = $('#first_name').text();
		var middleName = $('#middle_name').text();
		var lastName = $('#last_name').text();
		var birthDate = $('#birth_day').text();
		var birthMonth = $('#birth_month').text();
		var birthYear = $('#birth_year').text();
		var deleteBtn = "<button type='button' name='btn_delete' class='btn btn-sm btn-warning'><i class='fa fa-minus'></i></button>";
	
		$('#member_table tbody').append(
			'<tr>'+
				'<td>'+role+'</td>'+
				'<td>'+firstName+'</td>'+
				'<td>'+middleName+'</td>'+
				'<td>'+lastName+'</td>'+
				'<td>'+birthDate+'</td>'+
				'<td>'+birthMonth+'</td>'+
				'<td>'+birthYear+'</td>'+
				'<td>'+deleteBtn+'</td>'+
			'</tr>'
			);
		$('#role').val('<?= lang('wife') ?>');
		$('#first_name').text('');
		$('#middle_name').text('');
		$('#last_name').text('');
		$('#birth_day').text('');
		$('#birth_month').text('');
		$('#birth_year').text('');
	});

	$('#btn_save').click(function() {

		var table_data = [];
		$('#member_table tbody tr').each(function(row,tr){

			var row = {
				'role': $(tr).find('td:eq(0)').text(), 
				'firstname': $(tr).find('td:eq(1)').text(), 
				'middlename': $(tr).find('td:eq(2)').text(), 
				'lastname': $(tr).find('td:eq(3)').text(), 
				'birthdate': $(tr).find('td:eq(4)').text(), 
				'birthmonth': $(tr).find('td:eq(5)').text(), 
				'birthyear': $(tr).find('td:eq(6)').text(), 
			};
			table_data.push(row);
		});

		var firstName = $('#hFirstName').val();
		var middleName = $('#hMiddleName').val();
		var lastName = $('#hLastName').val();
		var familyName = $('#FamilyName').val();
		var subcity = $('#subcity').val();
		var kebele = $('#kebele').val();
		var houseNumber = $('#houseNumber').val();
		var homePhoneNumber = $('#homePhoneNumber').val();
 		var weddingYear = $('#weddingYear').val();

//		console.log(table_data);
		// Registering Family Info here
		var data = {
			'name': $('#FamilyName').val(),
			'subcity': $('#subcity').val(),
			'kebele': $('#kebele').val(),
			'house_number': $('#houseNumber').val(),
			'home_phone': $('#homePhoneNumber').val(),
			'wedding_year': $('#weddingYear').val(),
			'members': table_data
		};

		$.ajax({
			data: data,
			type: 'POST',
			url: '<?php echo base_url('admin/savefamily'); ?>',
			dataType: 'json', 
			success: function(result){
				console.log('something');
				if(result.status == 'success') {
					console.log('success');
				} else {
					console.log('error'+result.status);
				}
			}

		});

		console.log(data);

	});


});
</script>








