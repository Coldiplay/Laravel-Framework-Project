<div class="single-post">
    <div class="blog-img">
        <img src="" class="img-responsive">
        {{--}}
        <a href="/posts/{{ $post->id }}">
             <!-- src="{@{ post.image_path }}" -->
        </a>
        {{--}}
    </div>
    <h2 class="blog-title">{{ $post->title }}</h2>
    <div class="blog-meta">{{ $post->created_at }}
        <a href="">(3) Comments</a>
    </div>
    <p>{{ implode(' ', array_slice(explode(' ', $post->content), 0, 20)) }}...</p>
    <div class="blog-btn">
        <a href="/posts/{{ $post->slug }}" class="btn-default">Подробнее</a>
        {{--}}
        <div class="img-inline">
            <img src="{{ $post.author_image }}">
            <a href="#">{{ $post.author }}</a>
        </div>
        {{--}}
    </div>
</div>
