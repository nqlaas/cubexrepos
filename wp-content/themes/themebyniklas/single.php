<?php get_header(); ?> <!-- Hier wird der WP Header eingebunden. -->

<main>
    <!-- Bereich für das vorgestellte Bild des Games -->
    <div class="game-hero">
        <?php the_post_thumbnail(); ?>
    </div>

    <!-- Container für die Gameinformationen -->
    <div class="game-info-container">
        <!-- Zurück-Schaltfläche zum Zurückkehren zu allen Games -->
        <a href="/games" class="back-button icon">
            <i data-feather="arrow-left"></i>
            <span>Back to all games</span>
        </a>

        <!-- Headerbereich der Gameinformationen -->
        <div class="game-info-header">
            <!-- Einführungstext des Games -->
            <div class="game-infos-intro">
                <!-- Überschrift des Games, der im Backend gesetzt wurde -->
                <h1 class="page-title"><?php the_title(); ?></h1>
            </div>

            <!-- Kategorien des Games -->
            <div class="categories">
                <?php
                // Holt die Kategorien des aktuellen Games, die im Backend gesetzt wurden
                $categories = get_the_category();
                // Loop durch die Kategorien und zeige sie an
                foreach ($categories as $category) { ?>
                    <div><a href="<?php echo get_category_link($category->term_id); ?>" class="category-item"><?php echo $category->name ?></a></div>
                <?php } ?>
            </div>
        </div>

        <!-- Inhalt der Gameinformationen -->
        <div class="game-infos-content">
            <?php the_content(); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?> <!-- Hier wird der WP Footer eingebunden. -->
