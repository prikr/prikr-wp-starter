<?php
 /*
 *  Author: Jasper van Doorn
 *  Collection of functions
 */
 
if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Theme
require get_template_directory() . '/functions/functions-theme.php';

// Custom theme templates
require get_template_directory() . '/functions/functions-widgets.php';

// Custom theme templates
require get_template_directory() . '/functions/functions-custom-templates.php';

// ACF functions
require get_template_directory() . '/functions/functions-acf.php';

// Pagination functions
require get_template_directory() . '/functions/functions-pagination.php';

// Lazyload functions
require get_template_directory() . '/functions/functions-lazyload.php';
