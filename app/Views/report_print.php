<!DOCTYPE html>
<html lang="am">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= esc($church_name !== '' ? $church_name . ' — ' : ''); ?>ጠቅላላ ሪፖርት</title>
  <link rel="stylesheet" href="<?= esc(base_url('assets/vendors/font-awesome/css/font-awesome.min.css'), 'url'); ?>">
  <link rel="stylesheet" href="<?= esc(base_url('assets/css/tailwind.css'), 'url'); ?>">
  <style>
    @media print {
      @page {
        margin: 12mm;
      }
      body {
        background: #fff !important;
        print-color-adjust: exact;
        -webkit-print-color-adjust: exact;
      }
      .no-print {
        display: none !important;
      }
    }
  </style>
</head>
<body class="min-h-screen bg-base-200 text-base-content print:bg-white print:p-0"<?php if (! empty($print_autoprint)) : ?> onload="window.print()"<?php endif; ?>>

  <div class="no-print border-b border-base-content/10 bg-base-100 px-4 py-3 shadow-sm">
    <div class="mx-auto flex max-w-3xl flex-wrap items-center justify-between gap-3">
      <p class="text-sm text-base-content/70">የህትመት ቅድሚያ ይመልከቱ፣ ከዚያ አትም ወይም PDF ያስቀምጡ።</p>
      <div class="flex flex-wrap gap-2">
        <button type="button" class="btn btn-primary btn-sm gap-1" onclick="window.print()">
          <i class="fa fa-print" aria-hidden="true"></i> አትም
        </button>
        <button type="button" class="btn btn-ghost btn-sm" onclick="window.close()">ዝጋ</button>
      </div>
    </div>
  </div>

  <main class="mx-auto max-w-3xl bg-base-100 px-4 py-8 print:max-w-none print:bg-white print:px-0 print:py-0 print:shadow-none">
    <?= view('reports/general_summary_content', [
        'system_name'    => $system_name,
        'church_name'    => $church_name,
        'issued_to_name' => $issued_to_name,
        'generated_at'   => $generated_at,
        'report_stats'   => $report_stats,
    ]); ?>
  </main>

</body>
</html>
