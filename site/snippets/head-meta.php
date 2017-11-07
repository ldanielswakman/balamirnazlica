<?
$image_url = r($site->meta_image()->isNotEmpty(), $site->image($site->meta_image())->url());

$title = r($page->isHomePage(), $site->title()->html(), $page->title()->html());
if($page->meta_title()->isNotEmpty()) { $title = $page->meta_title()->html(); }

$site_title = $site->title()->html();

$descr = $site->description()->html();
if($page->meta_title()->isNotEmpty()) { $descr = $page->meta_description()->html(); }

$keywords = $site->keywords()->html();
if($page->meta_keywords()->isNotEmpty()) { $keywords = $page->meta_keywords()->html(); }
?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<meta name="author" content="L Daniel Swakman, ldaniel.eu" />
<meta http-equiv="Cache-control" content="public">

<meta name="description" content="<?= $descr ?>">
<meta name="keywords" content="<?= $keywords ?>">

<!-- Social share parameters -->
<meta property="og:image" content="<?= $image_url ?>" />
<meta property="og:title" content="<?= $title ?>" />
<meta property="og:site_name" content="<?= $site_title ?>" />
<meta property="og:description" content="<?= $descr ?>" />

<link rel="shortcut icon" href="<?= url('assets/images/favicon.png') ?>" />
