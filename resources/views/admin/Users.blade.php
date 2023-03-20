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
                <div class="add_btn clearfix">
                    <button class="button_19 float-end">add Users</button>
                </div>
                <div class="add_form">
                    <form action="{{ url('/users/sign') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-1">
                            <div class="image-profile">
                                <img src="/imageUsers/users.png" alt="profile-">
                                <i class="fa-regular fa-image"></i>
                                <input type="file" class="image_user">
                            </div>
                        </div>

                        <div class="mb-1">
                            <label class="label_add_user" for=""><span>*</span>UserName</label>
                            <input name='UserName' class="input_add_user form-control mt-2" type="text">
                            <p></p>
                        </div>

                        <div class="mb-1">
                            <label class="label_add_user" for=""><span>*</span>E-mail</label>
                            <input name='Email' class="input_add_user form-control mt-2" type="text">
                            <p></p>
                        </div>

                        <div class="mb-1">
                            <label class="label_add_user" for=""><span>*</span>Password</label>
                            <input name='Password' class="input_add_user form-control mt-2" type="Password">
                            <p></p>
                        </div>

                        <div class="mb-1">
                            <label class="label_add_user" for=""><span>*</span>Config-Password</label>
                            <input  class="input_add_user form-control mt-2" type="Password form-control">
                            <p></p>
                        </div>

                        <div class="mb-1">
                            <label for=""><span>*</span>Type-Users</label>
                            <select name='User_Group'  class="form-control mt-2 form-select form-select">
                                <option value="User">User</option>
                                @if( $Person->User_Group == 'Admin' )
                                    <option value="Manager">Manage</option>
                                    <option value="Liverour">Liverour</option>
                                    <option value="Admin">Admin</option>
                                @endif
                            </select>
                        </div>

                        <div calss="addressuser">

                            <div class="mb-1">
                                <label for="exampleInputEmail1" class="form-label labels mb-0"><span>*</span>Country</label>
                                <select class="form-select form-control form-select mt-1 inputevalue mt-2" name='Country'>
                                    <option value='Morroco'>Morroco</option>
                                </select>
                                <div class="form-text"></div>
                            </div>
    
                            <div class="mb-1">
                                <label for="exampleInputEmail1" class="form-label labels mb-0"><span>*</span>Regions</label>
                                <select class="form-select form-select mt-2 Regions inputevalue" name='Regions'>
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
                                <div class="form-text"></div>
                            </div>
    
                            <div class="mb-1">
                                <label for="exampleInputEmail1" class="form-label mb-0"><span>*</span>city</label>
                                <select class="form-select form-select mt-2 city inputevalue" name='city'></select>
                                <div class="form-text"></div>
                            </div>

                        </div>

                        <div class="mb-1">
                            <label class="label_add_user" for="">Telf</label>
                                <input name='Telf' class="input_add_user form-control mt-2" type="text">
                            <p></p>
                        </div>


                        <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label mb-0">Address</label>
                            <textarea name="Address" class="form-control mt-2 inputevalue" id="exampleFormControlTextarea1" rows="3" placeholder="Address"></textarea>                            
                            <div id="emailHelp" class="form-text"></div>
                        </div>

                        <div class="clearfix">
                            <button class="button_19 add-user float-end">Add</button>
                        </div>
                        
                    </form>
                </div>
                <div class='research_users'>
                    <div class="dropdown">
                        <select class="">
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
                <div class="table_users">
                    @isset($users)
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Users information</th>
                                    <th scope="col">User job </th>
                                    <th scope="col">Update</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                @foreach ($users as $user)
                                <tr><th scope="row"><div class="usersin"><div>
                                    <img src="/ImageUsers/{{$user->Photo}}"  alt="profaile users">
                                    </div><div><h5>{{$user->UserName}}</h5><p>{{$user->Email}}</p></div></div></th>
                                    <td><h5>{{$user->User_Group}}</h5></td>
                                    <td><a href="users/update/{{$user->id_people}}" class="button_19 Update">Update</a></td>
                                    <td><a href="users/delete/{{$user->id_people}}" class="button_19">Delete</a></td>
                                    <td><button class="button_19 delete">Delete</button></td>
                                @endforeach
                            </tbody>
                        </table>
                    @endisset
                </div>
            </article>
        </div>
    </section>
@endsection