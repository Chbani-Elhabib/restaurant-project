$(document).ready(function(){

    const validation_English = /^[a-zA-Z]+[0-9]*[a-zA-Z]*$/ ;
    const validation_email = /(^\w+([\.-]?\w+))+\@gmail.com$/;

    // show image users

    const shadow = $('.shadow');
    const inputefile = $('.fa-solidfa-camera');

    inputefile.change( e => {
        
        var filesArr = Array.prototype.slice.call(e.target.files);
        filesArr.forEach( f => {
            if (!f.type.match("image.*")) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })                      
                Toast.fire({
                    icon: 'error',
                    title: 'Please insert a photo'
                }) 
            }else{
                var storedFiles = [] ;
                storedFiles.push(f);
                var reader = new FileReader();
                reader.onload = function (e) {
                  shadow.attr("src" , e.target.result );
                };
                reader.readAsDataURL(f);
            }
        });
    });

    // click apdate 

    const inpute = $('.inpute');
    const labele = $('.labele');

    var user_name = inpute.eq(0).val();
    var user_Email = inpute.eq(1).val();

    $('.Update').click( e => {

        // validation username
        var  xusername = true;
        if(inpute.eq(0).val() == ""){
            xusername = false;
            inpute.eq(0).css('border','red solid 2px'); 
            labele.eq(0).css('color','red'); 
            const dive = inpute.eq(0).next();
            dive.html( "<p>Please enter the UserName</p>" );
        }else if(!inpute.eq(0).val().match(validation_English)){
            xusername = false;
            inpute.eq(0).css('border','red solid 2px'); 
            labele.eq(0).css('color','red'); 
            const dive = inpute.eq(0).next();
            dive.text( "Please enter a valid username exmple 'chbani04'" );
        }else{
            $.ajax({
                url: '/ajax-update',
                type: "POST",
                data: {username: inpute.eq(0).val() , user_name: user_name ,  _token: $('meta[name="csrf-token"]').attr('content')},
                success: function (response) {
                    if(response == "No"){
                        xusername = false;
                        inpute.eq(0).css('border','red solid 2px'); 
                        labele.eq(0).css('color','red'); 
                        const dive = inpute.eq(0).next();
                        dive.text( "This is a username then entered before" );
                    }else{
                        xusername = true;
                        inpute.eq(0).css('border',''); 
                        labele.eq(0).css('color',''); 
                        const dive = inpute.eq(0).next();
                        dive.text( "" );
                    }
                },
                async: false 
            });
        }


        // validation Email
        var  xEmail = true;
        if(inpute.eq(1).val() == ""){
            xEmail = false;
            inpute.eq(1).css('border','red solid 2px'); 
            labele.eq(1).css('color','red'); 
            const dive = inpute.eq(1).next();
            dive.text( "Please enter the Email" );
        }else if(!inpute.eq(1).val().match(validation_email)){
            xEmail = false;
            inpute.eq(1).css('border','red solid 2px'); 
            labele.eq(1).css('color','red'); 
            const dive = inpute.eq(1).next();
            dive.text( "email" );
        }else{
            $.ajax({
                url: '/ajax-update',
                type: "POST",
                data: {Email: inpute.eq(1).val() , user_Email: user_Email ,  _token: $('meta[name="csrf-token"]').attr('content')},
                success: function (response) {
                    if(response == "Yes"){
                        xEmail = false;
                        inpute.eq(1).css('border','red solid 2px'); 
                        labele.eq(1).css('color','red'); 
                        const dive = inpute.eq(1).next();
                        dive.text( "sfsdfdsfsfsf" );
                    }else{
                        xEmail = true;
                        inpute.eq(1).css('border',''); 
                        labele.eq(1).css('color',''); 
                        const dive = inpute.eq(1).next();
                        dive.text( "" );
                    }
                },
                async: false 
            });
        }

        // validation Pasword
        if(inpute.eq(2).val() != "" ){
            var xPasword = true;
            // validation Config-Password
            if(inpute.eq(3).val() == ""){
                xPasword = false;
                inpute.eq(3).css('border','red solid'); 
                labele.eq(2).css('color','red'); 
                const dive = inpute.eq(3).next();
                dive.text( "Please enter the Config-Password" );
            }else if(inpute.eq(2).val() != inpute.eq(3).val()){
                inpute.eq(3).css('border','red solid'); 
                labele.eq(2).css('color','red'); 
                const dive = inpute.eq(3).next();
                dive.text( "ggggConfig-Password" );
                xPasword = false;
            }else{
                xPasword = true;
                inpute.eq(3).css('border',''); 
                labele.eq(2).css('color',''); 
                const dive = inpute.eq(3).next();
                dive.text( "" ); 
            }
        }

        // validation Telf
        if(inpute.eq(4).val().length > 0){
            var xTelf = false;
            if(!input_add_user.eq(4).val().match(validation_Telf)){
                xTelf = false;
                const dive = input_add_user.eq(4).next();
                dive.text( "Please write the correct phone number" );
                input_add_user.eq(4).css('border','red solid 0.1px'); 
                label_add_user.eq(4).css('color','red');
            }else if(input_add_user.eq(4).val().length > 9){
                xTelf = false;
                const dive = input_add_user.eq(4).next();
                dive.text( "The phone number does not exceed 9 digits");
                input_add_user.eq(4).css('border','red solid 0.1px'); 
                label_add_user.eq(4).css('color','red');
            }else{
                xTelf = true;
                const dive = input_add_user.eq(4).next();
                dive.text( "" );
                input_add_user.eq(4).css('border',''); 
                label_add_user.eq(4).css('color','');
            }

            console.log(xTelf)
        }


    })





});