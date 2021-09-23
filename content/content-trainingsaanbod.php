<?php

/**
 * Project: mvr
 * File: content-trainingsaanbod.php
 * Author: Jasper van Doorn
 * Copyright © Prikr 
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

$args = wp_parse_args(
  $args,
  array(
    'query' =>  array(
      'post_type' => 'product',
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'nopaging' => true
    )
  )
);
$curquery = new WP_Query($args['query']);
?>
<div name="postoverview" id="postoverview" class="container">
  <div id="layout_switcher" class="row list_view">
    <?php
    if ($curquery->have_posts()) :
      while ($curquery->have_posts()) : $curquery->the_post();
    ?>
        <div class="trainingsaanbod__item">
          <header style="background-color: <?php echo get_field('card_color', $post->ID); ?>;">
            <div class="title"> <?php echo get_field('card_title', $post->ID); ?></div>
            <div class="description"> <?php echo get_field('card_description', $post->ID); ?> </div>
          </header>
          <main>
            <div class="date d-flex flex-row">
              <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="14.693" height="16.325" viewBox="0 0 14.693 16.325">
                  <path id="Icon_material-date-range" data-name="Icon material-date-range" d="M9.4,10.346H7.765v1.633H9.4Zm3.265,0H11.03v1.633h1.633Zm3.265,0H14.3v1.633h1.633ZM17.56,4.633h-.816V3H15.111V4.633H8.581V3H6.949V4.633H6.133A1.625,1.625,0,0,0,4.508,6.265L4.5,17.693a1.632,1.632,0,0,0,1.633,1.633H17.56a1.637,1.637,0,0,0,1.633-1.633V6.265A1.637,1.637,0,0,0,17.56,4.633Zm0,13.06H6.133V8.714H17.56Z" transform="translate(-4.5 -3)" fill="#f6a605" />
                </svg>
              </div>
              <span>Datums</span>
            </div>
            <div class="price d-flex flex-row">
              <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="16.798" height="16.803" viewBox="0 0 16.798 16.803">
                  <path id="Icon_ionic-md-pricetag" data-name="Icon ionic-md-pricetag" d="M19.9,4.5H12.971L5.047,12.709a1.858,1.858,0,0,0,0,2.634l5.413,5.408a2.009,2.009,0,0,0,1.26.547,2.194,2.194,0,0,0,1.374-.547L21.3,12.9v-7ZM18.559,8.994a1.4,1.4,0,1,1,.936-.936A1.362,1.362,0,0,1,18.559,8.994Z" transform="translate(-4.5 21.302) rotate(-90)" fill="#f6a605" />
                </svg>
              </div>
              <span>Prijs</span>
            </div>
            <div class="location d-flex flex-row">
              <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="12.591" height="22.384" viewBox="0 0 12.591 22.384">
                  <path id="Icon_awesome-map-pin" data-name="Icon awesome-map-pin" d="M4.9,13.857v6.85l.963,1.444a.525.525,0,0,0,.873,0l.962-1.444v-6.85a7.382,7.382,0,0,1-2.8,0ZM6.3,0a6.3,6.3,0,1,0,6.3,6.3A6.3,6.3,0,0,0,6.3,0Zm0,3.323A2.976,2.976,0,0,0,3.323,6.3a.525.525,0,1,1-1.049,0A4.027,4.027,0,0,1,6.3,2.273a.525.525,0,1,1,0,1.049Z" fill="#f6a605" />
                </svg>
              </div>
              <span>Locatie</span>
            </div>
          </main>
        </div>
    <?php
      endwhile;
    endif;
    ?>
  </div>
</div>