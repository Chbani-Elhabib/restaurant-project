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
                html += '<option value="'+ Manager.Id +'">'+ Manager.UserName +'</option>';
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
                html += '<label for="'+ Manager.Id +'"><input type="checkbox" id="'+ Manager.Id +'">'+ Manager.UserName +'</label>';
            })
            checkboxes.html(html);
        }
    })

    // add image 

    var imageno =1;
    displayimg(imageno);
    $('.prev').click( e => {
        console.log('kkk')
        displayimg(imageno += -1)
    })
    $('.next').click( e => {
        console.log('sss')
        displayimg(imageno += 1)
    })
    function displayimg(n){
        var i;
        var image = $(".image");
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



