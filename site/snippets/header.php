<header>
  <div class="row">
    <div class="col-xs-12 col-sm-2 col-md-4 header__col-logo">
      <a href="<?= $site->url() ?>" class="logo"><? snippet('logo-svg') ?></a>
    </div>
    <div class="col-xs-12 col-sm-5 col-md-4 first-sm header__col-menu">
      <? $i=0; foreach ($types as $type): ?>
        <a href="<?= ($page->isHomePage()) ? '' : $site->url() ?>#<?= $type ?>"><?= $type ?></a></li>
      <? endforeach ?>
    </div>
    <div class="col-xs-12 col-sm-5 col-md-4 header__col-actions">
      <a href="<?= (page()->isHomepage()) ? '' : site()->url() ?>#about">about</a></li>
      <a class="button button--primary" href="<?= (page()->isHomepage()) ? '' : site()->url() ?>#connect">connect</a></li>
    </div>
  </div>
</header>
