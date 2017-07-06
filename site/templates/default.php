<?php snippet('header') ?>

<main>

  <?
  $categories = $pages->visible()->filterBy('template', 'category');
  $carousel_images = $categories->images()->filterBy('visibility', '!=', 'false');
  ?>

  <div class="theatre" id="theatre">

    <a href="<?= $site->url() ?>" class="logo"><? snippet('logo-svg') ?></a>

    <div class="theatre__quote">
      <?= $page->quote()->kirbytext() ?>
    </div>

    <? snippet('theatre', ['carousel_images' => $carousel_images]) ?>

  </div>

  <div class="bg-dark js-stick-in-parent">
    <? snippet('nav') ?>
  </div>

  <aside>
    <? snippet('logo-svg') ?>
  </aside>

  <section class="bg-gradient" style="min-height: 60vh;">
    <div class="row">
      <div class="col-sm-4 col-sm-offset-4">
        <figure>
          <img src="<?= $site->find('about')->images()->first()->url() ?>" alt="" />
        </figure>
      </div>
    </div>
  </section>

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
