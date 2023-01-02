@extends('admin.html.Html')
@extends('admin.header.Header')
@extends('admin.navbar.nav')
@section('title','Dashboard')

<!-- css  -->
@section('css')
@vite(['resources/css/admin/navbar/Nav.css','resources/css/admin/Profile.css'])
@endsection
<!-- js  -->
@section('js')
@vite(['resources/js/admin/navbar/Nav.js','resources/js/admin/Profile.js'])
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
@endsection


@section('content')
    <section class="container">
        <div class="bg-white shadow rounded-lg d-block d-sm-flex">
            <div class="profile-tab-nav border-right">
                <div class="p-4">
                    <div class="img-circle text-center mb-3">
                        <div class="imageinpute">
                            <img src="/ImageUsers/{{ $Person['Photo']}}" alt="Image" class="shadow">
                            <div>
                                <i class="fa-solid fa-camera"></i>
                                <input type="file">
                            </div>
                        </div>
                    </div>
                    <h4 class="text-center">{{ $Person['UserName']}}</h4>
                </div>
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
                        <i class="fa fa-user text-center mr-1"></i> 
                        {{ __('Profile.MyProfile') }}
                    </a>
                    <a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
                        <i class="fa-solid fa-gear"></i>
                        {{ __('Profile.Update') }}
                    </a>
                    <a class="nav-link" id="security-tab" data-toggle="pill" href="#security" role="tab" aria-controls="security" aria-selected="false">
                        <i class="fa-solid fa-key"></i>
                        {{ __('Profile.UpdatePassword') }}
                    </a>
                    <a class="nav-link" id="application-tab" data-toggle="pill" href="#application" role="tab" aria-controls="application" aria-selected="false">
                        <i class="fa-solid fa-circle-check"></i>
                        {{ __('Profile.Verif_Email') }}
                    </a>
                    <a class="nav-link" id="notification-tab" data-toggle="pill" href="#notification" role="tab" aria-controls="notification" aria-selected="false">
                        <i class="fa-solid fa-circle-check"></i> 
                        {{ __('Profile.Verif_Telf') }}
                    </a>
                </div>
            </div>
            <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                    <h1 class="mb-4">{{ __('Profile.MyProfile') }}</h1>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <h4>{{ __('Profile.UserName') }}</h4>
                                <h6>-{{ $Person['UserName']}}</h6>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <h4>{{ __('Profile.Email') }}</h4>
                                <h6>-{{ $Person['Email']}}</h6>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <h4>{{ __('Profile.Telf') }}</h4>
                                <h6>-{{ $Person['Telf']}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                    <h3 class="mb-4">{{ __('Profile.Update') }}</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ __('Profile.MyProfile') }}</label>
                                <input type="text" class="form-control" value="{{ $Person['UserName']}}" >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ __('Profile.Email') }}</label>
                                <input type="text" class="form-control" value="{{ $Person['Email']}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ __('Profile.Telf') }}</label>
                                <input type="text" class="form-control" value="{{ $Person['Telf']}}">
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary">Update</button>
                    </div>
                </div>
                <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                    <h3 class="mb-4">{{ __('Profile.UpdatePassword') }}</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Old password</label>
                                <input type="password" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>New password</label>
                                <input type="password" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Confirm new password</label>
                                <input type="password" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary">Update</button>
                        <button class="btn btn-light">Cancel</button>
                    </div>
                </div>
                <div class="tab-pane fade" id="application" role="tabpanel" aria-labelledby="application-tab">
                    <h3 class="mb-4">{{ __('Profile.Verif_Email') }}</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="app-check">
                                    <label class="form-check-label" for="app-check">
                                    App check
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
                                    <label class="form-check-label" for="defaultCheck2">
                                    Lorem ipsum dolor sit.
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary">Update</button>
                        <button class="btn btn-light">Cancel</button>
                    </div>
                </div>
                <div class="tab-pane fade" id="notification" role="tabpanel" aria-labelledby="notification-tab">
                    <h3 class="mb-4">{{ __('Profile.Verif_Telf') }}</h3>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="notification1">
                            <label class="form-check-label" for="notification1">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum accusantium accusamus, neque cupiditate quis
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="notification2" >
                            <label class="form-check-label" for="notification2">
                                hic nesciunt repellat perferendis voluptatum totam porro eligendi.
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="notification3" >
                            <label class="form-check-label" for="notification3">
                                commodi fugiat molestiae tempora corporis. Sed dignissimos suscipit
                            </label>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary">Update</button>
                        <button class="btn btn-light">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
	</section>
@endsection