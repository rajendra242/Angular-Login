(function($) {
    $('.banner-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 500,
        arrows: true,
    });



    $('.client-slider').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        speed: 500,
        autoplay: true,
        arrows: false,
    });

    $('#testimonial-slider.three-testimonial').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        speed: 500,
        autoplay: true,
        arrows: false,
    });

    $('#testimonial-slider.two-testimonial').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        speed: 500,
        autoplay: true,
        arrows: false,
    });

    $('#testimonial-slider.one-testimonial').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 500,
        autoplay: true,
        arrows: false,
    });

    $('.post-gallery').slick({
      dots: false,
      infinite: true,
      speed: 500,
      autoplay: true,
      arrows: true,
    });

    $('[data-toggle="tooltip"]').tooltip();
    jQuery(window).load(function(){
      $("#sticky_header").sticky({ topSpacing: 0 });
    });

})(jQuery);