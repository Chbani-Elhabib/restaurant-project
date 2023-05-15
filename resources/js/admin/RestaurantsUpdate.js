import CityEn from "./Country/Villes.json" assert { type: "json" };
$(document).ready(function(){

    const inputevalue = $('.inputevalue');
    const inputemanager = $('.inputemanager');
    // city 
    var html = "";
    if (inputevalue.eq(2).val() == "") {
        html += "<option></option>";
    }else {
        html += "<option selected disabled></option>";
        CityEn.map((city) => {
            if (inputevalue.eq(2).val() == city.region) {
                html += '<option value="' + city.ville + '"' ;
                if( inputevalue.eq(3).attr('data') == city.ville  ){
                    html += 'selected'
                } 
                html += '>' + city.ville +  '</option>';
            }
        });
    }
    inputevalue.eq(3).html(html);

    // click Regions change city
    inputevalue.eq(2).change( e => {
        var html = '';
        if(inputevalue.eq(2).val() == "" ){
            html +='<option></option>';
        }else{
            html += '<option selected disabled></option>';
            CityEn.map( city => {
                if(inputevalue.eq(2).val() == city.region ){
                    html += '<option value="'+ city.ville +'">'+ city.ville +'</option>';
                }
            })
        }
        inputevalue.eq(3).html(html)
    })

    // manager
    $.ajax({
        url: '/users/manager',
        type: "POST",
        data: { _token: $('meta[name="csrf-token"]').attr('content')},
        success: function (response) {
            var html = '<option disabled></option>';
            response.map( Manager => {
                html += '<option value="'+ Manager.id_people +'">'+ Manager.UserName +'</option>';
            })
            inputemanager.prepend(html);
        }
    })
    
    //  Chef
    $.ajax({
        url: '/users/chef',
        type: "POST",
        data: { _token: $('meta[name="csrf-token"]').attr('content')},
        success: function (response){
            var html = '<option disabled></option>';
            response.map( Manager => {
                html += '<option value="'+ Manager.id_people +'">'+ Manager.UserName +'</option>';
            })
            inputevalue.eq(5).prepend(html);
        }
    })

    //Liverour
    const checkboxes = $('#checkboxes');

    inputevalue.eq(6).parent().click( e => {
        checkboxes.slideToggle(500)
    });

    $.ajax({
        url: '/users/livreur',
        type: "POST",
        data: { _token: $('meta[name="csrf-token"]').attr('content'),
                city: inputevalue.eq(3).val(),
                id: checkboxes.parent().attr('data-name')
              },
        success: function (response) {
            var html = '';
            response.map( Manager => {
                html += '<label for="'+ Manager.id_people +'"><input type="checkbox" name="Liverour[]" value="'+ Manager.id_people +'" id="'+ Manager.id_people +'">'+ Manager.UserName +'</label>';
            })
            checkboxes.append(html);
        }
    })
  
    // add image restaurant
    const addimage = $('#addimage');

    addimage.change(function(e) { 
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
                console.log('jjj')
                // var file = e.target.files[0];
                // var formData = new FormData();
                // formData.append('_token', $("input[name='_token']").val());
                // formData.append('myFile', file);
                // $.ajax({
                //     url: '/admin/restaurants/localimage',
                //     type: 'POST',
                //     data: formData,
                //     contentType: false,
                //     processData: false,
                //     cache: false,
                //     success: function(data) {
                //         nametoutimage.push(data)
                //     },
                // });
                // var reader = new FileReader();
                // reader.onload = function (e) {
                //     if(nametoutimage.length == 0 ){
                //         $('.content section div.restaurants article.addrestautant form div.addimage div.btn.btn-success').addClass('d-none');
                //         $('.content section div.restaurants article.addrestautant form div.addimage div.container').removeClass('d-none');
                //         var html ='<div class="image"><img src="' + e.target.result + '"data-file="' + f.name + 'alt="Category Image"></div>';
                //         addimagerestaurand.html(html);
                //         displayimg(imageno);
                //     }else{
                //         $('.content section div.restaurants article.addrestautant form div.addimage div.container .button').removeClass('d-none');
                //         var html ='<div class="image"><img src="' + e.target.result + '"data-file="' + f.name + 'alt="Category Image"></div>';
                //         addimagerestaurand.append(html);
                //         displayimg(-1)
                //     }
                // };
                // reader.readAsDataURL(f);
            }
        });
    });
    
    var imageno = 1 ;

    $('.prev').click( el => {
        displayimg(imageno -= 1)
    })

    $('.next').click( el => {
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