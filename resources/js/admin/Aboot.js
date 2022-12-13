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

    // animate botton about-us and FAQ and The best meals
    cont.css("transform" , window.localStorage.transform);

    menu_aboot.click( e => {
        window.localStorage.transform = "translate3d(0px, 0px, 0px)";
        cont.css({"transform": "translate3d(0px, 0px, 0px)", "transition-duration": "300ms"});
    });
    menu_FAQ.click( e => {
        window.localStorage.transform = "translate3d(-100%, 0px, 0px)";
        cont.css({"transform": "translate3d(-100%, 0px, 0px)", "transition-duration": "300ms"});
    });
    menu_meals.click( e => {
        window.localStorage.transform = "translate3d(-200%, 0px, 0px)";
        cont.css({"transform": "translate3d(-200%, 0px, 0px)", "transition-duration": "300ms"});
    });



    // FAQ
    const btn_FAQ = $(".btn_FAQ");
    btn_FAQ.each( e => {
      btn_FAQ.eq(e).click( el => {
        const faq = btn_FAQ[e].nextElementSibling;
        const icon = btn_FAQ[e].children[1];
        btn_FAQ.each( ell => {
          const faqe = btn_FAQ[ell].nextElementSibling;
          const icone = btn_FAQ[ell].children[1];
          if(faqe.classList.value == 'show' && faqe.classList.value != faq.classList.value){
            faqe.classList.remove('show');
            icone.classList.remove('rotate');
          }
        });
        faq.classList.toggle('show');
        icon.classList.toggle('rotate');
      });
    });

    // The best meals

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