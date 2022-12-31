$(document).ready(function () {
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
});