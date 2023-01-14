@extends('admin.html.Html')
@extends('admin.header.Header')
@extends('admin.navbar.nav')
@section('title','Dashboard')
@section('Contacts','active')

<!-- css  -->
@section('css')
@vite(['resources/css/admin/navbar/Nav.css','resources/css/admin/Contacts.css'])
@endsection
<!-- js  -->
@section('js')
@vite(['resources/js/admin/navbar/Nav.js','resources/js/admin/Contacts.js'])
@endsection

@section('content')
    <section class="Meals">
        <div class="Mealsborder"> 
            <article>

            </article>
        </div>
    </section>
@endsection