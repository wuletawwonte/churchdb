<?php
/**
 * Drawer sidebar: app name block and nav menu.
 *
 * Expected keys from parent (via view(..., $data)):
 * @var string      $active_menu     Current menu slug (e.g. dashboard).
 * @var string      $appNameDb       Full app name from cnfg (system_name).
 * @var string      $appNameShortDb  Short app name from cnfg (system_name_short).
 * @var string      $appIconUrl      Application logo URL (public/logo.svg).
 */
$active_menu = $active_menu ?? '';
$appIconUrl = $appIconUrl ?? base_url('logo.svg');
?>
<div id="layout-drawer-side" class="drawer-side z-40">
  <label for="layout-drawer" aria-label="Close menu" class="drawer-overlay lg:hidden"></label>
  <aside class="flex min-h-full w-72 flex-col border-r border-base-content/15 bg-base-100">
    <div class="border-b border-base-content/15 p-4">
      <div class="flex items-center gap-3">
        <a
          href="<?= base_url(); ?>"
          class="inline-flex shrink-0 items-center justify-center no-underline text-base-content hover:text-base-content hover:no-underline focus:outline-none"
          aria-label="<?= esc($appNameShortDb); ?>"
        >
          <img
            src="<?= esc($appIconUrl); ?>"
            alt=""
            class="h-12 w-auto max-h-14 max-w-[6.5rem] object-contain object-center"
            decoding="async"
          />
        </a>
        <a href="<?= base_url(); ?>" class="min-w-0 flex-1 text-start no-underline text-base-content hover:text-base-content hover:no-underline focus:outline-none">
          <span class="block truncate text-base font-bold leading-tight"><?= esc($appNameShortDb); ?></span>
          <span class="block text-xs leading-snug text-base-content/60 line-clamp-2"><?= esc($appNameDb); ?></span>
        </a>
      </div>
    </div>
    <ul class="app-sidebar-menu menu menu-md menu-vertical w-full min-h-0 flex-1 gap-px overflow-y-auto overflow-x-hidden px-2 py-2">
      <li class="menu-title">ዋና ምርጫዎች</li>
      <li><a href="<?= base_url(); ?>" class="<?= $active_menu === 'dashboard' ? 'menu-active' : '' ?>"<?= $active_menu === 'dashboard' ? ' aria-current="page"' : '' ?>><i class="fa fa-dashboard"></i><?= lang('label.dashboard'); ?></a></li>
      <li><a href="<?= base_url(); ?>admin/members" class="<?= $active_menu === 'listmembers' ? 'menu-active' : '' ?>"<?= $active_menu === 'listmembers' ? ' aria-current="page"' : '' ?>><i class="fa fa-users"></i><?= lang('label.members'); ?></a></li>
      <li class="<?= ($_SESSION['current_user']['user_type'] == 'መደበኛ ተጠቃሚ' && $_SESSION['current_user']['p_manage_group'] != 'allow') ? 'hidden' : '' ?>"><a href="<?= base_url(); ?>admin/groups" class="<?= $active_menu === 'groups' ? 'menu-active' : '' ?>"<?= $active_menu === 'groups' ? ' aria-current="page"' : '' ?>><i class="fa fa-object-group"></i><?= lang('label.groups'); ?></a></li>
      <li><a href="<?= base_url(); ?>admin/sunday_school_classes" class="<?= $active_menu === 'sunday_school' ? 'menu-active' : '' ?>"<?= $active_menu === 'sunday_school' ? ' aria-current="page"' : '' ?>><i class="fa fa-child"></i> የሰንበት ትምህርት</a></li>
      <li><a href="<?= base_url(); ?>admin/listpayments" class="<?= $active_menu === 'listpayments' ? 'menu-active' : '' ?>"<?= $active_menu === 'listpayments' ? ' aria-current="page"' : '' ?>><i class="fa fa-money"></i> ክፍያ</a></li>
      <li><a href="<?= base_url(); ?>admin/report" class="<?= $active_menu === 'report' ? 'menu-active' : '' ?>"<?= $active_menu === 'report' ? ' aria-current="page"' : '' ?>><i class="fa fa-book"></i> ጠቅላላ መረጃ</a></li>
      <li><a href="<?= base_url(); ?>admin/membersexport" class="<?= $active_menu === 'membersexport' ? 'menu-active' : '' ?>"<?= $active_menu === 'membersexport' ? ' aria-current="page"' : '' ?>><i class="fa fa-file-pdf-o"></i> ምእመናን ሪፖርት</a></li>

      <li class="menu-title app-sidebar-menu-section<?= ($_SESSION['current_user']['user_type'] == 'መደበኛ ተጠቃሚ' && $_SESSION['current_user']['p_manage_form'] != 'allow') ? ' hidden' : '' ?>">ማስተካከያ</li>
      <li class="<?= ($_SESSION['current_user']['user_type'] == 'መደበኛ ተጠቃሚ' || $_SESSION['current_user']['user_type'] == 'የሲስተም አስተዳደር') ? 'hidden' : '' ?>"><a href="<?= base_url(); ?>admin/generalsetting" class="<?= $active_menu === 'generalsetting' ? 'menu-active' : '' ?>"<?= $active_menu === 'generalsetting' ? ' aria-current="page"' : '' ?>><i class="fa fa-gear"></i> አጠቃላይ ማስተካከያዎች</a></li>
      <li class="<?= ($_SESSION['current_user']['user_type'] == 'መደበኛ ተጠቃሚ' || $_SESSION['current_user']['user_type'] == 'የሲስተም አስተዳደር') ? 'hidden' : '' ?>"><a href="<?= base_url(); ?>admin/users" class="<?= $active_menu === 'users' ? 'menu-active' : '' ?>"<?= $active_menu === 'users' ? ' aria-current="page"' : '' ?>><i class="fa fa-user-secret"></i> የሲስተም ተጠቃሚዎች</a></li>
      <li class="<?= ($_SESSION['current_user']['user_type'] == 'መደበኛ ተጠቃሚ' && $_SESSION['current_user']['p_manage_form'] != 'allow') ? 'hidden' : '' ?>"><a href="<?= base_url(); ?>admin/listformelements" class="<?= $active_menu === 'formelements' ? 'menu-active' : '' ?>"<?= $active_menu === 'formelements' ? ' aria-current="page"' : '' ?>><i class="fa fa-tags"></i> የቅፅ ማስተካከያ</a></li>
      <li class="<?= ($_SESSION['current_user']['user_type'] == 'መደበኛ ተጠቃሚ' || $_SESSION['current_user']['user_type'] == 'የሲስተም አስተዳደር') ? 'hidden' : '' ?>"><a href="<?= base_url(); ?>admin/backupdatabase" class="<?= $active_menu === 'backupdatabase' ? 'menu-active' : '' ?>"<?= $active_menu === 'backupdatabase' ? ' aria-current="page"' : '' ?>><i class="fa fa-database"></i> የመረጃቋት ባካፕ</a></li>
      <li class="<?= ($_SESSION['current_user']['user_type'] == 'መደበኛ ተጠቃሚ' || $_SESSION['current_user']['user_type'] == 'የሲስተም አስተዳደር') ? 'hidden' : '' ?>"><a href="<?= base_url(); ?>admin/recyclebin" class="<?= $active_menu === 'recyclebin' ? 'menu-active' : '' ?>"<?= $active_menu === 'recyclebin' ? ' aria-current="page"' : '' ?>><i class="fa fa-trash"></i> ቆሼ</a></li>
    </ul>
  </aside>
</div>
