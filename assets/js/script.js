(function ($) {
    "use strict";
    var $wrapper = $(".main-wrapper");
    var $pageWrapper = $(".page-wrapper");
    var $slimScrolls = $(".slimscroll");
    feather.replace();
    var Sidemenu = function () {
        this.$menuItem = $("#sidebar-menu a");
    };
    function init() {
        var $this = Sidemenu;
        $("#sidebar-menu a").on("click", function (e) {
            if ($(this).parent().hasClass("submenu")) {
                e.preventDefault();
            }
            if (!$(this).hasClass("subdrop")) {
                $("ul", $(this).parents("ul:first")).slideUp(350);
                $("a", $(this).parents("ul:first")).removeClass("subdrop");
                $(this).next("ul").slideDown(350);
                $(this).addClass("subdrop");
            } else if ($(this).hasClass("subdrop")) {
                $(this).removeClass("subdrop");
                $(this).next("ul").slideUp(350);
            }
        });
        $("#sidebar-menu ul li.submenu a.active")
            .parents("li:last")
            .children("a:first")
            .addClass("active")
            .trigger("click");
    }
    init();
    $("body").append('<div class="sidebar-overlay"></div>');
    $(document).on("click", "#mobile_btn", function () {
        $wrapper.toggleClass("slide-nav");
        $(".sidebar-overlay").toggleClass("opened");
        $("html").addClass("menu-opened");
        return false;
    });
    $(".sidebar-overlay").on("click", function () {
        $wrapper.removeClass("slide-nav");
        $(".sidebar-overlay").removeClass("opened");
        $("html").removeClass("menu-opened");
    });
    $("#mobile_btn_close").click(function () {
        $("html").removeClass("menu-opened");
        $(".main-wrapper").removeClass("slide-nav");
        $(".sidebar-overlay").removeClass("opened");
    });
    if ($(".page-wrapper").length > 0) {
        var height = $(window).height();
        $(".page-wrapper").css("min-height", height);
    }
    $(window).resize(function () {
        if ($(".page-wrapper").length > 0) {
            var height = $(window).height();
            $(".page-wrapper").css("min-height", height);
        }
    });
    if ($(".select").length > 0) {
        $(".select").select2({ minimumResultsForSearch: -1, width: "100%" });
    }
    if ($(".datetimepicker").length > 0) {
        $(".datetimepicker").datetimepicker({
            format: "DD-MM-YYYY",
            icons: {
                up: "fas fa-angle-up",
                down: "fas fa-angle-down",
                next: "fas fa-angle-right",
                previous: "fas fa-angle-left",
            },
        });
    }
    if ($('[data-toggle="tooltip"]').length > 0) {
        $('[data-toggle="tooltip"]').tooltip();
    }
    if ($(".datatable").length > 0) {
        $(".datatable").DataTable({ bFilter: false });
    }
    if ($slimScrolls.length > 0) {
        $slimScrolls.slimScroll({
            height: "auto",
            width: "100%",
            position: "right",
            size: "7px",
            color: "#ccc",
            allowPageScroll: false,
            wheelStep: 10,
            touchScrollStep: 100,
        });
        var wHeight = $(window).height() - 60;
        $slimScrolls.height(wHeight);
        $(".sidebar .slimScrollDiv").height(wHeight);
        $(window).resize(function () {
            var rHeight = $(window).height() - 60;
            $slimScrolls.height(rHeight);
            $(".sidebar .slimScrollDiv").height(rHeight);
        });
    }
    if ($(".toggle-password").length > 0) {
        $(document).on("click", ".toggle-password", function () {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $(".pass-input");
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    }
    $(document).on("click", "#check_all", function () {
        $(".checkmail").click();
        return false;
    });
    if ($(".checkmail").length > 0) {
        $(".checkmail").each(function () {
            $(this).on("click", function () {
                if ($(this).closest("tr").hasClass("checked")) {
                    $(this).closest("tr").removeClass("checked");
                } else {
                    $(this).closest("tr").addClass("checked");
                }
            });
        });
    }
    $(document).on("click", ".mail-important", function () {
        $(this).find("i.fa").toggleClass("fa-star").toggleClass("fa-star-o");
    });
    $(document).on("click", "#toggle_btn", function () {
        if ($("body").hasClass("mini-sidebar")) {
            $("body").removeClass("mini-sidebar");
            $(".subdrop + ul").slideDown();
        } else {
            $("body").addClass("mini-sidebar");
            $(".subdrop + ul").slideUp();
        }
        setTimeout(function () {}, 300);
        return false;
    });
    $(document).on("mouseover", function (e) {
        e.stopPropagation();
        if (
            $("body").hasClass("mini-sidebar") &&
            $("#toggle_btn").is(":visible")
        ) {
            var targ = $(e.target).closest(".sidebar").length;
            if (targ) {
                $("body").addClass("expand-menu");
                $(".subdrop + ul").slideDown();
            } else {
                $("body").removeClass("expand-menu");
                $(".subdrop + ul").slideUp();
            }
            return false;
        }
    });
    $(document).on("click", "#filter_search", function () {
        $("#filter_inputs").slideToggle("slow");
    });
    var chatAppTarget = $(".chat-window");
    (function () {
        if ($(window).width() > 991) chatAppTarget.removeClass("chat-slide");
        $(document).on(
            "click",
            ".chat-window .chat-users-list a.media",
            function () {
                if ($(window).width() <= 991) {
                    chatAppTarget.addClass("chat-slide");
                }
                return false;
            }
        );
        $(document).on("click", "#back_user_list", function () {
            if ($(window).width() <= 991) {
                chatAppTarget.removeClass("chat-slide");
            }
            return false;
        });
    })();
})(jQuery);
