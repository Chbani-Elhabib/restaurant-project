$(document).ready(function () {

    const Langue = $('.Langue');
    Langue.eq(0).change( function(){
        if($(this).val() == 'Arabic'){
            Langue.eq(1).attr('dir' , 'rtl' );
            Langue.eq(2).attr('dir' , 'rtl' );
        }else if($(this).val() == 'English'){
            Langue.eq(1).attr('dir' , "ltr" );
            Langue.eq(2).attr('dir' , "ltr" );
        }
    })

    const addfaq = $(".addfaq");
    const title = $("#title");
    const body = $("#body");
    // click en button add faq
    addfaq.click(function(e){
        e.preventDefault();
        
        var xtitle = true ;
        if( title.val().length <= 0 ){
            xtitle = false;
            title.css("border", "0.5px solid rgb(220 53 69 / 89%)");
            title.prev().css("color", "#dc3545");
            title.next().text("Please enter the title");
        }else{
            xtitle = true ;
            title.css("border", "");
            title.prev().css("color", "");
            title.next().text("");
        }
        
        var xbody = true ;
        if( body.val().length <= 0 ){
            xbody = false;
            body.css("border", "0.5px solid rgb(220 53 69 / 89%)");
            body.prev().css("color", "#d3545");
            body.next().text("Please enter the body");
        }else{
            xbody = true ;
            body.css("border", "");
            body.prev().css("color", "");
            body.next().text("");
        }
        
        if( xtitle && xbody){
            // submite
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener("mouseenter", Swal.stopTimer);
                    toast.addEventListener("mouseleave", Swal.resumeTimer);
                },
            });
            Toast.fire({
                icon: "success",
                title: "Then successfully",
            });
            setTimeout(() => {
                $('form').submit();
            }, "2000");

        }
        
    });

})