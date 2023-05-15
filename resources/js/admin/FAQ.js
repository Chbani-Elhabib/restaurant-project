$(document).ready(function () {

    const Langue = $('.Langue');

    Langue.eq(0).change( function(){
        console.log($(this).val())
        if($(this).val() == 'Arabic'){
            Langue.eq(1).attr('dir' , 'rtl' );
            Langue.eq(2).attr('dir' , 'rtl' );
        }else if($(this).val() == 'English'){
            Langue.eq(1).attr('dir' , "ltr" );
            Langue.eq(2).attr('dir' , "ltr" );
        }
    })
    
    // // ======================================================================
    // // ------------------------    FAQ
    // // ==============
    // const btn_FAQ = $(".btn_FAQ");
    // const form_FAQ = $(".form_FAQ");
    // const addfaq = $(".button_19.addfaq");
    // const ShowAddFAQ = $(".button_19.ShowAddFAQ");
    // const inpute = $(".form_FAQ form div input");
    // const textareae = $(".form_FAQ form div textarea");
    // // click en button faq
    // addfaq.each((e) => {
    //     addfaq.eq(e).click((ell) => {
    //         ell.preventDefault();
    //         if (e == 0) {
    //             var errorinput = true;
    //             var errortexareae = true;

    //             if (inpute.eq(0).val().length == 0) {
    //                 errorinput = false;
    //                 $(".errorinput").eq(0).text("please enter title FAQ English");
    //             } else {
    //                 $(".errorinput").eq(0).text("");
    //             }

    //             if (textareae.eq(0).val().length == 0) {
    //                 errortexareae = false;
    //                 $(".errortextarea").text("please enter body FAQ English");
    //             } else {
    //                 $(".errortextarea").text("");
    //             }

    //             if (errorinput && errortexareae) {
    //                 // submite
    //                 const Toast = Swal.mixin({
    //                     toast: true,
    //                     position: "top-end",
    //                     showConfirmButton: false,
    //                     timer: 2000,
    //                     timerProgressBar: true,
    //                     didOpen: (toast) => {
    //                         toast.addEventListener("mouseenter", Swal.stopTimer);
    //                         toast.addEventListener("mouseleave", Swal.resumeTimer);
    //                     },
    //                 });
    //                 Toast.fire({
    //                     icon: "success",
    //                     title: "Then successfully",
    //                 });
    //                 setTimeout(() => {
    //                     $(".form_FAQ form").eq(0).submit();
    //                 }, "2000");
    //             }
    //         }
    //         if (e == 1) {
    //             var errorinput = true;
    //             var errortexareae = true;

    //             if (inpute.eq(1).val().length == 0) {
    //                 errorinput = false;
    //                 $(".errorinput").eq(1).text("please enter title FAQ Arabic");
    //             } else {
    //                 $(".errorinput").eq(1).text("");
    //             }

    //             if (textareae.eq(1).val().length == 0) {
    //                 errortexareae = false;
    //                 $(".errortextarea").eq(1).text("please enter body FAQ Arabic");
    //             } else {
    //                 $(".errortextarea").eq(1).text("");
    //             }

    //             if (errorinput && errortexareae) {
    //                 // submite
    //                 const Toast = Swal.mixin({
    //                     toast: true,
    //                     position: "top-end",
    //                     showConfirmButton: false,
    //                     timer: 2000,
    //                     timerProgressBar: true,
    //                     didOpen: (toast) => {
    //                         toast.addEventListener("mouseenter", Swal.stopTimer);
    //                         toast.addEventListener("mouseleave", Swal.resumeTimer);
    //                     },
    //                 });
    //                 Toast.fire({
    //                     icon: "success",
    //                     title: "Then successfully",
    //                 });
    //                 setTimeout(() => {
    //                     $(".form_FAQ form").eq(1).submit();
    //                 }, "2000");
    //             }
    //         }
    //     });
    // });

    // ShowAddFAQ.each((e) => {
    //     ShowAddFAQ.eq(e).click((ell) => {
    //         ShowAddFAQ.each((el) => {
    //             console.log(form_FAQ.eq(el).attr("class"));
    //             if (
    //                 form_FAQ.eq(el).attr("class") == "form_FAQ FAQ" &&
    //                 form_FAQ.eq(el).attr("class") != form_FAQ.eq(e).attr("class")
    //             ) {
    //                 form_FAQ.eq(el).slideUp();
    //                 form_FAQ.eq(el).removeClass("FAQ");
    //             }
    //         });
    //         form_FAQ.eq(e).slideToggle();
    //         form_FAQ.eq(e).toggleClass("FAQ");
    //     });
    // });

    // btn_FAQ.each((e) => {
    //     btn_FAQ.eq(e).click((el) => {
    //         const faq = btn_FAQ[e].nextElementSibling;
    //         const icon = btn_FAQ[e].children[1];
    //         btn_FAQ.each((ell) => {
    //             const faqe = btn_FAQ[ell].nextElementSibling;
    //             const icone = btn_FAQ[ell].children[1];
    //             if (
    //                 faqe.classList.value == "show" &&
    //                 faqe.classList.value != faq.classList.value
    //             ) {
    //                 faqe.classList.remove("show");
    //                 icone.classList.remove("rotate");
    //             }
    //         });
    //         faq.classList.toggle("show");
    //         icon.classList.toggle("rotate");
    //     });
    // });

    // // show data FAQ
    // $.ajax({
    //     url: "/FAQ/show",
    //     type: "POST",
    //     data: {
    //         Language: $("html").attr("lang"),
    //         _token: $('meta[name="csrf-token"]').attr("content"),
    //     },
    //     success: function (response) {
    //         console.log(response);
    //     },
    // });

})
