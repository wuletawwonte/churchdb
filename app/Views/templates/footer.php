<?php
$appCfgRow = model('Cnfg')->getValues(['system_name', 'system_name_short']);
$appNameDb = $appCfgRow['system_name'] !== '' ? $appCfgRow['system_name'] : (string) session()->get('system_name');
$appNameShortDb = $appCfgRow['system_name_short'] !== '' ? $appCfgRow['system_name_short'] : (string) session()->get('system_name_short');
?>
    </main>

  <footer class="border-t border-base-content/15 bg-base-100">
    <div class="mx-auto flex w-full max-w-[1920px] flex-wrap items-center justify-between gap-x-4 gap-y-1 px-4 py-2 text-sm text-base-content md:px-8">
      <p class="inline min-w-0 text-base-content/80">
        <span class="font-medium text-base-content"><?= esc($appNameShortDb); ?></span>
        <span class="mx-1.5 text-base-content/30" aria-hidden="true">·</span>
        <?= lang('label.copyright') ?> &copy; <?= date('Y'); ?>
        <a href="#" class="link link-hover"><?= esc('GraceSoft webdesign'); ?></a>.
        <?= lang('label.all_rights_reserved'); ?>.
      </p>
      <p class="inline shrink-0 whitespace-nowrap text-base-content/80">
        Version <span class="font-mono text-base-content">1.01</span>
      </p>
    </div>
  </footer>
</div>

<?= view('templates/partials/sidebar', [
    'active_menu'    => $active_menu ?? '',
    'appNameDb'      => $appNameDb,
    'appNameShortDb' => $appNameShortDb,
    'appIconUrl'     => base_url('logo.svg'),
]); ?>

</div>

<script src="<?= base_url('assets/js/theme.js'); ?>"></script>
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
