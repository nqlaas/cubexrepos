<?php get_header(); ?>

<main>
    <h1 class="page-title">Discover all games</h1>
    <section class="games-grid">
        <?php
        // Verwende WP_Query für die Abfrage
        $args = array(
            'posts_per_page' => 6,
            'paged' => get_query_var('paged') ? get_query_var('paged') : 1
        );
        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post(); ?>
                <a class="single-game" href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail(); ?>
                </a>
            <?php endwhile;
        else :
            echo 'No posts found';
        endif;

        // Stelle sicher, dass die Originalabfrage zurückgesetzt wird
        wp_reset_postdata();
        ?>
    </section>
    <nav class="navigation pagination" aria-label="Beiträge">
        <h2 class="screen-reader-text">Beitragsnavigation</h2>
        <div class="nav-links">
            <?php
            // Verwende paginate_links für die Paginierung
            echo paginate_links(array(
                'total' => $query->max_num_pages,
                'prev_text' => '<i data-feather="arrow-left"></i>',
                'next_text' => '<i data-feather="arrow-right"></i>',
            ));
            ?>
        </div>
    </nav>
</main>

<?php get_footer(); ?>