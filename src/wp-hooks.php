<?php

use BoxyBird\Inertia\Inertia;
function vite_get_asset_filename($file_key) {
    $manifest_path = get_template_directory_uri() . '/public/build/manifest.json';
    $manifest = json_decode(file_get_contents($manifest_path), true);

    if (isset($manifest[$file_key])) {
        return get_template_directory_uri() . '/public/build/' . $manifest[$file_key]['file'];
    }

    return '';
}
// WP enqueue
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('google_fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');
    wp_enqueue_script('vite-app', vite_get_asset_filename('resources/js/app.jsx'), array(), '', true);
    wp_enqueue_style('tailwind', vite_get_asset_filename('resources/js/app.css')); // Adjust the version number as needed
    //wp_enqueue_script('app-tailwind', 'https://cdn.tailwindcss.com', array(), '', true);
    
    //wp_enqueue_style('bb_inertia', get_stylesheet_directory_uri() . '/public/build/css/app.css');
    //wp_enqueue_script('bb_inertia', get_stylesheet_directory_uri() . '/dist/js/app.js', ['jquery'], ['latest'], true);
   // wp_enqueue_script('vite-app', get_template_directory_uri() . '/public/js/app.js', array(), '1.0.0', true);
   //$manifest = json_decode(file_get_contents(get_template_directory_uri() . '/public/build/manifest.json'), true);
    
    // Enqueue the main app.js file
    //wp_enqueue_script('vite-app', get_template_directory_uri() . '/public/js/' . $manifest['index']['file'], array(), $manifest['index']['hash'], true); 
   wp_localize_script('bb_inertia', 'bbInertia', [
        'nonce'         => wp_create_nonce('wp_rest'),
        'bb_ajax_nonce' => wp_create_nonce('bb_ajax_nonce'),
    ]);
});

// Set custom Inertia root view
// by default it's 'app.php'
add_action('init', function () {
    Inertia::setRootView('layout.php');
});

// Share globally with Inertia views
add_action('init', function () {
    Inertia::share([
        'site' => [
            'name'       => get_bloginfo('name'),
            'description'=> get_bloginfo('description'),
        ]
    ]);

    Inertia::share([
        'primary_menu' => array_map(function ($menu_item) {
            return [
                'id'   => $menu_item->ID,
                'link' => $menu_item->url,
                'name' => $menu_item->title,
            ];
        }, get_menu_items_by_registered_slug('primary-menu'))
    ]);
});

// Add Inertia verison
// Helps with cache busting
add_action('init', function () {
    $manifest = get_stylesheet_directory() . '/public/build/manifest.json';

    Inertia::version(md5_file($manifest));
});

// General WP theme options
add_action('init', function () {
    add_theme_support('menus');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    register_nav_menus([
        'primary-menu' => 'Primary Menu',
    ]);
});
