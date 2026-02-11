@extends('layout')

@section('content')

    <div class="col-sm-12">
        <div class="inline-text">
            <h4>{{$category->title}}</h4>
        </div>

        @if($category->updated_at > $category->created_at)
            <h5>Обновлено {{$category->created_at}}</h5>
        @else
            <h5>Создано {{$category->updated_at}}</h5>
        @endif


        @if($posts->count() > 0)
            <h4>Посты ({{$posts->count()}}):</h4>
            @foreach($posts as $post)
                @include('blocks.single_short_post')
            @endforeach
        @endif


    </div>

@endsection
