<!doctype html>
<html lang="<?= site()->language() ? site()->language()->code() : 'en' ?>">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?= $site->title()->html() ?> | <?= $page->title()->html() ?></title>
  <meta name="description" content="<?= $site->description()->html() ?>">

  <?
  $css_assets = (c::get('env') == 'DEV') ? [
    // local assets
    'assets/css/style.css'
  ] : [
    // production assets
    'assets/css/style.css'
  ];
  $js_assets = (c::get('env') == 'DEV') ? [
    // local assets
    'assets/js/jquery-2.2.3.min.js',
    'assets/js/jquery.smooth-scroll.min.js',
    'assets/js/owl.carousel.min.js',
    'assets/js/scripts.js'
  ] : [
    // production assets
    'assets/js/jquery-2.2.3.min.js',
    'assets/js/jquery.smooth-scroll.min.js',
    'assets/js/owl.carousel.min.js',
    'assets/js/scripts.js'
  ];
  ?>

  <?= css($css_assets) ?>
  <?= js($js_assets) ?>

</head>
<body>

  <div class="loading-mask">
    <? snippet('r-svg') ?>
  </div>

  <!-- <header>
    <? // snippet('menu') ?>
  </header> -->
