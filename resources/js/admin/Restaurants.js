import CityEn from './Country/Villes.json' assert {type: 'json'};

$(document).ready(function () {

    // addrestaurants
    const inputevalue = $('.inputevalue')
    const addrestaurants = $('.addrestaurants');
    const addrestautant = $('.addrestautant');
    addrestaurants.click( e => {
        addrestautant.slideToggle(500);
    })

    // click Regions change city
    inputevalue.eq(2).change( e => {
        var html = '';
        if(inputevalue.eq(2).val() == "" ){
            html +='<option></option>';
        }else{
            html += '<option selected disabled></option>';
            CityEn.map( city => {
                if(inputevalue.eq(2).val() == city.region ){
                    html += '<option value="'+ city.ville +'">'+ city.ville +'</option>';
                }
            })
        }
        inputevalue.eq(3).html(html)
    })

    // manager
    $.ajax({
        url: '/users/manager',
        type: "POST",
        data: { _token: $('meta[name="csrf-token"]').attr('content')},
        success: function (response) {
            var html = '<option selected disabled></option>';
            response.map( Manager => {
                html += '<option value="'+ Manager.id_people +'">'+ Manager.UserName +'</option>';
            })
            inputevalue.eq(5).html(html);
        }
    })

    //  Chef
    $.ajax({
        url: '/users/chef',
        type: "POST",
        data: { _token: $('meta[name="csrf-token"]').attr('content')},
        success: function (response){
            var html = '<option selected disabled></option>';
            response.map( Manager => {
                html += '<option value="'+ Manager.id_people +'">'+ Manager.UserName +'</option>';
            })
            inputevalue.eq(6).html(html);
        }
    })

    //Liverour
    const selectBox = $('.selectBox');
    const checkboxes = $('#checkboxes');

    selectBox.click( e => {
        checkboxes.slideToggle(500)
    })

    inputevalue.eq(3).change( function(){
        $.ajax({
            url: '/users/livreur',
            type: "POST",
            data: { _token: $('meta[name="csrf-token"]').attr('content'),
                    city: $(this).val(),
                },
            success: function (response) {
                var html = '';
                response.map( Liverour => {
                    html += '<label for="'+ Liverour.id_people +'"><input type="checkbox" value="'+ Liverour.id_people +'" id="'+ Liverour.id_people +'">'+ Liverour.UserName +'</label>';
                })
                checkboxes.html(html);
            }
        })
    })

    // Price Delivery  and delivery time
    inputevalue.eq(8).keyup(function(e){
		if (/\D/g.test(this.value)){
			this.value = this.value.replace(/\D/g, '');
		}
	});
    inputevalue.eq(9).keyup(function(e){
		if (/\D/g.test(this.value)){
			this.value = this.value.replace(/\D/g, '');
		}
	});
    inputevalue.eq(10).keyup(function(e){
		if (/\D/g.test(this.value)){
			this.value = this.value.replace(/\D/g, '');
		}
	});

    

    // add image 
    const addimagerestaurand = $('.addimagerestaurand');

    var formData = new FormData();
    formData.append('_token', $("input[name='_token']").val());

    inputevalue.eq(11).change(function(e) { 
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
                if (file) {
                    formData.append('image[]', file);
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        if( formData.getAll('image[]').length == 1 ){
                            $('.content section article.addrestautant form div.addimage div.btn.btn-success').addClass('d-none');
                            $('.content section article.addrestautant form div.addimage div.container').removeClass('d-none');
                            var html ='<div class="image"><img src="'+e.target.result+'" data-file="'+f.name+'" alt="Category Image"></div>';
                            addimagerestaurand.html(html);
                            displayimg(imageno);
                        }else{
                            $('.content section article.addrestautant form div.addimage div.container .button').removeClass('d-none');
                            var html ='<div class="image"><img src="'+e.target.result+'" data-file="'+f.name+'" alt="Category Image"></div>';
                            addimagerestaurand.append(html);
                            displayimg(-1)
                        }
                    };
                    reader.readAsDataURL(f);
                }
            }
        });
    });

    // update image
    const updateimage = $('.updateimage');
    updateimage.change(function(e) { 
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
                $(this).parent().parent().next().children().map( el => {
                    if( $(this).parent().parent().next().children().eq(el).attr('style') == 'display: block;'){
                        formData.getAll('image[]').map( dataimage => {
                            if($(this).parent().parent().next().children().eq(el).children().attr('data-file') == dataimage.name ){
                                var datafilter = formData.getAll('image[]').filter( n => n.name != dataimage.name )
                                formData.delete('image[]');
                                datafilter.map( datafilter => {
                                    formData.append('image[]', datafilter );
                                })
                                var file = e.target.files[0];
                                if (file) {
                                    formData.append('image[]', file);
                                    var reader = new FileReader();
                                    reader.onload = e => {
                                        $(this).parent().parent().next().children().eq(el).children().attr('data-file' , f.name )
                                        $(this).parent().parent().next().children().eq(el).children().attr('src' , e.target.result )
                                    };
                                    reader.readAsDataURL(f);
                                }
                            }
                        })
                    }
                })
            }
        });

    });

    // delete image
    const Delete = $('.delete');
    Delete.click( function(){
        $(this).parent().next().children().map( e => {
            if( $(this).parent().next().children().eq(e).attr('style') == 'display: block;' ){
                var datafilter = formData.getAll('image[]').filter( n => n.name != $(this).parent().next().children().eq(e).children().attr('data-file') )
                formData.delete('image[]');
                datafilter.map( datafilter => {
                    formData.append('image[]', datafilter );
                })
                if( formData.getAll('image[]').length == 0 ){
                    $(this).parent().parent().addClass('d-none');
                    $(this).parent().parent().prev().prev().removeClass('d-none');
                }else if( formData.getAll('image[]').length == 1 ){
                    displayimg(imageno += 1);
                    $(this).parent().next().next().addClass('d-none');
                }else{
                    displayimg(imageno += 1);
                }
                $(this).parent().next().children().eq(e).remove()
            }
        })
    })
    

    // click add restaurant
  
    const clickaddrestaurant = $('.content section article.addrestautant form#submite div.clearfix:nth-child(13) button.btn.btn-success.float-end.me-4')
    const arrayimage = $('#arrayimage')
    const labels = $('.labels')


    clickaddrestaurant.click( e => {
        e.preventDefault();

        // validation name restaurant
        var xRestaurant = true ;
        if(inputevalue.eq(0).val().length == 0){
            xRestaurant = false ;
            inputevalue.eq(0).css('border','0.5px solid #dd3545')
            inputevalue.eq(0).next().html('Please enter the Name Restaurant')
            labels.eq(0).addClass('text-danger')
        }else{
            xRestaurant = true ;
            inputevalue.eq(0).css('border','')
            inputevalue.eq(0).next().html('')
            labels.eq(0).removeClass('text-danger')
        }

        // validation Country
        var xCountry = true ;
        if(inputevalue.eq(1).val() != 'Morroco'){
            xCountry = false ;
            inputevalue.eq(1).css('border','0.5px solid #dd3545')
            inputevalue.eq(1).next().html('Please enter the Country Morocco')
            labels.eq(1).addClass('text-danger')
        }else{
            xCountry = true ;
            inputevalue.eq(1).css('border','')
            inputevalue.eq(1).next().html('')
            labels.eq(1).removeClass('text-danger')
        }

        // validation Regions
        var xRegions = true ;
        if(inputevalue.eq(2).val( ) == null ){
            xRegions = false ;
            inputevalue.eq(2).css('border','0.5px solid #dd3545')
            inputevalue.eq(2).next().html('Please enter the Regions')
            labels.eq(2).addClass('text-danger')
        }else{
            xRegions = true ;
            inputevalue.eq(2).css('border','')
            inputevalue.eq(2).next().html('')
            labels.eq(2).removeClass('text-danger')
        }



        // validation city
        var xCity = true ;
        if(inputevalue.eq(3).val( ) == null ){
            xCity = false ;
            inputevalue.eq(3).css('border','0.5px solid #dd3545')
            inputevalue.eq(3).next().html('Please enter the city')
            inputevalue.eq(3).prev().addClass('text-danger')
        }else{
            xCity = true ;
            inputevalue.eq(3).css('border','')
            inputevalue.eq(3).next().html('')
            inputevalue.eq(3).prev().removeClass('text-danger')
        }

        // validation Address
        var xAddress = true ;
        if(inputevalue.eq(4).val( ).length <= 0 ){
            xAddress = false ;
            inputevalue.eq(4).css('border','0.5px solid #dd3545')
            inputevalue.eq(4).next().html('Please enter the xAddress')
            inputevalue.eq(4).prev().addClass('text-danger')
        }else{
            xAddress = true ;
            inputevalue.eq(4).css('border','')
            inputevalue.eq(4).next().html('')
            inputevalue.eq(4).prev().removeClass('text-danger')
        }

        // validation manager
        var xmanager = true ;
        if(inputevalue.eq(5).val( ) == null ){
            xmanager = false ;
            inputevalue.eq(5).css('border','0.5px solid #dd3545')
            inputevalue.eq(5).next().html('Please enter the manager')
            inputevalue.eq(5).prev().addClass('text-danger')
        }else{
            xmanager = true ;
            inputevalue.eq(5).css('border','')
            inputevalue.eq(5).next().html('')
            inputevalue.eq(5).prev().removeClass('text-danger')
        }

        // validation chef
        var xchef = true ;
        if(inputevalue.eq(6).val( ) == null ){
            xchef = false ;
            inputevalue.eq(6).css('border','0.5px solid #dd3545')
            inputevalue.eq(6).next().html('Please enter the chef')
            inputevalue.eq(6).prev().addClass('text-danger')
        }else{
            xchef = true ;
            inputevalue.eq(6).css('border','')
            inputevalue.eq(6).next().html('')
            inputevalue.eq(6).prev().removeClass('text-danger')
        }

        // validation livreur
        var xlivreur = true ;
        var arraylivereur = [] ;
        inputevalue.eq(7).parent().next().children().map( e => {
            if( inputevalue.eq(7).parent().next().children().eq(e).children().prop('checked') == true ){
                arraylivereur.push(inputevalue.eq(7).parent().next().children().eq(e).children().val())
            }
        })

        if(arraylivereur.length > 0 ){
            xlivreur = true ;
            inputevalue.eq(7).css('border','')
            inputevalue.eq(7).parent().next().next().html('')
            inputevalue.eq(7).prev().removeClass('text-danger')
        }else{
            xlivreur = false ;
            inputevalue.eq(7).css('border','0.5px solid #dd3545')
            inputevalue.eq(7).parent().next().next().html('Please enter the chef')
            inputevalue.eq(7).prev().addClass('text-danger')
        }

        // validation Delivery Price 
        var xPriceDelivery = true ;
        if(inputevalue.eq(8).val().length <= 0 ){
            xPriceDelivery = false ;
            inputevalue.eq(8).css('border','0.5px solid #dd3545')
            inputevalue.eq(8).next().html('Please enter the Delivery Price')
            inputevalue.eq(8).prev().addClass('text-danger')
        }else{
            xPriceDelivery = true ;
            inputevalue.eq(8).css('border','')
            inputevalue.eq(8).next().html('')
            inputevalue.eq(8).prev().removeClass('text-danger')
        }

        // validation delivery time
        var xdeliverytime = true ;
        if(inputevalue.eq(9).val().length <= 0  && inputevalue.eq(10).val().length <= 0  ){
            xdeliverytime = false ;
            inputevalue.eq(9).css('border','0.5px solid #dd3545')
            inputevalue.eq(10).css('border','0.5px solid #dd3545')
            inputevalue.eq(9).parent().next().html('Please enter the delivery time')
            inputevalue.eq(9).parent().prev().addClass('text-danger')
            inputevalue.eq(9).prev().addClass('text-danger')
            inputevalue.eq(9).next().addClass('text-danger')
            inputevalue.eq(10).next().addClass('text-danger')
        }else if(inputevalue.eq(9).val().length <= 0){
            xdeliverytime = false ;
            inputevalue.eq(9).css('border','0.5px solid #dd3545')
            inputevalue.eq(10).css('border','')
            inputevalue.eq(9).parent().next().html('Please enter the delivery time')
            inputevalue.eq(9).parent().prev().addClass('text-danger')
            inputevalue.eq(9).prev().addClass('text-danger')
            inputevalue.eq(9).next().removeClass('text-danger')
            inputevalue.eq(10).next().removeClass('text-danger')
        }else if(inputevalue.eq(10).val().length <= 0 ){
            xdeliverytime = false ;
            inputevalue.eq(9).css('border','')
            inputevalue.eq(10).css('border','0.5px solid #dd3545')
            inputevalue.eq(9).parent().next().html('Please enter the delivery time')
            inputevalue.eq(9).parent().prev().addClass('text-danger')
            inputevalue.eq(9).prev().removeClass('text-danger')
            inputevalue.eq(9).next().addClass('text-danger')
            inputevalue.eq(10).next().addClass('text-danger')
        }else{
            xdeliverytime = true ;
            inputevalue.eq(9).css('border','')
            inputevalue.eq(10).css('border','')
            inputevalue.eq(9).parent().next().html('')
            inputevalue.eq(9).parent().prev().removeClass('text-danger')
            inputevalue.eq(9).prev().removeClass('text-danger')
            inputevalue.eq(9).next().removeClass('text-danger')
            inputevalue.eq(10).next().removeClass('text-danger')
        }

        // validation image
        var ximage = true ;
        if(formData.getAll('image[]').length == 0 ){
            ximage = false ;
            inputevalue.eq(11).parent().prev().addClass('text-danger')
            inputevalue.eq(11).parent().next().html('Please enter the Restaurant image')
            inputevalue.eq(11).parent().css('border','0.5px solid #dd3545')
        }else{
            ximage = true ;
            inputevalue.eq(11).parent().prev().removeClass('text-danger')
            inputevalue.eq(11).parent().next().html('')
            inputevalue.eq(11).parent().css('border','')
        }

        if( xRestaurant && xCountry && xRegions && xCity && xAddress && xmanager && xchef && xlivreur && xPriceDelivery && xdeliverytime && ximage ){
            formData.append('NameRestaurant', inputevalue.eq(0).val());
            formData.append('Country', inputevalue.eq(1).val());
            formData.append('Regions', inputevalue.eq(2).val());
            formData.append('city', inputevalue.eq(3).val());
            formData.append('Address', inputevalue.eq(4).val());
            formData.append('manager', inputevalue.eq(5).val());
            formData.append('chef', inputevalue.eq(6).val());
            formData.append('Liverour', arraylivereur);
            formData.append('PriceDelivery', inputevalue.eq(8).val());
            formData.append('deliverytime_of', inputevalue.eq(9).val());
            formData.append('deliverytime_to', inputevalue.eq(10).val());

            $.ajax({
                url: '/restaurants/store',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                cache: false,
                success: function(data) {
                    if(data == 'Yes'){
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
                            $('#submite').submit();
                        },2000);
                    }else{
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
                            title: "Error",
                        });
                        setTimeout(() => {
                            $('#submite').submit();
                        },2000);
                    }
                },
            });

        }
        
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

    // delete restaurate 
    showmeals.on( 'click', ".deleterestaurant", function(){
        console.log($(this).parent().parent().parent().parent())
        $.ajax({
            url: '/restaurants/delete',
            type: "POST",
            data: { _token: $('meta[name="csrf-token"]').attr('content') , id: $(this).parent().parent().prev().children().attr('id').slice(1) },
            success: response => {
                if( response == 'Yes' ){
                    $(this).parent().parent().parent().parent().animate({  opacity: 0, height: 0 }, 500 )
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
                        $(this).parent().parent().parent().parent().remove();
                    },2000);
                }else{
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
                        title: "Error",
                    });
                    setTimeout(() => {
                        // $('#submite').submit();
                    },2000);
                }
            }
        });
    })

    
});



