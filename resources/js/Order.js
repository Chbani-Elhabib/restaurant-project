$(document).ready(function() {

    
    // datatable
    $("#example").DataTable({
        ordering: false,
    });

    // show order 

    const showorder = $('.show-order')

    $("#example").on( 'click' , '.show' , function(){
        $.ajax({
            url: '/order/showorder',
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                id: $(this).parent().parent().attr('data'),
            },
            success: function(response) {
                if( Object.keys(response).length == 8 ){
                    var html = '<div class="card-content">';
                        
                    html += '<div class="usinfo mt-4 ms-3 mb-2"><p class="mb-2">Order information  :</p></div>';

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

                    if(response.Order.active_Delivery_price == 1){
                        html += '<div class="d-flex total"><p>The price of meals :</p><p><span>'+ parseFloat(response.Order.total - response.Delivery_price) +'</span>DH</p></div>';
                        html += '<div class="d-flex total"><p>delivery price :</p><p><span>'+ response.Delivery_price  +'</span>DH</p></div>';
                    }else{
                        html += '<div class="d-flex total"><p>The price of meals :</p><p><span>'+ response.Order.total  +'</span>DH</p></div>';
                    }

                    html += '<div class="d-flex total"><p>Total :</p><p><span>'+ response.Order.total  +'</span>DH</p></div>';

                    html += '</div>';

                    showorder.html(html);
                    showorder.fadeIn(500);
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
        })
    })

    showorder.click( function(){
        $(this).fadeOut(500);
    })
});