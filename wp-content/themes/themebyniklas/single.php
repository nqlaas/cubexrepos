<?php get_header(); ?>

<main>
    <div class="game-hero">
        <?php the_post_thumbnail(); ?>
    </div>
    <div class="game-info-container">
        <div class="game-info-header">
            <div class="game-infos-intro">
                <h1 class="page-title"><?php the_title(); ?></h1>
            </div>
            <div class="categories">
                <?php $categories = get_the_category();
                    foreach ($categories as $category) { ?>
                    <div><a href="<?php echo get_category_link($category->term_id); ?>" class="category-item"><?php echo $category->name ?></a></div>
                    <?php } ?>
            </div>
        </div>
        <?php the_post(); ?>
    </div>
    <article>
        <h3><?php the_author(); ?></h3>
        <?php the_content(); ?>
    </article>
</main>

<?php get_footer(); ?>
