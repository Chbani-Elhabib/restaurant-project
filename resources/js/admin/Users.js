$(document).ready(function () {

    const button_19 = $('.button_19');
    const cont_users = $('.cont_users');


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

    add_btn.click( e => {
        form.slideToggle(400);
        form.css('display','grid');
    })


    // show image users

    const image_user = $('#image_user');
    const show_user = $('.show_user');

    image_user.change( e => {
        var filesArr = Array.prototype.slice.call(e.target.files);
        filesArr.forEach( f => {
            if (!f.type.match("image.*")) {
                var html ="<p>Please insert a photo please</p>";
                show_user.html(html);
            }else{
                var storedFiles = [] ;
                storedFiles.push(f);
                var reader = new FileReader();
                reader.onload = function (e) {
                  var html ='<img src="' + e.target.result + "\" data-file='" + f.name + "alt='Category Image' height='200px' width='200px'>";
                  show_user.html(html);
                };
                reader.readAsDataURL(f);
            }
        });
    });

})