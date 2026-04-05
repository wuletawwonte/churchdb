<!DOCTYPE html>
<html lang="am" data-theme="corporate">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo session()->get('system_name'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

  <link rel="stylesheet" href="<?= base_url('assets/vendors/font-awesome/css/font-awesome.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendors/pace/pace.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendors/select2/css/select2.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/tailwind.css'); ?>">
  <link rel="shortcut icon" href="<?= base_url('assets/img/favicon.ico'); ?>">

  <style type="text/css">
    textarea { resize: vertical; min-height: 5rem; }
  </style>

  <script src="<?= base_url('assets/vendors/jquery/jquery.min.js'); ?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/vendors/select2/js/select2.min.js') ?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/vendors/pace/pace.min.js') ?>"></script>
</head>

<?php
$pp = $_SESSION['current_user']['profile_picture'] ?? null;
$avatarPath = ($pp === null || $pp === '') ? 'img/user-icon.jpg' : 'profile_pictures/' . $pp;
$avatarUrl = base_url('assets/' . $avatarPath);
$fullName = session()->get('current_user')['firstname'] . ' ' . session()->get('current_user')['lastname'];
?>

<body class="min-h-screen bg-base-200">
<div class="drawer lg:drawer-open">
  <input id="layout-drawer" type="checkbox" class="drawer-toggle" />

  <div class="drawer-content flex min-h-screen flex-col">
    <header class="navbar border-b border-base-300 bg-base-100 shadow-sm">
      <div class="flex-none lg:hidden">
        <label for="layout-drawer" class="btn btn-square btn-ghost drawer-button" aria-label="Open menu">
          <i class="fa fa-bars text-lg"></i>
        </label>
      </div>
      <div class="flex flex-1 items-center gap-2">
        <a href="<?= base_url(); ?>" class="btn btn-ghost text-lg font-semibold normal-case">
          <?= esc(session()->get('system_name')); ?>
        </a>
      </div>
      <div class="flex-none">
        <div class="dropdown dropdown-end">
          <div tabindex="0" role="button" class="btn btn-ghost gap-2 px-2 normal-case">
            <div class="avatar">
              <div class="w-9 rounded-full ring ring-base-300 ring-offset-2 ring-offset-base-100">
                <img src="<?= esc($avatarUrl); ?>" alt="" />
              </div>
            </div>
            <span class="hidden max-w-[10rem] truncate sm:inline"><?= esc($fullName); ?></span>
            <i class="fa fa-caret-down opacity-70"></i>
          </div>
          <ul tabindex="0" class="menu dropdown-content z-[1] mt-2 w-56 rounded-box border border-base-300 bg-base-100 p-2 shadow-lg">
            <li class="menu-title text-xs"><?= esc(session()->get('current_user')['user_type']); ?></li>
            <li><a href="<?= base_url(); ?>admin/profile"><i class="fa fa-user"></i> አካውንት</a></li>
            <li><a href="<?= base_url(); ?>users/logout"><i class="fa fa-sign-out"></i> ዘግተው ይውጡ</a></li>
          </ul>
        </div>
      </div>
    </header>

    <main class="mx-auto w-full max-w-[1920px] flex-1 px-4 py-6 md:px-8">
