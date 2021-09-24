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
    ),
    'listview'  =>  ''
  )
);
$curquery = new WP_Query($args['query']);

$listview = '';
if ($args['listview'] !== '') {
  $listview = $args['listview'];
}

if (key_exists('viewCookie', $_COOKIE)) {
  $listview = $_COOKIE['viewCookie'];
}

?>
<div name="postoverview" id="postoverview" class="container">
  <div id="layout_switcher" class="row <?php echo $listview; ?>_view">
    <?php
    if ($curquery->have_posts()) :
      while ($curquery->have_posts()) : $curquery->the_post();
    ?>
        <div class="trainingsaanbod__item">
          <div class="trainingsaanbod__item__wrapper">
            <header style="background-color: <?php echo get_field('card_color', $post->ID); ?>;">
              <h2 class="title"> <?php echo get_field('card_title', $post->ID); ?></h2>
              <div class="description"> <?php echo get_field('card_description', $post->ID); ?> </div>
            </header>
            <main>
              <div class="d-flex flex-row justify-content-between w-100">
                <div class="flex-switcher d-flex">
                  <div class="date d-flex flex-row align-items-center">
                    <div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="14.693" height="16.325" viewBox="0 0 14.693 16.325">
                        <path id="Icon_material-date-range" data-name="Icon material-date-range" d="M9.4,10.346H7.765v1.633H9.4Zm3.265,0H11.03v1.633h1.633Zm3.265,0H14.3v1.633h1.633ZM17.56,4.633h-.816V3H15.111V4.633H8.581V3H6.949V4.633H6.133A1.625,1.625,0,0,0,4.508,6.265L4.5,17.693a1.632,1.632,0,0,0,1.633,1.633H17.56a1.637,1.637,0,0,0,1.633-1.633V6.265A1.637,1.637,0,0,0,17.56,4.633Zm0,13.06H6.133V8.714H17.56Z" transform="translate(-4.5 -3)" fill="#f6a605" />
                      </svg>
                    </div>
                    <span>Datums</span>
                  </div>
                  <div class="price d-flex flex-row align-items-center">
                    <div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="16.798" height="16.803" viewBox="0 0 16.798 16.803">
                        <path id="Icon_ionic-md-pricetag" data-name="Icon ionic-md-pricetag" d="M19.9,4.5H12.971L5.047,12.709a1.858,1.858,0,0,0,0,2.634l5.413,5.408a2.009,2.009,0,0,0,1.26.547,2.194,2.194,0,0,0,1.374-.547L21.3,12.9v-7ZM18.559,8.994a1.4,1.4,0,1,1,.936-.936A1.362,1.362,0,0,1,18.559,8.994Z" transform="translate(-4.5 21.302) rotate(-90)" fill="#f6a605" />
                      </svg>
                    </div>
                    <span>Prijs</span>
                  </div>
                  <div class="location d-flex flex-row align-items-center">
                    <div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="12.591" height="22.384" viewBox="0 0 12.591 22.384">
                        <path id="Icon_awesome-map-pin" data-name="Icon awesome-map-pin" d="M4.9,13.857v6.85l.963,1.444a.525.525,0,0,0,.873,0l.962-1.444v-6.85a7.382,7.382,0,0,1-2.8,0ZM6.3,0a6.3,6.3,0,1,0,6.3,6.3A6.3,6.3,0,0,0,6.3,0Zm0,3.323A2.976,2.976,0,0,0,3.323,6.3a.525.525,0,1,1-1.049,0A4.027,4.027,0,0,1,6.3,2.273a.525.525,0,1,1,0,1.049Z" fill="#f6a605" />
                      </svg>
                    </div>
                    <span>Locatie</span>
                  </div>
                </div>
                <a href="<?php the_permalink($post->ID); ?>" title="<?php the_title(); ?>" class="goto">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25.243" viewBox="0 0 24 25.243">
                    <g id="Icon_feather-arrow-right" data-name="Icon feather-arrow-right" transform="translate(-6 -5.379)">
                      <path id="Path_20" data-name="Path 20" d="M7.5,18h21" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                      <path id="Path_21" data-name="Path 21" d="M18,7.5,28.5,18,18,28.5" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                    </g>
                  </svg>

                </a>

              </div>

            </main>
          </div>
        </div>
      <?php
      endwhile;
    else :

      ?>

      <div class="d-flex flex-column align-items-center justify-content-center opacity-50 margin-top-60 vacancies__nothingfound text-center mx-auto">
        <svg xmlns="http://www.w3.org/2000/svg" width="71.687" height="71.699" viewBox="0 0 71.687 71.699">
          <path id="Icon_awesome-search" data-name="Icon awesome-search" d="M.975,61.989l13.96-13.96a3.358,3.358,0,0,1,2.38-.98H19.6a29.112,29.112,0,1,1,5.041,5.041v2.282a3.358,3.358,0,0,1-.98,2.38L9.7,70.712a3.347,3.347,0,0,1-4.747,0L.989,66.749a3.376,3.376,0,0,1-.014-4.761ZM42.562,47.048A17.923,17.923,0,1,0,24.639,29.125,17.913,17.913,0,0,0,42.562,47.048Z" fill="#dcdcdc" />
        </svg>
        <strong class="d-block margin-top-16 margin-bottom-8"><?php echo __('Geen cursussen gevonden', 'prikr'); ?></strong>
        <span>Met jouw zoekcombinaties konden we helaas geen resultaten vinden. <br>  
        <?php
          $modal = get_field('nocursusfound_modal', 'content_sections'); 
          if (!empty($modal)) :
            echo 'Zocht je naar iets specifieks? ';
            echo '<a href="#" data-bs-toggle="modal" data-bs-target="#modal_' . $modal->ID . '">Laat ons dit dan weten via deze link</a>.</span>';
          endif;
        ?>
        
      </div>

    <?php

    endif;
    ?>
  </div>
</div>