<?php 
/*************************************************************************************************
	将Bootstrap分页功能引入到这里,方便管理.也可以单独出来作为插件.
	Pl*** Name: wp_bs_pagination
	Plugin URI: http://fellowtuts.com/wordpress/bootstrap-3-pagination-in-wordpress/
	Description: Bootstrap 3 Pagination In WordPress
	Usage:  In your archive files wherever you want to show pagination, call the function: 
        if (function_exists("wp_bs_pagination"))  {
            //wp_bs_pagination($the_query->max_num_pages);
            wp_bs_pagination();
        }
        The line #4 in the code above is an example to apply pagination if you are using custom query and if you wish to let pagination appear to its default position (not at center of the column), delete line number #41 and #73 from function. Now all is done! Check your WordPress website with Bootstrap theme to see Pagination live.

 **************************************************************************************************/
function wp_bs_pagination($pages = '', $range = 4) {  
     $showitems = ($range * 2) + 1;  
     global $paged;
     if(empty($paged)) $paged = 1;
     if($pages == '')  {
         global $wp_query; 
         $pages = $wp_query->max_num_pages;
         if(!$pages) {
             $pages = 1;
         }
     }   

     if(1 != $pages) {
        echo '<div class="text-center">'; 
        echo '<nav><ul class="pagination"><li class="disabled hidden-xs"><span><span aria-hidden="true">Page '.$paged.' of '.$pages.'</span></span></li>';
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) 
            echo "<li><a href='".get_pagenum_link(1)."' aria-label='First'>&laquo;<span class='hidden-xs'> First</span></a></li>";
         if($paged > 1 && $showitems < $pages) 
            echo "<li><a href='".get_pagenum_link($paged - 1)."' aria-label='Previous'>&lsaquo;<span class='hidden-xs'> Previous</span></a></li>";
         for ($i=1; $i <= $pages; $i++) {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
                 echo ($paged == $i)? "<li class=\"active\"><span>".$i." <span class=\"sr-only\">(current)</span></span> </li>":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>";
             }
         }
         if ($paged < $pages && $showitems < $pages) 
            echo "<li><a href=\"".get_pagenum_link($paged + 1)."\"  aria-label='Next'><span class='hidden-xs'>Next </span>&rsaquo;</a></li>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) 
            echo "<li><a href='".get_pagenum_link($pages)."' aria-label='Last'><span class='hidden-xs'>Last </span>&raquo;</a></li>";
         echo "</ul></nav>";
         echo "</div>";
     }
}

/*>>>>>>>>>>>>>>End of File>>>>>>>>>>>>>>>>>*/
?>