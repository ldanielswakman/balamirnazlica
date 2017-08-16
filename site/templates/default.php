<?php snippet('header') ?>

<main>

  <?
  $categories = $pages->visible()->filterBy('template', 'category');
  $carousel_images = $categories->images()->filterBy('visibility', '!=', 'false')->shuffle()->limit(6);
  ?>

  <div class="bg-dark">

    <a href="<?= $site->url() ?>" class="logo"><? snippet('logo-svg') ?></a>

    <div class="theatre" id="theatre">  <!-- js-prlx" data-prlx-factor="-0.2 -->

      <div class="theatre__quote">
        <?= $page->quote()->kirbytext() ?>

        <a href="#index" class="intro-link" data-scrspeed="3000"><? snippet('arrow-down-svg') ?></a>

      </div>

      <? snippet('theatre', ['carousel_images' => $carousel_images]) ?>

    </div>

    <? snippet('nav') ?>

  </div>

  <aside>
    <? snippet('logo-svg') ?>
  </aside>

  <section class="bg-gradient u-flex-vcenter" style="min-height: 80vh;">
    <div class="row">
      <!-- <div class="col-sm-4 col-sm-offset-3">
        <figure>
          <img src="<?= $site->find('about')->images()->first()->url() ?>" alt="" />
        </figure>
      </div> -->
      <div class="col-xs-12 u-aligncenter js-prlx" data-prlx-factor="0.5">
        <p style="font-size: 2rem; line-height: 2rem; max-width: 50rem;" class="u-inlineblock c-light"><?= html($page->about_text()) ?></p>
      </div>
    </div>
  </section>

  <div id="index">
    <? $i=0; foreach ($categories as $cat): ?>
      <? snippet('category-preview', ['key' => $i, 'cat' => $cat]); $i++; ?>
    <? endforeach ?>
  </div>

  <? $p_about = $site->find('about') ?>
  <section id="about">
    <div class="row u-relative">

      <div class="section--category__title js-prlx" data-prlx-factor="0.1">
        <h2 class="c-white"><?= strtoupper($site->title()->html()) ?></h2>
      </div>

      <div class="col-sm-3 col-sm-offset-1">
        <!-- <figure class="js-prlx" style="margin-left: -3rem; margin-top: 3rem; max-width: 65vw;"> -->
        <figure>
          <img src="<?= $p_about->images()->first()->url() ?>" alt="" />  <!-- style="max-width: 150%;" -->
        </figure>
      </div>
      <div class="col-sm-8" style="position: relative; z-index: 2;">
        <?= $p_about->text()->kirbytext() ?>
      </div>

    </div>
  </section>

</main>

<?php snippet('footer') ?>
