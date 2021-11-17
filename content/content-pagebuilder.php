<?php

/**
 * Project: prikr
 * File: content-pagebuilder.php
 * Author: Jasper van Doorn
 * Copyright © Prikr 
*/

if (!defined('ABSPATH')) exit; // Exit if accessed directly

global $post;

$queriedobj = get_queried_object();
if ($post) {
  $id = $post->ID;
} else if (is_tax()) {
  $id = 'term_' . $queriedobj->term_id;
}

if (have_rows('pagebuilder', $id)) :

  // Loop through rows.
  while (have_rows('pagebuilder', $id)) : the_row();

    if (get_row_layout() == 'hero') :

      get_template_part( 'content/pagebuilder/pb', 'hero' );
           
    endif;

  endwhile;

endif;

