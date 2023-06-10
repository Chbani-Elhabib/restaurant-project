$(document).ready(function () {

    const Addfaq = $(".Add-faq button");
    Addfaq.click( function(){
        $(this).parent().parent().next().slideToggle(500);
    })

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

    const myTable = $("#example");
    const sectioncard = $('header');
    const card = $('.card');
    myTable.on("click", ".show", function() {
        $.ajax({
            url: '/FAQ/show',
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                id: $(this).parent().attr('data'),
            },
            success: function(response) {
                console.log(response)
                if( response != 'No' ){
                    sectioncard.next().fadeIn(500)

                    var html = '<div class="card-content">';

                    html += '<div class="usinfo mt-4 ms-3"><p class="mb-2">FAQ information :</p></div>';
                    
                    html += '<div class="information d-flex justify-content-between mt-2 mb-2">';
                    html += '<p class="mb-0">'+ response.title +'</p>';
                    html += '<i class="fa-solid fa-chevron-up"></i></div>';

                    html += '<div class="information-user mt-2">';
                    html += '<div class="d-flex"><p class="mb-2 ms-2">'+ response.body  +'</p></div>';
                    html += '</div>';
                    


                    html += '</div>';

                    card.html(html);
                    card.fadeIn(500);
                }else{
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
                        icon: "error",
                        title: "Error",
                    });
                }
            }
        })
    });

    
    card.on( 'click', ".information", function(){
        $(this).next().slideToggle(500);
        $(this).children().eq(1).toggleClass('active')
    })

    sectioncard.next().click( function(e){
        sectioncard.next().fadeOut(500)
        card.fadeOut(500);
    })

    // click button delete 

    myTable.on( 'click', ".delete" , function(){
        $.ajax({
            url: '/faq/delete',
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                id: $(this).parent().attr('data'),
            },
            success: response => {
                console.log(response)
                if(response == "Yes" ){
                    $(this).parent().parent().parent().animate({  opacity: 0, height: 0 }, 500, function(){ $(this).remove();})
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
                }else{
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
                        icon: "error",
                        title: "Error",
                    });
                }
            }
        });
    });
   


})
