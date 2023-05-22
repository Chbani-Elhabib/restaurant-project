import CityEn from "./Country/Villes.json" assert { type: "json" };
$(document).ready(function(){

    const inputevalue = $('.inputevalue');
    const inputemanager = $('.inputemanager');


    // manager
    $.ajax({
        url: '/users/manager',
        type: "POST",
        data: { _token: $('meta[name="csrf-token"]').attr('content')},
        success: function (response) {
            var html = '<option disabled></option>';
            response.map( Manager => {
                html += '<option value="'+ Manager.id_people +'">'+ Manager.UserName +'</option>';
            })
            inputemanager.prepend(html);
        }
    })
    
    //  Chef
    $.ajax({
        url: '/users/chef',
        type: "POST",
        data: { _token: $('meta[name="csrf-token"]').attr('content')},
        success: function (response){
            var html = '<option disabled></option>';
            response.map( Manager => {
                html += '<option value="'+ Manager.id_people +'">'+ Manager.UserName +'</option>';
            })
            inputevalue.eq(1).prepend(html);
        }
    })

    //Liverour
    const checkboxes = $('#checkboxes');

    inputevalue.eq(2).parent().click( e => {
        checkboxes.slideToggle(500)
    });

    // newaddimage image restaurant
    const newaddimage = $('#newaddimage');
    const addimagerestaurand = $('.addimagerestaurand');
    var formData = new FormData();
    formData.append('_token', $("input[name='_token']").val());

    newaddimage.change(function(e) { 
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
                    reader.onload = e => {
                        $(this).parent().next().removeClass('d-none')
                        $(this).parent().addClass('d-none')
                            var html ='<div class="image"><img src="'+e.target.result+'" data-file="'+f.name+'" alt="Category Image"></div>';
                            addimagerestaurand.append(html);
                            displayimg(imageno);
                    };
                    reader.readAsDataURL(f);
                }
            }
        });
    });

    // add image restaurant
    const addimage = $('#addimage');


    addimage.change(function(e) { 
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
                    reader.onload = e => {
                        if( $(this).parent().parent().next().children().length == 1 ){
                            $(this).parent().parent().next().next().removeClass('d-none');
                            var html ='<div class="image"><img src="'+e.target.result+'" data-file="'+f.name+'" alt="Category Image"></div>';
                            addimagerestaurand.append(html);
                            displayimg(-1);
                        }else{
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

    // update image restaurant
    const updateimage = $('#updateimage');
    var updateimagearry = [] ;
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
                        if( $(this).parent().parent().next().children().eq(el).children().attr('file-name') != undefined){
                            updateimagearry.push($(this).parent().parent().next().children().eq(el).children().attr('file-name'));
                            formData.append('image[]', e.target.files[0]);
                            var reader = new FileReader();
                            reader.onload = e => {
                                $(this).parent().parent().next().children().eq(el).children().attr('src' , e.target.result )
                                $(this).parent().parent().next().children().eq(el).children().attr('data-file' , f.name )
                                $(this).parent().parent().next().children().eq(el).children().removeAttr('file-name');
                            };
                            reader.readAsDataURL(f);
                        }
                        if( $(this).parent().parent().next().children().eq(el).children().attr('data-file') != undefined){
                            var datafilter = formData.getAll('image[]').filter( n => n.name != $(this).parent().parent().next().children().eq(el).children().attr('data-file') )
                            formData.delete('image[]');
                            datafilter.map( datafilter => {
                                formData.append('image[]', datafilter );
                            })
                            formData.append('image[]', e.target.files[0]);
                            var reader = new FileReader();
                            reader.onload = e => {
                                $(this).parent().parent().next().children().eq(el).children().attr('src' , e.target.result )
                                $(this).parent().parent().next().children().eq(el).children().attr('data-file' , f.name )
                            };
                            reader.readAsDataURL(f);
                        }
                    }
                })
            }
        });
    });

    // delete image restaurant
    const Delete = $('#delete');
    Delete.click(function(e) {
        $(this).parent().next().children().map( el => {
            if( $(this).parent().next().children().eq(el).attr('style') == 'display: block;'){
                if($(this).parent().next().children().length == 1 ){
                    if( $(this).parent().next().children().eq(el).children().attr('file-name') != undefined){
                        updateimagearry.push($(this).parent().next().children().eq(el).children().attr('file-name'));
                    }else{
                        var datafilter = formData.getAll('image[]').filter( n => n.name != $(this).parent().next().children().eq(el).children().attr('data-file') )
                        formData.delete('image[]');
                        datafilter.map( datafilter => {
                            formData.append('image[]', datafilter );
                        })
                    }
                    $(this).parent().parent().addClass('d-none')
                    $(this).parent().parent().prev().removeClass('d-none')
                }else if($(this).parent().next().children().length == 2 ){
                    if( $(this).parent().next().children().eq(el).children().attr('file-name') != undefined){
                        updateimagearry.push($(this).parent().next().children().eq(el).children().attr('file-name'));
                    }else{
                        var datafilter = formData.getAll('image[]').filter( n => n.name != $(this).parent().next().children().eq(el).children().attr('data-file') )
                        formData.delete('image[]');
                        datafilter.map( datafilter => {
                            formData.append('image[]', datafilter );
                        })
                    }
                    $(this).parent().next().next().addClass('d-none')
                    $(this).parent().next().children().css('display' , 'block');
                }else{
                    if( $(this).parent().next().children().eq(el).children().attr('file-name') != undefined){
                        updateimagearry.push($(this).parent().next().children().eq(el).children().attr('file-name'));
                    }else{
                        var datafilter = formData.getAll('image[]').filter( n => n.name != $(this).parent().next().children().eq(el).children().attr('data-file') )
                        formData.delete('image[]');
                        datafilter.map( datafilter => {
                            formData.append('image[]', datafilter );
                        })
                    }
                    displayimg(imageno += 1);
                }
                $(this).parent().next().children().eq(el).remove();

            }
        })
    })

    var imageno = 1 ;

    $('.prev').click( el => {
        displayimg(imageno -= 1)
    })

    $('.next').click( el => {
        displayimg(imageno += 1)
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


    // update restaurant 
    const Update = $('.Update');

    Update.click( function(e){
        e.preventDefault();

        // validation name restaurant
        var xRestaurant = true ;
        if(inputevalue.eq(0).val().length == 0){
            xRestaurant = false ;
            inputevalue.eq(0).css('border','0.5px solid #dd3545')
            inputevalue.eq(0).next().html('Please enter the Name Restaurant')
            inputevalue.eq(0).prev().addClass('text-danger')
        }else{
            xRestaurant = true ;
            inputevalue.eq(0).css('border','')
            inputevalue.eq(0).next().html('')
            inputevalue.eq(0).prev().removeClass('text-danger')
        }

        
        // validation manager
        var xmanager = true ;
        if(inputemanager.val( ) == null ){
            xmanager = false ;
            inputemanager.css('border','0.5px solid #dd3545')
            inputemanager.next().html('Please enter the manager')
            inputemanager.prev().addClass('text-danger')
        }else{
            xmanager = true ;
            inputemanager.css('border','')
            inputemanager.next().html('')
            inputemanager.prev().removeClass('text-danger')
        }

        // validation chef
        var xchef = true ;
        if(inputevalue.eq(1).val( ) == null ){
            xchef = false ;
            inputevalue.eq(1).css('border','0.5px solid #dd3545')
            inputevalue.eq(1).next().html('Please enter the chef')
            inputevalue.eq(1).prev().addClass('text-danger')
        }else{
            xchef = true ;
            inputevalue.eq(1).css('border','')
            inputevalue.eq(1).next().html('')
            inputevalue.eq(1).prev().removeClass('text-danger')
        }

        // validation livreur
        var xlivreur = true ;
        var arraylivereur = [] ;
        inputevalue.eq(2).parent().next().children().map( e => {
            if( inputevalue.eq(2).parent().next().children().eq(e).children().prop('checked') === true ){
                arraylivereur.push(inputevalue.eq(2).parent().next().children().eq(e).children().val())
            }
        })

        if(arraylivereur.length > 0 ){
            xlivreur = true ;
            inputevalue.eq(2).css('border','')
            inputevalue.eq(2).parent().next().next().html('')
            inputevalue.eq(2).parent().prev().removeClass('text-danger')
        }else{
            xlivreur = false ;
            inputevalue.eq(2).css('border','0.5px solid #dd3545')
            inputevalue.eq(2).parent().next().next().html('Please enter the chef')
            inputevalue.eq(2).parent().prev().addClass('text-danger')
        }

        
        // validation Delivery Price 
        var xPriceDelivery = true ;
        if(inputevalue.eq(3).val().length <= 0 ){
            xPriceDelivery = false ;
            inputevalue.eq(3).css('border','0.5px solid #dd3545')
            inputevalue.eq(3).next().html('Please enter the Delivery Price')
            inputevalue.eq(3).prev().addClass('text-danger')
        }else{
            xPriceDelivery = true ;
            inputevalue.eq(3).css('border','')
            inputevalue.eq(3).next().html('')
            inputevalue.eq(3).prev().removeClass('text-danger')
        }

        // validation delivery time
        var xdeliverytime = true ;
        if(inputevalue.eq(4).val().length <= 0  && inputevalue.eq(5).val().length <= 0  ){
            xdeliverytime = false ;
            inputevalue.eq(4).css('border','0.5px solid #dd3545')
            inputevalue.eq(5).css('border','0.5px solid #dd3545')
            inputevalue.eq(4).parent().next().html('Please enter the delivery time')
            inputevalue.eq(4).parent().prev().addClass('text-danger')
            inputevalue.eq(4).prev().addClass('text-danger')
            inputevalue.eq(4).next().addClass('text-danger')
            inputevalue.eq(5).next().addClass('text-danger')
        }else if(inputevalue.eq(4).val().length <= 0){
            xdeliverytime = false ;
            inputevalue.eq(4).css('border','0.5px solid #dd3545')
            inputevalue.eq(5).css('border','')
            inputevalue.eq(4).parent().next().html('Please enter the delivery time')
            inputevalue.eq(4).parent().prev().addClass('text-danger')
            inputevalue.eq(4).prev().addClass('text-danger')
            inputevalue.eq(4).next().removeClass('text-danger')
            inputevalue.eq(5).next().removeClass('text-danger')
        }else if(inputevalue.eq(5).val().length <= 0 ){
            xdeliverytime = false ;
            inputevalue.eq(4).css('border','')
            inputevalue.eq(5).css('border','0.5px solid #dd3545')
            inputevalue.eq(4).parent().next().html('Please enter the delivery time')
            inputevalue.eq(4).parent().prev().addClass('text-danger')
            inputevalue.eq(4).prev().removeClass('text-danger')
            inputevalue.eq(4).next().addClass('text-danger')
            inputevalue.eq(5).next().addClass('text-danger')
        }else{
            xdeliverytime = true ;
            inputevalue.eq(4).css('border','')
            inputevalue.eq(5).css('border','')
            inputevalue.eq(4).parent().next().html('')
            inputevalue.eq(4).parent().prev().removeClass('text-danger')
            inputevalue.eq(4).prev().removeClass('text-danger')
            inputevalue.eq(4).next().removeClass('text-danger')
            inputevalue.eq(5).next().removeClass('text-danger')
        }

        // validation image
        var ximage = true ;
        if(addimagerestaurand.children().length == 0 ){
            ximage = false ;
            addimagerestaurand.parent().parent().css('border','0.5px solid #dd3545')
            addimagerestaurand.parent().parent().prev().addClass('text-danger')
            addimagerestaurand.parent().parent().next().html('Please enter the Restaurant image')
        }else{
            ximage = true ;
            addimagerestaurand.parent().parent().prev().removeClass('text-danger')
            addimagerestaurand.parent().parent().next().html('')
            addimagerestaurand.parent().parent().css('border','')
        }

        if( xRestaurant  && xmanager && xchef && xlivreur && xPriceDelivery && xdeliverytime && ximage ){

            formData.append('NameRestaurant', inputevalue.eq(0).val());
            formData.append('manager', inputemanager.val( ));
            formData.append('chef', inputevalue.eq(1).val());
            formData.append('Livreurs', arraylivereur);
            formData.append('PriceDelivery', inputevalue.eq(3).val());
            formData.append('deliverytime_of', inputevalue.eq(4).val());
            formData.append('deliverytime_to', inputevalue.eq(5).val());
            formData.append('deleteimage', updateimagearry );
            formData.append('id_restaurant', window.location.href.split('/')[5] );

            $.ajax({
                url: '/restaurants/update',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                cache: false,
                success: function(data) {
                    console.log(data)
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
                            if(window.location.href.split('/')[3] == 'admin' ){
                                window.location.href = '/admin/restaurants';
                            }else if( window.location.href.split('/')[3] == 'manager' ){
                                window.location.href = '/manager/restaurants';
                            }
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

    })

    
});