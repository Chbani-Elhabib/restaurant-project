@extends('admin.html.Html')
@extends('admin.header.Header')
@extends('admin.navbar.nav')
@section('title','Dashboard')
@section('Users','active')
<!-- css  -->
@section('css')
@vite(['resources/css/admin/navbar/Nav.css','resources/css/admin/Users.css'])
@endsection
<!-- js  -->
@section('js')
@vite(['resources/js/admin/navbar/Nav.js','resources/js/admin/Users.js'])
@endsection


@section('content')
    <section class="users">
        <div class="usersborder"> 
            <article>
                <div class="add_btn">
                    <button class="button_19">add Users</button>
                </div>
                <div class="add_form">
                    <form action="{{ url('/users/sign') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label class="label_add_user" for=""><span>*</span>UserName</label>
                            <input name='UserName' class="input_add_user" type="text">
                            <p></p>
                        </div>
                        <div>
                            <label class="label_add_user" for=""><span>*</span>E-mail</label>
                            <input name='Email' class="input_add_user" type="text">
                            <p></p>
                        </div>
                        <div>
                            <label class="label_add_user" for=""><span>*</span>Password</label>
                            <input name='Password' class="input_add_user" type="Password">
                            <p></p>
                        </div>
                        <div>
                            <label class="label_add_user" for=""><span>*</span>Config-Password</label>
                            <input  class="input_add_user" type="Password">
                            <p></p>
                        </div>
                        <div>
                            <label class="label_add_user" for="">Telf</label>
                            <img src="{{ url('image/morocco-phone.png') }}" alt="morocco-phone">
                            <p class="marroc212">+212</p>
                            <input name='Telf' class="input_add_user" type="text">
                            <p></p>
                        </div>
                        <div>
                            <label for=""><span>*</span>Type-Users</label>
                            <select name='User_Group' id="pet-select">
                                <option value="User">User</option>
                                <option value="Manager">Manage</option>
                                <option value="Liverour">Liverour</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                        <div>
                            <input class="input_add_user" type="file" id="image_user" name="Photo" hidden>
                            <label  for="image_user">Profile-Photo</label>
                        </div>
                        <div class="show_user"></div>
                        <div>
                            <button class="button_19 add-user">Add</button>
                        </div>
                    </form>
                </div>
                <div class='research_users'>
                    <div class="dropdown">
                        <select class="pet-select">
                            <option value="All">All</option>
                            <option value="User">User</option>
                            <option value="Manager">Manager</option>
                            <option value="Liverour">Liverour</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
                    <div class="search_field">
                        <input type="text" class="input_research_users" placeholder="to search">
                        <i class="fas fa-search"></i>
                    </div>
                </div>
                <div class="table_users"></div>
            </article>
        </div>
    </section>
@endsection