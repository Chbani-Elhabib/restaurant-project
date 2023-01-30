@extends('admin.html.Html')
@extends('admin.header.Header')
@extends('admin.navbar.nav')
@section('title','Dashboard')
@section('Restaurants','active')

<!-- css  -->
@section('css')
@vite(['resources/css/admin/navbar/Nav.css','resources/css/admin/Restaurants.css'])
@endsection
<!-- js  -->
@section('js')
@vite(['resources/js/admin/navbar/Nav.js','resources/js/admin/Restaurants.js'])
@endsection

@section('content')
    <section>
        <div class="restaurants">
            <article>
                <button class='button_19 addrestaurants'>add Restaurant</button>
            </article>
            <article class="addrestautant">
                    <form action="">
                        <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label">title</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="title">
                            <div id="emailHelp" class="form-text"></div>
                        </div>
                        <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label">Country</label>
                            <select class="form-select form-select-sm mt-1">
                                <option>Morroco</option>
                            </select>
                        </div>
                        <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label">Regions</label>
                            <select class="form-select form-select-sm mt-1 Regions">
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
                        </div>
                        <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label">city</label>
                            <select class="form-select form-select-sm mt-1 city"></select>
                        </div>
                        <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label">Address</label>
                            <textarea name="Address" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Address"></textarea>                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label">manager</label>
                            <select class="form-select form-select-sm mt-1 manager"></select>
                        </div>
                        <div class="mb-1 multiselect">
                            <label for="exampleInputEmail1" class="form-label">livreur</label>
                            <div class="selectBox">
                                <select class="form-select form-select-sm mt-1 livreur">
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
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Price Delivery">
                            <div id="emailHelp" class="form-text"></div>
                        </div>
                        <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label">delivery time</label>
                            <div class='d-flex flex-row align-items-center'>
                                <label for="exampleInputEmail1" >of</label>
                                <input type="text" class="form-control form-select-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="delivery time">
                                <label for="exampleInputEmail1" >min to </label>
                                <input type="text" class="form-control form-select-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="delivery time">
                                <label for="exampleInputEmail1">min</label>
                            </div>
                            <div id="emailHelp" class="form-text"></div>
                        </div>
                        <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label">Restaurant image </label>
                            <div class='d-flex justify-content-center align-items-center addimage'>
                                <div class="btn btn-success">
                                    Add image
                                    <i class="fa-regular fa-image ms-2"></i>
                                    <input type="file"/>
                                </div>
                            </div>
                        </div>
                        <div class="mb-1">
                            <button class='button_19 float-end me-4'>add</button>
                        </div>
                    </form>
            </article>
            <article>

            </article>
            <article>

            </article>
        </div>
    </section>
@endsection