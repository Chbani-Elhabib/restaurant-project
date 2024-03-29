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
            @if( $Person->User_Group == "Admin")
            <article class="formmealsbtnn">
                <button class='button_19 addrestaurants'>add Meal</button>
            </article> 
            <article class="formmeals">
                    <form action="{{ url('/admin/meal/create') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class='mb-1'>
                            <label for="labelnamefood" class="form-label labelnamefood">Name Food :</label>
                            <input type="text" name="NameFood" class="form-control forminput" id="labelnamefood" placeholder="Name Food">
                            <p class="text-danger mb-0"></p>
                        </div>

                        <div class='mb-1'>
                            <label for="labelDescription" class="form-label labelDescription">Description :</label>
                            <textarea name="Description" class="form-control forminput" id="labelDescription" rows="3" placeholder="Description"></textarea>
                            <p class="text-danger"></p>
                        </div>

                        <div class='mb-1'>
                            <label for="labelprice" class="form-label labelprice">Price :</label>
                            <input name="Price" type="text" class="form-control forminput" id="labelprice" placeholder="Price">
                            <p class="text-danger"></p>
                        </div>

                        <div class='mb-1'>
                            <label for="exampleFormControlInput1" class="form-label labelSections">Menu Sections :</label>
                        </div>
                        <input type="text" name='TypeFood' class='d-none forminput'>
                        <div class="select-menu">
                            <div class="select-btn">
                                <span class="sBtn-text">Select your option</span>
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
                                    <i class="fa-solid fa-question"></i>
                                    <span class="option-text">other</span>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <p class="text-danger"></p>
                        </div>
                        
                        <div class='mb-1'>
                            <label for="imageinputee" class="form-label imageinputee">image :</label>
                            <div class="borderimage">
                                <div class='inputimage'>
                                    <i class="fa-solid fa-image"></i>
                                    <label class="form-label">image</label>
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
            @endif
            <article class='mt-1'>
                <div class="content-body">
                    <h2 class="text-primary font-w600 mb-0">Meals</h2>
                </div>
            </article>
            <article class="showmeals">
                @if($meals->count() > 0)
                    <table id="example" class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Name food</th>
                                <th scope="col">Type food</th>
                                <th scope="col">Price</th>
                                @if($Person->User_Group == "Admin")
                                <th scope="col"><i class="fa-solid fa-heart"></i></th>
                                <th scope="col">Best meals</th>
                                <th scope="col">...</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($meals as $meal)
                            <tr>
                                <td>
                                    <div class="borderimgee">
                                        <img src="/meals/{{$meal->Photo}}" alt="df" class="img-thumbnail">
                                    </div>
                                </td>
                                <td>
                                    <p class='mb-0'>{{$meal->NameFood}}</p>
                                </td>
                                <td>
                                    <p class='mb-0'>{{$meal->TypeFood}}</p>
                                </td>
                                <td>
                                    <p class='mb-0'>{{$meal->Price}}<span>DH</span></p>
                                </td>
                                @if($Person->User_Group == "Admin")
                                <td>
                                    <p>{{$meal->NumberLike}}</p>
                                </td>
                                <td>
                                    <div class="toggle-btns">
                                        <div class="toggle-btn mealss" data="{{$meal->id_meal}}">
                                            <input type="checkbox"  class="toggle-input">
                                            <label  class="toggle-label @if($meal->bestMeals == 1) active @endif"></label>
                                        </div>
                                    </div>
                                </td>
                                <td class='d-flex align-items-center'>
                                    <a href='/admin/meals/{{$meal->id_meal}}/update'>
                                        <img src="/image/update.png" alt="update">
                                    </a>
                                    <img src="/image/delete.png" alt="delete" class='delete'>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="data_null">We do not have any meals information you are looking for</p>
                @endif
            </article>
        </div>
    </section>
@endsection