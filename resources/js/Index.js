(function ($) {
    // USE STRICT
    "use strict";
    /*[ Slick1 ]
      ===========================================================*/
    var itemSlick1 = $(".slick1").find(".item-slick1");
    var action1 = [];
    var action2 = [];
    var action3 = [];
    var cap1Slide1 = [];
    var cap2Slide1 = [];
    var btnSlide1 = [];

    for (var i = 0; i < itemSlick1.length; i++) {
        cap1Slide1[i] = $(itemSlick1[i]).find(".caption1-slide1");
        cap2Slide1[i] = $(itemSlick1[i]).find(".caption2-slide1");
        btnSlide1[i] = $(itemSlick1[i]).find(".wrap-btn-slide1");
    }

    $(".slick1").on("init", function () {
        action1[0] = setTimeout(function () {
            $(cap1Slide1[0]).addClass(
                $(cap1Slide1[0]).data("appear") + " visible-true"
            );
        }, 200);

        action2[0] = setTimeout(function () {
            $(cap2Slide1[0]).addClass(
                $(cap2Slide1[0]).data("appear") + " visible-true"
            );
        }, 1000);

        action3[0] = setTimeout(function () {
            $(btnSlide1[0]).addClass(
                $(btnSlide1)[0].data("appear") + " visible-true"
            );
        }, 1800);
    });

    $(".slick1").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        dots: true,
        appendDots: $(".wrap-slick1-dots"),
        dotsClass: "slick1-dots",
        infinite: true,
        autoplay: true,
        autoplaySpeed: 6000,
        arrows: true,
        appendArrows: $(".wrap-slick1"),
        prevArrow:
            '<button class="arrow-slick1 prev-slick1"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
        nextArrow:
            '<button class="arrow-slick1 next-slick1"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',
    });

    $(".slick1").on("afterChange", function (event, slick, currentSlide) {
        for (var i = 0; i < itemSlick1.length; i++) {
            clearTimeout(action1[i]);
            clearTimeout(action2[i]);
            clearTimeout(action3[i]);

            $(cap1Slide1[i]).removeClass(
                $(cap1Slide1[i]).data("appear") + " visible-true"
            );
            $(cap2Slide1[i]).removeClass(
                $(cap2Slide1[i]).data("appear") + " visible-true"
            );
            $(btnSlide1[i]).removeClass(
                $(btnSlide1[i]).data("appear") + " visible-true"
            );
        }

        action1[currentSlide] = setTimeout(function () {
            $(cap1Slide1[currentSlide]).addClass(
                $(cap1Slide1[currentSlide]).data("appear") + " visible-true"
            );
        }, 200);

        action2[currentSlide] = setTimeout(function () {
            $(cap2Slide1[currentSlide]).addClass(
                $(cap2Slide1[currentSlide]).data("appear") + " visible-true"
            );
        }, 1000);

        action3[currentSlide] = setTimeout(function () {
            $(btnSlide1[currentSlide]).addClass(
                $(btnSlide1)[currentSlide].data("appear") + " visible-true"
            );
        }, 1800);
    });

    /*[ Slick2 ]
      ===========================================================*/
    var itemSlick2 = $(".item-slick2");
    var action1s2 = [];
    var cap1Slide2 = [];

    for (var i = 0; i < itemSlick2.length; i++) {
        cap1Slide2[i] = $(itemSlick2[i]).find(".wrap-content-slide2 .blo2");
    }

    $(".slick2").on("init", function () {
        action1s2[0] = setTimeout(function () {
            $(cap1Slide2[0]).addClass(
                $(cap1Slide2[0]).data("appear") + " visible-true"
            );
        }, 200);
    });

    $(".slick2").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        dots: true,
        appendDots: $(".wrap-slick2-dots"),
        dotsClass: "slick2-dots",
        infinite: true,
        autoplay: true,
        autoplaySpeed: 6000,
        arrows: true,
        appendArrows: $(".wrap-slick2"),
        prevArrow:
            '<button class="arrow-slick2 prev-slick2"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
        nextArrow:
            '<button class="arrow-slick2 next-slick2"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',
    });

    $(".slick2").on("afterChange", function (event, slick, currentSlide) {
        for (var i = 0; i < itemSlick2.length; i++) {
            clearTimeout(action1s2[i]);

            $(cap1Slide2[i]).removeClass(
                $(cap1Slide2[i]).data("appear") + " visible-true"
            );
        }

        action1s2[currentSlide] = setTimeout(function () {
            $(cap1Slide2[currentSlide]).addClass(
                $(cap1Slide2[currentSlide]).data("appear") + " visible-true"
            );
        }, 200);
    });

    /*[ Slick3 ]
      ===========================================================*/
    var itemSlick3 = $(".slick3").find(".item-slick3");
    var action1s3 = [];
    var action2s3 = [];
    var action3s3 = [];
    var cap1Slide3 = [];
    var cap2Slide3 = [];
    var btnSlide3 = [];

    for (var i = 0; i < itemSlick3.length; i++) {
        cap1Slide3[i] = $(itemSlick3[i]).find(".pic-review");
        cap2Slide3[i] = $(itemSlick3[i]).find(".content-review");
        btnSlide3[i] = $(itemSlick3[i]).find(".more-review");
    }

    $(".slick3").on("init", function () {
        action1s3[0] = setTimeout(function () {
            $(cap1Slide3[0]).addClass(
                $(cap1Slide3[0]).data("appear") + " visible-true"
            );
        }, 200);

        action2s3[0] = setTimeout(function () {
            $(cap2Slide3[0]).addClass(
                $(cap2Slide3[0]).data("appear") + " visible-true"
            );
        }, 1000);

        action3s3[0] = setTimeout(function () {
            $(btnSlide3[0]).addClass(
                $(btnSlide3)[0].data("appear") + " visible-true"
            );
        }, 1000);
    });

    $(".slick3").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: false,
        dots: true,
        appendDots: $(".wrap-slick3-dots"),
        dotsClass: "slick3-dots",
        infinite: true,
        autoplay: true,
        autoplaySpeed: 6000,
        arrows: true,
        appendArrows: $(".wrap-slick3"),
        prevArrow:
            '<button class="arrow-slick3 prev-slick3"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
        nextArrow:
            '<button class="arrow-slick3 next-slick3"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',
    });

    $(".slick3").on("afterChange", function (event, slick, currentSlide) {
        for (var i = 0; i < itemSlick3.length; i++) {
            clearTimeout(action1s3[i]);
            clearTimeout(action2s3[i]);
            clearTimeout(action3s3[i]);

            $(cap1Slide3[i]).removeClass(
                $(cap1Slide3[i]).data("appear") + " visible-true"
            );
            $(cap2Slide3[i]).removeClass(
                $(cap2Slide3[i]).data("appear") + " visible-true"
            );
            $(btnSlide3[i]).removeClass(
                $(btnSlide3[i]).data("appear") + " visible-true"
            );
        }

        action1s3[currentSlide] = setTimeout(function () {
            $(cap1Slide3[currentSlide]).addClass(
                $(cap1Slide3[currentSlide]).data("appear") + " visible-true"
            );
        }, 200);

        action2s3[currentSlide] = setTimeout(function () {
            $(cap2Slide3[currentSlide]).addClass(
                $(cap2Slide3[currentSlide]).data("appear") + " visible-true"
            );
        }, 1000);

        action3s3[currentSlide] = setTimeout(function () {
            $(btnSlide3[currentSlide]).addClass(
                $(btnSlide3)[currentSlide].data("appear") + " visible-true"
            );
        }, 1000);
    });


    var carousel = function() {
		$('.home-slider').owlCarousel({
	    loop:true,
	    autoplay: true,
	    margin:0,
	    animateOut: 'fadeOut',
	    animateIn: 'fadeIn',
	    nav:true,
	    dots: true,
	    autoplayHoverPause: false,
	    items: 1,
	    navText : ["<span class='ion-ios-arrow-back'></span>","<span class='ion-ios-arrow-forward'></span>"],
	    responsive:{
	      0:{
	        items:1
	      },
	      600:{
	        items:1
	      },
	      1000:{
	        items:1
	      }
	    }
		});
		$('.carousel-testimony').owlCarousel({
			center: true,
			loop: true,
			items:1,
			margin: 30,
			stagePadding: 0,
			nav: false,
			navText: ['<span class="ion-ios-arrow-back">', '<span class="ion-ios-arrow-forward">'],
			responsive:{
				0:{
					items: 1
				},
				600:{
					items: 1
				},
				1000:{
					items: 1
				}
			}
		});
	};
	carousel();



	var contentWayPoint = function() {
		var i = 0;
		$('.ftco-animate').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {
				
				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function(){

					$('body .ftco-animate.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn ftco-animated');
							} else if ( effect === 'fadeInLeft') {
								el.addClass('fadeInLeft ftco-animated');
							} else if ( effect === 'fadeInRight') {
								el.addClass('fadeInRight ftco-animated');
							} else {
								el.addClass('fadeInUp ftco-animated');
							}
							el.removeClass('item-animate');
						},  k * 50, 'easeInOutExpo' );
					});
					
				}, 100);
				
			}

		} , { offset: '95%' } );
	};
	contentWayPoint();

})(jQuery);

$(document).ready(function(){

    const owl = $('.owl-carousel.owl-theme')
    // The best meals
    $.ajax({
        url: '/meals/show',
        type: "POST",
        data: { _token: $('meta[name="csrf-token"]').attr('content')},
        success: function (response) {
            if(response.length > 0){
                var html = '';
                response.map( meal => {
                    html += '<div class="owl-carousel-info-wrap item">';
                    html +=  '<img src="/meals/' + meal['Photo'] +'" class="owl-carousel-image img-fluid" alt="gg">';
                    html +=  '<div class="owl-carousel-info">';
                    html +=    '<h4 class="mb-2">' + meal['NameFood'] +'</h4>';
                    html +=  '</div>';
                    html +='</div>';
                });
                owl.html(html);
                // MENU
                $(".navbar-collapse a").on("click", function () {
                    $(".navbar-collapse").collapse("hide");
                });
                $(".owl-carousel").owlCarousel({
                    center: true,
                    loop: true,
                    margin: 30,
                    autoplay: true,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 2,
                        },
                        767: {
                            items: 3,
                        },
                        1200: {
                            items: 4,
                        },
                    },
                });
            }
        },
        async: false 
    });
});


