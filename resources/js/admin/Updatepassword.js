$(document).ready(function () {

    const eye = $('.eye');
    const inpute = $('.inpute');

    eye.click( function(){
        if(inpute.attr('type') == 'password'){
            inpute.attr('type' , 'text');
            eye.attr('src' , '/image/eye_open.png');
        }else{
            inpute.attr('type' , 'password');
            eye.attr('src' , '/image/close_eye.png');
        }
    })

    const Updatepassword = $('.Updatepassword');
    
    Updatepassword.click( e => {

        e.preventDefault();

        // validation Password:
        var xpassword = true ;
        if(inpute.eq(0).val().length == 0 ){
            xpassword = false ;
            inpute.eq(0).css('border' , 'solid #dc3747 1px')
            inpute.eq(0).prev().addClass('text-danger')
            inpute.eq(0).next().text('Please enter a valid Password:')
        }else{
            xpassword = true ;
            inpute.eq(0).css('border' , '')
            inpute.eq(0).prev().removeClass('text-danger')
            inpute.eq(0).next().text('')
        }

        // validation New password:
        var xnewpassword = true ;
        if( inpute.eq(1).val().length == 0 ){
            xnewpassword = false ;
            inpute.eq(1).css('border' , 'solid #dc3747 1px')
            inpute.eq(1).prev().addClass('text-danger')
            inpute.eq(1).next().text('Please enter a valid New password:')
        }else if(inpute.eq(1).val().length > 0){

            xnewpassword = true ;
            inpute.eq(1).css('border' , '')
            inpute.eq(1).prev().removeClass('text-danger')
            inpute.eq(1).next().text('')

            // validation Config password:
            var xconfigpassword = true ;
            if( inpute.eq(2).val().length == 0){
                xconfigpassword = false ;
                inpute.eq(2).css('border' , 'solid #dc3747 1px')
                inpute.eq(2).prev().addClass('text-danger')
                inpute.eq(2).next().text('Please enter a valid Config password:')
            }else if(inpute.eq(1).val() != inpute.eq(2).val() ){
                xconfigpassword = false ;
                inpute.eq(2).css('border' , 'solid #dc3747 1px')
                inpute.eq(2).prev().addClass('text-danger')
                inpute.eq(2).next().text('Password does not match the confirm password:')
            }else{
                xconfigpassword = true ;
                inpute.eq(2).css('border' , '')
                inpute.eq(2).prev().removeClass('text-danger')
                inpute.eq(2).next().text('')
            }
        }

        // validation Config password:
        if( inpute.eq(2).val().length == 0){
            xconfigpassword = false ;
            inpute.eq(2).css('border' , 'solid #dc3747 1px')
            inpute.eq(2).prev().addClass('text-danger')
            inpute.eq(2).next().text('Please enter a valid Config password:')
        }

        if( xpassword && xnewpassword && xconfigpassword ){
            $.ajax({
                url: "/ajax-request",
                type: "POST",
                data: {
                    password: inpute.eq(0).val(),
                    _token: $('meta[name="csrf-token"]').attr("content"),
                },
                success: function (response) {
                    if (response == "Yes") {
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
                    } else {
                        inpute.eq(0).css('border' , 'solid #dc3747 1px')
                        inpute.eq(0).prev().addClass('text-danger')
                        inpute.eq(0).next().text('The password you entered is incorrect :')
                    }
                },
            });
        }



    });


});