$(document).ready(function() {

    // click add comments :
    const AddComments = $('.Add-Comments');
    AddComments.click( function(){
        $(this).parent().next().slideToggle(500);
    })

    // click submint comment :
    const Comment = $('.Comment');
    const selecte = $('.selecte');

    Comment.click( function(e){
        e.preventDefault();

        // validation Users :
        var xUsers = true ;
        if( selecte.eq(0).val() == null ){
            xUsers = false ;
            selecte.eq(0).css( 'border' , 'solid #de3545 0.5px')
            selecte.eq(0).prev().addClass( 'text-danger')
            selecte.eq(0).next().text( 'Please enter the User Name')
        }else{
            xUsers = true ;
            selecte.eq(0).css( 'border' , '')
            selecte.eq(0).prev().removeClass( 'text-danger')
            selecte.eq(0).next().text('')
        }

        // validation Restaurant :
        var xRestaurant = true ;
        if( selecte.eq(1).val() == null ){
            xRestaurant = false ;
            selecte.eq(1).css( 'border' , 'solid #de3545 0.5px')
            selecte.eq(1).prev().addClass( 'text-danger')
            selecte.eq(1).next().text( 'Please enter the Restaurant')
        }else{
            xRestaurant = true ;
            selecte.eq(1).css( 'border' , '')
            selecte.eq(1).prev().removeClass( 'text-danger')
            selecte.eq(1).next().text('')
        }

        // validation Comment :
        var xComment = true ;
        if( selecte.eq(2).val().length == 0 ){
            xComment = false ;
            selecte.eq(2).css( 'border' , 'solid #de3545 0.5px')
            selecte.eq(2).prev().addClass( 'text-danger')
            selecte.eq(2).next().text( 'Please enter the Restaurant')
        }else{
            xComment = true ;
            selecte.eq(2).css( 'border' , '')
            selecte.eq(2).prev().removeClass( 'text-danger')
            selecte.eq(2).next().text('')
        }

        if( xUsers && xRestaurant && xComment ){
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

    })

    // datatable
    $("#example").DataTable({
        ordering: false,
    });

    // click Best comments :
    $("#example").on( 'click' , '.toggle-btns' ,function(){
        if( $(this).children().children().eq(1).attr('data') == "True"){
            $(this).children().children().eq(1).attr('data' , 'false');
            $(this).children().children().eq(1).removeClass('active');
        }else{
            $(this).children().children().eq(1).attr('data' , 'True');
            $(this).children().children().eq(1).addClass('active');
        }

        $.ajax({
            url: '/comment/bestcomments',
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                id : $(this).children().attr('data'),
                active: $(this).children().children().eq(1).attr('data'),
            },
            success: function (response) {
                if( response == "Yes" ){
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
                }else if(response == "No" ){
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
    })

    // click show comments 
    const card = $('.card');
    const sectioncard = $('header')

    $("#example").on( 'click' , '.show' ,function(){
        $.ajax({
            url: '/comment/show',
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                id : $(this).parent().attr('data-show'),
            },
            success: function (response) {
                if( response != "No" ){
                    sectioncard.next().fadeIn(500)

                    var html = '<div class="card-content">';

                    html += '<div class="usinfo mt-4 ms-3"><p class="mb-2">Informations :</p></div>';

                    html += '<div class="information d-flex justify-content-between mt-2 mb-2"><p class="mb-0">User information </p><i class="fa-solid fa-chevron-up"></i></div>';
                        
                    html += '<div class="information-user mt-2">';
                    html += '<div class="d-flex"><p class="mb-2" >Name client :</p><p class="mb-2 ms-2">'+ response.person.UserName  +'</p></div>';
                    html += '<div class="d-flex"><p class="mb-2" >Email client :</p><p class="mb-2 ms-2">'+ response.person.Email +'</p></div>';
                    html += '</div>';

                    html += '<div class="information d-flex justify-content-between mt-2 mb-2"><p class="mb-0">Restaurant information</p><i class="fa-solid fa-chevron-up"></i></div>';
                        
                    html += '<div class="information-user mt-2">';
                    html += '<div class="d-flex"><p class="mb-2" >Name restaurant :</p><p class="mb-2 ms-2">'+ response.restaurant.NameRestaurant+'</p></div>';
                    html += '</div>';

                    html += '<div class="information d-flex justify-content-between mt-2 mb-2"><p class="mb-0">Comments</p><i class="fa-solid fa-chevron-up"></i></div>';
                        
                    html += '<div class="information-mcl mt-2">';
                    html += '<div class="d-flex"><p class="mb-2 ms-2">'+ response.comment+'</p></div>';
                    html += '</div>';

                    html += '</div>';

                    card.html(html);
                    card.fadeIn(500);
                }
            }
        });
    });

    card.on( 'click', ".information", function(){
        $(this).next().slideToggle(500);
        $(this).children().eq(1).toggleClass('active')
    });

    sectioncard.next().click( function(e){
        sectioncard.next().fadeOut(500)
        card.fadeOut(500);
    });

    // click button delete 

    $("#example").on( 'click', ".delete" , function(){
        $.ajax({
            url: '/comment/delete',
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                id: $(this).parent().attr('data-show'),
            },
            success: response => {
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
    
});