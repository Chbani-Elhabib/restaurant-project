@extends('admin.html.Html')
@extends('admin.header.Header')
@extends('admin.navbar.nav')
@section('title','Dashboard')
@section('Contacts','active')

<!-- css  -->
@section('css')
@vite(['resources/css/admin/navbar/Nav.css','resources/css/admin/Comments.css'])
@endsection
<!-- js  -->
@section('js')
@vite(['resources/js/admin/navbar/Nav.js','resources/js/admin/Comments.js'])
@endsection

@section('content')
    <section class="Comments">

        <article>
            <div class="Add-Comments mt-4">
                <button type="button" class="btn btn-success">Add Comments</button>
            </div>
        </article>

        <article>
            <form method="POST" action="{{ url('/comment/stor') }}">
                @csrf
                <div>
                    <label for="Restaurant" class="form-label mb-0"><span class="position-relative text-danger" >*</span>User Name :</label>
                    <select class="form-select selecte" aria-label="Default select" name="UserName">
                        <option selected disabled></option>
                        @foreach( $Users as $User )
                        <option value="{{$User->id_people }}" >{{$User->UserName}}</option>
                        @endforeach
                    </select>
                    <div class='text-danger' ></div>
                </div>

                <div>
                    <label for="Restaurant" class="form-label mb-0"><span class="position-relative text-danger" >*</span>Restaurant :</label>
                    <select class="form-select selecte" aria-label="Default select" name="Restaurant">
                        <option selected disabled></option>
                        @foreach( $Restaurants as $Restaurant )
                        <option value="{{$Restaurant->id_restaurant}}" >{{$Restaurant->NameRestaurant}}</option>
                        @endforeach
                    </select>
                    <div class='text-danger' ></div>
                </div>

                <div>
                    <label for="Comment" class="form-label mb-0"><span class="position-relative text-danger" >*</span>Comment :</label>
                    <textarea class="form-control selecte" id="Comment" name="Comment"></textarea>
                    <div id="Commentss" class="form-text text-danger"></div>
                </div>

                <div class="clearfix me-4 mt-2">
                    <button type="submit" class="btn btn-success Comment float-end">Add Comment</button>
                </div>

            </form>
        </article>

        <article>
            <div class="content-body">
                <h2 class="text-primary font-w600 mb-0">Comments</h2>
            </div>
        </article>

        <article class="mb-2">
            @isset($Comments)
                @if($Comments->count())
                    <table id="example" class="table table-hover" >
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Name Restaurant</th>
                                @if( $Person->User_Group == 'Admin' )
                                <th style="width: 115.125px;">Best comments</th>
                                @endif
                                <th>...</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $Comments as $Comment )
                                <tr>

                                    <td class='d-flex align-items-center'>
                                        <div class='image-user'>
                                            <img src="/ImageUsers/{{$Comment->Person->Photo}}" alt="image-user">
                                        </div>
                                        <div class="ms-2">
                                            <h5 class='mb-0'>{{$Comment->Person->UserName}}</h5>
                                            <p class='mb-0'>{{$Comment->Person->Email}}</p>
                                        </div>
                                    </td>

                                    <td class="position-relative">
                                        <div class="position-absolute">
                                            <p class="mb-0">{{$Comment->Restaurant->NameRestaurant}}</p>
                                        </div>
                                    </td>

                                    @if( $Person->User_Group == 'Admin' )
                                        <td class="position-relative">
                                            <div class="toggle-btns position-absolute">
                                                <div class="toggle-btn mealss" data="{{$Comment->id_comment }}">
                                                    <input type="checkbox"  class="toggle-input">
                                                    <label  class="toggle-label @if($Comment->comment_active == 1) active @endif" @if($Comment->comment_active == 1) data="True" @endif></label>
                                                </div>
                                            </div>
                                        </td>
                                    @endif

                                    <td class="position-relative">
                                        <div class="position-absolute" data-show="{{$Comment->id_comment }}" >
                                            <img src="/image/eye.png" alt="eye" class="show">
                                            @if($Person->User_Group == 'Manager')
                                                <a href="/manager/comment/{{$Comment->id_comment}}/update"><img src="/image/update.png" alt="update"></a>
                                            @else
                                                <a href="/admin/comment/{{$Comment->id_comment}}/update"><img src="/image/update.png" alt="update"></a>
                                            @endif
                                            <img src="/image/delete.png" class="delete" alt="delete">
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center fs-5 opacity-25">You don't have Comments yet !</p>
                @endif
            @endisset
        </article>

    </section>
@endsection