  
<script src="<?= base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css">


<!-- Content Wrapper. Contains page content -->
<div class="space-y-4">
    <!-- Content Header (Page header) -->
    <div class="mb-6"><h1 class="text-2xl font-bold">
        	ተጠቃሚ ምዝገባ
      	</h1>
      	<div class="breadcrumbs text-sm"><ul>
        	<li><a href="<?php echo base_url(); ?>admin/users"><i class="fa fa-cog"></i> ጠቅላላ መቼት </a></li>
        	<li>ተጠቃሚ ምዝገባ</li>
      	</ul></div>
    </div>
    <section class="content container-fluid">


		<!-- Default box -->
		<div class="card border border-base-300 bg-base-100 shadow-md">
		    <div class="card-body">

		        <div class="alert alert-info">
		            ልብ ይበሉ: አዲስ የሲስተም ተጠቃሚ የሚመዘገብበት ፎርም ነው።
		        </div>


		        <form method="post" action="<?php echo base_url(); ?>admin/edituser/<?= $user['id']; ?>">
		            <div class="table-responsive">
		                <table class="table table-zebra w-full">

		                    <tr>
		                        <td>ስም:</td>
		                        <td><input type="text" value="<?= $user['firstname']; ?>" name="firstname" class="input input-bordered w-full max-w-full" required></td>
		                    </tr>

		                    <tr>
		                        <td>የአባት ስም:</td>
		                        <td><input type="text" value="<?= $user['lastname']; ?>" name="lastname" class="input input-bordered w-full max-w-full" required></td>
		                    </tr>

		                    <tr>
		                        <td>የሲስተም መግቢያ ስም:</td>
		                        <td><input type="text" value="<?= $user['username']; ?>" name="username" class="input input-bordered w-full max-w-full" required></td>
		                    </tr>

		                    <tr>
		                        <td><b>የሲስተም አስተዳደር:</b></td>
		                        <td><input type="checkbox" name="administrator" id="admincheck" <?php if($user['user_type'] == 'የሲስተም አስተዳደር'){ echo 'checked'; } ?> >&nbsp;<span class="SmallText"> (ሁሉንም ተግባራት ማከናወን ይችላል።)</span></td>
		                    </tr>
		                    <tr>
		                        <td>ምዕመን መመዝገብ:</td>
		                        <td><input type="checkbox" class="permissions"  value="allow" name="p_register_member" <?php if($user['p_register_member'] == 'allow'){ echo 'checked'; } ?>>&nbsp;</td>
		                    </tr>
		                    <tr>
		                        <td>የምዕመን መረጃ ማስተካከል:</td>
		                        <td><input type="checkbox" class="permissions" value="allow" name="p_edit_member" <?php if($user['p_edit_member'] == 'allow'){ echo 'checked'; } ?> >&nbsp;</td>
		                    </tr>
		                    <tr>
		                        <td>የምዕመን መረጃ ማጥፋት:</td>
		                        <td><input type="checkbox" class="permissions" value="allow" name="p_delete_member" <?php if($user['p_delete_member'] == 'allow'){ echo 'checked'; } ?> >&nbsp;</td>
		                    </tr>
		                    <tr>
		                        <td>የቅፅ ማስተካከያ ፈቃድ:</td>
		                        <td><input type="checkbox" class="permissions" value="allow" name="p_manage_form" <?php if($user['p_manage_form'] == 'allow'){ echo 'checked'; } ?> >&nbsp;</td>
		                    </tr>
		                    <tr>
		                        <td>ቡድን የማስተዳደር ፈቃድ:</td>
		                        <td><input type="checkbox" class="permissions" value="allow" name="p_manage_group" <?php if($user['p_manage_group'] == 'allow'){ echo 'checked'; } ?> >&nbsp;</td>
		                    </tr>
		                    <tr>
		                        <td>ሪፖርት የማዘዝ ፈቃድ:</td>
		                        <td><input type="checkbox" class="permissions" value="allow" name="p_generate_member_report" <?php if($user['p_generate_member_report'] == 'allow'){ echo 'checked'; } ?> >&nbsp;<span class="SmallText"> (የምዕመናንን ሪፖርት የማዘዝ ፍቃድ።)</span></td>
		                    </tr>
		                    <tr>
		                    	<td></td>
		                        <td>
		                            <input type="submit" class="btn btn-primary" value="ቀይር">&nbsp;
		                        </td>
		                    </tr>
		                </table>
		            </div>
		        </form>
		    </div>
		    <!-- /.card-body -->
		</div>
		<!-- /.box -->
	</section>
	<!-- /.section -->
</div>



<script type="text/javascript">
    $(window).on('load', function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");
    });

    $(function () {
        $('input').iCheck({
	      checkboxClass: 'icheckbox_square-blue',
	      radioClass: 'iradio_square-blue',
	      increaseArea: '20%' /* optional */
	    });
	});


    $("#admincheck").on('ifChecked', function (event){
    	$(".permissions").iCheck('check');
    	$(".permissions").iCheck('disable');
    });

    $("#admincheck").on('ifUnchecked', function (event){
    	$(".permissions").iCheck('enable');
    	$(".permissions").iCheck('uncheck');    	
    });

    if($("#admincheck").is(":checked")) {
    	$(".permissions").iCheck('check');
    	$(".permissions").iCheck('disable');
    }

</script>
