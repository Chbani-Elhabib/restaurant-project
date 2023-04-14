@extends('html.Html')
@extends('headerandfooter/Header')
@extends('headerandfooter/Footer')
@section('title','Editprofile')

@section('css')
@vite(['resources/css/Editprofile.css' ])
@endsection

@section('js')
<script defer src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@vite(['resources/js/Editprofile.js'])
@endsection


@section('contant')
    <section>
		<form action="{{ url('/users/update') }}" method="POST" enctype="multipart/form-data">
            @csrf
			<div class="mt-2">
				<div  class="position-relative">
					<img src="/ImageUsers/{{$Person->Photo}}" alt="image-user">
					<input class="position-absolute inpute" name='image' type="file">
					<i class="fa-solid fa-image position-absolute"></i>
				</div>
			</div>

			<div class="">
				<label for="UserName" class="form-label">UserName:</label>
				<input type="text" name='UserName' class="form-control inpute" id="UserName" value='{{$Person->UserName}}'>
                <div class='text-danger'></div>
			</div>

			<div class="">
				<label for="Email" class="form-label">Email:</label>
				<input type="email" name='Email' class="form-control inpute" id="Email" value='{{$Person->Email}}'>
                <div class='text-danger'></div>
			</div>

			<div class="">
				<label for="FullName" class="form-label">FullName:</label>
				<input type="text" name='FullName' class="form-control inpute" id="FullName" value='{{$Person->FullName}}'>
			</div>

			<div class="">
				<label for="Telf" class="form-label">Telf:</label>
				<input type="text" name='Telf' class="form-control inpute" id="Telf" value='{{$Person->Telf}}'>
			</div>

			<div class="">
				<label for="Country" class="form-label">Country:</label>
				<select class="form-select inpute" aria-label="Default select example">
					<option value='Morroco'  selected>Morroco</option>
				</select>
                <div class='text-danger'></div>
			</div>

			<div class="">
				<label for="exampleInputEmail1" class="form-label labels mb-0">Regions</label>
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

			<div class="">
				<label for="exampleInputEmail1" class="form-label mb-0">city</label>
				<select class="form-select form-select mt-2 inpute" name='city' data='{{$Person->city}}'></select>
				<div class="form-text text-danger"></div>
			</div>

			<div class="">
				<label for="Address" class="form-label">Address</label>
				<textarea class="form-control inpute" name='Address' id="Address">{{$Person->Address}}</textarea>
			</div>

			<div class="mb-3">
				<button type="button" class="btn btn-success float-end me-4" >Update</button>
			</div>

		</form>
	</section>
@endsection