
<script src="<?= base_url(); ?>assets/vendors/bootstrap-slider/bootstrap-slider.js"></script>

<link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/bootstrap-slider/slider.css">




  

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>
        	አጠቃላይ ማስተካከያዎች
        	<small>ዋና የሲስተም ለውጦች ማስተካከያ</small>
      	</h1>
      	<ol class="breadcrumb">
        	<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> ዳሽቦርድ  </a></li>
        	<li class="active">አጠቃላይ ማስተካከያዎች </li>
      	</ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">


		<!-- Default box -->
		<div class="box box-info">
		    <div class="box-body">

		        <div class="callout callout-info">
		            ልብ ይበሉ: አጠቃላይ መቼት ዋና የሚባሉ የሲስተም ለውጦችን የሚያድርግ ሲሆን ለውጦቹን ለማየት እንደገና መግባት ያስፈልጋል።
		        </div>


			     <?php if($this->session->flashdata('success')) { ?>
			        <div class="callout callout-info">
			            <?php echo $this->session->flashdata('success'); ?>
			        </div>
			    <?php } else if($this->session->flashdata('error')) { ?>
			        <div class="callout callout-danger">
			            <?php echo $this->session->flashdata('error'); ?>
			        </div>
			    <?php } ?>

		        <form method="post" action="<?php echo base_url(); ?>admin/savesetting">
		            <div class="table-responsive" width="100%">
		                <table class="table table-hover">

		                    <tr>
		                        <td width="50%" >የሲስተም ስም:</td>
		                        <td><input type="text" name="system_name" value="<?php echo $system_name; ?>" class="form-control" width="32" ></td>
		                    </tr>

		                    <tr>
		                        <td>የሲስተም ስም በአጭሩ:</td>
		                        <td><input type="text" name="system_name_short" value="<?php echo $system_name_short; ?>" class="form-control" width="5"></td>
		                    </tr>

		                    <tr>
		                        <td>የቤተክርስቲያኒቱ ስም:</td>
		                        <td><input type="text" name="church_name" value="<?php echo $church_name; ?>" class="form-control" width="5"></td>
		                    </tr>

		                    <tr>
		                        <td>ዋና የይለፍ ቃል:</td>
		                        <td><input type="text" name="default_password" value="<?php echo $default_password; ?>" class="form-control" width="32"></td>
		                    </tr>

		                    <tr>
		                    	<td></td>
		                        <td colspan="2">
		                            <input type="submit" class="btn btn-primary btn-flat" value="መዝግብ" name="save">&nbsp;
		                            <input type="reset" class="btn btn-flat" value="አጥፋ">
		                        </td>
		                    </tr>
		                </table>
		            </div>
		        </form>
		    </div>
		    <!-- /.box-body -->
		</div>
		<!-- /.box -->
		<div class="box box-default">
			<div class="box-header with-border">
				<span>የእድሜ ቡድን</span>
			</div>
			<div class="box-body">
				<div width="100%">
					<form method="post" action="<?= base_url(); ?>admin/saveagegroup">
						<table class="table">
							<tr>
								<td>የእድሜ ቡድን ስም</td>
		                        <td><input type="text" name="age_group_name" class="form-control" width="32"></td>
							</tr>
							<tr>
								<td> የእድሜ ገደብ </td>
								<td width="50%">
						            <input type="text" value="" name="age_range" class="slider form-control" data-slider-min="0" data-slider-max="120"
					                         data-slider-step="2" data-slider-value="[50,100]" data-slider-orientation="horizontal"
					                         data-slider-selection="before" data-slider-tooltip="show" data-slider-id="green">
				                </td>
			                </tr>
			                <tr>
			                	<td></td>
			                	<td>
									<input type="submit" value="መዝግብ" class="btn btn-primary btn-flat">		                		
			                	</td>
			                </tr>
		                </table>
		            </form>
				</div>				
			</div>
			
		</div>
	</section>
	<!-- /.section -->
</div>



<script>
  $(function () {
    /* BOOTSTRAP SLIDER */
    $('.slider').slider()
  })
</script>
