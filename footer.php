<?php

/**
 * Project: mvr
 * File: footer.php
 * Author: Jasper van Doorn
 * Copyright © Prikr 
*/

if (!defined('ABSPATH')) exit; // Exit if accessed directly

?>
  </main>

  <footer>
    <?php get_template_part('content/content', 'footer'); ?>
  </footer>
  <?php get_template_part('content/content', 'cookies');
  

  wp_footer(); ?>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtfsjVSyWIHxCW2-kfZ55j-eWXdj78UG0"></script>

  </body>
</html>