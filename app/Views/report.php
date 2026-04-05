  <div class="space-y-6">
    <?= view('templates/partials/page_heading', [
        'title' => 'ጠቅላላ ሪፖርት',
        'breadcrumbs_html' => '<ul><li><a href="' . esc(base_url(), 'url') . '" class="link link-hover"><i class="fa fa-dashboard"></i> ዳሽቦርድ</a></li><li class="text-base-content/80">ሪፖርት</li></ul>',
    ]); ?>

    <div class="no-print alert alert-info shadow-sm">
      <div>
        <h3 class="font-bold">ለህትመት</h3>
        <p class="text-sm opacity-90">
          ከታች ያለውን ይመልከቱ። ለተለየ ቅጂ ወይም PDF «ህትመት ገፅ ክፈት» ይጫኑ፣ ከዚያ በአሳሽዎ የህትመት መስኮት ይተይቡ።
        </p>
      </div>
    </div>

    <div class="card bg-base-100 shadow-md print:shadow-none print:border print:border-base-content/20">
      <div class="card-body print:p-4">
        <?= view('reports/general_summary_content', [
            'system_name'    => $system_name,
            'church_name'    => $church_name,
            'issued_to_name' => $issued_to_name,
            'generated_at'   => $generated_at,
            'report_stats'   => $report_stats,
        ]); ?>
      </div>
    </div>

    <div class="no-print flex flex-wrap gap-3">
      <a href="<?= esc(base_url('admin/reportprint'), 'url'); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary gap-2">
        <i class="fa fa-print" aria-hidden="true"></i>
        ህትመት ገፅ ክፈት
      </a>
      <button type="button" class="btn btn-outline gap-2" onclick="window.print()">
        <i class="fa fa-file-text-o" aria-hidden="true"></i>
        ይህን ገፅ አትም
      </button>
    </div>
  </div>
