@extends('html.Html')
@extends('headerandfooter/Header')
@extends('headerandfooter/Footer')
@section('title','FAQ')

@section('meta')
<meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
@endsection

@section('script apis google')
<script src="https://apis.google.com/js/platform.js" async defer></script>
@endsection