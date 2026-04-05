<?php
/**
 * Shared body for on-screen report + print view.
 *
 * @var string               $system_name
 * @var string               $church_name
 * @var string               $issued_to_name
 * @var string               $generated_at
 * @var list<array{label: string, value: int|string}> $report_stats
 */
?>
<div class="report-document text-base-content">
  <header class="mb-6 border-b border-base-content/15 pb-4 print:mb-4 print:border-black/20">
    <div class="flex flex-col gap-2 sm:flex-row sm:items-start sm:justify-between">
      <div>
        <h1 class="text-2xl font-bold tracking-tight print:text-xl"><?= esc($system_name); ?></h1>
        <p class="mt-1 text-sm font-medium text-primary print:text-black">ጠቅላላ ሪፖርት</p>
      </div>
      <div class="text-sm text-base-content/70 print:text-black">
        <p class="whitespace-nowrap"><span class="font-medium text-base-content print:text-black">ቀን፦</span> <?= esc($generated_at); ?></p>
      </div>
    </div>
  </header>

  <div class="mb-8 grid gap-6 sm:grid-cols-2 print:mb-6 print:gap-4">
    <div class="rounded-xl border border-base-content/15 bg-base-200/30 p-4 print:border print:border-black/30 print:bg-transparent">
      <h2 class="mb-2 text-xs font-semibold uppercase tracking-wide text-base-content/60 print:text-black">የቤተክርስቲያን / ድርጅት</h2>
      <p class="text-base font-medium leading-snug"><?= $church_name !== '' ? esc($church_name) : '—'; ?></p>
    </div>
    <div class="rounded-xl border border-base-content/15 bg-base-200/30 p-4 print:border print:border-black/30 print:bg-transparent">
      <h2 class="mb-2 text-xs font-semibold uppercase tracking-wide text-base-content/60 print:text-black">ሪፖርቱ የተዘጋጀው በ</h2>
      <p class="text-base font-medium"><?= esc($issued_to_name); ?></p>
    </div>
  </div>

  <h2 class="mb-3 text-lg font-semibold print:text-base">ዝላይ ማጠቃለያ</h2>
  <div class="overflow-x-auto rounded-xl border border-base-content/15 print:rounded-none print:border-black/40">
    <table class="table w-full min-w-[280px] print:table-fixed">
      <thead>
        <tr class="border-b border-base-content/15 bg-base-200/80 print:border-black print:bg-gray-100">
          <th class="text-start font-semibold print:text-black">መለኪያ</th>
          <th class="w-28 text-end font-semibold print:w-24 print:text-black">ብዛት</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($report_stats as $row) : ?>
          <tr class="border-b border-base-content/10 print:border-black/20">
            <td class="align-middle"><?= esc($row['label']); ?></td>
            <td class="text-end font-mono text-sm font-medium tabular-nums print:text-black"><?= esc((string) $row['value']); ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <footer class="mt-10 border-t border-base-content/15 pt-4 text-xs text-base-content/60 print:mt-8 print:border-black/30 print:text-gray-600">
    <p>ይህ ሰነድ ከሲስተሙ በራስ-ሰር የተገኙ ቁጥሮችን ያሳያል። ለህትመት ብቻ ነው።</p>
    <p class="mt-1">ተፈጥሯል፦ <?= esc($generated_at); ?></p>
  </footer>
</div>
