  

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>
        	General Settings
      	</h1>
      	<ol class="breadcrumb">
        	<li><a href="<?php echo base_url(); ?>admin/generalsetting"><i class="fa fa-gear"></i> Setting</a></li>
        	<li class="active">General Setting</li>
      	</ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">


		<!-- Default box -->
		<div class="box box-info">
		    <div class="box-body">

		        <div class="callout callout-info">
		            Note: Changes will not take effect until next logon.
		        </div>


		        <form method="post" action="<?php echo base_url(); ?>sadmin/savesetting">
		            <div class="table-responsive">
		                <table class="table table-hover">

		                    <tr>
		                        <td>Church:</td>
		                        <td><input type="text" name="system_name" value="<?php echo $system_name; ?>" class="form-control" width="32"></td>
		                    </tr>

		                    <tr>
		                        <td>Church Name in Short:</td>
		                        <td><input type="text" name="system_name_short" value="<?php echo $system_name_short; ?>" class="form-control" width="5"></td>
		                    </tr>

		                    <tr>
		                        <td>Skin Color:</td>
		                    	<td><select name="skin" size="7" class="form-control">
					                    <option <?php if($skin == 'skin-blue') { echo 'selected'; } ?> value="skin-blue">skin-blue</option>
					                    <option <?php if($skin == 'skin-black') { echo 'selected'; } ?> value="skin-black">skin-black</option>
					                    <option <?php if($skin == 'skin-purple') { echo 'selected'; } ?> value="skin-purple">skin-purple&nbsp;
					                    <option <?php if($skin == 'skin-yellow') { echo 'selected'; } ?> value="skin-yellow">skin-yellow&nbsp;
					                    <option <?php if($skin == 'skin-red') { echo 'selected'; } ?> value="skin-red">skin-red&nbsp;
					                    <option <?php if($skin == 'skin-green') { echo 'selected'; } ?> value="skin-green">skin-green&nbsp;
					                </select>
					            </td>
		                    </tr>

		                    <tr>
		                        <td>Language:</td>
		                    	<td><select name="language" size="3" class="form-control">
					                    <option <?php if($language == 'english') { echo 'selected'; } ?> value="english">english</option>
					                    <option <?php if($language == 'amharic') { echo 'selected'; } ?> value="amharic">amharic</option>
					                </select>
					            </td>
		                    </tr>

		                    <tr>
		                        <td>Canvasser:</td>
		                        <td><input type="checkbox" name="Canvasser" value="1">&nbsp;<span class="SmallText">(Canvass volunteer.)</span></td>
		                    </tr>
		                    <tr>
		                        <td>Admin:</td>
		                        <td><input type="checkbox" name="Admin" value="1">&nbsp;<span class="SmallText">(Grants all privileges.)</span></td>
		                    </tr>
		                    <tr>
		                        <td>Style:</td>
		                        <td class="TextColumnWithBottomBorder"><select
		                                name="Style">User-Style</select></td>
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




