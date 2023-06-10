$(document).ready(function () {

    // Menu Sections
    const optionMenu = $(".select-menu");
    const selectBtn = $(".select-btn");
    const options = $(".options");
    const sBtn_text = $(".sBtn-text");
    const forminput = $(".forminput");

    selectBtn.click( e => {
        options.slideToggle(500)
    })
    
    options.children().each( option =>{
        options.children().eq(option).click( e => {
            sBtn_text.text(options.children().eq(option).children( "span" ).text()) ;
            forminput.eq(3).val(options.children().eq(option).children( "span" ).text());
            options.slideUp(500);
        })
    })


    // update image meals 
    forminput.eq(4).change((e) => {
        var filesArr = Array.prototype.slice.call(e.target.files);
        filesArr.forEach((f) => {
            if (!f.type.match("image.*")) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })                      
                Toast.fire({
                    icon: 'error',
                    title: 'Please insert a photo'
                })
            } else {
                var storedFiles = [];
                storedFiles.push(f);
                var reader = new FileReader();
                reader.onload = function (e) {
                    forminput.eq(4).parent().next().children().attr('src' , e.target.result )
                };
                reader.readAsDataURL(f);
            }
        });
    });



    const addrestaurants = $(".addrestaurants");
    // click add meals
    addrestaurants.click( e => {
        let regex = /^[a-zA-Z0-9]+$/;
        e.preventDefault();

        // validation input Name Food
        var xNameFood = true ;
        if( forminput.eq(0).val().length <= 0 ){
            xNameFood = false ;
            forminput.eq(0).next().html('Please enter the name food');
            forminput.eq(0).addClass('border-danger')
            $('.labelnamefood').addClass('text-danger')
        }else{
            xNameFood = true ;
            forminput.eq(0).next().html('');
            forminput.eq(0).removeClass('border-danger')
            $('.labelnamefood').removeClass('text-danger')
        }



        // validation textarea Description
        var xDescription = true ;
        if( forminput.eq(1).val().length <= 0 ){
            xDescription = false ;
            forminput.eq(1).next().html('Please enter the Description');
            forminput.eq(1).addClass('border-danger')
            $('.labelDescription').addClass('text-danger')
        }else{
            xDescription = true ;
            forminput.eq(1).next().html('');
            forminput.eq(1).removeClass('border-danger')
            $('.labelDescription').removeClass('text-danger')
        }


        // validation input Price
        var xprice = true ;
        if( forminput.eq(2).val().length <= 0 ){
            xprice = false ;
            forminput.eq(2).next().html('Please enter the Price');
            forminput.eq(2).addClass('border-danger')
            $('.labelprice').addClass('text-danger')
        }else if( !Number(forminput.eq(2).val())){
            xprice = false ;
            forminput.eq(2).next().html('Please enter the Number on "10.5"');
            forminput.eq(2).addClass('border-danger')
            $('.labelprice').addClass('text-danger')
        }else if(forminput.eq(2).val() < 0){
            xprice = false ;
            forminput.eq(2).next().html('Please enter a positive number');
            forminput.eq(2).addClass('border-danger')
            $('.labelprice').addClass('text-danger')
        }else{
            xprice = true ;
            forminput.eq(2).next().html('');
            forminput.eq(2).removeClass('border-danger')
            $('.labelprice').removeClass('text-danger')
        }



        // validation Menu Sections
        var xMenSections = true ;
        if(forminput.eq(3).val().length <= 0 ){
            xMenSections = false ;
            forminput.eq(3).next().next().children().html('Please enter the Menu Sections');
            forminput.eq(3).next().css('border' , '#dc356f solid 0.5px');
            $('.labelSections').addClass('text-danger');
        }else{
            xMenSections = true ;
            forminput.eq(3).next().next().children().html('');
            forminput.eq(3).next().css('border' , '')
            $('.labelSections').removeClass('text-danger')
        }







        if(xNameFood && xDescription && xprice && xMenSections){
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
                $('form').submit();
            }, "2000");
        }



    })
    

});