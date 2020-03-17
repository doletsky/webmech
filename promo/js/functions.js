function convertHex(e, a) {
    return e = e.replace("#", ""), r = parseInt(e.substring(0, 2), 16), g = parseInt(e.substring(2, 4), 16), b = parseInt(e.substring(4, 6), 16), result = "rgba(" + r + ", " + g + ", " + b + ", " + a + ")", result
}
!function (e) {
    "use strict";
    function a() {
        e("*[data-pattern-overlay-darkness-opacity]").each(function () {
            var a = e(this).data("pattern-overlay-darkness-opacity");
            e(this).css("background-color", convertHex("#000000", a))
        }), e("*[data-pattern-overlay-background-image]").each(function () {
            "none" == e(this).data("pattern-overlay-background-image") ? e(this).css("background-image", "none") : "yes" == e(this).data("pattern-overlay-background-image") && e(this).css("background-image")
        }), e("*[data-remove-pattern-overlay]").each(function () {
            "yes" == e(this).data("remove-pattern-overlay") && e(this).css("background", "none")
        }), e("*[data-bg-color]").each(function () {
            var a = e(this).data("bg-color");
            e(this).css("background-color", a)
        }), e("*[data-bg-color-opacity]").each(function () {
            var a = e(this).data("bg-color-opacity"),
                t = e(this).css("background-color").replace("rgb", "rgba").replace(")", ", " + a + ")");
            e(this).css("background-color", t)
        }), e("*[data-bg-img]").each(function () {
            var a = e(this).data("bg-img");
            e(this).css("background-image", "url('" + a + "')")
        }), e("*[data-parallax-bg-img]").each(function () {
            var a = e(this).data("parallax-bg-img");
            e(this).css("background-image", "url('./images/" + a + "')")
        })
    }

    function t() {
        jRespond([{label: "smallest", enter: 0, exit: 479}, {
            label: "handheld",
            enter: 480,
            exit: 767
        }, {label: "tablet", enter: 768, exit: 991}, {label: "laptop", enter: 992, exit: 1199}, {
            label: "desktop",
            enter: 1200,
            exit: 1e4
        }]).addFunc([{
            breakpoint: "desktop", enter: function () {
                W.addClass("device-lg")
            }, exit: function () {
                W.removeClass("device-lg")
            }
        }, {
            breakpoint: "laptop", enter: function () {
                W.addClass("device-md")
            }, exit: function () {
                W.removeClass("device-md")
            }
        }, {
            breakpoint: "tablet", enter: function () {
                W.addClass("device-sm")
            }, exit: function () {
                W.removeClass("device-sm")
            }
        }, {
            breakpoint: "handheld", enter: function () {
                W.addClass("device-xs")
            }, exit: function () {
                W.removeClass("device-xs")
            }
        }, {
            breakpoint: "smallest", enter: function () {
                W.addClass("device-xxs")
            }, exit: function () {
                W.removeClass("device-xxs")
            }
        }])
    }

    function n() {
        e("[class*='anim-moveleft']").each(function (a) {
            var t = e(this), n = t.data("opacity-value"), i = t.data("move-distance") ? t.data("move-distance") : 30;
            t.css({x: -i}), !t.hasClass("anim-moveleft") && t.is(".anim-moveleft-seq") || (a = 0);
            new Waypoint({
                element: t, handler: function (e) {

                    setTimeout(function () {
                        setTimeout(function () {
                            if (t.length && "down" === e && 0 == t.css("opacity")) {
                                var a = t.data("move-duration") ? t.data("move-duration") : 800,
                                    i = t.data("move-easing") ? t.data("move-easing") : "easeOutExpo",
                                    o = t.data("move-delay") ? t.data("move-delay") : 0;
                                t.transition({opacity: n, x: 0, easing: i, duration: a, delay: o}, function () {
                                    t.css("transform", "none")
                                })
                            }
                        }, 120 * a)
                    }, 0)
                }, offset: "90%"
            })
        }), e("[class*='anim-moveright']").each(function (a) {
            var t = e(this), n = t.data("opacity-value"), i = t.data("move-distance") ? t.data("move-distance") : 30;
            t.css({x: i}), !t.hasClass("anim-moveright") && t.is(".anim-moveright-seq") || (a = 0);
            new Waypoint({
                element: t, handler: function (e) {
                    setTimeout(function () {
                        setTimeout(function () {
                            if (t.length && "down" === e && 0 == t.css("opacity")) {
                                var a = t.data("move-duration") ? t.data("move-duration") : 800,
                                    i = t.data("move-easing") ? t.data("move-easing") : "easeOutExpo",
                                    o = t.data("move-delay") ? t.data("move-delay") : 0;
                                t.transition({opacity: n, x: 0, easing: i, duration: a, delay: o}, function () {
                                    t.css("transform", "none")
                                })
                            }
                        }, 120 * a)
                    }, 0)
                }, offset: "90%"
            })
        }), e("[class*='anim-movetop']").each(function (a) {
            var t = e(this), n = t.data("opacity-value"), i = t.data("move-distance") ? t.data("move-distance") : 30;
            t.css({y: -i}), !t.hasClass("anim-movetop") && t.is(".anim-movetop-seq") || (a = 0);
            new Waypoint({
                element: t, handler: function (e) {
                    setTimeout(function () {
                        setTimeout(function () {
                            if (t.length && "down" === e && 0 == t.css("opacity")) {
                                var a = t.data("move-duration") ? t.data("move-duration") : 800,
                                    i = t.data("move-easing") ? t.data("move-easing") : "easeOutExpo",
                                    o = t.data("move-delay") ? t.data("move-delay") : 0;
                                t.transition({opacity: n, y: 0, easing: i, duration: a, delay: o}, function () {
                                    t.css("transform", "none")
                                })
                            }
                        }, 120 * a)
                    }, 0)
                }, offset: "90%"
            })
        }), e("[class*='anim-movebottom']").each(function (a) {
            var t = e(this), n = t.data("opacity-value"), i = t.data("move-distance") ? t.data("move-distance") : 30;
            t.css({y: i}), !t.hasClass("anim-movebottom") && t.is(".anim-movebottom-seq") || (a = 0);
            new Waypoint({
                element: t, handler: function (e) {
                    setTimeout(function () {
                        setTimeout(function () {
                            if (t.length && "down" === e && 0 == t.css("opacity")) {
                                var a = t.data("move-duration") ? t.data("move-duration") : 800,
                                    i = t.data("move-easing") ? t.data("move-easing") : "easeOutExpo",
                                    o = t.data("move-delay") ? t.data("move-delay") : 0;
                                t.transition({opacity: n, y: 0, easing: i, duration: a, delay: o}, function () {
                                    t.css("transform", "none")
                                })
                            }
                        }, 120 * a)
                    }, 0)
                }, offset: "90%"
            })
        }), e("[class*='anim-fadein']").each(function (a) {
            var t = e(this), n = t.data("opacity-value");
            !t.hasClass("anim-fadein") && t.is(".anim-fadein-seq") || (a = 0);
            new Waypoint({
                element: t, handler: function (e) {
                    setTimeout(function () {
                        setTimeout(function () {
                            if (t.length && "down" === e && 0 == t.css("opacity")) {
                                var a = t.data("fade-duration") ? t.data("fade-duration") : 800,
                                    i = t.data("fade-easing") ? t.data("fade-easing") : "easeOutExpo",
                                    o = t.data("fade-delay") ? t.data("fade-delay") : 0;
                                t.transition({opacity: n, easing: i, duration: a, delay: o}, function () {
                                    t.css("transform", "none")
                                })
                            }
                        }, 120 * a)
                    }, 0)
                }, offset: "90%"
            })
        }), e("[class*='anim-scaleup']").each(function (a) {
            var t = e(this), n = t.data("opacity-value"), i = t.data("scale-ratio") ? t.data("scale-ratio") : 1.2;
            t.css({scale: i}), !t.hasClass("anim-scaleup") && t.is(".anim-scaleup-seq") || (a = 0);
            new Waypoint({
                element: t, handler: function (e) {
                    setTimeout(function () {
                        setTimeout(function () {
                            if (t.length && "down" === e && 0 == t.css("opacity")) {
                                var a = t.data("scale-duration") ? t.data("scale-duration") : 800,
                                    i = t.data("scale-easing") ? t.data("scale-easing") : "easeOutExpo",
                                    o = t.data("scale-delay") ? t.data("scale-delay") : 0;
                                t.transition({opacity: n, scale: 1, easing: i, duration: a, delay: o}, function () {
                                    t.css("transform", "none")
                                })
                            }
                        }, 120 * a)
                    }, 0)
                }, offset: "90%"
            })
        }), e("[class*='anim-scaledown']").each(function (a) {
            var t = e(this), n = t.data("opacity-value"), i = t.data("scale-ratio") ? t.data("scale-ratio") : .8;
            t.css({scale: i}), !t.hasClass("anim-scaledown") && t.is(".anim-scaledown-seq") || (a = 0);
            new Waypoint({
                element: t, handler: function (e) {
                    setTimeout(function () {
                        setTimeout(function () {
                            if (t.length && "down" === e && 0 == t.css("opacity")) {
                                var a = t.data("scale-duration") ? t.data("scale-duration") : 800,
                                    i = t.data("scale-easing") ? t.data("scale-easing") : "easeOutExpo",
                                    o = t.data("scale-delay") ? t.data("scale-delay") : 0;
                                t.transition({opacity: n, scale: 1, easing: i, duration: a, delay: o}, function () {
                                    t.css("transform", "none")
                                })
                            }
                        }, 120 * a)
                    }, 0)
                }, offset: "90%"
            })
        }), e("[class*='anim-rotate-x']").each(function (a) {
            var t = e(this), n = t.data("opacity-value"), i = t.data("rotate-deg") ? t.data("rotate-deg") : "90deg",
                o = t.data("rotate-perspective") ? t.data("rotate-perspective") : "600px";
            t.css({perspective: o, rotateX: i}), !t.hasClass("anim-rotate-x") && t.is(".anim-rotate-x-seq") || (a = 0);
            new Waypoint({
                element: t, handler: function (e) {
                    setTimeout(function () {
                        setTimeout(function () {
                            if (t.length && "down" === e && 0 == t.css("opacity")) {
                                var a = t.data("rotate-duration") ? t.data("rotate-duration") : 800,
                                    i = t.data("rotate-easing") ? t.data("rotate-easing") : "easeOutExpo",
                                    o = t.data("rotate-delay") ? t.data("rotate-delay") : 0;
                                t.transition({opacity: n, rotateX: 0, easing: i, duration: a, delay: o}, function () {
                                    t.css("transform", "none")
                                })
                            }
                        }, 120 * a)
                    }, 0)
                }, offset: "90%"
            })
        }), e("[class*='anim-rotate-y']").each(function (a) {
            var t = e(this), n = t.data("opacity-value"), i = t.data("rotate-deg") ? t.data("rotate-deg") : "45deg",
                o = t.data("rotate-perspective") ? t.data("rotate-perspective") : "600px";
            t.css({perspective: o, rotateY: i}), !t.hasClass("anim-rotate-y") && t.is(".anim-rotate-y-seq") || (a = 0);
            new Waypoint({
                element: t, handler: function (e) {
                    setTimeout(function () {
                        setTimeout(function () {
                            if (t.length && "down" === e && 0 == t.css("opacity")) {
                                var a = t.data("rotate-duration") ? t.data("rotate-duration") : 800,
                                    i = t.data("rotate-easing") ? t.data("rotate-easing") : "easeOutExpo",
                                    o = t.data("rotate-delay") ? t.data("rotate-delay") : 0;
                                t.transition({opacity: n, rotateY: 0, easing: i, duration: a, delay: o}, function () {
                                    t.css("transform", "none")
                                })
                            }
                        }, 120 * a)
                    }, 0)
                }, offset: "90%"
            })
        })
    }

    function i() {
        e(".fullscreen, #home-header, #home-banner").css("height", e(window).height()), e("#banner.fullscreen").css("height", e(window).height())
    }

    function o() {
        e(".img-bg").each(function () {
            var a = e(this), t = a.find("img").attr("src");
            a.parent(".section-image").length ? a.css("background-image", "url('" + t + "')") : (a.prepend("<div class='bg-element'></div>"), a.find(".bg-element").css("background-image", "url('" + t + "')")), a.find("img").css({
                opacity: 0,
                visibility: "hidden"
            })
        })
    }

    function s() {
        e(function () {
            (W.hasClass("device-lg") || W.hasClass("device-md") || W.hasClass("device-sm")) && e.stellar({
                horizontalScrolling: !1,
                verticalOffset: 0,
                responsive: !0
            })
        })
    }

    function l() {
        // e(".counter-stats").each(function () {
        //     var a = e(this), t = a.text(),
        //         n = t.toString().replace(/(\d)/g, "<span class='digit'><span class='digit-value'>$1</span></span>");
        //     a.html(n + "<div class='main'>" + t + "</span>"), a.find(".digit").each(function () {
        //         var a = e(this), t = a.find(".digit-value").text();
        //         a.append("<div class='counter-animator' data-value='" + t + "'><ul><li>0</li><li>1</li><li>2</li><li>3</li><li>4</li><li>5</li><li>6</li><li>7</li><li>8</li><li>9</li></ul></div>")
        //     })
        // }),
            e(".counter-stats").each(function (a) {
            var t = e(this);
            new Waypoint({
                element: t, handler: function (n) {
                    setTimeout(function () {
                        setTimeout(function () {
                            t.find(".counter-animator").each(function () {
                                var a = e(this), t = 10 * a.data("value");
                                a.find("ul").css({
                                    transform: "translateY(-" + t + "%)",
                                    "-webkit-transform": "translateY(-" + t + "%)",
                                    "-moz-transform": "translateY(-" + t + "%)",
                                    "-ms-transform": "translateY(-" + t + "%)",
                                    "-o-transform": "translateY(-" + t + "%)"
                                })
                            })
                        }, 0 * a)
                    }, 0)
                }, offset: "100%"
            })
        })
    }

    function c() {
        e("#full-container").fitVids()
    }

    function r() {
        e(".video-background").each(function () {
            e(this).YTPlayer({
                mute: !1,
                autoPlay: !0,
                opacity: 1,
                containment: ".video-background",
                showControls: !1,
                startAt: 0,
                addRaster: !0,
                showYTLogo: !1,
                stopMovieOnBlur: !1
            })
        })
    }

    function d() {
        e(".lightbox-iframe").magnificPopup({
            type: "iframe",
            mainClass: "mfp-fade",
            removalDelay: 160,
            preloader: !1,
            fixedContentPos: !1
        })
    }

    function u() {
        e(".lightbox-img").magnificPopup({
            type: "image",
            gallery: {enabled: !1},
            mainClass: "mfp-fade",
            removalDelay: 160,
            preloader: !1,
            fixedContentPos: !1
        })
    }

    function m() {
        e(".lightbox-gallery").magnificPopup({
            type: "image",
            gallery: {enabled: !0},
            mainClass: "mfp-fade",
            removalDelay: 160,
            preloader: !1,
            fixedContentPos: !1
        })
    }

    function f() {
        e(window).scrollTop();
        e(window).scrollTop() > 800 ? e(".scroll-top-icon").addClass("show") : e(".scroll-top-icon").removeClass("show")
    }

    function h() {
        var a = e(document).height() - e(window).height(), t = e(document).scrollTop() / (a / 100);
        e("#scroll-progress").width(t + "%"), e(".scroll-percent").text(t.toFixed(0) + "%")
    }

    function p() {
        if (e("#main-menu").clone().appendTo("#mobile-menu").removeClass().addClass("mobile-menu"), e(".mobile-menu").length) {
            var a = document.querySelector("#mobile-menu");
        }
        e(".mobile-menu").superfish({
            popUpSelector: "ul, .megamenu",
            cssArrows: !0,
            delay: 300,
            speed: 150,
            speedOut: 150,
            animation: {opacity: "show", height: "show"},
            animationOut: {opacity: "hide", height: "hide"}
        }), e(".mobile-menu-btn").on("click", function (a) {
            a.preventDefault(), e(this).toggleClass("is-active"), e("#mobile-menu-wrap").stop().slideToggle(250)
        })
    }

    function v() {
        e(".main-menu").superfish({
            popUpSelector: "ul",
            cssArrows: !0,
            delay: 300,
            speed: 100,
            speedOut: 100,
            animation: {opacity: "show"},
            animationOut: {opacity: "hide"}
        })
    }

    function g() {
        var a = e("#header").hasClass("style-1") ? 80 : 0;
        e.scrollIt({
            upKey: !1,
            downKey: !1,
            scrollTime: 0,
            activeClass: "current",
            onPageChange: null,
            topOffset: -a
        }), e("#main-menu li a, .scroll-to").on("click", function (t) {
            t.preventDefault();
            var n = e(this);
            e("html, body").stop().animate({scrollTop: e(n.attr("href")).offset().top - a}, 1200, "easeInOutExpo"), (W.hasClass("device-md") || W.hasClass("device-sm") || W.hasClass("device-xs") || W.hasClass("device-xxs")) && (e("#mobile-menu-wrap, .mobile-menu-sticky").slideUp(250), e(".mobile-menu-btn").removeClass("is-active"))
        })
    }

    function y() {
        e("#header").offset().top;
        var a = e(window).scrollTop(), t = e("#header");
        parseInt(e("#header-sticky").height(), 10), parseInt(e("#header").height(), 10), parseInt(e(".banner-parallax").height(), 10), parseInt(e("#page-title").height(), 10);
        t.hasClass("style-1") && (a > t.offset().top ? (t.addClass("sticky"), M.attr("src", U), e(".header-btn").removeClass("hover-white").addClass("hover-dark")) : (t.removeClass("sticky"), e("#header").hasClass("text-white") && (M.attr("src", j), e(".header-btn").removeClass("hover-dark").addClass("hover-white")), b()))
    }

    function b() {
        e("#header").hasClass("sticky") || (e(".owl-item.active").find(".banner-center-box").hasClass("text-white") ? (e("#header").addClass("text-white"), M.attr("src", j), e(".header-btn").removeClass("hover-dark").addClass("hover-white")) : (e("#header").removeClass("text-white"), e(".header-btn").removeClass("hover-white").addClass("hover-dark"), M.attr("src", U))), 1 == !e(".banner-slider").parents(".banner-parallax").length && (e(".banner-center-box").hasClass("text-white") ? (e("#header").addClass("text-white"), M.attr("src", j), e(".header-btn").removeClass("hover-dark").addClass("hover-white")) : (e("#header").removeClass("text-white"), M.attr("src", U), e(".header-btn").removeClass("hover-white").addClass("hover-dark")))
    }

// function w(){var a=e(".banner-parallax"),t=a.children("img:first-child").attr("src");a.prepend("<div class='bg-element'></div>"),a.find("> .bg-element").css("background-image","url('"+t+"')").attr("data-stellar-background-ratio",.2)}
    function C() {
        var a = e(".banner-slider > .owl-carousel");
        a.owlCarousel({
            items: 1,
            rtl: Y,
            autoplay: !1,
            autoplaySpeed: 800,
            autoplayTimeout: 4e3,
            dragEndSpeed: 600,
            autoplayHoverPause: !0,
            loop: !0,
            slideBy: 1,
            margin: 10,
            stagePadding: 0,
            nav: !0,
            dots: !0,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            responsive: {0: {}, 480: {}, 768: {}},
            autoHeight: !1,
            autoWidth: !1,
            animateOut: "owl-fadeUp-out",
            animateIn: "owl-fadeUp-in",
            navRewind: !0,
            center: !1,
            dotsEach: 1,
            dotData: !1,
            lazyLoad: !1,
            smartSpeed: 600,
            fluidSpeed: 5e3,
            navSpeed: 600,
            dotsSpeed: 600
        }), a.on("translated.owl.carousel", function (e) {
            var t = a.find(".owl-item.active .banner-center-box");
            0 != parseInt(t.children(".bs-elem").css("top"), 10) && setTimeout(function () {
                setTimeout(function () {
                    t.children("h1.bs-elem").css("top", 80).animate({opacity: 1}, {
                        duration: 500,
                        queue: !1
                    }).animate({top: 0}, {duration: 500, easing: "easeOutExpo"})
                }, 0), setTimeout(function () {
                    t.children(".description.bs-elem").css("top", 80).animate({opacity: 1}, {
                        duration: 500,
                        queue: !1
                    }).animate({top: 0}, {duration: 500, easing: "easeOutExpo"})
                }, 50)
            }, 150), b()
        }), a.on("drag.owl.carousel", function (e) {
            a.find(".owl-item:not( .active )").find(".banner-center-box > .bs-elem").animate({opacity: 0}, 150).css("top", 1)
        }), a.on("changed.owl.carousel", function (e) {
            a.find(".banner-center-box > .bs-elem").animate({opacity: 0}, 150).css("top", 1), setTimeout(function () {
                b()
            }, 150)
        }), a.on("resized.owl.carousel", function (e) {
            a.find(".banner-center-box > .bs-elem").animate({opacity: 1}, 150)
        })
    }

    function x() {
        e(".slider-img-bg .owl-item > li").each(function () {
            var a = e(this), t = a.find(".slide").children("img").attr("src");
            a.prepend("<div class='bg-element'></div>"), a.find("> .bg-element").css("background-image", "url('" + t + "')")
        })
    }

    function k() {
        e(".slider-img-bg").each(function () {
            var a = e(this).closest("div").height();
            e(".banner-parallax").children(".banner-slider").length > 0 && e(".banner-parallax, .banner-parallax .row > [class*='col-']").height(e(".banner-slider").height()), e(this).find(".owl-item > li .slide").children("img").css({
                display: "none",
                height: a,
                opacity: 0
            })
        })
    }

    function T() {
        e(".testmonials-slider > .owl-carousel").owlCarousel({
            rtl: Y,
            autoplay: !1,
            autoplaySpeed: 500,
            autoplayTimeout: 5e3,
            dragEndSpeed: 400,
            autoplayHoverPause: !0,
            loop: !0,
            slideBy: 1,
            margin: 30,
            stagePadding: 0,
            nav: 1,
            dots: !0,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            responsive: {0: {items: 1}, 480: {items: 1}, 768: {items: 1}, 1200: {items: 1}},
            autoHeight: !1,
            autoWidth: !1,
            navRewind: !0,
            center: !1,
            dotsEach: 1,
            dotData: !1,
            lazyLoad: !1,
            smartSpeed: 600,
            fluidSpeed: 5e3,
            navSpeed: 400,
            dotsSpeed: 400
        })
    }

    function E() {
        e(".clients-slider > .owl-carousel").owlCarousel({
            items: 6,
            rtl: Y,
            autoplay: !1,
            autoplaySpeed: 500,
            autoplayTimeout: 3e3,
            dragEndSpeed: 400,
            autoplayHoverPause: !0,
            loop: !0,
            slideBy: 1,
            margin: 30,
            stagePadding: 0,
            nav: !1,
            dots: !1,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            responsive: {0: {items: 2}, 480: {items: 3}, 768: {items: 4}, 992: {items: 5}, 1200: {items: 6}},
            autoHeight: !1,
            autoWidth: !1,
            navRewind: !0,
            center: !1,
            dotsEach: 1,
            dotData: !1,
            lazyLoad: !1,
            smartSpeed: 600,
            fluidSpeed: 5e3,
            navSpeed: 400,
            dotsSpeed: 400
        })
    }

    function S() {
        e("#header-form-1").validate({
            rules: {
                hf1Name: {required: !0, minlength: 3},
                hf1Email: {required: !0, email: !0},
                hf1PhoneNum: {required: !0, number: !0, minlength: 12, maxlength: 12}
            }
        });
        var a = e(".hf1-notifications").data("error-msg"),
            t = a || "Please Follow Error Messages and Complete as Required";
        e("#header-form-1").on("submit", function (e) {
            e.isDefaultPrevented() ? (A(!1, '<i class="hf1-error-icon fa fa-close"></i>' + t), q()) : (e.preventDefault(), O())
        })
    }

    function O() {
        var a = e("#hf1Name").val(), t = e("#hf1Email").val(), n = e("#hf1PhoneNum").val();
        e.ajax({
            type: "POST",
            url: "./php/hf1-process.php",
            data: "hf1Name=" + a + "&hf1Email=" + t + "&hf1PhoneNum=" + n,
            success: function (e) {
                "success" == e ? P() : (q(), A(!1, e))
            }
        })
    }

    function P() {
        var a = e(".hf1-notifications").data("success-msg"), t = a || "Thank you for your submission :)";
        e("#header-form-1")[0].reset(), A(!0, '<i class="hf1-success-icon fa fa-check"></i>' + t), e(".hf1-notifications-content").addClass("sent"), e(".hf1-notifications").css("opacity", 0), e(".hf1-notifications").slideDown(300).animate({opacity: 1}, 300).delay(5e3).slideUp(400)
    }

    function q() {
        e(".hf1-notifications").css("opacity", 0), e(".hf1-notifications").slideDown(300).animate({opacity: 1}, 300), e(".hf1-notifications-content").removeClass("sent")
    }

    function A(a, t) {
        var n;
        n = "shake animated", e(".hf1-notifications").delay(300).addClass(n).one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend", function () {
            e(this).removeClass("shake bounce animated")
        }), e(".hf1-notifications").children(".hf1-notifications-content").html(t)
    }

    e(document).on("ready", function () {
        t(), a(), i(), o(), c(), r(), u(), m(), d(), h(), p(), g(), y(), C(), b(), l(), T(), E(), x(), k(), S(), f()//, v()
    }), e(window).on("resize", function () {
        k(), t(), i(), s()
    }), e(window).on("scroll", function () {
        y(), f(), h()
    }), e(window).on("load", function () {
        e(window).on("scroll", function () {
        })
    }), (e = jQuery.noConflict())(".anim-moveleft, .anim-moveleft-seq").each(function () {
        e(this)
    });
    e(window), e(this);
    var W = e("body");
    // e("[class*='anim-']").each(function () {
    //     var a = e(this);
    //     a.attr("data-opacity-value", a.css("opacity")), a.css("opacity", 0)
    // }), setTimeout(function () {
    // }, 1e3);
    for (var z = 0; z < 0; z++)e("<img>", {
        class: "dddddd",
        alt: "",
        src: "http://lorempixel.com/600/600?" + Math.random()
    }).appendTo("body");
    e("body").waitForImages({
        finished: function () {
            setTimeout(function () {
                e(".lp-content, #loading-progress .logo").css({opacity: 0}), e("#loading-progress").addClass("hide-it"), setTimeout(function () {
                    n()
                }, 1300)
            }, 0)
        }, each: function (a, t, n) {
            var i = Math.floor((a + 1) / t * 100);
            e("#lp-counter").animate({$this: i}, {
                duration: 150, easing: "", queue: !1, step: function (a) {
                    var t = Math.round(a);
                    e("#lp-counter").text(t + "%")
                }
            }), e("#lp-bar").animate({width: i + "%"}, 0)
        }, waitForAll: !0
    });
    var Y, H = e("html").css("direction");
    Y = "rtl" == H, e(".scroll-top").on("click", function (a) {
        a.preventDefault(), e("html, body").animate({scrollTop: 0}, 1200, "easeInOutExpo")
    });
    var M = e(".logo-header img"), U = M.attr("src"), j = M.data("logo-alt");
    e(".popup-btn, .popup-bg, .popup-close").on("click", function (a) {
        a.preventDefault(), e(".popup-preview").toggleClass("viewed")
    })
    //     , e(".signup-form").ajaxChimp({
    //     callback: function (a) {
    //         var t = e(".sf1-notifications");
    //         "success" === a.result ? (e(".signup-form")[0].reset(), t.children(".sf1-notifications-content").html('<i class="sf1-success-icon fa fa-check"></i>' + a.msg).addClass("sent shake animated").one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend", function () {
    //             e(this).removeClass("shake bounce animated")
    //         }), t.css("opacity", 0), t.slideDown(300).animate({opacity: 1}, 300).delay(8e3).slideUp(400)) : "error" === a.result && (t.children(".sf1-notifications-content").html('<i class="sf1-error-icon fa fa-close"></i>' + a.msg).removeClass("sent").addClass("bounce animated").one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend", function () {
    //                 e(this).removeClass("shake bounce animated")
    //             }), t.css("opacity", 0), t.slideDown(300).animate({opacity: 1}, 300))
    //     }, url: "http://themeforest.us12.list-manage.com/subscribe/post?u=271ee03ffa4f5e3888d79125e&amp;id=163f4114e2"
    // })
}(jQuery);