/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


;(function(b){b(function(){function f(){var b=[["Hanota Sagar",23.737385,78.757671,4],["\u0997\u09c1\u09b2\u09b6\u09be\u09a8, \u09a2\u09be\u0995\u09be",23.789747,90.3929248,5],["Gannan, Gansu, China",34.9862056,102.8388954,3],["\u09ae\u09c1\u09ae\u09cd\u09ac\u0987, \u09ae\u09b9\u09be\u09b0\u09be\u09b7\u09cd\u099f\u09cd\u09b0, India",19.0825223,72.7411178,2],["Mahaoya, Sri Lanka",7.8784551,81.2146297,4]];
            e=new google.maps.Map(document.getElementById("map2"),{center:new google.maps.LatLng(46.180428,6.143445),zoom:5,scrollwheel:!1,disableDefaultUI:!0,zoomControl:!0});var a;for(a=0;a<b.length;a++)new google.maps.Marker({position:new google.maps.LatLng(b[a][1],b[a][2]),map:e});767>d.width()&&e.setOptions({draggable:!1})}b("[data-bg-src]").each(function(){var a=b(this),c=a.data("bg-src");a.css("background-image","url("+c+")").addClass("bg--img").removeAttr("data-bg-src")});var d=b(window),m=b(".menu--topbar"),n=b("#primaryMenu"),c=b("#secondaryMenu"),g=m.outerHeight()+n.outerHeight(),p=g-c.outerHeight()/
2,q=function(){return d.scrollTop()>p?c.addClass("sticky"):c.removeClass("sticky")};c.length&&(q(),c.css("margin-top",-(c.outerHeight()/2)),d.on("resize",function(){c.css("margin-top",-(c.outerHeight()/2))}));var r=b(".HeaderAdjust"),a=function(){g=m.outerHeight()+n.outerHeight();p=g-c.outerHeight()/2;r.css("margin-top",g)};r.length&&(a(),d.on("resize",a));var h=b("#backToTop"),t=function(){return 1<d.scrollTop()?h.addClass("show"):h.removeClass("show")};h.on("click",function(){b("html, body").animate({scrollTop:0},
500);return!1});t();d.on("scroll",function(){c.length&&q();h.length&&t()});a=b("#subscribeForm");a.length&&a.validate({rules:{EMAIL:{required:!0,email:!0}},errorPlacement:function(a,b){return!0}});a=b("#loginForm");a.length&&a.validate({rules:{username:"required",password:"required"},errorPlacement:function(a,b){return!0}});a=b("#signupForm");a.length&&a.validate({rules:{firstName:"required",lastName:"required",signupEmail:{required:!0,email:!0},signupPassword:"required",mobileNumber:"required"},
errorPlacement:function(a,b){return!0}});var k=b("#contactForm"),w=b(".contact-form-status");k.length&&k.validate({rules:{contactName:"required",contactEmail:{required:!0,email:!0},contactSubject:"required",contactMessage:"required"},errorPlacement:function(a,b){return!0},submitHandler:function(a){a=k.serialize();b.ajax({type:"POST",url:k.attr("action"),data:a}).done(function(a){w.show().html(a).delay(1E3).fadeOut("slow")})}});a=b("#postCommentForm");a.length&&a.validate({rules:{name:"required",email:{required:!0,
email:!0},comments:"required"},errorPlacement:function(a,b){return!0}});a=b('[data-toggle="tooltip"]');a.length&&a.tooltip();var l=b(".header-slider"),u=b(".header--slider-nav");l.length&&l.owlCarousel({slideSpeed:700,singleItem:!0,autoPlay:!0,addClassActive:!0,pagination:!0,navigation:!0,navigationText:['<i class="fa fa-long-arrow-left"></i>','<i class="fa fa-long-arrow-right"></i>'],afterMove:function(){u.find("li").removeClass("active").eq(this.currentItem).addClass("active")}});u.on("click","li",
function(){l.trigger("owl.goTo",b(this).index())});var a=b(".testimonial-slider"),v=function(){b.each(this.owl.userItems,function(a){var c=jQuery(this).data("recommender-thumb"),d=jQuery(".testimonial-slider .owl-page span");b(d[a]).html('<img src="'+c+'" alt="" class="img-responsive" />')})};a.length&&(3<a.children(".testimonial-item").length&&a.addClass("overload"),a.owlCarousel({slideSpeed:700,paginationSpeed:700,singleItem:!0,autoPlay:!0,addClassActive:!0,afterInit:v,afterUpdate:v}));a=b(".brands-slider");
a.length&&a.owlCarousel({slideSpeed:700,paginationSpeed:700,items:5,autoPlay:!0,pagination:!1});a=b(".counter-number");b(a).length&&b(a).counterUp({delay:10,time:1E3});
var e;b("#map").length&&(a={lat:46.180428,lng:6.143445},
e=new google.maps.Map(document.getElementById("map"),
{center:a,zoom:16,scrollwheel:!1,disableDefaultUI:!0,zoomControl:!0}),
new google.maps.Marker({position:a,map:e,animation:google.maps.Animation.DROP,draggable:!0}),767>d.width()&&e.setOptions({draggable:!1}));b("#map2").length&&
f();992>d.width()&&b("#compare table td").each(function(){b(this).prepend('<span class="labelText">'+b(this).data("label")+"</span>")});a=b("#sidebarTwitter");a.length&&twttr.widgets.createTimeline({sourceType:"profile",screenName:a.data("user-name")},document.getElementById("sidebarTwitter"));
a=document.createElement("script");
a.async=!0;
a.src="https://embed.tawk.to/5b672a99df040c3e9e0c4e42/default";
a.charset="UTF-8";
a.setAttribute("crossorigin","*");b(a).appendTo("body");
"undefined"!==typeof 
b.cColorSwitcher&&767<d.outerWidth()&&b.cColorSwitcher({
    switcherTitle:"Main Colors:",
//    switcherColors:[
//        {bgColor:"#03a9f4",filepath:"css/colors/theme-color-1.css"},
//        {bgColor:"#6aaf08",filepath:"css/colors/theme-color-2.css"},
//        {bgColor:"#e94a41",filepath:"css/colors/theme-color-3.css"},
//        {bgColor:"#FFD25F",filepath:"css/colors/theme-color-4.css"},
//        {bgColor:"#ff5252",filepath:"css/colors/theme-color-5.css"},
//        {bgColor:"#ff9600",filepath:"css/colors/theme-color-6.css"},
//        {bgColor:"#ff5252",filepath:"css/colors/theme-color-7.css"},
//        {bgColor:"#00C853",filepath:"css/colors/theme-color-8.css"},
//        {bgColor:"#7FDCFE",filepath:"css/colors/theme-color-9.css"},
//        {bgColor:"#8CBEB2",filepath:"css/colors/theme-color-10.css"}],
    switcherTarget:b("#changeColorScheme")})});
b(window).on("load",function(){var f=b("#preloader");f.length&&f.fadeOut("slow")})})(jQuery);
