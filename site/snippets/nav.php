<? $category_pages = $pages->filterBy('template', '*=', 'category'); ?>

<nav class="u-z3">
  <ul>
  	<? foreach($site->pages()->visible()->not($category_pages) as $p) : ?>
  		<? $prefix = (page()->isHomepage()) ? '' : site()->url() . '#' ?>
  		<? $title = (page()->isHomepage()) ? 'Index' : $p->title()->html() ?>
    	<li><a href="<?= $prefix ?>"><?= $title ?></a></li>
  	<? endforeach ?>
    <li><a class="button button--primary" href="<?= (page()->isHomepage()) ? '' : site()->url() ?>#connect">Connect</a></li>
    <li><a class="button button--primary" href="<?= (page()->isHomepage()) ? '' : site()->url() ?>#connect">Connect</a></li>
    <li><a class="button button--primary" href="<?= (page()->isHomepage()) ? '' : site()->url() ?>#connect">Connect</a></li>
  </ul>
</nav>