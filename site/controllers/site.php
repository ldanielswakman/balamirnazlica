<?

return function($site, $pages, $page) {

  // Retrieve all page types from pages
  $types = $pages->filterBy('template', 'category')->visible()->pluck('type', ',', true);
  // Retrieve all category pages
  $categories = $pages->visible()->filterBy('template', 'category');
  // Build carousel images collection based on category pages
  $carousel_images = $categories->images()->filterBy('visibility', '!=', 'false')->shuffle()->limit(6);

  // Make variables available everywhere
  return compact('types', 'categories', 'carousel_images');
  
};
