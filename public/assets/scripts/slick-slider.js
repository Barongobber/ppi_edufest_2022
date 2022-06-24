$(document).ready(function () {
    $(".carousel-slider").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        arrows: false,
        centerMode: false,
        infinite: true,
    });
    $(".sponsor-slider").slick({
        slidesToShow: 3,
        slidesToScroll: 3,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: false,
        centerMode: true,
        infinite: true,
    });
});

function partnerSlider() {
    $(".partner-slider").slick({
        slidesToShow: 5,
        slidesToScroll: 3,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: false,
        centerMode: true,
        infinite: true,
        responsive: [
            {
                breakpoint: 1604,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    arrows: false,
                },
            },
            {
                breakpoint: 1444,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                },
            },
            {
                breakpoint: 1214,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                },
            },
            {
                breakpoint: 1138,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                    centerMode: true,
                },
            },
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    centerMode: true,
                },
            },
            {
                breakpoint: 736,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    centerMode: false,
                },
            },
            {
                breakpoint: 637,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    centerMode: false,
                },
            },
            {
                breakpoint: 517,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    centerMode: true,
                    arrows: false,
                    autoplay: true,
                    autoplaySpeed: 2000,
                },
            },
        ],
    });
}

function agendaSlider() {
    $(".responsive-slider").slick({
        dots: false,
        infinite: true,
        speed: 400,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        prevArrow:
            "<a class='custom-arrow slick-prev pull-left'><span class='material-icons-round'>arrow_back_ios</span></i></a>",
        nextArrow:
            "<a class='custom-arrow slick-next pull-right'><span class='material-icons-round'>arrow_forward_ios</span></a>",
        responsive: [
            {
                breakpoint: 1604,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                },
            },
            {
                breakpoint: 1444,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                },
            },
            {
                breakpoint: 1214,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                },
            },
            {
                breakpoint: 1138,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                },
            },
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    centerMode: true,
                },
            },
            {
                breakpoint: 736,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    centerMode: false,
                },
            },
            {
                breakpoint: 637,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    centerMode: false,
                },
            },
            {
                breakpoint: 517,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    centerMode: false,
                    arrows: false,
                    autoplay: true,
                    autoplaySpeed: 2000,
                },
            },
        ],
    });
}

function articleSlider() {
    $(".responsive-slider").slick({
        dots: false,
        infinite: true,
        speed: 400,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        prevArrow:
            "<a class='custom-arrow slick-prev pull-left'><span class='material-icons-round'>arrow_back_ios</span></i></a>",
        nextArrow:
            "<a class='custom-arrow slick-next pull-right'><span class='material-icons-round'>arrow_forward_ios</span></a>",
        responsive: [
            {
                breakpoint: 1604,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                },
            },
            {
                breakpoint: 1444,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                },
            },
            {
                breakpoint: 1308,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                },
            },
            {
                breakpoint: 1010,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                },
            },
            {
                breakpoint: 928,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    centerMode: true,
                },
            },
            {
                breakpoint: 736,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    centerMode: false,
                },
            },
            {
                breakpoint: 637,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    centerMode: false,
                },
            },
            {
                breakpoint: 517,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    centerMode: false,
                    arrows: false,
                    autoplay: true,
                    autoplaySpeed: 2000,
                },
            },
        ],
    });
}
