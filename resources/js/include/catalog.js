export function lockfixed (){
    (function(e,p){e.extend({lockfixed:function(a,b){b&&b.offset?(b.offset.bottom=parseInt(b.offset.bottom,10),b.offset.top=parseInt(b.offset.top,10)):b.offset={bottom:100,top:0};if((a=e(a))&&a.offset()){var n=a.css("position"),c=parseInt(a.css("marginTop"),10),l=a.css("top"),h=a.offset().top,f=!1;if(!0===b.forcemargin||navigator.userAgent.match(/\bMSIE (4|5|6)\./)||navigator.userAgent.match(/\bOS ([0-9])_/)||navigator.userAgent.match(/\bAndroid ([0-9])\./i))f=!0;a.wrap("<div style='height:"+a.outerHeight()+
            "px;display:"+a.css("display")+"'></div>");e(window).bind("DOMContentLoaded load scroll resize orientationchange lockfixed:pageupdate",a,function(k){if(!f||!document.activeElement||"INPUT"!==document.activeElement.nodeName){var d=0,d=a.outerHeight();k=a.outerWidth();var m=e(document).height()-b.offset.bottom,g=e(window).scrollTop();"fixed"===a.css("position")||f||(h=a.offset().top,l=a.css("top"));g>=h-(c?c:0)-b.offset.top?(d=m<g+d+c+b.offset.top?g+d+c+b.offset.top-m:0,f?a.css({marginTop:parseInt(g-
                h-d,10)+2*b.offset.top+"px"}):a.css({position:"fixed",top:b.offset.top-d+"px",width:k+"px"})):a.css({position:n,top:l,width:k+"px",marginTop:(c&&!f?c:0)+"px"})}})}}})})(jQuery);

        $.lockfixed(".lockfixed__js",{offset: {top: 37, bottom: 2}});

}
