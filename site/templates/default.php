<? snippet('head') ?>

<main>

  <div class="bg-bubbles">

    <? snippet('header', ['types' => $types]) ?>

    <div class="theatre" id="theatre">

      <? snippet('theatre', ['carousel_images' => $carousel_images]) ?>

    </div>

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

  <? foreach($types as $type) : ?>
    <div class="type-preview" id="<?= $type ?>">
      <div class="type-preview__header js-stick-in-parent">
        <h3><?= $type ?> //</h3>
        <div class="type-preview__list">
        <? foreach ($categories->filterBy('type', $type) as $cat): ?>
          <a href="<?= $cat->url() ?>"><?= $cat->title() ?></a>
        <? endforeach ?>
        </div>
      </div>
      <? $i=0; foreach ($categories->filterBy('type', $type) as $cat): ?>
        <? snippet('category-preview', ['key' => $i, 'cat' => $cat]); $i++; ?>
      <? endforeach ?>
    </div>
  <? endforeach ?>

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

<? snippet('footer') ?>
