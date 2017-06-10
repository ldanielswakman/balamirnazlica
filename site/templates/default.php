<?php snippet('header') ?>

<br><br>



<main>

  <? foreach ($pages->visible()->filterBy('template', 'category') as $cat): ?>
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
