<footer>
    <div class="wp_site_identity">
        <?php if ( function_exists( 'the_custom_logo' ) ) {
            the_custom_logo();
        } ?>
    </div>
    <nav class="footer-nav">
        <?php wp_nav_menu(
            [
                'theme_location'    => 'secondary',
                'container'         => 'ul',
                'container_class'   => 'main-nav'
            ]
        ); ?>
    </nav>
</footer>

<?php wp_footer(); ?>

</body>
</html>