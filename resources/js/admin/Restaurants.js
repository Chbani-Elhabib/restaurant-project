import CityEn from './Country/Villes.json' assert {type: 'json'};

$(document).ready(function () {

    // addrestaurants
    const addrestaurants = $('.addrestaurants');
    const addrestautant = $('.addrestautant');
    addrestaurants.click( e => {
        addrestautant.slideToggle(500);
    })

    // click Regions change city
    const Regions = $('.Regions');
    const City = $('.city');
    Regions.change( e => {
        var html = '';
        if(Regions.val() == "" ){
            html +='<option></option>';
        }else{
            html += '<option selected disabled></option>';
            CityEn.map( city => {
                if(Regions.val() == city.region ){
                    html += '<option value="'+ city.ville +'">'+ city.ville +'</option>';
                }
            })
        }
        City.html(html)
    })

    // manager
    const manager = $('.manager');
    $.ajax({
        url: '/users/manager',
        type: "POST",
        data: { _token: $('meta[name="csrf-token"]').attr('content')},
        success: function (response) {
            var html = '<option selected disabled></option>';
            response.map( Manager => {
                html += '<option value="'+ Manager.id_people +'">'+ Manager.UserName +'</option>';
            })
            manager.html(html);
        }
    })

    //  Chef
    const Chef = $('.Chef');
    $.ajax({
        url: '/users/chef',
        type: "POST",
        data: { _token: $('meta[name="csrf-token"]').attr('content')},
        success: function (response){
            var html = '<option selected disabled></option>';
            response.map( Manager => {
                html += '<option value="'+ Manager.id_people +'">'+ Manager.UserName +'</option>';
            })
            Chef.html(html);
        }
    })

    //Liverour
    const selectBox = $('.selectBox');
    const checkboxes = $('#checkboxes');

    selectBox.click( e => {
        checkboxes.slideToggle(500)
    })

    $.ajax({
        url: '/users/livreur',
        type: "POST",
        data: { _token: $('meta[name="csrf-token"]').attr('content')},
        success: function (response) {
            var html = '';
            response.map( Manager => {
                html += '<label for="'+ Manager.id_people +'"><input type="checkbox" name="Liverour[]" value="'+ Manager.id_people +'" id="'+ Manager.id_people +'">'+ Manager.UserName +'</label>';
            })
            checkboxes.html(html);
        }
    })

    // add image 
    const toutimages = $('.toutimages');
    const jjjj = $('.jjjj');
    const addimagerestaurand = $('.addimagerestaurand');
    var nametoutimage = [] ;

    toutimages.change(function(e) { 
        var filesArr = Array.prototype.slice.call(e.target.files);
        filesArr.forEach( f => {
            if (!f.type.match("image.*")) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Please insert a photo',
                    toast: true,
                    showConfirmButton: false,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    },
                    timer: 3000
                })
            }else{
                var file = e.target.files[0];
                var formData = new FormData();
                formData.append('_token', $("input[name='_token']").val());
                formData.append('myFile', file);
                $.ajax({
                    url: '/admin/restaurants/localimage',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    cache: false,
                    success: function(data) {
                        nametoutimage.push(data)
                    },
                });
                var reader = new FileReader();
                reader.onload = function (e) {
                    if(nametoutimage.length == 0 ){
                        $('.content section div.restaurants article.addrestautant form div.addimage div.btn.btn-success').addClass('d-none');
                        $('.content section div.restaurants article.addrestautant form div.addimage div.container').removeClass('d-none');
                        var html ='<div class="image"><img src="' + e.target.result + '"data-file="' + f.name + 'alt="Category Image"></div>';
                        addimagerestaurand.html(html);
                        displayimg(imageno);
                    }else{
                        $('.content section div.restaurants article.addrestautant form div.addimage div.container .button').removeClass('d-none');
                        var html ='<div class="image"><img src="' + e.target.result + '"data-file="' + f.name + 'alt="Category Image"></div>';
                        addimagerestaurand.append(html);
                        displayimg(-1)
                    }
                };
                reader.readAsDataURL(f);
            }
        });
    });

    // click add restaurant
    const clickaddrestaurant = $('.content section div.restaurants article.addrestautant form div button.button_19.float-end')
    const submite = $('#submite')
    const arrayimage = $('#arrayimage')
    const inputevalue = $('.inputevalue')
    const labels = $('.labels')

    clickaddrestaurant.click( e => {
        e.preventDefault();

        // // validation name restaurant
        // if(inputevalue.eq(0).val().length == 0){
        //     inputevalue.eq(0).css('border','1px solid red')
        //     inputevalue.eq(0).next().html('jjjjjj')
        //     inputevalue.eq(0).next().addClass('text-danger')
        //     labels.eq(0).addClass('text-danger')
        // }

        // // validation Country
        // if(inputevalue.eq(1).val() != 'Morroco'){
        //     inputevalue.eq(1).css('border','1px solid red')
        //     inputevalue.eq(1).next().html('jjjjjj')
        //     inputevalue.eq(1).next().addClass('text-danger')
        //     labels.eq(1).addClass('text-danger')
        // }

        // // validation Regions
        // if(inputevalue.eq(2).val( ) == null ){
        //     inputevalue.eq(2).css('border','1px solid red')
        //     inputevalue.eq(2).next().html('jjjjjj')
        //     inputevalue.eq(2).next().addClass('text-danger')
        //     labels.eq(2).addClass('text-danger')
        // }

        // // validation city
        // if(inputevalue.eq(3).val( ) == null ){
        //     inputevalue.eq(3).css('border','1px solid red')
        //     inputevalue.eq(3).next().html('jjjjjj')
        //     inputevalue.eq(3).next().addClass('text-danger')
        //     inputevalue.eq(3).prev().addClass('text-danger')
        // }

        // // validation city
        // if(inputevalue.eq(4).val( ).length <= 0 ){
        //     inputevalue.eq(4).css('border','1px solid red')
        //     inputevalue.eq(4).next().html('jjjjjj')
        //     inputevalue.eq(4).next().addClass('text-danger')
        //     inputevalue.eq(4).prev().addClass('text-danger')
        // }

        // // validation manager
        // if(inputevalue.eq(5).val( ) == null ){
        //     inputevalue.eq(5).css('border','1px solid red')
        //     inputevalue.eq(5).next().html('jjjjjj')
        //     inputevalue.eq(5).next().addClass('text-danger')
        //     inputevalue.eq(5).prev().addClass('text-danger')
        // }

        // // validation manager
        // console.log(inputevalue.eq(6).length)
        // if(inputevalue.eq(6).val( ) == null ){
        //     inputevalue.eq(6).css('border','1px solid red')
        //     inputevalue.eq(6).next().html('jjjjjj')
        //     inputevalue.eq(6).next().addClass('text-danger')
        //     inputevalue.eq(6).prev().addClass('text-danger')
        // }


        // validation Price Delivery
        // console.log()
        // if(inputevalue.eq(7).val().length <= 0 ){
        //     inputevalue.eq(7).css('border','1px solid red')
        //     inputevalue.eq(7).next().html('jjjjjj')
        //     inputevalue.eq(7).next().addClass('text-danger')
        //     inputevalue.eq(7).prev().addClass('text-danger')
        // }

        arrayimage.val(nametoutimage);
        submite.submit();
    });






    var imageno =1;

    $('.prev').each( e => {
        $('.prev').eq(e).click( el => {
            displayimg(imageno += -1)
        })
    })

    $('.next').each( e => {
        $('.next').eq(e).click( el => {
            displayimg(imageno += 1)
        })
    })

    function displayimg(n){
        var image = $(".image");
        var i;
        if(n > image.length){
            imageno = 1;
        }
        if(n < 1){
            imageno = image.length;
        }
        for(i=0; i < image.length; i++){
            image[i].style.display = "none";
        }
        
        image[imageno - 1].style.display ="block";
    }


    // ========================================================
    // ---------------------  show restaurant data table :
    // ===========

    const showmeals = $('.showmeals');
    const sectioncard = $('header')
    const card = $('.card');

    showmeals.on( 'click' , '.show' , function(){
        $.ajax({
            url: '/restaurants/show',
            type: "POST",
            data: { _token: $('meta[name="csrf-token"]').attr('content') , id: $(this).parent().parent().prev().children().attr('id').slice(1) },
            success: function (response){
                if( response.length !== 0 ){
                    var html = '<div class="card-content">' ;

                    html += '<div class="usinfo mt-4 ms-3"><p class="mb-2">Information :</p></div>';

                    if( window.location.href.split('/')[3] == 'admin' ){
                        html += '<div class="information d-flex justify-content-between mt-2 mb-2"><p class="mb-0">Manager information</p><i class="fa-solid fa-chevron-up"></i></div>';
    
                        html += '<div class="information-user mt-2">';
                        html += '<div class="d-flex"><p class="mb-2" >UserName :</p><p class="mb-2 ms-2">'+ response.manager.UserName  +'</p></div>';
                        html += '<div class="d-flex"><p class="mb-2" >Email :</p><p class="mb-2 ms-2">'+ response.manager.Email  +'</p></div>';
                        html += '</div>';
                    }

                    if( window.location.href.split('/')[3] == 'admin' || window.location.href.split('/')[3] == 'manager' ){
                        html += '<div class="information d-flex justify-content-between mt-2 mb-2"><p class="mb-0">Chef information</p><i class="fa-solid fa-chevron-up"></i></div>';
    
                        html += '<div class="information-user mt-2">';
                        html += '<div class="d-flex"><p class="mb-2" >UserName :</p><p class="mb-2 ms-2">'+ response.chef.UserName  +'</p></div>';
                        html += '<div class="d-flex"><p class="mb-2" >Email :</p><p class="mb-2 ms-2">'+ response.chef.Email  +'</p></div>';
                        html += '</div>';
    
                        html += '<div class="information d-flex justify-content-between mt-2 mb-2"><p class="mb-0">Livreurs information</p><i class="fa-solid fa-chevron-up"></i></div>';
    
                        html += '<div class="information-levrour mt-2">';
                        response.livreur.map( livreur => {
                            html += '<div class=" information-user mt-2">';
                            html += '<div class="d-flex"><p class="mb-2" >UserName :</p><p class="mb-2 ms-2">'+ livreur.levrour_person.UserName  +'</p></div>';
                            html += '<div class="d-flex"><p class="mb-2" >Email :</p><p class="mb-2 ms-2">'+ livreur.levrour_person.Email  +'</p></div>';
                            html += '</div>';
                        })
                        html += '</div>';
                    }

                    html += '<div class="information d-flex justify-content-between mt-2 mb-2"><p class="mb-0">Restaurant information</p><i class="fa-solid fa-chevron-up"></i></div>';

                    html += '<div class="information-Restaurant mt-2 mb-2">';
                    html += '<div class="d-flex"><p class="mb-2" >Name Restaurant :</p><p class="mb-2 ms-2">'+ response.NameRestaurant  +'</p></div>';
                    html += '<div class="d-flex"><p class="mb-2" >Country :</p><p class="mb-2 ms-2">'+ response.Country  +'</p></div>';
                    html += '<div class="d-flex"><p class="mb-2" >Regions :</p><p class="mb-2 ms-2">'+ response.Regions  +'</p></div>';
                    html += '<div class="d-flex"><p class="mb-2" >city :</p><p class="mb-2 ms-2">'+ response.city  +'</p></div>';
                    html += '<div class="d-flex"><p class="mb-2" >Address :</p><p class="mb-2 ms-2">'+ response.Address  +'</p></div>';
                    if( response.PriceDelivery != 0 && response.PriceDelivery != '00' ){
                        html += '<div class="d-flex position-relative align-items-center justify-content-center"><p class="mb-2 position-absolute" ><span>'+ response.PriceDelivery  +'</span>DH</p><img src="/image/delivery.png" alt="delivery"></div>';
                    }else{
                        html += '<div class="d-flex free position-relative align-items-center justify-content-center"><p class="mb-2 position-absolute" >Free</p><img src="/image/delivery.png" alt="delivery"></div>';
                    }
                    html += '<div class="d-flex align-items-center"><p class="mb-2" >'+ response.deliverytime_of+'-'+response.deliverytime_to +'</p><i class="fa-solid fa-clock"></i></div>';
                    html += '</div>';

                    html += '</div>' ;
                    sectioncard.next().fadeIn(500)
                    card.eq(0).html(html);
                    card.fadeIn(500);
                }
            }
        })
    })

    
    card.eq(0).on( 'click', ".information", function(){
        $(this).next().slideToggle(500);
        $(this).children().eq(1).toggleClass('active')
    })

    // click background card 
    sectioncard.next().click( function(e){
        sectioncard.next().fadeOut(500)
        card.eq(0).fadeOut(500);
    })



    
});



