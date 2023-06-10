$(document).ready(function() {

    // click new order
    var orders = [];
    const Neworder = $('.Neworder');

    Neworder.click( function(){
        $(this).parents().next().children().slideToggle(800);
    })


    // click on option users
    $(".by_default").click(function() {
        $(".options").slideToggle(500);
        $(".by_default").toggleClass('active');
    });

    $(".options li").click(function() {
        var defaultShare = $(this).html();
        $(".by_default li").html(defaultShare);
        $(this).parents(".box").removeClass("active");
        $(".options").slideToggle(500);
        $(".by_default").toggleClass('active');
        $.ajax({  
            url: '/users/profile',  
            type: 'Post',  
            data: {id: $(this).children().eq(0).children().children().attr('alt') ,
                 _token: $('meta[name="csrf-token"]').attr("content"), },  
            success: function(res) {
                if( res != 'true'){
                    $('#phone').val(res.Telf)          
                    $('#Address').html(res.Address)          
                }  
            }  
        });  
    });


    // change Restaurants 
    const Restaurants = $('.Restaurants');
    const togglebtndelivry = $('.toggle-btn.delivry .toggle-label');
    const total = $('.total');


    Restaurants.change( function(){
        if(togglebtndelivry.attr('class') == 'toggle-label active'){
            total.children().eq(1).children().text( parseFloat(total.children().eq(1).children().text()) - parseFloat(Restaurants.parent().next().children().eq(2).children().text()))
            total.children().eq(1).children().text( parseFloat(total.children().eq(1).children().text()) + parseFloat($(this).val().split('.')[1]))
        }
        $(this).parent().next().children().eq(2).children().text($(this).val().split('.')[1])
    })


    // click on toggle-btn

    const togglebtn = $('.toggle-btn.mealss');


    togglebtn.each( e => {
        togglebtn.eq(e).click(function(){
            $(this).children().eq(1).toggleClass('active')
            if( $(this).children().eq(1).attr('class') == 'toggle-label active'){
                total.children().eq(1).children().text( parseFloat(total.children().eq(1).children().text()) + ( $(this).parent().prev().prev().children().children().text() * $(this).parent().prev().children().children().eq(1).text() ) )
            }else{
                total.children().eq(1).children().text( parseFloat(total.children().eq(1).children().text()) - ( $(this).parent().prev().prev().children().children().text() * $(this).parent().prev().children().children().eq(1).text() ) )
            }
        })
    })


    togglebtndelivry.click(function(e){
        togglebtndelivry.toggleClass('active');
        if(togglebtndelivry.attr('class') == 'toggle-label active'){
            total.children().eq(1).children().text( parseFloat(total.children().eq(1).children().text()) + parseFloat($(this).parent().parent().next().next().children().text()))
        }else{
            total.children().eq(1).children().text( parseFloat( parseFloat(total.children().eq(1).children().text())) - parseFloat($(this).parent().parent().next().next().children().text()) )
        }
    })

    // click button + and - 
    const plus = $('.plus');
    const munis = $('.munis');

    plus.each( function(e){
        plus.eq(e).click( function(){
            if( plus.eq(e).next().text() < 99 ){
                plus.eq(e).next().text( parseFloat(1)  + parseFloat(plus.eq(e).next().text()) )
                if( togglebtn.eq(e).children().eq(1).attr('class') == 'toggle-label active' ){
                    total.children().eq(1).children().text( parseFloat(total.children().eq(1).children().text()) + parseFloat(plus.eq(e).parent().parent().prev().children().children().text()))
                }
            }
        })
    })

    munis.each( function(e){
        munis.eq(e).click( function(){
            if( munis.eq(e).prev().text() > 1 ){
                munis.eq(e).prev().text( parseFloat(munis.eq(e).prev().text()) -  parseFloat(1) )
                if( togglebtn.eq(e).children().eq(1).attr('class') == 'toggle-label active' ){
                    total.children().eq(1).children().text( parseFloat(total.children().eq(1).children().text()) - parseFloat(plus.eq(e).parent().parent().prev().children().children().text()))
                }
            }
        })
    })



    // click add order 

    const addorder = $('.addorder');
    const by_default = $('.by_default');
    const phone = $('#phone');
    const Address = $('#Address');

    addorder.click( function(e){
        e.preventDefault();

        // validation customer
        var xcustomer = false ;
        if( by_default.children().children().children().eq(1).text().length == 0 ){
            by_default.css( 'border' , '0.2px solid #ff000061')
            by_default.parent().parent().prev().addClass('text-danger')
            by_default.parent().parent().next().text('please enter a valid customer')
            xcustomer = false ;
        }else{
            by_default.css( 'border' , '')
            by_default.parent().parent().prev().removeClass('text-danger')
            by_default.parent().parent().next().text('')
            xcustomer = true ;
        }

        // validation Restaurants
        var xRestaurants = false ;
        if( Restaurants.val() == null ){
            Restaurants.css( 'border' , '0.2px solid #ff000061')
            Restaurants.prev().addClass('text-danger')
            Restaurants.next().text('please enter a valid Restaurants')
            xRestaurants = false ;
        }else{
            Restaurants.css( 'border' , '')
            Restaurants.prev().removeClass('text-danger')
            Restaurants.next().text('')
            xRestaurants = true ;
        }


        // validation orders
        togglebtn.each( e => {
            if( togglebtn.eq(e).children().eq(1).attr('class') == 'toggle-label active' ){
                orders.push({id_meal: togglebtn.eq(e).attr('data-meal') ,nomber_meal: togglebtn.eq(e).parent().prev().children().children().eq(1).text()})
            }
        })

        var xorder = false ;
        if( orders.length == 0 ){
            togglebtn.parent().parent().parent().prev().addClass('text-danger')
            togglebtn.parent().parent().parent().css( 'border' , '0.2px solid #ff000061')
            togglebtn.parent().parent().parent().next().text('please enter a orders')
            xorder = false ;
        }else{
            togglebtn.parent().parent().parent().prev().removeClass('text-danger')
            togglebtn.parent().parent().parent().css( 'border' , '')
            togglebtn.parent().parent().parent().next().text('')
            xorder = true ;
        }

        if( xcustomer && xorder && xRestaurants ){


            // validation phonne 
            if(phone.val().length > 0 ){
                var telf = phone.val()
            }else{
                var telf = '';
            }

            // validation address 
            if(Address.val().length > 0 ){
                var adder = Address.val()
            }else{
                var adder = '';
            }

            // validation active dilivery price
            if(togglebtndelivry.attr('class') == 'toggle-label active'){
                var active_Delivery_price = 1 ;
            }else{
                var active_Delivery_price = 0 ;
            }

            $.ajax({
                url: '/order/managerstore',
                type: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr("content"),
                    id_person: by_default.children().children().children().eq(0).children().attr('alt'),
                    phone: telf,
                    Address: adder,
                    id_restaurant : Restaurants.val().split('.')[0],
                    active_Delivery_price : active_Delivery_price ,
                    orders : orders ,
                    total : total.children().eq(1).children().text() ,
                },
                success: function (response) {
                    if( response == 'yes'){
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
                            addorder.parent().parent().submit();
                        }, "2000");
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
                    }
                }
            });
            
        }



    })


    // datatable
    $("#example").DataTable({
        ordering: false,
    });



    // change servesorder

    const servesorder = $('.servesorder')

    servesorder.change( function(){
        $.ajax({
            url: '/order/servesorder',
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                id_order: $(this).attr('date-serves'),
                servesorder: $(this).val(),
            },
            success: response => {
                if( response == 'yes'){
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 1000,
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
                    $(this).parent().parent().removeClass('selecte')
                    $(this).parent().parent().addClass('Status-order')
                    $(this).parent().animate({  opacity: 0, height: 0 }, 500, function(){ $(this).remove();})
                    if($(this).val() == 1 ){
                        $(this).parent().parent().next().next().children().children().eq(1).remove()
                        $(this).parent().parent().next().next().children().children().eq(1).remove()
                        $(this).parent().parent().next().next().children().append('<img src="/image/update.png" alt="update" style="opacity: 0.3;">')
                        $(this).parent().parent().next().next().children().append('<img src="/image/delete.png" alt="delete" style="opacity: 0.3;">')
                        $(this).parent().parent().html('<div class="position-absolute"><p class="text-warning border border-warning Equip fs-4 mb-0">Equip</p></div>')
                    }else if( $(this).val() == 2 ){
                        $(this).parent().parent().html('<div class="position-absolute" ><p class="text-primary border border-primary Ready fs-4 mb-0">Ready</p></div>')
                    }else if( $(this).val() == 3 ){
                        $(this).parent().parent().html('<div class="position-absolute"><p class="text-primary border border-primary On-Delivery fs-5 mb-0">On Delivery</p></div>')
                    }else if( $(this).val() == 4 ){
                        $(this).parent().parent().html('<div class="position-absolute"><p class="text-success border border-success Delivery fs-4 mb-0">Delivery</p></div>')
                    }else if($(this).val() == 5 ){
                        $(this).parent().parent().html('<div class="position-absolute"><p class="text-danger border border-danger Cancelled fs-4 mb-0">Cancelled</p></div>')
                    }else{
                        $(this).parent().parent().html('<div class="position-absolute" ><p class="text-danger border border-danger m-0 Cancelled ancelled">ancelled delivery</p></div>')
                    }
                }
            }
        });
    })
    

    // click show orders 
    const myTable = $('#example');
    const card = $('.card');
    const sectioncard = $('header')
    myTable.on("click", ".show", function() {
        $.ajax({
            url: '/order/showorder',
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                id: $(this).parent().parent().attr('data'),
            },
            success: function(response) {
                if( Object.keys(response).length == 8 ){
                    sectioncard.next().fadeIn(500)

                    var html = '<div class="card-content">';
                    
                    html += '<div class="usinfo mt-4 ms-3"><p class="mb-2">Informations :</p></div>';
                    
                    if( window.location.href.split('/')[3] != 'chef' ){
    
                        html += '<div class="information d-flex justify-content-between mt-2 mb-2"><p class="mb-0">Client information </p><i class="fa-solid fa-chevron-up"></i></div>';
                        
                        html += '<div class="information-user mt-2">';
                        html += '<div class="d-flex"><p class="mb-2" >Name client :</p><p class="mb-2 ms-2">'+ response.Person.UserName  +'</p></div>';
                        html += '<div class="d-flex"><p class="mb-2" >Email client :</p><p class="mb-2 ms-2">'+ response.Person.Email +'</p></div>';
                        html += '<div class="d-flex"><p class="mb-2" >Phone :</p><p class="mb-2 ms-2">'+ response.Person.Telf +'</p></div>';
                        html += '<div class="d-flex"><p class="mb-2" >Country :</p><p class="mb-2 ms-2">'+ response.Person.Country +'</p></div>';
                        html += '<div class="d-flex"><p class="mb-2" >Regions :</p><p class="mb-2 ms-2">'+ response.Person.Regions +'</p></div>';
                        html += '<div class="d-flex"><p class="mb-2" >city :</p><p class="mb-2 ms-2">'+ response.Person.city +'</p></div>';
                        html += '<div class="d-flex"><p class="mb-2" >Address :</p><p class="mb-2 ms-2">'+ response.Person.Address +'</p></div>';
                        html += '</div>';
                    }

                    if( window.location.href.split('/')[3] == 'admin' ){
                        html += '<div class="information d-flex justify-content-between mt-2 mb-2"><p class="mb-0">Restaurant information</p><i class="fa-solid fa-chevron-up"></i></div>';
                        
                        html += '<div class="information-mcl mt-2">';
                        html += '<div class="d-flex"><p class="mb-2" >Name restaurant :</p><p class="mb-2 ms-2">'+ response.Restaurant+'</p></div>';
                        html += '</div>';

                        html += '<div class="information d-flex justify-content-between mt-2 mb-2"><p class="mb-0">Manager  information </p><i class="fa-solid fa-chevron-up"></i></div>';
                        
                        html += '<div class="information-mcl mt-2">';
                        html += '<div class="d-flex"><p class="mb-2" >UserName :</p><p class="mb-2 ms-2">'+ response.Manager.UserName  +'</p></div>';
                        html += '<div class="d-flex"><p class="mb-2" >Email :</p><p class="mb-2 ms-2">'+ response.Manager.Email +'</p></div>';
                        html += '</div>';
                    }

                    if( window.location.href.split('/')[3] == 'admin' || window.location.href.split('/')[3] == 'manager' ){
                        html += '<div class="information d-flex justify-content-between mt-2 mb-2"><p class="mb-0">Chef information </p><i class="fa-solid fa-chevron-up"></i></div>';
                                        
                        html += '<div class="information-mcl mt-2">';
                        html += '<div class="d-flex"><p class="mb-2" >UserName :</p><p class="mb-2 ms-2">'+ response.Chef.UserName  +'</p></div>';
                        html += '<div class="d-flex"><p class="mb-2" >Email :</p><p class="mb-2 ms-2">'+ response.Chef.Email +'</p></div>';
                        html += '</div>';    
                        
                        html += '<div class="information d-flex justify-content-between mt-2 mb-2"><p class="mb-0">Liverour	information </p><i class="fa-solid fa-chevron-up"></i></div>';
                                                            
                        html += '<div class="information-mcl mt-2">';
                        html += '<div class="d-flex"><p class="mb-2" >UserName :</p><p class="mb-2 ms-2">'+ response.Livrour.UserName  +'</p></div>';
                        html += '<div class="d-flex"><p class="mb-2" >Email :</p><p class="mb-2 ms-2">'+ response.Livrour.Email +'</p></div>';
                        html += '</div>'; 
                    }
                    
                    html += '<div class="information d-flex justify-content-between mt-2 mb-2"><p class="mb-0">Order information </p><i class="fa-solid fa-chevron-up"></i></div>';

                    html += '<div class="information-total">' ;
                    html += '<div class="orders p-2">';
                    response.order_meals.map( order => {
                        html += '<div class="d-grid order mb-2">';
                        html += '<div class="order-image"><img src="/meals/'+ order.meals.Photo +'" alt="'+ order.meals.TypeFood +'"></div>';
                        html += '<div><p class="mb-0">'+ order.meals.NameFood +'</p></div>';
                        html += '<div><p class="mb-0">'+ order.meals.TypeFood +'</p></div>';
                        html += '<div><p class="mb-0"><span>'+ order.meals.Price +'</span>DH</p></div>';
                        html += '<div><p class="mb-0">'+ order.ordered_number +'</p></div>';
                        html += '</div>';
                    });
                    html += '</div>';

                    html += '<div class="d-flex total mt-2"><p>type_payment :</p><p class="ms-2">'+ response.Order.type_payment  +'</p></div>';
                    if(response.Order.active_Delivery_price == 1){
                        html += '<div class="d-flex total"><p>The price of meals :</p><p><span>'+ parseFloat(response.Order.total - response.Delivery_price) +'</span>DH</p></div>';
                        html += '<div class="d-flex total"><p>delivery price :</p><p><span>'+ response.Delivery_price  +'</span>DH</p></div>';
                    }else{
                        html += '<div class="d-flex total"><p>The price of meals :</p><p><span>'+ response.Order.total  +'</span>DH</p></div>';
                    }
                    html += '<div class="d-flex total"><p>Total :</p><p><span>'+ response.Order.total  +'</span>DH</p></div>';

                    html += '</div>' ;
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

    sectioncard.next().click( function(e){
        sectioncard.next().fadeOut(500)
        card.fadeOut(500);
    })

    // click button delete 

    myTable.on( 'click', ".delete" , function(){
        $.ajax({
            url: '/order/delete',
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                id: $(this).parent().parent().attr('data'),
            },
            success: response => {
                if(response == "Yes" ){
                    $(this).parent().parent().parent().animate({  opacity: 0, height: 0 }, 500, function(){ $(this).remove();})
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
                }
            }
        });
    });


    // change livreur 
    myTable.on ( 'change' , '.livreur1' , function(){
        $.ajax({
            url: '/order/livreur/update',
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                id: $(this).val(),
                order: $(this).parent().parent().next().attr('data'),
            },
            success: response => {
                if(response == "Yes" ){
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
                }
            }
        });
    })
    

});
