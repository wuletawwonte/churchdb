
<style type="text/css">
  #groups-list-page .groups-pagination ul.pagination {
    display: flex;
    flex-wrap: wrap;
    gap: 0.25rem;
    justify-content: center;
    list-style: none;
    margin: 0;
    padding: 0;
  }
  @media (min-width: 640px) {
    #groups-list-page .groups-pagination ul.pagination {
      justify-content: flex-end;
    }
  }
  #groups-list-page .groups-pagination ul.pagination li a {
    box-sizing: border-box;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 2.25rem;
    min-height: 2.25rem;
    padding: 0.25rem 0.5rem;
    font-size: 0.8125rem;
    font-weight: 500;
    text-decoration: none;
    border-radius: var(--radius-field, 0.25rem);
    border: 1px solid color-mix(in oklch, var(--color-base-content) 15%, transparent);
    background: var(--color-base-100);
    color: var(--color-base-content);
  }
  #groups-list-page .groups-pagination ul.pagination li a:hover {
    background: color-mix(in oklch, var(--color-base-content) 8%, transparent);
    border-color: color-mix(in oklch, var(--color-base-content) 28%, transparent);
  }
  #groups-list-page .groups-pagination ul.pagination li.active a {
    background: var(--color-primary);
    border-color: var(--color-primary);
    color: var(--color-primary-content);
    cursor: default;
    pointer-events: none;
  }
</style>

<div id="groups-list-page" class="space-y-6">

  <?= view('templates/partials/page_heading', [
      'title' => lang('label.groups'),
      'breadcrumbs_html' => '<ul><li><a href="' . esc(base_url(), 'url') . '" class="link link-hover"><i class="fa fa-dashboard"></i> ዳሽቦርድ  </a></li><li class="text-base-content/80"> ቡድኖች </li></ul>',
  ]); ?>

  <section class="space-y-6">

    <?php if (session()->getFlashdata('success')) { ?>
      <div role="alert" class="alert alert-success shadow-sm">
        <button type="button" class="btn btn-sm btn-ghost btn-circle shrink-0" data-dismiss="alert" aria-label="close">×</button>
        <span><i class="fa fa-check" aria-hidden="true"></i> <?php echo session()->getFlashdata('success'); ?></span>
      </div>
    <?php } elseif (session()->getFlashdata('error')) { ?>
      <div role="alert" class="alert alert-error shadow-sm">
        <button type="button" class="btn btn-sm btn-ghost btn-circle shrink-0" data-dismiss="alert" aria-label="close">×</button>
        <span><i class="fa fa-ban" aria-hidden="true"></i> <?php echo session()->getFlashdata('error'); ?></span>
      </div>
    <?php } ?>

    <div class="card border border-base-content/15 bg-base-100 shadow-md">
      <div class="card-body border-b border-base-content/15 pb-4">
        <h2 class="card-title text-lg font-semibold">
          <i class="fa fa-plus-circle text-primary" aria-hidden="true"></i>
          <?= lang('label.create_group'); ?>
        </h2>
        <p class="text-sm text-base-content/60">አዲስ ቡድን ይፍጠሩ። አይነቱንና ስሙን ያስገቡ።</p>
      </div>
      <div class="card-body pt-4">
        <form method="post" action="<?= base_url('admin/savegroup'); ?>" class="grid grid-cols-1 gap-4 sm:grid-cols-12 sm:items-end">
          <label class="form-control w-full sm:col-span-5">
            <span class="label-text"><?= lang('label.group_type'); ?></span>
            <select name="type" class="select select-bordered w-full max-w-full s2">
              <option value="የአገልግሎት ቡድን">የአገልግሎት ቡድን</option>
              <option value="የአስተዳደር ቡድን">የአስተዳደር ቡድን</option>
              <option value="መዘምራን">መዘምራን</option>
              <option value="የሰንበት ትምህርት ቡድን">የሰንበት ትምህርት ቡድን</option>
            </select>
          </label>
          <label class="form-control w-full sm:col-span-5">
            <span class="label-text"><?= lang('label.name'); ?></span>
            <input type="text" name="name" maxlength="48" class="input input-bordered w-full" placeholder="የቡድን ስም" required>
          </label>
          <div class="flex sm:col-span-2">
            <button type="submit" class="btn btn-primary w-full gap-2 sm:w-auto">
              <i class="fa fa-save" aria-hidden="true"></i>
              <?= lang('label.save'); ?>
            </button>
          </div>
        </form>
      </div>
    </div>

    <div class="card border border-base-content/15 bg-base-100 shadow-md">
      <div class="card-body flex flex-col gap-4 border-b border-base-content/15 pb-4 sm:flex-row sm:items-center sm:justify-between">
        <div class="flex flex-wrap items-center gap-3">
          <h2 class="card-title mb-0 text-lg font-semibold">
            <i class="fa fa-object-group text-primary" aria-hidden="true"></i>
            የቡድኖች ዝርዝር
          </h2>
          <?php $groups_total = isset($groups_total) ? (int) $groups_total : count($groups); ?>
          <span class="badge badge-neutral gap-1 px-3 py-2 font-normal"><?= esc((string) $groups_total); ?> ቡድኖች</span>
        </div>
      </div>
      <div class="card-body pt-4">
        <div class="overflow-x-auto rounded-xl border border-base-content/15 bg-base-100">
          <table class="table table-zebra table-pin-rows w-full min-w-[520px]" id="groups-table">
            <thead class="bg-base-200/80">
              <tr>
                <th class="min-w-[10rem] font-semibold"><?= lang('label.name'); ?></th>
                <th class="font-semibold"><?= lang('label.group_type'); ?></th>
                <th class="font-semibold"><?= lang('label.created'); ?></th>
                <th class="w-40 text-center font-semibold">ስራዎች</th>
              </tr>
            </thead>
            <tbody class="text-sm">
              <?php foreach ($groups as $group) { ?>
                <tr class="hover:bg-base-200/50">
                  <td>
                    <a href="<?= base_url('admin/group/' . $group['gid']); ?>" class="link link-primary font-medium link-hover">
                      <?= esc($group['name']); ?>
                    </a>
                  </td>
                  <td>
                    <span class="badge badge-outline badge-neutral font-normal"><?= esc($group['type']); ?></span>
                  </td>
                  <td class="whitespace-nowrap text-base-content/80"><?= esc(nice_date($group['created'], 'M j, Y')); ?></td>
                  <td>
                    <div class="flex flex-wrap items-center justify-center gap-1">
                      <a href="<?= base_url('admin/group/' . $group['gid']); ?>" class="btn btn-ghost btn-xs btn-square" title="ዝርዝር" aria-label="ዝርዝር">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                      </a>
                      <a href="<?= base_url('admin/group/' . $group['gid']); ?>" class="btn btn-ghost btn-xs btn-square" title="አርትዖት" aria-label="አርትዖት">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                      </a>
                      <a href="<?= base_url('admin/deletegroup/' . $group['gid']); ?>"
                         class="btn btn-ghost btn-xs btn-square text-error hover:bg-error/10"
                         title="ሰርዝ"
                         aria-label="ሰርዝ"
                         onclick="return confirm('ይህን ቡድን መሰረዝ እርግጠኛ ነዎት?');">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                      </a>
                    </div>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>

        <?php if ($links !== '') : ?>
          <nav class="groups-pagination border-t border-base-content/15 pt-4 mt-4" aria-label="Pagination">
            <?= $links ?>
          </nav>
        <?php endif; ?>
      </div>
    </div>

  </section>
</div>
