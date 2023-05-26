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
        @if( $Person->User_Group == 'Admin')
            <article class="clearfix">
                <button class='btn btn-success addrestaurants mt-4 me-2 float-end'>add Restaurant</button>
            </article>
            <article class="addrestautant">
                    <form id="submite" class="d-grid">
                        @csrf

                        <div>
                            <label for="NameRestaurant" class="form-label labels mb-0"><span class="position-relative text-danger" >*</span>Name restaurant :</label>
                            <input type="text" class="form-control inputevalue" id="NameRestaurant" placeholder="Name restaurant">
                            <div class="form-text text-danger ms-2 mt-0"></div>
                        </div>

                        <div>
                            <label class="form-label mb-0 labels"><span class="position-relative text-danger" >*</span>Country :</label>
                            <select class="form-select form-select inputevalue">
                                <option value='Morroco'>Morroco</option>
                            </select>
                            <div class="form-text text-danger ms-2 mt-0"></div>
                        </div>

                        <div>
                            <label class="form-label mb-0 labels"><span class="position-relative text-danger" >*</span>Regions :</label>
                            <select class="form-select form-select inputevalue">
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
                            <div class="form-text text-danger ms-2 mt-0"></div>
                        </div>

                        <div>
                            <label class="form-label mb-0"><span class="position-relative text-danger" >*</span>city :</label>
                            <select class="form-select form-select inputevalue"></select>
                            <div class="form-text text-danger ms-2 mt-0"></div>
                        </div>

                        <div>
                            <label for="Address" class="form-label mb-0"><span class="position-relative text-danger" >*</span>Address :</label>
                            <textarea class="form-control inputevalue" id="Address" rows="1" placeholder="Address"></textarea>                            
                            <div class="form-text text-danger ms-2 mt-0"></div>
                        </div>

                        <div>
                            <label class="form-label mb-0"><span class="position-relative text-danger" >*</span>manager :</label>
                            <select class="form-select form-select inputevalue"></select>
                            <div class="form-text text-danger ms-2 mt-0"></div>
                        </div>

                        <div>
                            <label class="form-label mb-0"><span class="position-relative text-danger" >*</span>Chef :</label>
                            <select class="form-select form-select inputevalue"></select>
                            <div class="form-text text-danger ms-2 mt-0"></div>
                        </div>

                        <div class="multiselect">
                            <label class="form-label mb-0"><span class="position-relative text-danger" >*</span>livreur :</label>
                            <div class="selectBox">
                                <select class="form-select form-select inputevalue">
                                    <option>-- Select an  livreur your  restaurant --</option>
                                </select>
                                <div class="form-text overSelect text-danger"></div>
                            </div>
                            <div id="checkboxes"></div>
                            <div class="form-text text-danger ms-2 mt-0"></div>
                        </div>
                        
                        <div>
                            <label for="PriceDelivery" class="form-label mb-0"><span class="position-relative text-danger" >*</span>Delivery Price :</label>
                            <input type="text" class="form-control inputevalue" id="PriceDelivery" placeholder="Price Delivery">
                            <div class="form-text text-danger ms-2 mt-0"></div>
                        </div>

                        <div>
                            <label for="delivery" class="form-label mb-0"><span class="position-relative text-danger" >*</span>delivery time :</label>
                            <div class='d-flex flex-row align-items-center justify-content-center'>
                                <label class="form-label mb-0" for="delivery" >of</label>
                                <input class="inputevalue form-control" type="text" id="delivery" placeholder="time">
                                <label class="form-label mb-0" for="time" >min to</label>
                                <input class="inputevalue form-control" type="text" id="time" placeholder="time">
                                <label class="form-label mb-0">min</label>
                            </div>
                            <div class="form-text text-danger  ms-2 mt-0"></div>
                        </div>

                        <div>
                            <label class="form-label mb-0"><span class="position-relative text-danger" >*</span>Restaurant image :</label>
                            <div class='d-flex justify-content-center align-items-center addimage'>
                                <div class="btn btn-success">
                                    add image
                                    <i class="fa-regular fa-image ms-2"></i>
                                </div>
                                <input  type="file" class="inputevalue" />
                                <div class="container d-none">
                                    <div class='d-flex justify-content-around align-items-center dua'>
                                        <div class="delete">Delete image<i class="fa-solid fa-trash ms-2"></i></div>
                                        <div>Update image<i class="fa-solid fa-pencil ms-2"></i><input type="file" class="updateimage"></div>
                                        <div>Add image <i class="fa-regular fa-image ms-2"></i></div>
                                    </div>
                                    <div class='addimagerestaurand'></div>
                                    <div class="button d-none">
                                        <a  class="prev">&#10094;</a>
                                        <a class="next">&#10095;</a>
                                    </div>
                                </div>
                            </div>
                            <p class="text-danger errorimage  ms-2 mt-0"></p>
                        </div>

                        <div class="clearfix">
                            <button class='btn btn-success float-end me-4'>add Restaurant</button>
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
                                        <div class="eye-icon position-absolute deleterestaurant"><i class="fa-solid fa-trash-can"></i></div>
                                    @else
                                        <a href="/manager/restaurants/update" class="position-absolute">
                                            <div class="eye-icon">
                                                <i class="fa-solid fa-pencil"></i>
                                            </div>
                                        </a>
                                    @endif
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
        </article>
        
        <article>
            @if($Person->User_Group == 'Admin')
                <div class="d-flex links">
                    {!! $restaurants->links() !!}
                </div>
            @endif 
        </article>
        
    </section>
@endsection