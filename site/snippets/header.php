<header>
  <div class="header__col-menu">
    <? $i=0; foreach ($types as $type): ?>
      <a href="<?= ($page->isHomePage()) ? '' : $site->url() ?>#<?= $type ?>"><?= $type ?></a></li>
    <? endforeach ?>
  </div>
  <div class="header__col-logo">
    <a href="<?= $site->url() ?>" class="logo"><? snippet('logo-svg') ?></a>
  </div>
  <div class="header__col-actions">
    <a href="<?= (page()->isHomepage()) ? '' : site()->url() ?>#about">about</a></li>
    <a class="button button--primary" href="<?= (page()->isHomepage()) ? '' : site()->url() ?>#connect">Connect</a></li>
  </div>
</header>
