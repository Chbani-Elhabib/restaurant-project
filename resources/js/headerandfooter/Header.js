$(document).ready(function(){

    const getstart = $('.get-start');
    const sign = $('.sign');
    const labelsign = $('.label-sign');
    const inputsign = $('.input-sign');
    const eye = $('.eye');
    const xmark = $('.fa-xmark');
    const submit = $('.submit');


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
        inputsign[e].addEventListener("keyup", (el) => {
      
            // start show and hed eye 
            if (inputsign[1].value.length >= 1) {
                eye.css("display", "block");
            }else if (inputsign[1].value.length < 1) {
                eye.css("display", "none");
            };
            // end show and hed eye 
    
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

    // start click submit form sign in 
    submit.click( e => {

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
                url: "database/loginverification.php",
                type: "POST",
                data: {username: inputsign[0].value, Password: inputsign[1].value},
                success: function (response) {}
            });
        };

        
    });
    // end click submit form sign in 

    
    
    
    
});

