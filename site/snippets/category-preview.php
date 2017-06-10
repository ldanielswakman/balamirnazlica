<section>
  <div class="row">
    <div class="col-xs-12 col-sm-6 last-sm">
      <div class="image-stack">
        <? $images = $cat->images(); ?>
        <? foreach ($images->shuffle()->limit(5) as $img): ?>
          <? $style = "margin-top: " . (rand(0,6)-4) . "rem; margin-left: " . (rand(0,12)-4) . "rem;" ?>
          <a href="javascript:void(0)" style="<?= $style ?>"><figure><img src="<?= thumb($img, ['width' => 350])->url() ?>" alt="" /></figure></a>
        <? endforeach ?> 
      </div>
    </div>
    <div class="col-xs-12 col-sm-6">
      <h2><?= $cat->title()->html() ?></h2>
      <p><?= $cat->type()->html() ?>, <?= $images->count() ?> item<?= ($images->count() == 1) ? '' : 's' ?></p>
      <?= $cat->text()->kirbytext() ?>
    </div> 
  </div>
</section>