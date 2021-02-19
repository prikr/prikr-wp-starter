<?php
/*
 *  Author: Jasper van Doorn
 *  Pagination functions
 */

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function get_teachdigital_pagination($pages = '', $range = 4) {  
  $showitems = ($range * 2)+1;  
  global $paged;
  if (empty($paged)) $paged = 1;
  if ($pages == '') {
      global $the_query;
      $pages = $the_query->max_num_pages;
      if(!$pages) $pages = 1;
  }   
 
    if (1 != $pages) { ?>
        <div class="blogs__pagination">
            <a class="btn btn-light <?php if($paged === 1) { ?>btn-disabled disabled<?php } ?>" href="<?php echo get_pagenum_link($paged - 1); ?>"> <i class='fas fa-chevron-left prev'></i> Vorige</a>
            <ul class="blogs__pagination__list list-inline">
                <?php
                for ($i=1; $i <= $pages; $i++) {
                    if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
                    {
                        echo ($paged == $i)? "<li class='list-inline-item'><span class='current'>".$i."</span></li>":"<li class='list-inline-item'><a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a></li>";
                    }
                }
                ?>
            </ul>
            <a class="btn btn-light ms-auto"  href="<?php echo get_pagenum_link($paged + 1); ?>"> <i class='fas fa-chevron-right next'></i> Volgende</a> 
        </div>
    <?php }
}