@extends('layout')

@section('content')

    @can('post-create')
        <a href="{{ route('posts.create') }}" class="btn btn-primary float-end">Create New Post</a>
    @endcan

    {{-- TODO: Сделать шаблон постов  --}}
    @foreach($posts as $post)
        @include('blocks.single_short_post')
    @endforeach

    {{ $posts->links() }}

@endsection
