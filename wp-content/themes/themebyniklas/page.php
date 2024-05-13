<?php get_header(); ?> <!-- Hier wird der WP Header eingebunden. -->

<main>
    <?php
    // Überprüfe, ob die Seite nicht die Startseite ist
    if (!is_front_page()) { ?>
        <!-- Überschrift der Seite und gibt den Titel der Seite aus, die im Backend gesetzt wurde -->
        <h1 class="page-title"><?php the_title(); ?></h1>
    <?php } ?>

    <?php the_post(); ?>

    <!-- Inhalt der Seite -->
    <?php the_content(); ?>
</main>

<?php get_footer(); ?> <!-- Hier wird der WP Footer eingebunden. -->
