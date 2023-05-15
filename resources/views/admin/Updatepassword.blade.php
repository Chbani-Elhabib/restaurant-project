@extends('admin.html.Html')
@extends('admin.header.Header')
@extends('admin.navbar.nav')
@section('title','Dashboard')

<!-- css  -->
@section('css')
@vite(['resources/css/admin/navbar/Nav.css','resources/css/admin/Updatepassword.css'])
@endsection
<!-- js  -->
@section('js')
@vite(['resources/js/admin/navbar/Nav.js','resources/js/admin/Updatepassword.js'])
@endsection

@section('content')
    <section>
		<form action="{{ url('/users/updatepassword') }}" method="POST" >

			@csrf

			<div class="position-relative mb-2">
				<label for="UserName" class="form-label mb-0">Password :</label>
				<input type="password" class="form-control inpute" >
				<img class="eye position-absolute" src="/image/close_eye.png" alt="eye">
				<div class="text-danger"></div>
			</div>

			<div class="mb-2">
				<label for="UserName" class="form-label mb-0">New password :</label>
				<input type="password" class="form-control inpute" name='password' >
				<div class="text-danger"></div>
			</div>

			<div class="mb-2">
				<label for="UserName" class="form-label mb-0">Config password :</label>
				<input type="password" class="form-control inpute" >
				<div class="text-danger"></div>
			</div>

			<div class=" mt-2 clearfix">
				<button type="submite" class="btn btn-success float-end me-2 Updatepassword" >Update password</button>
			</div>

		</form>
	</section>
@endsection