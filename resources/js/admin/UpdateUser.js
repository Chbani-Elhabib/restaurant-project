$(document).ready(function(){

    const validation_English = /^[a-zA-Z]+[0-9]*[a-zA-Z]*$/ ;
    const validation_email = /(^\w+([\.-]?\w+))+\@gmail.com$/;
    const validation_Telf = /^[0-9]+$/;

    // show image users

    const shadow = $('.shadow');
    const inputefile = $('.fa-solidfa-camera');
    var ximage = true;
    inputefile.change( e => {  
        var filesArr = Array.prototype.slice.call(e.target.files);
        filesArr.forEach( f => {
            if (!f.type.match("image.*")) {
                ximage = false;
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

                shadow.attr("src" ,'/ImageUsers/Users.png');
            }else{
                ximage = true;
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
    var user_Tlef = inpute.eq(4).val()

    $('.Update').click( e => {
        e.preventDefault();
        // validation username
        var  xusername = true;
        if(inpute.eq(0).val() == ""){
            xusername = false;
            inpute.eq(0).css('border','red solid 2px'); 
            labele.eq(0).css('color','red'); 
            const dive = inpute.eq(0).next();
            dive.text( "Please enter the UserName" );
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
            dive.text( "Please enter a valid Email exmple 'chbani@gmail.com'" );
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
                        dive.text( "This is a Email then entered before" );
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
        var xPasword = true;
        if(inpute.eq(2).val() != "" ){
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
                dive.text( "The password does not match the confirm password" );
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
        var xTelf = true;
        if(inpute.eq(4).val().length > 0){
            if(!inpute.eq(4).val().match(validation_Telf)){
                xTelf = false;
                $('.inputtelf').text( "Please write the correct phone number" );
                inpute.eq(4).css('border','red solid 0.1px'); 
                $('#basic-addon1').css('border','red solid 0.1px'); 
                inpute.eq(4).css('border-left',''); 
                $('#basic-addon1').css('border-right',''); 
                labele.eq(3).css('color','red');
            }else if(inpute.eq(4).val().length == 9){
                $.ajax({
                    url: '/ajax-update',
                    type: "POST",
                    data: {Telf: inpute.eq(4).val() , user_Tlef: user_Tlef ,  _token: $('meta[name="csrf-token"]').attr('content')},
                    success: function (response) {
                        if(response == "Yes"){
                            xTelf = false;
                            $('.inputtelf').text( "Phone number then entered before" );
                            inpute.eq(4).css('border','red solid 0.1px'); 
                            $('#basic-addon1').css('border','red solid 0.1px'); 
                            inpute.eq(4).css('border-left',''); 
                            $('#basic-addon1').css('border-right',''); 
                            labele.eq(3).css('color','red');
                        }else{
                            xTelf = true;
                            $('.inputtelf').text( "" );
                            inpute.eq(4).css('border',''); 
                            labele.eq(3).css('color','');
                            $('#basic-addon1').css('border',''); 
                        }
                    },
                    async: false 
                });
            }else{
                xTelf = false;
                $('.inputtelf').text( "The phone must contain 9 digits" );
                inpute.eq(4).css('border','red solid 0.1px'); 
                $('#basic-addon1').css('border','red solid 0.1px'); 
                inpute.eq(4).css('border-left',''); 
                $('#basic-addon1').css('border-right',''); 
                labele.eq(3).css('color','red');
            }
        }else{
            xTelf = true;
            $('.inputtelf').text( "" );
            inpute.eq(4).css('border',''); 
            labele.eq(3).css('color','');
            $('#basic-addon1').css('border',''); 
        }


        if(ximage){
            if(xusername && xEmail && xPasword && xTelf ){
                // submite
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })                      
                Toast.fire({
                    icon: 'success',
                    title: 'Then successfully Update'
                }) 
                setTimeout(() => {
                    $('form').submit()
                }, 1500)
            }
        }else{
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
        }

    })





});