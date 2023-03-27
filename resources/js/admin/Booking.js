$(document).ready(function() {

    // click new order
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


    // click on toggle-btn

    const togglebtn = $('.toggle-btn.mealss')
    togglebtn.each( function(e){
        togglebtn.eq(e).click(function(){
            $(this).children().eq(1).toggleClass('active')
        })
    })

    const togglebtndelivry = $('.toggle-btn.delivry')
    togglebtndelivry.click( e => {
        console.log(togglebtndelivry)
        // $(this).children().eq(1).toggleClass('active')
    })



    // datatable
    $("#example").DataTable({
        responsive: true,
        ordering: false,
    });

    
    


});
