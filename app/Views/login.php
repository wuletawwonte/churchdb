<?php
defined('SYSTEMPATH') || exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="am" data-theme="corporate">
<head>
  <script>
  (function(){try{var k='churchdb-theme',t=localStorage.getItem(k);if(t==='dark'||t==='corporate')document.documentElement.setAttribute('data-theme',t);}catch(e){}})();
  </script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Arbaminch Mekane Eyesus Church Members Database" />
  <title> ቸርችDB </title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/tailwind.css'); ?>">
  <link rel="icon" href="<?= base_url('favicon.ico'); ?>" type="image/x-icon">
  <link rel="shortcut icon" href="<?= base_url('favicon.ico'); ?>">
  <style type="text/css">
    .se-pre-con {
      position: fixed;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background: url(<?= base_url('assets/img/ripple.gif'); ?>) center no-repeat #eee;
    }
  </style>
  <script src="<?php echo base_url('assets/vendors/jquery/jquery.min.js'); ?>"></script>
</head>
<body class="min-h-screen bg-base-200">
<div class="se-pre-con"></div>

<label class="swap swap-rotate fixed right-4 top-4 z-50 btn btn-circle btn-ghost border border-base-300 bg-base-100 shadow-sm" title="Light / dark theme">
  <input type="checkbox" data-theme-toggle />
  <span class="swap-on text-lg" aria-hidden="true"><i class="fa fa-moon-o"></i></span>
  <span class="swap-off text-lg" aria-hidden="true"><i class="fa fa-sun-o"></i></span>
</label>

<div class="flex min-h-screen flex-col items-center justify-center gap-8 p-4">
  <div class="card w-full max-w-md border border-base-300 bg-base-100 shadow-xl">
    <div class="card-body">
      <div class="flex flex-col items-center gap-3">
        <a
          href="<?= esc(base_url()); ?>"
          class="inline-flex items-center justify-center no-underline text-base-content hover:text-base-content hover:no-underline focus:outline-none"
          aria-label="<?= esc($system_name); ?>"
        >
          <img
            src="<?= esc(base_url('logo.svg')); ?>"
            alt=""
            class="h-24 w-auto max-h-24 max-w-[7rem] object-contain"
            decoding="async"
          />
        </a>
        <p class="text-center text-sm opacity-70">ወደ አካውንቶ ይግቡ</p>
      </div>

      <form action="<?php echo base_url(); ?>users/login" method="post" class="mt-4 flex flex-col gap-4">
        <label class="form-control w-full">
          <span class="label-text">ስም</span>
          <input type="text" name="username" class="input input-bordered w-full" placeholder="ስም" autocomplete="username" required>
        </label>
        <label class="form-control w-full">
          <span class="label-text">የይለፍ ቃል</span>
          <input type="password" name="password" class="input input-bordered w-full" placeholder="የይለፍ ቃል" autocomplete="current-password" required>
        </label>
        <label class="label cursor-pointer justify-start gap-2">
          <input type="checkbox" class="checkbox checkbox-sm" />
          <span class="label-text">አስታውሰኝ</span>
        </label>
        <button type="submit" class="btn btn-primary w-full">ይዝለቁ</button>
      </form>

      <?php if (session()->getFlashdata('login_failed')) : ?>
        <div role="alert" class="alert alert-error mt-4 text-sm">
          <span><?php echo esc(session()->getFlashdata('login_failed')); ?></span>
        </div>
      <?php endif; ?>

      <a href="#" class="link link-hover mt-4 block text-center text-sm">የይለፍ ቃሌን ረስቻለው</a>
    </div>
  </div>

  <p class="text-center text-sm opacity-70">
    Copyright © <?= date('Y'); ?> <a href="https://www.gracesoft.com.et" target="_blank" rel="noopener" class="link link-hover font-semibold">Grace Soft Arbaminch</a>
  </p>
</div>

<script src="<?= base_url('assets/js/theme.js'); ?>"></script>
<script>
  $(window).on('load', function () {
    $('.se-pre-con').fadeOut('slow');
  });
</script>
</body>
</html>
