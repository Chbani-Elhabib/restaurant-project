@extends('admin.html.Html')
@extends('admin.header.Header')
@extends('admin.navbar.nav')
@section('title','Dashboard')
@section('Restaurants','active')

<!-- css  -->
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@vite(['resources/css/admin/navbar/Nav.css','resources/css/admin/Restaurants.css'])
@endsection
<!-- js  -->
@section('js')
<script defer src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script defer src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
@vite(['resources/js/admin/navbar/Nav.js','resources/js/admin/Restaurants.js'])
@endsection

@section('content')
    <section>
        <div class="restaurants">
            @if( $Person->User_Group == 'Admin')
                <article>
                    <button class='button_19 addrestaurants'>add Restaurant</button>
                </article>
                <article class="addrestautant">
                        <form id="submite" class="d-grid" action="{{ url('/admin/restaurants/store') }}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            <div class="mb-1">
                                <label for="NameRestaurant" class="form-label labels">Name restaurant</label>
                                <input type="text" class="form-control inputevalue" id="NameRestaurant" name='NameRestaurant' aria-describedby="emailHelp" placeholder="title">
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-1">
                                <label for="exampleInputEmail1" class="form-label labels">Country</label>
                                <select class="form-select form-select-sm mt-1 inputevalue" name='Country'>
                                    <option value='Morroco'>Morroco</option>
                                </select>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-1">
                                <label for="exampleInputEmail1" class="form-label labels">Regions</label>
                                <select class="form-select form-select-sm mt-1 Regions inputevalue" name='Regions'>
                                    <option selected disabled></option>
                                    <option value="1">Tanger-Tetouan-Al Hoceima</option>
                                    <option value="2">l'Oriental</option>
                                    <option value="3">Fès-Meknès</option>
                                    <option value="4">Rabat-Salé-Kénitra</option>
                                    <option value="5">Béni Mellal-Khénifra</option>
                                    <option value="6">Casablanca-Settat</option>
                                    <option value="7">Marrakesh-Safi</option>
                                    <option value="8">Drâa-Tafilalet</option>
                                    <option value="9">Souss-Massa</option>
                                    <option value="10">Guelmim-Oued Noun</option>
                                    <option value="11">Laâyoune-Sakia El Hamra</option>
                                    <option value="12">Dakhla-Oued Ed-Dahab</option>
                                </select>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-1">
                                <label for="exampleInputEmail1" class="form-label">city</label>
                                <select class="form-select form-select-sm mt-1 city inputevalue" name='city'></select>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-1">
                                <label for="exampleInputEmail1" class="form-label">Address</label>
                                <textarea name="Address" class="form-control inputevalue" id="exampleFormControlTextarea1" rows="3" placeholder="Address"></textarea>                            
                                <div id="emailHelp" class="form-text"></div>
                            </div>
                            <div class="mb-1">
                                <label for="exampleInputEmail1" class="form-label">manager</label>
                                <select class="form-select form-select-sm mt-1 manager inputevalue" name='manager'></select>
                                <div id="emailHelp" class="form-text"></div>
                            </div>
                            <div class="mb-1">
                                <label for="exampleInputEmail1" class="form-label">Chef</label>
                                <select class="form-select form-select-sm mt-1 Chef inputevalue" name='chef'></select>
                                <div id="emailHelp" class="form-text"></div>
                            </div>
                            <div class="mb-1 multiselect">
                                <label for="exampleInputEmail1" class="form-label">livreur</label>
                                <div class="selectBox">
                                    <select class="form-select form-select-sm mt-1 livreur inputevalue">
                                        <option>-- Select an  livreur your  restaurant --</option>
                                    </select>
                                    <div class="overSelect"></div>
                                </div>
                                <div id="checkboxes">
                                    <label for="one"><input type="checkbox" id="one" />First checkbox</label>
                                    <label for="two"><input type="checkbox" id="two" />Second checkbox</label>
                                    <label for="three"><input type="checkbox" id="three" />Third checkbox</label>
                                </div>
                            </div>
                            <div class="mb-1">
                                <label for="exampleInputEmail1" class="form-label">Price Delivery</label>
                                <input type="text" name='PriceDelivery' class="form-control inputevalue" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Price Delivery">
                                <div id="emailHelp" class="form-text"></div>
                            </div>
                            <div class="mb-1">
                                <label for="exampleInputEmail1" class="form-label">delivery time</label>
                                <div class='d-flex flex-row align-items-center'>
                                    <label for="exampleInputEmail1" >of</label>
                                    <input class="inputevalue" name='deliverytime_of' type="text" class="form-control form-select-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="delivery time">
                                    <label for="exampleInputEmail1" >min to </label>
                                    <input class="inputevalue" name='deliverytime_to' type="text" class="form-control form-select-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="delivery time">
                                    <label for="exampleInputEmail1">min</label>
                                </div>
                                <div id="emailHelp" class="form-text"></div>
                            </div>
                            <div class="mb-1">
                                <label class="form-label">Restaurant image </label>
                                <div class='d-flex justify-content-center align-items-center addimage'>
                                    <div class="btn btn-success">
                                        Add image
                                        <i class="fa-regular fa-image ms-2"></i>
                                    </div>
                                    <input  type="file" class="toutimages" />
                                    <div class="container d-none">
                                        <div class='d-flex justify-content-around align-items-center dua'>
                                            <div>Delete image<i class="fa-solid fa-trash ms-2"></i></div>
                                            <div>Update image<i class="fa-solid fa-pencil ms-2"></i></div>
                                            <div>Add image <i class="fa-regular fa-image ms-2"></i><input id='arrayimage' name="toutimages" type="text"></div>
                                        </div>
                                        <div class='addimagerestaurand'></div>
                                        <div class="button d-none">
                                            <a  class="prev">&#10094;</a>
                                            <a class="next">&#10095;</a>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-danger errorimage"></p>
                            </div>
                            <div class="mb-1">
                                <button class='button_19 float-end me-4'>add</button>
                            </div>
                        </form>
                </article>
            @endif
            <article class="showmeals mt-4">
                @foreach($restaurants as $restaurant)
                    <div class="card mb-3">
                        <div class="row g-0 d-flex">
                            <div class="card-image">
                                <div id="a{{$restaurant->id_restaurant}}" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @if($Person->User_Group == 'Liverour')
                                            @foreach($restaurant->levrour->image as $index => $image)
                                                <div class="carousel-item card-cader @if($index == 0) active @endif" data-bs-interval="10000">
                                                    <img src="/ImageRestaurant/{{$image->Photo}}" class="d-block w-100" alt="...">
                                                </div>
                                            @endforeach
                                        @else
                                            @foreach($restaurant->image as $index => $image)
                                                <div class="carousel-item card-cader @if($index == 0) active @endif" data-bs-interval="10000">
                                                    <img src="/ImageRestaurant/{{$image->Photo}}" class="d-block w-100" alt="...">
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#a{{$restaurant->id_restaurant}}" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#a{{$restaurant->id_restaurant}}" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-8 card-body">
                                <div class="d-flex icon position-relative">
                                    <div class="eye-icon position-absolute show"><i class="fa-solid fa-eye"></i></div>
                                    @if($Person->User_Group == 'Admin' || $Person->User_Group == 'Manager')
                                        @if($Person->User_Group == 'Admin')
                                            <a href="/admin/restaurants/{{$restaurant->id_restaurant}}/update" class="position-absolute">
                                                <div class="eye-icon">
                                                    <i class="fa-solid fa-pencil"></i>
                                                </div>
                                            </a>
                                        @else
                                            <a href="/manager/restaurants/update" class="position-absolute">
                                                <div class="eye-icon">
                                                    <i class="fa-solid fa-pencil"></i>
                                                </div>
                                            </a>
                                        @endif
                                        <div class="eye-icon position-absolute"><i class="fa-solid fa-trash-can"></i></div>
                                    @endif
                                </div>

                                @if($Person->User_Group == 'Liverour')
                                    <h5 class="card-title">{{$restaurant->levrour->NameRestaurant}}</h5>
                                @else
                                    <h5 class="card-title">{{$restaurant->NameRestaurant}}</h5>
                                @endif

                                @if($Person->User_Group == 'Manager' || $Person->User_Group == 'Admin' )
                                @foreach( $customerCounts as $keys => $customerCount )
                                    @if( $keys == $restaurant->id_restaurant  )

                                    <div class="rating d-flex">
                                        @foreach( $customerCount as $key => $Count  )
                                            @if( $key == 'star_customers_somme'  )
                                            <div>
                                                <i class= @if( $Count >= 1 ) "active fa fa-star" @elseif(  $Count > 0 ) "fa-solid fa-star-half-stroke" @else "fa-regular fa-star" @endif ></i>
                                                <i class= @if( $Count >= 2 ) "active fa fa-star" @elseif(  $Count > 1 ) "fa-solid fa-star-half-stroke" @else "fa-regular fa-star" @endif ></i>
                                                <i class= @if( $Count >= 3 ) "active fa fa-star" @elseif(  $Count > 2 ) "fa-solid fa-star-half-stroke" @else "fa-regular fa-star" @endif ></i>
                                                <i class= @if( $Count >= 4 ) "active fa fa-star" @elseif(  $Count > 3 ) "fa-solid fa-star-half-stroke" @else "fa-regular fa-star" @endif ></i>
                                                <i class= @if( $Count >= 5 ) "active fa fa-star" @elseif(  $Count > 4 ) "fa-solid fa-star-half-stroke" @else "fa-regular fa-star" @endif ></i>
                                            </div>
                                            @endif
                                            @if( $key == 'star_customers_count' )
                                            <p class='mb-1'>(<span>{{$Count}}</span>)</p>
                                            @endif
                                        @endforeach
                                    </div>

                                    <div class='sales'>
                                        @foreach( $customerCount as $key => $Count  )
                                            @if( $key == 'customer_count')
                                                <p><span>{{$Count}}</span>sales</p>
                                            @endif
                                        @endforeach
                                    </div>

                                    @endif
                                @endforeach

                                <div class="wrapper d-flex">
                                    <p class="mb-0">{{$restaurant->NumberLike}}</p>
                                    <i class="fa-solid fa-thumbs-up"></i>
                                </div>

                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
                @if($Person->User_Group == 'Admin')
                    <div class="d-flex">
                        {!! $restaurants->links() !!}
                    </div>
                @endif 
            </article>
        </div>
    </section>
@endsection