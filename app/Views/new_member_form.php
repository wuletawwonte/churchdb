<script type="text/javascript" src="<?= base_url('assets/plugins/jquery.inputmask.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/jquery.inputmask.date.extensions.js'); ?>"></script>
<script src="<?= base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css">



  <!-- Content Wrapper. Contains page content -->
  <div class="space-y-6">
    <!-- Content Header (Page header) -->
    <div class="mb-6"><h1 class="text-2xl font-bold">
        <?= lang('label.person_registration'); ?>
      </h1>
      <div class="breadcrumbs text-sm"><ul>
        	<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> ዳሽቦርድ  </a></li>
	        <li><?= lang('label.add_new_person'); ?></li>
      </ul></div>
    </div>





	<?php echo form_open_multipart('admin/savemember');?>



    <!-- Main content -->
    <section class="content container-fluid space-y-6">

	    <?php if(session()->getFlashdata('success')) { ?>
	        <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" style="opacity: 1; color: #ffffff;" aria-hidden="true">×</button>
	            <?php echo session()->getFlashdata('success'); ?>
	        </div>
	    <?php } else if(session()->getFlashdata('error')) { ?>
		    <div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert" style="opacity: 1; color: #ffffff;" aria-hidden="true">×</button>
	            <?php echo session()->getFlashdata('error'); ?>
	        </div>
	    <?php } ?>


	    	<div class="row">
	    		<div class="col-md-3 col-sm-3 col-lg-3">
	    			<div class="card border border-base-content/15 bg-base-100 shadow-md clearfix ">
	    				<div class="card-body border-b border-base-content/15 pb-3 mb-3">
	    					<h3 class="card-title text-lg">የምዕመን ፎቶ</h3>
	    				</div>
	    				<div class="card-body flex flex-col items-center gap-4 text-center">
			              	<?= view('templates/partials/member_avatar', [
			              	    'member' => [],
			              	    'size' => 'lg',
			              	    'placeholderSrc' => base_url('assets/img/user.png'),
			              	    'imgId' => 'avatar',
			              	]); ?>

						<div class="input-group">
			                <input type="file" accept="image/*" onchange="document.getElementById('avatar').src = window.URL.createObjectURL(this.files[0]);" id="avatarInput" name="avatar_input" style="display: none;">
				                    <button type="button" class="btn btn-lg btn-primary" onclick="document.getElementById('avatarInput').click();"><i class="fa fa-folder-open"></i></button>
				                    <button type="button" class="btn btn-lg btn-secondary" onclick="document.getElementById('avatarInput').value = ''; document.getElementById('avatar').src = '<?= base_url(); ?>assets/img/user.png'"><i class="fa fa-times"></i></button>
			            </div>
			              	<p class="text-muted text-center">የፎቶው ከ1500KB ቢያንስ ይመረጣል </p>
	    				</div>
	    			</div>
	    		</div>
	    		<div class="col-md-9 col-lg-9 col-sm-9">
				    <div class="card border border-base-content/15 bg-base-100 shadow-md clearfix">
				        <div class="card-body border-b border-base-content/15 pb-3 mb-3">
				            <h3 class="card-title text-lg"> የግል መረጃ </h3>
				        </div><!-- /.box-header -->
				        <div class="card-body flex flex-col gap-5">
			                <div class="row">
			                    <div class="col-md-2">
			                        <label> ፆታ  :</label>
			                        <select name="gender" id="gender" class="input input-bordered w-full max-w-full s2">
			                            <option value="ሴት"> ሴት </option>
			                            <option value="ወንድ"> ወንድ </option>
			                        </select>
			                    </div>
			                    <div class="col-md-3">
			                        <label for="title"> ማዕረግ  :</label>
			                        <input type="text" name="title" class="input input-bordered w-full max-w-full">
			                    </div>
			                </div>
			                <div class="row">
			                    <div class="col-md-4">
			                        <label for="firstname"> ስም  :</label>
			                        <input type="text" name="firstname" class="input input-bordered w-full max-w-full" required>
			        				<br><font color="red"></font>
			                    </div>

			                    <div class="col-md-2">
			                        <label for="middlename"> የአባት ስም  :</label>
			                        <input type="text" name="middlename" class="input input-bordered w-full max-w-full" required>

			                    </div>

			                    <div class="col-md-6">
			                        <label for="lastname"> የአያት ስም :</label>
			                        <input type="text" name="lastname" class="input input-bordered w-full max-w-full" required>                    
			                    </div>
			                </div>
			                <div class="row">
				                <div class="col-md-4 form-group">
					                <label for="birthdate">የተወለዱበት ቀን :</label>
					                <input type="date" id="birthdate" name="birthdate" class="input input-bordered w-full max-w-full family-head" required max="<?= esc(date('Y-m-d')); ?>">
					            </div>
			                    <div class="col-md-2">
			                        <label> ዕድሜ ይደበቅ  </label><br/>
			                        <div class="checkbox icheck">
				                        <input type="checkbox" name="hide_age" value="on">
			                    	</div>
			                    </div>
			                    <div class="col-md-6">
			                        <label for="birth_place"> የትውልድ ሥፍራ :</label>
			                        <input type="text" name="birth_place" class="input input-bordered w-full max-w-full">                    
			                    </div>
			                </div>
				        </div>
				    </div>
				</div>
			</div>



			<div class="card border border-base-content/15 bg-base-100 shadow-md clearfix">
				<div class="card-body border-b border-base-content/15 pb-3 mb-3">
					<h3 class="card-title text-lg"> የምዕመኑ አድራሻ </h3>
				</div><!-- /.box-header -->
				<div class="card-body flex flex-col gap-5">
					<div class="row">

	                    <div class="col-md-4">
	                        <label> ክፍለ ከተማ: </label>
	                        <select name="kifle_ketema" id="kifle_ketema" class="input input-bordered w-full max-w-full s2">
	                        	<option value="">አልተመረጠም</option>
	                        	<?php foreach($kifle_ketemas as $kifle_ketema) { ?>
		                        	<option value="<?= $kifle_ketema['kifle_ketema_title']; ?>"> <?= $kifle_ketema['kifle_ketema_title']; ?> </option>
		                        <?php } ?>
	                        </select>
	                    </div>

	                    <div class="col-md-4">
	                        <label> ቀበሌ: </label>
	                        <select name="kebele" id="kebele" class="input input-bordered w-full max-w-full s2">
	                        	<option value="">አልተመረጠም</option>
	                        </select>
	                    </div>

	                    <div class="col-md-4">
	                        <label> መንደር: </label>
	                        <select name="mender" id="mender" class="input input-bordered w-full max-w-full s2">
	                        	<option value="">አልተመረጠም</option>
	                        </select>
	                    </div>
					</div>
					<div class="row">

	                    <div class="col-md-2">
	                        <label for="house_number"> የቤት ቁጥር: </label>
	                        <input type="text" name="house_number" class="input input-bordered w-full max-w-full">                    
	                    </div>

						<div class="form-group col-md-4">
							<label for="home_phone"> የመኖርያ ቤት ስልክ ቁጥር: </label>
							<div class="join w-full max-w-full overflow-hidden rounded-lg border border-base-content/15 bg-base-100">
								<span class="join-item inline-flex min-h-10 w-12 shrink-0 items-center justify-center border-0 border-e border-base-content/15 bg-base-200 text-base-content" aria-hidden="true">
									<i class="fa fa-tty"></i>
								</span>
								<input id="home_phone" type="tel" name="home_phone" autocomplete="tel-national" class="input join-item min-h-10 min-w-0 flex-1 rounded-none border-0 bg-transparent shadow-none focus:z-10 focus:outline-none focus-visible:ring-2 focus-visible:ring-inset focus-visible:ring-primary/30" placeholder="046..">
							</div>
						</div>

					</div>
					<div class="row">

						<div class="form-group col-md-6">
							<label for="mobile_phone">የሞባይል ስልክ ቁጥር:</label>
							<div class="join w-full max-w-full overflow-hidden rounded-lg border border-base-content/15 bg-base-100">
								<span class="join-item inline-flex min-h-10 w-12 shrink-0 items-center justify-center border-0 border-e border-base-content/15 bg-base-200 text-base-content" aria-hidden="true">
									<i class="fa fa-mobile text-lg"></i>
								</span>
								<input id="mobile_phone" type="tel" name="mobile_phone" autocomplete="tel-national" class="input join-item min-h-10 min-w-0 flex-1 rounded-none border-0 bg-transparent shadow-none focus:z-10 focus:outline-none focus-visible:ring-2 focus-visible:ring-inset focus-visible:ring-primary/30" placeholder="09..">
							</div>
						</div>

						<div class="form-group col-md-6">
							<label>ኢሜል:</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="glyphicon glyphicon-envelope"></i>
								</div>
								<input type="email" Name="email" class="input input-bordered w-full max-w-full" size="50" maxlength="50">
							</div>
						</div>

					</div>
				</div>
			</div>


			<div class="card border border-base-content/15 bg-base-100 shadow-md clearfix">
				<div class="card-body border-b border-base-content/15 pb-3 mb-3">
					<h3 class="card-title text-lg"> የምዕመን የስራ ሁኔታ </h3>
				</div><!-- /.box-header -->
				<div class="card-body flex flex-col gap-5">
					<div class="row">

						<div class="col-md-6">
							<label>የትምህርት ደረጃ:</label>
	                        <select name="level_of_education" class="input input-bordered w-full max-w-full s2">
		                        <option value="አልተመረጠም"> አልተመረጠም </option>
		                        <option value="8ኛ ያጠናቀቀ"> 8ኛ ያጠናቀቀ </option>
		                        <option value="10ኛ ያጠናቀቀ"> 10ኛ ያጠናቀቀ </option>
		                        <option value="10+2"> 10+2 </option>
		                        <option value="ዲፕሎማ"> ዲፕሎማ </option>
		                        <option value="የመጀመርያ ዲግሪ"> የመጀመርያ ዲግሪ </option>
		                        <option value="የማስተርስ ዲግሪ"> የማስተርስ ዲግሪ </option>
		                        <option value="ሶስተኛ ዲግሪ"> ሶስተኛ ዲግሪ </option>
		                        <option value="ፕሮፌሰር"> ፕሮፌሰር </option>
	                        </select>
						</div>

						<div class="col-md-6">
							<label>የሰለጠኑበት ሙያ መስክ:</label>
							<input type="text" Name="field_of_study" class="input input-bordered w-full max-w-full" maxlength="50">
						</div>

					</div>
					<div class="row">
	                    <div class="col-md-4">
	                        <label> የሥራ መስክ: </label>
	                        <select name="job_type" class="input input-bordered w-full max-w-full s2">
	                        	<option value="አልተመረጠም">አልተመረጠም</option>
	                        	<?php foreach($job_types as $job_type) { ?>
		                            <option value="<?= $job_type['job_type_title'] ?>"> <?= $job_type['job_type_title']; ?> </option>
		                        <?php } ?>
	                        </select>
	                    </div>

	                    <div class="col-md-4">
	                        <label for="workplace_name"> የመሥሪያ ቤቱ ስም :</label>
	                        <input type="text" name="workplace_name" class="input input-bordered w-full max-w-full">                    
	                    </div>


						<div class="form-group col-md-4">
							<label for="workplace_phone">የመሥሪያ ቤት ስልክ ቁጥር :</label>
							<div class="join w-full max-w-full overflow-hidden rounded-lg border border-base-content/15 bg-base-100">
								<span class="join-item inline-flex min-h-10 w-12 shrink-0 items-center justify-center border-0 border-e border-base-content/15 bg-base-200 text-base-content" aria-hidden="true">
									<i class="fa fa-building-o"></i>
								</span>
								<input id="workplace_phone" type="tel" name="workplace_phone" autocomplete="tel" class="input join-item min-h-10 min-w-0 flex-1 rounded-none border-0 bg-transparent shadow-none focus:z-10 focus:outline-none focus-visible:ring-2 focus-visible:ring-inset focus-visible:ring-primary/30 inputmasked" data-inputmask='"mask": "(999) 999-9999"' data-mask>
							</div>
						</div>

					</div>
					<div class="row">

	                    <div class="col-md-4">
	                        <label for="monthly_income"> ወርሐዊ ገቢ:</label>
	                        <div class="input-group">
	                        	<input type="tel" name="monthly_income" class="input input-bordered w-full max-w-full">
	                    		<div class="input-group-addon">ብር</div>

	                    	</div>
	                    </div>

					</div>

				</div>
			</div>


			<div class="card border border-base-content/15 bg-base-100 shadow-md clearfix">
				<div class="card-body border-b border-base-content/15 pb-3 mb-3">
					<h3 class="card-title text-lg"> የቤተክርስትያን ተሳትፎ </h3>
				</div><!-- /.box-header -->
				<div class="card-body flex flex-col gap-5">

					<div class="row">

	                    <div class="col-md-4">
	                        <label for="membership_year"> አባል የሆኑበት ዘመን :</label>
	                        <div class="join w-full max-w-full overflow-hidden rounded-lg border border-base-content/15 bg-base-100">
	                        	<span class="join-item inline-flex min-h-10 w-12 shrink-0 items-center justify-center border-0 border-e border-base-content/15 bg-base-200 text-base-content" aria-hidden="true">
	                        		<i class="fa fa-calendar"></i>
	                        	</span>
	                        	<input id="membership_year" type="text" name="membership_year" inputmode="numeric" autocomplete="off" class="input join-item min-h-10 min-w-0 flex-1 rounded-none border-0 bg-transparent shadow-none focus:z-10 focus:outline-none focus-visible:ring-2 focus-visible:ring-inset focus-visible:ring-primary/30 inputmasked" data-inputmask='"mask": "9999"' data-mask>
	                    		<span class="join-item inline-flex min-h-10 shrink-0 items-center justify-center border-0 border-s border-base-content/15 bg-base-200 px-3 text-sm text-base-content" aria-hidden="true">ዓ.ም</span>
	                    	</div>
	                    </div>

	                    <div class="col-md-4">
	                        <label> አባል የሆኑበት ሁኔታ :</label>
	                        <select name="membership_cause" class="input input-bordered w-full max-w-full s2">
								<option value="አልተመረጠም">አልተመረጠም</option>
	                        	<?php foreach($membership_causes as $membership_cause) { ?>
		                        	<option value="<?= $membership_cause['membership_cause_title']; ?>"> <?= $membership_cause['membership_cause_title']; ?> </option>
		                        <?php } ?>
	                        </select>
	                    </div>

	                    <div class="col-md-4">
	                        <label> የአባልነት ደረጃ :</label>
	                        <select name="membership_level" class="input input-bordered w-full max-w-full s2">
								<option value="አልተመረጠም">አልተመረጠም</option>
	                        	<?php foreach($membership_levels as $membership_level) { ?>
		                        	<option value="<?= $membership_level['membership_level_title']; ?>"> <?= $membership_level['membership_level_title']; ?> </option>
		                        <?php } ?>
	                        </select>
	                    </div>
					</div>
					<div class="row">
	                    <div class="col-md-4 ministries">
	                        <label> የአገልግሎት ዘርፍ :</label>
	                        <select name="ministry" class="input input-bordered w-full max-w-full s2">
	                        	<option value="አልተመረጠም">አልተመረጠም</option>
	                        	<?php foreach($ministries as $ministry) { ?>
		                        	<option value="<?= $ministry['ministry_title']; ?>"> <?= $ministry['ministry_title']; ?> </option>
		                        <?php } ?>
	                        </select>
	                    </div>

					</div>
				</div>
			</div>



		    <div class="card border border-base-content/15 bg-base-100 shadow-md clearfix">
		        <div class="card-body border-b border-base-content/15 pb-3 mb-3">
		            <h3 class="card-title text-lg"> የቤተሰብ መረጃ </h3>
		        </div><!-- /.box-header -->
		        <div class="card-body">
		            <div class="row">
		            <div class="form-group col-md-6">
		                <label> የጋብቻ ሁኔታ :</label>
		                <select name="marital_status" class="input input-bordered w-full max-w-full s2" id="maritalStatus">
		                    <option value="አልተመረጠም">አልተመረጠም</option>
		                    <option disabled>-----------------------</option>
		                    <option value="ያላገባ/ች">ያላገባ/ች</option>
		                    <option value="ያገባ/ች">ያገባ/ች</option>		                    
		                    <option value="የፈታ/ች">የፈታ/ች</option>
		                </select>
		            </div>

		            <div class="form-group col-md-6">
		                <label> የትዳር አጋር:</label>
		                <select name="spouse" class="input input-bordered w-full max-w-full" id="spouse" disabled>
		                    <option value="" selected>አልተመረጠም</option>
		                    <option disabled>-----------------------</option>
		                </select>
		            </div>
		            </div>
		        </div>
		    </div>


            <div class="flex flex-wrap gap-3 pt-1">
            <input type="submit" class="btn btn-primary" value="<?= lang('label.save') ?>" Name="addchurchsubmit">
			<input type="submit" class="btn btn-secondary" value="Save and Add" name="addchurchsubmit">
			<a href="<?= base_url(); ?>admin/members" class="btn btn-neutral">Cancel</a>
			</div>


	    </section>
	    <!-- /.content -->


	</form>



  </div>
  





