<?php get_header(); ?>

<main>
    <?php the_post(); ?>

    <article>
        <h1><?php the_title(); ?></h1>
        <h2><?php the_date(); ?></h2>
        <h3><?php the_author(); ?></h3>
        <?php the_content(); ?>
    </article>
</main>

<?php get_footer(); ?>
