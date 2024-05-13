<?php

/** Hier wird das Beitragsbild aktiviert, sodass es in einem Post ausgewählt werden kann.
    Danach wird das Styling für den WP Editor eingebunden und im Theme aktiviert.
    Zuletzt wird der Support für das aktuelle HTML5 aktiviert.
*/
function cubex_supports() {
    // Beitragsbild aktivieren
    add_theme_support('post-thumbnails');

    // Editor Styles hinzufügen
    add_theme_support('editor-styles');
    add_editor_style(get_template_directory_uri() . '/assets/css/editor-style.css');

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
/* Hier wird es zum Theme hinzugefügt */

// Einbinden des Stylesheets
function cubex_include_stylesheets() {
    // Das cubex-style-Stylesheet wird in die Seite eingebunden, unter Verwendung der Standard-WordPress-Funktion get_stylesheet_uri().
    wp_enqueue_style('cubex-style', get_stylesheet_uri());
}
// Die Funktion cubex_include_stylesheets wird aufgerufen, wenn der Hook 'wp_enqueue_scripts' aktiviert wird, um das Stylesheet hinzuzufügen.
add_action('wp_enqueue_scripts', 'cubex_include_stylesheets');


// Einbinden der Skripte
function cubex_include_scripts() {
    // Das Cubex-Skript wird registriert und eingebunden. Es verweist auf die Datei main.js im Verzeichnis assets/js des Themes.
    wp_enqueue_script('cubex-scripts', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);

    // Die tilt-js-Bibliothek für den gläsernen Effekt und die Animation der Boxen wird registriert und eingebunden.
    wp_enqueue_script('tilt-js', 'https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.2.1/tilt.jquery.min.js', array('jquery'), '1.2.1', true);

    // Die feather-js-Bibliothek für die Icons wird registriert und eingebunden.
    wp_enqueue_script('feather-js', 'https://unpkg.com/feather-icons', array(), null, true);
}

// Die Funktion cubex_include_scripts wird aufgerufen, wenn der Hook 'wp_enqueue_scripts' aktiviert wird, um die Skripte hinzuzufügen.
add_action('wp_enqueue_scripts', 'cubex_include_scripts');

// Einbinden des Block-Stylesheets
function cubex_include_blockstyles() {
    // Das cubex-blockstyle-Stylesheet wird in die Seite eingebunden, indem es auf die Datei block-style.css im Verzeichnis assets/css des Themes verweist.
    wp_enqueue_style('cubex-blockstyle', get_template_directory_uri() . '/assets/css/block-style.css');
}

// Die Funktion cubex_include_blockstyles wird aufgerufen, um das Stylesheet für die Blöcke hinzuzufügen.
add_action('enqueue_block_assets', 'cubex_include_blockstyles');

/** Menüs Setup */
function cubex_menus(){
    // Definiert die Namen und Beschreibungen der verschiedenen Menü-Positionen.
    $locations = [
        'primary' => __('Primäre Navigation', 'cubex-theme'), // Primäres Menü für die Hauptnavigation.
        'secondary' => __('Footer Navigation' , 'cubex-theme'), // Sekundäres Menü für den Footer.
    ];

    // Registriert die Menüpositionen in WordPress.
    register_nav_menus($locations);
}

// Die Funktion cubex_menus wird aufgerufen, um die benutzerdefinierten Menüs zu registrieren.
add_action('init', 'cubex_menus');

/** Custom Logo per Customizer */
function cubex_custom_logo_setup() {
    // Standardoptionen für das benutzerdefinierte Logo.
    $defaults = array(
        'height'               => 100, // Standardhöhe des Logos.
        'width'                => 400, // Standardbreite des Logos.
        'flex-height'          => true, // Ermöglicht eine flexible Höhe für das Logo.
        'flex-width'           => true, // Ermöglicht eine flexible Breite für das Logo.
        'header-text'          => array( 'site-title', 'site-description' ), // Erlaubt das Anzeigen von Text neben dem Logo.
    );

    // Fügt Theme-Unterstützung für ein benutzerdefiniertes Logo hinzu und verwendet die Standardoptionen.
    add_theme_support( 'custom-logo', $defaults );
}

// Die Funktion cubex_custom_logo_setup wird aufgerufen, um das benutzerdefinierte Logo einzurichten.
add_action( 'after_setup_theme', 'cubex_custom_logo_setup' );

// Erlaubt das Hochladen von SVG-Dateien in WordPress und führt einige Anpassungen durch, um SVG-Dateien ordnungsgemäss anzuzeigen.
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
    // Überprüft die WordPress-Version, um sicherzustellen, dass die SVG-Unterstützung aktiviert ist.
    global $wp_version;
    if ( $wp_version !== '4.7.1' ) {
        return $data;
    }
    // Überprüft den Dateityp der hochgeladenen Datei und passt ihn entsprechend an.
    $filetype = wp_check_filetype( $filename, $mimes );
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}, 10, 4 );

// Fügt den SVG-Dateityp zu den erlaubten MIME-Typen für den Datei-Upload hinzu.
function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

// Fügt CSS-Stile hinzu, um SVG-Bilder im WordPress-Adminbereich ordnungsgemäss anzuzeigen.
function fix_svg() {
    echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'fix_svg' );

// Deaktiviert das automatische Hinzufügen von <p> Tags durch das Contact Form 7 Plugin.
add_filter('wpcf7_autop_or_not', '__return_false');