import CityEn from "./Country/Villes.json" assert { type: "json" };
$(document).ready(function () {

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
        console.log('jj')
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
        console.log(xusername)
    });
});