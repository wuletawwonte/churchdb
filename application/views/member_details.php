<style type="text/css">


.profile-image {
  margin: 0 auto;
  margin-top: 15px;
  width: 130px;
  height: 130px;
  border-radius: 50%;
  border: 3px solid #d2d6de; 
  font-size: 60px;
  color: #fff;
  text-align: center;
  line-height: 130px;
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
              
              <h3 class="profile-username text-center">
                  <?php if($member['gender'] == 'ወንድ'){ ?>
                    <i class="fa fa-male"></i>
                  <?php } else {?>
                    <i class="fa fa-female"></i>
                  <?php } ?>
                    <?= $member['firstname']." ".$member['middlename']; ?></h3>


        <p class="text-muted text-center">የቤተሰብ አባልነት: <b><?= $member['family_role']?></b></p>
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
            <i class="fa-li fa fa-calendar"></i><?= lang('birth_date') ?>: <?= $member['birthdate']; ?>                            (<span></span>44 yrs old)
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

                            <table class="table user-list table-hover">
                              <thead>
                                <tr>
                                  <th><span>Family Members</span></th>
                                  <th class="text-center"><span>Role</span></th>
                                  <th><span>Birthday</span></th>
                                  <th><span>Email</span></th>
                                  <th>&nbsp;</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>

                                   <img style="width:40px; height:40px;display:inline-block" src = "/master/api/person/59/thumbnail" class="initials-image profile-user-img img-responsive img-circle no-border">
                                   <a href="/master/PersonView.php?PersonID=59" class="user-link">Franklin Beck </a>


                                 </td>
                                 <td class="text-center">
                                  Head of Household                </td>
                                  <td>
                                    07/30/1974                </td>
                                    <td>
                                      <a href="mailto:franklin.beck@example.com">franklin.beck@example.com</a>
                                    </td>
                                    <td style="width: 20%;">
                                      <a class="AddToPeopleCart" data-cartpersonid="59">
                                        <span class="fa-stack">
                                          <i class="fa fa-square fa-stack-2x"></i>
                                          <i class="fa fa-cart-plus fa-stack-1x fa-inverse"></i>
                                        </span>
                                      </a>
                                      <a href="/master/PersonEditor.php?PersonID=59">
                                        <span class="fa-stack">
                                          <i class="fa fa-square fa-stack-2x"></i>
                                          <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                        </span>
                                      </a>
                                      <a class="delete-person" data-person_name="Franklin Beck"
                                      data-person_id="59" data-view="family">
                                      <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-trash-o fa-stack-1x fa-inverse btn-danger"></i>
                                      </span>
                                    </a>
                                  </td>
                                </tr>
                                <tr>
                                  <td>

                                   <img style="width:40px; height:40px;display:inline-block" src = "/master/api/person/60/thumbnail" class="initials-image profile-user-img img-responsive img-circle no-border">
                                   <a href="/master/PersonView.php?PersonID=60" class="user-link">Joel Beck </a>


                                 </td>
                                 <td class="text-center">
                                  Child                </td>
                                  <td>
                                    06/26/2011                </td>
                                    <td>
                                      <a href="mailto:joel.murray@example.com">joel.murray@example.com</a>
                                    </td>
                                    <td style="width: 20%;">
                                      <a class="AddToPeopleCart" data-cartpersonid="60">
                                        <span class="fa-stack">
                                          <i class="fa fa-square fa-stack-2x"></i>
                                          <i class="fa fa-cart-plus fa-stack-1x fa-inverse"></i>
                                        </span>
                                      </a>
                                      <a href="/master/PersonEditor.php?PersonID=60">
                                        <span class="fa-stack">
                                          <i class="fa fa-square fa-stack-2x"></i>
                                          <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                        </span>
                                      </a>
                                      <a class="delete-person" data-person_name="Joel Beck"
                                      data-person_id="60" data-view="family">
                                      <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-trash-o fa-stack-1x fa-inverse btn-danger"></i>
                                      </span>
                                    </a>
                                  </td>
                                </tr>
                                <tr>
                                  <td>

                                   <img style="width:40px; height:40px;display:inline-block" src = "/master/api/person/61/thumbnail" class="initials-image profile-user-img img-responsive img-circle no-border">
                                   <a href="/master/PersonView.php?PersonID=61" class="user-link">Stella Beck </a>


                                 </td>
                                 <td class="text-center">
                                  Child                </td>
                                  <td>
                                    07/18/2010                </td>
                                    <td>
                                      <a href="mailto:stella.soto@example.com">stella.soto@example.com</a>
                                    </td>
                                    <td style="width: 20%;">
                                      <a class="AddToPeopleCart" data-cartpersonid="61">
                                        <span class="fa-stack">
                                          <i class="fa fa-square fa-stack-2x"></i>
                                          <i class="fa fa-cart-plus fa-stack-1x fa-inverse"></i>
                                        </span>
                                      </a>
                                      <a href="/master/PersonEditor.php?PersonID=61">
                                        <span class="fa-stack">
                                          <i class="fa fa-square fa-stack-2x"></i>
                                          <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                        </span>
                                      </a>
                                      <a class="delete-person" data-person_name="Stella Beck"
                                      data-person_id="61" data-view="family">
                                      <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-trash-o fa-stack-1x fa-inverse btn-danger"></i>
                                      </span>
                                    </a>
                                  </td>
                                </tr>
                                <tr>
                                  <td>

                                   <img style="width:40px; height:40px;display:inline-block" src = "/master/api/person/62/thumbnail" class="initials-image profile-user-img img-responsive img-circle no-border">
                                   <a href="/master/PersonView.php?PersonID=62" class="user-link">Emma Beck </a>


                                 </td>
                                 <td class="text-center">
                                  Child                </td>
                                  <td>
                                    11/30/2015                </td>
                                    <td>
                                      <a href="mailto:emma.rice@example.com">emma.rice@example.com</a>
                                    </td>
                                    <td style="width: 20%;">
                                      <a class="AddToPeopleCart" data-cartpersonid="62">
                                        <span class="fa-stack">
                                          <i class="fa fa-square fa-stack-2x"></i>
                                          <i class="fa fa-cart-plus fa-stack-1x fa-inverse"></i>
                                        </span>
                                      </a>
                                      <a href="/master/PersonEditor.php?PersonID=62">
                                        <span class="fa-stack">
                                          <i class="fa fa-square fa-stack-2x"></i>
                                          <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                        </span>
                                      </a>
                                      <a class="delete-person" data-person_name="Emma Beck"
                                      data-person_id="62" data-view="family">
                                      <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-trash-o fa-stack-1x fa-inverse btn-danger"></i>
                                      </span>
                                    </a>
                                  </td>
                                </tr>
                                <tr>
                                  <td>

                                   <img style="width:40px; height:40px;display:inline-block" src = "/master/api/person/63/thumbnail" class="initials-image profile-user-img img-responsive img-circle no-border">
                                   <a href="/master/PersonView.php?PersonID=63" class="user-link">Julie Beck </a>


                                 </td>
                                 <td class="text-center">
                                  Spouse                </td>
                                  <td>
                                    08/21/1982                </td>
                                    <td>
                                      <a href="mailto:julie.gregory@example.com">julie.gregory@example.com</a>
                                    </td>
                                    <td style="width: 20%;">
                                      <a class="AddToPeopleCart" data-cartpersonid="63">
                                        <span class="fa-stack">
                                          <i class="fa fa-square fa-stack-2x"></i>
                                          <i class="fa fa-cart-plus fa-stack-1x fa-inverse"></i>
                                        </span>
                                      </a>
                                      <a href="/master/PersonEditor.php?PersonID=63">
                                        <span class="fa-stack">
                                          <i class="fa fa-square fa-stack-2x"></i>
                                          <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                        </span>
                                      </a>
                                      <a class="delete-person" data-person_name="Julie Beck"
                                      data-person_id="63" data-view="family">
                                      <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-trash-o fa-stack-1x fa-inverse btn-danger"></i>
                                      </span>
                                    </a>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <div role="tab-pane fade" class="tab-pane" id="groups">
                            <div class="main-box clearfix">
                              <div class="main-box-body clearfix">
                                <br>
                                <div class="alert alert-warning">
                                  <i class="fa fa-question-circle fa-fw fa-lg"></i> <span>No group assignments.</span>
                                </div>
                              </div>
                            </div>
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