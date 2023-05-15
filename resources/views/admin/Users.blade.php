@extends('admin.html.Html')
@extends('admin.header.Header')
@extends('admin.navbar.nav')
@section('title','Dashboard')
@section('Users','active')

@section('css')
@vite(['resources/css/admin/navbar/Nav.css','resources/css/admin/Users.css'])
@endsection

@section('js')
@vite(['resources/js/admin/navbar/Nav.js','resources/js/admin/Users.js'])
@endsection


@section('content')
    <section class="users">
        <div class="usersborder"> 
            <article>
                <div class="add_btn clearfix">
                    <button class="btn btn-success float-end">add Users</button>
                </div>
                <div class="add_form">
                    <form action="{{ url('/users/sign') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-1">
                            <div class="image-profile">
                                <img src="/imageUsers/users.png" alt="profile-user">
                                <i class="fa-regular fa-image"></i>
                                <input type="file" name="Photo" class="image_user">
                            </div>
                        </div>

                        <div class="mb-1">
                            <label class="label_add_user" for=""><span class="position-relative" >*</span>UserName :</label>
                            <input name='UserName' class="input_add_user form-control" type="text">
                            <p class="form-text text-danger mb-0"></p>
                        </div>

                        <div class="mb-1">
                            <label class="label_add_user" for=""><span class="position-relative">*</span>E-mail :</label>
                            <input name='Email' class="input_add_user form-control" type="text">
                            <p class="form-text text-danger mb-0"></p>
                        </div>

                        <div class="mb-1">
                            <label class="label_add_user" for=""><span class="position-relative">*</span>Password :</label>
                            <input name='Password' class="input_add_user form-control" type="Password">
                            <p class="form-text text-danger mb-0"></p>
                        </div>

                        <div class="mb-1">
                            <label class="label_add_user" for=""><span class="position-relative">*</span>Config-Password :</label>
                            <input  class="input_add_user form-control" type="Password">
                            <p class="form-text text-danger mb-0"></p>
                        </div>

                        <div class="mb-1">
                            <label for=""><span class="position-relative">*</span>Type-Users :</label>
                            <select name='User_Group'  class="form-control form-select form-select">
                                <option value="User">User</option>
                                <option value="Liverour">Liverour</option>
                                <option value="Chef">Chef</option>
                                @if( $Person->User_Group == 'Admin' )
                                    <option value="Manager">Manage</option>
                                    <option value="Admin">Admin</option>
                                @endif
                            </select>
                            <p class="form-text text-danger mb-0"></p>
                        </div>

                        <div calss="addressuser">

                            <div class="mb-1">
                                <label for="exampleInputEmail1" class="form-label labels mb-0"><span class="position-relative">*</span>Country :</label>
                                <select class="form-select form-control form-select inputevalue input_add_user" name='Country'>
                                    <option value='Morroco'>Morroco</option>
                                </select>
                                <div class="form-text text-danger"></div>
                            </div>
    
                            <div class="mb-1">
                                <label for="exampleInputEmail1" class="form-label labels mb-0"><span class="position-relative">*</span>Regions :</label>
                                <select class="form-select form-select Regions input_add_user" name='Regions'>
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
                                <div class="form-text text-danger"></div>
                            </div>
    
                            <div class="mb-1">
                                <label for="exampleInputEmail1" class="form-label mb-0"><span class="position-relative">*</span>city :</label>
                                <select class="form-select form-select city input_add_user" name='city'></select>
                                <div class="form-text text-danger"></div>
                            </div>

                        </div>

                        <div class="mb-1">
                            <label class="label_add_user" for="">Telf :</label>
                                <input name='Telf' class="input_add_user form-control input_add_user" type="text">
                            <p></p>
                        </div>

                        <div class="mb-1">
                            <label class="label_add_user" for="">Full Name :</label>
                                <input name='FullName' class="input_add_user form-control input_add_user" type="text">
                            <p></p>
                        </div>


                        <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label mb-0">Address :</label>
                            <textarea name="Address" class="form-control input_add_user" id="exampleFormControlTextarea1" rows="1" placeholder="Address"></textarea>                            
                            <div id="emailHelp" class="form-text"></div>
                        </div>

                        <div class="clearfix">
                            <button class="btn btn-success add-user float-end">Add User</button>
                        </div>
                        
                    </form>
                </div>
                <div class="table_users">
                    @isset($users)
                        <table id='example' class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Users information</th>
                                    <th scope="col">User job </th>
                                    <th scope="col">...</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">
                                            <div class="usersin">
                                                <div>
                                                    <img src="/ImageUsers/{{$user->Photo}}"  alt="profaile users">
                                                </div>
                                                <div>
                                                    <h5>{{$user->UserName}}</h5>
                                                    <p>{{$user->Email}}</p>
                                                </div>
                                            </div>
                                        </th>
                                        <td><h5>{{$user->User_Group}}</h5></td>
                                        <td>
                                            <div>
                                                <a class="show" data='{{$user->id_people}}'>
                                                    <img src="/image/eye.png" alt="eye">
                                                </a>
                                                <a href="users/update/{{$user->id_people}}">
                                                <img src="/image/update.png" alt="update">
                                                </a>
                                                <a class="delete">
                                                    <img src="/image/delete.png" alt="delete">
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endisset
                </div>
            </article>
        </div>
    </section>
@endsection