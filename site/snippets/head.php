<!doctype html>
<html lang="<?= site()->language() ? site()->language()->code() : 'en' ?>">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?= $site->title()->html() ?> | <?= $page->title()->html() ?></title>
  <meta name="description" content="<?= $site->description()->html() ?>">
  
  <? snippet('google-analytics') ?>

  <?
  $css_assets = (c::get('env') == 'DEV') ? [
    // local assets
    'assets/css/style.css'
  ] : [
    // production assets
    'assets/css/style.min.css'
  ];
  $js_assets = (c::get('env') == 'DEV') ? [
    // local assets
    'assets/js/jquery-2.2.3.min.js',
    'assets/js/jquery.smooth-scroll.min.js',
    'assets/js/owl.carousel.min.js',
    'assets/js/sticky-kit.min.js',
    'assets/js/scripts.js'
  ] : [
    // production assets
    '//code.jquery.com/jquery-2.2.3.min.js',
    '//cdnjs.cloudflare.com/ajax/libs/jquery-smooth-scroll/1.7.2/jquery.smooth-scroll.min.js',
    '//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.1/owl.carousel.min.js',
    'assets/js/owl.carousel.min.js',
    'assets/js/sticky-kit.min.js',
    'assets/js/scripts.js'
  ];
  ?>

  <?= css($css_assets) ?>
  <?= js($js_assets) ?>

</head>
<body class="page--<?= $page->template() ?>">

  <div class="loading-mask">
    <? snippet('r-svg') ?>
  </div>

  <!-- <header>
    <? // snippet('menu') ?>
  </header> -->
