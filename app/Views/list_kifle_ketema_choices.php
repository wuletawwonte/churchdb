

<?= view('templates/partials/page_heading', [
    'title_html' => 'ክፍለ ከተማ<span class="mt-1 block text-base font-normal opacity-70">ክፍለ ከተማ የሚሞላው ፎርም ውስጥ ያሉ አማራጮች</span>',
    'breadcrumbs_html' => '<ul><li><a href="' . esc(base_url(), 'url') . '" class="link link-hover"><i class="fa fa-dashboard"></i> ዳሽቦርድ </a></li><li><a href="' . esc(base_url('admin/listformelements'), 'url') . '" class="link link-hover"> የቅፅ ማስተካከያ </a></li><li class="text-base-content/80"> ክፍለ ከተማ </li></ul>',
]); ?>

<section class="space-y-4">

  <?php if (session()->getFlashdata('success')) { ?>
    <div class="alert alert-success"><span><?php echo session()->getFlashdata('success'); ?></span></div>
  <?php } elseif (session()->getFlashdata('error')) { ?>
    <div class="alert alert-error"><span><?php echo session()->getFlashdata('error'); ?></span></div>
  <?php } ?>

  <div class="card border border-base-content/15 bg-base-100 shadow-md">
    <div class="card-body">
      <form method="POST" action="<?= base_url('admin/addkifleketemachoice'); ?>" class="flex flex-wrap items-end gap-4">
        <div class="min-w-[12rem] flex-1">
          <input type="text" placeholder="ክፍለ ከተማ" name="kifle_ketema_title" maxlength="48" class="input input-bordered w-full" required>
        </div>
        <input type="submit" class="btn btn-primary" name="" value="<?= lang('label.save') ?>">
      </form>

      <div class="mt-6 overflow-x-auto">
        <table class="table table-zebra">
          <?php foreach ($kifle_ketemas as $choice) { ?>
            <tr>
              <td>
                <a href="<?= base_url(); ?>admin/editkebeles/<?= $choice['kifle_ketema_id']; ?>" class="link link-hover">
                  <?= esc($choice['kifle_ketema_title']); ?>
                </a>
              </td>
              <td class="text-center">
                <a href="#" data-open-modal="editKifleKetema<?= $choice['kifle_ketema_id']; ?>" class="link link-primary px-1"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="#" data-open-modal="deleteKifleKetema<?= $choice['kifle_ketema_id']; ?>" class="link link-error px-1"><i class="fa fa-trash" aria-hidden="true"></i></a>
              </td>
            </tr>
          <?php } ?>
        </table>
      </div>
    </div>
  </div>

  <?php foreach ($kifle_ketemas as $choice) { ?>
    <dialog id="editKifleKetema<?= $choice['kifle_ketema_id'] ?>" class="modal">
      <div class="modal-box max-w-lg">
        <h3 class="text-lg font-bold">ክፍለ ከተማ ማስተካከያ</h3>
        <p class="py-2 text-sm opacity-80">እባክዎ በጥንቃቄ ይሙሉ</p>
        <form method="POST" action="<?= base_url('admin/editkifleketemachoice'); ?>" class="space-y-4">
          <input type="text" name="kifle_ketema_old_title" value="<?= esc($choice['kifle_ketema_title']); ?>" hidden>
          <input type="text" name="kifle_ketema_new_title" maxlength="48" value="<?= esc($choice['kifle_ketema_title']); ?>" class="input input-bordered w-full" required>
          <div class="modal-action">
            <button type="button" class="btn btn-ghost" onclick="document.getElementById('editKifleKetema<?= $choice['kifle_ketema_id'] ?>').close()">ይቅር</button>
            <button type="submit" class="btn btn-info">አስተካክል</button>
          </div>
        </form>
      </div>
      <form method="dialog" class="modal-backdrop"><button>close</button></form>
    </dialog>

    <dialog id="deleteKifleKetema<?= $choice['kifle_ketema_id'] ?>" class="modal">
      <div class="modal-box">
        <h3 class="text-lg font-bold">እርግጠኛ ኖት?</h3>
        <p class="py-4">መልሶ ማስተካከል አይቻልም</p>
        <div class="modal-action">
          <form method="dialog"><button class="btn btn-ghost">አይ</button></form>
          <a href="<?= base_url(); ?>admin/deletekifleketema/<?= $choice['kifle_ketema_id']; ?>" class="btn btn-error">አዎ</a>
        </div>
      </div>
      <form method="dialog" class="modal-backdrop"><button>close</button></form>
    </dialog>
  <?php } ?>

</section>
