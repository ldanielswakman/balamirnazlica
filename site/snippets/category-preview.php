<section class="section--category">
  <div class="row">
    <div class="col-xs-12 col-sm-6 col-sm-offset-2">

      <div class="image-stack">

        <? $images = $cat->images()->filterBy('visibility', '!=', 'false'); ?>
        <? foreach ($images->shuffle()->limit(5) as $img): ?>

          <? $style = "top: " . (rand(0,8)-4) . "rem; left: " . (rand(0,20)-5) . "rem;" ?>
          <a href="#<?= $img->name() ?>"  onclick="scrollToTheatre()" style="<?= $style ?>">
            <figure>
              <img src="<?= thumb($img, ['width' => 350])->url() ?>" alt="" />
            </figure>
          </a>

        <? endforeach ?> 

      </div>

    </div>
    <div class="col-xs-12 col-sm-3" style="position: relative; z-index: 2;">

      <h2><?= $cat->title()->html() ?></h2>
      <p class="c-grey"><?= $cat->type()->html() ?>, <?= $images->count() ?> item<?= ($images->count() == 1) ? '' : 's' ?></p>
      <br>

      <?= $cat->text()->kirbytext() ?>
      <br>

      <a href="<?= $cat->url() ?>">See all</a>

    </div> 
  </div>
</section>
