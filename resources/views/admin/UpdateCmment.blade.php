@extends('admin.html.Html')
@extends('admin.header.Header')
@extends('admin.navbar.nav')
@section('title','UpdateCmment')

<!-- css  -->
@section('css')
@vite(['resources/css/admin/navbar/Nav.css','resources/css/admin/UpdateCmment.css'])
@endsection
<!-- js  -->
@section('js')
@vite(['resources/js/admin/navbar/Nav.js','resources/js/admin/UpdateCmment.js'])
@endsection

@section('content')
    <section>
        <article>
            <form method="POST" action="{{ route('comment.update', ['id' => $Comment->id_comment]) }}">
                @csrf
                <div>
                    <label for="Restaurant" class="form-label mb-0"><span class="position-relative text-danger" >*</span>User Name :</label>
                    <select class="form-select selecte" aria-label="Default select" name="UserName">
                        <option disabled></option>
                        <option selected value="{{$Comment->Person->id_people}}" >{{$Comment->Person->UserName}}</option>
                    </select>
                    <div class='text-danger'></div>
                </div>

                <div>
                    <label for="Restaurant" class="form-label mb-0"><span class="position-relative text-danger" >*</span>Restaurant :</label>
                    <select class="form-select selecte" aria-label="Default select" name="Restaurant">
                        <option disabled></option>
                        <option selected value="{{$Comment->Restaurant->id_restaurant}}" >{{$Comment->Restaurant->NameRestaurant}}</option>
                    </select>
                    <div class='text-danger'></div>
                </div>

                <div>
                    <label for="Comment" class="form-label mb-0"><span class="position-relative text-danger" >*</span>Comment :</label>
                    <textarea class="form-control selecte" id="Comment" name="Comment">{{$Comment->comment}}</textarea>
                    <div id="Commentss" class="form-text text-danger"></div>
                </div>

                <div class="clearfix me-4 mt-2">
                    @if( $Person->User_Group == 'Manager' )
                        <a href="{{ url('/manager/comments')}}">
                            <button type="button" class="btn btn-danger float-end ms-2 ">Clear</button>
                        </a>
                    @else
                        <a href="{{ url('/admin/comments')}}">
                            <button type="button" class="btn btn-danger float-end ms-2 ">Clear</button>
                        </a>
                    @endif
                    <button type="submit" class="btn btn-success Comment float-end">Update Comment</button>
                </div>

            </form>
        </article>
    </section>
@endsection