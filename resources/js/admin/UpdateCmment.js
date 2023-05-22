$(document).ready(function() {

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

});