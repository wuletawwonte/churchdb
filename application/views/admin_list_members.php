<style type="text/css">

.profile-image {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  border: 2px solid #d2d6de;
  font-size: 20px;
  /*font-weight: bold;*/
  color: #fff;
  text-align: center;
  line-height: 60px;
  margin: 0 0; 
}

table tbody td a, table tbody td span {
    line-height: 60px;
}

</style>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= lang('members') ?>
      </h1>

 	</section>

    <!-- Main content -->
    <section class="content container-fluid">

    <?php if($this->session->flashdata('success')) { ?>
        <div class="callout callout-info">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php } else if($this->session->flashdata('error')) { ?>
        <div class="callout callout-error">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php } ?>



    <!-- Default box -->
    <div class="box box-warning">
        <div class="box-body">






    <form method="post" action="<?= base_url(); ?>admin/listmembers" id="PersonList">
      <p align="center">
        <table align="center"><tr><td>
          <div class="row">
            <div class="col-xs-4 col-xs-offset-3" align="right" style="padding-left: 0px;padding-right: 5px;">
              <input type="text" placeholder="Search.." name="search_key" class="form-control" style="border-radius: 3px" value="<?= $_SESSION['filtermember']['search_key']; ?>">
            </div>
            <div class="col-xs-4" style="padding-left: 0px;">
              <input type="submit" name="submit" class="btn btn-primary" value="Apply Filter">
            </div>
          </div>
        </td></tr>
        <tr><td align="center" style="padding-top: 3px">
          <select name="gender" form="PersonList" class="s2">
            <option value="" <?php if($_SESSION['filtermember']['gender'] == '') echo 'selected'; ?>> ወንድ እና ሴት </option>
            <option value="ወንድ" <?php if($_SESSION['filtermember']['gender'] == 'ወንድ') echo 'selected'; ?>> ወንድ </option>
            <option value="ሴት" <?php if($_SESSION['filtermember']['gender'] == 'ሴት') echo 'selected'; ?>> ሴት </option>
          </select>  
          <select name="job_type" class="s2">
            <option value="" <?php if($_SESSION['filtermember']['job_type'] == '') echo 'selected'; ?>> የሥራ አይነት </option>
                            <?php foreach($job_types as $job_type) { ?>
                                <option value="<?= $job_type['job_type_id'] ?>" <?php if($_SESSION['filtermember']['job_type'] == $job_type['job_type_id']) echo 'selected'; ?>> 
                                  <?= $job_type['job_type']; ?> 
                                </option>
                            <?php } ?>
          </select>
          <select name="membership_level" class="s2">
            <option value="" <?php if($_SESSION['filtermember']['membership_level'] == NULL) echo 'selected'; ?>>የአባልነት ደረጃ</option>
                            <?php foreach($membership_levels as $membership_level) { ?>
                              <option value="<?= $membership_level['membership_level_id']; ?>"<?php if($_SESSION['filtermember']['membership_level'] == $membership_level['membership_level_id']) echo 'selected'; ?>> 
                                <?= $membership_level['membership_level']; ?> 
                              </option>
                            <?php } ?>
          </select>
          <select name="ministry" class="s2">
            <option value="" <?php if($_SESSION['filtermember']['ministry'] == NULL) echo 'selected'; ?>>የአገልግሎት ዘርፍ</option>
                            <?php foreach($ministries as $ministry) { ?>
                              <option value="<?= $ministry['ministry_id']; ?>" <?php if($_SESSION['filtermember']['ministry'] == $ministry['ministry_id']) echo 'selected'; ?>> 
                                <?= $ministry['ministry']; ?> 
                              </option>
                            <?php } ?>
          </select>
            <a href="<?= base_url(); ?>admin/clearfilter" class="btn btn-warning">Clear Filters</a><BR><BR>
          </td></tr>
        </table></form>





            <p/>



            <table class="table table-responsive table-hover" id="user-listing-table" style="width:100%;">
                <thead>
                <tr>
                    <th width="80"></th>
                    <th><?= lang('name') ?></th>
                    <th><?= lang('birth_date') ?></th>
                    <th><?= lang('mobile_phone') ?></th>
                    <th>Created</th>
                    <th>Actions</th>

                </tr>
                </thead>
                <tbody>

                    <?php foreach($members as $member) {  ?>

                    <tr>

                        <td><a href="<?= base_url('admin/memberdetails/'.$member['id']); ?>"><div class="profile-image" style="background: <?= $member['profile_color']; ?>"><?= $member['firstname'][0].$member['middlename'][0]; ?></div></a></td>

                        <td>
                            <a href="<?= base_url('admin/memberdetails/'.$member['id']); ?>"> <?= $member['firstname'].' '.$member['middlename']; ?></a>
                        </td>

                        <td><span><?= $member['birthdate']?></span></td>
                        <td><span><?= $member['mobile_phone']?></span></td>
                        <td><span><?= $member['created']?></span></td>
                        <td>
                            <a href="<?= base_url('admin/memberdetails/'.$member['id']); ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;&nbsp;
                            <a href="<?= base_url('admin/editmember/'.$member['id']); ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;
                            <a onclick=""><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>

                    </tr>

                    <?php } ?>

                </tbody>
            </table>
            <div style="text-align: end;"><p><?= $links; ?></p></div>

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
