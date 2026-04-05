
<script src="<?= base_url(); ?>assets/vendors/DataTables/datatables.min.js"></script>

<link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/DataTables/datatables.min.css">

<?php
$members_total = is_countable($members) ? count($members) : 0;
$can_register = !($_SESSION['current_user']['user_type'] == 'መደበኛ ተጠቃሚ' && $_SESSION['current_user']['p_register_member'] != 'allow');
$can_edit = !($_SESSION['current_user']['user_type'] == 'መደበኛ ተጠቃሚ' && $_SESSION['current_user']['p_edit_member'] != 'allow');
?>

<style type="text/css">
    #members-list-page .members-list-table tbody td {
        vertical-align: middle;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
    }
    #members-list-page .members-list-table tbody td a {
        line-height: 1.25;
    }
    #members-list-page .members-list-table {
        white-space: nowrap;
    }
    #members-list-page .dataTables_wrapper .dataTables_length,
    #members-list-page .dataTables_wrapper .dataTables_filter {
        margin-bottom: 1rem;
    }
    #members-list-page .dataTables_wrapper .dataTables_filter input {
        margin-left: 0.5rem;
        border-radius: 0.25rem;
        border: 1px solid color-mix(in oklch, var(--color-base-content) 15%, transparent);
        background: var(--color-base-100, Canvas);
        color: inherit;
        padding: 0.375rem 0.75rem;
        min-height: 2.5rem;
    }
    #members-list-page .dt-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-bottom: 1rem;
    }
    #members-list-page .dt-buttons .btn {
        margin: 0;
    }
</style>

<div id="members-list-page" class="mb-6">
  <h1 class="text-2xl font-bold tracking-tight"><?= lang('label.members'); ?></h1>
  <p class="mt-1 text-sm text-base-content/70"><?= esc((string) $members_total); ?> መዝገቦች</p>
  <div class="breadcrumbs mt-2 text-sm">
    <ul>
      <li><a href="<?php echo base_url(); ?>" class="link link-hover"><i class="fa fa-dashboard"></i> ዳሽቦርድ</a></li>
      <li class="text-base-content/80"><?= lang('label.members'); ?></li>
    </ul>
  </div>
</div>

