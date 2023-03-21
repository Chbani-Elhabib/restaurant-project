import CityEn from './Country/Villes.json' assert {type: 'json'};
$(document).ready(function () {
    
    const validation_English = /^[a-zA-Z]+[0-9]*[a-zA-Z]*$/ ;
    const validation_email = /(^\w+([\.-]?\w+))+\@gmail.com$/;
    const validation_Telf = /^[0-9]+$/;



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

    const image_user = $('.image_user');

    image_user.change( e => {
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
                    image_user.prev().prev().attr( 'src' , e.target.result )
                };
                reader.readAsDataURL(f);
            }
        });
    });

    
    // show city and addriss 

    const User_Group = $('select[name="User_Group"]')
    User_Group.change( function(){
        if( $(this).val() == 'Liverour' ){
            $(this).parent().next().slideDown(500);
            $(this).parent().next().css( 'display' , 'grid')
        }else{
            $(this).parent().next().slideUp(500)
        }
    })



    // ========================================================
    // ---------------------  add Users
    // ===========

    const add_user = $('.add-user');
    const input_add_user = $('.input_add_user');
    const label_add_user = $('.label_add_user');

    input_add_user.eq(5).change( function(){
        var html = '';
        if($(this).val() == "" ){
            html +='<option></option>';
        }else{
            html += '<option selected disabled></option>';
            CityEn.map( city => {
                if($(this).val() == city.region ){
                    html += '<option value="'+ city.ville +'">'+ city.ville +'</option>';
                }
            })
        }
        $(this).parent().next().children().eq(1).html(html)
    })


    add_user.click( e => {
        e.preventDefault();

        // validation username
        var  xusername = false;
        if(input_add_user.eq(0).val() == ""){
            xusername = false;
            input_add_user.eq(0).css('border','red solid 0.5px'); 
            label_add_user.eq(0).css('color','red'); 
            const dive = input_add_user.eq(0).next();
            dive.text( "Please enter the UserName" );
        }else if(!input_add_user.eq(0).val().match(validation_English)){
            xusername = false;
            input_add_user.eq(0).css('border','red solid 0.5px'); 
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
                        input_add_user.eq(0).css('border','red solid 0.5px'); 
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
            input_add_user.eq(1).css('border','red solid 0.5px'); 
            label_add_user.eq(1).css('color','red'); 
            const dive = input_add_user.eq(1).next();
            dive.text( "Please enter the Email" );
        }else if(!input_add_user.eq(1).val().match(validation_email)){
            xEmail = false;
            input_add_user.eq(1).css('border','red solid 0.5px'); 
            label_add_user.eq(1).css('color','red'); 
            const dive = input_add_user.eq(1).next();
            dive.text( "Please enter a valid email exmple 'chbani@gmail.com'" );
        }else{
            $.ajax({
                url: '/ajax-request',
                type: "POST",
                data: {Email: input_add_user.eq(1).val() ,  _token: $('meta[name="csrf-token"]').attr('content')},
                success: function (response) {
                    if(response == "Yes"){
                        xEmail = false;
                        input_add_user.eq(1).css('border','red solid 0.5px'); 
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
            input_add_user.eq(2).css('border','red solid 0.5px'); 
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
            input_add_user.eq(3).css('border','red solid 0.5px'); 
            label_add_user.eq(3).css('color','red'); 
            const dive = input_add_user.eq(3).next();
            dive.text( "Please enter the Config-Password" );
        }else if(input_add_user.eq(2).val() != input_add_user.eq(3).val()){
            input_add_user.eq(3).css('border','red solid 0.5px'); 
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

        if( User_Group.val() == 'Liverour' ){

            // validation Country
            var xCountry = true ;
            if( input_add_user.eq(4).val() != 'Morroco' ){
                xCountry = false;
                input_add_user.eq(4).css('border','red solid 0.5px'); 
                input_add_user.eq(4).prev().css('color','red'); 
                input_add_user.eq(4).next().text( "nnnnn" );
            }else{
                xCountry = true;
                input_add_user.eq(4).css('border',''); 
                input_add_user.eq(4).prev().css('color',''); 
                input_add_user.eq(4).next().text( "" );
            }

            // validation 
            var xRegions = true ;
            if( input_add_user.eq(5).val() == null ){
                xRegions = false;
                input_add_user.eq(5).css('border','red solid 0.5px'); 
                input_add_user.eq(5).prev().css('color','red'); 
                input_add_user.eq(5).next().text( "nnnnn" );
            }else{
                xRegions = true;
                input_add_user.eq(5).css('border',''); 
                input_add_user.eq(5).prev().css('color',''); 
                input_add_user.eq(5).next().text( "" );
            }

            // validation city
            var xcity = true ;
            if( input_add_user.eq(6).val() == null ){
                xcity = false;
                input_add_user.eq(6).css('border','red solid 0.5px'); 
                input_add_user.eq(6).prev().css('color','red'); 
                input_add_user.eq(6).next().text( "nnnnn" );
            }else{
                xcity = true;
                input_add_user.eq(6).css('border',''); 
                input_add_user.eq(6).prev().css('color',''); 
                input_add_user.eq(6).next().text( "" );
            }
        }


        // validation Telf
        // if(input_add_user.eq(4).val().length > 0){
        //     var xTelf = false;
        //     if(!input_add_user.eq(4).val().match(validation_Telf)){
        //         xTelf = false;
        //         const dive = input_add_user.eq(4).next();
        //         dive.text( "Please write the correct phone number" );
        //         input_add_user.eq(4).css('border','red solid 0.1px'); 
        //         label_add_user.eq(4).css('color','red');
        //     }else if(input_add_user.eq(4).val().length > 9){
        //         xTelf = false;
        //         const dive = input_add_user.eq(4).next();
        //         dive.text( "The phone number does not exceed 9 digits");
        //         input_add_user.eq(4).css('border','red solid 0.1px'); 
        //         label_add_user.eq(4).css('color','red');
        //     }else{
        //         xTelf = true;
        //         const dive = input_add_user.eq(4).next();
        //         dive.text( "" );
        //         input_add_user.eq(4).css('border',''); 
        //         label_add_user.eq(4).css('color','');
        //     }
        // }



        // submit data forme
        if(xusername && xEmail && xPasword && xConfigPassword){
            
            var x = true ;
            if( User_Group.val() == 'Liverour'  ){
                if( xcity && xRegions && xCountry ){
                    x = true ;
                }else{
                    x = false ;
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


            // var x = true;
            // if(typeof xTelf !== 'undefined'){
            //     if(!xTelf){
            //         x = false;
            //     }
            // }


        }
        
        
    })


    // ========================================================
    // ---------------------  show Users
    // ===========

    
    // $('#example').DataTable({ responsive: true  });




    // myFunction()

    // Show user
    const pet_select = $('.pet-select');
    const table_users = $('.table_users');
    var userss = '';


    //research
    const input_research_users = $('.input_research_users');
    input_research_users.keyup(e =>{
        var value = input_research_users.val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    pet_select.change(function(){
        var choice = $(this).val();
        $('#myTable tr').each( (index) => {
            var id = $("#myTable tr td h5").eq(index).text();
            if (id !== choice && choice !== 'All' ) {
                $("#myTable tr").eq(index).hide();
            }
            else {
                $("#myTable tr").eq(index).show();
            }
        });
    });





    



    // click en delete
    const deletee = $('.button_19.delete');

    $('.button_19.delete').each( e => {
        // console.log($('td').last())
        // $('td').on( "click", '.button_19.delete' , ell => {
        //     console.log(userss[e])
        //     $.ajax({
        //         url: '/users/delete/',
        //         type: "POST",
        //         data: {id: userss[e].Id , _token: $('meta[name="csrf-token"]').attr('content')},
        //         success: function (response) {
        //             userss = response ;
        //             // submite
        //             const Toast = Swal.mixin({
        //                 toast: true,
        //                 position: 'top-end',
        //                 showConfirmButton: false,
        //                 timer: 2000,
        //                 timerProgressBar: true,
        //                 didOpen: (toast) => {
        //                     toast.addEventListener('mouseenter', Swal.stopTimer)
        //                     toast.addEventListener('mouseleave', Swal.resumeTimer)
        //                 }
        //             })                      
        //             Toast.fire({
        //                 icon: 'success',
        //                 title: 'Then delete successfully'
        //             }) 
        //             if(response.length > 0){
        //                 var html = '<table class="table table-hover">\
        //                                 <thead>\
        //                                     <tr>\
        //                                         <th scope="col">Users information</th>\
        //                                         <th scope="col">User job </th>\
        //                                         <th scope="col">Update</th>\
        //                                         <th scope="col">Delete</th>\
        //                                     </tr>\
        //                                 </thead>\
        //                                 <tbody id="myTable">';
        //                 response.map( user => {
        //                     console.log()
        
        //                     html +='<tr><th scope="row"><div class="usersin"><div>';
        //                     html +='<img src="/ImageUsers/' + user['Photo'] +'" alt="profaile users">';
        //                     html +='</div><div><h5>'+ user['UserName'] +'</h5><p>'+ user['Email'] +'</p></div></div></th>';
        //                     html +='<td><h5>' + user['User_Group'] + '</h5></td>';
        //                     html +='<td><a href="users/update/' + user['Id'] + '" class="button_19 Update">Update</a></td>';
        //                     html +='<td><a href="users/delete/' + user['Id'] + '" class="button_19">Delete</a></td>';
        //                     html +='<td class="d" ><button class="button_19 delete">Delete</button></td>';
        //                 });
        //                 html += '</tbody></table>';
        //                 table_users.html(html);
        //             }else{
        //                 table_users.html('<p class="data_null">We do not have any user information you are looking for</p>')
        //             }
        //         }
        //     });
        // })
    })
    
     
    // fa.click( e => {
    //     Update_users.css("display", "");
    // })

    // Update_users.click( e => {
    //     if(e.target.classList.contains('Update_users')){
    //         Update_users.css("display","");
    //     }
    // })

})