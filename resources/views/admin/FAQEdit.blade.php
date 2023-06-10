@extends('admin.html.Html')
@extends('admin.header.Header')
@extends('admin.navbar.nav')
@section('title','FAQ Edit')

<!-- css  -->
@section('css')
@vite(['resources/css/admin/navbar/Nav.css','resources/css/admin/FAQEdit.css'])
@endsection
<!-- js  -->
@section('js')
@vite(['resources/js/admin/navbar/Nav.js','resources/js/admin/FAQEdit.js'])
@endsection

@section('content')
    <article>
        <form method="POST" action="/FAQ/{{$FAQ->id_faq}}/update">
            @csrf

            <div class="mb-1">
                <label for="Restaurant" class="form-label mb-0">Langue :</label>
                <select class="form-select Langue" aria-label="Default select" name="Langue">
                    <option disabled></option>
                    <option value="English" @if($FAQ->Language == 'English' ) selected @endif >English</option>
                    <option value="Arabic" @if($FAQ->Language == 'Arabic' ) selected @endif >Arabic</option>
                </select>
                <div class='text-danger' ></div>
            </div>

            <div class="mb-1">
                <label for="title" class="form-label mb-0">title FAQ :</label>
                <input type="text" class="form-control Langue" id="title" name="title" value="{{$FAQ->title}}" >
                <div id="titles" class="form-text text-danger  ms-2"></div>
            </div>
            
            <div class="mb-1">
                <label for="body" class="form-label mb-0">body FAQ :</label>
                <textarea class="form-control Langue" id="body" name="body">{{$FAQ->body}}</textarea>
                <div id="bodys" class="form-text text-danger ms-2"></div>
            </div>

            <div class="clearfix me-4">
                <button type="submit" class="btn addfaq btn-success float-end">Update Comment</button>
                <a href="/admin/faq">
                    <button type="button" class="btn btn-danger float-end">Clear</button>
                </a>
            </div>

        </form>
    </article>
@endsection
