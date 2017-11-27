(function ($) {
    $(document).ready(function () {
        $('#menu').hide();
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('#menu').fadeIn(250);
            } else {
                $('#menu').fadeOut(250);
            }
        });
    });
})(jQuery);
