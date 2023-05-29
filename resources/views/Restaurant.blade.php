@extends('html.Html')
@extends('headerandfooter/Header')
@section('title','index')


@section('meta')
<meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
@endsection

@section('script apis google')
<script src="https://apis.google.com/js/platform.js" async defer></script>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"/>
@vite(['/resources/css/Restaurant.css' ])
@endsection

@section('js')
<script src="https://www.paypal.com/sdk/js?client-id=YOUR_CLIENT_ID"></script>
<script defer type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
@vite(['resources/js/Restaurant.js'])
@endsection


@section('contant')
    <section>
        <article>
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($restaurants->image as $key => $img )
                        <div class="carousel-item @if($key == 0) active  @endif">
                            <img src="/ImageRestaurant/{{ $img->Photo}}" class="d-block w-100 h-100" alt="image restaurnat">
                        </div>
                    @endforeach
                </div>
                <div class="position-absolute namerestaurant fs-4" >
                    <h1>{{$restaurants->NameRestaurant}}</h1>
                    <div class="d-flex justify-content-around">
                        <div class="d-flex align-items-center">
                            <p class="m-0 me-2">{{ $restaurants->deliverytime_of}}-{{ $restaurants->deliverytime_to}}</p>
                            <i class="fa-regular fa-clock text-primary me-2"></i>
                        </div>
                        @if( $restaurants->PriceDelivery == 0 || $restaurants->PriceDelivery == 00 )
                            <div class="d-flex Free me-2 mb-1 align-items-center">
                                <p class="m-0 ">Free</p>
                                <i class="fa-solid fa-motorcycle text-warning me-2"></i>
                            </div>
                        @else
                            <div class="d-flex align-items-center">
                                <p class="m-0 me-2">{{ $restaurants->PriceDelivery}}<span>DH</span></p>
                                <i class="fa-solid fa-motorcycle text-warning me-2"></i>
                            </div>
                        @endif  
                        <div class="d-flex align-items-center like">
                            <!-- <i class=""></i> -->
                            <i class="fa-regular fa-thumbs-up text-light me-2" date='false'></i>
                            <p class="m-0">{{ $restaurants->NumberLike}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <article>
            <div class="products">
                <h1 class="text-center"><span class="text-warning">Our</span> meals</h1>
                <div class="d-grid  align-items-center toutlisaycon mb-5">
                    <div class="d-flex align-items-center filtermeals justify-content-around active">
                        <div class="cartimage">
                            <img src="/MenuSections/All.png" alt="iconimage">
                        </div>
                        <p>All</p>
                    </div>
                    <div class="d-flex align-items-center filtermeals">
                        <div class="cartimage">
                            <img src="/MenuSections/Beverages.png" alt="iconimage">
                        </div>
                        <p>Beverages</p>
                    </div>
                    <div class="d-flex align-items-center filtermeals">
                        <div class="cartimage">
                            <img src="/MenuSections/pizza.png" alt="iconimage">
                        </div>
                        <p>pizza</p>
                    </div>
                    <div class="d-flex align-items-center filtermeals">
                        <div class="cartimage">
                            <img src="/MenuSections/Soup.png" alt="iconimage">
                        </div>
                        <p>Soup</p>
                    </div>
                    <div class="d-flex align-items-center filtermeals">
                        <div class="cartimage">
                            <img src="/MenuSections/Burger.png" alt="iconimage">
                        </div>
                        <p>Burger</p>
                    </div>
                    <div class="d-flex align-items-center filtermeals">
                        <div class="cartimage">
                            <img src="/MenuSections/Sandwiches.png" alt="iconimage">
                        </div>
                        <p>Sandwiches</p>
                    </div>
                    <div class="d-flex align-items-center filtermeals">
                        <div class="cartimage">
                            <img src="/MenuSections/Desserts.png" alt="iconimage">
                        </div>
                        <p>Desserts</p>
                    </div>
                    <div class="d-flex align-items-center filtermeals">
                        <div class="cartimage">
                            <img src="/MenuSections/salad.png" alt="iconimage">
                        </div>
                        <p>salad</p>
                    </div>
                    <div class="d-flex align-items-center filtermeals">
                        <div class="cartimage">
                            <img src="/MenuSections/Sushi.png" alt="iconimage">
                        </div>
                        <p>Sushi</p>
                    </div>
                    <div class="d-flex align-items-center filtermeals">
                        <div class="cartimage">
                            <img src="/MenuSections/Seafood.png" alt="iconimage">
                        </div>
                        <p>Seafood</p>
                    </div>
                    <div class="d-flex align-items-center filtermeals">
                        <div class="cartimage">
                            <img src="/MenuSections/dish.png" alt="iconimage">
                        </div>
                        <p>dish</p>
                    </div>
                </div>
                <div class='grid-container'>
                    @foreach($meals as $meal)
                        <div class="card">
                            <div class="cardmeals position-relative">
                                <img src="/meals/{{ $meal->Photo}}" class="card-img-top" alt="image food">
                                <p class="position-absolute">{{ $meal->TypeFood}}</p>
                            </div>
                            <div class="card-body pt-1">
                                <div class="card-title d-flex justify-content-between align-items-center mb-2">
                                    <h5 class="card-title mb-0">{{ $meal->NameFood}}</h5>
                                    <p class="card-text mb-0"><span>{{ $meal->Price}}</span>DH</p>
                                </div>
                                <div class="d-none description">
                                    <p class="mb-0">{{ $meal->Description}}</p>
                                </div>
                                <div class="card-btn d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-regular fa-heart likeicon" data-meals="{{ $meal->id_meal}}" data-icon="false"></i>
                                        <p class="mb-0 ms-1">{{ $meal->NumberLike}}</p>
                                    </div>
                                    <button class="btn btn-success clickadd" data-btn="false">Add to cart</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class='position-fixed top-0 start-0 bottom-0 end-0 showcart d-none'>
                    <div class="showcart-body  d-flex position-fixed">
                        <div class="showcart-image">
                            <img src="/data-image-meal/tranding-food-1.png" alt="image meals">
                        </div>
                        <div class="showcart-content">
                            <h3></h3>
                            <hr>
                            <div class="show-description">
                                <p class="mb-0"></p>
                            </div>
                            <hr>
                            <div class="showprix">
                                <p class="mb-0 ms-3"><span></span>DH</p>
                            </div>
                            <div class="d-flex align-items-center float-end me-3 nub-meal">
                                <div class="d-flex align-items-center justify-content-between me-2 numbermeal">
                                    <div class="position-relative"><i class="fa-solid fa-plus position-absolute"></i></div>
                                    <p class="mb-0">1</p>
                                    <div class="position-relative"><i class="fa-solid fa-minus position-absolute"></i></div>
                                </div>
                                <button class="btn btn-success showbtn" data-btn="false">Add to cart</button>
                            </div>
                            <div class="payment">
                                <h4>payment method</h4>
                                <div class="payment-image">
                                    <img src="/images/payment method.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <!--  Comments client  -->
        <article>
            <div class="container mt-5">
                <div class="d-flex justify-content-center row">
                    <div class="commite">
                        <div class="d-flex flex-column comment-section">
                            @foreach( $Comments as $Comment)
                                <div class="bg-white p-2">
                                    <div class="d-flex flex-row user-info">
                                        <img class="rounded-circle" src="/ImageUsers/{{$Comment->Person->Photo}}" width="40">
                                        <div class="d-flex flex-column justify-content-start ms-2">
                                            <span class="d-block font-weight-bold name fs-5">{{$Comment->Person->UserName}}</span>
                                            <span class="date text-black-50">{{$Comment->updated_at}}</span>
                                        </div>
                                    </div>
                                    <div class="mt-2 text-commite  position-relative">
                                        <p class="comment-text mb-0">{{$Comment->comment}}</p>
                                    </div>
                                </div>
                            @endforeach
                            <div class="commite-send bg-light p-2 mb-3 d-flex">
                                <div class="align-items-start">
                                    <textarea class="form-control  shadow-none textarea"></textarea>
                                </div>
                                <div @isset($Customer) class="send" @endisset>
                                    <i class="fa-solid fa-paper-plane"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <!--  card client  -->
        <article>
            <div class="chatbox-wrapper order">
                <div class="chatbox-toggle position-relative">
                    <div class="position-absolute orderimage">
                        <span class="position-absolute">0</span>
                        <div class="whimgae">
                            <img src="/image/cart-flatbed-empty.png" alt="carte">
                        </div>
                    </div>
                </div>
                <div class="CartContainer position-fixed top-0 start-0 bottom-0 end-0">
                    <div class="Cart position-fixed d-flex overflow-hidden">
                        <div class="Shopping">
                            <h3 class="Heading text-center mt-3">Shopping <span>Cart</span></h3>
                            <div class="removeall">
                                <button class="btn btn-danger float-end me-5 pb-1 pt-1">Remove all<i class="fa-solid fa-trash-can ms-2"></i></button>
                            </div>
                            <div class="cart-products"></div>
                            <hr class="me-5 mb-1 mt-0 float-end"> 
                            <div class="checkout">
                                <div class="total d-flex justify-content-between">
                                    <h6 class="mb-0">The price of meals</h6>
                                    <p class="mb-0"><span class="me-3">0</span>DH</p>
                                </div>
                                <div class="total d-flex justify-content-between">
                                    <h6 class="mb-0">delivery price</h6>
                                    <p class="mb-0"><span class="me-3">{{ $restaurants->PriceDelivery}}</span>DH</p>
                                </div>
                                <span class="float-end m-0 rath"></span>
                                <div class="total d-flex justify-content-between">
                                    <h6 class="mb-0">Total</h6>
                                    <p class="mb-0"><span class="me-3">{{ $restaurants->PriceDelivery}}</span>DH</p> 
                                </div>
                            </div>
                            @if(isset($Person))
                                <div class="text-center buy">
                                    <button class="button mb-1">buy</button>
                                </div>
                            @else 
                                <div class="text-center getstarted">
                                    <button class="button mb-1">Get started</button>
                                </div>
                            @endif 
                        </div>
                        @isset($Person)
                        <div class="payment">
                            <div class="type-payment d-flex">
                                <div class="typecart d-flex justify-content-center align-items-center active">
                                    <h5 >Credit card</h5>
                                </div>
                                <div class="typecart d-flex justify-content-center align-items-center">
                                    <h5>PayPal</h5>
                                </div>
                                <div class="typecart d-flex justify-content-center align-items-center">
                                    <h5 >Bitcoin</h5>
                                </div>
                                <div class="typecart d-flex justify-content-center align-items-center ">
                                    <h5>Payment upon receipt</h5>
                                </div>
                            </div>
                            <div class="payment-body">
                                <div class="content-payment Pay">
                                    <form class="position-absolute">
                                        <div>
                                            <label for="Namecard" class="form-label mb-0">Name :</label>
                                            <input type="text" class="form-control"  id="Namecard" aria-describedby="emailHelp">
                                            <div class="form-text"></div>
                                        </div>
                                        <div>
                                            <label for="CardNumber" class="form-label mb-0">Card Number :</label>
                                            <input type="text"  class="form-control" id="CardNumber">
                                            <div class="form-text"></div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <label for="CCV" class="form-label mb-0">CCV :</label>
                                                <input type="text" class="form-control" id="CCV">
                                                <div class="form-text"></div>
                                            </div>
                                            <div>
                                                <label class="form-label mb-0">Expiration date :</label>
                                                <div class="d-flex">
                                                    <select class="form-select" name="month">
                                                        @for($month = 1; $month <= 12; $month++)
                                                            <option value="{{$month}}">{{$month}}</option>
                                                        @endfor
                                                    </select>
                                                    @php
                                                        $startDate = \Carbon\Carbon::now()->subMonths(10)->format('Y') - 5 ;
                                                        $endDate = \Carbon\Carbon::now()->subMonths(10)->format('Y') + 5 ;
                                                    @endphp
                                                    <select class="form-select" name="year">
                                                        @for($date = $startDate; $date <= $endDate; $date++)
                                                            <option value="{{$date}}">{{$date}}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="form-text"></div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-success float-end me-3 mt-3">Pay now</button>
                                    </form>
                                </div>
                                <div class="content-payment d-none">
                                PayPal
                                </div>
                                <div class="content-payment d-none">
                                Bitcoin
                                </div>
                                <div class="content-payment  position-relative top-0 start-0 end-0 bottom-0 d-none">
                                    <form class="position-absolute">
                                        <div>
                                            <label for="Fullname" class="form-label mb-0">Full name :</label>
                                            <input type="text" class="form-control receipt" value="{{$Person->FullName}}" id="Fullname" aria-describedby="emailHelp">
                                            <div class="form-text"></div>
                                        </div>
                                        <div>
                                            <label for="floatingTextarea" class="form-label mb-0">Address :</label>
                                            <textarea class="form-control receipt" placeholder="Leave a comment here" id="floatingTextarea">{{$Person->Address}}</textarea>
                                            <div class="form-text"></div>
                                        </div>
                                        <div>
                                            <label for="Phone" class="form-label mb-0">Phone number :</label>
                                            <input type="text" value="{{$Person->Telf}}" class="form-control receipt" id="Phone">
                                            <div class="form-text"></div>
                                        </div>
                                        @if( $Person->Verif_Telf == 0 )
                                            <div class="d-none">
                                                <label  class="form-label mb-0">Verification code:</label>
                                                <div class="d-flex justify-content-between verfeynumber">
                                                    <input type="text " class="form-control receipt">
                                                    <input type="text" class="form-control receipt">
                                                    <input type="text" class="form-control receipt">
                                                    <input type="text" class="form-control receipt">
                                                    <input type="text" class="form-control receipt">
                                                    <input type="text" class="form-control receipt">
                                                </div>
                                                <div class="form-text"></div>
                                            </div>
                                        @endif
                                        <button type="submit" class="btn btn-success float-end me-3 @if( $Person->Verif_Telf == 0) verification @else confirmation  @endif ">phone verification</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="thankyou">
                            <i class="fa-regular fa-circle-check text-success mt-4 text-center"></i>
                            <h3 class="text-center mt-1 text-success">Thank you!</h3>
                            <p class="text-center mt-2">Thank you for your request. Wait for our call</p>
                            <div class="star text-center d-flex justify-content-center align-items-center mt-4">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                        @endisset
                    </div>
                </div>
            </div> 
        </article>
    </section>
@endsection
