<?php

return function($site, $pages, $page) {

  // Retrieve all category pages
  $categories = $pages->visible()->filterBy('template', '*=', 'category');
  
  // Retrieve all page types from pages
  $types_slug = $categories->pluck('template', ',', true);
  $types = [];
  foreach($types_slug as $type) {
    $types[] = str_replace('category-', '', $type);
  }

  // Make variables available everywhere
  return compact('types', 'categories');
  
};
