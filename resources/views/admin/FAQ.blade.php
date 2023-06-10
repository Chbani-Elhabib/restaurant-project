@extends('admin.html.Html')
@extends('admin.header.Header')
@extends('admin.navbar.nav')
@section('title','FAQ')
@section('FAQ','active')

<!-- css  -->
@section('css')
@vite(['resources/css/admin/navbar/Nav.css','resources/css/admin/FAQ.css'])
@endsection
<!-- js  -->
@section('js')
@vite(['resources/js/admin/navbar/Nav.js','resources/js/admin/FAQ.js'])
@endsection

@section('content')
    <section class="faq">
      
        <article>
            <div class="Add-faq mt-4">
                <button type="button" class="btn btn-success">Add FAQ</button>
            </div>
        </article>

        <article>
            <form method="POST" action="{{ url('/FAQ/store') }}">
                @csrf

                <div class="mb-1">
                    <label for="Restaurant" class="form-label mb-0">Langue :</label>
                    <select class="form-select Langue" aria-label="Default select" name="Langue">
                        <option disabled></option>
                        <option value="English" selected >English</option>
                        <option value="Arabic" >Arabic</option>
                    </select>
                    <div class='text-danger' ></div>
                </div>

                <div class="mb-1">
                    <label for="title" class="form-label mb-0">title FAQ :</label>
                    <input type="text" class="form-control Langue" id="title" name="title" >
                    <div id="titles" class="form-text text-danger  ms-2"></div>
                </div>
                
                <div class="mb-1">
                    <label for="body" class="form-label mb-0">body FAQ :</label>
                    <textarea class="form-control Langue" id="body" name="body"></textarea>
                    <div id="bodys" class="form-text text-danger ms-2"></div>
                </div>

                <div class="clearfix me-4">
                    <button type="submit" class="btn addfaq btn-success float-end">Add Comment</button>
                </div>

            </form>
        </article>

        <article>
            <div class="content-body">
                <h2 class="text-primary font-w600 mb-0">FAQ</h2>
            </div>
        </article>

        <article>
            @isset($faqs)
                @if($faqs->count())
                    <table id="example" class="table table-hover" >
                        <thead>
                            <tr>
                                <th>title</th>
                                <th>Langue</th>
                                <th>...</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $faqs as $faq )
                                <tr>

                                    <td class="position-relative">
                                        <div class="position-absolute">
                                            <p class="mb-0">{{$faq->title}}</p>
                                        </div>
                                    </td>

                                    <td class="position-relative">
                                        <div class="position-absolute">
                                            <p class="mb-0">{{$faq->Language}}</p>
                                        </div>
                                    </td>

                                    <td class="position-relative">
                                        <div class="position-absolute" data="{{$faq->id_faq}}" >
                                            <img src="/image/eye.png" alt="eye" class="show">
                                            @if($Person->User_Group == 'Manager')
                                                <a href="/manager/faq/{{$faq->id_faq}}/edit"><img src="/image/update.png" alt="update"></a>
                                            @else
                                                <a href="/admin/faq/{{$faq->id_faq}}/edit"><img src="/image/update.png" alt="update"></a>
                                            @endif
                                            <img src="/image/delete.png" class="delete" alt="delete">
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center fs-5 opacity-25">You don't have orders yet !</p>
                @endif
            @endisset
        </article>

    </section>
@endsection

    