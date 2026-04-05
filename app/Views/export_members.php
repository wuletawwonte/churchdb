
<div class="mb-6">
    <h1 class="text-2xl font-bold"> የምዕመን መረጃ ሪፖርት </h1>
    <div class="breadcrumbs text-sm">
        <ul>
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> ዳሽቦርድ </a></li>
            <li> የምዕመን ሪፖርት </li>
        </ul>
    </div>
</div>

<section class="space-y-6">

    <div class="card border border-base-content/15 bg-base-100 shadow-md">
        <div class="card-body">

            <form method="post" action="<?= base_url(); ?>admin/members" id="PersonList">
                <p class="text-center">
                    <table class="mx-auto">
                        <tr>
                            <td class="pt-2 text-center">
                                <select name="gender" form="PersonList" class="s2">
                                    <option value="" <?php if ($_SESSION['filtermember']['gender'] == '') {
                                        echo 'selected';
                                                         } ?>> ወንድ እና ሴት </option>
                                    <option value="ወንድ" <?php if ($_SESSION['filtermember']['gender'] == 'ወንድ') {
                                        echo 'selected';
                                                        } ?>> ወንድ </option>
                                    <option value="ሴት" <?php if ($_SESSION['filtermember']['gender'] == 'ሴት') {
                                        echo 'selected';
                                                       } ?>> ሴት </option>
                                </select>

                                <select name="age_group" class="s2">
                                    <option value="" <?php if ($_SESSION['filtermember']['age_group'] == '') {
                                        echo 'selected';
                                                         } ?>> የእድሜ ቡድን </option>
                                    <?php foreach ($age_groups as $ag) { ?>
                                        <option value="<?= $ag['ag_id'] ?>" <?php if ($_SESSION['filtermember']['age_group'] == $ag['ag_id']) {
                                            echo 'selected';
                                                                               } ?>>
                                            <?= $ag['age_group_name']; ?>
                                        </option>
                                    <?php } ?>
                                </select>

                                <select name="job_type" class="s2">
                                    <option value="" <?php if ($_SESSION['filtermember']['job_type'] == '') {
                                        echo 'selected';
                                                         } ?>> የሥራ አይነት </option>
                                    <option value="አልተመረጠም" <?php if ($_SESSION['filtermember']['job_type'] == 'አልተመረጠም') {
                                        echo 'selected';
                                                               } ?>> አልተመረጠም </option>
                                    <?php foreach ($job_types as $job_type) { ?>
                                        <option value="<?= $job_type['job_type_title'] ?>" <?php if ($_SESSION['filtermember']['job_type'] == $job_type['job_type_title']) {
                                            echo 'selected';
                                                                                           } ?>>
                                            <?= $job_type['job_type_title']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <select name="marital_status" class="s2">
                                    <option value="" <?php if ($_SESSION['filtermember']['marital_status'] == '') {
                                        echo 'selected';
                                                         } ?>> የጋብቻ ሁኔታ </option>
                                    <option value="አልተመረጠም" <?php if ($_SESSION['filtermember']['marital_status'] == 'አልተመረጠም') {
                                        echo 'selected';
                                                               } ?> >አልተመረጠም</option>
                                    <option value="0" disabled>-----------------------</option>
                                    <option value="ያላገባ/ች" <?php if ($_SESSION['filtermember']['marital_status'] == 'ያላገባ/ች') {
                                        echo 'selected';
                                                          } ?> > ያላገባ/ች </option>
                                    <option value="ያገባ/ች" <?php if ($_SESSION['filtermember']['marital_status'] == 'ያገባ/ች') {
                                        echo 'selected';
                                                         } ?> >ያገባ/ች</option>
                                    <option value="የፈታ/ች" <?php if ($_SESSION['filtermember']['marital_status'] == 'የፈታ/ች') {
                                        echo 'selected';
                                                         } ?> > የፈታ/ች</option>

                                </select>
                                <select name="membership_level" class="s2">
                                    <option value="" <?php if ($_SESSION['filtermember']['membership_level'] == null) {
                                        echo 'selected';
                                                         } ?>>የአባልነት ደረጃ</option>
                                    <option value="">አልተመረጠም</option>
                                    <?php foreach ($membership_levels as $membership_level) { ?>
                                        <option value="<?= $membership_level['membership_level_title']; ?>" <?php if ($_SESSION['filtermember']['membership_level'] == $membership_level['membership_level_title']) {
                                            echo 'selected';
                                                                                                              } ?>>
                                            <?= $membership_level['membership_level_title']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <select name="ministry" class="s2">
                                    <option value="" <?php if ($_SESSION['filtermember']['ministry'] == null) {
                                        echo 'selected';
                                                         } ?>>የአገልግሎት ዘርፍ</option>

                                    <option value="አልተመረጠም" <?php if ($_SESSION['filtermember']['ministry'] == 'አልተመረጠም') {
                                        echo 'selected';
                                                               } ?>>አልተመረጠም</option>
                                    <?php foreach ($ministries as $ministry) { ?>
                                        <option value="<?= $ministry['ministry_title']; ?>" <?php if ($_SESSION['filtermember']['ministry'] == $ministry['ministry_title']) {
                                            echo 'selected';
                                                                                                 } ?>>
                                            <?= $ministry['ministry_title']; ?>
                                        </option>
                                    <?php } ?>
                                </select><br><br>
                                <input type="submit" name="submit" class="btn btn-primary" value="አጣራ">
                                <a href="<?= base_url(); ?>admin/clearfilter" class="btn btn-warning"> ፍለጋውን አጥፋ </a><br><br>
                            </td>
                        </tr>
                    </table>
                </form>

        </div>

        <div class="card-actions flex-wrap justify-center border-t border-base-content/15 bg-base-200/30 py-4" <?php if ($_SESSION['current_user']['user_type'] == 'መደበኛ ተጠቃሚ' && $_SESSION['current_user']['p_generate_member_report'] != 'allow') {
            echo 'hidden';
                                                                                                       } ?>>
            <span class="w-full text-center text-sm opacity-80">Export:</span>
            <a href="<?= base_url(); ?>admin/export_members_excel" class="btn btn-ghost btn-sm"><i class="fa fa-file-excel-o"></i> Excel</a>
            <a href="<?= base_url(); ?>admin/export_members_csv" class="btn btn-ghost btn-sm"><i class="fa fa-file-o"></i> CSV</a>
            <a href="<?= base_url(); ?>admin/export_members_print" target="_blank" rel="noopener" class="btn btn-ghost btn-sm"><i class="fa fa-file-pdf-o"></i> PDF</a>
            <a href="<?= base_url(); ?>admin/export_members_print" target="_blank" rel="noopener" class="btn btn-ghost btn-sm"><i class="fa fa-print"></i> Print</a>
        </div>

    </div>

    <?php if (session()->getFlashdata('success')) { ?>
        <div class="alert alert-success"><span><?php echo session()->getFlashdata('success'); ?></span></div>
    <?php } elseif (session()->getFlashdata('error')) { ?>
        <div class="alert alert-error"><span><?php echo session()->getFlashdata('error'); ?></span></div>
    <?php } ?>

    <div class="card border border-base-content/15 bg-base-100 shadow-md">
        <div class="card-body border-b border-base-content/15">
            <h2 class="card-title">ሪፖርት ማዘዣ </h2>
        </div>
        <div class="card-body">
            <div class="text-center">
                <a href="<?= base_url(); ?>admin/export_members_excel_backup" class="btn btn-primary btn-lg">ሪፖርት አዘጋጅ</a>
            </div>
            <div class="mt-6 overflow-x-auto">
                <table class="table table-zebra w-full">
                    <thead>
                        <tr>
                            <th>ቀን</th>
                            <th class="text-center">ተግባራት</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($export_backups as $backup) { ?>
                            <tr>
                                <td><?= esc($backup['title']) ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url(); ?>download/<?= $backup['filename']; ?>" class="link link-primary px-2"><i class="fa fa-download" aria-hidden="true"></i></a>
                                    <a href="#" data-open-modal="deleteBackup<?= $backup['id']; ?>" class="link link-error px-2"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php foreach ($export_backups as $backup) { ?>
        <dialog id="deleteBackup<?= $backup['id'] ?>" class="modal">
            <div class="modal-box">
                <h3 class="text-lg font-bold">እርግጠኛ ኖት?</h3>
                <p class="py-4">መልሶ ማስተካከል አይቻልም</p>
                <div class="modal-action">
                    <form method="dialog"><button class="btn btn-ghost">አይ</button></form>
                    <a href="<?= base_url(); ?>admin/deletemembersbackup/<?= $backup['id']; ?>" class="btn btn-error">አዎ</a>
                </div>
            </div>
            <form method="dialog" class="modal-backdrop"><button>close</button></form>
        </dialog>
    <?php } ?>

</section>
