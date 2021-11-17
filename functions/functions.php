<?php
 /*
 *  Author: Jasper van Doorn
 *  Collection of functions
 */
 
if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Security
require get_template_directory() . '/functions/functions-security.php';

// Theme
require get_template_directory() . '/functions/functions-theme.php';

// cpts
require get_template_directory() . '/functions/cpts/cpts.php';

// Custom theme templates
require get_template_directory() . '/functions/functions-widgets.php';

// Custom theme templates
require get_template_directory() . '/functions/functions-custom-templates.php';

// ACF functions
require get_template_directory() . '/functions/functions-acf.php';

// WooCommerce
require get_template_directory() . '/functions/functions-woocommerce.php';

// Navigation
require get_template_directory() . '/functions/functions-navigation.php';

// Forms, buttons and modals
require get_template_directory() . '/functions/functions-buttons-forms-and-modals.php';

// Permalinks
require get_template_directory() . '/functions/functions-permalinks.php';

// Pagination functions
require get_template_directory() . '/functions/functions-pagination.php';

// Lazyload functions
require get_template_directory() . '/functions/functions-lazyload.php';


