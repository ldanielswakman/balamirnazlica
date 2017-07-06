<? $carousel_images = (isset($carousel_images)) ? $carousel_images : array(); ?>

<div class="owl-carousel">
  <? foreach ($carousel_images->shuffle() as $img): ?>
    <div class="theatre__slide" data-hash="<?= $img->name() ?>">
      <figure>
        <img src="<?= $img->url() ?>" alt="" />
      </figure>
    </div>
  <? endforeach ?>
</div>