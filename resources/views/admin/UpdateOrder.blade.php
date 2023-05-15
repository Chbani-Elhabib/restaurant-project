@extends('admin.html.Html')
@extends('admin.header.Header')
@extends('admin.navbar.nav')
@section('title','Dashboard')

<!-- css  -->
@section('css')
@vite(['resources/css/admin/navbar/Nav.css','resources/css/admin/UpdateOrder.css'])
@endsection
<!-- js  -->
@section('js')
@vite(['resources/js/admin/navbar/Nav.js','resources/js/admin/UpdateOrder.js'])
@endsection


@section('content')
    <section class="UpdateOrder">
        <form action="">

            <div class="mb-3">
                <label  class="form-label ms-1">Customer</label>
                <div class="container p-0">
                    <div class="box">
                        <ul class="by_default ps-2  mb-0">
                            <li>
                                <div class="sharing">
                                    <div class="share-icon"><img src="/ImageUsers/{{$Order->Person_order->Photo}}" alt="{{$Order->Person_order->id_people}}"></div>
                                    <p class='m-0'>{{$Order->Person_order->UserName}}</p>
                                </div>
                            </li>
                        </ul>
                        <ul class="options ps-2 ">
                            @isset($Users)
                                @foreach( $Users as $User )
                                    <li class='p-1 pt-2'>
                                        <div class="sharing">
                                            <div class="share-icon">
                                                <img src="/ImageUsers/{{$User->Photo}}" alt="{{$User->id_people}}">
                                            </div>
                                            <p class='m-0 ms-2'>{{$User->UserName}}</p>
                                        </div>
                                    </li>
                                @endforeach
                            @endisset
                        </ul>
                    </div>
                </div>
                <div class='text-danger'></div>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="email" class="form-control" id="phone" value="{{$Order->Person_order->Telf}}" >
                <div id="emailHelp" class="form-text"></div>
            </div>

            <div class="mb-3">
                <label for="Address" class="form-label">Address</label>
                <textarea class="form-control" id="Address" >{{$Order->Person_order->Address}}</textarea>
                <div id="emailHelp" class="form-text text-danger"></div>
            </div>

                        
            @isset($Restaurants)

                <div class="mb-3">
                    <label for="Restaurant" class="form-label">Restaurant</label>
                    <select class="form-select  Restaurants" aria-label="Default select">
                        <option selected disabled></option>
                        @foreach( $Restaurants as $Restaurant )
                        <option value="{{$Restaurant->id_restaurant}}.{{$Restaurant->PriceDelivery}}" @if( $Restaurant->id_restaurant == $Order->Restaurant_order->id_restaurant ) selected @endif >{{$Restaurant->NameRestaurant}}</option>
                        @endforeach
                    </select>
                    <div class='text-danger' ></div>
                </div>
                                    
                <div class="mb-3 d-flex align-items-center prix-delevery">
                    <div class="toggle-btns">
                        <div class="toggle-btn delivry m-0">
                            <input type="checkbox" class="toggle-input">
                            <label class="toggle-label @if($Order->active_Delivery_price == 1) active @endif" @if($Order->active_Delivery_price == 1) data="True" @endif></label>
                        </div>
                    </div>
                    <label  class="form-label ms-2 mb-0">Delivery price</label>
                    <div class="text-end" style="width: 73%;"><span>{{$Order->Restaurant_order->PriceDelivery}}</span>DH</div>
                </div>
                
            @endisset


            <div class="mb-3">
                <label  class="form-label">Meals</label>
                <div  class="mb-3 meals p-2">
                    @isset($meals)
                        @foreach( $meals as $meal )
                        <div class="d-flex align-items-center cart-meal mb-2 ">
                            <div class="image-meals">
                                <img src="/meals/{{$meal->Photo}}" alt="meal" >
                            </div>
                            <div class="flex-grow-1 name-meal ms-2">
                                <h5 class="mb-0 m-0">{{$meal->NameFood}}</h5>
                            </div>
                            <div class="flex-grow-1 prix-meal ms-2">
                                <p class="mb-0"><span>{{$meal->Price}}</span>DH</p>
                            </div>
                            <div class="flex-grow-1 number-meal ms-2">
                                <div class="d-flex align-items-center">
                                    <button type="button" class="btn btn-sm  btn-dark me-2 plus"><i class="fa-solid fa-plus"></i></button>
                                    @php $x = true ; @endphp
                                    @foreach($Order->image_order as $image )
                                        @if($meal->id_meal == $image->id_meal)
                                            @php $x = false ; @endphp
                                            <p class="mb-0">{{$image->ordered_number}}</p>
                                        @endif
                                    @endforeach
                                    @if($x)
                                        <p class="mb-0">1</p>
                                    @endif
                                    <button type="button" class="btn btn-sm btn-dark ms-2 munis"><i class="fa-regular fa-window-minimize"></i></button>
                                </div>
                            </div>
                            <div class="toggle-btns">
                                <div class="toggle-btn mealss" data-meal='{{$meal->id_meal}}'>
                                    <input type="checkbox"  class="toggle-input">
                                    <label  class="toggle-label @foreach($Order->image_order as $image ) @if($meal->id_meal == $image->id_meal) active  @endif @endforeach " @foreach($Order->image_order as $image ) @if($meal->id_meal == $image->id_meal) data="True"  @endif @endforeach ></label>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endisset
                </div>
                <div class='text-danger'></div>
            </div>

            <div class="mb-3 d-flex justify-content-between total">
                <h5 class="mb-0 ms-2">Total</h5>
                <p class="mb-0 me-2"><span>{{$Order->total}}</span>DH</p>
            </div>

            <div class="clearfix mb-3 me-4">
                @if( $Person->User_Group == 'Manager' )
                    <a href="{{ url('/manager/order')}}">
                        <button type="button" class="btn btn-danger float-end ms-2 ">Clear</button>
                    </a>
                @else
                    <a href="{{ url('/admin/order')}}">
                        <button type="button" class="btn btn-danger float-end ms-2 ">Clear</button>
                    </a>
                @endif
                <button type="button" class="btn btn-success float-end  updatorder">Update</button>
            </div>

        </form>
    </section>
@endsection