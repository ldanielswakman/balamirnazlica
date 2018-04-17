<header>
  <div class="row">
    <div class="col-xs-12 col-sm-2 col-md-4 header__col-logo">
      <a href="<?= $site->url() ?>" class="logo"><? snippet('logo-svg') ?></a>
    </div>
    <div class="col-xs-12 col-sm-5 col-md-4 first-sm header__col-menu">
      <? $i=0; foreach ($types as $type): ?>
        <a href="<?= ($page->isHomePage()) ? '' : $site->url() ?>#<?= $type ?>"><?= $type ?></a>
      <? endforeach ?>
    </div>
    <div class="col-xs-12 col-sm-5 col-md-4 header__col-actions">
      <? foreach($site->pages()->visible()->not($categories)->not('home') as $p) : ?>
        <? if ($p->slug() == 'about') : ?>
          <? $prefix = ($page->isHomepage()) ? '#' : site()->url() . '#' ?>
          <? $url = $prefix . $p->slug() ?>
        <? else : ?>
          <? $url = $p->url() ?>
        <? endif ?>
        <a href="<?= $url ?>"><?= strtolower($p->title()->html()) ?></a>
      <? endforeach ?>
      <a class="button button--primary" href="<?= (page()->isHomepage()) ? '' : site()->url() ?>#connect">connect</a>
    </div>
  </div>
</header>
