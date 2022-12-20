$(document).ready(function () {

    const button_19 = $('.button_19');
    const cont_users = $('.cont_users');
    const validation_English = /^[a-zA-Z]+[0-9]*[a-zA-Z]*$/ ;
    const validation_email = /(^\w+([\.-]?\w+))+\@gmail.com$/;


    // animate botton users and Restaurant

    cont_users.css("transform" , window.localStorage.transformm);

    button_19.eq(0).click( e => {
        window.localStorage.transformm = "translate3d(0px, 0px, 0px)";
        cont_users.css({"transform": "translate3d(0px, 0px, 0px)", "transition-duration": "500ms"});
    });
    button_19.eq(1).click( e => {
        window.localStorage.transformm = "translate3d(-100%, 0px, 0px)";
        cont_users.css({"transform": "translate3d(-100%, 0px, 0px)", "transition-duration": "500ms"});
    });


    // show form add user
    
    const add_btn = $('.add_btn');
    const form = $('.add_form form');

    add_btn.each( e => {
        add_btn.eq(e).click( ell => {
            form.eq(e).slideToggle(400);
            form.eq(e).css('display','grid');
        })
    })

    // show image users

    const image_user = $('#image_user');
    const show_user = $('.show_user');

    image_user.change( e => {
        var filesArr = Array.prototype.slice.call(e.target.files);
        filesArr.forEach( f => {
            if (!f.type.match("image.*")) {
                var html ="<p>Please insert a photo</p>";
                show_user.html(html);
            }else{
                var storedFiles = [] ;
                storedFiles.push(f);
                var reader = new FileReader();
                reader.onload = function (e) {
                  var html ='<img src="' + e.target.result + '"data-file="' + f.name + 'alt="Category Image">';
                  show_user.html(html);
                };
                reader.readAsDataURL(f);
            }
        });
    });


    // ========================================================
    // ---------------------  add Users
    // ===========

    const add_user = $('.add-user');
    const input_add_user = $('.input_add_user');
    const label_add_user = $('.label_add_user');
    
    // const icone = btn_FAQ[ell].children[1];

    add_user.click( e => {
        e.preventDefault();
        var x = true;
        // validation username
        if(input_add_user.eq(0).val() == ""){
            x = false;
            input_add_user.eq(0).css('border','red solid'); 
            label_add_user.eq(0).css('color','red'); 
            const dive = input_add_user.eq(0).next();
            dive.text( "Please enter the UserName" );
        }else if(!input_add_user.eq(0).val().match(validation_English)){
            x = false;
            input_add_user.eq(0).css('border','red solid'); 
            label_add_user.eq(0).css('color','red'); 
            const dive = input_add_user.eq(0).next();
            dive.text( "Please enter a valid username exmple 'chbani04'" );
        }else{
            $.ajax({
                url: '/ajax-request',
                type: "POST",
                data: {username: input_add_user.eq(0).val() ,  _token: $('meta[name="csrf-token"]').attr('content')},
                success: function (response) {
                    if(response == "Yes"){
                        input_add_user.eq(0).css('border','red solid'); 
                        label_add_user.eq(0).css('color','red'); 
                        const dive = input_add_user.eq(0).next();
                        dive.text( "This is a username then entered before" );
                        x = false;
                    }else{
                        input_add_user.eq(0).css('border',''); 
                        label_add_user.eq(0).css('color',''); 
                        const dive = input_add_user.eq(0).next();
                        dive.text( "" );
                        x = true;
                    }
                }
            });
        };

        // validation Email
        if(input_add_user.eq(1).val() == ""){
            x = false;
            input_add_user.eq(1).css('border','red solid'); 
            label_add_user.eq(1).css('color','red'); 
            const dive = input_add_user.eq(1).next();
            dive.text( "Please enter the Email" );
        }else if(!input_add_user.eq(1).val().match(validation_email)){
            x = false;
            input_add_user.eq(1).css('border','red solid'); 
            label_add_user.eq(1).css('color','red'); 
            const dive = input_add_user.eq(1).next();
            dive.text( "email" );
        }else{
            $.ajax({
                url: '/ajax-request',
                type: "POST",
                data: {Email: input_add_user.eq(1).val() ,  _token: $('meta[name="csrf-token"]').attr('content')},
                success: function (response) {
                    if(response == "Yes"){
                        input_add_user.eq(1).css('border','red solid'); 
                        label_add_user.eq(1).css('color','red'); 
                        const dive = input_add_user.eq(1).next();
                        dive.text( "sfsdfdsfsfsf" );
                        x = false;
                    }else{
                        input_add_user.eq(1).css('border',''); 
                        label_add_user.eq(1).css('color',''); 
                        const dive = input_add_user.eq(1).next();
                        dive.text( "" );
                        x = true;
                    }
                }
            });
        }

        // validation Pasword
        if(input_add_user.eq(2).val() == ""){
            x = false;
            input_add_user.eq(2).css('border','red solid'); 
            label_add_user.eq(2).css('color','red'); 
            const dive = input_add_user.eq(2).next();
            dive.text( "Please enter the Pasword" );
        }else{
            input_add_user.eq(2).css('border',''); 
            label_add_user.eq(2).css('color',''); 
            const dive = input_add_user.eq(2).next();
            dive.text( "" ); 
            x = true;
        }

        // validation Config-Password
        if(input_add_user.eq(3).val() == ""){
            x = false;
            input_add_user.eq(3).css('border','red solid'); 
            label_add_user.eq(3).css('color','red'); 
            const dive = input_add_user.eq(3).next();
            dive.text( "Please enter the Config-Password" );
        }else if(input_add_user.eq(2).val() != input_add_user.eq(3).val()){
            input_add_user.eq(3).css('border','red solid'); 
            label_add_user.eq(3).css('color','red'); 
            const dive = input_add_user.eq(3).next();
            dive.text( "ggggConfig-Password" );
            x = false;
        }else{
            x = true;
            input_add_user.eq(3).css('border',''); 
            label_add_user.eq(3).css('color',''); 
            const dive = input_add_user.eq(3).next();
            dive.text( "" ); 
        }

        // validation Telf

        // if(input_add_user.eq(4).val() != ""){

        // }

        // validation Profile-Photo

        
        // if(show_user.children().length == 1){
        //     console.log(show_user.children().eq(0).text())
        //     // if(show_user.children().eq(0).text() == "Please insert a photo"){

        //     // }
        // }

        if(x){
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
              
            Toast.fire({
                icon: 'success',
                title: 'Then successfully'
            })

            setTimeout(() => {
                form[0].submit()
            }, "3000")
        }
        
        
    })
})