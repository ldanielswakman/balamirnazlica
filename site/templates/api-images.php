<?

$all_images = $categories->images();
$json = array();

foreach($all_images as $img) {

  if ($img->visibility() == 'true') {

    $json[ (string)$img->filename() ] = (string)$img->filename();

  }

}

echo json_encode($json);
