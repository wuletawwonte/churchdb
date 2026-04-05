<?php
/**
 * Page heading: title block (start) + breadcrumbs (end), single row.
 *
 * @var string|null $title             Plain heading (escaped)
 * @var string|null $title_html        Heading inner HTML (trusted; escape dynamic values in the caller)
 * @var string|null $subtitle          Plain subtitle (escaped)
 * @var string|null $subtitle_html     Subtitle markup (e.g. <p class="mt-0.5 text-sm ...">)
 * @var string      $breadcrumbs_html  Breadcrumb trail: <ul>...</ul> only
 * @var string      $wrapper_class     Classes on outer wrapper (default mb-6)
 * @var string|null $wrapper_id        Optional id on outer wrapper
 */
$wrapper_class = $wrapper_class ?? 'mb-6';
$wrapper_id = $wrapper_id ?? null;
$breadcrumbs_html = $breadcrumbs_html ?? '';
?>
<div class="app-page-heading <?= esc($wrapper_class) ?>"<?= ($wrapper_id !== null && $wrapper_id !== '') ? ' id="' . esc($wrapper_id, 'attr') . '"' : '' ?>>
  <div class="flex flex-nowrap items-start justify-between gap-3 sm:items-center sm:gap-4">
    <div class="min-w-0 shrink-0 text-start">
      <?php if (! empty($title_html)) : ?>
        <h1 class="text-2xl font-bold leading-tight tracking-tight"><?= $title_html ?></h1>
      <?php elseif (isset($title) && $title !== '') : ?>
        <h1 class="text-2xl font-bold leading-tight tracking-tight"><?= esc($title) ?></h1>
      <?php endif; ?>
      <?php if (! empty($subtitle_html)) : ?>
        <?= $subtitle_html ?>
      <?php elseif (isset($subtitle) && $subtitle !== '') : ?>
        <p class="mt-0.5 text-sm text-base-content/70"><?= esc($subtitle) ?></p>
      <?php endif; ?>
    </div>
    <?php if (! empty($breadcrumbs_html)) : ?>
    <nav class="app-page-heading__crumbs breadcrumbs ms-auto min-w-0 max-w-[min(100%,42rem)] overflow-x-auto whitespace-nowrap text-sm" aria-label="Breadcrumb">
      <?= $breadcrumbs_html ?>
    </nav>
    <?php endif; ?>
  </div>
</div>
