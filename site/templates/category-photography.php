<?
$p_images = $page->images()->filterBy('visibility', '!=', 'false')->sortBy('sort', 'asc');

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

  <div class="theatre theatre--overlay" id="theatre">

    <? snippet('theatre', ['carousel_images' => $p_images]) ?>

    <a href="javascript:closeTheatre()" class="close-button"></a>

  </div>

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

          <h1 class="c-yellow u-font-4x" style="letter-spacing: 0.2em; text-shadow: 0 0 50px rgba(0, 0, 0, 0.2);">
            <?= splitString($title = $page->title()->value()) ?>
          </h1>

        </div>
        <div class="col-xs-11 col-sm-5">

          <br><br><br>
          <div class="u-op70"><?= $page->text()->kirbytext() ?></div>

        </div>
      </div>
    </section>
  </div>

  <section class="category-index">

    <div class="row" style="padding: 1rem;">

      <? $i=0; foreach ($p_images as $img): ?>
        <div class="col-xs-6 col-md-4">
          <a href="#<?= $i ?>" class="category-index__item" onclick="scrollToTheatre()" style="background-image: url('<?= thumb($img, ['width' => 600])->url() ?>')">
          </a>
        </div>
      <? $i++; endforeach ?>

    </div>
  </section>

</main>

<? snippet('footer') ?>
