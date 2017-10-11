<? $carousel_images = (isset($carousel_images)) ? $carousel_images : array(); ?>
<? $show_meta = (isset($show_meta)) ? $show_meta : false; ?>

<div class="owl-carousel">

  <? $i=0; foreach ($carousel_images as $item): ?>

    <? $isVideo = ($item->video_url()->isNotEmpty() && preg_match('#(\d+)$#', $item->video_url(), $matches)) ? true : false ?>

    <div class="theatre__slide" data-hash="<?= $i ?>">

      <figure<?= ecco($isVideo, ' class="figure--video"') ?>>

        <img class="owl-lazy" data-src="<?= thumb($item, ['width' => 1600])->url() ?>" alt="" />

        <!-- If Video -->
        <? if ($isVideo) : ?>
          <div class="figure--video__container">

            <a href="javascript:void(0)" onclick="playVideo($(this))" class="figure--video__link">
              <? snippet('video-icon-svg') ?>
            </a>

            <div class="figure--video__wrapper">
              <iframe src="" data-src="https://player.vimeo.com/video/<?= $matches[1] ?>?color=e9ff15&title=0&byline=0&portrait=0&autoplay=1" width="800" height="450" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>

          </div>
        <? endif ?>

      </figure>

      <? if ($show_meta) : ?>
        <div class="theatre__slide--meta">
          <div class="row">
            <div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-3">
              <h4><?= $item->item_title()->html() ?></h4>
            </div>
            <div class="col-xs-10 col-xs-offset-1 col-sm-5">
              <?= $item->caption()->kirbytext() ?>
            </div>
          </div>
        </div>
      <? endif?>

    </div>

  <? $i++; endforeach ?>

</div>

<? $mw = ($carousel_images->count() > 0) ? 100 / $carousel_images->count() : 100 ?>
<style>
  .theatre .owl-dot span {
    max-width: <?= $mw ?>vw;
  }
</style>
