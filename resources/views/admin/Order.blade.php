@extends('admin.html.Html')
@extends('admin.header.Header')
@extends('admin.navbar.nav')
@section('title','Dashboard')
@section('Booking','active')

<!-- css  -->
@section('css')
@vite(['resources/css/admin/navbar/Nav.css','resources/css/admin/Order.css'])
@endsection
<!-- js  -->
@section('js')
@vite(['resources/js/admin/navbar/Nav.js','resources/js/admin/Order.js'])
@endsection


@section('content')
    <section class="Meals">
        <div class="Mealsborder"> 
            @if( $Person->User_Group == 'Admin' || $Person->User_Group == 'Manager' )
                <article class='mt-4 float-end me-4'>
                    <button class='button_19 Neworder'>New order</button>
                </article>
                <article class="" style="clear: right;">
                    <form action="" class='mt-3'>

                        <div class="mb-3">
                            <label  class="form-label ms-1">Customer</label>
                            <div class="container p-0">
                                <div class="box">
                                    <ul class="by_default ps-2  mb-0">
                                        <li>
                                            <div class="sharing">
                                                <div class="share-icon"></div>
                                                <p class='m-0'></p>
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
                            <input type="email" class="form-control" id="phone" >
                            <div id="emailHelp" class="form-text"></div>
                        </div>

                        <div class="mb-3">
                            <label for="Address" class="form-label">Address</label>
                            <textarea class="form-control" id="Address" ></textarea>
                            <div id="emailHelp" class="form-text"></div>
                        </div>

                        
                        @isset($Restaurants)

                            <div class="mb-3">
                                <label for="Restaurant" class="form-label">Restaurant</label>
                                <select class="form-select  Restaurants" aria-label="Default select">
                                    <option selected disabled></option>
                                    @foreach( $Restaurants as $Restaurant )
                                    <option value="{{$Restaurant->id_restaurant}}.{{$Restaurant->PriceDelivery}}" >{{$Restaurant->NameRestaurant}}</option>
                                    @endforeach
                                </select>
                                <div class='text-danger' ></div>
                            </div>
                            
                            <div class="mb-3 d-flex align-items-center prix-delevery">
                                <div class="toggle-btns">
                                    <div class="toggle-btn delivry m-0">
                                        <input type="checkbox"  class="toggle-input">
                                        <label class="toggle-label"></label>
                                    </div>
                                </div>
                                <label  class="form-label ms-2 mb-0">Delivery price</label>
                                <div class="text-end" style="width: 73%;"><span>00</span>DH</div>
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
                                                <p class="mb-0">1</p>
                                                <button type="button" class="btn btn-sm btn-dark ms-2 munis"><i class="fa-regular fa-window-minimize"></i></button>
                                            </div>
                                        </div>
                                        <div class="toggle-btns">
                                            <div class="toggle-btn mealss" data-meal='{{$meal->id_meal}}'>
                                                <input type="checkbox"  class="toggle-input">
                                                <label  class="toggle-label"></label>
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
                            <p class="mb-0 me-2"><span>0</span>DH</p>
                        </div>

                        <div class="clearfix mb-3 me-4">
                            <button type="button" class="btn btn-success float-end addorder">Add order</button>
                        </div>

                    </form>
                </article>
            @endif
            <article class='mt-4'>
                <div class="content-body">
                    <h2 class="text-primary font-w600 mb-0">Orders</h2>
                </div>
            </article>
            <article class='mt-2 data-orders'>
                <div class="row">
                    <div class="col-12">
                        <div class="">
                            @isset($Orders)
                                @if($Orders->count())
                                    <table id="example" class="table table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Customer</th>
                                                <th>Meals cost</th>
                                                <th>Date of order</th>
                                                <th>Status order</th>
                                                @if( $Person->User_Group == 'Admin' || $Person->User_Group == 'Manager' )
                                                <th>livreur</th>
                                                @endif
                                                <th>...</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @foreach( $Orders as $Order )
                                                <tr>

                                                    <td class='d-flex align-items-center'>
                                                        <div class='image-user'>
                                                            <img src="/ImageUsers/{{$Order->Person_order->Photo}}" alt="image-user">
                                                        </div>
                                                        <div class="ms-2">
                                                            <h5 class='mb-0'>{{$Order->Person_order->UserName}}</h5>
                                                            <p class='mb-0'>{{$Order->Person_order->Email}}</p>
                                                        </div>
                                                    </td>

                                                    <td class="w-space-no"><span>{{$Order->total}}</span>DH</td>

                                                    <td><p>{{$Order->created_at}}</p></td>

                                                    @if( $Person->User_Group == 'Admin')
                                                        <td>
                                                            @if($Order->Order_serves == 0)
                                                            <div><p class='text-dark border border-dark fs-4 Pending'>Pending</p></div>
                                                            @elseif($Order->Order_serves == 1)
                                                            <div><p class='text-warning border border-text-warning fs-4'>Equip</p></div>
                                                            @elseif($Order->Order_serves == 2)
                                                            <div><p class='text-primary border border-primary fs-4'>Ready</p></div>
                                                            @elseif($Order->Order_serves == 6)
                                                            <div><p class='text-primary border border-primary fs-4'>Delivery</p></div>
                                                            @elseif($Order->Order_serves == 3 || $Order->Order_serves == 5 )
                                                            <div><p class='text-danger border border-danger fs-4'>Cancelled</p></div>
                                                            @else
                                                            <div><p class='text-success border border-success fs-4'>Delivered</p></div>
                                                            @endif
                                                        </td>
                                                    @elseif($Person->User_Group != 'Admin')
                                                        <td>
                                                            <div class="">
                                                                <select class="form-select servesorder" date-serves='{{$Order->id_order}}'  aria-label="Floating label select example">
                                                                    @if($Person->User_Group == 'Manager')
                                                                    <option class='text-dark border border-dark' value="0" @if($Order->Order_serves == 0) selected @endif>Pending</option>
                                                                    <option class='text-warning border border-text-warning' value="1" @if($Order->Order_serves == 1) selected @endif >Equip</option>
                                                                    <option class='text-primary border border-primary' value="2" @if($Order->Order_serves == 2) selected @endif >On Delivery</option>
                                                                    <option class='text-success border border-success' value="4" @if($Order->Order_serves == 4) selected @endif disabled >Delivered</option>
                                                                    <option class='text-danger border border-danger' value="3" @if($Order->Order_serves == 3 || $Order->Order_serves == 5 ) selected @endif >Cancelled</option>
                                                                    @elseif($Person->User_Group == 'Chef')
                                                                    <option class='text-warning border border-text-warning' value="1" @if($Order->Order_serves == 1) selected @endif >Equip</option>
                                                                    <option class='text-warning border border-text-warning' value="2" @if($Order->Order_serves == 1) selected @endif >Ready</option>
                                                                    @elseif($Person->User_Group == 'Liverour')
                                                                    <option class='text-success border border-success' value="4" @if($Order->Order_serves == 4) selected @endif >Delivered</option>
                                                                    <option class='text-danger border border-danger' value="5" @if($Order->Order_serves == 5) selected @endif >Cancelled</option>
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </td>
                                                    @endif

                                                    @if($Person->User_Group == 'Admin')
                                                        <td>
                                                            <div><p>{{$Order->livrour_order[0]->UserName}}</p></div>
                                                        </td>
                                                    @elseif( $Person->User_Group == 'Manager' )
                                                    <td>
                                                        <div class="">
                                                            <select class="form-select"  aria-label="Floating label select example">
                                                                @foreach( $Restaurants as $Restaurant )
                                                                    @foreach( $Restaurant->livreur as $livreur )
                                                                        @if($Order->id_restaurant == $livreur->id_restaurant )
                                                                            @foreach( $livreur->levrour_person as $Persone )
                                                                                <option class='text-dark border border-dark'  @if( $Persone->id_people == $Order->livrour_order[0]->UserName ) selected @endif  value="{{$Persone->id_people}}">{{$Persone->UserName}}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                    @endif

                                                    </>
                                                    <td>
                                                        <i class="fa-solid fa-eye"></i>
                                                        <i class="fa-solid fa-pencil"></i>
                                                        <i class="fa-regular fa-trash-can"></i>
                                                    </td>
                                                </tr>
                                                @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p class="text-center fs-5 opacity-25">You don't have orders yet !</p>
                                @endif
                            @endisset
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
@endsection