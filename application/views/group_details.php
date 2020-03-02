<style type="text/css">

.member-profile-image {
  margin: 0 auto;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  border: 3px solid #d2d6de; 
  font-size: 15px;
  color: #fff;
  text-align: center;
  line-height: 50px;  
}

table tbody td a, table tbody td span {
    line-height: 50px;
}


</style>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= lang('group').': '.$group['name']; ?>
      </h1>

  </section>

    <!-- Main content -->
    <section class="content container-fluid">

<!--     <div class="pull-right">
        <a class="btn btn-success" role="button" href="<?= base_url('admin/familyregistration') ?>">
        <span class="glyphicon glyphicon-plus"></span> <?= lang('add_new_group'); ?></a>
    </div>
    <p><br><br></p>
 -->
    <?php if($this->session->flashdata('success')) { ?>
        <div class="callout callout-info">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php } else if($this->session->flashdata('error')) { ?>
        <div class="callout callout-danger">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php } ?>


        <div class="box box-primary box-body">
          <a class="btn btn-app" href="/master/PrintView.php?PersonID=59"><i class="fa fa-pencil"></i> <?= lang('edit_this_group') ?></a>
          <a class="btn btn-app" href="/master/WhyCameEditor.php?PersonID=59"><i class="fa fa-money"></i> <?= lang('tithes_info') ?></a>
          <a class="btn btn-app" href="/master/NoteEditor.php?PersonID=59"><i class="fa fa-sticky-note"></i> <?= lang('note_info') ?></a>
          <a class="btn btn-app" id="addGroup"><i class="fa fa-users"></i> <?= lang('assign_new_group') ?> </a>
          <a class="btn btn-app bg-maroon delete-person" data-person_name="Franklin Beck" data-person_id="59"><i class="fa fa-trash-o"></i> <?= lang('delete_this_group') ?> </a>
          <a class="btn btn-app" role="button" href="/master/SelectList.php?mode=person"><i class="fa fa-list"></i> List Members</span></a>
        </div>



        <div class="box">
            <div class="box-body">
                <p/><p/><p/>
                <button class="btn btn-success" type="button">
                  <?= lang('group_type') ?> <span class="badge"> <?= $group['type']; ?> </span>
                </button>
                <button class="btn btn-info" type="button">
                  Default Role <span class="badge">getOptionName</span>
                </button>
                <button class="btn btn-primary" type="button">
                  Total Members <span class="badge" id="iTotalMembers"><?= count($group_members) ?></span>
                </button>
            </div>
        </div>

        <div class="box box-solid">
          <div class="box-header"><?= lang('group_members')?></div>
          <div class="box-body table-responsive clearfix">
            <table class="table user-list table-hover">
              <thead>
                <tr>
                  <th></th>
                  <th><span><?= lang('name') ?></span></th>
                  <th class="text-center"><span>Role</span></th>
                  <th><span>Birthday</span></th>
                  <th><span>Email</span></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($group_members as $member) {?>
                <tr>
                  <td>
                    <div class="member-profile-image" style="background: <?= $member['profile_color']; ?>"><?= $member['firstname'][0].$member['middlename'][0]; ?></div>
                  </td>
                  <td>                      
                    <a href="<?= base_url('admin/memberdetails/'.$member['member_id']); ?>"
                    class="user-link"><?= $member['firstname'].' '.$member['middlename'];?> </a>
                  </td>
                  <td class="text-center">
                    <span style="line-height: 50px;" class='label label-default'><?= $member['role']?> </span>
                  </td>
                  <td>
                    <span> <?= $member['birthdate']?> </span>                                
                  </td>
                  <td>
                    <a href="mailto:wuletaw.wonte@amu.edu.et"><?= $member['email'] ?></a>
                  </td>
                  <td style="width: 20%;">
                    <a class="delete-person" href="<?= base_url('admin/remove_group_member/'.$member['member_id'].'/'.$group['gid']); ?>">
                      <span class="fa-stack">
                        <i class="fa fa-square fa-stack-2x"></i>
                        <i class="fa fa-minus fa-stack-1x fa-inverse btn-danger"></i>
                      </span>
                    </a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table><p/><hr></p>




            <div class="box">
              <div class="box-header"><?= lang('add_member') ?></div>
              <div class="box-body">
              <form action="<?= base_url('admin/add_group_member') ?>" method="POST">
                <input type="text" name="group_id" value="<?= $group['gid'] ?>" hidden>
            <div class="col-md-4">
              <select name="role" class="form-control input-sm s2">
                <option value="አባል" > አባል </option>
                <option value="መሪ" > መሪ </option>
              </select>             
            </div>

            <div class="col-md-6">
                      <select id="members" name="member_id" class="form-control input-lg s2" style="width: 100%;">

                          <?php foreach($non_group_members as $member) { ?>
                          <option value="<?= $member['id']?>"><?= $member['firstname'].' '.$member['middlename']; ?></option>
                          <?php } ?>
                      </select>
                    </div>
                    <div>
                      <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                    </div>  
                </form>
                </div>          
            </div>





        </div>
      </div>



















  </section>
</div>