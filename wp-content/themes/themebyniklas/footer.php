<footer>
    <!-- Hier wird das Logo eingebunden, das im Backend per Customizer gesetzt wurde, in dem es prüft, ob die Funktion überhaupt existiert. -->
    <div class="wp_site_identity">
        <?php if ( function_exists( 'the_custom_logo' ) ) {
            the_custom_logo();
        } ?>
    </div>
    <!-- Hier wird das im Backend als Position secondary gesetzte Footer Menü ausgegeben. -->
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

<!-- Die wp_footer-Funktion bindet zusätzlichen HTML-Code oder Skripte im Footer-Bereich ein. Zudem bietet sie Plugins und Themes die Möglichkeit geladene Inhalte einzufügen. -->
<?php wp_footer(); ?>

</body>
</html>