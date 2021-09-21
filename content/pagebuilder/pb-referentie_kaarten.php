<?php

/**
 * Project: mvr
 * File: pb-referentie_kaarten.php
 * Author: Jasper van Doorn
 * Copyright © Prikr 
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly
?>

<section name="referenties" class="referenties has-js-flip">
  <div class="container">
    <div class="row padding-top-100 padding-bottom-60">
      <div class="col-12">
        <?php echo get_sub_field('tekst'); ?>
      </div>
    </div>
    <div class="row padding-bottom-120">
      <?php
      $args = array(
        'post_type' =>  'referentions',
        'status'    =>  'publish',
        'order'     =>  'asc'
      );
      $referentions = new WP_Query($args);
      if ($referentions->have_posts()) :
        while ($referentions->have_posts()) : $referentions->the_post();
          $card = get_field('card', $post->ID);
      ?>
          <div class="col-12 col-md-6 col-xl-4 padding-top-60">
          <div class="flip">
            <div class="card">
              <div class="face front">
                <div class="inner">
                  <?php
                  $thumb = $card['afbeelding'];
                  if ($thumb) :
                    $image = wp_get_attachment($thumb['id'], 'full');
                    if ($image !== false) :
                      echo '<img alt="' . $image['alt'] . '" src="' . $image['src'] . '" title="' . $image['title'] . '" width="100%" height="auto" />';
                    endif;
                  endif;
                  ?>
                </div>
                <svg class="plus" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                  <path id="Icon_awesome-plus" data-name="Icon awesome-plus" d="M13.929,8.143H9.107V3.321A1.072,1.072,0,0,0,8.036,2.25H6.964A1.072,1.072,0,0,0,5.893,3.321V8.143H1.071A1.072,1.072,0,0,0,0,9.214v1.071a1.072,1.072,0,0,0,1.071,1.071H5.893v4.821A1.072,1.072,0,0,0,6.964,17.25H8.036a1.072,1.072,0,0,0,1.071-1.071V11.357h4.821A1.072,1.072,0,0,0,15,10.286V9.214A1.072,1.072,0,0,0,13.929,8.143Z" transform="translate(0 -2.25)" />
                </svg>

              </div>
              <div class="face back">
                <div class="inner text-center padding-top-60">
                  <?php echo $card['tekst']; ?>
              </div>
                <svg class="min" xmlns="http://www.w3.org/2000/svg" width="15" height="3.214" viewBox="0 0 15 3.214">
                  <path id="Icon_awesome-plus" data-name="Icon awesome-plus" d="M13.929,8.143H1.071A1.072,1.072,0,0,0,0,9.214v1.071a1.072,1.072,0,0,0,1.071,1.071H13.929A1.072,1.072,0,0,0,15,10.286V9.214A1.072,1.072,0,0,0,13.929,8.143Z" transform="translate(0 -8.143)" fill="#ffffff" />
                </svg>

              </div>
            </div>
          </div>
          </div>
      <?php endwhile;
      endif;
      wp_reset_postdata();

      ?>
    </div>
  </div>
</section>