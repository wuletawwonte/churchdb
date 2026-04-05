<?php
/**
 * Member avatar: photo, placeholder image, or initials on profile color.
 *
 * @var array       $member         firstname, middlename, avatar, profile_color
 * @var string      $size           sm (60px table), dashboard (64px), lg (128px), print (200px)
 * @var string|null $placeholderSrc When set and member has no avatar photo, show this image (forms).
 * @var string|null $imgId          Optional id on the <img> (e.g. avatar preview in forms).
 */
$member = is_array($member ?? null) ? $member : [];
$size = $size ?? 'sm';
$placeholderSrc = $placeholderSrc ?? null;
$imgId = $imgId ?? null;

$firstname = (string) ($member['firstname'] ?? '');
$middlename = (string) ($member['middlename'] ?? '');
$initials = mb_substr($firstname, 0, 1) . mb_substr($middlename, 0, 1);
if ($initials === '') {
    $initials = '?';
}

$bgColor = (string) ($member['profile_color'] ?? '#64748b');
$hasPhoto = !empty($member['avatar']);

$sizes = [
    'sm' => ['box' => 'h-[60px] w-[60px]', 'text' => 'text-base'],
    'dashboard' => ['box' => 'h-16 w-16', 'text' => 'text-lg'],
    'lg' => ['box' => 'h-32 w-32', 'text' => 'text-3xl'],
    'print' => ['box' => 'h-[200px] w-[200px]', 'text' => 'text-5xl'],
];
$s = $sizes[$size] ?? $sizes['sm'];

$photoSrc = $hasPhoto ? base_url('assets/avatars/' . $member['avatar']) : null;
$alt = trim($firstname . ' ' . $middlename);
if ($alt === '') {
    $alt = 'Member';
}

$imgIdAttr = $imgId !== null && $imgId !== '' ? ' id="' . esc($imgId, 'attr') . '"' : '';
?>

<?php if ($photoSrc !== null) : ?>
  <div class="member-avatar shrink-0 <?= esc($s['box'], 'attr') ?> rounded-full bg-base-200 p-0.5 shadow-sm ring-2 ring-offset-2 ring-offset-base-100" style="--tw-ring-color: <?= esc($bgColor, 'attr') ?>">
    <img src="<?= esc($photoSrc) ?>" alt="<?= esc($alt) ?>" class="h-full w-full rounded-full object-cover" loading="lazy" decoding="async"<?= $imgIdAttr ?>>
  </div>
<?php elseif ($placeholderSrc !== null && $placeholderSrc !== '') : ?>
  <div class="member-avatar shrink-0 <?= esc($s['box'], 'attr') ?> rounded-full bg-base-200 p-0.5 shadow-sm ring-2 ring-base-300 ring-offset-2 ring-offset-base-100">
    <img src="<?= esc($placeholderSrc) ?>" alt="" class="h-full w-full rounded-full object-cover" decoding="async"<?= $imgIdAttr ?>>
  </div>
<?php else : ?>
  <div class="member-avatar member-avatar--initials flex shrink-0 items-center justify-center rounded-full font-bold text-base-100 shadow-sm ring-2 ring-base-content/10 <?= esc($s['box'], 'attr') ?> <?= esc($s['text'], 'attr') ?>" style="background-color: <?= esc($bgColor, 'attr') ?>">
    <?= esc($initials) ?>
  </div>
<?php endif; ?>
