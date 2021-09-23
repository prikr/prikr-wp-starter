<?php

/**
 * Project: mvr
 * File: pb-map_tekst.php
 * Author: Jasper van Doorn
 * Copyright © Prikr 
*/

if (!defined('ABSPATH')) exit; // Exit if accessed directly

?>
  <section class="googlemap_textright">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 col-md-12 order-2 padding-48 padding-lg-100">
          <span class="divider"><?php echo get_sub_field('tekst'); ?></span>
        </div>
        <div class="col-lg-6 col-md-12 order-1 px-0">
        <?php 
          $location = get_sub_field('google_maps');
          if( $location ): ?>
              <div class="acf-map" data-zoom="16">
                  <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
              </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

  <style type="text/css">
.acf-map {
    width: 100%;
    height: 515px;
}

.acf-map img {
   max-width: inherit !important;
}
</style>