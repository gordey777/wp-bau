<?php
/*
Template Name: Page Category
*/
$front__id = (int)(get_option( 'page_on_front' ));
$pagekids = get_pages("child_of=".$post->ID."&sort_column=menu_order");
if ($pagekids) {
$firstchild = $pagekids[0];
wp_redirect(get_permalink($firstchild->ID));
} else {
wp_redirect(get_permalink($front__id));
}
?>
