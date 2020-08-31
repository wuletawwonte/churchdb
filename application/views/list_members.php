
<script src="<?= base_url(); ?>assets/vendors/DataTables/datatables.min.js"></script>

<link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/DataTables/datatables.min.css">


<style type="text/css">

    .profile-image {
        width: 60px;
        height: 60px;
        padding: 2px;
        border-radius: 50%;
        border: 2px solid #d2d6de;
        font-size: 20px;
        color: #fff;
        line-height: 60px;
        text-align: center;
        margin: 0 0; 
    }

    table tbody td a, table tbody td span {
        line-height: 52px;
    }

    table {
        white-space: nowrap;
    }

</style>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= lang('welcome') ?>
      </h1>
      <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> ዳሽቦርድ  </a></li>
          <li class="active"> ምዕመናን </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <?php if($this->session->flashdata('success')) { ?>
        <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" style="opacity: 1; color: #ffffff;" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> ጥሩ!</h4>
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php } else if($this->session->flashdata('error')) { ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="fa fa-ban"></i> ይቅርታ</h4>
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php } ?>



    <!-- Default box -->
    <div class="box box-primary">
        <div class="box-body">



        <form method="post" action="<?= base_url(); ?>admin/listmembers" id="PersonList">
            <p align="center">
            <table align="center">
                <tr>
                    <td align="center" style="padding-top: 3px;">
                        <select name="gender" form="PersonList" class="s2">
                            <option value="" <?php if($_SESSION['filtermember']['gender'] == '') echo 'selected'; ?>> ወንድ እና ሴት </option>
                            <option value="ወንድ" <?php if($_SESSION['filtermember']['gender'] == 'ወንድ') echo 'selected'; ?>> ወንድ </option>
                            <option value="ሴት" <?php if($_SESSION['filtermember']['gender'] == 'ሴት') echo 'selected'; ?>> ሴት </option>
                        </select>  
                        
                        <select name="age_group" class="s2">
                            <option value="" <?php if($_SESSION['filtermember']['age_group'] == '') echo 'selected'; ?>> የእድሜ ቡድን </option>
                                    <?php foreach($age_groups as $ag) { ?>
                                        <option value="<?= $ag['ag_id'] ?>" <?php if($_SESSION['filtermember']['age_group'] == $ag['ag_id']) echo 'selected'; ?>> 
                                          <?= $ag['age_group_name']; ?> 
                                        </option>
                                    <?php } ?>
                        </select>

                        <select name="job_type" class="s2">
                            <option value="" <?php if($_SESSION['filtermember']['job_type'] == NULL) echo 'selected'; ?>> የሥራ አይነት </option>                                    
                                    <option value="አልተመረጠም" <?php if($_SESSION['filtermember']['job_type'] == 'አልተመረጠም') echo 'selected'; ?>>አልተመረጠም</option>
                                    <?php foreach($job_types as $job_type) { ?>
                                        <option value="<?= $job_type['job_type_title'] ?>" <?php if($_SESSION['filtermember']['job_type'] == $job_type['job_type_title']) echo 'selected'; ?>> 
                                          <?= $job_type['job_type_title']; ?> 
                                        </option>
                                    <?php } ?>
                        </select>
                        
                        <select name="marital_status" class="s2">
                            <option value="" <?php if($_SESSION['filtermember']['marital_status'] == NULL) echo 'selected'; ?>> የጋብቻ ሁኔታ </option>
                                    <option value="አልተመረጠም" <?php if($_SESSION['filtermember']['marital_status'] == 'አልተመረጠም') echo 'selected'; ?> >አልተመረጠም</option>
                                    <option value="0" disabled>-----------------------</option>
                                    <option value="ያላገባ/ች" <?php if($_SESSION['filtermember']['marital_status'] == 'ያላገባ/ች') echo 'selected'; ?> > ያላገባ/ች </option>
                                    <option value="ያገባ/ች" <?php if($_SESSION['filtermember']['marital_status'] == 'ያገባ/ች') echo 'selected'; ?> >ያገባ/ች</option>                        
                                    <option value="የፈታ/ች" <?php if($_SESSION['filtermember']['marital_status'] == 'የፈታ/ች') echo 'selected'; ?> > የፈታ/ች</option>

                        </select>
                          
                        <select name="membership_level" class="s2">
                            <option value="" <?php if($_SESSION['filtermember']['membership_level'] == NULL) echo 'selected'; ?>>የአባልነት ደረጃ</option>
                                    <option value="አልተመረጠም" <?php if($_SESSION['filtermember']['membership_level'] == 'አልተመረጠም') echo 'selected'; ?>>አልተመረጠም</option>
                                    <?php foreach($membership_levels as $level) { ?>
                                      <option value="<?= $level['membership_level_title']; ?>"<?php if($_SESSION['filtermember']['membership_level'] == $level['membership_level_title']) echo 'selected'; ?>> 
                                        <?= $level['membership_level_title']; ?> 
                                      </option>
                                    <?php } ?>
                        </select>
                          
                        <select name="ministry" class="s2">
                            <option value="" <?php if($_SESSION['filtermember']['ministry'] == NULL) echo 'selected'; ?>>የአገልግሎት ዘርፍ</option>
                                    <option value="አልተመረጠም" <?php if($_SESSION['filtermember']['ministry'] == 'አልተመረጠም') echo 'selected'; ?>>አልተመረጠም</option>
                                    <?php foreach($ministries as $ministry) { ?>
                                      <option value="<?= $ministry['ministry_title']; ?>" <?php if($_SESSION['filtermember']['ministry'] == $ministry['ministry_title']) echo 'selected'; ?>> 
                                        <?= $ministry['ministry_title']; ?> 
                                      </option>
                                    <?php } ?>
                        </select>
                        
                    </td>
                </tr>
                <tr>
                    <td style="padding-top: 10px;">
                        <input type="submit" name="submit" class="btn btn-primary btn-flat" value="አጣራ">
                        <a href="<?= base_url(); ?>admin/clearfilter" class="btn btn-warning btn-flat"> ፍለጋውን አጥፋ </a><BR>

                    </td>
                </tr>
            </table>
        </form><hr><br>
            


        <div class="row" style="margin-right: 0px;margin-left: 0px;">

            <table class="table table-hover table-bordered" id="user-listing-table">
                <thead>
                <tr>
                    <th width="80">ፎቶ</th>
                    <th colspan="1"> ስም </th>
                    <th>ፆታ</th>
                    <th>የተወለዱበት ቀን</th>
                    <th>እድሜ</th>
                    <th>የትውልድ ስፍራ</th>
                    <th>የሞባይል ስልክ ቁጥር</th>
                    <th>ኢሜል</th>
                    <th>የጋብቻ ሁኔታ</th>
                    <th>የትዳር አጋር</th>
                    <th>የተመዘገበበት</th>
                    <th data-priority="4" >ስራዎች</th>
                    <th>ክፍለ ከተማ</th>
                    <th>ቀበሌ</th>
                    <th>መንደር</th>
                    <th>የቤት ቁጥር</th>
                    <th>የመኖርያ ቤት ስልክ ቁጥር</th>
                    <th>የትምህርት ደረጃ</th>
                    <th>የሰለጠኑበት ሙያ መስክ</th>
                    <th>የሥራ መስክ</th>
                    <th>የመሥሪያ ቤቱ ስም</th>
                    <th>የመሥሪያ ቤት ስልክ ቁጥር</th>
                    <th>ወርሐዊ ገቢ</th>
                    <th>አባል የሆኑበት ዘመን</th>
                    <th>አባል የሆኑበት ሁኔታ</th>
                    <th>የአባልነት ደረጃ</th>

                </tr>
                </thead>
                <tbody>

                    <?php foreach($members as $member) {  ?>

                    <tr>

                        <td>
                            <a href="<?= base_url('admin/memberdetails/'.$member['id']); ?>">
                                <?php if($member['avatar'] == NULL) { ?>
                                    <div class="profile-image" >
                                        <div style="width: 100%; height: 100%; border-radius: 50%; background: <?= $member['profile_color']; ?>">
                                            <b><?= mb_substr($member['firstname'], 0, 1).mb_substr($member['middlename'], 0, 1); ?></b>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <div>
                                        <img class="img-circle" style="border: 2px solid <?= $member['profile_color']; ?>;padding: 2px;height: 60px; width: 60px;" src="<?= base_url(); ?>assets/avatars/<?= $member['avatar']?>">
                                    </div>
                                <?php } ?>
                            </a>
                        </td>

                        <td>
                            <a href="<?= base_url('admin/memberdetails/'.$member['id']); ?>"> <?= $member['firstname'].' '.$member['middlename']; ?></a>
                        </td>

                        <td><span><?= $member['gender']?></span></td>
                        <td><span><?= $member['birthdate']?></span></td>
                        <td><span><?= $member['age']?></span></td>
                        <td><span><?= $member['birth_place']?></span></td>
                        <td><span><?= $member['mobile_phone']?></span></td>
                        <td><span><?= $member['email']?></span></td>
                        <td><span><?= $member['marital_status']?></span></td>
                        <td><span><?php if($member['spouse'] != NULL) { echo $member['spouse_name']; } ?></span></td>
                        <td><span><?= nice_date($member['created'], 'M d, Y')?></span></td>
                        <td>
                            <a href="<?= base_url('admin/memberdetails/'.$member['id']); ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;&nbsp;
                            <a <?php if($_SESSION['current_user']['user_type'] == 'መደበኛ ተጠቃሚ' && $_SESSION['current_user']['p_edit_member'] != 'allow'){ echo 'hidden'; } ?> href="<?= base_url('admin/editmember/'.$member['id']); ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;
                        </td>
                        <td><span><?= $member['kifle_ketema']?></span></td>
                        <td><span><?= $member['kebele']?></span></td>
                        <td><span><?= $member['mender']?></span></td>
                        <td><span><?= $member['house_number']?></span></td>
                        <td><span><?= $member['home_phone']?></span></td>
                        <td><span><?= $member['level_of_education']?></span></td>
                        <td><span><?= $member['field_of_study']?></span></td>
                        <td><span><?= $member['job_type']?></span></td>
                        <td><span><?= $member['workplace_name']?></span></td>
                        <td><span><?= $member['workplace_phone']?></span></td>
                        <td><span><?= $member['monthly_income']?></span></td>
                        <td><span><?= $member['membership_year']?></span></td>
                        <td><span><?= $member['membership_cause']?></span></td>
                        <td><span><?= $member['membership_level']?></span></td>

                    </tr>

                    <?php } ?>

                </tbody>
            </table>

        </div>
    </div>
    <!-- /.box -->



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



<script>

    $(function () {
        $('#user-listing-table').DataTable({
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal( {
                        header: function ( row ) {
                            var data = row.data();
                            return data[1];
                        }
                    } ),
                    renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                        tableClass: 'table'
                    } )
                }
            },
            // dom: 'Bfrtip',
            dom: '<"row"<"col-sm-6 pull-left"B><"col-sm-6 pull-right"f>>rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>',            
            language: {
                url: '<?= base_url()?>assets/vendors/DataTables/locale/Amharic.json'
            },
            buttons: [
                'copy', 'csv', 'excel', 'print'
            ]
        })
  })


</script>



