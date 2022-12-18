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







  // ======================================================================
  // ------------------------    FAQ
  // ==============
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

  // ======================================================================
  // ------------------------    The best meals
  // ==============

  btn_add.click( e => {
    add_meals.slideToggle();
  });

  // show image inpute 

  const image_1 = $("#image_1");
  const js_image = $(".js_image");
  
  image_1.change( e => {
    var filesArr = Array.prototype.slice.call(e.target.files);
    filesArr.forEach( f => {
      if (!f.type.match("image.*")) {
          var html ="<p>Please insert a photo please</p>";
          js_image.html(html);
        }else{
          var storedFiles = [] ;
          storedFiles.push(f);
          var reader = new FileReader();
          reader.onload = function (e) {
            var html ='<img src="' + e.target.result + "\" data-file='" + f.name + "alt='Category Image'>";
            js_image.html(html);
          };
          reader.readAsDataURL(f);
        }
    });
  });

  // clik add meal form 

  const add_meal_form = $(".add_meal_form");
  const title_English = $("#title_English");
  const title_Arabic = $("#title_Arabic");
  const form = $(".add_meals form");
  const validation_English = /^[a-zA-Z]+[0-9]*[a-zA-Z]*$/ ;
  const validation_Arabic = /^[أ-ي]+[0-9]*[أ-ي]*$/ ;

  add_meal_form.click( e => {

    e.preventDefault();

    if(!title_English.val().match(validation_English)){
      title_English.css('border','red solid')
    }else{
      title_English.css('border','')
    }

    if(!title_Arabic.val().match(validation_Arabic)){
      title_Arabic.css('border','red solid')
    }else{
      title_Arabic.css('border','')
    }

    var filesArr = Array.prototype.slice.call(image_1[0].files);
    if(filesArr.length == 0){
      var html ="<p>Please insert a photo please</p>";
      js_image.html(html);
    }else{
      filesArr.forEach( e => {
        if (!e.type.match("image.*")){
          var html ="<p>Please insert a photo please</p>";
          js_image.html(html);
        }else if(title_English.val().match(validation_English)||title_Arabic.val().match(validation_Arabic)){
          form.submit(); 
        }
      })
    }



  })

  // afiche image meals en ajax

  const htmllong = $('html');
  const swiper_wrapper = $('.swiper-wrapper');
  

  $.ajax({
    url: '/admin/about/showmeal',
    type: "POST",
    data: {_token: $('meta[name="csrf-token"]').attr('content')},
    success: function (response) {
      var html = '';
      response.forEach( e => {
        html += '<div class="swiper-slide tranding-slide">';
          html += '<div class="tranding-slide-img">';
            html += '<img src="/data-image-meal/' + e.image_meal + '" alt="Tranding"></img>';
          html += '</div>';
          html += '<div class="tranding-slide-content">';
            html += '<div class="tranding-slide-content-bottom">';
              if(htmllong.attr('lang') == 'ar'){
                html += '<h2 class="food-name">' + e.title_Arabic + '</h2>';
              }else{
                html += '<h2 class="food-name">' + e.title_English + '</h2>';
              }
            html += '</div>';
          html += '</div>';
        html += '</div>';
      });
      swiper_wrapper.html(html);
    }
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