<?php get_header(); ?> <!-- Hier wird der WP Header eingebunden. -->

<main>
    <!-- Überschrift der Seite -->
    <h1 class="page-title">Discover all games</h1>

    <!-- Bereich für das Raster der Games -->
    <section class="games-grid">
        <?php
        // Loop durch alle verfügbaren Beiträge
        while(have_posts()) {
            the_post(); ?>
            <!-- Einzel Game-Link -->
            <a class="single-game" href="<?php the_permalink(); ?>">
                <!-- Bild des Games -->
                <?php the_post_thumbnail(); ?>
            </a>
            <?php
        } ?>
    </section>

    <!-- Navigation für die Post-Navigation -->
    <nav class="navigation pagination" aria-label="Beiträge">
        <!-- Bildschirmleser-Text für die Navigation -->
        <h2 class="screen-reader-text">Beitragsnavigation</h2>

        <!-- Navigationslinks -->
        <div class="nav-links">
            <?php
            // Verwende paginate_links für die Navigation der Posts
            echo paginate_links(array(
                'prev_text' => '<i data-feather="arrow-left"></i>', // Icon für den Link zurück
                'next_text' => '<i data-feather="arrow-right"></i>', // Icon für den Link Weiter
            ));
            ?>
        </div>
    </nav>
</main>

<?php get_footer(); ?> <!-- Hier wird der WP Footer eingebunden. -->