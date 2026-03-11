@extends('layout')

@section('content')
    @can('isAdmin')
        <div class="col-md-9">
            @include('blocks.single_full_post')
        </div>

        <div class="col-md-3">
            @include('blocks.user_info')
        </div>
    @else
        @include('blocks.single_full_post')
    @endcan

@endsection
