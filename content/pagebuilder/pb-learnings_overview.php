<?php

/**
 * Project: mvr
 * File: pb-learnings_overview.php
 * Author: Jasper van Doorn
 * Copyright © Prikr 
*/

if (!defined('ABSPATH')) exit; // Exit if accessed directly
?>

<section name="leervormen" class="learning_overview">

  <div class="container">
      <?php 
      $args = array(
        'post_type' =>  'learnings',
        'status'  =>  'publish',
      'order' => 'asc'
      );
      $learnings = new WP_Query($args);
      if ($learnings->have_posts()) :
        while ($learnings->have_posts()) : $learnings->the_post(); 
        $index = $learnings->current_post + 1;
        $odd = true;
        if ($index % 2 == 0) $odd = false;
        ?> 
    <div class="row padding-top-100 padding-bottom-100">
          
          <div class="col-12 col-lg-6 order-2 <?php if ($odd === true) { echo 'order-lg-2'; } else { echo 'order-lg-1'; } ?> padding-top-60 padding-top-lg-16">
            <img src="<?php echo get_theme_img('owl-with-line.png'); ?>" width="100%" height="auto" />
            <h3><?php the_title(); ?></h3>
            <span><?php echo get_field('omschrijving', $post->ID); ?></span>
          </div>
          <div class="col-12 col-lg-6 order-1 <?php if ($odd === true) { echo 'order-lg-1'; } else { echo 'order-lg-2';} ?> padding-top-32 padding-top-lg-16">
            <?php
            $acfimage = get_post_thumbnail_id($post->ID);
            if ($acfimage) :
              $image = wp_get_attachment($acfimage, 'full');
              if ($image !== false) :
                echo '<img alt="' . $image['alt'] . '" data-src="' . $image['src'] . '" title="' . $image['title'] . '" width="100%" height="auto" />';
              endif;
            endif;
            ?>
          </div>

          </div>

        <?php endwhile;
      endif;  
      ?>            
  </div>
</section>