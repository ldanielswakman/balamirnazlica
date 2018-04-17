<? snippet('head') ?>

<main>

  <div class="bg-bubbles">

    <? snippet('banner') ?>

    <? snippet('header', ['types' => $types]) ?>

    <? if($page->isHomepage() || $page->is($categories)) : ?>
      <div class="theatre" id="theatre">

        <?
        function getImageFromCategories($item, $categories) {
          $object = '';
          foreach($categories as $category) {
            if(strlen($category->image($item)) > 0) {
              $object = $category->file($item);
              break;
            }
          }
          return $object;
        }

        if($page->slideshow_toggle() == 'pick') {

          // Build carousel images collection random, based on category pages
          $carousel_images = [];
          foreach($page->slideshow()->toStructure() as $item) {
            $carousel_images[] = getImageFromCategories($item, $categories);
          }

        } else {
          // Build carousel images collection random, based on category pages
          $carousel_images = $categories->images()->filterBy('visibility', '!=', 'false')->shuffle()->limit(6);
        }
        ?>

        <? snippet('theatre', ['carousel_images' => $carousel_images, 'autoplay' => true]) ?>

      </div>
      <? endif ?>

  </div>

  <aside>
    <? snippet('logo-svg') ?>
  </aside>

  <section class="bg-gradient u-flex-vcenter u-relative" style="min-height: 80vh;">

    <div class="row u-relative u-z2">
      <div class="col-xs-12 u-aligncenter js-prlx" data-prlx-factor="0.5">
        <p style="font-size: 2rem; line-height: 2rem; max-width: 50rem;" class="u-inlineblock c-light"><?= html($page->about_text()) ?></p>
      </div>
    </div>

    <figure class="u-pincover u-flex-vcenter u-z1 js-prlx" data-prlx-factor="0.15">
      <img src="<?= url('assets/images/apple-eclipse.png') ?>" alt="" />
    </figure>

  </section>

  <? foreach($types as $type) : ?>
    <div class="type-preview" id="<?= $type ?>">

      <div class="type-preview__header js-stick-in-parent">
        <h3><?= $type ?> //</h3>
        <div class="type-preview__list">
        <? foreach ($categories->filterBy('template', 'category-' . $type) as $cat): ?>
          <a href="<?= $cat->url() ?>"><?= strtolower($cat->title()) ?></a>
        <? endforeach ?>
        </div>
      </div>

      <? $i=0; foreach ($categories->filterBy('template', 'category-' . $type) as $cat): ?>
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

      <div class="col-xs-6 col-xs-offset-3 col-sm-3 col-sm-offset-0 col-md-2 u-pb-1">
        <!-- <figure class="js-prlx" style="margin-left: -3rem; margin-top: 3rem; max-width: 65vw;"> -->
        <figure>
          <img src="<?= $p_about->images()->first()->url() ?>" alt="" />  <!-- style="max-width: 150%;" -->
        </figure>
      </div>

      <div class="col-sm-offset-1 col-sm-8 col-md-offset-2" style="position: relative; z-index: 2;">
        <?= $p_about->text()->kirbytext() ?>
      </div>

    </div>
  </section>

</main>

<? snippet('footer') ?>
