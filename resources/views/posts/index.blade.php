@extends('layout')

@section('content')

    {{--} TODO: Сделать шаблон постов  {{--}}
    @foreach($posts as $post)
        @include('blocks.single_short_post')
    @endforeach

@endsection
