$(document).ready(function () {
    const menu_aboot = $(".menu_aboot");
    const about = $(".about");
    const menu_FAQ = $(".menu_FAQ");
    const FAQ = $(".FAQ");
    const menu_meals = $(".menu_meals");
    const meals = $(".meals");
    const cont = $(".cont");
    const btn_add = $(".btn_add");
    const add_meals = $(".add_meals");


    cont.css("transform" , window.localStorage.transform);

    menu_aboot.click( e => {
        window.localStorage.transform = "translate3d(0px, 0px, 0px)";
        cont.css({"transform": "translate3d(0px, 0px, 0px)", "transition-duration": "300ms"});
        // FAQ.removeClass("show_faq");
        // meals.removeClass("show_meals");
        // about.addClass("show_about");
    });
    menu_FAQ.click( e => {
        window.localStorage.transform = "translate3d(-100%, 0px, 0px)";
        cont.css({"transform": "translate3d(-100%, 0px, 0px)", "transition-duration": "300ms"});
        // about.removeClass("show_about");
        // meals.removeClass("show_meals");
        // FAQ.addClass("show_faq");
    });
    menu_meals.click( e => {
        window.localStorage.transform = "translate3d(-200%, 0px, 0px)";
        cont.css({"transform": "translate3d(-200%, 0px, 0px)", "transition-duration": "300ms"});
        // about.removeClass("show_about");
        // FAQ.removeClass("show_faq");
        // meals.addClass("show_meals");
    });

    btn_add.click( e => {
        add_meals.slideToggle();
    });
});

var TrandingSlider = new Swiper(".tranding-slider", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    loop: true,
    slidesPerView: "auto",
    coverflowEffect: {
      rotate: 0,
      stretch: 0,
      depth: 100,
      modifier: 2.5,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
});