@extends('admin.html.Html')
@extends('admin.header.Header')
@extends('admin.navbar.nav')
@section('title','Update Restaurants')

<!-- css  -->
@section('css')
@vite(['resources/css/admin/navbar/Nav.css','resources/css/admin/RestaurantsUpdate.css'])
@endsection

<!-- js  -->
@section('js')
@vite(['resources/js/admin/navbar/Nav.js','resources/js/admin/RestaurantsUpdate.js'])
@endsection


@section('content')
    <section>
        <form id="submite" class="d-grid" >
            @csrf

            <div>
                <label for="NameRestaurant" class="form-label labels mb-0"><span class="position-relative text-danger">*</span>Name restaurant :</label>
                <input type="text" class="form-control inputevalue" id="NameRestaurant" name='NameRestaurant'  value="{{$Restaurants->NameRestaurant}}">
                <div class="form-text ms-2 mt-0 text-danger"></div>
            </div>

            <div>
                <label class="form-label labels mb-0"><span class="position-relative text-danger">*</span>Country :</label>
                <select class="form-select form-select">
                    <option value='Morroco'>Morroco</option>
                </select>
                <div class="form-text ms-2 mt-0 text-danger"></div>
            </div>

            <div>
                <label class="form-label labels mb-0"><span class="position-relative text-danger">*</span>Regions :</label>
                <select class="form-select form-select">
                    <option selected disabled></option>
                    <option selected>{{$Restaurants->Regions}}</option>
                </select>
                <div class="form-text text-danger ms-2 mt-0"></div>
            </div>

            <div>
                <label class="form-label mb-0"><span class="position-relative text-danger">*</span>city :</label>
                <select class="form-select form-select">
                    <option selected disabled></option>
                    <option selected>{{$Restaurants->city}}</option>
                </select>
                <div class="form-text text-danger ms-2 mt-0"></div>
            </div>

            <div>
                <label for="Address" class="form-label mb-0"><span class="position-relative text-danger">*</span>Address :</label>
                <textarea name="Address" class="form-control" id="Address" rows="1" disabled placeholder="Address">{{$Restaurants->Address}}</textarea>                            
                <div class="form-text text-danger ms-2 mt-0"></div>
            </div>

            @if($Person->User_Group == 'Admin')
                <div>
                    <label class="form-label mb-0"><span class="position-relative text-danger">*</span>manager :</label>
                    <select class="form-select form-select manager inputemanager" name='manager'>
                        <option value="{{$manager->id_people}}">{{$manager->UserName}}</option>
                    </select>
                    <div class="form-text text-danger ms-2 mt-0"></div>
                </div>
            @else
                <div>
                    <label class="form-label mb-0"><span class="position-relative text-danger">*</span>manager :</label>
                    <select class="form-select form-select inputemanager">
                        <option value="{{$Person->id_people}}">{{$Person->UserName}}</option>
                    </select>
                    <div class="form-text text-danger ms-2 mt-0"></div>
                </div>
            @endif

            <div>
                <label class="form-label mb-0"><span class="position-relative text-danger">*</span>Chef :</label>
                <select class="form-select form-select Chef inputevalue" name='chef'>
                    <option value="{{$chef->id_people}}">{{$chef->UserName }}</option>
                </select>
                <div class="form-text text-danger ms-2 mt-0"></div>
            </div>


            <div>
                <label class="form-label mb-0"><span class="position-relative text-danger">*</span>livreur :</label>
                <div class="selectBox">
                    <select class="form-select form-select livreur inputevalue">
                        <option>-- Select an  livreur your  restaurant --</option>
                    </select>
                    <div class="overSelect"></div>
                </div>
                <div id="checkboxes">
                    @foreach( $Restaurants->Livreur as  $Livreur )
                        <label for="{{$Livreur->LevrourPerson->id_people}}" >
                            <input type="checkbox" checked name="Liverour[]" value="{{$Livreur->LevrourPerson->id_people}}" id="{{$Livreur->LevrourPerson->id_people}}" />
                            {{$Livreur->LevrourPerson->UserName}}
                        </label>
                    @endforeach
                    @foreach( $livreurs as  $Livreur )
                        <label for="{{$Livreur->id_people}}" >
                            <input type="checkbox" name="Liverour[]" value="{{$Livreur->id_people}}" id="{{$Livreur->id_people}}" />
                            {{$Livreur->UserName}}
                        </label>
                    @endforeach
                </div>
                <div class="form-text text-danger ms-2 mt-0"></div>
            </div>

            
            <div>
                <label for="PriceDelivery" class="form-label mb-0"><span class="position-relative text-danger">*</span>Delivery Price :</label>
                <input type="text" name='PriceDelivery' class="form-control inputevalue" id="PriceDelivery" value="{{$Restaurants->PriceDelivery}}">
                <div class="form-text text-danger ms-2 mt-0"></div>
            </div>

            <div>
                <label for="deliverytime_of" class="form-label mb-0"><span class="position-relative text-danger">*</span>delivery time :</label>
                <div class='d-flex flex-row align-items-center'>
                    <label for="deliverytime_of" >of</label>
                    <input name='deliverytime_of' type="text" class="form-control inputevalue" id="deliverytime_of" value="{{$Restaurants->deliverytime_of}}" >
                    <label for="deliverytime_to" >min to </label>
                    <input name='deliverytime_to' type="text" class="form-control inputevalue" id="deliverytime_to" value="{{$Restaurants->deliverytime_to}}" >
                    <label for="deliverytime_to">min</label>
                </div>
                <div class="form-text text-danger ms-2 mt-0"></div>
            </div>

            <div>
                <label class="form-label mb-0"><span class="position-relative text-danger">*</span>Restaurant image :</label>
                <div class='d-flex justify-content-center align-items-center addimage'>
                    <div class="btn btn-success d-none position-relative" style="margin: 18px;">
                        add image
                        <i class="fa-regular fa-image ms-2"></i>
                        <input id='newaddimage' class="position-absolute" type="file">
                    </div>
                    <div class="container">
                        <div class='d-flex justify-content-around align-items-center dua'>
                            <div id="delete">Delete image<i class="fa-solid fa-trash ms-2"></i></div>
                            <div>Update image<i class="fa-solid fa-pencil ms-2"></i><input id='updateimage' type="file"></div>
                            <div>Add image <i class="fa-regular fa-image ms-2"></i><input id='addimage' type="file"></div>
                        </div>
                        <div class='addimagerestaurand'>
                            @foreach( $Restaurants->image as $key => $image )
                                <div class="image" @if( $key == 0) style="display: block;" @endif >
                                    <img src="/ImageRestaurant/{{$image->Photo}}" file-name="{{$image->Photo}}"  alt="{{$image->created_at}}">
                                </div>
                            @endforeach
                        </div>
                        <div class="button @if($Restaurants->image->count() == 1 ) d-none @endif " >
                            <a  class="prev">&#10094;</a>
                            <a class="next">&#10095;</a>
                        </div>
                    </div>
                </div>
                <div class="form-text text-danger ms-2 mt-0"></div>
            </div>

            <div class='d-flex justify-content-end mt-2'>
                @if( $Person->User_Group == 'Admin')
                <a href="/admin/restaurants">
                @else
                <a href="/manager/restaurants">
                @endif
                    <div>
                        <button type='button' class='btn btn-primary me-4'>Clean</button>
                    </div>
                </a>
                <div class="mb-1">
                    <button class='btn btn-success Update me-4'>Update</button>
                </div>
            </div>
        </form>
    </section>
@endsection