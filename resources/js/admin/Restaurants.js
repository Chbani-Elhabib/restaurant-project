import CityEn from './Country/Villes.json' assert {type: 'json'};

$(document).ready(function () {

    // addrestaurants
    const addrestaurants = $('.addrestaurants');
    const addrestautant = $('.addrestautant');
    addrestaurants.click( e => {
        addrestautant.slideToggle(500);
    })

    const example = $('#example');
    // example.DataTable({ ordering: false });
    // Country
    const Regions = $('.Regions');
    const City = $('.city');
    Regions.change( e => {
        var html = '';
        if(Regions.val() == "" ){
            html +='<option></option>';
        }else{
            html += '<option selected disabled></option>';
            CityEn.map( city => {
                if(Regions.val() == city.region ){
                    html += '<option value="'+ city.ville +'">'+ city.ville +'</option>';
                }
            })
        }
        City.html(html)
    })
    // Country and livreur
    const manager = $('.manager');
    $.ajax({
        url: '/users/manager',
        type: "POST",
        data: { _token: $('meta[name="csrf-token"]').attr('content')},
        success: function (response) {
            var html = '<option selected disabled></option>';
            response.map( Manager => {
                html += '<option value="'+ Manager.id +'">'+ Manager.UserName +'</option>';
            })
            manager.html(html);
        }
    })

    //Liverour
    const selectBox = $('.selectBox');
    const checkboxes = $('#checkboxes');


    selectBox.click( e => {
        checkboxes.slideToggle(500)
    })

    $.ajax({
        url: '/users/livreur',
        type: "POST",
        data: { _token: $('meta[name="csrf-token"]').attr('content')},
        success: function (response) {
            var html = '';
            response.map( Manager => {
                html += '<label for="'+ Manager.id +'"><input type="checkbox" name="Liverour[]" value="'+ Manager.id +'" id="'+ Manager.id +'">'+ Manager.UserName +'</label>';
            })
            checkboxes.html(html);
        }
    })

    // add image 
    const toutimages = $('.toutimages');
    const jjjj = $('.jjjj');
    const addimagerestaurand = $('.addimagerestaurand');
    var storedFiles = new Array() ;
    // var file = "";

    // toutimages.change(function(e) { 
    //     var filesArr = Array.prototype.slice.call(e.target.files);
    //     filesArr.forEach( f => {
    //         if (!f.type.match("image.*")) {
    //             Swal.fire({
    //                 position: 'top-end',
    //                 icon: 'error',
    //                 title: 'Please insert a photo',
    //                 toast: true,
    //                 showConfirmButton: false,
    //                 timerProgressBar: true,
    //                 didOpen: (toast) => {
    //                     toast.addEventListener('mouseenter', Swal.stopTimer)
    //                     toast.addEventListener('mouseleave', Swal.resumeTimer)
    //                 },
    //                 timer: 3000
    //             })
    //         }else{
    //             storedFiles.push(this.files[0]);
    //             console.log(toutimages.val())
    //             jjjj.val('toutimages.val()')
    //             // console.log(toutimages.prop('files')[0])
    //             // $('#file2').val('').attr('type', 'text').attr('type', 'file');
    //             // jjjj.prop('files')[0] = toutimages.prop('files')[0] ;                            
    //             file = this.files[0];
    //             var reader = new FileReader();
    //             reader.onload = function (e) {
    //                 if(storedFiles.length == 1 ){
    //                     $('.content section div.restaurants article.addrestautant form div.addimage div.btn.btn-success').addClass('d-none');
    //                     $('.content section div.restaurants article.addrestautant form div.addimage div.container').removeClass('d-none');
    //                     var html ='<div class="image"><img src="' + e.target.result + '"data-file="' + f.name + 'alt="Category Image"></div>';
    //                     addimagerestaurand.html(html);
    //                     displayimg(imageno);
    //                 }else{
    //                     $('.content section div.restaurants article.addrestautant form div.addimage div.container .button').removeClass('d-none');
    //                     var html ='<div class="image"><img src="' + e.target.result + '"data-file="' + f.name + 'alt="Category Image"></div>';
    //                     addimagerestaurand.append(html);
    //                     displayimg(-1)
    //                 }
    //             };
    //             reader.readAsDataURL(f);
    //         }
    //     });
    // });



    // click add 
    // const clickadd = $('.button_19.float-end.me-4');
    // const submite = $('#submite');

    // submite.submit(function(e) {
    //     e.preventDefault();
    //     // console.log(storedFiles)
    //     // console.log(file)
    //     var data = new FormData(this);
    //     // data.append( 'image' , JSON(storedFiles) ); 
    //     // data.append( 'imagee' , file );
    //     $.ajax({
    //         url: '/admin/restaurants/store',
    //         type: "POST",
    //         data: data ,
    //         processData: false,
    //         contentType: false,
    //         success: function (response) {
    //             console.log(response)
    //         }
    //     })
    // })


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
    displayimg(1)



    
});



