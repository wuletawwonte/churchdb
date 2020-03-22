<style type="text/css">


.profile-image {
  margin: 0 auto;
  margin-top: 15px;
  width: 130px;
  height: 130px;
  padding: 3px;
  border-radius: 50%;
  border: 3px solid #d2d6de; 
  font-size: 50px;
  color: #fff;
  text-align: center;
  line-height: 128px;
}

.user-list tbody td a, .user-list tbody td span {
    line-height: 50px;
}

</style>

<div class="content-wrapper">
    <section class="content-header">
        <h1><?= lang('person_profile') ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/listmembers"><i class="fa fa-users"></i> ምዕመናን </a></li>
            <li class="active"> ምዕመን </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3">
        <div class="box box-primary">
            <div class="box-body box-profile">
                <a href="<?= base_url('admin/memberdetails/'.$member['id']); ?>">
                	<?php if($member['avatar'] == NULL) { ?>
                        <div class="profile-image">
                            <div style="width: 100%; height: 100%; border-radius: 50%; background: <?= $member['profile_color']; ?>">
                                <b><?= mb_substr($member['firstname'], 0, 1).mb_substr($member['middlename'], 0, 1); ?></b>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div style="margin: 0 auto;height: 130px; width: 130px;margin-top: 15px;">
                            <img class="img-circle" style="border: 3px solid <?= $member['profile_color']; ?>;padding: 3px;height: 130px; width: 130px;" src="<?= base_url(); ?>assets/avatars/<?= $member['avatar']?>">
                        </div>

                    <?php } ?>
                </a><br>
              
              <a href="<?= base_url('admin/memberdetails/'.$member['id']); ?>"><h3 class="profile-username text-center">
                  <?php if($member['gender'] == 'ወንድ'){ ?>
                    <i class="fa fa-male"></i>
                  <?php } else {?>
                    <i class="fa fa-female"></i>
                  <?php } ?>
                    <?= $member['firstname']." ".$member['middlename']; ?></h3></a>


                  <a  href="<?= base_url('admin/editmember/'.$member['id']); ?>" class="btn btn-primary btn-block <?php if($_SESSION['current_user']['user_type'] == 'መደበኛ ተጠቃሚ' && $_SESSION['current_user']['p_edit_member'] != 'allow'){ echo 'disabled'; } ?>" id="EditPerson"><b><?= lang('edit') ?></b></a>
              </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <!-- About Me Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title text-center"> ስለ እኔ </h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body" style="overflow-x: hidden;">
        <ul class="fa-ul">
            <li><i class="fa-li fa fa-user"></i>የጋብቻ ሁኔታ: <?= $member['marital_status']?></li>
            <li><i class="fa-li fa fa-calendar"></i>የትውልድ ቀን: <?= $member['birthdate']; ?></li>
            <?php if(!$member['hide_age']) { ?> 
                <li><i class="fa-li fa fa-heartbeat"></i> እድሜ: <span><?= $member['age'].' yrs old';?></span></li>
            <?php } ?>
            <li><i class="fa-li fa fa-phone"></i>የሞባይል ስልክ ቁጥር: <span><?= $member['mobile_phone']; ?></span></li>
            <li><i class="fa-li fa fa-tty"></i>የቤት ስልክ ቁጥር: <span><?= $member['home_phone']; ?></span></li>
            <li><i class="fa-li fa fa-envelope"></i>ኢሜል: <span><?= $member['email']; ?></span></li>
            <li><i class="fa-li fa fa-info"></i>የአባልነት ደረጃ: <span><?= $member['membership_level_title']; ?></span></li>
        </ul><hr>
        <strong>
            <i class="fa fa-book margin-r-5"></i>
            የትምህርት ሁኔታ
        </strong>
        <p class="text-muted">
            <b>የትምህርት ደረጃ፡</b> <?= $member['level_of_education']?>
            <b>የሰለጠኑበት ሙያ መስክ:</b> <?= $member['field_of_study']?>
        </p>

      </div>
    </div>
    
    <div class="alert alert-info alert-dismissable">
        <i class="fa fa-fw fa-tree"></i> indicates items inherited from the associated family record.        </div>
    </div>

      <div class="col-lg-9 col-md-9 col-sm-9">
        <?php if($this->session->flashdata('success')) { ?>
            <div class="callout callout-info">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php } else if($this->session->flashdata('error')) { ?>
            <div class="callout callout-danger">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php } ?>

      </div>

      <div class="col-lg-9 col-md-9 col-sm-9">
        <div class="box box-primary box-body">
          <a class="btn btn-app" href="<?= base_url(); ?>admin/memberdetailsprint/<?= $member['id']; ?>" target="_blank" ><i class="fa fa-print"></i> የሚታተም ገፅ </a>
          <a class="btn btn-app" href="<?= base_url(); ?>admin/memberdetails/<?= $member['id']?>/tithe"><i class="fa fa-money"></i> የአስራት መረጃ </a>
          <a class="btn btn-app" href="<?= base_url(); ?>admin/memberdetails/<?= $member['id']?>/status"><i class="fa fa-user"></i> የምዕመን ሁኔታ </a>
          <a class="btn btn-app" href="<?= base_url(); ?>admin/memberdetails/<?= $member['id']?>/notes"><i class="fa fa-sticky-note"></i> የተያዙ ማስታወሻዎች </a>
          <a class="btn btn-app" id="addGroup"><i class="fa fa-users"></i> <?= lang('assign_new_group') ?> </a>
          <a class="btn btn-app bg-maroon delete-person"><i class="fa fa-trash-o"></i> ምዕመን አጥፋ </a>
          <a class="btn btn-app <?php if($_SESSION['current_user']['user_type'] == 'መደበኛ ተጠቃሚ' && $_SESSION['current_user']['p_edit_member'] != 'allow'){ echo 'disabled'; } ?>" href="<?= base_url('admin/editmember/'.$member['id']); ?>"><i class="fa fa-user-secret"></i> መረጃ ቀይር </a>
        </div>
      </div>
      <div class="col-lg-9 col-md-9 col-sm-9">
        <div class="nav-tabs-custom">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" <?php if($active_tab == NULL) { echo "class='active'"; } ?> ><a href="#details" aria-controls="details" role="tab" data-toggle="tab">ዝርዝር መረጃ</a></li>
            <li role="presentation"><a href="#timeline" aria-controls="timeline" role="tab" data-toggle="tab">የጊዜ መስመር</a></li>
            <li role="presentation"><a href="#groups" aria-controls="groups" role="tab" data-toggle="tab">የተመድቡበት ቡድን</a></li>
            <li role="presentation" <?php if($active_tab == 'tithe') { echo "class='active'"; } ?> ><a href="#tithe" aria-controls="tithes" role="tab" data-toggle="tab"> የአስራት መረጃ </a></li>
            <li role="presentation" <?php if($active_tab == 'status') { echo "class='active'"; } ?>><a href="#properties" aria-controls="properties" role="tab" data-toggle="tab">የምዕመን ሁኔታ</a></li>
            <li role="presentation" <?php if($active_tab == "notes") { echo "class='active'"; } ?>><a href="#notes" aria-controls="notes" role="tab" data-toggle="tab">ማስታወሻዎች</a></li>
          </ul>

            <!-- Tab panes -->
            <div class="tab-content">

                <!-- ዝርዝር መረጃ tab starts here -->

                <div role="tab-pane fade" class="tab-pane <?php if($active_tab == NULL) { echo "active"; } ?>" id="details">
                    <div class="row"><br>
                        <blockquote>
                            <p>የምዕመን ዝርዝር መረጃ የሚያካትታቸው ዝርዝሮች የሚከተሉትን ብቻ ሳይሆን የቡድን መረጃ እንዲሁም የማስታወሻ ጽሁፎችንም ያካትታ</p>
                            <small>የበተክርስቲያኒቱ ዋና የሲስተም አስተዳደር <cite title="Source Title">ፀጋ ዲዛይን</cite></small>
                        </blockquote>

                        <div class="col-md-6">
                          <div class="box box-solid">
                            <div class="box-header with-border">
                              <i class="fa fa-info"></i>

                              <h3 class="box-title">አድራሻና የሥራ ሁኔታ</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <dl class="dl-horizontal">
                                    <dt> ክፍለ ከተማ </dt>
                                    <dd> <?= $member['kifle_ketema_title']; ?></dd>
                                    <dt> ቀበሌ </dt>
                                    <dd> <?= $member['kebele_title']; ?></dd>
                                    <dt> መንደር </dt>
                                    <dd> <?= $member['mender_title']; ?> </dd>
                                    <dt> የቤት ቁጥር </dt>
                                    <dd> <?= $member['house_number']; ?> </dd>
                                    <dt> የሞባይል ስልክ ቁጥር </dt>
                                    <dd> <?= $member['mobile_phone']; ?> </dd>
                                    <dt> ኢሜል </dt>
                                    <dd> <?= $member['email']?> </dd>
                                    <dt> የሥራ አይነት </dt>
                                    <dd> <?= $member['job_type_title']?> </dd>
                                    <dt> የመሥሪያ ቤቱ ስም </dt>
                                    <dd> <?= $member['workplace_name']?> </dd>
                                    <dt> የመሥሪያ ቤት ስልክ ቁጥር </dt>
                                    <dd> <?= $member['workplace_phone']?> </dd>
                                </dl>                        
                            </div>
                            <!-- /.box-body -->
                          </div>
                          <!-- /.box -->
                        </div>

                        <div class="col-md-6">
                          <div class="box box-solid">
                            <div class="box-header with-border">
                              <i class="fa fa-info"></i>

                              <h3 class="box-title">የቤተክርስቲያን ተሳትፎ</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <dl class="dl-horizontal">
                                    <dt>አባል የሆኑበት ዘመን</dt>
                                    <dd><?php if($member['membership_year']) { echo $member['membership_year']; } else { echo ""; }?></dd>
                                    <dt>የአባልነት ደረጃ</dt>
                                    <dd><?= $member['membership_level_title']?></dd>
                                    <dt>አባል የሆኑበት ሁኔታ</dt>
                                    <dd><?= $member['membership_cause_title']?></dd>
                                    <dt>የአገልግሎት ዘርፍ</dt>
                                    <dd><?= $member['ministry_title']?></dd>
                                </dl>                        
                            </div>
                            <!-- /.box-body -->
                          </div>
                          <!-- /.box -->
                        </div>

                    </div>
                </div>

                <!-- የጊዜ መስመር tab starts here -->

                <div role="tab-pane fade" class="tab-pane" id="timeline">
                    <div style="max-height: 450px;overflow-y: scroll;">
                        <ul class="timeline">
                            <!-- timeline time label -->
                            <li class="time-label">
                              <span class="bg-red">
                                <?= date('Y-m-d'); ?>                    </span>
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
                                      <h4 class="timeline-header">በ<?= $timeline['by_user']; ?> ተመዘገበ።</h4>
                                  </div>
                                </li>
                              <?php } else if($timeline['change_occured'] == 'updated') { ?>
                                <li>
                                  <!-- timeline icon -->
                                  <i class="fa fa-pencil bg-blue"></i>
                                  <div class="timeline-item">
                                    <span class="time">
                                      <i class="fa fa-clock-o"></i> <?= $timeline['date']; ?></span>
                                      <h4 class="timeline-header">በ<?= $timeline['by_user']; ?> ተቀየረ</h4>
                                  </div>
                                </li>
                              <?php } } ?>

                          <!-- END timeline item -->
                        </ul>
                    </div>
                </div>
                          
                <!-- ቡድኖች tab starts here -->

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
                            <div class="main-box-body clearfix"><br>
                                <div class="alert alert-warning">
                                    <i class="fa fa-question-circle fa-fw fa-lg"></i> <span>በምንም ቡድን ውስጥ አልተመድቡም።</span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <!-- የአስራት መረጃ tab starts here -->

                <div role="tab-pane fade" class="tab-pane <?php if($active_tab == 'tithe') { echo "active"; } ?>" id="tithe">
                    <div class="main-box clearfix">
                        <div class="row">
                            <div class="col-md-6">
                                <label> ወር :</label>
                                <select name="month" class="form-control s2searchable">
                                    <option value="መስከረም"> መስከረም </option>
                                    <option value="ጥቅምት"> ጥቅምት </option>
                                    <option value="ሕዳር"> ሕዳር </option>
                                    <option value="ታህሳስ"> ታህሳስ </option>
                                    <option value="ጥር"> ጥር </option>
                                    <option value="የካቲት"> የካቲት </option>
                                    <option value="መጋቢት"> መጋቢት </option>
                                    <option value="ሚያዝያ"> ሚያዝያ </option>
                                    <option value="ግንቦት"> ግንቦት </option>
                                    <option value="ሰኔ"> ሰኔ </option>
                                    <option value="ሐምሌ"> ሐምሌ </option>
                                    <option value="ነሀሴ"> ነሀሴ </option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="title"> ማዕረግ  :</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                        </div><br>


                        <div class="box-body table-responsive" style="padding: 0px;">
                            <table class="table table-hover table-bordered">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Reason</th>
                                    </tr>
                                    <tr>
                                        <td>183</td>
                                        <td>John Doe</td>
                                        <td>11-7-2014</td>
                                        <td><span class="label label-success">Approved</span></td>
                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    </tr>
                                    <tr>
                                        <td>219</td>
                                        <td>Alexander Pierce</td>
                                        <td>11-7-2014</td>
                                        <td><span class="label label-warning">Pending</span></td>
                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    </tr>
                                    <tr>
                                        <td>657</td>
                                        <td>Bob Doe</td>
                                        <td>11-7-2014</td>
                                        <td><span class="label label-primary">Approved</span></td>
                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <!-- Assigned properties tab starts here -->

                 <div role="tab-pane fade" class="tab-pane <?php if($active_tab == 'status') { echo "active"; } ?>" id="properties">
                    <div class="main-box clearfix">
                        <div class="main-box-body clearfix"><br>

                            <?php if($this->session->flashdata('status_change_success')) { ?>
                                <div class="callout callout-info">
                                    <?php echo $this->session->flashdata('status_change_success'); ?>
                                </div>
                            <?php } else if($this->session->flashdata('status_change_error')) { ?>
                                <div class="callout callout-danger">
                                    <?php echo $this->session->flashdata('status_change_error'); ?>
                                </div>
                            <?php } ?>


                            <div>
                                <div class="info-box col-md-6" style="padding-left: 0px;">
                                    <span class="info-box-icon <?php if($member['status'] == 'ያለ') echo 'bg-aqua'; else echo 'bg-red'; ?>"><i class="fa fa-bookmark-o"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">የምእመን ሁኔታ</span>
                                        <span class="info-box-number"><?= $member['status']?></span>
                                        <?php if($member['status'] == 'የሌለ') { ?>
                                            <p class="text-muted"><b>ምክንያት፡</b> <?= $member['status_remark']?></p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <h4><strong>የምዕመን ሁኔታ:</strong></h4>

                            <form method="post" action="<?= base_url(); ?>admin/changestatus" id="assign-property-form">
                                <input type="hidden" name="id" value="<?= $member['id']?>" >
                                <div class="row">
                                    <div class="col-md-6" style="padding-left: 0px; padding-right: 0px;">
                                        <div class="form-group col-xs-12">
                                            <select name="status" id="status" class="form-control s2" style="width:100%">
                                                <option value="ያለ">ያለ</option>
                                                <option value="የሌለ">የሌለ</option>
                                            </select>    
                                        </div>
                                        <div class="form-group col-xs-12" id="statusRemarkDiv" hidden>
                                            <textarea class="form-control" name="status_remark" id="statusRemark" rows="2" placeholder="ምርመራ ..."></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                      <input id="assign-property-btn" type="submit" class="btn btn-primary btn-flat" value="ቀይር">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>                

                <!-- Notes tab starts here -->

                <div role="tab-pane fade" class="tab-pane <?php if($active_tab == 'notes') { echo "active"; } ?>" id="notes">


                    <?php if($this->session->flashdata('note-save-success')) { ?>
                        <div class="callout callout-info">
                            <?php echo $this->session->flashdata('note-save-success'); ?>
                        </div>
                    <?php } else if($this->session->flashdata('note-save-error')) { ?>
                        <div class="callout callout-danger">
                            <?php echo $this->session->flashdata('note-save-error'); ?>
                        </div>
                    <?php } ?>


                    <div>                        
                        <ul class="timeline">
                            <li class="time-label">
                                <span class="bg-red">
                                    <?= date('d M. Y'); ?>
                                </span>
                            </li>


                            <li>
                              <i class="fa fa-newspaper-o bg-yellow"></i>

                              <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> አሁን </span>

                                <h3 class="timeline-header"><a href="#"><?= $_SESSION['current_user']['firstname']." ".$_SESSION['current_user']['lastname']; ?></a> አዲስ ማስታወሻ ያዝ</h3>
                                <div class="timeline-body">
                                    <form method="post" action="<?= base_url(); ?>admin/savenote">
                                    <input type="text" name="member_id" value="<?= $member['id']?>" hidden>
                                    <div class="form-group" style="margin-bottom: 0px;">
                                        <textarea class="form-control" rows="3" name="note_content" placeholder="ማስታወሻ መያዣ ..." spellcheck="false" required></textarea>
                                    </div>                                
                                </div>
                                <div class="timeline-footer">
                                    <input type="submit" class="btn btn-primary btn-flat" value="መዝግብ" />
                                    </form>
                                </div>
                              </div>
                            </li>

                            <?php foreach($notes as $note) { ?>
                            <li>
                              <i class="fa fa-newspaper-o bg-blue"></i>

                              <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i>  <?php echo timespan(human_to_unix($note['date']), null, 1).' በፊት'; ?></span>

                                <h3 class="timeline-header"><a href="#"><?= $note['firstname'].' '.$note['lastname']; ?></a> ማስታወሻ ይዟል</h3>

                                <div class="timeline-body"><?= $note['note_content']?></div>
                                <div class="timeline-footer">
                                  <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                                </div>
                              </div>
                            </li>
                            <?php } ?>

                            <li>
                              <i class="fa fa-clock-o bg-gray"></i>
                            </li>
                        </ul>

                    </div>




                </div>


              </div>
            </div>
          </div>
        </div>
    </section>
</div>


<script type="text/javascript">
    $(document).ready(function () {

        $("#status").change(function(){
            var selected = $(this).val();
            if(selected == "የሌለ") {
                $("#statusRemarkDiv").prop('hidden', false);
            } else {
                $("#statusRemarkDiv").prop('hidden', true);   
                $("#statusRemark").val('');             
            }
        });


    });
</script>
