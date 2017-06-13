<nav>
  <ul>
    <li><a href="<?= (page()->isHomepage()) ? '' : site()->url() ?>#index">Index</a></li>
    <li><a href="<?= (page()->isHomepage()) ? '' : site()->url() ?>#about">About</a></li>
    <li><a href="<?= (page()->isHomepage()) ? '' : site()->url() ?>#connect">Connect</a></li>
  </ul>
</nav>