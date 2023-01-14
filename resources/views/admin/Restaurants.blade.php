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
                <div>
                    <form action="">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">title</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div>
                            <label for="exampleInputEmail1" class="form-label">Country</label>
                            <select class="form-select form-select-sm mt-1">
                                <option>Morroco</option>
                            </select>
                        </div>
                        <div>
                            <label for="exampleInputEmail1" class="form-label">Regions</label>
                            <select class="form-select form-select-sm mt-1">
                                <option value="Dakhla-Oued Ed-Dahab">Dakhla-Oued Ed-Dahab</option>
                                <option value="Laâyoune-Sakia El Hamra">Laâyoune-Sakia El Hamra</option>
                                <option value="Guelmim-Oued Noun">Guelmim-Oued Noun</option>
                                <option value="Souss-Massa">Souss-Massa</option>
                                <option value="Drâa-Tafilalet">Drâa-Tafilalet</option>
                                <option value="Oriental">Oriental</option>
                                <option value="Tanger-Tetouan-Al Hoceima">Tanger-Tetouan-Al Hoceima</option>
                                <option value="Fès-Meknès">Fès-Meknès</option>
                                <option value="Rabat-Salé-Kénitra">Rabat-Salé-Kénitra</option>
                                <option value="Béni Mellal-Khénifra">Béni Mellal-Khénifra</option>
                                <option value="Casablanca-Settat">Casablanca-Settat</option>
                                <option value="Marrakesh-Safi">Marrakesh-Safi</option>
                            </select>
                        </div>
                        <div>
                            <label for="exampleInputEmail1" class="form-label">Country</label>
                            <select class="form-select form-select-sm mt-1">
                                <option></option>
                            </select>
                        </div>
                    </form>
                </div>
            </article>
            <article>

            </article>
            <article>

            </article>
        </div>
    </section>
@endsection