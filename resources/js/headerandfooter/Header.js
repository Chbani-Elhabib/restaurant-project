$(document).ready(function(){

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

    // start validation
    const validation_Username = /^[a-zA-Z]+[0-9]*[a-zA-Z]*$/;
    const validation_email = /(^\w+([\.-]?\w+))+\@gmail.com/;
    // end validation

    function Notifications(Toast , message) {
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
        Command: toastr[Toast](" ", message )
    };

    // start animation to btn get started
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

    // start foreach to input
    inputsign.each((e) => {
        // start keyup to input 
        inputsign.eq(e).keyup((el) => {
      
            // start show and hed eye 
            if (inputsign[1].value.length >= 1) {
                eye.css("display", "block");
            }else if (inputsign[1].value.length < 1) {
                eye.css("display", "none");
            };
            // end show and hed eye 

            // ======================================================================================
            // -------------------------  keyup sign up 
            // ====================

            // start keyup falidation ipute

            // validation  usersname
            if (inputsign[2].value.length >= 4 && inputsign[2].value.match(validation_Username)) {
                $.ajax({
                    url: '/ajax-request-username',
                    type: "POST",
                    data: { _token : '{{csrf_token()}}' , username: inputsign[2].value},
                    success: function (response) {
                        console.log(response)
                        // if(response == login__input[0].value){
                        // validation.eq(0).removeClass("icon-check");
                        // validation.eq(0).addClass("icon-cancel-circle");
                        // login__input.eq(0).css("border-bottom-color", "rgb(245, 1, 57)");
                        // }else{
                        // validation.eq(0).addClass("icon-check");
                        // validation.eq(0).removeClass("icon-cancel-circle");
                        // login__input.eq(0).css("border-bottom-color", "rgb(10, 243, 6)");
                        // }
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
    
        });  
        // end keyup to input 
    });
    // end foreach to input


    // start click to eye 
    eye.click( e => {
        if(eye.attr( "src" ) == 'image/close_eye.png'){
            eye.attr( "src","image/eye_open.png" );
            inputsign.eq(1).attr( "type","text" );
        }else{
            eye.attr( "src","image/close_eye.png" );
            inputsign.eq(1).attr( "type","password" );
        }
    })
    // end click to eye 

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

        // if(inputsign[1].value.length > 0 && inputsign[0].value.length > 0 ){
        //     $.ajax({
        //         url: "database/loginverification.php",
        //         type: "POST",
        //         data: {username: inputsign[0].value, Password: inputsign[1].value},
        //         success: function (response) {}
        //     });
        // };

        
    });
    // end click submit form sign in 

    // ==================================================================================================
    // -----------------------------          click sign up
    // =====================

    // start click submit form sign up 
    submit.eq(1).click( e => {

        // turning off button submit
        e.preventDefault();

        // valid username
        if(inputsign[2].value.length == 0){
            Notifications("error" , "please enter a valid username");
            span.eq(2).addClass("span01");
            labelsign.eq(2).addClass("label");
        };

        // valid email
        if(inputsign[3].value.length == 0){
            Notifications("error" , 'please enter a valid email');
            span.eq(3).addClass("span01");
            labelsign.eq(3).addClass("label");
        };

        // valid password
        if(inputsign[4].value.length == 0){
            Notifications("error" , 'please enter a valid password');
            span.eq(4).addClass("span01");
            labelsign.eq(4).addClass("label");
        };

        // valid password
        if(inputsign[5].value.length == 0){
            Notifications("error" , 'please enter a valid Confirm Password');
            span.eq(5).addClass("span01");
            labelsign.eq(5).addClass("label");
        };

        // if(inputsign[1].value.length > 0 && inputsign[0].value.length > 0 ){
        //     $.ajax({
        //         url: "database/loginverification.php",
        //         type: "POST",
        //         data: {username: inputsign[0].value, Password: inputsign[1].value},
        //         success: function (response) {}
        //     });
        // };

        
    });
    // end click submit form sign up 

    
    
    
    
});

