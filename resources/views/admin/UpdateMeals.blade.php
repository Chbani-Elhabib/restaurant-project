@extends('admin.html.Html')
@extends('admin.header.Header')
@extends('admin.navbar.nav')
@section('title','UpdateMeals')

<!-- css  -->
@section('css')
@vite(['resources/css/admin/navbar/Nav.css','resources/css/admin/UpdateMeals.css'])
@endsection
<!-- js  -->
@section('js')
@vite(['resources/js/admin/navbar/Nav.js','resources/js/admin/UpdateMeals.js'])
@endsection

@section('content')
    <section>
        <article>
            <form action="/meals/{{$meal->id_meal}}/update" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-1">
                    <label for="labelnamefood" class="form-label labelnamefood mb-0">Name Food :</label>
                    <input type="text" name="NameFood" class="form-control forminput" id="labelnamefood" value='{{$meal->NameFood}}'>
                    <p class="text-danger ms-2"></p>
                </div>

                <div class="mb-1">
                    <label for="labelDescription" class="form-label  mb-0 labelDescription">Description :</label>
                    <textarea name="Description" class="form-control forminput" id="labelDescription" rows="3">{{$meal->Description}}</textarea>
                    <p class="text-danger ms-2"></p>
                </div>

                <div class="mb-1">
                    <label for="labelprice" class="form-label labelprice  mb-0">Price :</label>
                    <input name="Price" type="text" class="form-control forminput" id="labelprice" value='{{$meal->Price}}'>
                    <p class="text-danger ms-2"></p>
                </div>

                <div class="mb-1">
                    <label for="exampleFormControlInput1" class="form-label  labelSections mb-0">Menu Sections :</label>
                </div>

                <input type="text" name='TypeFood' value='{{$meal->TypeFood}}' class='d-none forminput'>
                <div class="select-menu">
                    <div class="select-btn">
                        <span class="sBtn-text">{{$meal->TypeFood}}</span>
                    </div>
                    <ul class="options">
                        <li class="option">
                            <img src="/MenuSections/Beverages.png" alt="ff">
                            <span class="option-text">Beverages</span>
                        </li>
                        <li class="option">
                            <img src="/MenuSections/salad.png" alt="ff">
                            <span class="option-text">Salad</span>
                        </li>
                        <li class="option">
                            <img src="/MenuSections/Sandwiches.png" alt="ff">
                            <span class="option-text">Sandwiches</span>
                        </li>
                        <li class="option">
                            <img src="/MenuSections/Seafood.png" alt="ff">
                            <span class="option-text">Seafood</span>
                        </li>
                        <li class="option">
                            <img src="/MenuSections/Desserts.png" alt="ff">
                            <span class="option-text">Desserts</span>
                        </li>
                        <li class="option">
                            <img src="/MenuSections/Soup.png" alt="ff">
                            <span class="option-text">Soup</span>
                        </li>
                        <li class="option">
                            <img src="/MenuSections/pizza.png" alt="ff">
                            <span class="option-text">pizza</span>
                        </li>
                        <li class="option">
                            <img src="/MenuSections/Burger.png" alt="ff">
                            <span class="option-text">Burger</span>
                        </li>
                        <li class="option">
                            <img src="/MenuSections/dish.png" alt="ff">
                            <span class="option-text">dish</span>
                        </li>
                        <li class="option">
                            <i class="fa-solid fa-question" style="font-size: 31px;width: 54px;text-align: center;"></i>
                            <span class="option-text">other</span>
                        </li>
                    </ul>
                </div>
                <div>
                    <p class="text-danger ms-2"></p>
                </div>
                
                <div class="mb-1 mt-1">
                    <label for="imageinputee" class="form-label  mb-0 imageinputee">image :</label>
                    <div class="borderimage">
                        <div class="position-relative">
                            <input type="file" name='image' class='forminput position-absolute'>
                            <p class="position-absolute">Update</p>
                        </div>
                        <div>
                            <img src="/meals/{{$meal->Photo}}" alt="">
                        </div>
                    </div>
                </div>

                <div class="clearfix">
                    <a href="/admin/meals">
                        <button type='button' class=' float-end btn btn-danger'>Clean</button>
                    </a>
                    <button class=' float-end btn btn-success addrestaurants me-3'>Update</button>
                </div>

            </form>
        </article>
    </section>
@endsection