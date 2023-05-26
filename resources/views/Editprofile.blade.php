@extends('html.Html')
@extends('headerandfooter/Header')
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
			<div>
				<div  class="position-relative">
					<img src="/ImageUsers/{{$Person->Photo}}" alt="image-user">
					<input class="position-absolute inpute" name='image' type="file">
					<i class="fa-solid fa-image position-absolute"></i>
				</div>
			</div>

			<div>
				<label for="UserName" class="form-label mb-0"><span class="position-relative text-danger">*</span>UserName:</label>
				<input type="text" name='UserName' class="form-control inpute" id="UserName" value='{{$Person->UserName}}'>
                <div class='text-danger ms-2 mt-0'></div>
			</div>

			<div>
				<label for="Email" class="form-label mb-0"><span class="position-relative text-danger">*</span>Email:</label>
				<input type="email" name='Email' class="form-control inpute" id="Email" value='{{$Person->Email}}'>
                <div class='text-danger ms-2 mt-0'></div>
			</div>

			<div>
				<label for="FullName" class="form-label mb-0">FullName:</label>
				<input type="text" name='FullName' class="form-control inpute" id="FullName" value='{{$Person->FullName}}'>
			</div>

			<div>
				<label for="Telf" class="form-label mb-0">Telf:</label>
				<input type="text" name='Telf' class="form-control inpute" id="Telf" value='{{$Person->Telf}}'>
			</div>

			<div>
				<label for="Country" class="form-label mb-0">Country:</label>
				<select class="form-select inpute" aria-label="Default select example">
					<option value='Morroco'  selected>Morroco</option>
				</select>
                <div class='text-danger'></div>
			</div>

			<div>
				<label for="exampleInputEmail1" class="form-label labels mb-0">Regions</label>
				<select class="form-select form-select inpute" name='Regions'>
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

			<div>
				<label for="exampleInputEmail1" class="form-label mb-0">city</label>
				<select class="form-select form-select inpute" name='city' data='{{$Person->city}}'></select>
				<div class="form-text text-danger"></div>
			</div>

			<div>
				<label for="Address" class="form-label mb-0">Address</label>
				<textarea class="form-control inpute" row='1' name='Address' id="Address">{{$Person->Address}}</textarea>
			</div>

			<div>
				<button type="button" class="btn btn-success float-end me-4" >Update</button>
			</div>

		</form>
	</section>
@endsection