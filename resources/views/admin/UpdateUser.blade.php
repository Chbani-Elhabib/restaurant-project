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
    <section class="container up">
        <div class="bg-white shadowee rounded-lg d-block">
                <div class="profile-tab-nav border-right">
                    <div>
                        <div class="img-circle text-center">
                            <div class="imageinpute">
                                <div>
                                    <img src="/ImageUsers/{{ $UpdateUser['Photo']}}" alt="Image" class="shadow">
                                    <i class="fa-solid fa-camera"></i>
                                    <input type="file" class="fa-solidfa-camera">
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
                                    <input type="text" class="form-control inpute" value="{{ $UpdateUser['UserName']}}">
                                    <div class="text-danger"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="labele">{{ __('Profile.Email') }}</label>
                                    <input type="text" class="form-control inpute" value="{{ $UpdateUser['Email']}}">
                                    <div class="text-danger"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="form-check-input" type="checkbox" id="check1" name="option1"  @if($UpdateUser['Verif_Email'] == 1 ) checked ; @endif>
                                    <label class="form-check-label">{{ __('Profile.Verif_Email') }}</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('Profile.UpdatePassword') }}</label>
                                    <input type="text" class="form-control inpute">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="labele">{{ __('Profile.Config-Password') }}</label>
                                    <input type="text" class="form-control inpute">
                                    <div class="text-danger"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('Profile.Telf') }}</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">+212</span>
                                        </div>
                                        <input type="text" value="{{ $UpdateUser['Telf']}}" class="form-control inpute" aria-label="Username" aria-describedby="basic-addon1">
                                        <div class="text-danger"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="form-check-input" type="checkbox" id="check1" name="option1" value="something" @if($UpdateUser['Verif_Telf'] == 1 ) checked ; @endif>
                                    <label class="form-check-label">{{ __('Profile.Verif_Telf') }}</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <select class="form-group form-control">
                                    <option value="User" @if($UpdateUser['User_Group'] == "User") selected ; @endif >User</option>
                                    <option value="Liverour" @if($UpdateUser['User_Group'] == "Liverour") selected ; @endif>Liverour</option>
                                    <option value="Manager" @if($UpdateUser['User_Group'] == "Manager") selected ; @endif>Manager</option>
                                    <option value="Admin" @if($UpdateUser['User_Group'] == "Admin") selected ; @endif>Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="btnbutton">
                            <a href="{{ url('/admin/users') }}" class="btn btn-primary">Clean</a>
                            <button class="btn Update">Update</button>
                        </div>
                    </div>
            </div>
        </div>
	</section>
@endsection