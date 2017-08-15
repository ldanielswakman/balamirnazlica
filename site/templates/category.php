<? $p_images = $page->images()->filterBy('visibility', '!=', 'false')->sortBy('sort', 'asc'); ?>

<? snippet('header') ?>

<main>

  <div class="bg-dark">

    <a href="<?= $site->url() ?>" class="logo"><? snippet('logo-svg') ?></a>

    <div class="theatre js-prlx" data-prlx-factor="-0.2" id="theatre">

      <? snippet('theatre', ['carousel_images' => $p_images]) ?>

    </div>

    <? snippet('nav') ?>

  </div>

  <section class="bg-gradient u-flex-vcenter" style="min-height: 40vh;">
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

  <div class="u-relative">
    <div class="gradient-angle" style="height: 90vh;"></div>
  </div>

  <section id="top" class="u-pb0">
    <div class="row">
      <div class="col-xs-11 col-sm-5">
        <figure>
          <img src="<?= thumb($page->images()->shuffle()->first(), ['width' => 600])->url() ?>" alt="" />
        </figure>
      </div>
      <div class="col-xs-11 col-xs-offset-1 col-sm-6 col-sm-offset-1 u-aligncenter">

        <?
        $title = $page->title()->value();
        $n = floor(strlen( $title ) / 2);
        ?>
        <h1 class="c-yellow u-font-4x" style="letter-spacing: 0.2em;">
          <?= strtoupper( mb_substr($title, 0, $n) ); ?><br>
          <?= strtoupper( mb_substr($title, $n) ); ?>  
        </h1>

      </div>
    </div>
  </section>

  <section class="u-pv0" style="padding-top: 3rem; padding-bottom: 3rem;">

    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
      <div class="u-op70"><?= $page->text()->kirbytext() ?></div>
    </div>
  </section>

  <section class="u-pt0">

    <div class="row">

      <? foreach ($p_images as $img): ?>
        <div class="col-xs-6 col-md-4">
          <a href="#<?= $img->name() ?>"  onclick="scrollToTheatre()" style="display: block; padding: 2rem;">
            <figure>
              <img src="<?= thumb($img, ['width' => 350])->url() ?>" alt="" />
            </figure>
          </a>
        </div>
      <? endforeach ?>

    </div>
  </section>

</main>

<script>
  $(document).ready(function() {
    window.location.hash = 'top';
  });
</script>

<? snippet('footer') ?>
