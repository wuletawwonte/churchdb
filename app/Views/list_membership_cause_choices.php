

<div class="mb-6">
  <h1 class="text-2xl font-bold">
    አባል የሆኑበት ሁኔታ
    <span class="mt-1 block text-base font-normal opacity-70">አባል የሆኑበት ሁኔታ የሚሞላው ፎርም ውስጥ ያሉ አማራጮች</span>
  </h1>
  <div class="breadcrumbs text-sm">
    <ul>
      <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> ዳሽቦርድ </a></li>
      <li><a href="<?= base_url(); ?>admin/listformelements"> የቅፅ ማስተካከያ </a></li>
      <li> አባል የሆኑበት ሁኔታ </li>
    </ul>
  </div>
</div>

<section class="space-y-4">

  <?php if (session()->getFlashdata('success')) { ?>
    <div class="alert alert-success"><span><?php echo session()->getFlashdata('success'); ?></span></div>
  <?php } elseif (session()->getFlashdata('error')) { ?>
    <div class="alert alert-error"><span><?php echo session()->getFlashdata('error'); ?></span></div>
  <?php } ?>

  <div class="card border border-base-content/15 bg-base-100 shadow-md">
    <div class="card-body">
      <form method="POST" action="<?= base_url('admin/addmembershipcausechoice'); ?>" class="flex flex-wrap items-end gap-4">
        <div class="min-w-[12rem] flex-1">
          <input type="text" placeholder="አባል የሆኑበት ሁኔታ" name="membership_cause_title" maxlength="48" class="input input-bordered w-full" required>
        </div>
        <input type="submit" class="btn btn-primary" name="" value="<?= lang('label.save') ?>">
      </form>

      <div class="mt-6 overflow-x-auto">
        <table class="table table-zebra">
          <?php foreach ($membership_cause_choices as $choice) { ?>
            <tr>
              <td><?= esc($choice['membership_cause_title']); ?></td>
              <td class="text-center">
                <a href="#" data-open-modal="editMCause<?= $choice['membership_cause_id']; ?>" class="link link-primary px-1"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="#" data-open-modal="deleteMCause<?= $choice['membership_cause_id']; ?>" class="link link-error px-1"><i class="fa fa-trash" aria-hidden="true"></i></a>
              </td>
            </tr>
          <?php } ?>
        </table>
      </div>
    </div>
  </div>

  <?php foreach ($membership_cause_choices as $choice) { ?>
    <dialog id="editMCause<?= $choice['membership_cause_id'] ?>" class="modal">
      <div class="modal-box max-w-lg">
        <h3 class="text-lg font-bold">አባል የሆኑበት ሁኔታ ማስተካከያ</h3>
        <p class="py-2 text-sm opacity-80">እባክዎ በጥንቃቄ ይሙሉ</p>
        <form method="POST" action="<?= base_url('admin/editmembershipcausechoice'); ?>" class="space-y-4">
          <input type="text" name="membership_cause_old_title" value="<?= esc($choice['membership_cause_title']); ?>" hidden>
          <input type="text" name="membership_cause_new_title" maxlength="48" value="<?= esc($choice['membership_cause_title']); ?>" class="input input-bordered w-full" required>
          <div class="modal-action">
            <button type="button" class="btn btn-ghost" onclick="document.getElementById('editMCause<?= $choice['membership_cause_id'] ?>').close()">ይቅር</button>
            <button type="submit" class="btn btn-info">አስተካክል</button>
          </div>
        </form>
      </div>
      <form method="dialog" class="modal-backdrop"><button>close</button></form>
    </dialog>

    <dialog id="deleteMCause<?= $choice['membership_cause_id'] ?>" class="modal">
      <div class="modal-box">
        <h3 class="text-lg font-bold">እርግጠኛ ኖት?</h3>
        <p class="py-4">መልሶ ማስተካከል አይቻልም</p>
        <div class="modal-action">
          <form method="dialog"><button class="btn btn-ghost">አይ</button></form>
          <a href="<?= base_url(); ?>admin/deletemembershipcause/<?= $choice['membership_cause_id']; ?>" class="btn btn-error">አዎ</a>
        </div>
      </div>
      <form method="dialog" class="modal-backdrop"><button>close</button></form>
    </dialog>
  <?php } ?>

</section>
