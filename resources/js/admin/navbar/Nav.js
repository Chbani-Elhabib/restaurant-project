$(document).ready(function(){

    const side_menu = $("#menu_side");
    const header = $("header");
    const content = $(".content");
    const btn_open = $("#btn_open");
    const R = $(".fa-solid");
    const RR = $(".logo_RR");


    //Evento para mostrar y ocultar menú
    function open_close_menu(){
        header.toggleClass("animateheader");
        side_menu.toggleClass("menu__side_move");
        content.toggleClass("animatecontent");
        R.toggleClass("logo_R");
        RR.toggleClass("logo");
    }

    btn_open.click(open_close_menu);

    // //Si el ancho de la página es menor a 760px, ocultará el menú al recargar la página

    // if (window.innerWidth < 760){

    //     navlist.addClass("body_move");
    //     side_menu.addClass("menu__side_move");
    // }

    //Haciendo el menú responsive(adaptable)

    // window.addEventListener("resize", function(){

    //     if (window.innerWidth > 760){

    //         navlist.removeClass("body_move");
    //         side_menu.removeClass("menu__side_move");
    //     }

    //     if (window.innerWidth < 760){

    //         navlist.addClass("body_move");
    //         side_menu.addClass("menu__side_move");
    //     }

    // });
  
});




