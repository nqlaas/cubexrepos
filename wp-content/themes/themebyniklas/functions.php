<?php

/** Theme Supports */
function cubex_supports() {
    // Beitragsbild aktivieren
    add_theme_support('post-thumbnails');

    // Editor Styles hinzufügen
    add_theme_support('editor-styles');
    add_editor_style('/assets/css/editor-style.css');

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

// Einbinden des Stylesheets
function cubex_include_stylesheets() {
    wp_enqueue_style('cubex-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'cubex_include_stylesheets');

// Einbinden der Skripte
function cubex_include_scripts() {
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', array(), '3.6.0', true);
    wp_enqueue_script('cubex-scripts', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('tilt-js', 'https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.2.1/tilt.jquery.min.js', array('jquery'), '1.2.1', true);
    wp_enqueue_script('feather-js', 'https://unpkg.com/feather-icons', array(), null, true);
}
add_action('wp_enqueue_scripts', 'cubex_include_scripts');

// Einbinden des Block-Stylesheets
function cubex_include_blockstyles() {
    wp_enqueue_style('cubex-blockstyle', get_template_directory_uri() . '/assets/css/block-style.css');
}
add_action('enqueue_block_assets', 'cubex_include_blockstyles');

/** Menüs Setup */
function cubex_menus(){
    // Location für verschiedene Navigationen
    $locations = [
        'primary' => __('Primäre Navigation', 'cubex-theme'),
        'secondary' => __('Footer Navigation' , 'cubex-theme'),
    ];

    register_nav_menus($locations);
}
add_action('init', 'cubex_menus');

/** Custom Logo per Customizer */
function cubex_custom_logo_setup() {
    $defaults = array(
        'height'               => 100,
        'width'                => 400,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => true,
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'cubex_custom_logo_setup' );

/** SVG Upload erlauben */
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
    global $wp_version;
    if ( $wp_version !== '4.7.1' ) {
        return $data;
    }
    $filetype = wp_check_filetype( $filename, $mimes );
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}, 10, 4 );
function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );
function fix_svg() {
    echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'fix_svg' );