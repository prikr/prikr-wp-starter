<?php
/*
 *  Author: Jasper van Doorn
 *  Index.php (standard page, if it isn't overwritten)
 */

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header(); 
?>

<?php the_content(); ?>

<?php get_footer(); ?>