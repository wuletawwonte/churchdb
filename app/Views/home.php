<script type="text/javascript" src="<?= base_url('assets/vendors/chartjs/Chart.min.js'); ?>"></script>

<style type="text/css">
  .profile-image {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    padding: 2px;
    border: 2px solid #d2d6de;
    font-size: 25px;
    color: #fff;
    text-align: center;
    line-height: 70px;
    margin: 0 auto;
  }
</style>

<div class="mb-6">
  <h1 class="text-2xl font-bold"><?= lang('label.welcome') ?></h1>
</div>

<section class="space-y-6">

  <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
    <div class="stats border border-base-300 bg-base-100 shadow">
      <div class="stat">
        <div class="stat-figure text-info"><i class="fa fa-globe text-3xl"></i></div>
        <div class="stat-title"><?= lang('label.website_hits') ?></div>
        <div class="stat-value text-info">150</div>
        <div class="stat-desc"><a href="#" class="link"><?= lang('label.more_info') ?> <i class="fa fa-arrow-circle-right"></i></a></div>
      </div>
    </div>
    <div class="stats border border-base-300 bg-base-100 shadow">
      <div class="stat">
        <div class="stat-figure text-warning"><i class="fa fa-user text-3xl"></i></div>
        <div class="stat-title"><?= lang('label.members') ?></div>
        <div class="stat-value text-warning"><?= esc($total_members); ?></div>
        <div class="stat-desc"><a href="<?= base_url('admin/listmembers'); ?>" class="link"><?= lang('label.more_info') ?> <i class="fa fa-arrow-circle-right"></i></a></div>
      </div>
    </div>
    <div class="stats border border-base-300 bg-base-100 shadow sm:col-span-2 lg:col-span-1">
      <div class="stat">
        <div class="stat-figure text-error"><i class="fa fa-tag text-3xl"></i></div>
        <div class="stat-title"><?= lang('label.groups') ?></div>
        <div class="stat-value text-error"><?= esc($total_groups); ?></div>
        <div class="stat-desc"><a href="<?= base_url('admin/listgroups'); ?>" class="link"><?= lang('label.more_info') ?> <i class="fa fa-arrow-circle-right"></i></a></div>
      </div>
    </div>
  </div>

  <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
    <div class="card border border-base-300 bg-base-100 shadow-md">
      <div class="card-body">
        <h2 class="card-title border-b border-base-300 pb-2"><?= lang('label.latest_members'); ?></h2>
        <ul class="menu rounded-box bg-base-200/50 p-2">
          <?php foreach ($latest_members as $member) { ?>
            <li>
              <a href="<?= base_url('admin/memberdetails/' . $member['id']); ?>" class="gap-3">
                <?php if ($member['avatar'] == null) { ?>
                  <div class="profile-image shrink-0">
                    <div class="flex h-full w-full items-center justify-center rounded-full" style="background: <?= esc($member['profile_color']); ?>">
                      <b><?= mb_substr($member['firstname'], 0, 1) . mb_substr($member['middlename'], 0, 1); ?></b>
                    </div>
                  </div>
                <?php } else { ?>
                  <div class="avatar shrink-0">
                    <div class="w-14 rounded-full ring ring-base-300" style="--tw-ring-color: <?= esc($member['profile_color']); ?>">
                      <img src="<?= base_url(); ?>assets/avatars/<?= esc($member['avatar']) ?>" alt="">
                    </div>
                  </div>
                <?php } ?>
                <div class="min-w-0 flex-1">
                  <span class="block truncate font-medium"><?= esc($member['firstname'] . ' ' . $member['middlename']); ?></span>
                  <span class="text-xs opacity-70"><?= timespan(human_to_unix($member['created']), null, 1) . ' በፊት'; ?></span>
                </div>
              </a>
            </li>
          <?php } ?>
        </ul>
        <div class="card-actions justify-center border-t border-base-300 pt-4">
          <a href="<?= base_url(); ?>admin/listmembers" class="link link-primary uppercase">ወደ ምዕመናን ሁሉ</a>
        </div>
      </div>
    </div>

    <div class="space-y-4">
      <div class="card border border-base-300 bg-base-100 shadow-md">
        <div class="card-body">
          <h2 class="card-title border-b border-base-300 pb-2"> የአባልነት ደራጃ ተዋፅኦ </h2>
          <div class="flex flex-col gap-4 md:flex-row">
            <div class="min-w-0 flex-1">
              <div class="chart-responsive flex justify-center">
                <canvas id="pieChart" height="160" width="207" style="width: 207px; height: 160px;"></canvas>
              </div>
            </div>
            <ul class="flex flex-col gap-2 text-sm md:w-2/5">
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
      <div class="card border border-base-300 bg-base-100 shadow-md">
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
      <div class="card border border-base-300 bg-base-100 shadow-md">
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

<script type="text/javascript">
  $(document).ready(function () {
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
    <?php foreach ($membership_levels as $membership_level) { ?>
      {
        value: <?= $membership_level['count'] ?>,
        color: '<?= $membership_level['color'] ?>',
        highlight: '<?= $membership_level['color'] ?>',
        label: "<?= $membership_level['title'] ?>"
      },
    <?php } ?>
    ];
    var pieOptions = {
      segmentShowStroke: true,
      segmentStrokeColor: '#fff',
      segmentStrokeWidth: 2,
      percentageInnerCutout: 50,
      animationSteps: 100,
      animationEasing: 'easeOutBounce',
      animateRotate: true,
      animateScale: true,
      responsive: true,
      maintainAspectRatio: true,
      legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    };
    pieChart.Doughnut(PieData, pieOptions);
  });
</script>
