<style type="text/css">

.profile-image {
  width: 80px;
  height: 80px;
  border-radius: 50%;
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
        <table align="center"><tr><td align="center">
          Sort order:
          <select name="sort" onchange="this.form.submit()">
            <option value="name" selected>By Name</option>
            <option value="family" >By Family</option>
          </select>&nbsp;
          <input type="text" name="name" autofocus>
          <input type="submit" name="submit" class="btn btn-default" value="Apply Filter">

        </td></tr>
        <tr><td align="center">
          <select name="gender" form="PersonList">
            <option value="" > ወንድ እና ሴት </option>
            <option value="ወንድ"> ወንድ </option>
            <option value="ሴት"> ሴት</option>
          </select>  
          <select name="Classification" onchange="this.form.submit()">
            <option value="" >All Classifications</option>
            <option value="0">Unassigned</option>
            <option value="1">Member</option>
            <option value="2">Regular Attender</option>
            <option value="3">Guest</option>
            <option value="5">Non-Attender</option>
          </select>
          <select name="PersonProperties" onchange="this.form.submit()">
            <option value=""  selected >All Contact Properties</option>
            <option value="0">Unassigned</option>
            <option value="1">Disabled</option>
            <option value="-10000">! Unassigned</option>
            <option value="-9999">! Disabled</option>
          </select>
          <select name="grouptype" onchange="this.form.submit()">
            <option value="" >All Group Types</option>
            <option value="1">Ministry</option>
            <option value="2">Team</option>
            <option value="3">Bible Study</option>
            <option value="4">Sunday School Class</option>
            <option value="5">Scouts</option>
          </select>
            <input type="button" class="btn btn-default" value="Clear Filters" onclick=""><BR><BR>
          </td></tr>
        </table></form>





            <p/>



            <table class="table dt-responsive" id="user-listing-table" style="width:100%;">
                <thead>
                <tr>
                    <th width="120"></th>
                    <th>Name</th>
                    <th>Birthday</th>
                    <th><?= lang('mobile_phone') ?></th>
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
                        <td>
                            <a href="<?= base_url('admin/memberdetails/'.$member['id']); ?>"><i class="glyphicon glyphicon-eye-open" aria-hidden="true"></i></a>&nbsp;&nbsp;
                            <a href="#"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;
                            <a onclick=""><i class="glyphicon glyphicon-trash" aria-hidden="true"></i></a>
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
