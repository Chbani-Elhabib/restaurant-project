$(document).ready(function(){

    // window.location.reload();
    const getstart = $('.get-start');
    const sign = $('.sign');
    const center = $('.center');
    const span = $('.span');
    const labelsign = $('.label-sign');
    const inputsign = $('.input-sign');
    const eye = $('.eye');
    const xmark = $('.fa-xmark');
    const submit = $('.submit');
    const sign_in = $('.header .sign .center form .signup_link a');
    const form = $('form')

    // scrole top 
    $('.back-top-btn').click( function(){
        $('html, body').animate({ scrollTop: 0 }, 'slow');
    })

    // verify Email 
    const Email = $('.header div.verify i')
    Email.click( function(){
        $(this).parent().animate( {left : '130%'} , 500);
        setTimeout(() => {
            $(this).parent().remove()
        }, 500);
    })

    /*
    **** header sticky & back to top
    */

    const header = document.querySelector("[data-header]");
    const backTopBtn = document.querySelector("[data-back-top-btn]");

    window.addEventListener("scroll", function () {
        if (window.scrollY >= 100) {
            header.classList.add("active");
            backTopBtn.classList.add("active");
        } else {
            header.classList.remove("active");
            backTopBtn.classList.remove("active");
        }
    });

    // profile
    const menu = $(".menu");
    $(".action").on("click", function () {
        menu.toggleClass("active");
    });


    // start validation
    const validation_Username = /^[a-zA-Z]+[0-9]*[a-zA-Z]*$/;
    const validation_email = /(^\w+([\.-]?\w+))+\@gmail.com$/;
    // end validation

    function Notifications(Toast , message) {
        Command: toastr[Toast](" ", message )
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
    };

    // start animation to btn get started

    if(getstart.length != 0 ){
        getstart[0].addEventListener('mouseenter', function (e) {
            let x = e.clientX - e.target.offsetLeft;
            let y = e.clientY - e.target.offsetTop;
            let ripples = document.createElement('span');
    
            ripples.style.left = x + 'px';
            ripples.style.top = y + 'px';
    
            this.appendChild(ripples);
            setTimeout(() => {
                ripples.remove();
            }, 1000);
        });
    }

    // end animation to btn get started

    // start click to btn get start && open form sign in 
    getstart.click( e => {
        sign.css("display","block");
    })
    // end click to btn get start && open form sign in 

    // start click to sign up && open form sign up 
    sign_in.eq(0).click( e => {
        center.eq(0).css("display","none");
        center.eq(1).css("display","block");
    });
    // end click to sign up && open form sign up 

    // start click to sign in && open form sign in
    sign_in.eq(1).click( e => {
        center.eq(1).css("display","none");
        center.eq(0).css("display","block");
    });
    // end click to sign in && open form sign in 

    // start click to btn fa-xmark "X" && close form sign in 
    xmark.click( e => {
        sign.css("display","");
    })
    // end click to btn fa-xmark "X" && close form sign in 

    // start click background to close form sing in 
    sign.click( e => {
        if(e.target.classList.contains('sign')){
            sign.css("display","");
        }
    });
    // end click background to close form sing in

    // start click lable to element focuse inpute
    labelsign.each((e) => {
        labelsign.eq(e).click((ele) => {
            inputsign[e].focus();
        });
    });
    // end click lable to element focuse inpute

    // ==================================================================================================
    // -----------------------------          keyup sign in and sign up
    // =====================

    // start foreach to input
    inputsign.each((e) => {
        // start keyup to input 
        inputsign.eq(e).keyup((el) => {
      
            // start show and hed eye 
            if (inputsign[1].value.length >= 1) {
                eye.eq(0).css("display", "block");
            }else if (inputsign[1].value.length < 1) {
                eye.eq(0).css("display", "none");
            };
            // end show and hed eye 

            // start show and hed eye 
            if (inputsign[4].value.length >= 1) {
                eye.eq(1).css("display", "block");
            }else if (inputsign[4].value.length < 1) {
                eye.eq(1).css("display", "none");
            };
            // end show and hed eye 

            // ======================================================================================
            // -------------------------  keyup sign up 
            // ====================

            // start keyup falidation ipute

            // validation  usersname
            if (inputsign[2].value.length >= 4 && inputsign[2].value.match(validation_Username)) {

                $.ajax({
                    url: '/ajax-request',
                    type: "POST",
                    data: {username: inputsign[2].value ,  _token: $('meta[name="csrf-token"]').attr('content')},
                    success: function (response) {
                        if(response == "Yes"){
                            span.eq(2).removeClass("span01valide");
                            labelsign.eq(2).removeClass("labelvalide");
                            span.eq(2).addClass("span01");
                            labelsign.eq(2).addClass("label");
                        }else{
                            span.eq(2).removeClass("span01");
                            labelsign.eq(2).removeClass("label");
                            span.eq(2).addClass("span01valide");
                            labelsign.eq(2).addClass("labelvalide");
                        }
                    },
                });
            } 
            // else if((validation.eq(0).attr("class") == "validation icon-check" && login__input[0].value.length < 4) ||
            // (!login__input[0].value.match(validation_Username) && validation.eq(0).attr("class") == "validation icon-check")){
            //     // validation.eq(0).removeClass("icon-check");
            //     // validation.eq(0).addClass("icon-cancel-circle");
            //     // login__input.eq(0).css("border-bottom-color", "rgb(245, 1, 57)");
            //     console.log("111111")
            // }
            // end keyup falidation ipute

            // validation  Email
            if (inputsign[3].value.match(validation_email)) {

                $.ajax({
                    url: '/ajax-request',
                    type: "POST",
                    data: {Email: inputsign[3].value ,  _token: $('meta[name="csrf-token"]').attr('content')},
                    success: function (response) {
                        if(response == "Yes"){
                            span.eq(3).removeClass("span01valide");
                            labelsign.eq(3).removeClass("labelvalide");
                            span.eq(3).addClass("span01");
                            labelsign.eq(3).addClass("label");
                        }else{
                            span.eq(3).removeClass("span01");
                            labelsign.eq(3).removeClass("label");
                            span.eq(3).addClass("span01valide");
                            labelsign.eq(3).addClass("labelvalide");
                        };
                    },
                });
            } 



    
        });  
        // end keyup to input 
    });
    // end foreach to input


    // start click to eye sing in
    eye.eq(0).click( e => {
        if(eye.eq(0).attr( "src" ) == '/image/close_eye.png'){
            eye.eq(0).attr( "src","/image/eye_open.png" );
            inputsign.eq(1).attr( "type","text" );
        }else{
            eye.eq(0).attr( "src","/image/close_eye.png" );
            inputsign.eq(1).attr( "type","password" );
        }
    })
    // end click to eye sing in

    // start click to eye sing up
    eye.eq(1).click( e => {
        if(eye.eq(1).attr( "src" ) == '/image/close_eye.png'){
            eye.eq(1).attr( "src","/image/eye_open.png" );
            inputsign.eq(4).attr( "type","text" );
            inputsign.eq(5).attr( "type","text" );
        }else{
            eye.eq(1).attr( "src","/image/close_eye.png" );
            inputsign.eq(4).attr( "type","password" );
            inputsign.eq(5).attr( "type","password" );
        }
    })
    // end click to eye sing up

    // ==================================================================================================
    // -----------------------------          click sign in
    // =====================

    // start click submit form sign in 
    submit.eq(0).click( e => {

        // turning off button submit
        e.preventDefault();

        // valid username
        if(inputsign[0].value.length == 0){
            Notifications("error" , "please enter a valid username")
        };

        // valid password
        if(inputsign[1].value.length == 0){
            Notifications("error" , 'please enter a valid password')
        };

        if(inputsign[1].value.length > 0 && inputsign[0].value.length > 0 ){
            $.ajax({
                url: '/ajax-request',
                type: "POST",
                data: { username: inputsign[0].value , password: inputsign[1].value ,  _token: $('meta[name="csrf-token"]').attr('content')},
                success: function (response) {
                    if(response == "No"){
                        Notifications("error" , "The username and password are incorrect");
                    }else{
                        Notifications("success" , 'welcome '+ inputsign[0].value );          
                        setTimeout((el) => {
                            form[0].submit();
                        },4000)
                    }
                },
            });
        };

        
    });
    // end click submit form sign in 

    // ==================================================================================================
    // -----------------------------          click sign up
    // =====================

    // start click submit form sign up 
    submit.eq(1).click( e => {

        // turning off button submit
        e.preventDefault();
        var valid = true;

        // valid username
        if(inputsign[2].value.length == 0){
            Notifications("error" , "please enter a valid username");
            span.eq(2).removeClass("span01valide");
            labelsign.eq(2).removeClass("labelvalide");            
            span.eq(2).addClass("span01");
            labelsign.eq(2).addClass("label");
            valid = false;
        }else if(!inputsign[2].value.match(validation_Username) || inputsign[2].value.length < 4){
            Notifications("error" , "example: username4452");
            span.eq(2).removeClass("span01valide");
            labelsign.eq(2).removeClass("labelvalide");           
            span.eq(2).addClass("span01");
            labelsign.eq(2).addClass("label");
            valid = false;
        }else {
            $.ajax({
                url: '/ajax-request',
                type: "POST",
                data: {username: inputsign[2].value ,  _token: $('meta[name="csrf-token"]').attr('content')},
                success: function (response) {
                    if(response == "Yes"){
                        Notifications("error" , "Please change your username again");
                        span.eq(2).removeClass("span01valide");
                        labelsign.eq(2).removeClass("labelvalide");
                        span.eq(2).addClass("span01");
                        labelsign.eq(2).addClass("label");
                        valid = false;
                    }
                },
            });
        };

        // valid email
        if(inputsign[3].value.length == 0){
            Notifications("error" , 'please enter a valid email');
            span.eq(3).removeClass("span01valide");
            labelsign.eq(3).removeClass("labelvalide"); 
            span.eq(3).addClass("span01");
            labelsign.eq(3).addClass("label");
            valid = false;
        }else if(!inputsign[3].value.match(validation_email)){
            Notifications("error" , 'example: users@gmail.com');
            span.eq(3).removeClass("span01valide");
            labelsign.eq(3).removeClass("labelvalide"); 
            span.eq(3).addClass("span01");
            labelsign.eq(3).addClass("label");
            valid = false;
        }else{
            $.ajax({
                url: '/ajax-request',
                type: "POST",
                data: {Email: inputsign[3].value ,  _token: $('meta[name="csrf-token"]').attr('content')},
                success: function (response) {
                    if(response == "Yes"){
                        Notifications("error" , 'This email address is already registered');
                        span.eq(3).removeClass("span01valide");
                        labelsign.eq(3).removeClass("labelvalide");
                        span.eq(3).addClass("span01");
                        labelsign.eq(3).addClass("label");
                        valid = false;
                    };
                }
            });
        };

        // valid password
        if(inputsign[4].value.length == 0){
            Notifications("error" , 'please enter a valid password');
            span.eq(4).removeClass("span01valide");
            labelsign.eq(4).removeClass("labelvalide"); 
            span.eq(4).addClass("span01");
            labelsign.eq(4).addClass("label");
            valid = false;
        };

        // valid Confirm password
        if(inputsign[5].value.length == 0){
            Notifications("error" , 'please enter a valid confirm password');
            span.eq(5).removeClass("span01valide");
            labelsign.eq(5).removeClass("labelvalide"); 
            span.eq(5).addClass("span01");
            labelsign.eq(5).addClass("label");
            valid = false;
        }else if(inputsign[5].value.length != inputsign[4].value.length ){
            Notifications("error" , 'Password does not match the confirm password');
            span.eq(5).removeClass("span01valide");
            labelsign.eq(5).removeClass("labelvalide"); 
            span.eq(5).addClass("span01");
            labelsign.eq(5).addClass("label");
            valid = false;
        };


        // valid
        if(valid){

            Notifications("success" , 'Then register successfully');          
            setTimeout((el) => {
                form[1].submit();
            },4000)

        }



        
    });
    // end click submit form sign up 

    

    
    
});

