<? $images = $cat->images()->filterBy('visibility', '!=', 'false'); ?>

<section id="<?= $cat->slug() ?>" class="section--category <? ecco($key % 2 !== 0, 'section--alt') ?>">
  <a href="<?= $cat->url() ?>" class="row">

    <div class="section--category__title js-prlx" data-prlx-factor="0.15">
      <h2><?= $cat->title()->html() ?></h2>
    </div>

    <div class="gradient-angle"></div>

    <div class="u-ph0 col-xs-10 col-sm-6 <? ecco($key % 2 !== 0, ' last-sm col-xs-offset-2 col-sm-offset-1') ?>">

      <? $img = $images->shuffle()->first() ?>
      <figure>
        <? if($img): ?>
          <img src="<?= thumb($img, ['width' => 800])->url() ?>" alt="" />
        <? else: ?>
          <img src="http://via.placeholder.com/800x400" alt="" />
        <? endif?>
      </figure>

    </div>

    <div class="col-xs-10 col-xs-offset-1 col-sm-4 u-relative u-z2">

      <p class="section--category__p">
        <?= excerpt($cat->text()->kirbytext(), 200) ?>
      </p>

    </div>

    <? if(false) : ?>
    <div class="col-xs-12 col-sm-6 col-sm-offset-2">
      <div class="image-stack">

        <? foreach ($images->shuffle()->limit(5) as $img) : ?>

          <? $style = "top: " . (rand(0,8)-4) . "rem; left: " . (rand(0,20)-5) . "rem;" ?>
          <a href="#<?= $img->name() ?>" onclick="scrollToTheatre()" style="<?= $style ?>">
            <figure>
              <img src="<?= thumb($img, ['width' => 350])->url() ?>" alt="" />
            </figure>
          </a>

        <? endforeach ?>

      </div>  
    </div>
    <? endif ?>

  </a>
</section>
