@extends('admin.html.Html')
@extends('admin.header.Header')
@extends('admin.navbar.nav')
@section('title','Dashboard')
@section('Dashboard','active')

<!-- css  -->
@section('css')
@vite(['resources/css/admin/navbar/Nav.css','resources/css/admin/Dashboard.css'])
@endsection
<!-- js  -->
@section('js')
@vite(['resources/js/admin/navbar/Nav.js','resources/js/admin/Dashboard.js'])
@endsection


@section('content')
<h1>Hello</h1>
@endsection