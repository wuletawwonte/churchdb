<style type="text/css">


.profile-image {
  margin: 0 auto;
  width: 180px;
  height: 150px;
  border-radius: 5px;
  font-size: 80px;
  color: #fff;
  text-align: center;
  line-height: 150px;
}

</style>

<div class="content-wrapper">
    <section class="content-header">
      <h1>Person Profile</h1>
    </section>
    <!-- Main content -->
    <section class="content">
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3">
        <div class="box box-primary">
            <div class="box-body box-profile">
            	<div class="profile-image" style="background: <?= $member['profile_color']?>"><?= $member['firstname'][0].$member['middlename'][0]; ?></div><p/>
                <h3 class="profile-username text-center">
                  <?php if($member['gender'] == 'ወንድ'): ?>
                    <i class="fa fa-male"></i>
                  <?php else:?>
                    <i class="fa fa-female"></i>
                  <?php endif;?>
                    <?= $member['firstname']." ".$member['middlename']; ?></h3>

                <p class="text-muted text-center">
                    Head of Household                    &nbsp;
<!--                     <a id="edit-role-btn" data-person_id="59" data-family_role="Head of Household"
                       data-family_role_id="1"  class="btn btn-primary btn-xs">
                        <i class="fa fa-pencil"></i>
                    </a>
 -->                </p>

        <p class="text-muted text-center">
          Unassigned        </p>
                  <a href="/master/PersonEditor.php?PersonID=59" class="btn btn-primary btn-block" id="EditPerson"><b>Edit</b></a>
              </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <!-- About Me Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title text-center">About Me</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <ul class="fa-ul">
          <li><i class="fa-li fa fa-group"></i>Family: <span>
                                <a href="/master/FamilyView.php?FamilyID=13">Beck </a>
                  <a href="/master/FamilyEditor.php?FamilyID=13" class="table-link">
                  <span class="fa-stack">
                    <i class="fa fa-square fa-stack-2x"></i>
                    <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
                              </span></li>
                                            <li><i class="fa-li fa fa-home"></i>Address: <span>
            <a href="http://maps.google.com/?q=6381 Valwood Pkwy Buffalo, ME USA" target="_blank">
              6381 Valwood Pkwy Buffalo, ME USA            </a>
            </span></li>
                                    <li>
              <i class="fa-li fa fa-calendar"></i>Birth Date: 07/30/1974                            (<span></span>44 yrs old)
                          </li>
                      <li><i class="fa-li fa fa-mobile-phone"></i>Mobile Phone: <span><a href="tel:(742)-524-0575">(742)-524-0575</a></span></li>
                      <li><i class="fa-li fa fa-phone"></i>Home Phone: <span><a href="tel:(237)-926-6342">(237)-926-6342</a></span></li>
                        <li><i class="fa-li fa fa-envelope"></i>Email: <span><a href="mailto:franklin.beck@example.com">franklin.beck@example.com</a></span></li>
                                      </ul>
            </div>
        </div>
        <div class="alert alert-info alert-dismissable">
            <i class="fa fa-fw fa-tree"></i> indicates items inherited from the associated family record.        </div>
    </div>
    <div class="col-lg-9 col-md-9 col-sm-9">
        <div class="box box-primary box-body">
                        <a class="btn btn-app" href="/master/PrintView.php?PersonID=59"><i class="fa fa-print"></i> Printable Page</a>
            <a class="btn btn-app AddToPeopleCart" id="AddPersonToCart" data-cartpersonid="59"><i class="fa fa-cart-plus"></i><span class="cartActionDescription">Add to Cart</span></a>
                            <a class="btn btn-app" href="/master/WhyCameEditor.php?PersonID=59"><i class="fa fa-question-circle"></i> Edit "Why Came" Notes</a>
                <a class="btn btn-app" href="/master/NoteEditor.php?PersonID=59"><i class="fa fa-sticky-note"></i> Add a Note</a>
                                <a class="btn btn-app" id="addGroup"><i class="fa fa-users"></i> Assign New Group</a>
                                <a class="btn btn-app bg-maroon delete-person" data-person_name="Franklin Beck" data-person_id="59"><i class="fa fa-trash-o"></i> Delete this Record</a>
                                    <a class="btn btn-app" href="/master/UserEditor.php?NewPersonID=59"><i class="fa fa-user-secret"></i> Make User</a>
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

                        <!-- timeline item -->
                                                    <li>
                                <!-- timeline icon -->
                                <i class="fa fa-pencil bg-blue"></i>

                <div class="timeline-item">
                      <span class="time">
                                      <i class="fa fa-clock-o"></i> 2016-11-19 03:49:36</span>

                                            <h4 class="timeline-header">
                            Updated via Family by Church Admin                        </h4>
                                    </div>
              </li>
                                        <li>
                                <!-- timeline icon -->
                                <i class="fa fa-pencil bg-blue"></i>

                <div class="timeline-item">
                      <span class="time">
                                      <i class="fa fa-clock-o"></i> 2016-11-19 03:46:56</span>

                                            <h4 class="timeline-header">
                            Updated via Family by Church Admin                        </h4>
                                    </div>
              </li>
                                        <li>
                                <!-- timeline icon -->
                                <i class="fa fa-plus-circle bg-blue"></i>

                <div class="timeline-item">
                      <span class="time">
                                      <i class="fa fa-clock-o"></i> 2007-02-01 04:50:26</span>

                                            <h4 class="timeline-header">
                            Created by Church Admin                        </h4>
                                    </div>
              </li>
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