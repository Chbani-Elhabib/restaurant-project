$(document).ready(function () {
    const addrestaurants = $(".addrestaurants");
    const formmeals = $(".formmeals");
    const image = $(".image");
    const valueinpute = $(".valueinpute");

    addrestaurants.eq(0).click((e) => {
        formmeals.slideToggle(500);
    });

    image.change((e) => {
        var filesArr = Array.prototype.slice.call(e.target.files);
        filesArr.forEach((f) => {
            if (!f.type.match("image.*")) {
                var html = "<p>Please insert a photo</p>";
                valueinpute.html(html);
            } else {
                var storedFiles = [];
                storedFiles.push(f);
                var reader = new FileReader();
                reader.onload = function (e) {
                    var html =
                        '<div class="vall"><img src="' +
                        e.target.result +
                        '"data-file="' +
                        f.name +
                        'alt="Category Image"></div>';
                    valueinpute.html(html);
                };
                reader.readAsDataURL(f);
            }
        });
    });

    // click add meals
    const forminput = $('.forminput')
    // addrestaurants.eq(1).click( e => {

    //     let regex = /^[a-zA-Z0-9]+$/;
    //     e.preventDefault();

    //     // validation input Name Food
    //     var xNameFood = true ;
    //     if( forminput.eq(0).val().length == 0 ){
    //         xNameFood = false ;
    //         forminput.eq(0).next().html('Please enter the name food');
    //         forminput.eq(0).addClass('border-danger')
    //         $('.labelnamefood').addClass('text-danger')
    //     }

    //     console.log( regex.test(forminput.eq(0).val()) )

    //     // validation textarea Description
    //     var xDescription = true ;
    //     if( forminput.eq(1).val().length == 0 ){
    //         xDescription = false ;
    //         forminput.eq(1).next().html('Please enter the Description');
    //         forminput.eq(1).addClass('border-danger')
    //         $('.labelDescription').addClass('text-danger')
    //     }else{
    //         xDescription = true ;
    //         forminput.eq(1).next().html('');
    //         forminput.eq(1).removeClass('border-danger')
    //         $('.labelDescription').removeClass('text-danger')
    //     }

    //     // validation input Price
    //     var xprice = true ;
    //     if( forminput.eq(2).val().length == 0 ){
    //         xprice = false ;
    //         forminput.eq(2).next().html('Please enter the Price');
    //         forminput.eq(2).addClass('border-danger')
    //         $('.labelprice').addClass('text-danger')
    //     }else if( !Number(forminput.eq(2).val())){
    //         xprice = false ;
    //         forminput.eq(2).next().html('Please enter the Number');
    //         forminput.eq(2).addClass('border-danger')
    //         $('.labelprice').addClass('text-danger')
    //     }else if(forminput.eq(2).val() < 0){
    //         xprice = false ;
    //         forminput.eq(2).next().html('Please enter a positive number');
    //         forminput.eq(2).addClass('border-danger')
    //         $('.labelprice').addClass('text-danger')
    //     }else{
    //         xprice = true ;
    //         forminput.eq(2).next().html('');
    //         forminput.eq(2).removeClass('border-danger')
    //         $('.labelprice').removeClass('text-danger')
    //     }

    //     // validation image
    //     var ximage = true ;
    //     if ($.inArray(image.val().split('.').pop().toLowerCase(), ['gif','png','jpg','jpeg']) == -1){
    //         ximage = false ;
    //         $('.imageinputee').addClass('text-danger');
    //     }else{
    //         ximage = true ;
    //         $('.imageinputee').removeClass('text-danger');
    //     }

    // })






    // Menu Sections
    const optionMenu = $(".select-menu");
    const selectBtn = $(".select-btn");
    const options = $(".option");
    const sBtn_text = $(".sBtn-text");

    selectBtn.click( e => {
        optionMenu.toggleClass("active")
    })
    
    options.each( option =>{
        options.eq(option).click( e => {
            let selectedOption = options.eq(option).children( "span" ).text();
            sBtn_text.text(selectedOption) ;
            forminput.eq(3).val(selectedOption);
            optionMenu.removeClass("active");
        })
    })


    $("#example").DataTable({ ordering: false, });


    // add to class active in lable and best meals

    const togglebtns = $('.toggle-btns')
    togglebtns.each( e => {
        togglebtns.eq(e).children().eq(0).children().eq(1).click( function(){
            $.ajax({
                url: "/admin/meal/best",
                type: "POST",
                data: {
                    id: $(this).parent().attr('data'),
                    _token: $('meta[name="csrf-token"]').attr("content"),
                },
                success: response => {
                    if(response =='yes'){
                        $(this).toggleClass('active');
                    }
                }
            });
        })
    })


    // delete meals
    $("#example").on("click", ".delete", function(){
        $.ajax({
            url: '/meals/delete',
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                id: $(this).parent().prev().children().children().attr('data') ,
            },
            success: response => {
                if(response == 'Yes' ){
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
                    $(this).parent().parent().animate({  opacity: 0, height: 0 }, 500, function(){ $(this).remove();})
                }
            }
        });
    })

    
});



