<!doctype html>
<html lang="<?= site()->language() ? site()->language()->code() : 'en' ?>">
<head>

  <title><?= $site->title()->html() ?> | <?= $page->title()->html() ?></title>

  <? snippet('head-meta') ?>
  
  <? snippet('google-analytics') ?>
  
  <!--  Mailchimp form embed code  -->
  <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/e029fc2edb8453bc85d5b4fad/d3a3b8e036edf52757e12021b.js");</script>

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

  <? if(c::get('env') !== 'DEV') : ?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WJ3KWKK" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
  <? endif ?>

  <div class="loading-mask">
    <? snippet('r-svg') ?>
  </div>
