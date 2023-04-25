@extends('admin.html.Html')
@extends('admin.header.Header')
@extends('admin.navbar.nav')
@section('title','Dashboard')

<!-- css  -->
@section('css')
@vite(['resources/css/admin/navbar/Nav.css','resources/css/admin/Update.css'])
@endsection
<!-- js  -->
@section('js')
@vite(['resources/js/admin/navbar/Nav.js','resources/js/admin/Update.js'])
@endsection

@section('content')
    <section>
		<form action="">
			
			<div class="mt-2">
				<div  class="position-relative">
					<img src="/ImageUsers/{{$Person->Photo}}" alt="image-user">
					<input class="position-absolute inpute" type="file">
					<i class="fa-solid fa-image position-absolute"></i>
				</div>
			</div>

			<div class="mb-3">
				<label for="UserName" class="form-label">UserName:</label>
				<input type="text" class="form-control inpute" id="UserName" value='{{$Person->UserName}}'>
			</div>

			<div class="mb-3">
				<label for="Email" class="form-label">Email:</label>
				<input type="email" class="form-control inpute" id="Email" value='{{$Person->Email}}'>
			</div>

			<div class="mb-3">
				<label for="FullName" class="form-label">FullName:</label>
				<input type="text" class="form-control inpute" id="FullName" value='{{$Person->FullName}}'>
			</div>

			<div class="mb-3">
				<label for="Telf" class="form-label">Telf:</label>
				<input type="text" class="form-control inpute" id="Telf" value='{{$Person->Telf}}'>
			</div>

			<div class="mb-3">
				<label for="Country" class="form-label">Country:</label>
				<select class="form-select inpute" aria-label="Default select example">
					<option value='Morroco' selected>Morroco</option>
				</select>
			</div>

			<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label labels mb-0"><span class="position-relative">*</span>Regions</label>
				<select class="form-select form-select mt-2 inpute" name='Regions'>
                                <option selected disabled></option>
                                <option @if($Person['Regions'] == "Tanger-Tetouan-Al Hoceima") selected  @endif value="1">Tanger-Tetouan-Al Hoceima</option>
                                <option @if($Person['Regions'] == "l'Oriental") selected  @endif value="2">l'Oriental</option>
                                <option @if($Person['Regions'] == "Fès-Meknès") selected  @endif value="3">Fès-Meknès</option>
                                <option @if($Person['Regions'] == "Rabat-Salé-Kénitra") selected  @endif value="4">Rabat-Salé-Kénitra</option>
                                <option @if($Person['Regions'] == "Béni Mellal-Khénifra") selected  @endif value="5">Béni Mellal-Khénifra</option>
                                <option @if($Person['Regions'] == "Casablanca-Settat") selected  @endif value="6">Casablanca-Settat</option>
                                <option @if($Person['Regions'] == "Marrakesh-Safi") selected  @endif value="7">Marrakesh-Safi</option>
                                <option @if($Person['Regions'] == "Drâa-Tafilalet") selected  @endif value="8">Drâa-Tafilalet</option>
                                <option @if($Person['Regions'] == "Souss-Massa") selected  @endif value="9">Souss-Massa</option>
                                <option @if($Person['Regions'] == "Guelmim-Oued Noun") selected  @endif value="10">Guelmim-Oued Noun</option>
                                <option @if($Person['Regions'] == "Laâyoune-Sakia El Hamra") selected  @endif value="11">Laâyoune-Sakia El Hamra</option>
                                <option @if($Person['Regions'] == "Dakhla-Oued Ed-Dahab") selected  @endif value="12">Dakhla-Oued Ed-Dahab</option>
                            </select>
				<div class="form-text text-danger"></div>
			</div>

			<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label mb-0"><span class="position-relative">*</span>city</label>
				<select class="form-select form-select mt-2 inpute" name='city' data='{{$Person->city}}'></select>
				<div class="form-text text-danger"></div>
			</div>

			<div class="mb-3">
				<label for="Address" class="form-label">Address</label>
				<textarea class="form-control inpute" id="Address">{{$Person->Address}}</textarea>
			</div>

			<div class="mb-3">
				<button type="submite" class="btn btn-success float-end me-4 Update" >Update</button>
			</div>

		</form>
	</section>
@endsection