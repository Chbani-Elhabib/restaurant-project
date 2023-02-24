<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" 
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
              integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" 
              crossorigin="anonymous" 
              referrerpolicy="no-referrer" />
        <link rel="icon" href="{{ url('image/logolink.png') }}" />
        <!-- start css -->
        <link href="{{ url('css/normalize/normalize.css') }}" rel="stylesheet">
        <link href="{{ url('css/Bootstrap.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"/>
        @vite(['/resources/css/Restaurant.css'])
        <!-- end css -->
        <!-- start js  -->
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script defer  src="{{ url('js/jquery/jquery-3.2.1.js') }}"></script>
        <script defer src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script defer type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
        <!-- end js  -->
        <title>FAQ</title>

    </head>
    <body id="top">
        <!-- start contant    -->
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
                    <div class="position-absolute bottom-0" >
                        <h1>{{$restaurants->NameRestaurant}}</h1>
                        <div class="d-flex ">
                            <div class="d-flex ">
                                <i class="fa-regular fa-clock"></i>
                                <p>{{ $restaurants->deliverytime_of}}-{{ $restaurants->deliverytime_to}}</p>
                            </div>
                            <div class="d-flex ">   
                                <i class="fa-solid fa-motorcycle"></i>
                                <p>{{ $restaurants->PriceDelivery}}<span>DH</span></p>
                            </div>
                            <div class="d-flex ">
                                <i class="fa-solid fa-thumbs-up"></i>
                                <p>86%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            <article>
                <h1>Our Products</h1>
                <div class="autoplay">
                    <div><p>jsjsjj</p></div>
                    <div><p>jsjsjj</p></div>
                    <div><p>jsjsjj</p></div>
                    <div><p>jsjsjj</p></div>
                    <div><p>jsjsjj</p></div>
                    <div><p>jsjsjj</p></div>
                    <div><p>jsjsjj</p></div>
                </div>
            </article>
            <article>
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </article>
        </section>
        <!-- end contant    -->
        @vite(['resources/js/Restaurant.js'])
    </body>
</html>