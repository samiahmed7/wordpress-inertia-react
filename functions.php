<?php

// General function helpers
require get_stylesheet_directory() . '/src/helpers.php';

// WP actions and filters setup
require get_stylesheet_directory() . '/src/wp-hooks.php';

// Register 'movie' custom post type
require get_stylesheet_directory() . '/src/movie-cpt.php';

// Custom REST API endpoints
require get_stylesheet_directory() . '/src/rest-endpoints.php';
//remove_action('wp_head', '_wp_render_title_tag', 1);


function add_inertia_attribute_to_meta_tags($output) {
    $output = preg_replace('/<title/', '<meta inertia', $output);
    return $output;
}

//add_filter('wp_head', 'add_inertia_attribute_to_meta_tags');

//add_action('wp_head', function(){echo '<title inertia>'.get_bloginfo('name').'</title>';}, 1);