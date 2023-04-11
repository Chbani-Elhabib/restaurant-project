import CityEn from "./Country/Villes.json" assert { type: "json" };
$(document).ready(function () {

    const inpute = $('.inpute');

    if( inpute.eq(7).attr('data').length  > 0 ){
        var html = "";
        if (inpute.eq(6).val() == "") {
            html += "<option></option>";
        }else {
            html += "<option selected disabled></option>";
            CityEn.map((city) => {
                if (inpute.eq(6).val() == city.region) {
                    html += '<option value="' + city.ville + '"' ;
                    if( inpute.eq(7).attr('data') == city.ville  ){
                        html += 'selected'
                    } 
                    html += '>' + city.ville +  '</option>';
                }
            });
        }
        inpute.eq(7).html(html);
    }

    inpute.eq(6).change( function(){
        var html = "";
        if ($(this).val() == "") {
            html += "<option></option>";
        } else {
            html += "<option selected disabled></option>";
            CityEn.map((city) => {
                if ($(this).val() == city.region) {
                    html +=
                        '<option value="' +
                        city.ville +
                        '">' +
                        city.ville +
                        "</option>";
                }
            });
        }
        $(this).parent().next().children().eq(1).html(html);
    })

});