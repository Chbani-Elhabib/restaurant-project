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
    <section class='munu_users'>
        <article class='Users'>
            <button class="button_19" role="button">Users</button>
        </article>
        <article class='Restaurant'>
            <button class="button_19" role="button">Restaurant</button>
        </article>
    </section>
    <section class='content_users'>
        <div class='cont_users'>
            <article class='article_users'>
                <div class='list_users'>
                    <div class="add_btn">
                        <button class="button_19 ">add Users</button>
                    </div>
                    <div class="add_form">
                        <form action="">
                            <div>
                                <label for=""><span>*</span>UserName</label>
                                <input class="input_add_user" type="text">
                            </div>
                            <div>
                                <label for=""><span>*</span>E-mail</label>
                                <input class="input_add_user" type="text">
                            </div>
                            <div>
                                <label for=""><span>*</span>Password</label>
                                <input class="input_add_user" type="text">
                            </div>
                            <div>
                                <label for=""><span>*</span>Config-Password</label>
                                <input class="input_add_user" type="text">
                            </div>
                            <div>
                                <label for="">Telf</label>
                                <input class="input_add_user" type="number">
                            </div>
                            <div>
                                <label for=""><span>*</span>Type-Users</label>
                                <select id="pet-select">
                                    <option value="All">User</option>
                                    <option value="dog">manage</option>
                                    <option value="cat">Liverour</option>
                                    <option value="hamster">Admin</option>
                                </select>
                            </div>
                            <div>
                                <input class="input_add_user" type="file" id="image_user" name="avatar" hidden>
                                <label for="image_user"><span>*</span>Profile-Photo</label>
                            </div>
                            <div class="show_user"></div>
                            <div>
                                <button class="button_19 add-user">Add</button>
                            </div>
                        </form>
                    </div>
                    <div class='research_users'>
                        <div class="dropdown">
                            <select id="pet-select">
                                <option value="All">All</option>
                                <option value="dog">Dog</option>
                                <option value="cat">Cat</option>
                                <option value="hamster">Hamster</option>
                                <option value="parrot">Parrot</option>
                            </select>
                        </div>
                        <div class="search_field">
                            <input type="text" class="input" placeholder="Search">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                                <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </article>
            <article class='article_users'>
                <div class='list_users'>
                    <div class="add_btn rr">
                        <button class="button_19">add Restaurant</button>
                    </div>
                    <div class="add_form">
                        <form action="">
                            <div>
                                <label for="">UserName</label>
                                <input type="text">
                            </div>
                            <div>
                                <label for="">E-mail</label>
                                <input type="text">
                            </div>
                            <div>
                                <label for="">Password</label>
                                <input type="text">
                            </div>
                            <div>
                                <label for="">Config-Password</label>
                                <input type="text">
                            </div>
                            <div class="">
                                <label for="">Type-Users</label>
                                <select id="pet-select">
                                    <option value="All">User</option>
                                    <option value="dog">manage</option>
                                    <option value="cat">Liverour</option>
                                    <option value="hamster">Admin</option>
                                </select>
                            </div>
                            <div>
                                <input type="file" id="image_user" name="avatar" hidden>
                                <label for="image_user">Profile-Photo</label>
                            </div>
                            <div class="show_user"></div>
                            <div>
                                <button class="button_19">Add</button>
                            </div>
                        </form>
                    </div>
                    <div class='research_users'>
                        <div class="dropdown">
                            <select id="pet-select">
                                <option value="All">All</option>
                                <option value="dog">Dog</option>
                                <option value="cat">Cat</option>
                                <option value="hamster">Hamster</option>
                                <option value="parrot">Parrot</option>
                            </select>
                        </div>
                        <div class="search_field">
                            <input type="text" class="input" placeholder="Search">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                                <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </article>
        </div>
    </section>
@endsection