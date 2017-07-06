<? $carousel_images = (isset($carousel_images)) ? $carousel_images : array(); ?>

<div class="owl-carousel">

  <? foreach ($carousel_images->shuffle() as $item): ?>

    <div class="theatre__slide" data-hash="<?= $item->name() ?>">

      <!-- If Video -->
      <? if ($item->video_url()->isNotEmpty()) : ?>

        <? if (preg_match('#(\d+)$#', $item->video_url(), $matches)) : ?>
          <div class="video-wrapper">
            <iframe src="https://player.vimeo.com/video/<?= $matches[1] ?>?color=e9ff15&title=0&byline=0&portrait=0" width="800" height="450" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
          </div>
        <? else : ?>
          Invalid video URL
        <? endif ?>

      <!-- If Photo -->
      <? else : ?>

        <figure>
          <img src="<?= $item->url() ?>" alt="" />
        </figure>

      <? endif ?>

    </div>

  <? endforeach ?>

</div>

<? $mw = 100 / $carousel_images->count() ?>
<style>
  .theatre .owl-dot span {
    max-width: <?= $mw ?>vw;
  }
</style>
