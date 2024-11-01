var webpaceCloseNoticeTimeout = false;

function webpaceMapsNoticeOptimize(){
    if(jQuery(".webpace_map_map_notice_wrapper").length && jQuery(".g_map:not(.hide)").length){
        var bigLeft = jQuery(".g_map:not(.hide)").offset().left;
        var computed = getComputedStyle(jQuery(".g_map:not(.hide)")[0]);
        var width = parseInt(computed.width) - parseInt(jQuery(".webpace_map_map_notice_wrapper").width()) - 50;
        var left = jQuery("#g_maps").offset().left;
        jQuery(".webpace_map_map_notice_wrapper").css( "left", bigLeft-left+width );
        window.requestAnimationFrame(webpaceMapsNoticeOptimize);
    }

}

function webpaceMapsShowNotice(text){
    jQuery(".webpace_map_map_notice").text(text);
    jQuery(".webpace_map_map_notice_wrapper").show(0);
    setTimeout(function(){
        if(webpaceCloseNoticeTimeout){
            clearTimeout(webpaceCloseNoticeTimeout);
        }
        webpaceCloseNoticeTimeout = setTimeout(function(){
            webpaceMapsCloseNotice();
        },10000);

        webpaceMapsNoticeOptimize();
    },500);

}

function webpaceMapsCloseNotice(){
    jQuery(".webpace_map_map_notice_wrapper").fadeOut();
}

jQuery(document).ready(function(){
    jQuery(window).on("resize",webpaceMapsNoticeOptimize);
    jQuery(".webpace_map_map_notice_wrapper").on("click", webpaceMapsCloseNotice);
});