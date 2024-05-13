<?php get_header(); ?>

<main>
    <?php if (!is_front_page()) { ?>
        <h1 class="page-title"><?php the_title(); ?></h1>
    <?php } ?>
    <?php the_post(); ?>

    <?php the_content(); ?>
</main>

<?php get_footer(); ?>
