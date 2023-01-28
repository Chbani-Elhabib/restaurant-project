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