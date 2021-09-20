<?php

/**
 * Project: mvr
 * File: content-pagebuilder.php
 * Author: Jasper van Doorn
 * Copyright © Prikr 
*/

if (!defined('ABSPATH')) exit; // Exit if accessed directly

global $post;

$queriedobj = get_queried_object();
$id = $post->ID;

if (is_tax()) {
  $id = 'term_' . $queriedobj->term_id;
}

if (have_rows('pagebuilder', $id)) :

  // Loop through rows.
  while (have_rows('pagebuilder', $id)) : the_row();

    if (get_row_layout() == 'hero') :

      get_template_part( 'content/pagebuilder/pb', 'hero' );

    elseif (get_row_layout() == 'cursus_categories') :
      
      get_template_part( 'content/pagebuilder/pb', 'cursus_categories' );
           
    endif;

  endwhile;

endif;

