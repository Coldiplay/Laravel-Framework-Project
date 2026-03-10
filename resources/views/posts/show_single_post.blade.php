@extends('layout')

@section('content')
    {{--}} TODO: Доделать информацию о пользователе в посте {{--}}
    @if(Auth::user()->role == 'admin')
        <div class="col-md-9">
            @include('blocks.single_full_post')
        </div>

        <div class="col-md-3">
            @include('blocks.user_info')
        </div>
    @else
        @include('blocks.single_full_post')
    @endif

@endsection
