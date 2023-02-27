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
                            <i class="fa-regular fa-clock text-primary me-2"></i>
                            <p class="m-0">{{ $restaurants->deliverytime_of}}-{{ $restaurants->deliverytime_to}}</p>
                        </div>
                        <div class="d-flex align-items-center">   
                            <i class="fa-solid fa-motorcycle text-primary me-2"></i>
                            <p class="m-0">{{ $restaurants->PriceDelivery}}<span>DH</span></p>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-thumbs-up text-primary me-2"></i>
                            <p class="m-0">86%</p>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <article>
            <div class="products">
                <h1 class="text-center"><span class="text-warning">Our</span> meals</h1>
                <div class="autoplay">
                    <div class="whcaimge"><div class='carimm'><img src="/MenuSections/All.png" alt="imagefilter"></div><p>All</p></div>
                    <div class="whcaimge"><div class='carimm'><img src="/MenuSections/Beverages.png" alt="imagefilter"></div><p>Beverages</p></div>
                    <div class="whcaimge"><div class='carimm'><img src="/MenuSections/salad.png" alt="imagefilter"></div><p>Salad</p></div>
                    <div class="whcaimge"><div class='carimm'><img src="/MenuSections/Sandwiches.png" alt="imagefilter"></div><p>Sandwiches</p></div>
                    <div class="whcaimge"><div class='carimm'><img src="/MenuSections/Seafood.png" alt="imagefilter"></div><p>Seafood</p></div>
                    <div class="whcaimge"><div class='carimm'><img src="/MenuSections/Desserts.png" alt="imagefilter"></div><p>Desserts</p></div>
                    <div class="whcaimge"><div class='carimm'><img src="/MenuSections/Soup.png" alt="imagefilter"></div><p>Soup</p></div>
                    <div class="whcaimge"><div class='carimm'><img src="/MenuSections/pizza.png" alt="imagefilter"></div><p>pizza</p></div>
                    <div class="whcaimge"><div class='carimm'><img src="/MenuSections/Sushi.png" alt="imagefilter"></div><p>Sushi</p></div>
                    <div class="whcaimge"><div class='carimm'><img src="/MenuSections/Burger.png" alt="imagefilter"></div><p>Burger</p></div>
                    <div class="whcaimge"><div class='carimm'><img src="/MenuSections/dish.png" alt="imagefilter"></div><p>dish</p></div>
                </div>
                <div class='grid-container'>
                    @foreach($meals as $meal)
                        <div class="card" style="width: 18rem;">
                            <img src="/meals/{{ $meal->Photo}}" class="card-img-top" alt="image food">
                            <div class="card-body">
                                <h5 class="card-title">{{ $meal->NameFood}}</h5>
                                <div>
                                    <p class="card-text">{{ $meal->Price}}<span>DH</span></p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </article>
        <article>
            <div class="container mt-5">
                <div class="d-flex justify-content-center row">
                    <div class="commite">
                        <div class="d-flex flex-column comment-section">
                            <div class="bg-white p-2">
                                <div class="d-flex flex-row user-info"><img class="rounded-circle" src="/ImageUsers/Users.png" width="40">
                                    <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name">Marry Andrews</span><span class="date text-black-50">Shared publicly - Jan 2020</span></div>
                                </div>
                                <div class="mt-2">
                                    <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                                <div class="bg-white">
                                    <div class="d-flex flex-row fs-12">
                                        <div class="like p-2 cursor"><i class="fa-solid fa-thumbs-up"></i><span class="ml-1">Like</span></div>
                                        <div class="like p-2 cursor"><i class="fa-solid fa-thumbs-down"></i><span class="ml-1">Like</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-light p-2">
                                <div class="d-flex flex-row align-items-start"><img class="rounded-circle" src="/ImageUsers/Users.png" width="40"><textarea class="form-control ml-1 shadow-none textarea"></textarea></div>
                                <div class="mt-2 text-right"><button class="btn btn-primary btn-sm shadow-none" type="button">Post comment</button><button class="btn btn-outline-primary btn-sm ml-1 shadow-none" type="button">Cancel</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
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
                <!-- <div class="CartContainer">
                <div class="Cart">
                    <h3 class="Heading text-center">Shopping Cart</h3>
                    <h5 class="Action">Remove all</h5>  
                    <div class="Cart-Items">
                        <div class="image-box">
                            <img src="/ImageRestaurant/1676853408.png"  />
                        </div>
                        <div class="about">
                            <h1 class="title">Apple Juice</h1>
                        </div>
                        <div class="counter">
                            <div class="btn">+</div>
                            <div class="count">2</div>
                            <div class="btn">-</div>
                        </div>
                        <div class="amount">2.99 DH</div>
                        <div class="remove"><i class="fa-solid fa-trash-can"></i></div>
                    </div>

                    <hr> 
                    <div class="checkout">
                        <div class="total">
                            <div>
                                <div class="Subtotal">Sub-Total</div>
                                <div class="items">2 items</div>
                            </div>
                            <div class="total-amount">$6.18</div>
                        </div>
                    </div>
                    <button class="button">Checkout</button></div>
                </div>
                </div> -->
            </div> 
        </article>
        <article>
            <div class="chatbox-wrapper">
                <div class="chatbox-toggle">
                    <i class="fa-solid fa-message"></i>
                </div>
                <div class="chatbox-message-wrapper">
                    <div class="chatbox-message-header">
                        <div class="chatbox-message-profile">
                            <img src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8bWFufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="" class="chatbox-message-image">
                            <div>
                                <h4 class="chatbox-message-name">Jonathan Doe</h4>
                                <p class="chatbox-message-status">online</p>
                            </div>
                        </div>
                        <div class="chatbox-message-dropdown">
                            <i class='bx bx-dots-vertical-rounded chatbox-message-dropdown-toggle'></i>
                            <ul class="chatbox-message-dropdown-menu">
                                <li>
                                    <a href="#">Search</a>
                                </li>
                                <li>
                                    <a href="#">Report</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="chatbox-message-content">
                        <h4 class="chatbox-message-no-message">You don't have message yet!</h4>
                        <div class="chatbox-message-item sent">
                            <span class="chatbox-message-item-text">
                                Lorem, ipsum, dolor sit amet consectetur adipisicing elit. Quod, fugiat?
                            </span>
                            <span class="chatbox-message-item-time">08:30</span>
                        </div>
                        <div class="chatbox-message-item received">
                            <span class="chatbox-message-item-text">
                                Lorem, ipsum, dolor sit amet consectetur adipisicing elit. Quod, fugiat?
                            </span>
                            <span class="chatbox-message-item-time">08:30</span>
                        </div>
                    </div>
                    <div class="chatbox-message-bottom">
                        <form action="#" class="chatbox-message-form">
                            <textarea rows="1" placeholder="Type message..." class="chatbox-message-input"></textarea>
                            <button type="submit" class="chatbox-message-submit"><i class='bx bx-send' ></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </article>
    </section>
@endsection
