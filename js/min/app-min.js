! function ($, a, i) {
    $(a).ready(function () {
        $(".quote-slider").flexslider({
            controlNav: !0,
            directionNav: !1,
            animation: "fade"
        }), $(".menu-toggle").click(function () {
            $(".mobile-navigation").slideToggle()
        }), $(".mobile-navigation").append($(".main-navigation .menu").clone()), $("[data-bg-image]").each(function () {
            var a = $(this).data("bg-image");
            $(this).css("background-image", "url(" + a + ")")
        }), $("[data-bg-color]").each(function () {
            var a = $(this).data("bg-color");
            $(this).css("background-color", a)
        });
        var a = $(".filterable-items");
        a.imagesLoaded(function () {
            a.isotope({
                filter: "*",
                layoutMode: "fitRows",
                animationOptions: {
                    duration: 750,
                    easing: "linear",
                    queue: !1
                }
            })
        }), $(".filterable-nav a").click(function (i) {
            i.preventDefault(), $(".filterable-nav .current").removeClass("current"), $(this).addClass("current");
            var e = $(this).attr("data-filter");
            return a.isotope({
                filter: e,
                animationOptions: {
                    duration: 750,
                    easing: "linear",
                    queue: !1
                }
            }), !1
        }), $(".mobile-filter").change(function () {
            var i = $(this).val();
            return a.isotope({
                filter: i,
                animationOptions: {
                    duration: 750,
                    easing: "linear",
                    queue: !1
                }
            }), !1
        }), $(".map").length && $(".map").gmap3({
            map: {
                options: {
                    maxZoom: 14
                }
            },
            marker: {
                address: "40 Sibley St, Detroit"
            }
        }, "autofit")
    }), $(i).load(function () {})
}(jQuery, document, window);