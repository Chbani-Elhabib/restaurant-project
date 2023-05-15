import CityEn from "./Country/Villes.json" assert { type: "json" };
$(document).ready(function () {
    const validation_English = /^[a-zA-Z]+[0-9]*[a-zA-Z]*$/;
    const validation_email = /(^\w+([\.-]?\w+))+\@gmail.com$/;
    const validation_Telf = /^[0-9]+$/;

    // show form add user

    const add_btn = $(".add_btn");
    const form = $(".add_form form");

    add_btn.each((e) => {
        add_btn.eq(e).click((ell) => {
            form.eq(e).slideToggle(400);
            form.eq(e).css("display", "grid");
        });
    });

    // show image users

    const image_user = $(".image_user");

    image_user.change((e) => {
        var filesArr = Array.prototype.slice.call(e.target.files);
        filesArr.forEach((f) => {
            if (!f.type.match("image.*")) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener("mouseenter", Swal.stopTimer);
                        toast.addEventListener("mouseleave", Swal.resumeTimer);
                    },
                });
                Toast.fire({
                    icon: "error",
                    title: "Please insert a photo",
                });
            } else {
                var storedFiles = [];
                storedFiles.push(f);
                var reader = new FileReader();
                reader.onload = function (e) {
                    image_user.prev().prev().attr("src", e.target.result);
                };
                reader.readAsDataURL(f);
            }
        });
    });

    // show city and addriss

    const User_Group = $('select[name="User_Group"]');
    User_Group.change(function () {
        if ($(this).val() == "Liverour") {
            $(this).parent().next().slideDown(500);
            $(this).parent().next().css("display", "grid");
        } else {
            $(this).parent().next().slideUp(500);
        }
    });

    // ========================================================
    // ---------------------  add Users
    // ===========

    const add_user = $(".add-user");
    const input_add_user = $(".input_add_user");
    const label_add_user = $(".label_add_user");

    input_add_user.eq(5).change(function () {
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
    });

    add_user.click((e) => {
        e.preventDefault();

        // validation username
        var xusername = false;
        if (input_add_user.eq(0).val() == "") {
            xusername = false;
            input_add_user.eq(0).css("border", "0.5px solid rgb(220 53 69 / 89%)");
            label_add_user.eq(0).css("color", "#dc3545");
            input_add_user.eq(0).next().text("Please enter the UserName");
        } else if (!input_add_user.eq(0).val().match(validation_English)) {
            xusername = false;
            input_add_user.eq(0).css("border", "0.5px solid rgb(220 53 69 / 89%)");
            label_add_user.eq(0).css("color", "#dc3545");
            input_add_user.eq(0).next().text("Please enter a valid username exmple 'chbani04'");
        } else {
            $.ajax({
                url: "/ajax-request",
                type: "POST",
                data: {
                    username: input_add_user.eq(0).val(),
                    _token: $('meta[name="csrf-token"]').attr("content"),
                },
                success: function (response) {
                    if (response == "Yes") {
                        xusername = false;
                        input_add_user.eq(0).css("border", "0.5px solid rgb(220 53 69 / 89%)");
                        label_add_user.eq(0).css("color", "#dc3545");
                        input_add_user.eq(0).next().text("This is a username then entered before");
                    } else {
                        xusername = true;
                        input_add_user.eq(0).css("border", "");
                        label_add_user.eq(0).css("color", "");
                        input_add_user.eq(0).next().text("");
                    }
                },
                async: false,
            });
        }

        // validation Email
        var xEmail = false;
        if (input_add_user.eq(1).val() == "") {
            xEmail = false;
            input_add_user.eq(1).css("border", "0.5px solid rgb(220 53 69 / 89%)");
            label_add_user.eq(1).css("color", "#dc3545");
            input_add_user.eq(1).next().text("Please enter the Email");
        } else if (!input_add_user.eq(1).val().match(validation_email)) {
            xEmail = false;
            input_add_user.eq(1).css("border", "0.5px solid rgb(220 53 69 / 89%)");
            label_add_user.eq(1).css("color", "#dc3545");
            input_add_user.eq(1).next().text("Please enter a valid email exmple 'chbani@gmail.com'");
        } else {
            $.ajax({
                url: "/ajax-request",
                type: "POST",
                data: {
                    Email: input_add_user.eq(1).val(),
                    _token: $('meta[name="csrf-token"]').attr("content"),
                },
                success: function (response) {
                    if (response == "Yes") {
                        xEmail = false;
                        input_add_user.eq(1).css("border", "0.5px solid rgb(220 53 69 / 89%)");
                        label_add_user.eq(1).css("color", "#dc3545");
                        input_add_user.eq(1).next().text("This is a Email then entered before");
                    } else {
                        xEmail = true;
                        input_add_user.eq(1).css("border", "");
                        label_add_user.eq(1).css("color", "");
                        input_add_user.eq(1).next().text("");
                    }
                },
                async: false,
            });
        }

        // validation Pasword
        var xPasword = false;
        if (input_add_user.eq(2).val() == "") {
            xPasword = false;
            input_add_user.eq(2).css("border", "0.5px solid rgb(220 53 69 / 89%)");
            label_add_user.eq(2).css("color", "#dc3545");
            input_add_user.eq(2).next().text("Please enter the Pasword");
        } else {
            input_add_user.eq(2).css("border", "");
            label_add_user.eq(2).css("color", "");
            input_add_user.eq(2).next().text("");
            xPasword = true;
        }

        // validation Config-Password
        var xConfigPassword = false;
        if (input_add_user.eq(3).val() == "") {
            xConfigPassword = false;
            input_add_user.eq(3).css("border", "0.5px solid rgb(220 53 69 / 89%)");
            label_add_user.eq(3).css("color", "#dc3545");
            input_add_user.eq(3).next().text("Please enter the Config-Password");
        } else if (input_add_user.eq(2).val() != input_add_user.eq(3).val()) {
            input_add_user.eq(3).css("border", "0.5px solid rgb(220 53 69 / 89%)");
            label_add_user.eq(3).css("color", "#dc3545");
            input_add_user.eq(3).next().text("Password does not match the confirm password");
            xConfigPassword = false;
        } else {
            xConfigPassword = true;
            input_add_user.eq(3).css("border", "");
            label_add_user.eq(3).css("color", "");
            input_add_user.eq(3).next().text("");
        }

        var xCountry = true;
        var xRegions = true;
        var xcity = true;

        if (User_Group.val() == "Liverour") {
            // validation Country
            if (input_add_user.eq(4).val() != "Morroco") {
                xCountry = false;
                input_add_user.eq(4).css("border", "0.5px solid rgb(220 53 69 / 89%)");
                input_add_user.eq(4).prev().css("color", "#dc3545");
                input_add_user.eq(4).next().text("Please enter the Country");
            } else {
                xCountry = true;
                input_add_user.eq(4).css("border", "");
                input_add_user.eq(4).prev().css("color", "");
                input_add_user.eq(4).next().text("");
            }

            // validation Regions
            if (input_add_user.eq(5).val() == null) {
                xRegions = false;
                input_add_user.eq(5).css("border", "0.5px solid rgb(220 53 69 / 89%)");
                input_add_user.eq(5).prev().css("color", "#dc3545");
                input_add_user.eq(5).next().text("Please enter the Regions");
            } else {
                xRegions = true;
                input_add_user.eq(5).css("border", "");
                input_add_user.eq(5).prev().css("color", "");
                input_add_user.eq(5).next().text("");
            }

            // validation city
            if (input_add_user.eq(6).val() == null) {
                xcity = false;
                input_add_user.eq(6).css("border", "0.5px solid rgb(220 53 69 / 89%)");
                input_add_user.eq(6).prev().css("color", "#dc3545");
                input_add_user.eq(6).next().text("Please enter the city");
            } else {
                xcity = true;
                input_add_user.eq(6).css("border", "");
                input_add_user.eq(6).prev().css("color", "");
                input_add_user.eq(6).next().text("");
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
        if ( xusername && xEmail && xPasword && xConfigPassword && xcity && xRegions && xCountry ) {
            
            // submite
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener("mouseenter", Swal.stopTimer);
                    toast.addEventListener("mouseleave", Swal.resumeTimer);
                },
            });
            Toast.fire({
                icon: "success",
                title: "Then successfully",
            });
            setTimeout(() => {
                form[0].submit();
            }, "2000");

        }

    });

    // ========================================================
    // ---------------------  show Users
    // ===========

    $("#example").DataTable({
        ordering: false,
    });

    

    // click button show users 
    const myTable = $('#myTable');
    const card = $('.card');
    const sectioncard = $('header')

    myTable.on("click", ".show", function() {
        $.ajax({
            url: '/users/showuser',
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                id: $(this).attr('data'),
            },
            success: function(response) {
                if( response.length !== 0 ){
                    sectioncard.next().fadeIn(500)

                    var html = '<div class="card-content">';

                    html += '<div class="usinfo mt-4 ms-3"><p class="mb-2">User information :</p></div>';
                    
                    html += '<div class="information d-flex justify-content-between mt-2 mb-2"><p class="mb-0">personal information</p><i class="fa-solid fa-chevron-up"></i></div>';

                    html += '<div class="information-user mt-2">';
                    html += '<div class="d-flex"><p class="mb-2" >UserName :</p><p class="mb-2 ms-2">'+ response.UserName  +'</p></div>';
                    html += '<div class="d-flex"><p class="mb-2" >Email :</p><p class="mb-2 ms-2">'+ response.Email  +'</p></div>';
                    html += '<div class="d-flex"><p class="mb-2" >FullName:</p><p class="mb-2 ms-2">'+ response.FullName +'</p></div>';
                    html += '<div class="d-flex"><p class="mb-2" >Telf :</p><p class="mb-2 ms-2">'+ response.Telf  +'</p></div>';
                    html += '<div class="d-flex"><p class="mb-2" >Country :</p><p class="mb-2 ms-2">'+ response.Country  +'</p></div>';
                    html += '<div class="d-flex"><p class="mb-2" >Regions :</p><p class="mb-2 ms-2">'+ response.Regions  +'</p></div>';
                    html += '<div class="d-flex"><p class="mb-2" >city :</p><p class="mb-2 ms-2">'+ response.city  +'</p></div>';
                    html += '<div class="d-flex"><p class="mb-2" >Address :</p><p class="mb-2 ms-2" style="width: 85%">'+ response.Address  +'</p></div>';
                    html += '</div>';
                    
                    html += '<div class="information d-flex justify-content-between mb-2"><p class="mb-0">additional information</p><i class="fa-solid fa-chevron-up"></i></div>';

                    html += '<div class="additional mt-2">';
                    html += '<div class="d-flex"><p class="mb-2" >User_Group :</p><p class="mb-2 ms-2" >'+ response.User_Group  +'</p></div>';
                    html += '<div class="d-flex customer">' ;
                    if( response.customer == 1 ){
                        html += '<img src="/image/badge-check.png" alt="dbadge">';
                    }else{
                        html += '<img src="/image/badge-check-black.png" alt="dbadge">';
                    }
                    html += '<p class="mb-2" >customer</p>'
                    html += '</div>';
                    html += '</div>';

                    html += '</div>';

                    card.html(html);
                    card.fadeIn(500);
                }
            }
        })
    });

    card.on( 'click', ".information", function(){
        $(this).next().slideToggle(500);
        $(this).children().eq(1).toggleClass('active')
    })

    // delete
    myTable.on("click", ".delete", function(){
        $.ajax({
            url: '/users/delete',
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                id: $(this).prev().prev().attr('data'),
            },
            success: response => {
                if(response == 'Admin' ){
                    Swal.fire({
                        icon: 'error',
                        title: 'It cannot be deleted Admin',
                      })
                }else if(response == 'Restaurant'){
                    Swal.fire({
                        icon: 'error',
                        title: 'This user is registered with a restaurant and therefore cannot be deleted',
                    })
                }

                if(response == 1 ){
                    $(this).parent().parent().parent().animate({  opacity: 0, height: 0 }, 500 )
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener("mouseenter", Swal.stopTimer);
                            toast.addEventListener("mouseleave", Swal.resumeTimer);
                        },
                    });
                    Toast.fire({
                        icon: "success",
                        title: "Then successfully",
                    });
                    setTimeout(() => {
                        $(this).parent().parent().parent().remove();
                    }, "600");
                }
            }
        });
    });
    
    sectioncard.next().click( function(e){
        sectioncard.next().fadeOut(500)
        card.fadeOut(500);
    })






});
