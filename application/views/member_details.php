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


.profile-image {
  margin: 0 auto;
  margin-top: 15px;
  width: 130px;
  height: 130px;
  border-radius: 50%;
  border: 3px solid #d2d6de; 
  font-size: 50px;
  color: #fff;
  text-align: center;
  line-height: 130px;
}

.user-list tbody td a, .user-list tbody td span {
    line-height: 50px;
}

</style>

<div class="content-wrapper">
    <section class="content-header">
      <h1><?= lang('person_profile') ?></h1>
    </section>
    <!-- Main content -->
    <section class="content">
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3">
        <div class="box box-primary">
            <div class="box-body box-profile">
            	<a href="<?= base_url('admin/memberdetails/'.$member['id']); ?>"><div class="profile-image" style="background: <?= $member['profile_color']?>"><?= $member['firstname'][0].$member['middlename'][0]; ?></div></a><br>
              
              <a href="<?= base_url('admin/memberdetails/'.$member['id']); ?>"><h3 class="profile-username text-center">
                  <?php if($member['gender'] == 'ወንድ'){ ?>
                    <i class="fa fa-male"></i>
                  <?php } else {?>
                    <i class="fa fa-female"></i>
                  <?php } ?>
                    <?= $member['firstname']." ".$member['middlename']; ?></h3></a>


        <p class="text-muted text-center">የጋብቻ ሁኔታ: <b><?= $member['marital_status']?></b></p>
                  <a href="<?= base_url('admin/editmember/'.$member['id']); ?>" class="btn btn-primary btn-block" id="EditPerson"><b><?= lang('edit') ?></b></a>
              </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <!-- About Me Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title text-center"><?= lang('about_me') ?></h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <ul class="fa-ul">
          <li><i class="fa-li fa fa-group"></i><?= lang('family') ?>: <span>
          <?php if(isset($family)) { ?>
            <a href="<?= base_url('admin/familydetails/'.$family['id']); ?>"><?= $family['name'] ?> </a>
            <a href="#" class="table-link">
              <span class="fa-stack">
                <i class="fa fa-square fa-stack-2x"></i>
                <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          <?php } else { echo "አልተመረጠም"; } ?>
          </span></li>
          <li><i class="fa-li fa fa-home"></i><?= lang('address') ?>: <span><?= time(); ?></span></li>
          <li>
            <i class="fa-li fa fa-calendar"></i><?= lang('birth_date') ?>: <?= $member['birthdate']; ?>                            <span></span><?php if(!$member['hide_age'] == 'on') { echo '('.$member['age'].' yrs old)'; } ?> 
          </li>
          <li><i class="fa-li fa fa-mobile-phone"></i><?= lang('mobile_phone') ?>: <span><?= $member['mobile_phone']; ?></span></li>
          <li><i class="fa-li fa fa-phone"></i><?= lang('home_phone') ?>: <span>(237)-926-6342</span></li>
          <li><i class="fa-li fa fa-envelope"></i><?= lang('email') ?>: <span><?= $member['email']; ?></span></li>
        </ul>
      </div>
    </div>
    <div class="alert alert-info alert-dismissable">
        <i class="fa fa-fw fa-tree"></i> indicates items inherited from the associated family record.        </div>
      </div>
      <div class="col-lg-9 col-md-9 col-sm-9">
        <div class="box box-primary box-body">
          <a class="btn btn-app" href="/master/PrintView.php?PersonID=59"><i class="fa fa-print"></i> <?= lang('printable_page') ?></a>
          <a class="btn btn-app" href="/master/WhyCameEditor.php?PersonID=59"><i class="fa fa-money"></i> <?= lang('tithes_info') ?></a>
          <a class="btn btn-app" href="/master/NoteEditor.php?PersonID=59"><i class="fa fa-sticky-note"></i> <?= lang('note_info') ?></a>
          <a class="btn btn-app" id="addGroup"><i class="fa fa-users"></i> <?= lang('assign_new_group') ?> </a>
          <a class="btn btn-app bg-maroon delete-person" data-person_name="Franklin Beck" data-person_id="59"><i class="fa fa-trash-o"></i> <?= lang('delete_this_member') ?> </a>
          <a class="btn btn-app" role="button" href="/master/SelectList.php?mode=person"><i class="fa fa-list"></i> List Members</span></a>
        </div>
      </div>
      <div class="col-lg-9 col-md-9 col-sm-9">
        <div class="nav-tabs-custom">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#timeline" aria-controls="timeline" role="tab" data-toggle="tab">Timeline</a></li>
            <li role="presentation"><a href="#family" aria-controls="family" role="tab" data-toggle="tab">Family</a></li>
            <li role="presentation"><a href="#groups" aria-controls="groups" role="tab" data-toggle="tab">Assigned Groups</a></li>
            <li role="presentation"><a href="#properties" aria-controls="properties" role="tab" data-toggle="tab">Assigned Properties</a></li>
            <li role="presentation"><a href="#volunteer" aria-controls="volunteer" role="tab" data-toggle="tab">Volunteer Opportunities</a></li>
            <li role="presentation"><a href="#notes" aria-controls="notes" role="tab" data-toggle="tab">Notes</a></li>
          </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tab-pane fade" class="tab-pane active" id="timeline">
                <ul class="timeline">
                  <!-- timeline time label -->
                  <li class="time-label">
                    <span class="bg-red">
                      2019-02-04                    </span>
                    </li>
                    <!-- /.timeline-label -->
                    <?php foreach ($timelines as $timeline) { 
                    if($timeline['change_occured'] == 'created') { ?>
                      <li>
                        <!-- timeline icon -->
                        <i class="fa fa-plus bg-blue"></i>
                        <div class="timeline-item">
                          <span class="time">
                            <i class="fa fa-clock-o"></i> <?= $timeline['date']; ?></span>
                            <h4 class="timeline-header">Created by <?= $timeline['by_user']; ?></h4>
                        </div>
                      </li>
                    <?php } else if($timeline['change_occured'] == 'updated') { ?>
                      <li>
                        <!-- timeline icon -->
                        <i class="fa fa-pencil bg-blue"></i>
                        <div class="timeline-item">
                          <span class="time">
                            <i class="fa fa-clock-o"></i> <?= $timeline['date']; ?></span>
                            <h4 class="timeline-header">Edited by <?= $timeline['by_user']; ?></h4>
                        </div>
                      </li>
                    <?php } } ?>

                                <!-- END timeline item -->
                              </ul>
                            </div>
                          




                          <div role="tab-pane fade" class="tab-pane" id="family">

                          <?php if(isset($family_members)) { ?>
                            <table class="table user-list table-hover">
                              <thead>
                                <tr>
                                  <th></th>
                                  <th><span><?= lang('name') ?></span></th>
                                  <th class="text-center"><span>Role</span></th>
                                  <th><span>Birthday</span></th>
                                  <th><span>Email</span></th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php foreach($family_members as $member) {?>
                                <tr>
                                  <td>
                                    <div class="member-profile-image" style="background: <?= $member['profile_color']; ?>"><?= $member['firstname'][0].$member['middlename'][0]; ?></div>
                                  </td>
                                  <td>                      
                                    <a href="<?= base_url('admin/memberdetails/'.$member['id']); ?>"
                                    class="user-link"><?= $member['firstname'].' '.$member['middlename'];?> </a>
                                  </td>
                                  <td class="text-center">
                                    <span style="line-height: 50px;" class='label label-default'><?= $member['family_role']?> </span>
                                  </td>
                                  <td>
                                    <span> <?= $member['birthdate']?> </span>                                
                                  </td>
                                  <td>
                                    <a href="mailto:wuletaw.wonte@amu.edu.et"><?= $member['email'] ?></a>
                                  </td>
                                </tr>
                              <?php } ?>
                        </tbody>
                      </table><p/><hr> <?php } else { ?>
                                <div class="main-box clearfix">
                                  <div class="main-box-body clearfix">
                                    <br>
                                    <div class="alert alert-warning">
                                      <i class="fa fa-question-circle fa-fw fa-lg"></i> <span>Not Member of Any Family.</span>
                                    </div>
                                  </div>
                                </div>

                              <?php } ?>

                          </div>





                          <div role="tab-pane fade" class="tab-pane" id="groups">
                          <?php if($assigned_groups != false) { ?>
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th><span><?= lang('name') ?></span></th>
                                  <th  class="text-center"><span>type</span></th>
                                  <th><span>role</span></th>
                                  <th><span>Created</span></th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php foreach($assigned_groups as $group) {?>
                                <tr>
                                  <td>                      
                                    <a href="<?= base_url('admin/groupdetails/'.$group['gid']); ?>"><?= $group['name'];?> </a>
                                  </td>
                                  <td class="text-center">
                                    <span class='label label-default'><?= $group['type']?> </span>
                                  </td>
                                  <td><?= $group['role'] ?></td>
                                  <td><?= $group['created'] ?></td>
                                </tr>
                              <?php } ?>
                            </tbody>
                          </table><p/><hr> 
                          <?php } else { ?>
                          
                            <div class="main-box clearfix">
                              <div class="main-box-body clearfix">
                                <br>
                                <div class="alert alert-warning">
                                  <i class="fa fa-question-circle fa-fw fa-lg"></i> <span>Not Member of Any Group.</span>
                                </div>
                              </div>
                            </div>

                          <?php } ?>
                          </div>







                          <div role="tab-pane fade" class="tab-pane" id="properties">
                            <div class="main-box clearfix">
                              <div class="main-box-body clearfix">
                                <br>
                                <div class="alert alert-warning">
                                  <i class="fa fa-question-circle fa-fw fa-lg"></i> <span>No property assignments.</span>
                                </div>

                                <div class="alert alert-info">
                                  <div>
                                    <h4><strong>Assign a New Property:</strong></h4>

                                    <form method="post" action="/master/api/properties/persons/assign" id="assign-property-form">
                                      <input type="hidden" name="PersonId" value="59" >
                                      <div class="row">
                                        <div class="form-group col-xs-12 col-md-7">
                                          <select name="PropertyId" id="input-person-properties" class="form-control select2"
                                          style="width:100%" data-placeholder="Select ...">
                                          <option disabled selected> -- select an option -- </option>
                                          <option value="1" data-pro_Prompt="What is the nature of the disability?" data-pro_Value="" >Disabled</option>                                                    </select>
                                        </div>
                                        <div id="prompt-box" class="col-xs-12 col-md-7">

                                        </div>
                                        <div class="form-group col-xs-12 col-md-7">
                                          <input id="assign-property-btn" type="submit" class="btn btn-primary" value="Assign" name="Submit">
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div role="tab-pane fade" class="tab-pane" id="volunteer">
                            <div class="main-box clearfix">
                              <div class="main-box-body clearfix">
                                <br>
                                <div class="alert alert-warning">
                                  <i class="fa fa-question-circle fa-fw fa-lg"></i> <span>No volunteer opportunity assignments.</span>
                                </div>
                                
                              </div>
                            </div>
                          </div>
                          <div role="tab-pane fade" class="tab-pane" id="notes">
                            <ul class="timeline">
                              <!-- note time label -->
                              <li class="time-label">
                                <span class="bg-yellow">
                                  2019-02-04              </span>
                                </li>
                                <!-- /.note-label -->

                                <!-- note item -->
                                <!-- END timeline item -->
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section></div>