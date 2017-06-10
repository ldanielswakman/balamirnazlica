<?php snippet('header') ?>

<main>

  <?
  $categories = $pages->visible()->filterBy('template', 'category');
  $all_images = $categories->images()->filterBy('visibility', '!=', 'false');
  ?>

  <div class="owl-carousel bg-dark">
    <? foreach ($all_images->shuffle() as $img): ?>
      <figure style="background-color: #e9ff15; margin-left: 12vw; width: 80vw; height: 80vh;">
        <img src="<?= $img->url() ?>" alt="" />
      </figure>
    <? endforeach ?>
  </div>

  <div class="bg-gradient" style="height: 30rem;"></div>

  </div>

  <? foreach ($categories as $cat): ?>
    <? snippet('category-preview', ['cat' => $cat]); ?>
  <? endforeach ?>

  <header>
    <h1><?= $page->title()->html() ?></h1>
    <div>
      <?= $page->intro()->kirbytext() ?>
    </div>
  </header>
    
  <div>
    <?= $page->text()->kirbytext() ?>
  </div>

</main>

<?php snippet('footer') ?>
