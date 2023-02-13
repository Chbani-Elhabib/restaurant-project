import CityEn from './Country/Villes.json' assert {type: 'json'};

$(document).ready(function () {
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
    const labelimagesrestarant = $('.content section div.restaurants article.addrestautant form div.mb-1 label.form-label');
    const addimagerestaurand = $('.addimagerestaurand');
    
    toutimages.change( e => {;
        // console.log($(this).files)

        // var filesArr = Array.prototype.slice.call(e.target.files);
        // filesArr.forEach( f => {
        //     if (!f.type.match("image.*")) {
        //         var html ="Please insert a photo";
        //         $('.errorimage').html(html);
        //         labelimagesrestarant.last().addClass('text-danger');
        //     }else{
        //         var storedFiles = [] ;
        //         storedFiles.push(f);
        //         var reader = new FileReader();
        //         reader.onload = function (e) {
        //             $('.errorimage').html('');
        //             labelimagesrestarant.last().removeClass('text-danger');
        //             $('.content section div.restaurants article.addrestautant form div.addimage div.btn.btn-success').addClass('d-none');
        //             $('.content section div.restaurants article.addrestautant form div.addimage div.container').removeClass('d-none');
        //             var html ='<div class="image"><img src="' + e.target.result + '"data-file="' + f.name + 'alt="Category Image"></div>';
        //             addimagerestaurand.html(html);
        //             displayimg(imageno);
        //         };
        //         reader.readAsDataURL(f);
        //     }
        // });
    });

    const addimagerest = $('.content section div.restaurants article.addrestautant form div.addimage div.container div.dua:first-child div input');
    addimagerest.change( e => {
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
                var storedFiles = [] ;
                storedFiles.push(f);
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.content section div.restaurants article.addrestautant form div.addimage div.container .button').removeClass('d-none');
                    var html ='<div class="image"><img src="' + e.target.result + '"data-file="' + f.name + 'alt="Category Image"></div>';
                    addimagerestaurand.append(html);
                    displayimg(-1)
                };
                reader.readAsDataURL(f);
            }
        });
    });

    var imageno =1;
    $('.prev').click( e => {
        displayimg(imageno += -1)
    })
    $('.next').click( e => {
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



    
});



