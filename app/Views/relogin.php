<!DOCTYPE html>
<html lang="am" data-theme="corporate">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo esc(session()->get('system_name')); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/font-awesome/css/font-awesome.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/tailwind.css'); ?>">
  <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.ico'); ?>">
  <style type="text/css">
    .profile-image {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      font-size: 30px;
      color: #fff;
      text-align: center;
      line-height: 80px;
      margin: 0;
    }
  </style>
  <script src="<?php echo base_url('assets/vendors/jquery/jquery.min.js'); ?>"></script>
</head>
<body class="flex min-h-screen items-center justify-center bg-base-200 p-4">
<?php
$pp = $_SESSION['current_user']['profile_picture'] ?? null;
$lockAvatar = base_url('assets/' . (($pp === null || $pp === '') ? 'img/user-icon.jpg' : 'profile_pictures/' . $pp));
?>
<div class="card w-full max-w-lg border border-base-300 bg-base-100 shadow-xl">
  <div class="card-body items-center text-center">
    <h1 class="card-title text-xl"><a href="<?= base_url('users/relogin'); ?>" class="link link-hover"><?= esc(session()->get('system_name')); ?></a></h1>
    <p class="text-lg font-medium"><?= esc($_SESSION['current_user']['firstname'] . ' ' . $_SESSION['current_user']['lastname']) ?></p>
    <div class="avatar my-4">
      <div class="w-24 rounded-full ring ring-primary ring-offset-2 ring-offset-base-100">
        <img src="<?= esc($lockAvatar); ?>" alt="">
      </div>
    </div>
    <form method="POST" action="<?= base_url('users/login'); ?>" class="flex w-full max-w-sm flex-col gap-3">
      <input type="text" name="username" value="<?= esc(session()->get('current_user')['username']); ?>" hidden>
      <label class="form-control w-full">
        <span class="label-text">የይለፍ ቃል</span>
        <input type="password" name="password" class="input input-bordered w-full" placeholder="የይለፍ ቃል" required>
      </label>
      <button type="submit" class="btn btn-primary gap-2">
        <i class="fa fa-arrow-right"></i> ይግቡ
      </button>
    </form>
    <?php if (session()->getFlashdata('login_failed')) { ?>
      <div role="alert" class="alert alert-error mt-4 w-full text-sm">
        <span><?php echo esc(session()->getFlashdata('login_failed')); ?></span>
      </div>
    <?php } ?>
    <p class="mt-4 text-sm opacity-80">ወዳ አካውንቶ ለመመለስ የይለፍ ቃሎን ያስገቡ</p>
    <a href="<?= base_url('users/logout'); ?>" class="link link-hover text-sm">ወይም በሌላ አካውንት ይግቡ</a>
    <p class="mt-6 text-xs opacity-70">
      <strong><?= lang('label.copyright') ?> &copy; <?= date('Y'); ?> <a href="https://www.facebook.com/gracesoftwebdesign" target="_blank" rel="noopener" class="link">GraceSoft webdesign</a>.</strong> <?= lang('label.all_rights_reserved') ?>.
    </p>
  </div>
</div>
</body>
</html>
