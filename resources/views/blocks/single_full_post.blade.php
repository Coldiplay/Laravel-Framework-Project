<div class="single-post">
    <div class="blog-img">
        <img src="" class="img-responsive">
        {{--}}
        <a href="/posts/{{ $post->slug }}">
             <!-- src="{@{ article.image_path }}" -->
        </a>
        {{--}}
    </div>
    <h2 class="blog-title">{{ $post->title }}</h2>
    <div class="blog-meta">
        {{ $post->created_at }}
        <a href="">(3) Comments</a>
    </div>
    <p>{{$post->content }}</p>

        <div class="img-inline">
            {{--}}  <img src="{{ $post.author_image }}">    {{--}}
            <a href="#">{{ $post->user->name }}</a>
        </div>
    @can('update-post')
        <a href="{{ route('posts.update_form', $post) }}" class="btn btn-sm btn-primary">Edit</a>
    @endcan

    @can('post-kill')
        <form action="{{ route('posts.kill', $post->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger"
                    onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
        </form>
    @endcan

</div>
