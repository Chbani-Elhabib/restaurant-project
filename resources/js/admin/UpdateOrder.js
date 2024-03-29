$(document).ready(function() {

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
    const togglebtndelivry = $('.toggle-btn.delivry .toggle-label');
    const total = $('.total');

    Restaurants.change( function(){
        if(togglebtndelivry.attr('data') == 'True'){
            total.children().eq(1).children().text( parseInt(total.children().eq(1).children().text()) - parseInt(Restaurants.parent().next().children().eq(2).children().text()))
            total.children().eq(1).children().text( parseInt(total.children().eq(1).children().text()) + parseInt($(this).val().split('.')[1]))
        }
        $(this).parent().next().children().eq(2).children().text($(this).val().split('.')[1])
    })

    // click button delivry 
    togglebtndelivry.click(function(e){
        if(togglebtndelivry.attr('data') == 'True'){
            togglebtndelivry.removeClass('active');
            togglebtndelivry.attr('data' , 'Folse');
            total.children().eq(1).children().text( parseInt( parseInt(total.children().eq(1).children().text())) - parseInt($(this).parent().parent().next().next().children().text()) )
        }else{
            togglebtndelivry.addClass('active');
            togglebtndelivry.attr('data' , 'True');
            total.children().eq(1).children().text( parseInt(total.children().eq(1).children().text()) + parseInt($(this).parent().parent().next().next().children().text()))
        }
    })

    // click on toggle-btn

    const togglebtn = $('.toggle-btn.mealss');

    togglebtn.each( e => {
        togglebtn.eq(e).click(function(){
            var x = parseFloat(total.children().eq(1).children().text()) ;
            var y = parseFloat($(this).parent().prev().prev().children().children().text()) ;
            var z = parseFloat($(this).parent().prev().children().children().eq(1).text()) ;
        if( $(this).children().eq(1).attr('data') == 'True'){
            $(this).children().eq(1).removeClass('active');
            $(this).children().eq(1).attr( 'data' , 'Folse' );
            total.children().eq(1).children().text(x - ( y * z ))
        }else{
            $(this).children().eq(1).addClass('active');
            $(this).children().eq(1).attr( 'data' , 'True' );
            total.children().eq(1).children().text(x + ( y * z ))
        }
        })
    })

    // click button + and - 
    const plus = $('.plus');
    const munis = $('.munis');

    plus.each( function(e){
        plus.eq(e).click( function(){
            if( plus.eq(e).next().text() < 99 ){
                plus.eq(e).next().text( parseInt(1)  + parseInt(plus.eq(e).next().text()) )
                if( togglebtn.eq(e).children().eq(1).attr('data') == 'True' ){
                    var x = parseFloat(total.children().eq(1).children().text()) ;
                    var y = parseFloat(plus.eq(e).parent().parent().prev().children().children().text()) ;
                    total.children().eq(1).children().text( x + y )
                }
            }
        })
    })

    munis.each( function(e){
        munis.eq(e).click( function(){
            if( munis.eq(e).prev().text() > 1 ){
                munis.eq(e).prev().text( parseInt(munis.eq(e).prev().text()) -  parseInt(1) )
                if( togglebtn.eq(e).children().eq(1).attr('data') == 'True' ){
                    var x = parseFloat(total.children().eq(1).children().text()) ;
                    var y = parseFloat(plus.eq(e).parent().parent().prev().children().children().text()) ;
                    total.children().eq(1).children().text( x - y )
                }
            }
        })
    })

    // click add order 

    const updateorder = $('.updatorder');
    const by_default = $('.by_default');
    const phone = $('#phone');
    const Address = $('#Address');

    updateorder.click( function(e){
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
        var orders = [];

        togglebtn.each( e => {
            if( togglebtn.eq(e).children().eq(1).attr('data') == 'True' ){
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
            if(togglebtndelivry.attr('data') == 'True'){
                var active_Delivery_price = 1 ;
            }else{
                var active_Delivery_price = 0 ;
            }

            $.ajax({
                url: '/order/update',
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
                    id_order: window.location.href.split('/')[5] ,
                },
                success: function (response) {
                    if( response == 'Yes'){
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
                            if(window.location.href.split('/')[3] == 'admin' ){
                                window.location.href = '/admin/order';
                            }else if( window.location.href.split('/')[3] == 'manager' ){
                                window.location.href = '/manager/order';
                            }
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
                        setTimeout(() => {
                            updateorder.parent().parent().submit();
                        }, "2000");
                    }
                }
            });
            
        }



    });

});