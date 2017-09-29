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
<h4>Main pages</h4>
<? foreach($pages->pluck('type', ',', true) as $type) : ?>

  <h5><?= strtoupper($type) ?></h5>

  <ul class="nav nav-list sidebar-list">

    <? foreach($pages->filterBy('type', $type) as $p) : ?>
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
<? endforeach ?>

<br>
<h4>Other pages</h4>

<? $excluded = $pages->filterBy('template', 'category') ?>

<ul class="nav nav-list sidebar-list">
  <? foreach($pages->not($excluded) as $p) : ?>
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
