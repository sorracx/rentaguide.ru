$(function () {
    var menu = $(".header-nav");

    $(".touch-menu").click(function () {
        menu.slideToggle();
    });

    $(window).resize(function () {
        var width = $(window).width();
        if (width > 768 && menu.is(":hidden")) {
            menu.removeAttr("style");
        }
    });
});
