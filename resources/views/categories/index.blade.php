@extends('layout')

@section('content')

    <div class="col-sm-12">
        @include("blocks.categories_side_bar")
    </div>


    {{--}} @foreach($posts as $post)
        @include('blocks.single_article')
    @endforeach

    <div class="col-sm-8">
        @section('nav_pages')
            @include("blocks.nav_pages")
        @show
    </div>

    <div class="col-sm-4">
        @section('sideBar')
            @include("blocks.categories_side_bar")
        @show
    </div>
    {{--}}

@endsection
