<?php get_header(); ?>

<main>
    <h1 class="page-title">Discover all games</h1>
    <section class="games-grid">
        <?php
        while(have_posts()) {
            the_post(); ?>
            <a class="single-game" href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail(); ?>
            </a>
            <?php
        } ?>
    </section>
    <nav class="navigation pagination" aria-label="Beiträge">
        <h2 class="screen-reader-text">Beitragsnavigation</h2>
        <div class="nav-links">
            <?php
            // Verwende paginate_links für die Paginierung
            echo paginate_links(array(
                'prev_text' => '<i data-feather="arrow-left"></i>',
                'next_text' => '<i data-feather="arrow-right"></i>',
            ));
            ?>
        </div>
    </nav>
</main>

<?php get_footer(); ?>