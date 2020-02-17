<style type="text/css">

.profile-image {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  border: 3px solid #d2d6de;
  font-size: 30px;
  color: #fff;
  text-align: center;
  line-height: 80px;
  margin: 0 0; 
}

table tbody td a, table tbody td span {
    line-height: 80px;
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
            <div class="col-xs-4" align="right" style="padding-right: 0px;">
              Sort order:
              <select name="sort" onchange="this.form.submit()" class="s2">
                <option value="name" selected>By Name</option>
                <option value="family" >By Family</option>
              </select>&nbsp;
            </div>
            <div class="col-xs-4" style="padding-left: 0px;padding-right: 5px;">
              <input type="text" placeholder="Search.." name="name" class="form-control" style="border-radius: 5px">
            </div>
            <div class="col-xs-4" style="padding-left: 0px;">
              <input type="submit" name="submit" class="btn btn-primary" value="Apply Filter">
            </div>
          </div>
        </td></tr>
        <tr><td align="center" style="padding-top: 3px">
          <select name="gender" form="PersonList" class="s2">
            <option value="" > ወንድ እና ሴት </option>
            <option value="ወንድ"> ወንድ </option>
            <option value="ሴት"> ሴት</option>
          </select>  
          <select name="Classification" class="s2">
            <option value="" >All Classifications</option>
            <option value="0">Unassigned</option>
            <option value="1">Member</option>
            <option value="2">Regular Attender</option>
            <option value="3">Guest</option>
            <option value="5">Non-Attender</option>
          </select>
          <select name="PersonProperties" class="s2">
            <option value=""  selected >All Contact Properties</option>
            <option value="0">Unassigned</option>
            <option value="1">Disabled</option>
            <option value="-10000">! Unassigned</option>
            <option value="-9999">! Disabled</option>
          </select>
          <select name="grouptype" class="s2">
            <option value="" >All Group Types</option>
            <option value="1">Ministry</option>
            <option value="2">Team</option>
            <option value="3">Bible Study</option>
            <option value="4">Sunday School Class</option>
            <option value="5">Scouts</option>
          </select>
            <input type="button" class="btn btn-warning" value="Clear Filters" onclick=""><BR><BR>
          </td></tr>
        </table></form>





            <p/>



            <table class="table table-responsive" id="user-listing-table" style="width:100%;">
                <thead>
                <tr>
                    <th width="120"></th>
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
            <div style="text-align: center;"><p><?= $links; ?></p></div>

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
