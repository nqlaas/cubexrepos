<?php get_header();
// Header einbinden
?>

<main>
    <h1>Blog</h1>

    <section>
        <?php
        while(have_posts()) {
            the_post(); ?>

            <a href="<?php the_permalink(); ?>"><time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('d.m.Y'); ?></time> | <?php the_title(); ?></a><br>

            <ul>
                <?php
                $categories = get_the_category();

                foreach ($categories as $category) { ?>

                    <li><a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a></li>

                    <?php
                } ?>
            </ul>
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
        <?php
        } ?>
    </section>
</main>

<?php get_footer();
// Footer einbinden
?>