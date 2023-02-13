$(document).ready(function(){
    const addrestaurants = $('.addrestaurants')
    const formmeals = $('.formmeals')
    const image = $('.image')
    const valueinpute = $('.valueinpute')

    addrestaurants.eq(0).click( e => {
        formmeals.slideToggle(500);
    })

    image.change( e => {
        var filesArr = Array.prototype.slice.call(e.target.files);
        filesArr.forEach( f => {
            if (!f.type.match("image.*")) {
                var html ="<p>Please insert a photo</p>";
                valueinpute.html(html);
            }else{
                var storedFiles = [] ;
                storedFiles.push(f);
                var reader = new FileReader();
                reader.onload = function (e) {
                  var html ='<div class="vall"><img src="' + e.target.result + '"data-file="' + f.name + 'alt="Category Image"></div>';
                  valueinpute.html(html);
                };
                reader.readAsDataURL(f);
            }
        });
    })


    // click add meals
    const forminput = $('.forminput')
    addrestaurants.eq(1).click( e => {

        let regex = /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;
        e.preventDefault();

        // validation input Name Food
        var xNameFood = true ;
        if( forminput.eq(0).val().length == 0 ){
            xNameFood = false ;
            forminput.eq(0).next().html('Please enter the name food');
            forminput.eq(0).addClass('border-danger')
            $('.labelnamefood').addClass('text-danger')
        }

        console.log( regex.test(forminput.eq(0).val()) )

        // validation textarea Description
        var xDescription = true ;
        if( forminput.eq(1).val().length == 0 ){
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
        if( forminput.eq(2).val().length == 0 ){
            xprice = false ;
            forminput.eq(2).next().html('Please enter the Price');
            forminput.eq(2).addClass('border-danger')
            $('.labelprice').addClass('text-danger')
        }else if( !Number(forminput.eq(2).val())){
            xprice = false ;
            forminput.eq(2).next().html('Please enter the Number');
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

        // validation image
        var ximage = true ;
        if ($.inArray(image.val().split('.').pop().toLowerCase(), ['gif','png','jpg','jpeg']) == -1){
            ximage = false ;
            $('.imageinputee').addClass('text-danger');
        }else{
            ximage = true ;
            $('.imageinputee').removeClass('text-danger');
        }


    })

    // show meals 
    const showmeals = $('.showmeals')
    var meals = '';
    $.ajax({
        url: '/admin/meal/show',
        type: "POST",
        data: { _token: $('meta[name="csrf-token"]').attr('content')},
        success: function (response) {
            meals = response ;
            if(response.length > 0){
                $('.filter').css("display", "block");
                var html = '<table id="example" class="table table-hover">\
                                <thead>\
                                    <tr>\
                                        <th scope="col">Image</th>\
                                        <th scope="col">Name food</th>\
                                        <th scope="col">Type food</th>\
                                        <th scope="col">Price</th>\
                                        <th scope="col">Update</th>\
                                        <th scope="col">Delete</th>\
                                        <th scope="col">best meals</th>\
                                    </tr>\
                                </thead>\
                                <tbody>';
                response.map( meal => {
                    html +='<tr><th scope="row"><div class="borderimgee"><img src="/meals/' + meal['Photo'] +'" alt="df"></div></th>';
                    html +='<td>' + meal['NameFood'] +'</td>';
                    html +='<td>' + meal['TypeFood'] +'</td>';
                    html +='<td>' + meal['Price'] +'<span>DH<span></td>';
                    html +='<td><button>Update</button></td>';
                    html +='<td><button>Delete</button></td>';
                    html +='<td><label class="container"><input type="checkbox"';
                    if(meal['bestMeals'] == 1 ){
                        html += 'checked' ;
                    } 
                    html +='><span class="checkmark"></span></label></td></tr>';
                });
                html += '</tbody></table>';
                showmeals.html(html);
                $('#example').DataTable({filter: false , ordering: false });
            }else{
                $('.filter').css("display", "none");
                showmeals.html('<p class="data_null">We do not have any meals information you are looking for</p>');
            }
        },
        async: false 
    });

    // best meals 
    const checkbox = $('.container input[type="checkbox"]')
    checkbox.each( e => {
        checkbox.eq(e).change( ell => {
            $.ajax({
                url: '/admin/meal/best',
                type: "POST",
                data: { id: meals[e]['Id']  , _token: $('meta[name="csrf-token"]').attr('content')},
            });
        })
    })

});