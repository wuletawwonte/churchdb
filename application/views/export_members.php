

<div class="content-wrapper">
    <section class="content-header">
        <h1> የምዕመን መረጃ ሪፖርት </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> ዳሽቦርድ </a></li>
            <li class="active"> የምዕመን ሪፖርት </li>
        </ol>
    </section>
    <!-- Main content -->

    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">ሪፖርት ማዘዣ</h3>
            </div>

           	<div class="box-body">




			    <form method="post" action="<?= base_url(); ?>admin/listmembers" id="PersonList">
			      <p align="center">
			        <table align="center">
			        <tr><td align="center" style="padding-top: 3px;">
			          <select name="gender" form="PersonList" class="s2">
			            <option value="" <?php if($_SESSION['filtermember']['gender'] == '') echo 'selected'; ?>> ወንድ እና ሴት </option>
			            <option value="ወንድ" <?php if($_SESSION['filtermember']['gender'] == 'ወንድ') echo 'selected'; ?>> ወንድ </option>
			            <option value="ሴት" <?php if($_SESSION['filtermember']['gender'] == 'ሴት') echo 'selected'; ?>> ሴት </option>
			          </select>  

                        <select name="age_group" class="s2">
                            <option value="" <?php if($_SESSION['filtermember']['age_group'] == '') echo 'selected'; ?>> የእድሜ ቡድን </option>
                                    <?php foreach($age_groups as $ag) { ?>
                                        <option value="<?= $ag['ag_id'] ?>" <?php if($_SESSION['filtermember']['age_group'] == $ag['ag_id']) echo 'selected'; ?>> 
                                          <?= $ag['age_group_name']; ?> 
                                        </option>
                                    <?php } ?>
                        </select>

			          <select name="job_type" class="s2">
			            <option value="" <?php if($_SESSION['filtermember']['job_type'] == '') echo 'selected'; ?>> የሥራ አይነት </option>
			            <option value="አልተመረጠም" <?php if($_SESSION['filtermember']['job_type'] == 'አልተመረጠም') echo 'selected'; ?>> አልተመረጠም </option>
			                    <?php foreach($job_types as $job_type) { ?>
			                        <option value="<?= $job_type['job_type_title'] ?>" <?php if($_SESSION['filtermember']['job_type'] == $job_type['job_type_title']) echo 'selected'; ?>> 
			                          <?= $job_type['job_type_title']; ?> 
			                        </option>
			                    <?php } ?>
			          </select>
			          <select name="marital_status" class="s2">
			            <option value="" <?php if($_SESSION['filtermember']['marital_status'] == '') echo 'selected'; ?>> የጋብቻ ሁኔታ </option>
			                    <option value="አልተመረጠም" <?php if($_SESSION['filtermember']['marital_status'] == 'አልተመረጠም') echo 'selected'; ?> >አልተመረጠም</option>
			                    <option value="0" disabled>-----------------------</option>
			                    <option value="ያላገባ/ች" <?php if($_SESSION['filtermember']['marital_status'] == 'ያላገባ/ች') echo 'selected'; ?> > ያላገባ/ች </option>
			                    <option value="ያገባ/ች" <?php if($_SESSION['filtermember']['marital_status'] == 'ያገባ/ች') echo 'selected'; ?> >ያገባ/ች</option>                        
			                    <option value="የፈታ/ች" <?php if($_SESSION['filtermember']['marital_status'] == 'የፈታ/ች') echo 'selected'; ?> > የፈታ/ች</option>

			          </select>
			          <select name="membership_level" class="s2">
			            <option value="" <?php if($_SESSION['filtermember']['membership_level'] == NULL) echo 'selected'; ?>>የአባልነት ደረጃ</option>
			            		<option value="">አልተመረጠም</option>
			                    <?php foreach($membership_levels as $membership_level) { ?>
			                      <option value="<?= $membership_level['membership_level_title']; ?>"<?php if($_SESSION['filtermember']['membership_level'] == $membership_level['membership_level_title']) echo 'selected'; ?>> 
			                        <?= $membership_level['membership_level_title']; ?> 
			                      </option>
			                    <?php } ?>
			          </select>
			          <select name="ministry" class="s2">
			            <option value="" <?php if($_SESSION['filtermember']['ministry'] == NULL) echo 'selected'; ?>>የአገልግሎት ዘርፍ</option>

                                <option value="አልተመረጠም" <?php if($_SESSION['filtermember']['ministry'] == 'አልተመረጠም') echo 'selected'; ?>>አልተመረጠም</option>
			                    <?php foreach($ministries as $ministry) { ?>
			                      <option value="<?= $ministry['ministry_title']; ?>" <?php if($_SESSION['filtermember']['ministry'] == $ministry['ministry_title']) echo 'selected'; ?>> 
			                        <?= $ministry['ministry_title']; ?> 
			                      </option>
			                    <?php } ?>
			          </select><br><br>
			            <input type="submit" name="submit" class="btn btn-primary btn-flat" value="አጣራ">
			            <a href="<?= base_url(); ?>admin/clearfilter" class="btn btn-warning btn-flat"> ፍለጋውን አጥፋ </a><BR><BR>
			          </td></tr>
			        </table></form>
			      


           		
           	</div>


           	<div class="box-footer">
                    
                    <div class="btns col-md-12" align="center" <?php if($_SESSION['current_user']['user_type'] == 'መደበኛ ተጠቃሚ' && $_SESSION['current_user']['p_generate_member_report'] != 'allow'){ echo 'hidden'; } ?> >
                        <span style="font-size: 15px;">Export:</span>           
                        <a href="<?= base_url(); ?>admin/export_members_excel" class="btn btn-default btn-flat"><i class="fa fa-file-excel-o"></i> Excel</a> 
                        <a href="<?= base_url(); ?>admin/export_members_csv" class="btn btn-default btn-flat"><i class="fa fa-file-o"></i> CSV</a> 
                        <a href="<?= base_url(); ?>admin/export_members_print" target="_blank" class="btn btn-default btn-flat"><i class="fa fa-file-pdf-o"></i> PDF</a> 
                        <a href="<?= base_url(); ?>admin/export_members_print" target="_blank" class="btn btn-default btn-flat"><i class="fa fa-print"></i> Print</a> 
            		</div>
            </div>

        </div>
    


    </section>
</div>