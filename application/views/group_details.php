

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        የቡድን አባላት
      </h1>

      <ol class="breadcrumb">
        <li><a href="<?= base_url(); ?>admin/listmembers"><i class="fa fa-dashboard"></i> ዳሽቦርድ </a></li>
        <li><a href="<?= base_url(); ?>admin/listgroups"><i class="fa fa-object-group"></i> ቡድኖች </a></li>
        <li class="active"> የቡድን አባላት </li>
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



        <div class="box box-primary">
            <div class="box-header with-border"><?= lang('add_member') ?></div>
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
                      <select id="members" name="member_id" class="form-control s3">

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



        <div class="box box-primary">
            <div class="box-header with-border" align="right">
                <p/><p/><p/>
                <button class="btn btn-info" type="button">
                    የቡድን ስም <span class="badge"> <?= $group['name']; ?> </span>
                </button>
                <button class="btn btn-success" type="button">
                    የቡድን አይነት <span class="badge"> <?= $group['type']; ?> </span>
                </button>
                <button class="btn btn-primary" type="button">
                    የቡድኑ አባላት በዛት <span class="badge" id="iTotalMembers"><?= count($group_members) ?></span>
                </button>
            </div>

            <div class="box-body table-responsive clearfix">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                          <th><span><?= lang('name') ?></span></th>
                          <th class="text-center"><span>አባልነት</span></th>
                          <th><span>የትውልድ ቀን</span></th>
                          <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($group_members as $member) {?>
                        <tr>
                          <td>                      
                            <a href="<?= base_url('admin/memberdetails/'.$member['member_id']); ?>"
                            class="user-link"><?= $member['firstname'].' '.$member['middlename'];?> </a>
                          </td>
                          <td class="text-center">
                            <span class='label label-default'><?= $member['role']?> </span>
                          </td>
                          <td>
                            <span> <?= $member['birthdate']?> </span>                                
                          </td>
                          <td>
                            <a onclick="return confirm('Are you sure');" class="delete-person" href="<?= base_url('admin/remove_group_member/'.$member['member_id'].'/'.$group['gid']); ?>">
                              <span class="fa-stack">
                                <i class="fa fa-square fa-stack-2x"></i>
                                <i class="fa fa-minus fa-stack-1x fa-inverse btn-danger"></i>
                              </span>
                            </a>
                          </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table><br>

            </div>
          </div>

  </section>
</div>


<script type="text/javascript">   
    // Wait for window load
    $(window).on('load', function() {
        $('.s3').select2();
    });
  
</script>