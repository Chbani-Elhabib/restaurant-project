$(document).ready(function() {



    $(".by_default").click(function() {
        $(".options").slideToggle(1000);
        $(".by_default").toggleClass('active');
    });

    $(".options li").click(function() {
        var defaultShare = $(this).html();
        $(".by_default li").html(defaultShare);
        $(this).parents(".box").removeClass("active");
    });


    // datatable
    $("#example").DataTable({
        responsive: true,
        ordering: false,
    });

    
    


});
