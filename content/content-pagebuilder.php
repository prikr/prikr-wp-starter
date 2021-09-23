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

    elseif (get_row_layout() == 'cursus_categories') :
      
      get_template_part( 'content/pagebuilder/pb', 'cursus_categories' );

    elseif (get_row_layout() == 'imageleft_textright') :
      
      get_template_part( 'content/pagebuilder/pb', 'imageleft_textright' );

    elseif (get_row_layout() == 'learnings_overview') :
      
      get_template_part( 'content/pagebuilder/pb', 'learnings_overview' );

    elseif (get_row_layout() == 'galerij') :
      
      get_template_part( 'content/pagebuilder/pb', 'galerij' );

    elseif (get_row_layout() == 'referentie_kaarten') :
      
      get_template_part( 'content/pagebuilder/pb', 'referentie_kaarten' );

    elseif (get_row_layout() == 'map_tekst') :
      
      get_template_part( 'content/pagebuilder/pb', 'map_tekst' );

    elseif (get_row_layout() == 'trainingsaanbod') :
      
      get_template_part( 'content/pagebuilder/pb', 'trainingsaanbod' );
           
    endif;

  endwhile;

endif;

