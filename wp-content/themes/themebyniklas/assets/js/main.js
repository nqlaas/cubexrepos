jQuery(document).ready(function ($) {

    // Create a new div in the hero part with the title and description of the game
    // Add a button to read more about game (wordpress does not create one)
    $('.hero-game').append('<div class="hero-card"></div>');
    $('.hero-game .wp-block-latest-posts__post-title, .hero-game .wp-block-latest-posts__post-excerpt').prependTo('.hero-card');
    $('<a class="wp-block-button__link" href="#">Read more</a>').appendTo('.hero-card');

    // Get link from Heading and place it in link tag (hero part)
    let hero_game_link = $('.hero-game .wp-block-latest-posts__post-title').attr('href');
    $('.hero-game .wp-block-button__link').attr('href', hero_game_link);

    // Tilt effect on hero + service cards
    $('.hero-card, .service-card, .single-game, main>.wp-block-latest-posts:last-child>li a').tilt({
        maxTilt: 3,
        glare: true,
        maxGlare: .3
    });

    // Replace feather icon
    feather.replace();

    // Burger Menu: Add class to body
    $('.navburger').click((e) => {
        e.preventDefault();
        $('body').toggleClass('open');
    });

});


// Resize function for moving elements into menu for responsive
jQuery(window).on("ready load resize", function (e) {
    if ($(window).innerWidth() > 800) {
        if ($('header .main-nav .footer-nav, header .main-nav .profile').length) {
            $('.footer-nav').appendTo('footer');
            $('.profile').appendTo('header');
        }
    } else {
        if ($('header>.profile, footer nav').length) {
            $('header .profile').prependTo('header nav ul');
            $('footer nav').appendTo('header nav ul');
        }
    }
});