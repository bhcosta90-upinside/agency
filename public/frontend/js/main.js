!function(a){"use strict";var t=a(window);if(t.on("load",function(){a("#preloader").fadeOut("slow",function(){a(this).remove()})}),a.fn.classyNav&&(a("#originalNav").classyNav(),a("#footerNav").classyNav()),a.fn.simpleTicker&&a.simpleTicker(a("#breakingNewsTicker"),{speed:1e3,delay:3500,easing:"swing",effectType:"roll"}),a('[data-toggle="tooltip"]').tooltip(),a.fn.owlCarousel){var e=a(".hero-slides");e.owlCarousel({items:2,margin:30,loop:!0,center:!0,autoplay:!0,nav:!0,navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],autoplayTimeout:5e3,smartSpeed:2e3}),e.on("translate.owl.carousel",function(){a("[data-animation]").each(function(){var t=a(this).data("animation");a(this).removeClass("animated "+t).css("opacity","0")})}),e.on("translated.owl.carousel",function(){e.find(".owl-item.active").find("[data-animation]").each(function(){var t=a(this).data("animation");a(this).addClass("animated "+t).css("opacity","1")})}),a("[data-delay]").each(function(){var t=a(this).data("delay");a(this).css("animation-delay",t)}),a("[data-duration]").each(function(){var t=a(this).data("duration");a(this).css("animation-duration",t)}),a(".instagram-slides").owlCarousel({items:7,margin:0,loop:!0,autoplay:!0,autoplayHoverPause:!0,autoplayTimeout:2e3,smartSpeed:2e3,responsive:{0:{items:2},480:{items:3},576:{items:4},992:{items:5},1500:{items:7}}})}a.fn.sticky&&a("#stickyNav").sticky({topSpacing:0}),a.fn.countdown&&a("#clock").countdown("2020/10/10",function(t){a(this).html(t.strftime("<div>%D <span>Days</span></div> <div>%H <span>Hours</span></div> <div>%M <span>Minutes</span></div> <div>%S <span>Seconds</span></div>"))}),a.fn.counterUp&&a(".counter").counterUp({delay:10,time:2e3}),a.fn.scrollUp&&a.scrollUp({scrollSpeed:1e3,easingType:"easeInOutQuart",scrollText:"Top"}),a("a[href='#']").on("click",function(a){a.preventDefault()}),t.width()>767&&(new WOW).init()}(jQuery),$(function(){$(".newsletterForm, #frmCommentary, #frmContact").submit(function(a){a.preventDefault();const t=$(this);$.ajax({url:$(this).prop("action"),method:$(this).prop("method"),data:$(this).serializeArray(),dataType:"json"}).success(function(a){$("#subsModal .close").trigger("click"),alert(a.msg),t[0].reset()}).error(function(a,t,e){"validation.unique"==a.responseJSON.errors.email[0]&&alert("Este e-mail já existe em nossa base de dados")})})});
