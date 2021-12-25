jQuery(function($){
    "use strict";
    jQuery('.main-menu-navigation > ul').superfish({
        delay:       500,
        animation:   {opacity:'show',height:'show'},  
        speed:       'fast'
    });
});

function prestro_resMenu_open() {
    document.getElementById("sidelong-menu").style.width = "250px";
}
function prestro_resMenu_close() {
    document.getElementById("sidelong-menu").style.width = "0";
}

/* ----------------------------- 
 Pre Loader
 ----------------------------- */
jQuery(window).load(function () {
    jQuery('.loading-icon').delay(500).fadeOut();
    jQuery('#preloader').delay(800).fadeOut('slow');
});

jQuery(window).load(function () {
    jQuery('#home-slider').nivoSlider({
        effect: 'random', // Specify sets like: 'fold,fade,sliceDown'
        pauseTime: 4000, // How long each slide will show
        directionNav: true, // Next & Prev navigation
        controlNav: false, // 1,2,3... navigation
        pauseOnHover: true, // Stop animation while hovering
        prevText: '<i class="fa fa-chevron-left"></i>', // Prev directionNav text
        nextText: '<i class="fa fa-chevron-right"></i>', // Next directionNav text
        randomStart: true             // Start on a random slide
    });
});
/*-------Scrolling Effects-------*/
jQuery(function ($) {
    var $elems = $('.animateblock');
    var winheight = $(window).height();
    var fullheight = $(document).height();
    $elems.each(function () {
        var $elm = $(this);
        var topcoords = $elm.offset().top;
        if (topcoords < winheight) {
            // animate when top of the window is 3/4 above the element
            $elm.addClass('animated');
        }
    });
    $(window).scroll(function () {
        animate_elems();
    });

    function animate_elems() {
        var wintop;
        wintop = $(window).scrollTop(); // calculate distance from top of window

        // loop through each item to check when it animates
        $elems.each(function () {
            var $elm = $(this);
            if ($elm.hasClass('animated')) {
                return true;
            } // if already animated skip to the next item
            var topcoords = $elm.offset().top; // element's distance from top of page in pixels
            if (wintop > (topcoords - (winheight * 0.9))) {
                // animate when top of the window is 3/4 above the element
                $elm.addClass('animated');
            }
        });
    }
});

/*------- Nivo Slider -------*/
jQuery(function ($) {
    jQuery(window).load(function() {
        jQuery('#slider').nivoSlider();
    });
});