<?php snippet('header') ?>

<main>

  <?
  $categories = $pages->visible()->filterBy('template', 'category');
  $all_images = $categories->images()->filterBy('visibility', '!=', 'false');
  ?>

  <div class="theatre">

    <? snippet('logo-svg') ?>

    <div class="theatre__quote">
      <?= $page->quote()->kirbytext() ?>
    </div>

    <div class="owl-carousel">
      <? foreach ($all_images->shuffle() as $img): ?>
        <div class="theatre__slide" data-hash="<?= $img->name() ?>">
          <figure>
            <img src="<?= $img->url() ?>" alt="" />
          </figure>
        </div>
      <? endforeach ?>
    </div>

    <? snippet('menu') ?>

  </div>

  <div class="bg-gradient">
    <? snippet('logo-svg') ?>
  </div>

  <div id="index">
    <? foreach ($categories as $cat): ?>
      <? snippet('category-preview', ['cat' => $cat]); ?>
    <? endforeach ?>
  </div>

  <header>
    <h1><?= $page->title()->html() ?></h1>
    <div>
      <?= $page->intro()->kirbytext() ?>
    </div>
  </header>
    
  <div>
    <?= $page->text()->kirbytext() ?>
  </div>

</main>

<?php snippet('footer') ?>
