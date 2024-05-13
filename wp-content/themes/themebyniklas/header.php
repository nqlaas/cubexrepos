<!doctype html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
    <div class="wp_site_identity">
        <?php if ( function_exists( 'the_custom_logo' ) ) {
            the_custom_logo();
        } ?>
    </div>
    <nav class="main-nav">
        <?php wp_nav_menu(
            [
                'theme_location'    => 'primary',
                'container'         => 'ul',
                'container_class'   => 'main-nav'
            ]
        ); ?>
    </nav>
    <div class="profile">
        <i data-feather="bell"></i>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/profile.png" alt="Profile">
    </div>

    <i class="navburger openburger" data-feather="menu"></i>
    <i class="navburger closeburger" data-feather="x"></i>
    </header>
