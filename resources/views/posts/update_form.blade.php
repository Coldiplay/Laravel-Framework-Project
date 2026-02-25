@extends('layout')

@section('content')
    <form method="POST" action="{{ route('posts.update', $post) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror"
                   id="title" name="title" value="{{ old('title', $post->title) }}" required>
            @error('title')
            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category_id">Категория:</label>
            <select name="category_id" id="category_id" class="form-control" required>
                @foreach($categories as $category)

                        <option value="{{ $category->id }}" @if($category->id == $post->category_id) selected @endif>{{ $category->title }} </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control @error('content') is-invalid @enderror"
                      id="content" name="content" rows="5" required>{{ old('content', $post->content) }}</textarea>
            @error('content')
            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Сохранить</button>
        <a href="{{ route('posts.all') }}" class="btn btn-secondary">Отмена</a>

    </form>




@endsection