<script type="text/javaScript">
	$(document).ready(function () {

		function toggle(className, obj) {
		    if ( obj.checked ) $(className).show();
		    else $(className).hide();
		}

		$(".inputmasked").inputmask(); 

		$("#spouse").select2({
				ajax: {
					url: "<?php echo base_url(); ?>admin/get_gender_specific_ajax",
					dataType: 'json',	
					method: "POST",				
					data: function(params){ 
						return {
							searchTerm: params.term,
							gender: $("#gender").val()
						};
					},
					processResults: function (data) {
			            return {
			            	results: data
			            };
			        }
				}
			});

	    $(function () {
	        $('input:not(#layout-drawer):not([data-theme-toggle]):not([type="file"]):not([type="hidden"])').iCheck({
		      checkboxClass: 'icheckbox_square-blue',
		      radioClass: 'iradio_square-blue',
		      increaseArea: '20%' /* optional */
		    });
	    });

	    $("#maritalStatus").change(function(){
	    	var selected = $(this).val();
	    	if(selected == "ያገባ/ች") {
	    		$("#spouse").prop('disabled', false);
	    	} 
	    	else {
	    		$("#spouse").prop('disabled', true);
	    	}
	    });

	    // function maleMaritalStatus() {
	    // 	$("#maritalStatus").html("<option value='አልተመረጠም'>አልተመረጠም</option><option disabled>-----------------------</option><option value='ያላገባ'>ያላገባ</option><option value='ያገባ'>ያገባ</option><option value='የፈታ'>የፈታ</option>");    	
    	// 	$("#spouse").prop('disabled', true);
	    // }

	    // function femaleMaritalStatus() {
	    // 	$("#maritalStatus").html("<option value='አልተመረጠም'>አልተመረጠም</option><option disabled>-----------------------</option><option value='ያላገባች'>ያላገባች</option><option value='ያገባች'>ያገባች</option><option value='የፈታች'>የፈታች</option>");
    	// 	$("#spouse").prop('disabled', true);
	    // }

	    // femaleMaritalStatus();

	    // $("#gender").change(function() {
	    // 	var gender = $(this).val();
	    // 	if(gender == "ወንድ") {
	    // 		maleMaritalStatus();
	    // 	} 
	    // 	else if(gender == "ሴት") {
	    // 		femaleMaritalStatus();
	    // 	}
	    // });


	    $("#kifle_ketema").change(function(){
	    	var kifle_ketema_title = $("#kifle_ketema").val();
	    	if(kifle_ketema_title != '') {
	    		$.ajax({
	    			url: "<?php echo base_url(); ?>admin/fetch_kebeles",
	    			method: "POST",
	    			data: {kifle_ketema_title: kifle_ketema_title},
	    			success: function(data) {
	    				$("#kebele").html(data);
			    		$("#mender").html('<option value="">አልተመረጠም</option>');
	    			}
	    		});
	    	} else {
	    		$("#kebele").html('<option value="">አልተመረጠም</option>');
	    		$("#mender").html('<option value="">አልተመረጠም</option>');
	    	}
	    });

	    $("#kebele").change(function(){
	    	var kebele_title = $("#kebele").val();
	    	if(kebele_title != ''){
	    		$.ajax({
	    			url: "<?php echo base_url(); ?>admin/fetch_menders",
	    			method: "POST",
	    			data:{kebele_title: kebele_title},
	    			success: function(data) {
	    				$("#mender").html(data);
	    			}
	    		});
	    	} else {
	    		$("#mender").html('<option value="">አልተመረጠም</option>');
	    	}
	    });


	});
</script>













