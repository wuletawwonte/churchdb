
<script src="<?= base_url(); ?>assets/vendors/DataTables/datatables.min.js"></script>

<link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/DataTables/datatables.min.css">


<style type="text/css">

    table tbody td a, table tbody td span {
        line-height: 52px;
    }

    table {
        white-space: nowrap;
    }

</style>


<div class="mb-6">
  <h1 class="text-2xl font-bold"><?= lang('label.welcome') ?></h1>
  <div class="breadcrumbs text-sm">
    <ul>
      <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> ዳሽቦርድ </a></li>
      <li> ምዕመናን </li>
    </ul>
  </div>
</div>

<section class="space-y-4">

    <?php if(session()->getFlashdata('success')) { ?>
        <div role="alert" class="alert alert-success">
            <button type="button" class="btn btn-sm btn-ghost btn-circle" data-dismiss="alert" aria-label="close">×</button>
            <span><i class="fa fa-check"></i> ጥሩ! <?php echo session()->getFlashdata('success'); ?></span>
        </div>
    <?php } else if(session()->getFlashdata('error')) { ?>
        <div role="alert" class="alert alert-error">
            <button type="button" class="btn btn-sm btn-ghost btn-circle" data-dismiss="alert" aria-label="close">×</button>
            <span><i class="fa fa-ban"></i> ይቅርታ <?php echo session()->getFlashdata('error'); ?></span>
        </div>
    <?php } ?>

    <div class="card border border-base-300 bg-base-100 shadow-md">
        <div class="card-body">



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
                        <input type="submit" name="submit" class="btn btn-primary" value="አጣራ">
                        <a href="<?= base_url(); ?>admin/clearfilter" class="btn btn-warning"> ፍለጋውን አጥፋ </a><BR>

                    </td>
                </tr>
            </table>
        </form><hr><br>
            


        <div class="mt-6 overflow-x-auto">

            <table class="table table-zebra table-pin-rows w-full min-w-[800px]" id="user-listing-table">
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

                        <td class="align-middle leading-none">
                            <a href="<?= base_url('admin/memberdetails/'.$member['id']); ?>" class="inline-flex leading-none">
                                <?= view('templates/partials/member_avatar', ['member' => $member, 'size' => 'sm']); ?>
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
    </div>

</section>



<script>

    $(function () {
        $('#user-listing-table').DataTable({
            scrollX: true,
            dom: 'Blfrtip',
            language: {
                url: '<?= base_url()?>assets/vendors/DataTables/locale/Amharic.json'
            },
            buttons: [
                'copy', 'csv', 'excel', 'print'
            ]
        })
  })


</script>



