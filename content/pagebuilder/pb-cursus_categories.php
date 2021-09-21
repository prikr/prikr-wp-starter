<?php

/**
 * Project: mvr
 * File: pb-product_categories.php
 * Author: Jasper van Doorn
 * Copyright © Prikr 
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

$bgcolor = get_sub_field('achtergrond_kleur');
if ($bgcolor === false) {
  $bgcolor = '#ffffff';
}

?>


<section name="cursus_categories" class="cursus_categories has-js-flip" style="background-color: <?php echo $bgcolor; ?>;">

  <section class="cursus_categories_curve">
    <div class="cursus_categories_curve_top">
      <div class="cursus_categories_curve_top_inner"><svg id="opt_1" data-name="opt 1" xmlns="http://www.w3.org/2000/svg" width="1366" height="128" viewBox="0 0 1366 128" preserveAspectRatio="none">
          <defs>
            <style>
              .cls-1 {
                fill: currentColor;
                fill-rule: evenodd;
              }
            </style>
          </defs>
          <g id="Wave-1">
            <path id="Rectangle" class="cls-1" d="M0,0C623,0,667,151.4614,1366,121.6993V128H0Z"></path>
          </g>
        </svg></div>
    </div>
  </section>

  <div class="container">
    <div class="row padding-top-32 padding-bottom-32 bg-white margin-left-lg-60 margin-right-lg-60 padding-left-16 padding-right-16">

      <?php

      $categories = get_sub_field('categorien');
      foreach ($categories as $term) : ?>

        <div class="col-12 col-md-6 col-xl-3 padding-left-16 padding-right-16">
          <div class="flip">
            <div class="card">
              <div class="face front">
                <div class="inner">
                  <?php
                  $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
                  if ($thumbnail_id) :
                    $image = wp_get_attachment($thumbnail_id, 'full');
                    if ($image !== false) :
                      echo '<img alt="' . $image['alt'] . '" src="' . $image['src'] . '" title="' . $image['title'] . '" width="100%" height="auto" />';
                    endif;
                  endif;
                  ?>
                  <h4 class="fw-bold"><?php echo $term->name; ?></h4>
                </div>
                <svg class="plus" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                  <path id="Icon_awesome-plus" data-name="Icon awesome-plus" d="M13.929,8.143H9.107V3.321A1.072,1.072,0,0,0,8.036,2.25H6.964A1.072,1.072,0,0,0,5.893,3.321V8.143H1.071A1.072,1.072,0,0,0,0,9.214v1.071a1.072,1.072,0,0,0,1.071,1.071H5.893v4.821A1.072,1.072,0,0,0,6.964,17.25H8.036a1.072,1.072,0,0,0,1.071-1.071V11.357h4.821A1.072,1.072,0,0,0,15,10.286V9.214A1.072,1.072,0,0,0,13.929,8.143Z" transform="translate(0 -2.25)" />
                </svg>

              </div>
              <div class="face back">
                <div class="inner text-center">
                  <span><?php echo $term->description; ?></span>
                  <a href="<?php echo '/trainingsaanbod/' . $term->slug; ?>" class="btn btn-secondary btn-sm padding-top-16 padding-bottom-16 padding-left-8 padding-right-8">
                    Bekijk trainingen
                  </a>
                </div>
                <svg class="min" xmlns="http://www.w3.org/2000/svg" width="15" height="3.214" viewBox="0 0 15 3.214">
                  <path id="Icon_awesome-plus" data-name="Icon awesome-plus" d="M13.929,8.143H1.071A1.072,1.072,0,0,0,0,9.214v1.071a1.072,1.072,0,0,0,1.071,1.071H13.929A1.072,1.072,0,0,0,15,10.286V9.214A1.072,1.072,0,0,0,13.929,8.143Z" transform="translate(0 -8.143)" fill="#ffffff" />
                </svg>

              </div>
            </div>
          </div>
        </div>


      <?php endforeach;

      ?>

    </div>
    <?php
    $cta = get_sub_field('category_cta');
    if (!empty($cta)) : ?>
      <div class="row padding-top-80">
        <div class="col-12 d-flex flex-row align-items-center justify-content-center">
          <a href="<?php echo $cta['url']; ?>" target="<?php echo $cta['target']; ?>" class="btn btn-secondary"><?php echo $cta['title']; ?></a>
        </div>
      </div>
    <?php endif; ?>
  </div>

  <section class="cursus_categories_curve">
    <div class="cursus_categories_curve_bottom">
      <div class="cursus_categories_curve_bottom_inner"><svg id="opt_1" data-name="opt 1" xmlns="http://www.w3.org/2000/svg" width="1366" height="128" viewBox="0 0 1366 128" preserveAspectRatio="none">
          <defs>
            <style>
              .cls-1 {
                fill: currentColor;
                fill-rule: evenodd;
              }
            </style>
          </defs>
          <g id="Wave-1">
            <path id="Rectangle" class="cls-1" d="M0,0C623,0,667,151.4614,1366,121.6993V128H0Z"></path>
          </g>
        </svg></div>
    </div>
  </section>

</section>