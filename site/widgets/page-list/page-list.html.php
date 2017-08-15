<ul class="nav nav-list sidebar-list">
  <? foreach($pages as $p) : ?>
    <li>
      <a class="draggable<? e($p->isInvisible(), ' invisible'); ?>" data-helper="<? __($p->title(), 'attr') ?>" data-text="<? __($p->dragText()) ?>" href="<? __($p->url('edit')) ?>">
        <?= $p->icon() ?>
        <?= ecco($p->template() == 'category', '<span style="display: inline-block; font-size: 1.25em; position: relative; transform: translateY(-0.125em);">', '<span>') ?><? __($p->title()) ?></span>
        <small class="marginalia shiv shiv-left shiv-white"><? __($p->displayNum()) ?></small>
      </a>
      <a class="option" data-context="<? __($p->url('context')) ?>" href="#options"><? i('ellipsis-h') ?></a>
</li>
  <? endforeach ?>
</ul>
