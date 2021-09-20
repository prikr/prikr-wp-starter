<?php

/**
 * Project: mvr
 * File: pb-product_categories.php
 * Author: Jasper van Doorn
 * Copyright © Prikr 
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly



?>

<section name="cursus_categories" class="cursus_categories has-js-flip">

  <div class="container">
    <div class="row p4 bg-white">

      <?php

      $categories = get_sub_field('categorien');
      foreach ($categories as $term) : ?>

        <div class="col-12 col-md-6 col-lg-3">
          <div class="flip">
            <div class="card">
              <div class="face front">
                <div class="inner">
                  <?php
                  $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
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
                  <path id="Icon_awesome-plus" data-name="Icon awesome-plus" d="M13.929,8.143H9.107V3.321A1.072,1.072,0,0,0,8.036,2.25H6.964A1.072,1.072,0,0,0,5.893,3.321V8.143H1.071A1.072,1.072,0,0,0,0,9.214v1.071a1.072,1.072,0,0,0,1.071,1.071H5.893v4.821A1.072,1.072,0,0,0,6.964,17.25H8.036a1.072,1.072,0,0,0,1.071-1.071V11.357h4.821A1.072,1.072,0,0,0,15,10.286V9.214A1.072,1.072,0,0,0,13.929,8.143Z" transform="translate(0 -2.25)"/>
                </svg>

              </div>
              <div class="face back">
                <div class="inner text-center">
                  <?php echo $term->description; ?>
                  <a href="<?php echo '/trainingsaanbod/' . $term->slug; ?>" class="btn btn-primary btn-sm">
                    Bekijk trainingen
                  </a>
                </div>
                <svg class="min" xmlns="http://www.w3.org/2000/svg" width="15" height="3.214" viewBox="0 0 15 3.214">
                  <path id="Icon_awesome-plus" data-name="Icon awesome-plus" d="M13.929,8.143H1.071A1.072,1.072,0,0,0,0,9.214v1.071a1.072,1.072,0,0,0,1.071,1.071H13.929A1.072,1.072,0,0,0,15,10.286V9.214A1.072,1.072,0,0,0,13.929,8.143Z" transform="translate(0 -8.143)" fill="#ffffff"/>
                </svg>

              </div>
            </div>
          </div>
        </div>


      <?php endforeach;

      ?>

    </div>
  </div>



</section>