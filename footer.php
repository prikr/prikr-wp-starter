<?php

/**
 * Project: prikr
 * File: footer.php
 * Author: Jasper van Doorn
 * Copyright © Prikr 
*/

if (!defined('ABSPATH')) exit; // Exit if accessed directly


  
  get_template_part('content/content', 'footer');

  get_template_part('content/content', 'cookies');

  wp_footer(); 
  
  ?>
  
  </body>
</html>