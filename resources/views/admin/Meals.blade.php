@extends('admin.html.Html')
@extends('admin.header.Header')
@extends('admin.navbar.nav')
@section('title','Meals')
@section('Meals','active')

<!-- css  -->
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@vite(['resources/css/admin/navbar/Nav.css','resources/css/admin/Meals.css'])
@endsection
<!-- js  -->
@section('js')
<script defer src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script defer src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
@vite(['resources/js/admin/navbar/Nav.js','resources/js/admin/Meals.js'])
@endsection

@section('content')
    <section class="Meals">
        <div class="Mealsborder">
            <article>
                <button class='button_19 addrestaurants'>add Meal</button>
            </article> 
            <article class="formmeals">
                    <form action="{{ url('/admin/meal/create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="labelnamefood" class="form-label labelnamefood">Name Food</label>
                            <input type="text" name="NameFood" class="form-control forminput" id="labelnamefood" placeholder="Name Food">
                            <div class="text-danger"></div>
                        </div>
                        <div class="mb-3">
                            <label for="labelDescription" class="form-label labelDescription">Description</label>
                            <textarea name="Description" class="form-control forminput" id="labelDescription" rows="3" placeholder="Description"></textarea>
                            <div class="text-danger"></div>
                        </div>
                        <div class="mb-3">
                            <label for="labelprice" class="form-label labelprice">Price</label>
                            <input name="Price" type="text" class="form-control forminput" id="labelprice" placeholder="Price">
                            <div class="text-danger"></div>
                        </div>
                        <label for="exampleFormControlInput1" class="form-label">Type food</label>
                        <select name="TypeFood" class="form-select" aria-label="Default select example">
                            <option value="meal">meal</option>
                            <option value="Drink">Drink</option>
                            <option value="Dish">Dish</option>
                        </select>
                        <div>
                            <label for="exampleFormControlInput1" class="form-label">image</label>
                            <div class="borderimage">
                                <div class='inputimage'>
                                    <i class="fa-solid fa-image"></i>
                                    <label for="exampleFormControlInput1" class="form-label">image</label>
                                    <input name="Photo" type="file" class='image'>
                                </div>
                                <div class='valueinpute'></div>
                            </div>
                        </div>
                        <div>
                            <button class='button_19 addrestaurants'>add</button>
                        </div>
                    </form>
            </article>
            <article class='filter'>
                <select class="form-select" aria-label="Default select example">
                    <option value="All">All</option>
                    <option value="meal">meal</option>
                    <option value="Drink">Drink</option>
                    <option value="Dish">Dish</option>
                </select>
            </article>
            <article class='showmeals'></article>
        </div>
    </section>
@endsection