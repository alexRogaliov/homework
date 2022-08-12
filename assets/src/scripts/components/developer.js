(function ($, undefined) {
    /* smooth scroll */
    $('a.js-smooth-scroll').click(function () {
        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 500);
        return false
    })

    console.log(2);
})(jQuery);
