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
		<form action="">
			


			<div class="mb-3">
				<label for="UserName" class="form-label">Password:</label>
				<input type="text" class="form-control" id="UserName">
			</div>

			<div class="mb-3">
				<label for="UserName" class="form-label">New password:</label>
				<input type="text" class="form-control" id="UserName">
			</div>

			<div class="mb-3">
				<label for="UserName" class="form-label">Config password:</label>
				<input type="text" class="form-control" id="UserName">
			</div>

			<div class="mb-3 clearfix">
				<button type="button" class="btn btn-success float-end me-4" >Update</button>
			</div>

		</form>
	</section>
@endsection