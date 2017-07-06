<? $p_images = $page->images()->filterBy('visibility', '!=', 'false'); ?>

<? snippet('header') ?>

<main>

  <div class="theatre" id="theatre">

    <a href="<?= $site->url() ?>"><? snippet('logo-svg') ?></a>

    <? snippet('theatre', ['carousel_images' => $p_images]) ?>

  </div>

  <section id="top">
    <div class="row">
      <div class="col-xs-12 col-sm-7 col-sm-offset-2">

        <h2><?= $page->title()->html() ?></h2>
        <p class="c-grey"><?= $page->type()->html() ?>, <?= $p_images->count() ?> item<?= ($p_images->count() == 1) ? '' : 's' ?></p>
        <br>

        <?= $page->text()->kirbytext() ?>

      </div>
    </div>
  </section>

  <section style="padding-top: 0;">
    <div class="row">

      <? foreach ($p_images as $img): ?>
        <div class="col-xs-6 col-sm-4 col-md-3">
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
