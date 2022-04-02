<?php
/*
Template Name: data-listing
Template Post Type: post, page, my-post-type;
*/
get_header();


echo '<h3 align="center">All records</h3>';
echo do_shortcode('[data_listing]');


get_footer();
?>