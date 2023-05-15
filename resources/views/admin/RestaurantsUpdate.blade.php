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
        <form id="submite" class="d-grid" action="" method="POST" enctype="multipart/form-data" >
            @csrf

            <div class="mb-1">
                <label for="NameRestaurant" class="form-label labels">Name restaurant</label>
                <input type="text" class="form-control inputevalue" id="NameRestaurant" name='NameRestaurant'  value="{{$Restaurants->NameRestaurant}}">
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
                <label for="exampleInputEmail1" class="form-label labels mb-0"><span class="position-relative text-danger">*</span>Regions</label>
                <select class="form-select form-select mt-2 Regions inputevalue" name='Regions'>
                    <option selected disabled></option>
                    <option @if($Restaurants['Regions'] == "Tanger-Tetouan-Al Hoceima") selected  @endif value="1">Tanger-Tetouan-Al Hoceima</option>
                    <option @if($Restaurants['Regions'] == "l'Oriental") selected  @endif value="2">l'Oriental</option>
                    <option @if($Restaurants['Regions'] == "Fès-Meknès") selected  @endif value="3">Fès-Meknès</option>
                    <option @if($Restaurants['Regions'] == "Rabat-Salé-Kénitra") selected  @endif value="4">Rabat-Salé-Kénitra</option>
                    <option @if($Restaurants['Regions'] == "Béni Mellal-Khénifra") selected  @endif value="5">Béni Mellal-Khénifra</option>
                    <option @if($Restaurants['Regions'] == "Casablanca-Settat") selected  @endif value="6">Casablanca-Settat</option>
                    <option @if($Restaurants['Regions'] == "Marrakesh-Safi") selected  @endif value="7">Marrakesh-Safi</option>
                    <option @if($Restaurants['Regions'] == "Drâa-Tafilalet") selected  @endif value="8">Drâa-Tafilalet</option>
                    <option @if($Restaurants['Regions'] == "Souss-Massa") selected  @endif value="9">Souss-Massa</option>
                    <option @if($Restaurants['Regions'] == "Guelmim-Oued Noun") selected  @endif value="10">Guelmim-Oued Noun</option>
                    <option @if($Restaurants['Regions'] == "Laâyoune-Sakia El Hamra") selected  @endif value="11">Laâyoune-Sakia El Hamra</option>
                    <option @if($Restaurants['Regions'] == "Dakhla-Oued Ed-Dahab") selected  @endif value="12">Dakhla-Oued Ed-Dahab</option>
                </select>
                <div class="form-text text-danger"></div>
            </div>

            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">city</label>
                <select class="form-select form-select-sm mt-1 city inputevalue" data="{{$Restaurants->city}}" name='city'></select>
                <div class="form-text"></div>
            </div>

            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">Address</label>
                <textarea name="Address" class="form-control inputevalue" id="exampleFormControlTextarea1" rows="3" placeholder="Address">{{$Restaurants->Address}}</textarea>                            
                <div id="emailHelp" class="form-text"></div>
            </div>

            @if($Person->User_Group == 'Admin')
            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">manager</label>
                <select class="form-select form-select-sm mt-1 manager inputemanager" name='manager'>
                    <option value="{{$manager->id_people}}">{{$manager->UserName}}</option>
                </select>
                <div id="emailHelp" class="form-text"></div>
            </div>
            @endif

            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">Chef</label>
                <select class="form-select form-select-sm mt-1 Chef inputevalue" name='chef'>
                    <option value="{{$chef->id_people}}">{{$chef->UserName }}</option>
                </select>
                <div id="emailHelp" class="form-text"></div>
            </div>


            <div class="mb-1 multiselect"  data-name="{{$Restaurants->id_restaurant}}">
                <label for="exampleInputEmail1" class="form-label">livreur</label>
                <div class="selectBox">
                    <select class="form-select form-select-sm mt-1 livreur inputevalue">
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
                </div>
            </div>

            
            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">Price Delivery</label>
                <input type="text" name='PriceDelivery' class="form-control inputevalue" id="exampleInputEmail1" value="{{$Restaurants->PriceDelivery}}">
                <div id="emailHelp" class="form-text"></div>
            </div>

            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">delivery time</label>
                <div class='d-flex flex-row align-items-center'>
                    <label for="exampleInputEmail1" >of</label>
                    <input class="inputevalue" name='deliverytime_of' type="text" class="form-control form-select-sm" id="exampleInputEmail1" value="{{$Restaurants->deliverytime_of}}" >
                    <label for="exampleInputEmail1" >min to </label>
                    <input class="inputevalue" name='deliverytime_to' type="text" class="form-control form-select-sm" id="exampleInputEmail1" value="{{$Restaurants->deliverytime_to}}" >
                    <label for="exampleInputEmail1">min</label>
                </div>
                <div id="emailHelp" class="form-text"></div>
            </div>

            <div class="mb-1">
                <label class="form-label">Restaurant image </label>
                <div class='d-flex justify-content-center align-items-center addimage'>
                    <div class="container">
                        <div class='d-flex justify-content-around align-items-center dua'>
                            <div>Delete image<i class="fa-solid fa-trash ms-2"></i></div>
                            <div>Update image<i class="fa-solid fa-pencil ms-2"></i></div>
                            <div>Add image <i class="fa-regular fa-image ms-2"></i><input id='addimage' name="toutimages" type="file"></div>
                        </div>
                        <div class='addimagerestaurand'>
                            @foreach( $Restaurants->image as $key => $image )
                                <div class="image" @if( $key == 0) style="display: block" @endif >
                                    <img src="/ImageRestaurant/{{$image->Photo}}"  alt="{{$image->created_at}}">
                                </div>
                            @endforeach
                        </div>
                        <div class="button">
                            <a  class="prev">&#10094;</a>
                            <a class="next">&#10095;</a>
                        </div>
                    </div>
                </div>
                <p class="text-danger errorimage"></p>
            </div>

            <div class='d-flex'>
                <div class="mb-1">
                    <button class='button_19 float-end me-4'>Update</button>
                </div>
                @if( $Person->User_Group == 'Admin')
                <a href="/admin/restaurants">
                @else
                <a href="/manager/restaurants">
                @endif
                    <div>
                        <button type='button' class='button_19 float-end me-4'>Clean</button>
                    </div>
                </a>
            </div>
        </form>
    </section>
@endsection