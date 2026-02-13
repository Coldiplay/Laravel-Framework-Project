@extends('layout')

@section('content')
    <form method="POST" action="{{ route('posts.create') }}">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror"
                   id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control @error('content') is-invalid @enderror"
                      id="content" name="content" rows="5" required>{{ old('content') }}</textarea>
            @error('content')
            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create Post</button>
        <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
    </form>




@endsection
