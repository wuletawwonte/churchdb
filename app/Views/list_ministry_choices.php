

<div class="mb-6">
  <h1 class="text-2xl font-bold">
    የአገልግሎት ዘርፍ
    <span class="mt-1 block text-base font-normal opacity-70">የአገልግሎት ዘርፍ የሚሞላው ፎርም ውስጥ ያሉ አማራጮች</span>
  </h1>
  <div class="breadcrumbs text-sm">
    <ul>
      <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> ዳሽቦርድ </a></li>
      <li><a href="<?= base_url(); ?>admin/listformelements"> የቅፅ ማስተካከያ </a></li>
      <li> የአገልግሎት ዘርፍ </li>
    </ul>
  </div>
</div>

<section class="space-y-4">

  <?php if (session()->getFlashdata('success')) { ?>
    <div class="alert alert-success"><span><?php echo session()->getFlashdata('success'); ?></span></div>
  <?php } elseif (session()->getFlashdata('error')) { ?>
    <div class="alert alert-error"><span><?php echo session()->getFlashdata('error'); ?></span></div>
  <?php } ?>

  <div class="card border border-base-300 bg-base-100 shadow-md">
    <div class="card-body">
      <form method="POST" action="<?= base_url('admin/addministrychoice'); ?>" class="flex flex-wrap items-end gap-4">
        <div class="min-w-[12rem] flex-1">
          <input type="text" placeholder="የአገልግሎት ዘርፍ" name="ministry_title" maxlength="48" class="input input-bordered w-full" required>
        </div>
        <input type="submit" class="btn btn-primary" name="" value="<?= lang('label.save') ?>">
      </form>

      <div class="mt-6 overflow-x-auto">
        <table class="table table-zebra">
          <?php foreach ($ministries as $choice) { ?>
            <tr>
              <td><?= esc($choice['ministry_title']); ?></td>
              <td class="text-center">
                <a href="#" data-open-modal="editMinistry<?= $choice['ministry_id']; ?>" class="link link-primary px-1"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="#" data-open-modal="deleteMinistry<?= $choice['ministry_id']; ?>" class="link link-error px-1"><i class="fa fa-trash" aria-hidden="true"></i></a>
              </td>
            </tr>
          <?php } ?>
        </table>
      </div>
    </div>
  </div>

  <?php foreach ($ministries as $choice) { ?>
    <dialog id="editMinistry<?= $choice['ministry_id'] ?>" class="modal">
      <div class="modal-box max-w-lg">
        <h3 class="text-lg font-bold">የአገልግሎት ዘርፍ ማስተካከያ</h3>
        <p class="py-2 text-sm opacity-80">እባክዎ በጥንቃቄ ይሙሉ</p>
        <form method="POST" action="<?= base_url('admin/editministrychoice'); ?>" class="space-y-4">
          <input type="text" name="ministry_old_title" value="<?= esc($choice['ministry_title']); ?>" hidden>
          <input type="text" name="ministry_new_title" maxlength="48" value="<?= esc($choice['ministry_title']); ?>" class="input input-bordered w-full" required>
          <div class="modal-action">
            <button type="button" class="btn" onclick="document.getElementById('editMinistry<?= $choice['ministry_id'] ?>').close()">ይቅር</button>
            <button type="submit" class="btn btn-info">አስተካክል</button>
          </div>
        </form>
      </div>
      <form method="dialog" class="modal-backdrop"><button>close</button></form>
    </dialog>

    <dialog id="deleteMinistry<?= $choice['ministry_id'] ?>" class="modal">
      <div class="modal-box">
        <h3 class="text-lg font-bold">እርግጠኛ ኖት?</h3>
        <p class="py-4">መልሶ ማስተካከል አይቻልም</p>
        <div class="modal-action">
          <form method="dialog"><button class="btn">አይ</button></form>
          <a href="<?= base_url(); ?>admin/deleteministry/<?= $choice['ministry_id']; ?>" class="btn btn-error">አዎ</a>
        </div>
      </div>
      <form method="dialog" class="modal-backdrop"><button>close</button></form>
    </dialog>
  <?php } ?>

</section>
