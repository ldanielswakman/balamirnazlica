<style>
  h4 {
    color: #aaa;
    margin-bottom: 0.5rem;
  }
  h5 {
    margin-top: 0.25rem;
    font-weight: normal;
    letter-spacing: 0.1rem;
  }
</style>

<? $category_pages = $pages->filterBy('template', '*=', 'category'); ?>

<h4>Main pages</h4>
<? foreach($category_pages->pluck('template', ',', true) as $type) : ?>

  <h5><?= strtoupper(str_replace('category-', '', $type)) ?></h5>

  <ul class="nav nav-list sidebar-list">

    <? foreach($category_pages->filterBy('template', $type) as $p) : ?>
      <li>
        <a class="draggable<? e($p->isInvisible(), ' invisible'); ?>" data-helper="<? __($p->title(), 'attr') ?>" data-text="<? __($p->dragText()) ?>" href="<? __($p->url('edit')) ?>">
          <?= $p->icon() ?>
          <span><? __($p->title()) ?></span>
          <small class="marginalia shiv shiv-left shiv-white"><? __($p->displayNum()) ?></small>
        </a>
        <a class="option" data-context="<? __($p->url('context')) ?>" href="#options"><? i('ellipsis-h') ?></a>
      </li>
    <? endforeach ?>

  </ul>
<? endforeach ?>

<br>
<h4>Other pages</h4>

<ul class="nav nav-list sidebar-list">
  <? foreach($pages->not($category_pages) as $p) : ?>
    <li>
      <a class="draggable<? e($p->isInvisible(), ' invisible'); ?>" data-helper="<? __($p->title(), 'attr') ?>" data-text="<? __($p->dragText()) ?>" href="<? __($p->url('edit')) ?>">
        <?= $p->icon() ?>
        <? ecco($p->template() == 'category', '<span style="display: inline-block; font-size: 1.25em; position: relative; transform: translateY(-0.125em);">', '<span>') ?><? __($p->title()) ?></span>
        <small class="marginalia shiv shiv-left shiv-white"><? __($p->displayNum()) ?></small>
      </a>
      <a class="option" data-context="<? __($p->url('context')) ?>" href="#options"><? i('ellipsis-h') ?></a>
    </li>
  <? endforeach ?>
</ul>
