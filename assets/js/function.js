var playerTriton = null;
var isValidGeneral;
var isMobile = {
    Android: function() { return navigator.userAgent.match(/Android/i); },
    BlackBerry: function() { return navigator.userAgent.match(/BlackBerry/i); },
    iOS: function() { return navigator.userAgent.match(/iPhone|iPad|iPod/i); },
    Opera: function() { return navigator.userAgent.match(/Opera Mini/i); },
    Windows: function() { return navigator.userAgent.match(/IEMobile/i); },
    any: function() { return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows()); }
}

utilerias = {
    events: function() {
        try {
            $(".btn-up").click(function() {
                $("html, body").animate({ scrollTop: 0 }, 500);
            });

            if ($(document).find(".btn-jwplayer").length > 0) {
                $(".btn-jwplayer").click(function() {
                    utilerias.jwplayer(this);
                });
            }

            if ($(document).find(".btn-action-toggle").length > 0) {
                $(".btn-action-toggle").click(function() {
                    try {
                        var bar = $(this).attr("data-bar");
                        var icon = $(this).attr("data-icon");
                        var id = $(this).attr("id");

                        if (bar == undefined || icon == undefined || id == undefined) {
                            throw "";
                        }

                        $("html, body").animate({ scrollTop: 0 }, 500);

                        if (!$(bar).is(":visible")) {
                            var prev = $(".btn-action-toggle").attr("data-prev");
                            var _id = $(".btn-action-toggle").attr("data-id-prev");

                            if (prev != undefined) {
                                $(_id).find("i").removeClass("fa-times").addClass(prev);
                            }

                            $(".btn-action-toggle").attr("data-prev", icon);
                            $(".btn-action-toggle").attr("data-id-prev", ("#" + id));

                            $(".c-hiddens").hide(0);
                            $(bar).show(0);

                            $(this).find("i").css({
                                '-moz-transform': 'rotate(360deg)',
                                '-webkit-transform': ' rotate(360deg)',
                                'transform': 'rotate(360deg)',
                                '-moz-transition': ' all 0.5s ease',
                                '-webkit-transition': ' all 0.5s ease',
                                '-o-transition': ' all 0.5s ease',
                                'transition': ' all 0.5s ease'
                            }).removeClass(icon).addClass("fa-times");
                        } else {
                            $(".c-hiddens").hide(0);
                            $(this).find("i").css({
                                '-moz-transform': 'rotate(0deg)',
                                '-webkit-transform': ' rotate(0deg)',
                                'transform': 'rotate(0deg)',
                                '-moz-transition': ' all 0.5s ease',
                                '-webkit-transition': ' all 0.5s ease',
                                '-o-transition': ' all 0.5s ease',
                                'transition': ' all 0.5s ease'
                            }).removeClass("fa-times").addClass(icon);
                        }
                    } catch (err) {
                        console.log("Error js utilerias.events:");
                        console.log(err);
                    }
                });
            }

            if ($(document).find(".c-especial").length > 0) {
                $(".c-especial .c-posts > div").mouseover(function() {
                    $(".c-especial .c-posts > div").removeClass("bgs-102");
                    $(".c-especial .c-posts > div").find("h2").removeClass("col-102 col-103").addClass("col-102");
                    $(".c-especial .c-posts > div").find("h3").removeClass("col-101 col-104").addClass("col-101");

                    $(this).addClass("bgs-102");
                    $(this).find("h2").addClass("col-103");
                    $(this).find("h3").addClass("col-104");

                    var image = $(this).attr("data-image");

                    if (image != undefined) {
                        if (image.trim())
                            $(".c-especial img").attr("src", image);
                    }
                })
            }
        } catch (err) {
            console.log("Error js utilerias.events:");
            console.log(err);
        }
    },
    lazy: function() {
        try {
            $win = $(window);

            setTimeout(function() {
                var img = $(document).find(".lazy:visible");
                var t = img.length;

                for (var j = 0; j < t; j++) {
                    var element_top = $(img[j]).offset().top;
                    var element_bottom = element_top + $(img[j]).outerHeight();

                    var view_top = $(window).scrollTop();
                    var view_bottom = view_top + $(window).height();

                    if ((element_bottom > view_top) && (element_top < view_bottom)) {
                        var src = $(img[j]).attr("data-src");

                        if (src == undefined)
                            continue;

                        if (src.trim() == "")
                            continue;

                        $(img[j]).attr("src", src);
                        $(img[j]).removeAttr("data-src");
                        $(img[j]).parents("picture").find(".display-overlay").remove();
                    }
                }

                $win.scroll(function() {
                    try {
                        var elements = $(document).find(".lazy:visible");
                        var total = elements.length;

                        if (total == 0)
                            throw "No hay datos";

                        for (var i = 0; i < total; i++) {
                            var src = $(elements[i]).attr("data-src");

                            if (src == undefined)
                                continue;

                            if (src.trim() == "")
                                continue;

                            $(elements[i]).attr("src", src);
                            $(elements[i]).removeAttr("data-src");
                            $(elements[i]).parents("picture").find(".display-overlay").remove();
                        }
                    } catch (err) {

                    }
                });
            }, 200);
        } catch (err) {
            console.log("Error js utilerias.lazy:");
            console.log(err);
        }
    },
    swipers: function() {
        try {
            /* Home Top */
            // if ($(document).find("#sc-home-top").length > 0) {
            //     var sc_home_top = new Swiper("#sc-home-top", {
            //         slidesPerView: 1,
            //         spaceBetween: 15,
            //         autoHeight: true,
            //         navigation: {
            //             nextEl: '.sw-arrow.next',
            //             prevEl: '.sw-arrow.prev',
            //         }
            //     });

            //     sc_home_top.on('slideChangeTransitionEnd', function() {
            //         try {
            //             $("#sc-home-top li").removeClass("active");
            //             $(`#sc-home-top #sw-nav-top li:nth-child(${sc_home_top.activeIndex + 1})`).addClass("active");
            //         } catch (err) {
            //             console.log("Error js utilerias.swipers:");
            //             console.log(err);
            //         }
            //     });

            //     $("#sw-nav-top .nav-link").off();
            //     $("#sw-nav-top .nav-link").click(function() {
            //         try {
            //             var index = $(this).parent().index();
            //             sc_home_top.slideTo((index), 800);
            //         } catch (err) {
            //             console.log("Error js utilerias.swipers:");
            //             console.log(err);
            //         }
            //     });
            // }

            /* Home Enfoque */
            if ($(document).find("#sc-home-enfoque").length > 0) {
                var sc_home_enfoque = new Swiper("#sc-home-enfoque", {
                    slidesPerView: 1,
                    spaceBetween: 15,
                    autoHeight: true,
                    pagination: {
                        el: '#sp-enfoque',
                        clickable: true
                    }
                });
            }

            /* Home Desglose */
            // if ($(document).find("#sc-home-desglose").length > 0) {
            //     var sc_home_desglose = new Swiper("#sc-home-desglose", {
            //         slidesPerView: 1,
            //         spaceBetween: 15,
            //         autoHeight: true,
            //         navigation: {
            //             nextEl: '.sw-arrow.next',
            //             prevEl: '.sw-arrow.prev',
            //         }
            //     });

            //     sc_home_desglose.on('slideChangeTransitionEnd', function() {
            //         try {
            //             $("#sc-home-desglose li").removeClass("active");
            //             $(`#sc-home-desglose #sw-nav-top li:nth-child(${sc_home_desglose.activeIndex + 1})`).addClass("active");
            //         } catch (err) {
            //             console.log("Error js utilerias.swipers:");
            //             console.log(err);
            //         }
            //     });

            //     $("#sw-nav-desglose .nav-link").off();
            //     $("#sw-nav-desglose .nav-link").click(function() {
            //         try {
            //             var index = $(this).parent().index();
            //             sc_home_desglose.slideTo((index), 800);
            //         } catch (err) {
            //             console.log("Error js utilerias.swipers:");
            //             console.log(err);
            //         }
            //     });
            // }


            /* Archive Fan */
            if ($(document).find("#sc-archive-fan").length > 0) {
                var sc_archive_fan = new Swiper("#sc-archive-fan", {
                    slidesPerView: 1,
                    spaceBetween: 15,
                    autoHeight: true
                });

                sc_archive_fan.on('slideChangeTransitionEnd', function() {
                    try {
                        $("#sc-archive-fan #sw-nav-fan .nav-link").removeClass("active");
                        $(("#sc-archive-fan #sw-nav-fan li:nth-child(" + (sc_archive_fan.activeIndex + 1) + ") a")).addClass("active");
                    } catch (err) {
                        console.log("Error js utilerias.swipers:");
                        console.log(err);
                    }
                });

                $("#sw-nav-fan .nav-link").off();
                $("#sw-nav-fan .nav-link").click(function() {
                    try {
                        var index = $(this).parent().index();
                        sc_archive_fan.slideTo((index), 800);
                    } catch (err) {
                        console.log("Error js utilerias.swipers:");
                        console.log(err);
                    }
                });
            }


            if ($(document).find(".sw-single-media").length > 0) {
                var sw101a = new Swiper('.sw-single-media', {
                    navigation: {
                        nextEl: '.sb-media-next',
                        prevEl: '.sb-media-prev',
                    },
                    pagination: {
                        el: '.sp-single-media',
                        type: 'fraction',
                    },
                    allowTouchMove: false,
                    noSwiping: true,
                    autoHeight: true
                });

                var videos = $(".sw-single-media").attr("data-videos");
                if (videos != undefined) {
                    videos = JSON.parse(decodeURIComponent(videos));

                    if ($.isArray(videos)) {
                        if (videos.length > 0) {
                            for (var i = 0 in videos) {
                                var ID = "jwp_single_" + videos[i].id;

                                jwplayer((ID.toString())).setup({
                                    "playlist": "https://cdn.jwplayer.com/v2/media/" + videos[i].id
                                });
                            }

                            $('.btn-prev, .btn-next').click(function() {
                                try {
                                    var elementJWP = $(".sw-single-media .element_jwp");
                                    var total = elementJWP.length;

                                    if (total == 0)
                                        throw "No hay videos";

                                    for (var i = 0; i < total; i++)
                                        jwplayer(i).pause();

                                } catch (err) {
                                    console.log("Error utilerias.swipers:");
                                    console.log(err);
                                }
                            });

                            sw101a.updateSize();
                        }
                    }
                }
            }

            /* Single galery */
            if ($(document).find("#sc-post-gallery").length > 0) {
                var sc_post_gallery = new Swiper("#sc-post-gallery", {
                    slidesPerView: 1,
                    spaceBetween: 15,
                    autoHeight: true,
                    navigation: {
                        nextEl: '.swb-nav-next',
                        prevEl: '.swb-nav-prev',
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        type: 'progressbar',
                    }
                });
            }
        } catch (err) {
            console.log("Error js utilerias.swipers:");
            console.log(err);
        }
    },
    view_picture: function(el) {
        try {
            var caption = $(el).attr("data-caption");
            var image = $(el).attr("data-src");

            if (caption == undefined || image == undefined)
                throw "No hay datos 100";

            if (image == "")
                throw "No hay datos 101";

            $('#mPicture').modal('show');
            $('#mPicture').on('shown.bs.modal', function(e) {
                $("#mPicture img").attr("src", image);
                $("#mPicture img").attr("alt", caption);
                $("#mPicture img").attr("title", caption);
                $("#mPicture h3").html(caption);
            });

            $('#mPicture').on('hide.bs.modal', function(e) {
                $("#mPicture h3").html("");
                $("#mPicture img").attr("src", "");
            });
        } catch (err) {
            console.log("Error utilerias.view_picture:");
            console.log(err);
        }
    },
    fixed: function() {
        try {
            $win = $(window);
            var h = $("header").height() + 100;

            $win.scroll(function() {
                if ($win.scrollTop() > h) {
                    $(".bar-fixed").show(0);
                }
                if ($win.scrollTop() < h) {
                    $(".bar-fixed").hide(0);
                }
            });
        } catch (err) {
            console.log("Error js utilerias.fixed:");
            console.log(err);
        }
    },
    menu_mobile: function(e) {
        try {
            var bar = $(e).attr("data-bar");

            if (bar == undefined)
                throw "No hay datos";

            if ($(bar).is(":visible")) {
                $(bar).hide();
            } else {
                $(bar).show();
            }
        } catch (err) {
            console.log("Error js utilerias.menu_mobile:");
            console.log(err);
        }
    },
    jwplayer: function(e) {
        try {
            var media = $(e).attr("data-json");
            var title = $(e).attr("data-title");

            if (media == undefined)
                throw "No hay datos de reproducción";

            if (!media.trim())
                throw "No hay datos de reproducción";

            media = media.split(",");

            if (media.length == 0)
                throw "No hay datos de reproducción";

            $("#m-jwplayer h2").html(title);

            var players = "";
            for (var i = 0 in media) {
                var media_id = media[i];

                if (!media_id.trim())
                    continue;

                var id = "_jwp_" + media_id;

                players = '<div class="swiper-slide position-relative"><div id="' + id + '"></div></div>';

                $("#m-jwplayer #sc-jwp .swiper-wrapper").append(players);

                jwplayer((id.toString())).setup({
                    "playlist": "https://cdn.jwplayer.com/v2/media/" + media_id,
                    ga: {
                        label: "mediaid"
                    },
                    autostart: false,
                    tracks: [{
                        file: "https://cdn.jwplayer.com/strips/" + media_id + "-120.vtt",
                        kind: "thumbnails"
                    }]
                });
            }

            var sc_jwp = null;

            $('#m-jwplayer').modal('show');
            $('#m-jwplayer').on('shown.bs.modal', function(e) {
                try {
                    /* Footer - Modal media */
                    sc_jwp = new Swiper('#sc-jwp', {
                        slidesPerView: 1,
                        spaceBetween: 15,
                        pagination: {
                            el: '#sp-jwp',
                            type: 'fraction',
                        },
                        navigation: {
                            nextEl: '#swb-jwp-next',
                            prevEl: '#swb-jwp-prev'
                        },
                        allowTouchMove: false,
                        noSwiping: true,
                        autoHeight: true
                    });

                    $('#swb-jwp-prev, #swb-jwp-next').click(function() {
                        try {
                            var slides = $("#m-jwplayer .swiper-slide");
                            var total = slides.length;

                            if (total == 0)
                                throw "No hay videos";

                            for (var i = 0; i < total; i++)
                                jwplayer(i).pause();
                        } catch (err) {
                            console.log("Error utilerias.jwplayer:");
                            console.log(err);
                        }
                    });
                } catch (err) {
                    console.log("Error utilerias.jwplayer:");
                    console.log(err);
                }
            });

            $('#m-jwplayer').on('hide.bs.modal', function(e) {
                if (sc_jwp != null)
                    sc_jwp.destroy(true, true);

                $("#m-jwplayer #sc-jwp .swiper-wrapper").html("");
                $("#m-jwplayer h2").html("");
            });
        } catch (err) {
            console.log("Error utilerias.jwplayer:");
            console.log(err);
        }
    },
    player: function() {
        try {
            if ($(document).find("#indigo-play").length == 0)
                throw "";

            var jwp = $('div[id^="_jwp_"]');
            if (jwp.length > 0) {
                var media_id = $(jwp[0]).attr("data-json");
                var id = "_jwp_" + media_id;

                if (media_id != undefined) {
                    if (media_id.trim()) {
                        jwplayer((id.toString())).setup({
                            "playlist": "https://cdn.jwplayer.com/v2/media/" + media_id,
                            ga: {
                                label: "mediaid"
                            },
                            autostart: false,
                            tracks: [{
                                file: "https://cdn.jwplayer.com/strips/" + media_id + "-120.vtt",
                                kind: "thumbnails"
                            }]
                        });
                    }
                }
            }

            if ($(document).find(".item-playlist-jwp").length > 0) {
                $(".item-playlist-jwp").click(function() {
                    try {
                        var json = $(this).attr("data-json");

                        if (json == undefined)
                            throw "";

                        if (!json.trim())
                            throw "";

                        json = JSON.parse(decodeURIComponent(json));

                        var media_id = json.guid;
                        var id = "_jwp_" + media_id;
                        var description = typeof json.description != "string" ? "-" : json.description;

                        if ($(("#" + id)).length > 0)
                            throw "";

                        $("#info-player h3").html(json.title);
                        $("#info-player .c-summary").html(description);
                        $("#indigo-play .c-media-100").html("");

                        var player = document.createElement('div');
                        player.setAttribute("id", id);

                        $("#indigo-play .c-media-100").html(player);

                        jwplayer((id.toString())).setup({
                            "playlist": "https://cdn.jwplayer.com/v2/media/" + media_id,
                            ga: {
                                label: "mediaid"
                            },
                            autostart: false,
                            tracks: [{
                                file: "https://cdn.jwplayer.com/strips/" + media_id + "-120.vtt",
                                kind: "thumbnails"
                            }]
                        });
                    } catch (err) {
                        console.log("Error js utilerias.player:");
                        console.log(err);
                    }
                });
            }

            var playlist = document.getElementById("c-video-playlist");
            $(".btn-playlist").click(function() {
                console.log("Vientos");
                try {
                    playlist.classList.toggle("expanded");
                    playlist.classList.contains("expanded");
                } catch (err) {
                    console.log("Error js utilerias.player:");
                    console.log(err);
                }
            });
        } catch (err) {
            console.log("Error js utilerias.player:");
            console.log(err);
        }
    },

    share: function(el) {
        try {
            var link = $(el).attr("data-link");
            var title = $(el).attr("data-title");
            var image = $(el).attr("data-img");

            if (link == undefined || title == undefined)
                throw "No hay nada que compartir";

            if (!link.trim() || !title.trim())
                throw "No hay nada que compartir";

            image = image != undefined ? (image.trim() ? image.trim() : "") : "";
            title = decodeURIComponent(title);

            $(".item-social").attr("data-link", link.trim());
            $(".item-social").attr("data-title", title.trim());
            $(".item-social").attr("data-img", image);

            $("#m-share h2").html(title);

            $(".item-social").off();
            $(".item-social").click(function() {
                utilerias.share_social(this);
            });

            $("#m-share").modal("show");
        } catch (err) {
            console.log("Error js utilerias.share:");
            console.log(err);
        }
    },
    share_social: function(el) {
        try {
            var services = $(el).attr("alt").trim();
            var link = $(el).attr("data-link");
            var title = $(el).attr("data-title");
            var image = $(el).attr("data-img");

            title = decodeURIComponent(title);

            switch (services) {
                case 'facebook':
                    // app id 403696616489109
                    /*var share 		= encodeURIComponent(link)+"&t="+encodeURIComponent(title)+"&picture="+image;
                    share 			= "https://www.facebook.com/sharer/sharer.php?u="+encodeURIComponent(share);*/
                    var share = "https://www.facebook.com/dialog/share?app_id=349644108939477&display=popup&href=" + encodeURIComponent(link);
                    window.open(share, 'Share Facebook', 'width=626,height=436');
                    break;
                case 'twitter':
                    if (isMobile.any()) {
                        var mensaje = encodeURIComponent(title) + " - " + encodeURIComponent(link);
                        var twitter = "twitter://post?message=" + mensaje;
                        window.location.href = twitter;
                    } else {
                        var mensaje = encodeURIComponent(link) + "&text=" + encodeURIComponent(title);
                        var twitter = "http://twitter.com/intent/tweet?url=" + mensaje;
                        window.open(twitter, 'Share Twitter', 'width=626,height=436');
                    }
                    break;
                case 'whatsapp':
                    if (isMobile.any()) {
                        var mensaje = encodeURIComponent(title) + " - " + encodeURIComponent(link);
                        var whatsapp = "whatsapp://send?text=" + mensaje;
                        window.location = whatsapp;
                    } else {
                        var mensaje = encodeURIComponent(title) + " / " + encodeURIComponent(link);
                        var whatsapp = "https://api.whatsapp.com/send?text=" + mensaje;
                        window.open(whatsapp, '_blank');
                    }
                    break;
                case 'sms':
                    if (isMobile.any()) {
                        // android 	"sms:/* phone number here */?body=/* body text here */"
                        // ios 		"sms:/* phone number here */;body=/* body text here */"
                        if (isMobile.Android()) {
                            window.location = 'sms:' + phone_number + '?body=' + title + " / " + encodeURIComponent(link);;
                        } else if (isMobile.iOS()) {
                            window.location = 'sms:' + phone_number + ';body=' + title + " / " + encodeURIComponent(link);;
                        }
                    }
                    break;
                case 'line':
                    if (isMobile.any()) {
                        var mensaje = encodeURIComponent(title) + " - " + encodeURIComponent(link);
                        var line = "line://msg/text/?" + mensaje;
                        window.location = line;
                    } else {
                        var line = 'https://lineit.line.me/share/ui?url=' + encodeURIComponent(link) + '&text=' + encodeURIComponent(title);
                        window.open(line, 'Share Line', 'width=626,height=436');
                    }
                    break;
                case 'googleplus':
                    var google = 'https://plus.google.com/share?url=' + encodeURIComponent(link) + '&text=' + encodeURIComponent(title);
                    window.open(google, 'Share Google+', 'width=626,height=436');
                    break;
                case 'blogger':
                    var blogger = 'https://www.blogger.com/blog-this.g?u=' + encodeURIComponent(link) + '&n=' + encodeURIComponent(title);
                    window.open(blogger, 'Share Blogger', 'width=626,height=436');
                    break;
                case 'skype':
                    var skype = 'https://web.skype.com/share?url=' + encodeURIComponent(link) + '&text=' + encodeURIComponent(title);
                    window.open(skype, 'Share Skype', 'width=626,height=436');
                    break;
                case 'telegram':
                    if (isMobile.any()) {
                        var mensaje = encodeURIComponent(title) + " - " + encodeURIComponent(link);
                        var telegram = "tg://msg?text=" + mensaje;
                        window.location = telegram;
                    } else {
                        var telegram = 'https://t.me/share/url?url=' + encodeURIComponent(link) + '&text=' + encodeURIComponent(title);
                        window.open(telegram, 'Share Telegram', 'width=626,height=436');
                    }
                    break;
                case 'tumblr':
                    var tumblr = 'https://www.tumblr.com/widgets/share/tool?canonicalUrl=' + encodeURIComponent(link) + '&title=' + encodeURIComponent(title) + '&caption=&tags=';
                    window.open(tumblr, 'Share tumblr', 'width=626,height=436');
                    break;
                case 'linkedin':
                    var linkedin = 'https://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(link) + '&title=' + encodeURIComponent(title) + '&summary=&source=CapitalMéxico';
                    window.open(linkedin, 'Share linkedin', 'width=626,height=436');
                    break;
                case 'flipboard':
                    var flipboard = 'https://share.flipboard.com/bookmarklet/popout?v=2&title=' + encodeURIComponent(title) + '&url=' + encodeURIComponent(link);
                    window.open(flipboard, 'Share flipboard', 'width=626,height=436');
                    break;
                case 'gmail':
                    var contacto = $("#formShare #correo").val().trim();
                    var gmail = 'https://mail.google.com/mail/?view=cm&to=' + contacto + '&su=' + encodeURIComponent(title) + '&body=' + encodeURIComponent(title) + "/ " + encodeURIComponent(link) + '&bcc=&cc=';
                    window.open(gmail, 'Share flipboard', 'width=626,height=436');
                    break;
                case 'pinterest':
                    var pinterest = 'http://pinterest.com/pin/create/button/?url=' + encodeURIComponent(link);
                    window.open(pinterest, 'Share pinterest', 'width=626,height=436');
                    break;
                case 'reddit':
                    var reddit = 'https://reddit.com/submit?url=' + encodeURIComponent(link) + '&title=' + encodeURIComponent(title);
                    window.open(reddit, 'Share reddit', 'width=626,height=436');
                    break;
                case 'vk':
                    var vk = 'http://vk.com/share.php?url=' + encodeURIComponent(link) + '&title=' + encodeURIComponent(title) + '&comment=';
                    window.open(vk, 'Share vk', 'width=626,height=436');
                    break;
                case 'yahoo':
                    var contacto = $("#formShare #correo").val().trim();
                    var yahoo = 'http://compose.mail.yahoo.com/?to=' + contacto + '&subject=' + encodeURIComponent(title) + '&body=' + encodeURIComponent(title) + "/ " + encodeURIComponent(link);
                    window.open(yahoo, 'Share yahoo', 'width=626,height=436');
                    break;
                default:
                    break;
            }
        } catch (err) {
            console.log("Error utilerias.share_social:");
            console.log(err);
        }
    },
    tweet: function(el) {
        try {
            var title = $(el).attr("data-title");
            var image = $(el).attr("data-img");

            if (title == undefined)
                throw "No hay nada que compartir";

            if (!title.trim())
                throw "No hay nada que compartir";

            title = decodeURIComponent(title);
            title = $(title)[0].innerText;

            if (isMobile.any()) {
                var mensaje = encodeURIComponent(title);
                var twitter = "twitter://post?message=" + mensaje;
                window.location.href = twitter;
            } else {
                var twitter = "http://twitter.com/intent/tweet?text=" + encodeURIComponent(title);
                window.open(twitter, 'Share Twitter', 'width=626,height=436');
            }
        } catch (err) {
            console.log("Error js utilerias.tweet:");
            console.log(err);
        }
    },


    mobileCheck: function() {
        var check = false;
        try {
            (function(a) { if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) check = true })(navigator.userAgent || navigator.vendor || window.opera);
        } catch (err) {
            check = false;
            console.log("Error utilerias.mobileCheck: " + err);
        }
        return check;
    },
    validations: function() {
        try {
            if ($(document).find("#formContacto").length > 0) {
                $('#formContacto').bootstrapValidator({
                    message: 'Datos no validos',
                    excluded: ':disabled, :hidden, :not(:visible)',
                    fields: {
                        nombre: {
                            validators: {
                                notEmpty: {
                                    message: 'Coloca tu nombre completo'
                                },
                                stringLength: {
                                    min: 3,
                                    max: 50,
                                    message: 'El nombre debe tener mínimo 3 y máximo 50 caracteres de longitud'
                                }
                            }
                        },
                        correo: {
                            validators: {
                                notEmpty: {
                                    message: 'Coloca un correo válido'
                                },
                                emailAddress: {
                                    message: 'Coloca un correo válido'
                                },
                                stringLength: {
                                    min: 7,
                                    max: 50,
                                    message: 'El correo debe tener mínimo 7 y máximo 50 caracteres de longitud'
                                }
                            }
                        },
                        numero: {
                            validators: {
                                stringLength: {
                                    min: 10,
                                    max: 10,
                                    message: 'El número de contacto debe tener 10 digitos'
                                },
                                integer: {
                                    message: 'Número de contacto invalido'
                                }
                            }
                        },
                        compania: {
                            validators: {
                                stringLength: {
                                    min: 2,
                                    max: 50,
                                    message: 'El nombre de la compañía debe tener mínimo 2 y máximo 50 caracteres de longitud'
                                }
                            }
                        },
                        asunto: {
                            validators: {
                                notEmpty: {
                                    message: 'Asunto a tratar'
                                },
                                stringLength: {
                                    min: 3,
                                    max: 50,
                                    message: 'El asunto debe tener mínimo 3 y máximo 50 caracteres de longitud'
                                }
                            }
                        },
                        mensaje: {
                            validators: {
                                notEmpty: {
                                    message: '¿En qué podemos ayudarte?'
                                },
                                stringLength: {
                                    min: 10,
                                    max: 500,
                                    message: 'El mensaje debe tener mínimo 10 y máximo 500 caracteres de longitud'
                                }
                            }
                        }
                    }
                }).on('status.field.bv', function(e, data) {
                    try {
                        utilerias.responseError(e, data);
                    } catch (err) {
                        console.log("ERROR JS utilerias.validations.formContacto.status: " + err);
                    }
                }).on('success.form.bv', function(e) {
                    try {
                        // e.preventDefault();

                        // if($(e.target)[0].id == "formContacto")
                        // 	utilerias.sendMessage();
                    } catch (err) {
                        console.log("ERROR JS utilerias.validations.formContacto.success: " + err);
                    }
                }).on('error.form.bv', function(e) {

                });
            }

            if ($(document).find("#formShare").length > 0) {
                $('#formShare').bootstrapValidator({
                    message: 'Datos no validos',
                    excluded: ':disabled, :hidden, :not(:visible)',
                    fields: {
                        contacto: {
                            validators: {
                                notEmpty: {
                                    message: 'Coloca el contacto'
                                },
                                stringLength: {
                                    min: 3,
                                    max: 50,
                                    message: 'El contacto debe tener mínimo 3 y máximo 50 caracteres de longitud'
                                }
                            }
                        },
                        correo: {
                            validators: {
                                notEmpty: {
                                    message: 'Coloca un correo válido'
                                },
                                emailAddress: {
                                    message: 'Coloca un correo válido'
                                },
                                stringLength: {
                                    min: 7,
                                    max: 50,
                                    message: 'El correo debe tener mínimo 7 y máximo 50 caracteres de longitud'
                                }
                            }
                        }
                    }
                }).on('status.field.bv', function(e, data) {
                    try {
                        utilerias.responseError(e, data);
                    } catch (err) {
                        console.log("ERROR JS utilerias.validations.formContacto.status: " + err);
                    }
                }).on('success.form.bv', function(e) {
                    try {
                        // e.preventDefault();

                        // if($(e.target)[0].id == "formContacto")
                        // 	utilerias.sendMessage();
                    } catch (err) {
                        console.log("ERROR JS utilerias.validations.formContacto.success: " + err);
                    }
                }).on('error.form.bv', function(e) {
                    isValidGeneral = false;
                });
            }
        } catch (err) {
            console.log("Error utilerias.validations:");
            console.log(err);
        }
    },
    responseError: function(e, data) {
        try {
            var $form = $(e.target),
                validator = data.bv,
                $collapsePane = data.element.parents('.collapse'),
                colId = $collapsePane.attr('id');

            if (colId) {
                var $anchor = $('a[href="#' + colId + '"][data-toggle="collapse"]');
                var $icon = $anchor.find('i');

                // Add custom class to panel containing the field
                if (data.status == validator.STATUS_INVALID) {
                    $anchor.addClass('bv-col-error');
                    $icon.removeClass(faIcon.valid).addClass(faIcon.invalid);
                } else if (data.status == validator.STATUS_VALID) {
                    var isValidCol = validator.isValidContainer($collapsePane);
                    if (isValidCol) {
                        $anchor.removeClass('bv-col-error');
                    } else {
                        $anchor.addClass('bv-col-error');
                    }
                    $icon.removeClass(faIcon.valid + " " + faIcon.invalid).addClass(isValidCol ? faIcon.valid : faIcon.invalid);
                }
            }
        } catch (err) {
            console.log("ERROR JS utilerias.responseError: ");
            console.log(err);
        }
    },
    sendMessage: function() {
        try {
            var form = $("#formContacto").serializeArray();

            $.ajax({
                type: "POST",
                url: ajaxurl,
                data: { "action": "contact-us1" },
                dataType: 'html',
                processData: false,
                beforeSend: function() {},
                success: function(response) {
                    try {
                        console.log(response);
                        //   		response 	= JSON.parse(response);
                        // if(response.success == 2)
                        //  	throw response.message;

                        // var db 		= response.db;
                        // utilerias.setView(db);
                    } catch (err) {
                        console.log("Error JS utilerias.sendMessage.ajax.success:");
                        console.log(err);
                    }
                },
                error(xhr, status, error) {
                    console.log("Error JS utilerias.sendMessage.ajax.error: ");
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                    console.log(xhr.responseText);
                }
            });


        } catch (err) {
            console.log("ERROR JS utilerias.sendMessage: ");
            console.log(err);
        }
    },

    smart: function() {
        try {
            var config = {
                "dataSmart": "70494/535121",
                "siteID": 70494,
                "pageID": 535121,
                "formats": [
                    { id: 47944 }, // Formato : Indigo Rich Media 900 x 60 900x60
                    { id: 58547 }, // Formato : Indigo 1200 x 90 - Header Billboard 1200x90
                    { id: 59176 }, // Formato : Indigo 1200 x 90 - Header Billboard 1200x90
                ]
            }

            sas.setup({ domain: 'https://www5.smartadserver.com', async: true, renderMode: 1 });

            sas.cmd.push(function() {
                var formats = config.formats;
                for (var i = 0 in formats) {
                    var formatID = formats[i].id;

                    if (($(document).find(("#sas_" + formatID)).length) == 0)
                        continue;

                    sas.call("std", {
                        siteId: (parseInt(config.siteID)),
                        pageId: (parseInt(config.pageID)),
                        formatId: (parseInt(formatID)),
                        target: ''
                    });
                }
            });

        } catch (err) {
            console.log("Error utilerias.smart:");
            console.log(err);
        }
    },
    page_jwp: function() {
        try {
            if ($(document).find("#page-videos-jwp").length == 0)
                throw "";

            var items = $(".c-media-100");
            var total = items.length;

            for (var i = 0; i < total; i++) {
                var jwp = $(items[i]).find('div[id^="_jwp_"]');

                if (jwp.length == 0)
                    continue;

                var media_id = $(jwp[0]).attr("data-json");

                if (media_id == undefined)
                    continue;

                var id = "_jwp_" + media_id;

                jwplayer((id.toString())).setup({
                    "playlist": "https://cdn.jwplayer.com/v2/media/" + media_id,
                    ga: {
                        label: "mediaid"
                    },
                    autostart: false,
                    tracks: [{
                        file: "https://cdn.jwplayer.com/strips/" + media_id + "-120.vtt",
                        kind: "thumbnails"
                    }]
                });
                $(items[i]).find(".display-overlay").remove();
            }
        } catch (err) {
            console.log("Error js utilerias.page_jwp:");
            console.log(err);
        }
    }
}


window.addEventListener('load', (event) => {
    try {
        $(document).ready(function() {
            utilerias.events();
            utilerias.swipers();
            utilerias.lazy();
            utilerias.fixed();
            utilerias.player();
            utilerias.page_jwp();
        });
    } catch (err) {
        console.log("Error js document.load:");
        console.log(err);
    }
});