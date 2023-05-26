@extends('html.Html')
@extends('headerandfooter/Header')
@section('title','Order')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/r-2.2.7/datatables.min.css"/>
@vite(['resources/css/Order.css' ])
@endsection

@section('js')
<script defer type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.3/r-2.2.7/datatables.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@vite(['resources/js/Order.js'])
@endsection


@section('contant')
    <section class="contant">

        <article>
            <div class="content-body">
                <h2 class="font-w600 mb-0">Orders</h2>
            </div>
        </article>

        <article>
            @if($Orders->count() > 0 )
                <table id="example" class="table table-hover" >
                    <thead>
                        <tr>
                            <th>Name restaurant</th>
                            <th>Total</th>
                            <th>Date of order</th>
                            <th>Status order</th>
                            <th>...</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $Orders as $Order )
                            <tr>
                                
                                <td class="position-relative">
                                    <p class="position-absolute mb-0">{{$Order->Restaurant_order->NameRestaurant}}</p>
                                </td>
                                
                                <td class="position-relative">
                                    <p class="position-absolute mb-0"><span>{{$Order->total}}</span>DH</p>
                                </td>
                                
                                <td class="position-relative">
                                    <p class="mb-0 position-absolute">{{$Order->created_at}}</p>
                                </td>
                                
                                <td class='Status-order position-relative'>
                                    @if($Order->Order_serves == 0)
                                    <div><p class='position-absolute text-dark border border-dark fs-4 Pending m-0'>Pending</p></div>
                                    @elseif($Order->Order_serves == 1)
                                    <div><p class='position-absolute text-warning border border-warning Equip m-0 fs-4'>Equip</p></div>
                                    @elseif($Order->Order_serves == 2)
                                    <div><p class='position-absolute text-info border border-info m-0 fs-4 Ready'>Ready</p></div>
                                    @elseif($Order->Order_serves == 3)
                                    <div><p class='position-absolute text-primary border border-primary On-Delivery m-0 fs-5'>On Delivery</p></div>
                                    @elseif($Order->Order_serves == 4)
                                    <div><p class='position-absolute text-success border border-success fs-4 Delivery m-0'>Delivery</p></div>
                                    @elseif($Order->Order_serves == 5 )
                                    <div><p class='position-absolute text-danger border border-danger m-0 Cancelled  fs-4'>Cancelled</p></div>
                                    @else
                                    <div><p class='position-absolute text-danger border border-danger m-0 ancelled'>ancelled delivery</p></div>
                                    @endif
                                </td>

                                <td data='{{$Order->id_order}}' class="position-relative">
                                    <div class="position-absolute" >
                                        <img src="/image/eye.png" alt="eye" class="show">
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="position-relative" style="top: 111px;">
                    <p class="text-center fs-1 opacity-25">You don't have orders yet !</p>
                </div>
            @endif
        </article>

    </section>

    <section>
        <article>
            <div class="show-order"></div>
        </article>
    </section>
@endsection