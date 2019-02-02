  

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>
        	User Settings
      	</h1>
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
		                        <td>System User:</td>
		                    	<td><select name="skin" size="1" class="form-control">
					                    <?php foreach($users as $user) { ?>
					                    <option value="skin-blue"><?= $user['firstname'].' '.$user['lastname'] ?></option>
					                    <?php  } ?>
					                </select>
					            </td>
		                    </tr>

		                    <tr>
		                        <td>Admin:</td>
		                        <td><input type="checkbox" name="Admin" value="1">&nbsp;<span class="SmallText">(Grants all privileges.)</span></td>
		                    </tr>

		                    <tr>
		                        <td>Delete Records:</td>
		                        <td><input type="checkbox" name="DeleteRecords" value="1"></td>
		                    </tr>

		                    <tr>
		                        <td>Manage Groups and Roles:</td>
		                        <td><input type="checkbox" name="ManageGroups" value="1"></td>
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




