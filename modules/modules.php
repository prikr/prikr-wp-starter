<?php
 /*
 *  Author: Jasper van Doorn
 *  Import all modules
 */

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// HTML minifier
require get_template_directory() . '/modules/minifier/minifier.php';

// Plugin activator
require get_template_directory() . '/modules/plugin-activation/plugin-activation.php';

?>