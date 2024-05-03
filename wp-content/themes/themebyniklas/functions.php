<?php

/** Theme Supports */
function cubex_supports() {
    // Beitragsbild aktivieren
    add_theme_support('post-thumbnails');

    //HTML5 Support
    add_theme_support(
        'html5',
        [
            'search-form',
            'gallery',
            'captions',
            'script',
            'style',
        ]
    );
}
add_action('after_setup_theme', 'cubex_supports');

/*** Stylesheet einbinden */
function cubex_include_stylesheets() {
    wp_enqueue_style('cubex-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'cubex_include_stylesheets');

/** Scripts einbinden */
function cubex_include_scripts() {
    wp_enqueue_script('cubex-scripts', get_template_directory_uri() . '/assets/js/index.js');
}
add_action('wp_enqueue_scripts', 'cubex_include_scripts');

/** Menüs Setup */
function cubex_menus(){
    // Location für verschiedene Navigationen
    $locations = [
        'primary' => __('Primäre Navigation', 'cubex-theme'),
        'secondary' => __('Sekundäre Navigation', 'cubex-theme'),
    ];

    register_nav_menus($locations);
}
add_action('init', 'cubex_menus');