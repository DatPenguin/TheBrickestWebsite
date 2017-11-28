(function ($) {
    $(document).ready(function () {
        $('#nBar').hide();
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('#nBar').fadeIn(250);
            } else {
                $('#nBar').fadeOut(250);
            }
        });
    });
})(jQuery);
