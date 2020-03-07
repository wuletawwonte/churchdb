  

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>
        	ጠቅላላ መቼት
        	<small>ዋና የሲስተም ለውጦች ማስተካከያ</small>
      	</h1>
      	<ol class="breadcrumb">
        	<li><a href="<?php echo base_url(); ?>admin/generalsetting"><i class="fa fa-gears"></i> መቼት </a></li>
        	<li class="active">ጠቅላላ መቼት </li>
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
		                        <td>የሲስተም ስም:</td>
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
		                        <td><input type="password" name="default_password" value="<?php echo $default_password; ?>" class="form-control" width="32"></td>
		                    </tr>

		                    <tr>
		                    	<td></td>
		                        <td colspan="2">
		                            <input type="submit" class="btn btn-primary" value="መዝግብ" name="save">&nbsp;
		                            <input type="reset" class="btn" value="አጥፋ">
		                        </td>
		                    </tr>
		                </table>
		            </div>
		        </form>
		    </div>
		    <!-- /.box-body -->
		</div>
		<!-- /.box -->
	</section>
	<!-- /.section -->
</div>




