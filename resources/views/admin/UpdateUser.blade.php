@extends('admin.html.Html')
@extends('admin.header.Header')
@extends('admin.navbar.nav')
@section('title','Dashboard')
@section('Users','active')
<!-- css  -->
@section('css')
@vite(['resources/css/admin/navbar/Nav.css','resources/css/admin/UpdateUser.css'])
@endsection
<!-- js  -->
@section('js')
@vite(['resources/js/admin/navbar/Nav.js','resources/js/admin/UpdateUser.js'])
@endsection

@section('content')
    <section class="up">
        <div class="up11">
            <div class="bg-white shadowee rounded-lg d-block">
                <form action="/users/update/{{ $UpdateUser['id_people']}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="profile-tab-nav border-right">
                        <div>
                            <div class="img-circle text-center">
                                <div class="imageinpute">
                                    <div>
                                        <img src="/ImageUsers/{{ $UpdateUser['Photo']}}" alt="Image" class="shadow">
                                        <i  class="fa-solid fa-camera"></i>
                                        <input name='image' type="file" class="fa-solidfa-camera">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="v-pills-tabContent">
                        <div id="account" role="tabpanel" aria-labelledby="account-tab">
                            <h3 class="text-center">{{ __('Profile.Update') }}</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="labele" >{{ __('Profile.UserName') }}</label>
                                        <input type="text" name='UserName' class="form-control inpute" value="{{ $UpdateUser['UserName']}}">
                                        <p class="text-danger"></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="labele">{{ __('Profile.Email') }}</label>
                                        <input type="text" name="Email" class="form-control inpute" value="{{ $UpdateUser['Email']}}">
                                        <p class="text-danger"></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-check-input" name='verifEmail' value="true" type="checkbox" id="check1" @if($UpdateUser['Verif_Email'] == 1 ) checked ; @endif>
                                        <label class="form-check-label">{{ __('Profile.Verif_Email') }}</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{ __('Profile.UpdatePassword') }}</label>
                                        <input type="text" name="Password" class="form-control inpute">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="labele">{{ __('Profile.Config-Password') }}</label>
                                        <input type="text" class="form-control inpute">
                                        <p class="text-danger"></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="labele">{{ __('Profile.Telf') }}</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">+212</span>
                                            </div>
                                            <input type="text" name="Telf" value="{{ $UpdateUser['Telf']}}" class="form-control inpute" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                        <p class="text-danger inputtelf"></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input name='verifTelf' class="form-check-input" type="checkbox" id="check1"  value="true" @if($UpdateUser['Verif_Telf'] == 1 ) checked ; @endif>
                                        <label class="form-check-label">{{ __('Profile.Verif_Telf') }}</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <select class="form-control mt-2 form-select form-select mb-3" name='User_Group'>
                                        <option value="User" @if($UpdateUser['User_Group'] == "User") selected ; @endif >User</option>
                                        <option value="Liverour" @if($UpdateUser['User_Group'] == "Liverour") selected ; @endif>Liverour</option>
                                        <option value="Manager" @if($UpdateUser['User_Group'] == "Manager") selected ; @endif>Manager</option>
                                        <option value="Admin" @if($UpdateUser['User_Group'] == "Admin") selected ; @endif>Admin</option>
                                    </select>
                                </div>
                            </div>

                            <div calss="addressuser">

                                <div class="mb-1">
                                    <label for="exampleInputEmail1" class="form-label labels mb-0"><span class="position-relative">*</span>Country</label>
                                    <select class="form-select form-control form-select mt-1 inputevalue mt-2 input_add_user" name='Country'>
                                        <option value='Morroco'>Morroco</option>
                                    </select>
                                    <div class="form-text text-danger"></div>
                                </div>

                                <div class="mb-1">
                                    <label for="exampleInputEmail1" class="form-label labels mb-0"><span class="position-relative">*</span>Regions</label>
                                    <select class="form-select form-select mt-2 Regions input_add_user" name='Regions'>
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
                                    <label for="exampleInputEmail1" class="form-label mb-0"><span class="position-relative">*</span>city</label>
                                    <select class="form-select form-select mt-2 city input_add_user" name='city'></select>
                                    <div class="form-text text-danger"></div>
                                </div>

                            </div>


                            <div class="btnbutton">
                                <a href="{{ url('/admin/users') }}" class="btn btn-primary">Clean</a>
                                <button class="btn Update">Update</button>
                            </div>

                            
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
	</section>
@endsection