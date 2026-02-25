@extends('layout')

@section('content')

    @can('post-create')
        <a href="{{ route('posts.create_form') }}" class="btn btn-primary float-end">Создать новый пост</a>
    @endcan

    @foreach($posts as $post)
        @include('blocks.single_short_post')
    @endforeach

    {{ $posts->links() }}

@endsection
