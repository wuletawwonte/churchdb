<style type="text/css">

.profile-image {
  width: 60px;
  height: 60px;
  padding: 2px;
  border-radius: 50%;
  border: 2px solid #d2d6de;
  font-size: 20px;
  color: #fff;
  line-height: 52px;
  text-align: center;
  margin: 0 0; 
}

table tbody td a, table tbody td span {
    line-height: 52px;
}

</style>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= lang('welcome') ?>
      </h1>
      <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> ዳሽቦርድ  </a></li>
          <li class="active"> ምዕመናን </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <?php if($this->session->flashdata('success')) { ?>
        <div class="callout callout-info">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php } else if($this->session->flashdata('error')) { ?>
        <div class="callout callout-danger">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php } ?>



    <!-- Default box -->
    <div class="box box-primary">
        <div class="box-body">






    <form method="post" action="<?= base_url(); ?>admin/listmembers" id="PersonList">
      <p align="center">
        <table align="center"><tr><td>
          <div class="row">
            <div class="col-xs-4 col-xs-offset-3" align="right" style="padding-left: 0px;padding-right: 5px;">
              <input type="text" placeholder="ፈልግ.." name="search_key" class="form-control" style="border-radius: 3px" value="<?= $_SESSION['filtermember']['search_key']; ?>">
            </div>
            <div class="col-xs-4" style="padding-left: 0px;">
              <input type="submit" name="submit" class="btn btn-primary" value="አጣራ">
            </div>
          </div>
        </td></tr>
        <tr><td align="center" style="padding-top: 3px;">
          <select name="gender" form="PersonList" class="s2">
            <option value="" <?php if($_SESSION['filtermember']['gender'] == '') echo 'selected'; ?>> ወንድ እና ሴት </option>
            <option value="ወንድ" <?php if($_SESSION['filtermember']['gender'] == 'ወንድ') echo 'selected'; ?>> ወንድ </option>
            <option value="ሴት" <?php if($_SESSION['filtermember']['gender'] == 'ሴት') echo 'selected'; ?>> ሴት </option>
          </select>  
          <select name="job_type" class="s2">
            <option value="" <?php if($_SESSION['filtermember']['job_type'] == '') echo 'selected'; ?>> የሥራ አይነት </option>
                    <?php foreach($job_types as $job_type) { ?>
                        <option value="<?= $job_type['job_type_id'] ?>" <?php if($_SESSION['filtermember']['job_type'] == $job_type['job_type_id']) echo 'selected'; ?>> 
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
                    <?php foreach($membership_levels as $membership_level) { ?>
                      <option value="<?= $membership_level['membership_level_id']; ?>"<?php if($_SESSION['filtermember']['membership_level'] == $membership_level['membership_level_id']) echo 'selected'; ?>> 
                        <?= $membership_level['membership_level_title']; ?> 
                      </option>
                    <?php } ?>
          </select>
          <select name="ministry" class="s2">
            <option value="" <?php if($_SESSION['filtermember']['ministry'] == NULL) echo 'selected'; ?>>የአገልግሎት ዘርፍ</option>
                    <?php foreach($ministries as $ministry) { ?>
                      <option value="<?= $ministry['ministry_id']; ?>" <?php if($_SESSION['filtermember']['ministry'] == $ministry['ministry_id']) echo 'selected'; ?>> 
                        <?= $ministry['ministry_title']; ?> 
                      </option>
                    <?php } ?>
          </select>
            <a href="<?= base_url(); ?>admin/clearfilter" class="btn btn-warning"> ፍለጋውን አጥፋ </a><BR><BR>
          </td></tr>
        </table></form>
      <p/>



        <div class="row" style="margin-top: -15px;margin-right: 0px;margin-left: 0px;">
            <div class="col-sm-12">

                    <div class="col-sm-6">
                      <div class="dataTables_length">
                        <form method="POST" action="<?= base_url(); ?>admin/changerowsperpage">
                          <label style="font-weight: normal">Show 
                            <select name="rowsperpage" class="form-control input-sm s2" onchange="form.submit();">
                              <option value="5" <?php if($_SESSION['filtermember']['rows_per_page'] == 5) { echo 'selected'; } ?> >5</option>
                              <option value="10" <?php if($_SESSION['filtermember']['rows_per_page'] == 10) { echo 'selected'; } ?>>10</option>
                              <option value="15" <?php if($_SESSION['filtermember']['rows_per_page'] == 15) { echo 'selected'; } ?>>15</option>
                            </select> entries
                          </label>
                        </form>
                      </div>
                    </div>
                    
                    <div class="btns col-sm-6" align="right" <?php if($_SESSION['current_user']['user_type'] == 'መደበኛ ተጠቃሚ' && $_SESSION['current_user']['p_generate_member_report'] != 'allow'){ echo 'hidden'; } ?> >
                        <span style="font-size: 15px;">Export:</span>           
                        <a href="<?= base_url(); ?>admin/export_members_excel" class="btn btn-primary btn-flat"><i class="fa fa-file-excel-o"></i> Excel</a> 
                        <a href="<?= base_url(); ?>admin/export_members_csv" class="btn btn-primary btn-flat"><i class="fa fa-file-o"></i> CSV</a> 
                        <a href="<?= base_url(); ?>admin/export_members_print" target="_blank" class="btn btn-primary btn-flat"><i class="fa fa-file-pdf-o"></i> PDF</a> 
                        <a href="<?= base_url(); ?>admin/export_members_print" target="_blank" class="btn btn-primary btn-flat"><i class="fa fa-print"></i> Print</a> 
                    </div>
            </div>

            <table class="table table-hover table-bordered" id="user-listing-table">
                <thead>
                <tr>
                    <th width="80"></th>
                    <th colspan="1"><?= lang('name') ?></th>
                    <th><?= lang('birth_date') ?></th>
                    <th>የአባልነት ደረጃ</th>
                    <th><?= lang('mobile_phone') ?></th>
                    <th>የተመዘገበበት</th>
                    <th>ስራዎች</th>

                </tr>
                </thead>
                <tbody>

                    <?php foreach($members as $member) {  ?>

                    <tr>

                        <td>
                            <a href="<?= base_url('admin/memberdetails/'.$member['id']); ?>">
                                <?php if($member['avatar'] == NULL) { ?>
                                    <div class="profile-image" >
                                        <div style="width: 100%; height: 100%; border-radius: 50%; background: <?= $member['profile_color']; ?>">
                                            <b><?= mb_substr($member['firstname'], 0, 1).mb_substr($member['middlename'], 0, 1); ?></b>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <div>
                                        <img class="img-circle" style="border: 2px solid <?= $member['profile_color']; ?>;padding: 2px;height: 60px; width: 60px;" src="<?= base_url(); ?>assets/avatars/<?= $member['avatar']?>">
                                    </div>
                                <?php } ?>
                            </a>
                        </td>

                        <td>
                            <a href="<?= base_url('admin/memberdetails/'.$member['id']); ?>"> <?= $member['firstname'].' '.$member['middlename']; ?></a>
                        </td>

                        <td><span><?= $member['birthdate']?></span></td>
                        <td><span><?= $member['membership_level_title']?></span></td>
                        <td><span><?= $member['mobile_phone']?></span></td>
                        <td><span><?= $member['created']?></span></td>
                        <td>
                            <a href="<?= base_url('admin/memberdetails/'.$member['id']); ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;&nbsp;
                            <a <?php if($_SESSION['current_user']['user_type'] == 'መደበኛ ተጠቃሚ' && $_SESSION['current_user']['p_edit_member'] != 'allow'){ echo 'hidden'; } ?> href="<?= base_url('admin/editmember/'.$member['id']); ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;
                            <a onclick=""><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>

                    </tr>

                    <?php } ?>

                </tbody>
            </table>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div style="text-align: end;"><p><?= $links; ?></p></div>
        </div>
    </div>
    <!-- /.box -->



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



