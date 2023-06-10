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


                    <div>
                        <label class="labele mb-0" ><span class="position-relative text-danger" >*</span>{{ __('Profile.UserName') }} :</label>
                        <input type="text" name='UserName' class="form-control inpute" value="{{ $UpdateUser['UserName']}}">
                        <p class="text-danger"></p>
                    </div>

                    <div>
                        <label class="labele mb-0"><span class="position-relative text-danger" >*</span>{{ __('Profile.Email') }} :</label>
                        <input type="text" name="Email" class="form-control inpute" value="{{ $UpdateUser['Email']}}">
                        <p class="text-danger"></p>
                    </div>

                    <div>
                        <div class="toggle-btn mealss">
                            <input type="checkbox" @if($UpdateUser['Verif_Email'] == 1 ) checked @endif name='verifEmail'  class="toggle-input">
                            <label  class="toggle-label @if($UpdateUser['Verif_Email'] == 1 ) active @endif"></label>
                        </div>
                        <label class="form-check-label ms-2">{{ __('Profile.Verif_Email') }}</label>
                    </div>



                    <div>
                        <label class="labele mb-0"><span class="position-relative text-danger" >*</span>{{ __('Profile.UpdatePassword') }} :</label>
                        <input type="text" name="Password" class="form-control inpute">
                        <p class="text-danger"></p>
                    </div>

                    <div>
                        <label class="labele mb-0"><span class="position-relative text-danger" >*</span>{{ __('Profile.Config-Password') }} :</label>
                        <input type="text" class="form-control inpute">
                        <p class="text-danger"></p>
                    </div>

                    <div>
                        <div class="form-group mb-0">
                            <label class="labele mb-0">{{ __('Profile.Telf') }} :</label>
                            <div class="input-group mb-3">
                                <!-- <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">+212</span>
                                </div> -->
                                <input type="text" name="Telf" value="{{ $UpdateUser['Telf']}}" class="form-control inpute" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <p class="text-danger inputtelf"></p>
                        </div>
                    </div>

                    
                    <div>
                        <div class="toggle-btn mealss">
                            <input type="checkbox"  @if($UpdateUser['Verif_Telf'] == 1 ) checked @endif  name='verifTelf'   class="toggle-input">
                            <label  class="toggle-label @if($UpdateUser['Verif_Telf'] == 1 ) active @endif"></label>
                        </div>
                        <label class="form-check-label ms-2">{{ __('Profile.Verif_Telf') }}</label>
                    </div>



                    <div>
                        <label class="labele mb-0"><span class="position-relative text-danger" >*</span>Type-Users :</label>
                        <select class="form-control form-select form-select inpute" name='User_Group'>
                            <option value="User" @if($UpdateUser['User_Group'] == "User") selected ; @endif >User</option>
                            <option value="Liverour" @if($UpdateUser['User_Group'] == "Liverour") selected ; @endif>Liverour</option>
                            <option value="Manager" @if($UpdateUser['User_Group'] == "Manager") selected ; @endif>Manager</option>
                            <option value="Chef" @if($UpdateUser['User_Group'] == "Chef") selected ; @endif>Chef</option>
                            <option value="Admin" @if($UpdateUser['User_Group'] == "Admin") selected ; @endif>Admin</option>
                        </select>
                        <div class="form-text text-danger"></div>
                    </div>

                    <div>

                        <div>
                            <label for="exampleInputEmail1" class="form-label labels mb-0"><span class="position-relative text-danger">*</span>Country :</label>
                            <select class="form-select form-control form-select inputevalue inpute" name='Country'>
                                <option value='Morroco'>Morroco</option>
                            </select>
                            <div class="form-text text-danger"></div>
                        </div>

                        <div>
                            <label for="exampleInputEmail1" class="form-label labels mb-0"><span class="position-relative text-danger">*</span>Regions :</label>
                            <select class="form-select form-select Regions inpute" name='Regions'>
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

                        <div>
                            <label for="exampleInputEmail1" class="form-label mb-0"><span class="position-relative text-danger">*</span>city :</label>
                            <select class="form-select form-select city inpute" data="{{$UpdateUser['city']}}" name='city'></select>
                            <div class="form-text text-danger"></div>
                        </div>

                    </div>

                    <div class="">
                        <label for="exampleInputEmail1" class="form-label mb-0">Address :</label>
                        <textarea name="Address" class="form-control input_add_user" id="exampleFormControlTextarea1" rows="1" placeholder="Address"></textarea>                            
                        <div id="emailHelp" class="form-text"></div>
                    </div>


                    <div class="btnbutton mt-2 mb-2 me-3">
                        <button class="btn btn-success Update float-end me-3 ms-3">Update</button>
                        <a href="{{ url('/admin/users') }}" class="btn btn-danger float-end">Clean</a>
                    </div>

                </form>
            </div>
	</section>
@endsection