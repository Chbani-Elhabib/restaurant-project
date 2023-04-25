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
    <section>
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

                    <h3 class="text-center">{{ __('Profile.Update') }}</h3>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="labele" >{{ __('Profile.UserName') }}</label>
                            <input type="text" name='UserName' class="form-control inpute" value="{{ $UpdateUser['UserName']}}">
                            <p class="text-danger"></p>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-0">
                            <label class="labele">{{ __('Profile.Email') }}</label>
                            <input type="text" name="Email" class="form-control inpute" value="{{ $UpdateUser['Email']}}">
                            <p class="text-danger"></p>
                        </div>
                    </div>

                    <div class="toggle-btns">
                        <div class="toggle-btn mealss">
                            <input type="checkbox"  class="toggle-input">
                            <label  class="toggle-label @if($UpdateUser['Verif_Email'] == 1 ) active @endif"></label>
                        </div>
                        <label class="form-check-label ms-2">{{ __('Profile.Verif_Email') }}</label>
                    </div>



                    <div class="col-md-12">
                        <div class="form-group mb-0">
                            <label>{{ __('Profile.UpdatePassword') }}</label>
                            <input type="text" name="Password" class="form-control inpute">
                            <p class="text-danger"></p>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-0">
                            <label class="labele">{{ __('Profile.Config-Password') }}</label>
                            <input type="text" class="form-control inpute">
                            <p class="text-danger"></p>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-0">
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

                    
                    <div class="toggle-btns">
                        <div class="toggle-btn mealss">
                            <input type="checkbox"  class="toggle-input">
                            <label  class="toggle-label @if($UpdateUser['Verif_Telf'] == 1 ) active @endif"></label>
                        </div>
                        <label class="form-check-label ms-2">{{ __('Profile.Verif_Telf') }}</label>
                    </div>



                    <div class="col-md-12">
                        <select class="form-control mt-2 form-select form-select mb-3 inpute" name='User_Group'>
                            <option value="User" @if($UpdateUser['User_Group'] == "User") selected ; @endif >User</option>
                            <option value="Liverour" @if($UpdateUser['User_Group'] == "Liverour") selected ; @endif>Liverour</option>
                            <option value="Manager" @if($UpdateUser['User_Group'] == "Manager") selected ; @endif>Manager</option>
                            <option value="Chef" @if($UpdateUser['User_Group'] == "Chef") selected ; @endif>Chef</option>
                            <option value="Admin" @if($UpdateUser['User_Group'] == "Admin") selected ; @endif>Admin</option>
                        </select>
                    </div>

                    <div>

                        <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label labels mb-0"><span class="position-relative text-danger">*</span>Country</label>
                            <select class="form-select form-control form-select mt-1 inputevalue mt-2 inpute" name='Country'>
                                <option value='Morroco'>Morroco</option>
                            </select>
                            <div class="form-text text-danger"></div>
                        </div>

                        <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label labels mb-0"><span class="position-relative text-danger">*</span>Regions</label>
                            <select class="form-select form-select mt-2 Regions inpute" name='Regions'>
                                <option selected disabled></option>
                                <option @if($UpdateUser['Regions'] == "Tanger-Tetouan-Al Hoceima") selected  @endif value="1">Tanger-Tetouan-Al Hoceima</option>
                                <option @if($UpdateUser['Regions'] == "l'Oriental") selected  @endif value="2">l'Oriental</option>
                                <option @if($UpdateUser['Regions'] == "Fès-Meknès") selected  @endif value="3">Fès-Meknès</option>
                                <option @if($UpdateUser['Regions'] == "Rabat-Salé-Kénitra") selected  @endif value="4">Rabat-Salé-Kénitra</option>
                                <option @if($UpdateUser['Regions'] == "Béni Mellal-Khénifra") selected  @endif value="5">Béni Mellal-Khénifra</option>
                                <option @if($UpdateUser['Regions'] == "Casablanca-Settat") selected  @endif value="6">Casablanca-Settat</option>
                                <option @if($UpdateUser['Regions'] == "Marrakesh-Safi") selected  @endif value="7">Marrakesh-Safi</option>
                                <option @if($UpdateUser['Regions'] == "Drâa-Tafilalet") selected  @endif value="8">Drâa-Tafilalet</option>
                                <option @if($UpdateUser['Regions'] == "Souss-Massa") selected  @endif value="9">Souss-Massa</option>
                                <option @if($UpdateUser['Regions'] == "Guelmim-Oued Noun") selected  @endif value="10">Guelmim-Oued Noun</option>
                                <option @if($UpdateUser['Regions'] == "Laâyoune-Sakia El Hamra") selected  @endif value="11">Laâyoune-Sakia El Hamra</option>
                                <option @if($UpdateUser['Regions'] == "Dakhla-Oued Ed-Dahab") selected  @endif value="12">Dakhla-Oued Ed-Dahab</option>
                            </select>
                            <div class="form-text text-danger"></div>
                        </div>

                        <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label mb-0"><span class="position-relative text-danger">*</span>city</label>
                            <select class="form-select form-select mt-2 city inpute" data="{{$UpdateUser['city']}}" name='city'></select>
                            <div class="form-text text-danger"></div>
                        </div>

                    </div>


                    <div class="btnbutton">
                        <a href="{{ url('/admin/users') }}" class="btn btn-primary float-end ms-2">Clean</a>
                        <button class="btn Update float-end me-3">Update</button>
                    </div>

                </form>
            </div>
	</section>
@endsection