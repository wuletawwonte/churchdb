<?php
$ppF = $_SESSION['current_user']['profile_picture'] ?? null;
$avatarPathF = ($ppF === null || $ppF === '') ? 'img/user-icon.jpg' : 'profile_pictures/' . $ppF;
$avatarUrl = base_url('assets/' . $avatarPathF);
$fullName = session()->get('current_user')['firstname'] . ' ' . session()->get('current_user')['lastname'];
?>
    </main>

  <footer class="footer border-t border-base-300 bg-base-100 px-6 py-4 text-sm text-base-content/80">
    <aside class="grid-flow-col items-center">
      <strong><?= lang('label.copyright') ?> &copy; <?= date('Y'); ?> <a href="#" class="link link-hover font-semibold">GraceSoft webdesign</a>.</strong>
      <?= lang('label.all_rights_reserved') ?>.
    </aside>
    <aside class="grid-flow-col gap-2 md:place-self-center md:justify-self-end">
      <span><b>Version</b> 1.01</span>
    </aside>
  </footer>
</div>

<div class="drawer-side z-40">
  <label for="layout-drawer" aria-label="Close menu" class="drawer-overlay lg:hidden"></label>
  <aside class="flex min-h-full w-72 flex-col border-r border-base-300 bg-base-100">
    <div class="border-b border-base-300 p-4">
      <a href="<?= base_url(); ?>" class="btn btn-ghost h-auto flex-col gap-0 py-3 normal-case">
        <span class="text-lg font-bold leading-tight"><?= esc(session()->get('system_name_short')); ?></span>
        <span class="text-xs opacity-70"><?= esc(session()->get('system_name')); ?></span>
      </a>
    </div>
    <div class="flex items-center gap-3 border-b border-base-300 p-4">
      <div class="avatar">
        <div class="w-12 rounded-full">
          <img src="<?= esc($avatarUrl); ?>" alt="" />
        </div>
      </div>
      <div class="min-w-0 flex-1">
        <p class="truncate text-sm font-medium"><?= esc($fullName); ?></p>
        <p class="text-xs text-success"><i class="fa fa-circle text-[0.5rem]"></i> በመስመር ላይ</p>
      </div>
    </div>
    <ul class="menu menu-md w-full flex-1 gap-0 overflow-y-auto p-2">
      <li class="menu-title mt-2">ዋና ምርጫዎች</li>
      <li class="<?= ($active_menu ?? '') === 'dashboard' ? 'active' : '' ?>"><a href="<?= base_url(); ?>"><i class="fa fa-dashboard"></i><?= lang('label.dashboard'); ?></a></li>
      <li class="<?= ($active_menu ?? '') === 'personregistration' ? 'active' : '' ?> <?= ($_SESSION['current_user']['user_type'] == 'መደበኛ ተጠቃሚ' && $_SESSION['current_user']['p_register_member'] != 'allow') ? 'hidden' : '' ?>"><a href="<?= base_url(); ?>admin/personregistration"><i class="fa fa-user-plus"></i><?= lang('label.add_new_person'); ?></a></li>
      <li class="<?= ($active_menu ?? '') === 'listmembers' ? 'active' : '' ?>"><a href="<?= base_url(); ?>admin/listmembers"><i class="fa fa-users"></i><?= lang('label.members'); ?></a></li>
      <li class="<?= ($active_menu ?? '') === 'groups' ? 'active' : '' ?> <?= ($_SESSION['current_user']['user_type'] == 'መደበኛ ተጠቃሚ' && $_SESSION['current_user']['p_manage_group'] != 'allow') ? 'hidden' : '' ?>"><a href="<?= base_url(); ?>admin/listgroups"><i class="fa fa-object-group"></i><?= lang('label.groups'); ?></a></li>
      <li class="<?= ($active_menu ?? '') === 'sunday_school' ? 'active' : '' ?>"><a href="<?= base_url(); ?>admin/sunday_school_classes"><i class="fa fa-child"></i> የሰንበት ትምህርት</a></li>
      <li class="<?= ($active_menu ?? '') === 'listpayments' ? 'active' : '' ?>"><a href="<?= base_url(); ?>admin/listpayments"><i class="fa fa-money"></i> ክፍያ</a></li>
      <li class="<?= ($active_menu ?? '') === 'adminreport' ? 'active' : '' ?>"><a href="<?= base_url(); ?>admin/adminreport"><i class="fa fa-book"></i> ጠቅላላ መረጃ</a></li>
      <li class="<?= ($active_menu ?? '') === 'membersexport' ? 'active' : '' ?>"><a href="<?= base_url(); ?>admin/membersexport"><i class="fa fa-file-pdf-o"></i> ምእመናን ሪፖርት</a></li>

      <li class="menu-title <?= ($_SESSION['current_user']['user_type'] == 'መደበኛ ተጠቃሚ' && $_SESSION['current_user']['p_manage_form'] != 'allow') ? 'hidden' : '' ?>">ማስተካከያ</li>
      <li class="<?= ($active_menu ?? '') === 'generalsetting' ? 'active' : '' ?> <?= ($_SESSION['current_user']['user_type'] == 'መደበኛ ተጠቃሚ' || $_SESSION['current_user']['user_type'] == 'የሲስተም አስተዳደር') ? 'hidden' : '' ?>"><a href="<?= base_url(); ?>admin/generalsetting"><i class="fa fa-gear"></i> አጠቃላይ ማስተካከያዎች</a></li>
      <li class="<?= ($active_menu ?? '') === 'users' ? 'active' : '' ?> <?= ($_SESSION['current_user']['user_type'] == 'መደበኛ ተጠቃሚ' || $_SESSION['current_user']['user_type'] == 'የሲስተም አስተዳደር') ? 'hidden' : '' ?>"><a href="<?= base_url(); ?>admin/users"><i class="fa fa-user-secret"></i> የሲስተም ተጠቃሚዎች</a></li>
      <li class="<?= ($active_menu ?? '') === 'formelements' ? 'active' : '' ?> <?= ($_SESSION['current_user']['user_type'] == 'መደበኛ ተጠቃሚ' && $_SESSION['current_user']['p_manage_form'] != 'allow') ? 'hidden' : '' ?>"><a href="<?= base_url(); ?>admin/listformelements"><i class="fa fa-tags"></i> የቅፅ ማስተካከያ</a></li>
      <li class="<?= ($active_menu ?? '') === 'backupdatabase' ? 'active' : '' ?> <?= ($_SESSION['current_user']['user_type'] == 'መደበኛ ተጠቃሚ' || $_SESSION['current_user']['user_type'] == 'የሲስተም አስተዳደር') ? 'hidden' : '' ?>"><a href="<?= base_url(); ?>admin/backupdatabase"><i class="fa fa-database"></i> የመረጃቋት ባካፕ</a></li>
      <li class="<?= ($active_menu ?? '') === 'recyclebin' ? 'active' : '' ?> <?= ($_SESSION['current_user']['user_type'] == 'መደበኛ ተጠቃሚ' || $_SESSION['current_user']['user_type'] == 'የሲስተም አስተዳደር') ? 'hidden' : '' ?>"><a href="<?= base_url(); ?>admin/recyclebin"><i class="fa fa-trash"></i> ቆሼ</a></li>
    </ul>
  </aside>
</div>
</div>

<script src="<?= base_url('assets/js/app-ui.js'); ?>"></script>
<script type="text/javascript">
  $(window).on('load', function () {
    $('#searchbox').select2({
      placeholder: '<?= lang('label.search') ?>',
      ajax: {
        url: '<?= base_url('admin/ajax_get_member') ?>',
        datatype: 'json',
        delay: 250,
        processResults: function (data) {
          return { results: data };
        },
        cache: true
      }
    });
    $('.s2').select2({ minimumResultsForSearch: Infinity });
    $('.s2searchable').select2();
  });
</script>
</body>
</html>
