<?php

wp_nav_menu(
    [
        'theme_location'    => 'secondary',
        'container'         => 'ul',
        'container_class'   => 'footer-nav'
    ]
);

wp_nav_menu(
    [
        'theme_location'    => 'social',
    ]
);

wp_footer(); ?>

</body>
</html>