<?php

/**
 * Project: mvr
 * File: pb-galerij.php
 * Author: Jasper van Doorn
 * Copyright © Prikr 
*/

if (!defined('ABSPATH')) exit; // Exit if accessed directly

?>

<section name="galerij" class="galerij">
  <div class="container">
    <div class="row padding-top-100 padding-bottom-60">
      <div class="col-12">
        <?php echo get_sub_field('tekst'); ?>
      </div>
    </div>
    <div class="row">
      <?php
      $items = get_sub_field('galerij'); 
      foreach($items as $item) : ?>

        <div class="col-6 col-lg-4 margin-bottom-32 padding-lg-48 d-flex flex-row align-items-center">
          <?php
            $acfimage = $item;
            if ($acfimage) :
              $image = wp_get_attachment($acfimage['id'], 'full');
              if ($image !== false) :
                echo '<img alt="' . $image['alt'] . '" data-src="' . $image['src'] . '" title="' . $image['title'] . '" width="100%" height="auto" />';
              endif;
            endif;
          ?>
        </div>

      <?php endforeach; 
      
      ?>
    </div>
  </div>
</section>