<section class="space-y-6">

    <?php if(session()->getFlashdata('success')) { ?>
        <div role="alert" class="alert alert-success shadow-sm">
            <button type="button" class="btn btn-sm btn-ghost btn-circle shrink-0" data-dismiss="alert" aria-label="close">×</button>
            <span><i class="fa fa-check" aria-hidden="true"></i> ጥሩ! <?php echo session()->getFlashdata('success'); ?></span>
        </div>
    <?php } else if(session()->getFlashdata('error')) { ?>
        <div role="alert" class="alert alert-error shadow-sm">
            <button type="button" class="btn btn-sm btn-ghost btn-circle shrink-0" data-dismiss="alert" aria-label="close">×</button>
            <span><i class="fa fa-ban" aria-hidden="true"></i> ይቅርታ <?php echo session()->getFlashdata('error'); ?></span>
        </div>
    <?php } ?>

    <div class="card border border-base-content/15 bg-base-100 shadow-md">
        <div class="card-body border-b border-base-content/15 pb-4">
            <h2 class="card-title text-lg font-semibold">
                <i class="fa fa-filter text-primary" aria-hidden="true"></i>
                ፍለጋ
            </h2>
            <p class="text-sm text-base-content/60">በፆታ፣ እድሜ፣ ሥራ እና ሌሎች መስፈርት ምዕመናን ያጣሩ።</p>
        </div>
        <div class="card-body pt-4">
        <form method="post" action="<?= base_url(); ?>admin/members" id="PersonList" class="space-y-6">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3">
                <label class="form-control w-full">
                    <span class="label-text">ፆታ</span>
                    <select name="gender" class="s2 w-full max-w-full">
                        <option value="" <?php if($_SESSION['filtermember']['gender'] == '') echo 'selected'; ?>> ወንድ እና ሴት </option>
                        <option value="ወንድ" <?php if($_SESSION['filtermember']['gender'] == 'ወንድ') echo 'selected'; ?>> ወንድ </option>
                        <option value="ሴት" <?php if($_SESSION['filtermember']['gender'] == 'ሴት') echo 'selected'; ?>> ሴት </option>
                    </select>
                </label>
                <label class="form-control w-full">
                    <span class="label-text">የእድሜ ቡድን</span>
                    <select name="age_group" class="s2 w-full max-w-full">
                        <option value="" <?php if($_SESSION['filtermember']['age_group'] == '') echo 'selected'; ?>> የእድሜ ቡድን </option>
                        <?php foreach($age_groups as $ag) { ?>
                            <option value="<?= $ag['ag_id'] ?>" <?php if($_SESSION['filtermember']['age_group'] == $ag['ag_id']) echo 'selected'; ?>>
                              <?= $ag['age_group_name']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </label>
                <label class="form-control w-full">
                    <span class="label-text">የሥራ አይነት</span>
                    <select name="job_type" class="s2 w-full max-w-full">
                        <option value="" <?php if($_SESSION['filtermember']['job_type'] == NULL) echo 'selected'; ?>> የሥራ አይነት </option>
                        <option value="አልተመረጠም" <?php if($_SESSION['filtermember']['job_type'] == 'አልተመረጠም') echo 'selected'; ?>>አልተመረጠም</option>
                        <?php foreach($job_types as $job_type) { ?>
                            <option value="<?= $job_type['job_type_title'] ?>" <?php if($_SESSION['filtermember']['job_type'] == $job_type['job_type_title']) echo 'selected'; ?>>
                              <?= $job_type['job_type_title']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </label>
                <label class="form-control w-full">
                    <span class="label-text">የጋብቻ ሁኔታ</span>
                    <select name="marital_status" class="s2 w-full max-w-full">
                        <option value="" <?php if($_SESSION['filtermember']['marital_status'] == NULL) echo 'selected'; ?>> የጋብቻ ሁኔታ </option>
                        <option value="አልተመረጠም" <?php if($_SESSION['filtermember']['marital_status'] == 'አልተመረጠም') echo 'selected'; ?> >አልተመረጠም</option>
                        <option value="0" disabled>-----------------------</option>
                        <option value="ያላገባ/ች" <?php if($_SESSION['filtermember']['marital_status'] == 'ያላገባ/ች') echo 'selected'; ?> > ያላገባ/ች </option>
                        <option value="ያገባ/ች" <?php if($_SESSION['filtermember']['marital_status'] == 'ያገባ/ች') echo 'selected'; ?> >ያገባ/ች</option>
                        <option value="የፈታ/ች" <?php if($_SESSION['filtermember']['marital_status'] == 'የፈታ/ች') echo 'selected'; ?> > የፈታ/ች</option>
                    </select>
                </label>
                <label class="form-control w-full">
                    <span class="label-text">የአባልነት ደረጃ</span>
                    <select name="membership_level" class="s2 w-full max-w-full">
                        <option value="" <?php if($_SESSION['filtermember']['membership_level'] == NULL) echo 'selected'; ?>>የአባልነት ደረጃ</option>
                        <option value="አልተመረጠም" <?php if($_SESSION['filtermember']['membership_level'] == 'አልተመረጠም') echo 'selected'; ?>>አልተመረጠም</option>
                        <?php foreach($membership_levels as $level) { ?>
                          <option value="<?= $level['membership_level_title']; ?>"<?php if($_SESSION['filtermember']['membership_level'] == $level['membership_level_title']) echo 'selected'; ?>>
                            <?= $level['membership_level_title']; ?>
                          </option>
                        <?php } ?>
                    </select>
                </label>
                <label class="form-control w-full">
                    <span class="label-text">የአገልግሎት ዘርፍ</span>
                    <select name="ministry" class="s2 w-full max-w-full">
                        <option value="" <?php if($_SESSION['filtermember']['ministry'] == NULL) echo 'selected'; ?>>የአገልግሎት ዘርፍ</option>
                        <option value="አልተመረጠም" <?php if($_SESSION['filtermember']['ministry'] == 'አልተመረጠም') echo 'selected'; ?>>አልተመረጠም</option>
                        <?php foreach($ministries as $ministry) { ?>
                          <option value="<?= $ministry['ministry_title']; ?>" <?php if($_SESSION['filtermember']['ministry'] == $ministry['ministry_title']) echo 'selected'; ?>>
                            <?= $ministry['ministry_title']; ?>
                          </option>
                        <?php } ?>
                    </select>
                </label>
            </div>
            <div class="flex flex-wrap items-center gap-3 border-t border-base-content/15 pt-4">
                <button type="submit" name="submit" class="btn btn-primary gap-2">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    አጣራ
                </button>
                <a href="<?= base_url(); ?>admin/clearfilter" class="btn btn-outline btn-neutral gap-2">
                    <i class="fa fa-eraser" aria-hidden="true"></i>
                    ፍለጋውን አጥፋ
                </a>
            </div>
        </form>
        </div>
    </div>

    <div class="card border border-base-content/15 bg-base-100 shadow-md">
        <div class="card-body flex flex-col gap-4 border-b border-base-content/15 pb-4 sm:flex-row sm:items-center sm:justify-between">
            <div class="flex flex-wrap items-center gap-3">
                <h2 class="card-title text-lg font-semibold mb-0">
                    <i class="fa fa-users text-primary" aria-hidden="true"></i>
                    ዝርዝር
                </h2>
                <span class="badge badge-neutral gap-1 px-3 py-2 font-normal"><?= esc((string) $members_total); ?> መዝገቦች</span>
            </div>
            <?php if ($can_register) : ?>
            <a href="<?= base_url('admin/personregistration'); ?>" class="btn btn-primary gap-2 shrink-0">
                <i class="fa fa-user-plus" aria-hidden="true"></i>
                <?= lang('label.add_new_person'); ?>
            </a>
            <?php endif; ?>
        </div>
        <div class="card-body pt-4">
        <div class="overflow-x-auto rounded-xl border border-base-content/15 bg-base-100">
            <table class="table members-list-table table-zebra table-pin-rows w-full min-w-[800px]" id="user-listing-table">
                <thead class="bg-base-200/80">
                <tr>
                    <th class="font-semibold" width="80">ፎቶ</th>
                    <th class="font-semibold"> ስም </th>
                    <th class="font-semibold">ፆታ</th>
                    <th class="font-semibold">የተወለዱበት ቀን</th>
                    <th class="font-semibold">እድሜ</th>
                    <th class="font-semibold">የትውልድ ስፍራ</th>
                    <th class="font-semibold">የሞባይል ስልክ ቁጥር</th>
                    <th class="font-semibold">ኢሜል</th>
                    <th class="font-semibold">የጋብቻ ሁኔታ</th>
                    <th class="font-semibold">የትዳር አጋር</th>
                    <th class="font-semibold">የተመዘገበበት</th>
                    <th class="font-semibold" data-priority="4">ስራዎች</th>
                    <th class="font-semibold">ክፍለ ከተማ</th>
                    <th class="font-semibold">ቀበሌ</th>
                    <th class="font-semibold">መንደር</th>
                    <th class="font-semibold">የቤት ቁጥር</th>
                    <th class="font-semibold">የመኖርያ ቤት ስልክ ቁጥር</th>
                    <th class="font-semibold">የትምህርት ደረጃ</th>
                    <th class="font-semibold">የሰለጠኑበት ሙያ መስክ</th>
                    <th class="font-semibold">የሥራ መስክ</th>
                    <th class="font-semibold">የመሥሪያ ቤቱ ስም</th>
                    <th class="font-semibold">የመሥሪያ ቤት ስልክ ቁጥር</th>
                    <th class="font-semibold">ወርሐዊ ገቢ</th>
                    <th class="font-semibold">አባል የሆኑበት ዘመን</th>
                    <th class="font-semibold">አባል የሆኑበት ሁኔታ</th>
                    <th class="font-semibold">የአባልነት ደረጃ</th>
                </tr>
                </thead>
                <tbody class="text-sm">

                    <?php foreach($members as $member) {  ?>

                    <tr class="hover:bg-base-200/50">

                        <td>
                            <a href="<?= base_url('admin/memberdetails/'.$member['id']); ?>" class="inline-flex leading-none">
                                <?= view('templates/partials/member_avatar', ['member' => $member, 'size' => 'sm']); ?>
                            </a>
                        </td>

                        <td>
                            <a href="<?= base_url('admin/memberdetails/'.$member['id']); ?>" class="link link-primary font-medium link-hover"> <?= esc($member['firstname'].' '.$member['middlename']); ?></a>
                        </td>

                        <td><?= esc($member['gender'])?></td>
                        <td><?= esc($member['birthdate'])?></td>
                        <td><?= esc($member['age'])?></td>
                        <td><?= esc($member['birth_place'])?></td>
                        <td><?= esc($member['mobile_phone'])?></td>
                        <td><?= esc($member['email'])?></td>
                        <td><?= esc($member['marital_status'])?></td>
                        <td><?php if($member['spouse'] != NULL) { echo esc($member['spouse_name']); } ?></td>
                        <td><?= esc(nice_date($member['created'], 'M d, Y'))?></td>
                        <td>
                            <div class="flex flex-wrap items-center gap-1">
                                <a href="<?= base_url('admin/memberdetails/'.$member['id']); ?>" class="btn btn-ghost btn-xs btn-square" title="ዝርዝር" aria-label="ዝርዝር"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <?php if ($can_edit) : ?>
                                <a href="<?= base_url('admin/editmember/'.$member['id']); ?>" class="btn btn-ghost btn-xs btn-square" title="አርትዖት" aria-label="አርትዖት"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td><?= esc($member['kifle_ketema'])?></td>
                        <td><?= esc($member['kebele'])?></td>
                        <td><?= esc($member['mender'])?></td>
                        <td><?= esc($member['house_number'])?></td>
                        <td><?= esc($member['home_phone'])?></td>
                        <td><?= esc($member['level_of_education'])?></td>
                        <td><?= esc($member['field_of_study'])?></td>
                        <td><?= esc($member['job_type'])?></td>
                        <td><?= esc($member['workplace_name'])?></td>
                        <td><?= esc($member['workplace_phone'])?></td>
                        <td><?= esc($member['monthly_income'])?></td>
                        <td><?= esc($member['membership_year'])?></td>
                        <td><?= esc($member['membership_cause'])?></td>
                        <td><?= esc($member['membership_level'])?></td>

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
            dom: '<"flex flex-col gap-4 md:flex-row md:flex-wrap md:items-center md:justify-between"<"flex flex-wrap gap-2"B><"flex flex-wrap items-center gap-2"f>>rtip',
            language: {
                url: '<?= base_url()?>assets/vendors/DataTables/locale/Amharic.json'
            },
            buttons: [
                { extend: 'copy', className: 'btn btn-sm btn-outline btn-primary' },
                { extend: 'csv', className: 'btn btn-sm btn-outline btn-primary' },
                { extend: 'excel', className: 'btn btn-sm btn-outline btn-primary' },
                { extend: 'print', className: 'btn btn-sm btn-outline btn-primary' }
            ],
            pageLength: 25,
            lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, 'ሁሉም']]
        });
    });
</script>
