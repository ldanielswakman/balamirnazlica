<?

return function($site, $pages, $page) {

  // Retrieve all category pages
  $categories = $pages->visible()->filterBy('template', '*=', 'category')->visible();
  
  // Retrieve all page types from pages
  $types_slug = $categories->pluck('template', ',', true);
  $types = [];
  foreach($types_slug as $type) {
    $types[] = str_replace('category-', '', $type);
  }

  // Build carousel images collection based on category pages
  $carousel_images = $categories->images()->filterBy('visibility', '!=', 'false')->shuffle()->limit(6);

  // Make variables available everywhere
  return compact('types', 'categories', 'carousel_images');
  
};
