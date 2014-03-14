jQuery.noConflict();
(function() {
    var $backToTopFun = function() {
        var st = jQuery(document).scrollTop(), winh = jQuery(window).height();
        (st > 0) ? jQuery(".gotop").show() : jQuery(".gotop").hide();
        // IE6下的定位
        if (!window.XMLHttpRequest) {
            $backToTopEle.css("top", st + winh - 166);
        }
    };

    jQuery(document).ready(function() {
        jQuery(".gotopcn").click(function() {
            jQuery("html, body").animate({
                scrollTop : 0
            }, 800);
        });
        jQuery(window).bind("scroll", $backToTopFun);
        $backToTopFun();
    });
})();

