  
<script src="<?= base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css">


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>
        	ተጠቃሚ ምዝገባ
      	</h1>
      	<ol class="breadcrumb">
        	<li><a href="<?php echo base_url(); ?>sadmin/generalsetting"><i class="fa fa-cog"></i> ጠቅላላ መቼት </a></li>
        	<li class="active">ተጠቃሚ ምዝገባ</li>
      	</ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">


		<!-- Default box -->
		<div class="box box-info">
		    <div class="box-body">

		        <div class="callout callout-info">
		            ልብ ይበሉ: አዲስ የሲስተም ተጠቃሚ የሚመዘገብበት ፎርም ነው።
		        </div>


		        <form method="post" action="<?php echo base_url(); ?>admin/registeruser">
		            <div class="table-responsive">
		                <table class="table table-hover">

		                    <tr>
		                        <td>ስም:</td>
		                        <td><input type="text" name="firstname" class="form-control" required></td>
		                    </tr>

		                    <tr>
		                        <td>የአባት ስም:</td>
		                        <td><input type="text" name="lastname" class="form-control" required></td>
		                    </tr>

		                    <tr>
		                        <td>የሲስተም መግቢያ ስም:</td>
		                        <td><input type="text" name="username" class="form-control" required></td>
		                    </tr>

		                    <tr>
		                        <td><b>የሲስተም አስተዳደር:</b></td>
		                        <td><input type="checkbox" name="administrator" id="admincheck">&nbsp;<span class="SmallText"> (ሁሉንም ተግባራት ማከናወን ይችላል።)</span></td>
		                    </tr>
		                    <tr>
		                        <td>ምዕመን መመዝገብ:</td>
		                        <td><input type="checkbox" class="permissions" name="p_register_member">&nbsp;</td>
		                    </tr>
		                    <tr>
		                        <td>የምዕመን መረጃ ማስተካከል:</td>
		                        <td><input type="checkbox" class="permissions" name="p_edit_member">&nbsp;</td>
		                    </tr>
		                    <tr>
		                        <td>የምዕመን መረጃ ማጥፋት:</td>
		                        <td><input type="checkbox" class="permissions" name="p_delete_member">&nbsp;</td>
		                    </tr>
		                    <tr>
		                        <td>የቅፅ ማስተካከያ ፈቃድ:</td>
		                        <td><input type="checkbox" class="permissions" name="p_manage_form">&nbsp;</td>
		                    </tr>
		                    <tr>
		                        <td>ቡድን የማስተዳደር ፈቃድ:</td>
		                        <td><input type="checkbox" class="permissions" name="p_manage_group">&nbsp;</td>
		                    </tr>
		                    <tr>
		                        <td>ሪፖርት የማዘዝ ፈቃድ:</td>
		                        <td><input type="checkbox" class="permissions" name="p_generate_member_report">&nbsp;<span class="SmallText"> (የምዕመናንን ሪፖርት የማዘዝ ፍቃድ።)</span></td>
		                    </tr>
		                    <tr>
		                        <td colspan="2" align="center">
		                            <input type="submit" class="btn btn-primary" value="መዝግብ">&nbsp;
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



<script type="text/javascript">
    $(window).on('load', function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");

	    $(function () {
	        $('input').iCheck({
		      checkboxClass: 'icheckbox_square-blue',
		      radioClass: 'iradio_square-blue',
		      increaseArea: '20%' /* optional */
		    });
	    });

	  //   $("#admincheck").change(function (){
			// console.log("change of the checkbox");
	  //   	$(".permissions").prop('checked', false);
	  //   });



    });
</script>
