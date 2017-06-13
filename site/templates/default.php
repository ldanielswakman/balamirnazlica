<?php snippet('header') ?>

<main>

  <?
  $categories = $pages->visible()->filterBy('template', 'category');
  $all_images = $categories->images()->filterBy('visibility', '!=', 'false');
  ?>

  <div class="theatre" id="theatre">

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

  <section id="about">
    <div class="row">
      <div class="col-sm-3 col-sm-offset-1">
        <figure class="js-prlx" style="margin-left: -3rem; margin-top: 3rem; max-width: 65vw;">
          <img style="max-width: 150%;" src="<?= $site->find('about')->images()->first()->url() ?>" alt="" />
        </figure>
      </div>
      <div class="col-sm-8" style="position: relative; z-index: 2;">
        <?= $site->find('about')->text()->kirbytext() ?>
      </div>
    </div>
  </section>

</main>

<?php snippet('footer') ?>
