<!doctype html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo('charset'); ?>"> <!-- Setzt das Zeichenkodierungsformat basierend auf den Einstellungen des WordPress-Themas. -->
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> <!-- Definiert die Ansichtseigenschaften für Mobilgeräte. -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> <!-- Legt den Dokumentmodus für den Internet Explorer fest. -->
    <title><?php echo get_the_title() . ' | ' . get_bloginfo('name'); ?></title> <!-- Setzt den Titel der Webseite basierend auf dem Titel des aktuellen Beitrags und dem Namen des Blogs. -->
    <?php wp_head(); ?> <!-- Fügt WordPress-spezifische Skripte und Stile in den Kopf der Seite ein. -->
</head>

<body <?php body_class(); ?>> <!-- Hier werden die benötigten Klassen für den Body von WP ausgegeben -->
<header>
    <!-- Bereich für das Logo -->
    <div class="wp_site_identity">
        <?php
        // Prüft, ob die Funktion 'the_custom_logo' verfügbar ist und zeigt das benutzerdefinierte Logo an, falls vorhanden.
        if ( function_exists( 'the_custom_logo' ) ) {
            the_custom_logo();
        } ?>
    </div>

    <!-- Hauptnavigation -->
    <nav class="main-nav">
        <?php
        // Ruft das primäre Menü auf und zeigt es an.
        wp_nav_menu(
            [
                'theme_location'    => 'primary', // Gibt die Position des Menüs an.
                'container'         => 'ul', // Der Container für das Menü.
                'container_class'   => 'main-nav' // Die Klasse des Menücontainers.
            ]
        ); ?>
    </nav>

    <!-- Profilbereich -->
    <div class="profile">
        <!-- Icon für Benachrichtigungen -->
        <i data-feather="bell"></i>
        <!-- Bild für das Benutzerprofil -->
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/profile.png" alt="Profile">
    </div>

    <!-- Schaltfläche zum Öffnen des Menüs (Hamburger-Symbol) -->
    <i class="navburger openburger" data-feather="menu"></i>
    <!-- Schaltfläche zum Schliessen des Menüs (X-Symbol) -->
    <i class="navburger closeburger" data-feather="x"></i>
</header>
