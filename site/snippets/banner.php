<? if ($page->banner_title()->isNotEmpty() && $page->banner_text()->isNotEmpty()) : ?>

<div class="banner isActive u-relative">

  <div class="row">
    <div class="col-xs-12 col-sm-offset-1 col-sm-4 last-sm u-flex-vcenter u-pb-1">

      <? if($img = $page->banner_image()) : ?>
        <figure>
          <img src="<?= thumb($page->image($img), ['width' => 800])->url() ?>" alt="" />
        </figure>
      <? endif ?>

    </div>
    <div class="col-xs-12 col-sm-7">

      <h3><?= strtoupper($page->banner_title()->html()) ?></h3>
      <br>

      <?= $page->banner_text()->kirbytext() ?>

      <? if ($page->banner_link()->isNotEmpty()) : ?>
        <br>
        <a class="button button--dark button--mirrored">More info</a>
      <? endif ?>

    </div>
  </div>

  <a href="javascript:closeBanner()" class="close-button close-button--dark"></a>

</div>

<? endif ?>