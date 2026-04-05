<?php
$membership_pie_segments = [];
foreach ($membership_levels as $ml) {
    $membership_pie_segments[] = [
        'value' => (int) ($ml['count'] ?? 0),
        'color' => (string) ($ml['color'] ?? '#777777'),
        'highlight' => (string) ($ml['color'] ?? '#777777'),
        'label' => (string) ($ml['title'] ?? ''),
    ];
}
$membership_pie_sum = array_sum(array_column($membership_pie_segments, 'value'));
?>

<?= view('templates/partials/page_heading', [
    'title' => lang('label.welcome'),
    'breadcrumbs_html' => '<ul><li class="text-base-content/80"><i class="fa fa-dashboard" aria-hidden="true"></i> ዳሽቦርድ</li></ul>',
]); ?>

<section class="space-y-6">

  <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
    <div class="stats border border-base-content/15 bg-base-100 shadow">
      <div class="stat">
        <div class="stat-figure text-info"><i class="fa fa-globe text-3xl"></i></div>
        <div class="stat-title"><?= lang('label.website_hits') ?></div>
        <div class="stat-value text-info">150</div>
        <div class="stat-desc"><a href="#" class="link"><?= lang('label.more_info') ?> <i class="fa fa-arrow-circle-right"></i></a></div>
      </div>
    </div>
    <div class="stats border border-base-content/15 bg-base-100 shadow">
      <div class="stat">
        <div class="stat-figure text-warning"><i class="fa fa-user text-3xl"></i></div>
        <div class="stat-title"><?= lang('label.members') ?></div>
        <div class="stat-value text-warning"><?= esc($total_members); ?></div>
        <div class="stat-desc"><a href="<?= base_url('admin/members'); ?>" class="link link-primary"><?= lang('label.more_info') ?> <i class="fa fa-arrow-circle-right"></i></a></div>
      </div>
    </div>
    <div class="stats border border-base-content/15 bg-base-100 shadow sm:col-span-2 lg:col-span-1">
      <div class="stat">
        <div class="stat-figure text-error"><i class="fa fa-tag text-3xl"></i></div>
        <div class="stat-title"><?= lang('label.groups') ?></div>
        <div class="stat-value text-error"><?= esc($total_groups); ?></div>
        <div class="stat-desc"><a href="<?= base_url('admin/groups'); ?>" class="link"><?= lang('label.more_info') ?> <i class="fa fa-arrow-circle-right"></i></a></div>
      </div>
    </div>
  </div>

  <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
    <div class="card border border-base-content/15 bg-base-100 shadow-md">
      <div class="card-body">
        <h2 class="card-title border-b border-base-content/15 pb-2"><?= lang('label.latest_members'); ?></h2>
        <ul class="menu w-full rounded-box bg-base-200/50 p-2">
          <?php foreach ($latest_members as $member) { ?>
            <li class="w-full">
              <a href="<?= base_url('admin/memberdetails/' . $member['id']); ?>" class="w-full gap-3">
                <?= view('templates/partials/member_avatar', ['member' => $member, 'size' => 'dashboard']); ?>
                <div class="min-w-0 flex-1">
                  <span class="block truncate font-medium"><?= esc($member['firstname'] . ' ' . $member['middlename']); ?></span>
                  <span class="text-xs opacity-70"><?= timespan(human_to_unix($member['created']), null, 1) . ' በፊት'; ?></span>
                </div>
              </a>
            </li>
          <?php } ?>
        </ul>
        <div class="card-actions justify-center border-t border-base-content/15 pt-4">
          <a href="<?= base_url(); ?>admin/members" class="link link-primary font-semibold uppercase">ወደ ምዕመናን ሁሉ</a>
        </div>
      </div>
    </div>

    <div class="space-y-4">
      <div class="card border border-base-content/15 bg-base-100 shadow-md overflow-hidden">
        <div class="card-body gap-4">
          <h2 class="card-title border-b border-base-content/15 pb-2"> የአባልነት ደራጃ ተዋፅኦ </h2>
          <div class="flex flex-col items-stretch gap-6 md:flex-row md:items-center">
            <div class="flex min-w-0 shrink-0 justify-center md:w-[min(44%,220px)]">
              <div class="chart-responsive box-border flex aspect-square w-full max-w-[200px] items-center justify-center overflow-hidden rounded-xl bg-base-200/40 p-2 md:max-w-none md:w-full">
                <?php if ($membership_pie_sum > 0) : ?>
                <canvas id="pieChart" width="184" height="184" class="block max-h-full max-w-full" style="width: 184px; height: 184px; max-width: 100%; max-height: 100%;"></canvas>
                <?php else : ?>
                <p class="px-2 text-center text-sm text-base-content/60">ለዚህ ስብስብ የአባልነት ደረጃ ቁጥር የለም።</p>
                <?php endif; ?>
              </div>
            </div>
            <ul class="flex min-w-0 flex-1 flex-col gap-2 text-sm">
              <?php foreach ($membership_levels as $membership_level) { ?>
                <li><i class="fa fa-circle-o" style="color: <?= esc($membership_level['color']); ?>;"></i> <?= esc($membership_level['title']); ?> </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>

      <?php
      $totalMembers = (int) $total_members;
      $femalePct = $totalMembers > 0 ? ($gender_count['female'] / $totalMembers) * 100 : 0.0;
      $malePct = $totalMembers > 0 ? ($gender_count['male'] / $totalMembers) * 100 : 0.0;
      ?>
      <div class="card border border-base-content/15 bg-base-100 shadow-md">
        <div class="card-body flex-row items-center gap-4">
          <div class="text-4xl text-warning"><i class="fa fa-female"></i></div>
          <div class="min-w-0 flex-1">
            <p class="text-sm opacity-80"> ሴት </p>
            <p class="text-2xl font-bold"><?= esc($gender_count['female']); ?></p>
            <progress class="progress progress-warning mt-2 w-full" value="<?= (int) round($femalePct); ?>" max="100"></progress>
            <p class="mt-1 text-xs opacity-70"> በፐርሰንት ሲቀመጥ፡ <?= (int) round($femalePct); ?>% </p>
          </div>
        </div>
      </div>
      <div class="card border border-base-content/15 bg-base-100 shadow-md">
        <div class="card-body flex-row items-center gap-4">
          <div class="text-4xl text-secondary"><i class="fa fa-male"></i></div>
          <div class="min-w-0 flex-1">
            <p class="text-sm opacity-80"> ወንድ </p>
            <p class="text-2xl font-bold"><?= esc($gender_count['male']); ?></p>
            <progress class="progress progress-secondary mt-2 w-full" value="<?= (int) round($malePct); ?>" max="100"></progress>
            <p class="mt-1 text-xs opacity-70"> በፐርሰንት ሲቀመጥ፡ <?= (int) round($malePct); ?>% </p>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>

<?php if ($membership_pie_sum > 0) : ?>
<script src="<?= base_url('assets/vendors/chartjs/Chart.min.js'); ?>"></script>
<script>
(function () {
  if (typeof Chart === 'undefined') {
    return;
  }
  var canvas = document.getElementById('pieChart');
  if (!canvas || !canvas.getContext) {
    return;
  }
  var ctx = canvas.getContext('2d');
  var pieData = <?= json_encode($membership_pie_segments, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP) ?: '[]' ?>;
  var pieOptions = {
    segmentShowStroke: true,
    segmentStrokeColor: '#ffffff',
    segmentStrokeWidth: 2,
    percentageInnerCutout: 50,
    animationSteps: 100,
    animationEasing: 'easeOutBounce',
    animateRotate: true,
    animateScale: false,
    responsive: false,
    maintainAspectRatio: true,
    legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
  };
  new Chart(ctx).Doughnut(pieData, pieOptions);
})();
</script>
<?php endif; ?>
