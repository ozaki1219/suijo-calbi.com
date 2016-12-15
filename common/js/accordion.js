// JavaScript Document

jQuery(function($) {
var images = $("img.over");
for(var i=0; i < images.size(); i++) {
    if(images.eq(i).attr("src").match("_no.")) {
        $("img.over").eq(i).hover(function() {
            $(this).attr('src', $(this).attr("src").replace("_no.", "_on."));
        }, function() {
            $(this).attr('src', $(this).attr("src").replace("_on.", "_no."));
        });
    }
}
});





(function ($) {
        $.boxLink = function (options) {
                var o = $.extend({
                        targetBox: 'boxLink',//targetBox
                        hover: 'hover'//addClass
                }, options);
                $('.'+o.targetBox).hover(function () {
                        $(this).addClass(o.hover);
                }, function () {
                        $(this).removeClass(o.hover);
                });
                $('.'+o.targetBox).click(function () {
                        var boxUrl = $(this).find('a').attr('href');
                        if ($(this).find('a').attr('target') == '_blank') {
                                window.open(boxUrl);
                        } else window.location = boxUrl;
                        return false;
                });
                $(window).unload(function () {
                        $(this).removeClass(o.hover);
                });
        };
        $(function () {
                $.boxLink();
        });
})(jQuery);



//繧ｹ繝槭�繝｡繝九Η繝ｼ

$(function(){
$(".burger").on("click", function() {
$(this).next().slideToggle();
});
});