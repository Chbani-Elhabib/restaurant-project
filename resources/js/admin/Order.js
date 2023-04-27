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
    const Restaurants = $('.Restaurants')

    Restaurants.change( function(){
        if(togglebtndelivry.attr('class') == 'toggle-label active'){
            total.children().eq(1).children().text( parseInt(total.children().eq(1).children().text()) - parseInt(Restaurants.parent().next().children().eq(2).children().text()))
            total.children().eq(1).children().text( parseInt(total.children().eq(1).children().text()) + parseInt($(this).val().split('.')[1]))
        }
        $(this).parent().next().children().eq(2).children().text($(this).val().split('.')[1])
    })


    // click on toggle-btn

    const togglebtn = $('.toggle-btn.mealss');
    const total = $('.total');

    togglebtn.each( e => {
        togglebtn.eq(e).click(function(){
            $(this).children().eq(1).toggleClass('active')
            if( $(this).children().eq(1).attr('class') == 'toggle-label active'){
                total.children().eq(1).children().text( parseInt(total.children().eq(1).children().text()) + ( $(this).parent().prev().prev().children().children().text() * $(this).parent().prev().children().children().eq(1).text() ) )
            }else{
                total.children().eq(1).children().text( parseInt(total.children().eq(1).children().text()) - ( $(this).parent().prev().prev().children().children().text() * $(this).parent().prev().children().children().eq(1).text() ) )
            }
        })
    })

    const togglebtndelivry = $('.toggle-btn.delivry .toggle-label');

    togglebtndelivry.click(function(e){
        togglebtndelivry.toggleClass('active');
        if(togglebtndelivry.attr('class') == 'toggle-label active'){
            total.children().eq(1).children().text( parseInt(total.children().eq(1).children().text()) + parseInt($(this).parent().parent().next().next().children().text()))
        }else{
            total.children().eq(1).children().text( parseInt( parseInt(total.children().eq(1).children().text())) - parseInt($(this).parent().parent().next().next().children().text()) )
        }
    })

    // click button + and - 
    const plus = $('.plus');
    const munis = $('.munis');

    plus.each( function(e){
        plus.eq(e).click( function(){
            if( plus.eq(e).next().text() < 99 ){
                plus.eq(e).next().text( parseInt(1)  + parseInt(plus.eq(e).next().text()) )
                if( togglebtn.eq(e).children().eq(1).attr('class') == 'toggle-label active' ){
                    total.children().eq(1).children().text( parseInt(total.children().eq(1).children().text()) + parseInt(plus.eq(e).parent().parent().prev().children().children().text()))
                }
            }
        })
    })

    munis.each( function(e){
        munis.eq(e).click( function(){
            if( munis.eq(e).prev().text() > 1 ){
                munis.eq(e).prev().text( parseInt(munis.eq(e).prev().text()) -  parseInt(1) )
                if( togglebtn.eq(e).children().eq(1).attr('class') == 'toggle-label active' ){
                    total.children().eq(1).children().text( parseInt(total.children().eq(1).children().text()) - parseInt(plus.eq(e).parent().parent().prev().children().children().text()))
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
            success: function (response) {
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
                id: $(this).parent().attr('data'),
            },
            success: function(response) {
                if( Object.keys(response).length == 8 ){
                    console.log(response)

                    sectioncard.next().fadeIn(500)
                    var html = '<div class="d-flex"><p>UserName Client :</p><p>'+ response.Person.UserName +'</p></div>';
                    html += '<div class="d-flex"><p>Email Client :</p><p>'+ response.Person.Email  +'</p></div>';
                    html += '<div class="d-flex"><p>Phone Client :</p><p>'+ response.Person.Telf  +'</p></div>';
                    html += '<div class="d-flex"><p>Address Client :</p><p>'+ response.Person.Address  +'</p></div>';
                    html += '<div class="d-flex"><p>Restaurant :</p><p>'+ response.Restaurant  +'</p></div>';
                    html += '<div class="d-flex"><p>Manager :</p><p>'+ response.Manager  +'</p></div>';
                    html += '<div class="d-flex"><p>Livrour :</p><p>'+ response.Livrour  +'</p></div>';
                    html += '<div class="d-flex"><p>Chef :</p><p>'+ response.Chef  +'</p></div>';
                    html += '<div class="d-flex"><p>orders :</p></div>';
                    html += '<div class="orders">';
                    response.order_meals.map( order => {
                        html += '<div class="d-flex order">';
                        html += '<div class="order-image"><img src="/meals/'+ order.meals.Photo +'" alt="'+ order.meals.TypeFood +'"></div>';
                        html += '<div><p>'+ order.meals.NameFood +'</p></div>';
                        html += '<div><p>'+ order.meals.TypeFood +'</p></div>';
                        html += '<div><p>'+ order.meals.Price +'</p></div>';
                        html += '<div><p>'+ order.ordered_number +'</p></div>';
                        html += '</div>';
                    });
                    html += '</div>';
                    html += '<div class="d-flex"><p>type_payment :</p><p>'+ response.Order.type_payment  +'</p></div>';
                    if(response.Order.active_Delivery_price == 1){
                        html += '<div class="d-flex"><p>The price of meals :</p><p>'+ parseInt(response.Order.total - response.Delivery_price) +'</p></div>';
                        html += '<div class="d-flex"><p>delivery price :</p><p>'+ response.Delivery_price  +'</p></div>';
                    }else{
                        html += '<div class="d-flex"><p>The price of meals :</p><p>'+ response.Order.total  +'</p></div>';
                    }
                    html += '<div class="d-flex"><p>Total :</p><p>'+ response.Order.total  +'</p></div>';
                    card.html(html);
                    card.fadeIn(500);
                }
            }
        })
    });

    sectioncard.next().click( function(e){
        sectioncard.next().fadeOut(500)
        card.fadeOut(500);
    })

});
