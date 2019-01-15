  

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>
        	User
        	<small>Registration</small>
      	</h1>
      	<ol class="breadcrumb">
        	<li><a href="<?php echo base_url(); ?>sadmin/users"><i class="fa fa-users"></i> Users</a></li>
        	<li class="active">Register</li>
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
		        <form method="post" action="">
		            <div class="table-responsive">
		                <table class="table table-hover">
		                    <tr>
		                        <td>Person to Make User:</td>
		                        <td>
		                            <select name="PersonID" size="10" id="personSelect" class="form-control">
		                                    <option value="Wuletaw Wonte">Wonte, Wuletaw</option>
		                                    <option value="Kaftile Torayto">Torayto, Kaftile</option>
		                                    <option value="Samuel Azanaw">Azanaw, Samuel</option>
		                            </select>
		                        </td>
		                    </tr>

		                    <tr>
		                        <td>Login Name:</td>
		                        <td><input type="text" name="UserName" value="UserName" class="form-control" width="32"></td>
		                    </tr>

		                    <tr>
		                        <td>Add Records:</td>
		                        <td><input type="checkbox" name="AddRecords" value="1"></td>
		                    </tr>

		                    <tr>
		                        <td>Edit Records:</td>
		                        <td><input type="checkbox" name="EditRecords" value="1"></td>
		                    </tr>

		                    <tr>
		                        <td>Delete Records:</td>
		                        <td><input type="checkbox" name="DeleteRecords" value="1"></td>
		                    </tr>

		                    <tr>
		                        <td>Manage Properties and Classifications:</td>
		                        <td><input type="checkbox" name="MenuOptions" value="1"></td>
		                    </tr>

		                    <tr>
		                        <td>Manage Groups and Roles:</td>
		                        <td><input type="checkbox" name="ManageGroups" value="1"></td>
		                    </tr>

		                    <tr>
		                        <td>Manage Donations and Finance:</td>
		                        <td><input type="checkbox" name="Finance" value="1"></td>
		                    </tr>

		                    <tr>
		                        <td>View, Add and Edit Notes:</td>
		                        <td><input type="checkbox" name="Notes" value="1"></td>
		                    </tr>

		                    <tr>
		                        <td>Edit Self:</td>
		                        <td><input type="checkbox" name="EditSelf" value="1">&nbsp;<span class="SmallText">(Edit own family only.)</span></td>
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
		                            <input type="submit" class="btn btn-primary" value="Save" name="save">&nbsp;<input
		                                type="button" class="btn" name="Cancel" value="Cancel"
		                                onclick="javascript:document.location='UserList.php';">
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




