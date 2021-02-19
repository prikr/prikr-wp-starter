<?php
// Lazyload Converter
function add_lazyload($content) {

  $content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
  $dom = new DOMDocument();
  @$dom->loadHTML($content);

  // Convert Images
  $images = [];

  foreach ($dom->getElementsByTagName('img') as $node) {  
      $images[] = $node;
  }

  foreach ($images as $node) {
      $fallback = $node->cloneNode(true);

      $oldsrc = $node->getAttribute('src');
      $node->setAttribute('data-src', $oldsrc );
      $newsrc = get_template_directory_uri() . '/dist/img/placeholder.gif';
      $node->setAttribute('src', $newsrc);

      $oldsrcset = $node->getAttribute('srcset');
      $node->setAttribute('data-srcset', $oldsrcset );
      $newsrcset = '';
      $node->setAttribute('srcset', $newsrcset);

      $classes = $node->getAttribute('class');
      $newclasses = $classes . ' lazy';
      $node->setAttribute('class', $newclasses);

      $noscript = $dom->createElement('noscript', '');
      $node->parentNode->insertBefore($noscript, $node); 
      $noscript->appendChild($fallback); 
  }


  // Convert Videos
  $videos = [];

  foreach ($dom->getElementsByTagName('iframe') as $node) {
      $videos[] = $node;
  }

  foreach ($videos as $node) {  
      $fallback = $node->cloneNode(true);

      $oldsrc = $node->getAttribute('src');
      $node->setAttribute('data-src', $oldsrc );
      $newsrc = '';
      $node->setAttribute('src', $newsrc);

      $classes = $node->getAttribute('class');
      $newclasses = $classes . ' lazy lazy-hidden';
      $node->setAttribute('class', $newclasses);

      $noscript = $dom->createElement('noscript', '');
      $node->parentNode->insertBefore($noscript, $node); 
      $noscript->appendChild($fallback); 
  }

  $newHtml = preg_replace('/^<!DOCTYPE.+?>/', '', str_replace( array('<html>', '</html>', '<body>', '</body>'), array('', '', '', ''), $dom->saveHTML()));
  return $newHtml;
}
add_filter('the_content', 'add_lazyload');
add_filter('post_thumbnail_html', 'add_lazyload');