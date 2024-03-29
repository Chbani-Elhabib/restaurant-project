import CityEn from "./Country/Villes.json" assert { type: "json" };
$(document).ready(function(){

    const validation_English = /^[a-zA-Z]+[0-9]*[a-zA-Z]*$/ ;
    const validation_email = /(^\w+([\.-]?\w+))+\@gmail.com$/;
    const validation_Telf = /^[0-9]+$/;

    // show addriss and city and 
    const inpute = $('.inpute');
    const adctiy = $('.content section .shadowee form div:nth-child(11)');

    if( inpute.eq(5).val() == 'Liverour'){
        adctiy.slideDown(500);
        adctiy.css('display' , 'grid')
        var html = "";
        if (inpute.eq(7).val() == "") {
            html += "<option></option>";
        }else {
            html += "<option selected disabled></option>";
            CityEn.map((city) => {
                if (inpute.eq(7).val() == city.region) {
                    html += '<option value="' + city.ville + '"' ;
                    if( inpute.eq(8).attr('data') == city.ville  ){
                        html += 'selected'
                    } 
                    html += '>' + city.ville +  '</option>';
                }
            });
        }
        inpute.eq(8).html(html);
    }

    inpute.eq(5).change( function(){
        if( inpute.eq(5).val() == "Liverour"){
            adctiy.slideDown(500);
            adctiy.css('display' , 'grid')
        }else{
            adctiy.slideUp(500);
        }
    })


    inpute.eq(7).change(function () {
        var html = "";
        if ($(this).val() == "") {
            html += "<option></option>";
        }else {
            html += "<option selected disabled></option>";
            CityEn.map((city) => {
                if ($(this).val() == city.region) {
                    html +='<option value="' + city.ville + '">' + city.ville +  "</option>";
                }
            });
        }
        $(this).parent().next().children().eq(1).html(html);
    });



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

                shadow.attr("src" ,'/ImageUsers/Users.png');
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


    // add to class active in lable 

    const togglebtns = $('.toggle-btn')

    togglebtns.each( e => {
        togglebtns.eq(e).click( function(){
            $(this).children().eq(1).toggleClass('active');
            if ($(this).children().eq(0).attr('checked')) {
                $(this).children().eq(0).removeAttr('checked');
            } else {
                $(this).children().eq(0).attr('checked', 'checked');
            }
        })
    })

    inpute.eq(4).keyup(function(e){
		if (/\D/g.test(this.value)){
			this.value = this.value.replace(/\D/g, '');
		}
	});

    // click apdate 
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
                inpute.eq(3).css('border','solid #dd3a49 0.5px'); 
                inpute.eq(3).prev().addClass('text-danger'); 
                inpute.eq(3).next().text( "Please enter the Config-Password" );
            }else if(inpute.eq(2).val() != inpute.eq(3).val()){
                xPasword = false;
                inpute.eq(3).css('border','solid #dd3a49 0.5px'); 
                inpute.eq(3).prev().addClass('text-danger'); 
                inpute.eq(3).next().text( "The password does not match the confirm password" );
            }else{
                xPasword = true;
                inpute.eq(3).css('border',''); 
                inpute.eq(3).prev().removeClass('text-danger'); 
                inpute.eq(3).next().text( "" ); 
            }
        }

        // validation Telf
        var xTelf = true;
        // if(inpute.eq(4).val().length > 0){
        //     if(!inpute.eq(4).val().match(validation_Telf)){
        //         xTelf = false;
        //         $('.inputtelf').text( "Please write the correct phone number" );
        //         inpute.eq(4).css('border','red solid 0.1px'); 
        //         $('#basic-addon1').css('border','red solid 0.1px'); 
        //         inpute.eq(4).css('border-left',''); 
        //         $('#basic-addon1').css('border-right',''); 
        //         labele.eq(3).css('color','red');
        //     }else if(inpute.eq(4).val().length == 9){
        //         $.ajax({
        //             url: '/ajax-update',
        //             type: "POST",
        //             data: {Telf: inpute.eq(4).val() , user_Tlef: user_Tlef ,  _token: $('meta[name="csrf-token"]').attr('content')},
        //             success: function (response) {
        //                 if(response == "Yes"){
        //                     xTelf = false;
        //                     $('.inputtelf').text( "Phone number then entered before" );
        //                     inpute.eq(4).css('border','red solid 0.1px'); 
        //                     $('#basic-addon1').css('border','red solid 0.1px'); 
        //                     inpute.eq(4).css('border-left',''); 
        //                     $('#basic-addon1').css('border-right',''); 
        //                     labele.eq(3).css('color','red');
        //                 }else{
        //                     xTelf = true;
        //                     $('.inputtelf').text( "" );
        //                     inpute.eq(4).css('border',''); 
        //                     labele.eq(3).css('color','');
        //                     $('#basic-addon1').css('border',''); 
        //                 }
        //             },
        //             async: false 
        //         });
        //     }else{
        //         xTelf = false;
        //         $('.inputtelf').text( "The phone must contain 9 digits" );
        //         inpute.eq(4).css('border','red solid 0.1px'); 
        //         $('#basic-addon1').css('border','red solid 0.1px'); 
        //         inpute.eq(4).css('border-left',''); 
        //         $('#basic-addon1').css('border-right',''); 
        //         labele.eq(3).css('color','red');
        //     }
        // }else{
        //     xTelf = true;
        //     $('.inputtelf').text( "" );
        //     inpute.eq(4).css('border',''); 
        //     labele.eq(3).css('color','');
        //     $('#basic-addon1').css('border',''); 
        // }

        var xLiverour = true ;
        if( inpute.eq(5).val() == 'Liverour'){
            var xmarroco = true ;
            if(inpute.eq(6).val() != 'Morroco'){
                xmarroco = false ;
                inpute.eq(6).css( 'border' , '0.5px solid #ff000099' )
                inpute.eq(6).prev().addClass( 'text-danger' )
                inpute.eq(6).next().text( 'Please enter the Country' )
            }else{
                xmarroco = true ;
                inpute.eq(6).css( 'border' , '' )
                inpute.eq(6).prev().removeClass( 'text-danger' )
                inpute.eq(6).next().text( '' )
            }

            var xRegions = true ;
            if( inpute.eq(7).val()  === null ){
                xRegions = false ;
                inpute.eq(7).css( 'border' , '0.5px solid #ff000099' )
                inpute.eq(7).prev().addClass( 'text-danger' )
                inpute.eq(7).next().text( 'Please enter the Regions' )
            }else if( inpute.eq(7).val() <= 0 || inpute.eq(7).val()  > 12 ){
                location.reload();
            }else{
                xRegions = true ;
                inpute.eq(7).css( 'border' , '' );
                inpute.eq(7).prev().removeClass( 'text-danger' );
                inpute.eq(7).next().text( '' );
            }

            var xcity  = true ;
            if(inpute.eq(8).val() === null){
                xcity = false ;
                inpute.eq(8).css( 'border' , '0.5px solid #ff000099' )
                inpute.eq(8).prev().addClass( 'text-danger' )
                inpute.eq(8).next().text( 'Please enter the Country' )
            }else{
                xcity = true ;
                inpute.eq(8).css( 'border' , '' )
                inpute.eq(8).prev().removeClass( 'text-danger' )
                inpute.eq(8).next().text( '' )
            }

            if( xmarroco && xRegions && xcity ){
                xLiverour = true ;
            }else{
                xLiverour = false ;
            }

        }

        if(xusername && xEmail && xPasword && xTelf && xLiverour ){
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



    })





});