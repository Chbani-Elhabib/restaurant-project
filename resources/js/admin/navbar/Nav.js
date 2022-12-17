$(document).ready(function(){

    const side_menu = $("#menu_side");
    const header = $("header");
    const content = $(".content");
    const btn_open = $("#btn_open");
    const R = $(".fa-solid");
    const RR = $(".logo_RR");
    const option = $(".options__menu .option h4");

    // dark mood
    const dark = $('.dark');
    const dark_icon = $('.dark_icon');
    const body = $('body');

    if(window.localStorage.dark == "dark"){
        dark_icon.removeClass("fa-regular fa-moon");
        dark_icon.addClass("fa-solid fa-sun");
        body.addClass("dark");
    }else{
        dark_icon.addClass("fa-regular fa-moon");
        dark_icon.removeClass("fa-solid fa-sun");
        body.removeClass("dark");        
    }

    dark.click( e => {
        if( dark_icon.attr('class') == 'dark_icon fa-regular fa-moon'){
            dark_icon.removeClass("fa-regular fa-moon");
            dark_icon.addClass("fa-solid fa-sun");
            body.addClass("dark");
            window.localStorage.dark = "dark";
        }else{
            dark_icon.addClass("fa-regular fa-moon");
            dark_icon.removeClass("fa-solid fa-sun");
            body.removeClass("dark");
            window.localStorage.dark = "light";
        }
    });

    if(window.localStorage.OptionsMenu == "open" ){
        header.addClass("animateheader");
        side_menu.addClass("menu__side_move");
        content.addClass("animatecontent");
        R.addClass("logo_R");
        RR.addClass("logo");
        option.addClass("option4");
    }


    //Evento para mostrar y ocultar menú
    function open_close_menu(){
        if(side_menu.attr("class") == "menu__side"){
            window.localStorage.OptionsMenu = "open";
        }else{
            window.localStorage.removeItem("OptionsMenu")
        }
        header.toggleClass("animateheader");
        side_menu.toggleClass("menu__side_move");
        content.toggleClass("animatecontent");
        R.toggleClass("logo_R");
        RR.toggleClass("logo");
        option.toggleClass("option4");
    }

    btn_open.click(open_close_menu);


    // show profile and message and notevication and translate

    const groop = $('.groop');
    groop.each( e => {
        groop.eq(e).click( el => {
            const dive = groop[e].children[1];
            groop.each( ell => {
                const di = groop[ell].children[1];
                if((di.classList.value == 'flag display' || di.classList.value == 'notevica display'
                 || di.classList.value == 'mess display' || di.classList.value == 'profile_dd display') 
                   && dive.classList.value != di.classList.value){
                    di.classList.remove('display');
                }
            })
            dive.classList.toggle('display');
        });
    });

    // animate flag
    const lagn = $('.lagn');
    const fla = $('.fla');

    fla.attr('src', window.localStorage.image );

    lagn.each( e => {
        lagn.eq(e).click( ell => {
            const di = lagn[e].children[0].children[0].src;
            fla.attr('src',di);
            window.localStorage.image = di ;
        })
    })

    



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




