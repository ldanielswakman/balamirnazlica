<? $carousel_images = (isset($carousel_images)) ? $carousel_images : array(); ?>
<? $show_meta = (isset($show_meta)) ? $show_meta : false; ?>
<? $autoplay = (isset($autoplay) && $autoplay == true) ? 'true' : 'false'; ?>

<div class="owl-carousel" data-autoplay="<?= $autoplay ?>">

  <? $i=1; foreach ($carousel_images as $item): ?>

    <? $isVideo = ($item->video_url()->isNotEmpty() && preg_match('#(\d+)$#', $item->video_url(), $matches)) ? true : false ?>

    <div class="theatre__slide" data-hash="<?= $i ?>">

      <figure class="figure--video">
        <img class="owl-lazy" data-src="<?= thumb($item, ['width' => 1600])->url() ?>" alt="" />

        <? if ($isVideo == true) : ?>
          <? $video_url = 'https://player.vimeo.com/video/' . $matches[1] . '?color=e9ff15&title=0&byline=0&portrait=0&autoplay=1'; ?>
          <a class="owl-video" href="<?= $video_url ?>"></a>
        <? endif ?>

      </figure>

      <? if ($show_meta) : ?>
        <div class="theatre__slide--meta">

          <? if (strlen($item->caption()) > 40): ?>
            <a href="javascript:void(0)" onclick="$(this).closest('.theatre__slide--meta').toggleClass('isExpanded')" class="a--toggle">
              <span class="collapsed">read more</span>
              <span class="expanded">close</span>
            </a>
          <? endif ?>

          <div class="row">
            <div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-3">
              <h4><?= $item->item_title()->html() ?></h4>
            </div>
            <div class="col-xs-10 col-xs-offset-1 col-sm-5" style="padding-right: 1.5rem;">
              <?= $item->caption()->kirbytext() ?>
            </div>
          </div>
        </div>
      <? endif?>

    </div>

  <? $i++; endforeach ?>

</div>
