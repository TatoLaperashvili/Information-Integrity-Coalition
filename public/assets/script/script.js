$(document).ready(function () {
    setTimeout(function() {
    $('.cookies-alert').show();
  }, 5000);
    let slide = $(".campaingn-detail_slide");

    if (slide.length <= 2) {
        $(".campaingn-detail_slider").slick({
            dots: false,
            slidesToShow: 2,
            autoplay: false,
            arrows: false,
        });
    } else {
        $(".campaingn-detail_slider").slick({
            infinite: true,
            slidesToShow: 2,
            slidesToScroll: 1,
            dots: true,
            arrows: false,
            autoplay: true,
            speed: 1500,
        });
    };

    $(".partner-slider").slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        arrows: true,
        autoplay: true,
        speed: 1500,
        responsive: [
          {
            breakpoint: 1200,
            settings: {
             slidesToShow: 4,
               slidesToScroll: 1,
             },
          },
          {
            breakpoint: 769,
            settings: {
             slidesToShow: 2,
               slidesToScroll: 1,
            },
          },
        ],
    });

    $(".main-slider").slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: false,
        autoplay: false,
        speed: 1500,
        fade: true,
        cssEase: "linear",
    });

    Fancybox.bind("[data-fancybox]", {});



    $(".burger").click(function () {
        $(".burger-menu").toggleClass("burger-open"),
            $(".burger-div").toggleClass("burger-width"),
            $(".burger-icon1").toggleClass("burger-x"),
            $(".burger-icon2").toggleClass("burger-x"),
            $(".burger-icon3").toggleClass("burger-x");
    });

    $(".burgerarrov").click(function () {
        $(this).parent().toggleClass("burgeropen"),
            $(this).parent().toggleClass("rotate");
    });

    $(".updates-heandler").click(function () {
        $(".updates").toggleClass("left-100"),
            $(".icon-Vector-21").toggleClass("rotate"),
            $(".update-latest-updates").toggleClass("left-100"),
            $(".publication-detail_latest-publications_main").toggleClass("left-100");
    });

    $(".search-cont input").focus(function () {
        $(".search-cont label").addClass("label-dis");
    });

    $(".update-registration_button button").click(function () {
        $(".registration").addClass("scale-1");
    });
    $(".reg-x").click(function () {
        $(".registration").removeClass("scale-1");
    });
    $(".registration-form_background").click(function () {
        $(".registration").removeClass("scale-1");
    });



    $(window).scroll(function () {

        if ($(this).scrollTop() > 1) {
            $('header').addClass('header-shadow');
        } else {
            $('header').removeClass('header-shadow');
        };


        const $element = $('header');

        if ($(window).scrollTop() === 0) {

            $element.removeClass('header-shadow');
        }
    });

    /* 
      let mandatoryInput = $(".mandatory-input input")

     

        mandatoryInput.on('input', function() {
          let inputValue = $(this).val();
          let hasNumber = /\d/.test(inputValue);
          let hasUpperCase = /[A-Z]/.test(inputValue);
          
          if (!hasNumber && !hasUpperCase) {
            $(this).parent().addClass("mandatoryspan")
            console.log('Input contains a number and an uppercase letter.');
          }else{
            $(this).parent().removeClass("mandatoryspan")
          }
      

    }); */
    $('.lang-toggle').click(function () {
        $(this).toggleClass('lang-button')
    })

setTimeout(function() {
  $('.success-sbmission').fadeOut();
}, 3000);
  



});
