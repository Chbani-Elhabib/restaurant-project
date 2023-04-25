import CityEn from "./Country/Villes.json" assert { type: "json" };
$(document).ready(function () {

    
    const validation_English = /^[a-zA-Z]+[0-9]*[a-zA-Z]*$/ ;
    const validation_email = /(^\w+([\.-]?\w+))+\@gmail.com$/;
    const validation_Telf = /^[0-9]+$/;

    const inpute = $('.inpute');

    if( inpute.eq(7).attr('data').length  > 0 ){
        var html = "";
        if (inpute.eq(6).val() == "") {
            html += "<option></option>";
        }else {
            html += "<option selected disabled></option>";
            CityEn.map((city) => {
                if (inpute.eq(6).val() == city.region) {
                    html += '<option value="' + city.ville + '"' ;
                    if( inpute.eq(7).attr('data') == city.ville  ){
                        html += 'selected'
                    } 
                    html += '>' + city.ville +  '</option>';
                }
            });
        }
        inpute.eq(7).html(html);
    }

    inpute.eq(6).change( function(){
        var html = "";
        if ($(this).val() == "") {
            html += "<option></option>";
        } else {
            html += "<option selected disabled></option>";
            CityEn.map((city) => {
                if ($(this).val() == city.region) {
                    html +=
                        '<option value="' +
                        city.ville +
                        '">' +
                        city.ville +
                        "</option>";
                }
            });
        }
        $(this).parent().next().children().eq(1).html(html);
    })

    // change image 
    inpute.eq(0).change( e => {  
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
                    inpute.eq(0).prev().attr("src" , e.target.result );
                };
                reader.readAsDataURL(f);
            }
        });
    });


    // click update 
    var user_name = inpute.eq(1).val();
    var user_Email = inpute.eq(2).val();
    var user_Tlef = inpute.eq(4).val()

    $('.Update').click( e => {
        
        e.preventDefault();

        // validation username
        var  xusername = true;
        if(inpute.eq(1).val() == ""){
            xusername = false;
            inpute.eq(1).css('border','0.7px solid #ec1e1ea1'); 
            inpute.eq(1).prev().addClass('text-danger'); 
            inpute.eq(1).next().text( "Please enter the UserName" );
        }else if(!inpute.eq(1).val().match(validation_English)){
            xusername = false;
            inpute.eq(1).css('border','0.7px solid #ec1e1ea1'); 
            inpute.eq(1).prev().addClass('text-danger'); 
            inpute.eq(1).next().text( "Please enter a valid username exmple 'chbani04'" );
        }else{
            $.ajax({
                url: '/ajax-update',
                type: "POST",
                data: {username: inpute.eq(1).val() , user_name: user_name ,  _token: $('meta[name="csrf-token"]').attr('content')},
                success: function (response) {
                    if(response == "No"){
                        xusername = false;
                        inpute.eq(1).css('border','0.7px solid #ec1e1ea1'); 
                        inpute.eq(1).prev().addClass('text-danger'); 
                        inpute.eq(1).next().text( "This is a username then entered before" );
                    }else{
                        xusername = true;
                        inpute.eq(1).css('border',''); 
                        inpute.eq(1).prev().removeClass('text-danger');
                        inpute.eq(1).next().text( "" );;
                    }
                },
                async: false 
            });
        }

        // validation Email
        var  xEmail = true;
        if(inpute.eq(2).val() == ""){
            xEmail = false;
            inpute.eq(2).css('border','0.7px solid #ec1e1ea1'); 
            inpute.eq(2).prev().addClass('text-danger'); 
            inpute.eq(2).next().text( "Please enter the Email" );
        }else if(!inpute.eq(2).val().match(validation_email)){
            xEmail = false;
            inpute.eq(2).css('border','0.7px solid #ec1e1ea1'); 
            inpute.eq(2).prev().addClass('text-danger'); 
            inpute.eq(2).next().text( "Please enter a valid Email exmple 'chbani@gmail.com'" );
        }else{
            $.ajax({
                url: '/ajax-update',
                type: "POST",
                data: {Email: inpute.eq(2).val() , user_Email: user_Email ,  _token: $('meta[name="csrf-token"]').attr('content')},
                success: function (response) {
                    if(response == "Yes"){
                        xEmail = false;
                        inpute.eq(2).css('border','0.7px solid #ec1e1ea1'); 
                        inpute.eq(2).prev().addClass('text-danger'); 
                        inpute.eq(2).next().text( "This is a Email then entered before" );
                    }else{
                        xEmail = true;
                        inpute.eq(2).css('border',''); 
                        inpute.eq(2).prev().removeClass('text-danger'); 
                        inpute.eq(2).next().text( "" );
                    }
                },
                async: false 
            });
        }

        
        // validation Country:
        var xCountry = true ;
        if(inpute.eq(5).val() != 'Morroco'){
            xCountry = false ;
            inpute.eq(5).css('border','0.7px solid #ec1e1ea1'); 
            inpute.eq(5).prev().addClass( 'text-danger' )
            inpute.eq(5).next().text( 'please enter in Country' )
        }else{
            xCountry = true ;
            inpute.eq(5).css( 'border' , '' )
            inpute.eq(5).prev().removeClass( 'text-danger' )
            inpute.eq(5).next().text( '' )
        }

        // validation Regions:
        var xRegions = true ;
        if( inpute.eq(6).val() != null ){
            if($.isNumeric(inpute.eq(6).val())){
                if( inpute.eq(6).val() <= 0 || inpute.eq(6).val()  > 9 ){
                    xRegions = false ;
                    inpute.eq(6).css('border','0.7px solid #ec1e1ea1'); 
                    inpute.eq(6).prev().addClass( 'text-danger' )
                    inpute.eq(6).next().text( 'please enter in Regions' )
                }else{
                    xRegions = true ;
                    inpute.eq(6).css( 'border' , '' )
                    inpute.eq(6).prev().removeClass( 'text-danger' )
                    inpute.eq(6).next().text( '' )
                }
            }else{
                xRegions = false ;
                inpute.eq(6).css('border','0.7px solid #ec1e1ea1'); 
                inpute.eq(6).prev().addClass( 'text-danger' )
                inpute.eq(6).next().text( 'please enter in Regions' )
            }
        }

        if(xusername && xEmail && xCountry && xRegions ){
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



    });
});