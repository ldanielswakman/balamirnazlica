<? $carousel_images = (isset($carousel_images)) ? $carousel_images : array(); ?>

<div class="owl-carousel">

  <? foreach ($carousel_images as $item): ?>

    <? $isVideo = ($item->video_url()->isNotEmpty() && preg_match('#(\d+)$#', $item->video_url(), $matches)) ? true : false ?>

    <div class="theatre__slide"><!-- data-hash="<?= $item->name() ?>" -->

      <figure<?= ecco($isVideo, ' class="figure--video"') ?>>
        <img class="owl-lazy" data-src="<?= thumb($item, ['width' => 1600])->url() ?>" alt="<?= $item->item_title()->html() ?>" />

        <!-- If Video -->
        <? if ($isVideo == true) : ?>

          <a href="javascript:void(0)" onclick="playVideo($(this))" class="figure--video__link">
            <? snippet('video-icon-svg') ?>
          </a>

          <div class="figure--video__wrapper">
            <iframe src="" data-src="https://player.vimeo.com/video/<?= $matches[1] ?>?color=e9ff15&title=0&byline=0&portrait=0&autoplay=1" width="800" height="450" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
          </div>
        <? endif ?>

      </figure>

    </div>

  <? endforeach ?>

</div>

<? $mw = ($carousel_images->count() > 0) ? 100 / $carousel_images->count() : 100 ?>
<style>
  .theatre .owl-dot span {
    max-width: <?= $mw ?>vw;
  }
</style>
