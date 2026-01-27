@extends('layout')

@section('content')

    <div class="col-sm-12">
        <div class="inline-text">
            <h4>{{$category->title}}</h4>
            <div class="margin-left-auto blue-text">
                <span><!--@{{category.articlesCount}}--></span>
            </div>
        </div>

        @if($category->updated_at > $category->created_at)
            <h5>Обновлено {{$category->created_at}}</h5>
        @else
            <h5>Создано {{$category->updated_at}}</h5>
        @endif


        {{--}} Поменять условие на проверку коллекции постов {{--}}
        @if(true)
            <h4>Посты:</h4>
        @endif


    </div>


@endsection
