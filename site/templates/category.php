<? $p_images = $page->images()->filterBy('visibility', '!=', 'false')->sortBy('sort', 'asc'); ?>

<? snippet('head') ?>

<main>

  <div class="u-relative">

    <div class="gradient-angle" style="height: 90vh;"></div>
  </div>

  <div class="bg-gradient">

    <? snippet('header') ?>

    <section id="top" class="u-pv0">

      <div class="row">
        <div class="col-xs-11 col-sm-5">
          <!-- <figure>
            <img src="<?= thumb($page->images()->shuffle()->first(), ['width' => 600])->url() ?>" alt="" />
          </figure> -->

          <br><br><br>
          <div class="u-op70"><?= $page->text()->kirbytext() ?></div>

        </div>
        <div class="col-xs-11 col-xs-offset-1 col-sm-6 col-sm-offset-1 u-aligncenter">

          <?
          $title = $page->title()->value();
          $n = floor(strlen( $title ) / 2);
          ?>
          <h1 class="c-yellow u-font-4x" style="letter-spacing: 0.2em; text-shadow: 0 0 50px rgba(0, 0, 0, 0.2);">
            <?= strtoupper( mb_substr($title, 0, $n) ); ?><br>
            <?= strtoupper( mb_substr($title, $n) ); ?>  
          </h1>

        </div>
      </div>
    </section>
  </div>

  <section style="padding: 5rem 0;">

    <div class="row" style="padding: 1rem;">

      <? foreach ($p_images as $img): ?>
        <div class="col-xs-6 col-md-4">
          <a href="#<?= $img->name() ?>" onclick="scrollToTheatre()" style="display: block; padding-bottom: 1rem;">
            <figure>
              <img src="<?= thumb($img, ['width' => 600])->url() ?>" alt="" />
            </figure>
          </a>
        </div>
      <? endforeach ?>

    </div>
  </section>

  <div class="bg-gradient-inv" style="min-height: 30vh";>
  </div>

  <div class="bg-dark">

    <div class="theatre js-prlx" data-prlx-factor="-0.2" id="theatre">

      <? snippet('theatre', ['carousel_images' => $p_images]) ?>

    </div>

  </div>

</main>

<div class="bg-dark">

<? snippet('footer') ?>
