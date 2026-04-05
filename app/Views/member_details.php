
<script src="<?= base_url(); ?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/DataTables/datatables.min.css">


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

<div class="mb-6">
    <h1 class="text-2xl font-bold"><?= lang('label.person_profile') ?></h1>
    <div class="breadcrumbs text-sm">
        <ul>
            <li><a href="<?php echo base_url(); ?>admin/listmembers"><i class="fa fa-users"></i> ምዕመናን </a></li>
            <li> ምዕመን </li>
        </ul>
    </div>
</div>
<section class="content">
    <div class="flex flex-col gap-6 lg:flex-row">
        <div class="w-full shrink-0 lg:w-80">
            <div class="card border border-base-300 bg-base-100 shadow-md">
                <div class="card-body items-center text-center">
                    <a href="<?= base_url('admin/memberdetails/'.$member['id']); ?>">
                    	<?php if($member['avatar'] == NULL) { ?>
                            <div class="profile-image">
                                <div style="width: 100%; height: 100%; border-radius: 50%; background: <?= $member['profile_color']; ?>">
                                    <b><?= mb_substr($member['firstname'], 0, 1).mb_substr($member['middlename'], 0, 1); ?></b>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div style="margin: 0 auto;height: 130px; width: 130px;margin-top: 15px;">
                                <img class="rounded-full" style="border: 3px solid <?= $member['profile_color']; ?>;padding: 3px;height: 130px; width: 130px;" src="<?= base_url(); ?>assets/avatars/<?= $member['avatar']?>">
                            </div>

                        <?php } ?>
                    </a><br>
                  
                  <a href="<?= base_url('admin/memberdetails/'.$member['id']); ?>"><h3 class="text-center text-lg font-semibold">
                      <?php if($member['gender'] == 'ወንድ'){ ?>
                        <i class="fa fa-male"></i>
                      <?php } else {?>
                        <i class="fa fa-female"></i>
                      <?php } ?>
                        <?= $member['firstname']." ".$member['middlename']; ?></h3></a>


                      <a  href="<?= base_url('admin/editmember/'.$member['id']); ?>" class="btn btn-primary btn-block mt-2 <?php if($_SESSION['current_user']['user_type'] == 'መደበኛ ተጠቃሚ' && $_SESSION['current_user']['p_edit_member'] != 'allow'){ echo 'btn-disabled pointer-events-none'; } ?>" id="EditPerson"><b><?= lang('label.edit') ?></b></a>
                  </div>
        </div>

        <div class="card mt-4 border border-base-300 bg-base-100 shadow-md">
            <div class="card-body border-b border-base-300">
                <h3 class="card-title justify-center text-center"> ስለ እኔ </h3>
            </div>
          
            <div class="card-body overflow-x-hidden">
                <ul class="fa-ul">
                    <li><i class="fa-li fa fa-user"></i>የጋብቻ ሁኔታ: <?= $member['marital_status']?></li>
                    <?php if($member['spouse'] != NULL) { ?>
                        <li><i class="fa-li fa fa-user"></i>የትዳር አጋር: <a href="<?= base_url(); ?>admin/memberdetails/<?= $member['spouse_id']; ?>"><?= $member['spouse_name']?></a></li>
                    <?php } ?>
                    <li><i class="fa-li fa fa-calendar"></i>የትውልድ ቀን: <?= $member['birthdate']; ?></li>
                    <?php if(!$member['hide_age']) { ?> 
                        <li><i class="fa-li fa fa-heartbeat"></i> እድሜ: <span><?= $member['age'].' yrs old';?></span></li>
                    <?php } ?>
                    <li><i class="fa-li fa fa-phone"></i>የሞባይል ስልክ ቁጥር: <span><?= $member['mobile_phone']; ?></span></li>
                    <li><i class="fa-li fa fa-tty"></i>የቤት ስልክ ቁጥር: <span><?= $member['home_phone']; ?></span></li>
                    <li><i class="fa-li fa fa-envelope"></i>ኢሜል: <span><?= $member['email']; ?></span></li>
                    <li><i class="fa-li fa fa-info"></i>የአባልነት ደረጃ: <span><?= $member['membership_level']; ?></span></li>
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
        
        <div role="alert" class="alert alert-info mt-4">
            <i class="fa fa-fw fa-tree"></i> indicates items inherited from the associated family record.
        </div>
        </div>

        <div class="min-w-0 flex-1 space-y-4">
            <?php if(session()->getFlashdata('success')) { ?>
                <div class="alert alert-success"><span><?php echo session()->getFlashdata('success'); ?></span></div>
            <?php } else if(session()->getFlashdata('error')) { ?>
                <div class="alert alert-error"><span><?php echo session()->getFlashdata('error'); ?></span></div>
            <?php } ?>

            <div class="card border border-base-300 bg-base-100 p-4 shadow-md">
                <div class="flex flex-wrap gap-2">
                <a class="btn btn-outline btn-sm" href="<?= base_url(); ?>admin/memberdetailsprint/<?= $member['id']; ?>" target="_blank" rel="noopener"><i class="fa fa-print"></i> የሚታተም ገፅ </a>
                <a class="btn btn-outline btn-sm" href="<?= base_url(); ?>admin/memberdetails/<?= $member['id']?>/payment"><i class="fa fa-money"></i> የክፍያ መረጃ </a>
                <a class="btn btn-outline btn-sm" href="<?= base_url(); ?>admin/memberdetails/<?= $member['id']?>/status"><i class="fa fa-user"></i> የምዕመን ሁኔታ </a>
                <a class="btn btn-outline btn-sm" href="<?= base_url(); ?>admin/memberdetails/<?= $member['id']?>/notes"><i class="fa fa-sticky-note"></i> የተያዙ ማስታወሻዎች </a>
                <a class="btn btn-outline btn-sm <?php if($_SESSION['current_user']['user_type'] == 'መደበኛ ተጠቃሚ' && $_SESSION['current_user']['p_edit_member'] != 'allow'){ echo 'btn-disabled pointer-events-none'; } ?>" href="<?= base_url('admin/editmember/'.$member['id']); ?>"><i class="fa fa-user-secret"></i> መረጃ ቀይር </a>
                <button type="button" data-open-modal="deleteMember" class="btn btn-warning btn-sm delete-person"><i class="fa fa-trash-o"></i> ወደ ቆሼ </button>                
                <button type="button" data-open-modal="permanentlyDeleteMember" class="btn btn-error btn-sm delete-person"><i class="fa fa-trash-o"></i> አስወግድ </button>
                </div>
            </div>

            <dialog id="permanentlyDeleteMember" class="modal">
                <div class="modal-box">
                    <h3 class="text-lg font-bold">እርግጠኛ ኖት?</h3>
                    <p class="py-4">የዚህን ምዕመን መረጃ ሙሉ በሙሉ ሊያጠፉ ነው።</p>
                    <div class="modal-action">
                        <form method="dialog"><button class="btn">አይ</button></form>
                        <a href="<?= base_url()?>admin/permanentdeletemember/<?= $member['id']?>" class="btn btn-error">አዎ</a>
                    </div>
                </div>
                <form method="dialog" class="modal-backdrop"><button>close</button></form>
            </dialog>

            <dialog id="deleteMember" class="modal">
                <div class="modal-box">
                    <h3 class="text-lg font-bold">እርግጠኛ ኖት?</h3>
                    <p class="py-4">የዚህን ምዕመን መረጃ ወደ ቆሼ ሊከቱ ነው።</p>
                    <div class="modal-action">
                        <form method="dialog"><button class="btn">አይ</button></form>
                        <a href="<?= base_url()?>admin/deletemember/<?= $member['id']?>" class="btn btn-error">አዎ</a>
                    </div>
                </div>
                <form method="dialog" class="modal-backdrop"><button>close</button></form>
            </dialog>

            <div class="nav-tabs-custom card border border-base-300 bg-base-100 shadow-md">

            <ul class="tabs tabs-boxed flex flex-wrap gap-1 bg-base-200 p-2" role="tablist">
                <li role="presentation" <?php if($active_tab == NULL) { echo "class='active'"; } ?> ><a href="#details" aria-controls="details" role="tab" data-toggle="tab">ዝርዝር መረጃ</a></li>
                <li role="presentation"><a href="#timeline" aria-controls="timeline" role="tab" data-toggle="tab">የጊዜ መስመር</a></li>
                <li role="presentation"><a href="#groups" aria-controls="groups" role="tab" data-toggle="tab">የተመድቡበት ቡድን</a></li>
                <li role="presentation" <?php if($active_tab == 'payment') { echo "class='active'"; } ?> ><a href="#payment" aria-controls="payment" role="tab" data-toggle="tab"> የክፍያ መረጃ </a></li>
                <li role="presentation" <?php if($active_tab == 'status') { echo "class='active'"; } ?>><a href="#properties" aria-controls="properties" role="tab" data-toggle="tab">የምዕመን ሁኔታ</a></li>
                <li role="presentation" <?php if($active_tab == "notes") { echo "class='active'"; } ?>><a href="#notes" aria-controls="notes" role="tab" data-toggle="tab">ማስታወሻዎች</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">

                <!-- ዝርዝር መረጃ tab starts here -->

                <div class="tab-pane <?php if($active_tab == NULL) { echo "active"; } ?>" id="details">
                    <div class="row"><br>
                        <blockquote>
                            <p>የምዕመን ዝርዝር መረጃ የሚያካትታቸው ዝርዝሮች የሚከተሉትን ብቻ ሳይሆን የቡድን መረጃ እንዲሁም የማስታወሻ ጽሁፎችንም ያካትታ</p>
                            <small>የበተክርስቲያኒቱ ዋና የሲስተም አስተዳደር <cite title="Source Title">ፀጋ ዲዛይን</cite></small>
                        </blockquote>

                        <div class="col-md-6">
                          <div class="card border border-base-300 bg-base-100 shadow-md">
                            <div class="card-body border-b border-base-300 pb-3 mb-3">
                              <i class="fa fa-info"></i>

                              <h3 class="card-title text-lg">አድራሻና የሥራ ሁኔታ</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="card-body">
                                <dl class="dl-horizontal">
                                    <dt> ክፍለ ከተማ </dt>
                                    <dd> <?= $member['kifle_ketema']; ?></dd>
                                    <dt> ቀበሌ </dt>
                                    <dd> <?= $member['kebele']; ?></dd>
                                    <dt> መንደር </dt>
                                    <dd> <?= $member['mender']; ?> </dd>
                                    <dt> የቤት ቁጥር </dt>
                                    <dd> <?= $member['house_number']; ?> </dd>
                                    <dt> የሞባይል ስልክ ቁጥር </dt>
                                    <dd> <?= $member['mobile_phone']; ?> </dd>
                                    <dt> ኢሜል </dt>
                                    <dd> <?= $member['email']?> </dd>
                                    <dt> የሥራ አይነት </dt>
                                    <dd> <?= $member['job_type']?> </dd>
                                    <dt> የመሥሪያ ቤቱ ስም </dt>
                                    <dd> <?= $member['workplace_name']?> </dd>
                                    <dt> የመሥሪያ ቤት ስልክ ቁጥር </dt>
                                    <dd> <?= $member['workplace_phone']?> </dd>
                                </dl>                        
                            </div>
                            <!-- /.card-body -->
                          </div>
                          <!-- /.box -->
                        </div>

                        <div class="col-md-6">
                          <div class="card border border-base-300 bg-base-100 shadow-md">
                            <div class="card-body border-b border-base-300 pb-3 mb-3">
                              <i class="fa fa-info"></i>

                              <h3 class="card-title text-lg">የቤተክርስቲያን ተሳትፎ</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="card-body">
                                <dl class="dl-horizontal">
                                    <dt>አባል የሆኑበት ዘመን</dt>
                                    <dd><?php if($member['membership_year']) { echo $member['membership_year']; } else { echo ""; }?></dd>
                                    <dt>የአባልነት ደረጃ</dt>
                                    <dd><?= $member['membership_level']?></dd>
                                    <dt>አባል የሆኑበት ሁኔታ</dt>
                                    <dd><?= $member['membership_cause']?></dd>
                                    <dt>የአገልግሎት ዘርፍ</dt>
                                    <dd><?= $member['ministry']?></dd>
                                </dl>                        
                            </div>
                            <!-- /.card-body -->
                          </div>
                          <!-- /.box -->
                        </div>

                    </div>
                </div>

                <!-- የጊዜ መስመር tab starts here -->

                <div class="tab-pane" id="timeline">
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

                <div class="tab-pane" id="groups">
                    <?php if($assigned_groups != false) { ?>
                        <table class="table table-zebra w-full">
                            <thead>
                                <tr>
                                    <th><span><?= lang('label.name') ?></span></th>
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
                            <div class="main-card-body clearfix"><br>
                                <div class="alert alert-warning">
                                    <i class="fa fa-question-circle fa-fw fa-lg"></i> <span>በምንም ቡድን ውስጥ አልተመድቡም።</span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <!-- የአስራት መረጃ tab starts here -->

                <div class="tab-pane <?php if($active_tab == 'payment') { echo 'active'; } ?>" id="payment">
                    <div class="main-box">



                        <?php if(session()->getFlashdata('payment_save_success')) { ?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" style="opacity: 1; color: #ffffff;" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> ማስታወሻ!</h4>
                                <?php echo session()->getFlashdata('payment_save_success'); ?><br>
                                <a href="<?= base_url()?>admin/printreceipt/<?= session()->getFlashdata('transaction_id'); ?>" target="_blank" class="btn btn-outline" style="text-decoration: none;"><i class="fa fa-print"></i> ደረሰኝ አትም</a>                            
                            </div>
                        <?php } else if(session()->getFlashdata('payment_save_error')) { ?>
                            <div class="alert alert-error">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="fa fa-ban"></i> ይቅርታ</h4>
                                <?php echo session()->getFlashdata('payment_save_error'); ?>
                            </div>
                        <?php } ?>


                        <div class="box">

                            <div class="card-body border-b border-base-300 pb-3 mb-3">
                                <span>ክፍያ መዝግብ</span>
                            </div>
                            <div class="card-body">
                                <form id="memberSavePaymentForm" method="post" action="<?= base_url(); ?>admin/savepayment">    
                                    <input type="text" name="page" value="memberdetails" hidden> 
                                    <input type="text" name="member_id" value="<?= $member['id']?>" hidden> 

                                    <div class="col-md-3">
                                        <select name="payment_type" class="input input-bordered w-full s2" style="width: 100%;" tabindex="-1" area-hidden="true" required>
                                            <option disabled selected>ምክንያት</option>
                                            <option value="አስራት"> አስራት </option>
                                            <option value="የፍቅር ስጦታ"> የፍቅር ስጦታ </option>
                                            <option value="በኩራት"> በኩራት </option>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="input input-bordered w-full max-w-full w-full">
                                            <span class="label-text">ብር</span>
                                            <input type="tel" name="payment_amount" placeholder="የገንዘብ መጠን" class="input input-bordered w-full" required>
                                        </label>
                                    </div>


                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-primary" data-open-modal="savepayment">መዝግብ</button>
                                    </div>

                                </form>

                                <dialog id="savepayment" class="modal">
                                    <div class="modal-box">
                                        <h3 class="text-lg font-bold">እርግጠኛ ኖት?</h3>
                                        <p class="py-4">መልሶ ማስተካከል አይቻልም</p>
                                        <div class="modal-action">
                                            <button type="button" class="btn" onclick="document.getElementById('savepayment').close()">አይ</button>
                                            <button type="submit" form="memberSavePaymentForm" class="btn btn-primary" value="አዎ">አዎ</button>
                                        </div>
                                    </div>
                                    <form method="dialog" class="modal-backdrop"><button>close</button></form>
                                </dialog>
                            </div><br>
                        </div>


                        <div class="card-body table-responsive" style="padding: 0px;">
                            <table id="paymentsTable" class="table table-zebra w-full table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>መለያ</th>
                                        <th>ምክንያት</th>
                                        <th>መጠን</th>
                                        <th>ቀን (GC)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(empty($payments)) { ?>
                                        <tr>
                                            <td colspan="4" class="dataTables_empty" style="text-align: center; background-color: #eee;border-bottom-color: black;">ምንም አይነት የክፍያ መረጃ የለም</td>
                                        </tr>
                                    <?php } else { foreach($payments as $payment) { ?>
                                        <tr>
                                            <td><?= $payment['id']?></td>
                                            <td><?= $payment['payment_type']?></td>
                                            <td><?= $payment['payment_amount']?> ብር </td>
                                            <td><?= nice_date($payment['date_issued'], 'M d, Y')?></td>                                        
                                        </tr>
                                    <?php } } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>መለያ</th>
                                        <th>ምክንያት</th>
                                        <th>መጠን</th>
                                        <th>ቀን (GC)</th>
                                    </tr>                                    
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>

                <!-- የምዕመን ሁኔታ tab starts here -->

                <div class="tab-pane <?php if($active_tab == 'status') { echo "active"; } ?>" id="properties">
                    <div class="main-box clearfix">
                        <div class="main-card-body clearfix"><br>

                            <?php if(session()->getFlashdata('status_change_success')) { ?>
                                <div class="alert alert-info">
                                    <?php echo session()->getFlashdata('status_change_success'); ?>
                                </div>
                            <?php } else if(session()->getFlashdata('status_change_error')) { ?>
                                <div class="alert alert-error">
                                    <?php echo session()->getFlashdata('status_change_error'); ?>
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

                            <form method="post" action="<?= base_url(); ?>admin/changestatus" id="changestatusForm">
                                <input type="hidden" name="id" value="<?= $member['id']?>" >
                                <div class="row">
                                    <div class="col-md-6" style="padding-left: 0px; padding-right: 0px;">
                                        <div class="form-group col-xs-12">
                                            <select name="status" id="status" class="input input-bordered w-full s2" style="width:100%">
                                                <option value="ያለ">ያለ</option>
                                                <option value="የሌለ">የሌለ</option>
                                            </select>    
                                        </div>
                                        <div class="form-group col-xs-12" id="statusRemarkDiv" hidden>
                                            <textarea class="textarea textarea-bordered w-full" name="status_remark" id="statusRemark" rows="2" placeholder="ምርመራ ..."></textarea>
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-primary" data-open-modal="changeMemberStatus">ቀይር</button>
                                    </div>

                                </div>
                            </form>

                                    <dialog id="changeMemberStatus" class="modal">
                                        <div class="modal-box">
                                            <h3 class="text-lg font-bold">እርግጠኛ ኖት?</h3>
                                            <p class="py-4">ይህ ማስተካከያ በምዕመኑ መረጃ ላይ ትልቅ ተፅዕኖ አለው።</p>
                                            <div class="modal-action">
                                                <button type="button" class="btn" onclick="document.getElementById('changeMemberStatus').close()">አይ</button>
                                                <button type="submit" form="changestatusForm" class="btn btn-warning">አዎ</button>
                                            </div>
                                        </div>
                                        <form method="dialog" class="modal-backdrop"><button>close</button></form>
                                    </dialog>
                        </div>
                    </div>
                </div>                

                <!-- Notes tab starts here -->

                <div class="tab-pane <?php if($active_tab == 'notes') { echo "active"; } ?>" id="notes">


                    <?php if(session()->getFlashdata('note-save-success')) { ?>
                        <div class="alert alert-info">
                            <?php echo session()->getFlashdata('note-save-success'); ?>
                        </div>
                    <?php } else if(session()->getFlashdata('note-save-error')) { ?>
                        <div class="alert alert-error">
                            <?php echo session()->getFlashdata('note-save-error'); ?>
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
                                        <textarea class="input input-bordered w-full max-w-full" rows="3" name="note_content" placeholder="ማስታወሻ መያዣ ..." spellcheck="false" required></textarea>
                                    </div>                                
                                </div>
                                <div class="timeline-footer">
                                    <input type="submit" class="btn btn-primary" value="መዝግብ" />
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
                                  <a class="btn btn-warning btn-xs">View comment</a>
                                  <a class="btn btn-error btn-xs">አጥፋ</a>
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

        $(function () {
            $('#paymentsTable').DataTable({
                'paging'    : true,
                'lengthChange'  : false,
                'searching' : false,
                'ordering'  : true,
                'info'      : true,
                'autoWidth' : true,
                'language': {
                        url: '<?= base_url()?>assets/vendors/DataTables/locale/Amharic.json'
                    }
                })
        })



    });
</script>
