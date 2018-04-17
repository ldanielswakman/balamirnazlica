<?
function splitString($str) {
  $n = floor(strlen( $str ) / 2);
  $out  = strtoupper( mb_substr($str, 0, $n) );
  $out .= '<br>';
  $out .= strtoupper( mb_substr($str, $n) );
  return $out;
}
?>

<? snippet('head') ?>

<main>

  <div class="u-relative">

    <div class="gradient-angle" style="height: 90vh;"></div>
    
  </div>

  <div class="bg-gradient">

    <? snippet('header') ?>

    <br>
    <br>

    <section id="top" class="u-pv0">

      <div class="row">
        <div class="col-xs-11 col-xs-offset-1 col-sm-6 col-sm-offset-1 last-sm u-aligncenter">

          <h1 class="h1--hero"><?= splitString($title = $page->title()->value()) ?></h1>

        </div>
        <div class="col-xs-11 col-sm-5">

          <br><br><br>
          <div class="u-op70"><?= $page->text()->kirbytext() ?></div>

        </div>
      </div>
    </section>
    
  </div>

  <section>

    <?= $page->embeds()->kirbytext() ?>

  </section>

</main>

<? snippet('footer') ?>
