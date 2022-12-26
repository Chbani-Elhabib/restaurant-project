$(document).ready(function () {

    const button_19 = $('.button_19');
    const cont_users = $('.cont_users');
    const validation_English = /^[a-zA-Z]+[0-9]*[a-zA-Z]*$/ ;
    const validation_email = /(^\w+([\.-]?\w+))+\@gmail.com$/;
    const validation_Telf = /^[0-9]+$/;


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

    // Show user
    const pet_select = $('.pet-select');
    const table_users = $('.table_users');
    var userss = '';
    pet_select.change ( e => {
        $.ajax({
            url: '/users/show',
            type: "POST",
            data: {User_Group: pet_select.val() , _token: $('meta[name="csrf-token"]').attr('content')},
            success: function (response) {
                if(response.length > 0){
                    var html = '<table class="table table-hover">\
                                    <thead>\
                                        <tr>\
                                            <th scope="col">Users information</th>\
                                            <th scope="col">User job </th>\
                                            <th scope="col">Update</th>\
                                            <th scope="col">Update password</th>\
                                            <th scope="col">Delete</th>\
                                        </tr>\
                                    </thead>\
                                    <tbody id="myTable">';
                    response.map( user => {
                        console.log()
    
                        html +='<tr><th scope="row"><div class="usersin">';
                        html +='<div><img src="/ImageUsers/' + user['Photo'] +'" alt="profaile users"></div>';
                        html +='<div><h5>'+ user['UserName'] +'</h5><p>'+ user['Email'] +'</p></div></div></th>';
                        html +='<td><h5>' + user['User_Group'] + '</h5></td>';
                        html +='<td><button class="button_19 Update">Update</button></td>';
                        html +='<td><button class="button_19">Update password</button></td>';
                        html +='<td><button class="button_19">Delete</button></td></tr>';
                    });
                    html += '</tbody></table>';
                    table_users.html(html);
                }else{
                    table_users.html('<p class="data_null">We do not have any user information you are looking for</p>')
                }
            },
            async: false 
        });
    })
    $.ajax({
        url: '/users/show',
        type: "POST",
        data: {User_Group: pet_select.val() , _token: $('meta[name="csrf-token"]').attr('content')},
        success: function (response) {
            userss = response ;
            if(response.length > 0){
                var html = '<table class="table table-hover">\
                                <thead>\
                                    <tr>\
                                        <th scope="col">Users information</th>\
                                        <th scope="col">User job </th>\
                                        <th scope="col">Update</th>\
                                        <th scope="col">Update password</th>\
                                        <th scope="col">Delete</th>\
                                    </tr>\
                                </thead>\
                                <tbody id="myTable">';
                response.map( user => {
                    console.log()

                    html +='<tr><th scope="row"><div class="usersin"><div>';
                    html +='<img src="/ImageUsers/' + user['Photo'] +'" alt="profaile users">';
                    html +='</div><div><h5>'+ user['UserName'] +'</h5><p>'+ user['Email'] +'</p></div></div></th>';
                    html +='<td><h5>' + user['User_Group'] + '</h5></td>';
                    html +='<td><button class="button_19 Update">Update</button></td>';
                    html +='<td><button class="button_19">Update password</button></td>';
                    html +='<td><button class="button_19">Delete</button></td></tr>';
                });
                html += '</tbody></table>';
                table_users.html(html);
            }else{
                table_users.html('<p class="data_null">We do not have any user information you are looking for</p>')
            }
        },
        async: false 
    });

    //research
    const input_research_users = $('.input_research_users');
    input_research_users.keyup(e =>{
        var value = input_research_users.val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    // click en Update
    const Update = $('.button_19.Update');
    const tablee = $('#myTable tr td:nth-child(3)');

        tablee.on('click' , '.button_19.Update' , ell => {
            console.log(ell)
            console.log(userss[ell])
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

    input_add_user.eq(4).keyup( e => {
        if(!input_add_user.eq(4).val().match(validation_Telf)){
            input_add_user.eq(4).css('border','red solid 0.1px'); 
            label_add_user.eq(4).css('color','red'); 
        }else if(input_add_user.eq(4).val().length > 9){
            input_add_user.eq(4).css('border','red solid 0.1px'); 
            label_add_user.eq(4).css('color','red'); 
        }else{
            input_add_user.eq(4).css('border',''); 
            label_add_user.eq(4).css('color',''); 
        }
        if(input_add_user.eq(4).val() == ''){
            input_add_user.eq(4).css('border',''); 
            label_add_user.eq(4).css('color',''); 
            const dive = input_add_user.eq(4).next();
            dive.text( "" );
        }
    })
    
    // const icone = btn_FAQ[ell].children[1];

    add_user.click( e => {
        e.preventDefault();

        // validation username
        var  xusername = false;
        if(input_add_user.eq(0).val() == ""){
            xusername = false;
            input_add_user.eq(0).css('border','red solid 2px'); 
            label_add_user.eq(0).css('color','red'); 
            const dive = input_add_user.eq(0).next();
            dive.text( "Please enter the UserName" );
        }else if(!input_add_user.eq(0).val().match(validation_English)){
            xusername = false;
            input_add_user.eq(0).css('border','red solid 2px'); 
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
                        xusername = false;
                        input_add_user.eq(0).css('border','red solid 2px'); 
                        label_add_user.eq(0).css('color','red'); 
                        const dive = input_add_user.eq(0).next();
                        dive.text( "This is a username then entered before" );
                    }else{
                        xusername = true;
                        input_add_user.eq(0).css('border',''); 
                        label_add_user.eq(0).css('color',''); 
                        const dive = input_add_user.eq(0).next();
                        dive.text( "" );
                    }
                },
                async: false 
            });
        }


        // validation Email
        var  xEmail = false;
        if(input_add_user.eq(1).val() == ""){
            xEmail = false;
            input_add_user.eq(1).css('border','red solid 2px'); 
            label_add_user.eq(1).css('color','red'); 
            const dive = input_add_user.eq(1).next();
            dive.text( "Please enter the Email" );
        }else if(!input_add_user.eq(1).val().match(validation_email)){
            xEmail = false;
            input_add_user.eq(1).css('border','red solid 2px'); 
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
                        xEmail = false;
                        input_add_user.eq(1).css('border','red solid 2px'); 
                        label_add_user.eq(1).css('color','red'); 
                        const dive = input_add_user.eq(1).next();
                        dive.text( "sfsdfdsfsfsf" );
                    }else{
                        xEmail = true;
                        input_add_user.eq(1).css('border',''); 
                        label_add_user.eq(1).css('color',''); 
                        const dive = input_add_user.eq(1).next();
                        dive.text( "" );
                    }
                },
                async: false 
            });
        }

        // validation Pasword
        var xPasword = false;
        if(input_add_user.eq(2).val() == ""){
            xPasword = false;
            input_add_user.eq(2).css('border','red solid'); 
            label_add_user.eq(2).css('color','red'); 
            const dive = input_add_user.eq(2).next();
            dive.text( "Please enter the Pasword" );
        }else{
            input_add_user.eq(2).css('border',''); 
            label_add_user.eq(2).css('color',''); 
            const dive = input_add_user.eq(2).next();
            dive.text( "" ); 
            xPasword = true;
        }

        // validation Config-Password
        var xConfigPassword = false;
        if(input_add_user.eq(3).val() == ""){
            xConfigPassword = false;
            input_add_user.eq(3).css('border','red solid'); 
            label_add_user.eq(3).css('color','red'); 
            const dive = input_add_user.eq(3).next();
            dive.text( "Please enter the Config-Password" );
        }else if(input_add_user.eq(2).val() != input_add_user.eq(3).val()){
            input_add_user.eq(3).css('border','red solid'); 
            label_add_user.eq(3).css('color','red'); 
            const dive = input_add_user.eq(3).next();
            dive.text( "ggggConfig-Password" );
            xConfigPassword = false;
        }else{
            xConfigPassword = true;
            input_add_user.eq(3).css('border',''); 
            label_add_user.eq(3).css('color',''); 
            const dive = input_add_user.eq(3).next();
            dive.text( "" ); 
        }

        // validation Telf
        if(input_add_user.eq(4).val().length > 0){
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
        }

        // validation Profile-Photo
        if(show_user.children().length > 0){
            var xPhoto = true;
            if(show_user.children().eq(0).text().length > 0){
                xPhoto = false;
            }
        }

        // submit data forme
        if(xusername && xEmail && xPasword && xConfigPassword){
            var x = true;
            if(typeof xTelf !== 'undefined'){
                if(!xTelf){
                    x = false;
                }
            }
            if(typeof xPhoto !== 'undefined'){
                if(!xPhoto){
                    x = false;
                }
            }
            if(x){
                // submite
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
                    icon: 'success',
                    title: 'Then successfully'
                }) 
                setTimeout(() => {
                    form[0].submit()
                }, "2000")
            }
        }
        
        
    })
})