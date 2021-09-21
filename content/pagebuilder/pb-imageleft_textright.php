<?php

/**
 * Project: mvr
 * File: pb-imageleft_textright.php
 * Author: Jasper van Doorn
 * Copyright © Prikr 
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

$acfimage = get_sub_field('afbeelding');
if ($acfimage) :
  $image = wp_get_attachment($acfimage['id'], 'full');
  if ($image !== false) :

?>
  <section class="imageleft_textright">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-8 col-md-12 order-2 px-0 padding-50 padding-lg-100">
          <?php echo get_sub_field('tekst');
            $cta = get_sub_field('knop');
            if (!empty($cta)) : ?>
              <a href="<?php echo $cta['url']; ?>" target="<?php echo $cta['target']; ?>" class="btn btn-secondary margin-top-16"><?php echo $cta['title']; ?></a>
            <?php endif; ?>
        </div>
        <div class="col-lg-4 col-md-12 order-1 px-0 col-bg-image" style="background-image: url('<?php echo $image['src']; ?>');">
          <?php
          echo '<img alt="' . $image['alt'] . '" data-src="' . $image['src'] . '" title="' . $image['title'] . '" width="100%" height="auto" />';
          ?>
        </div>
      </div>
    </div>
  </section>
<?php
  endif;
endif;
?>