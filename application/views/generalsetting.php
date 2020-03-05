  

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>
        	ጠቅላላ መቼት
      	</h1>
      	<ol class="breadcrumb">
        	<li><a href="<?php echo base_url(); ?>sadmin/generalsetting"><i class="glyphicon glyphicon-cog"></i> General Settings</a></li>
        	<li class="active">General</li>
      	</ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">


		<!-- Default box -->
		<div class="box box-info">
		    <div class="box-body">

		        <div class="callout callout-info">
		            ልብ ይበሉ: አጠቃላይ መቼት ዋና የሚባሉ የሲስተም ለውጦችን ያደርጋል።
		        </div>


		        <form method="post" action="<?php echo base_url(); ?>admin/savesetting">
		            <div class="table-responsive">
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
		                        <td colspan="2" align="center">
		                            <input type="submit" class="btn btn-primary" value="Save" name="save">&nbsp;
		                            <input type="button" class="btn" name="Cancel" value="Cancel">
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




