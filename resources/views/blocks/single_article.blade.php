<div class="single-post">
    <div class="blog-img">
        <a href="/article/{{ $article.id }}">
            <img src="" class="img-responsive"> <!-- src="{@{ article.image_path }}" -->
        </a>
    </div>
    <h2 class="blog-title">{{ $article.title }}</h2>
    <div class="blog-meta">{{ $article.date_created }}
        <a href="">(3) Comments</a>
    </div>
    <p>{{ $article.content }}</p>
    <div class="blog-btn">
        <a href="/article/{{ $article.id }}" class="btn-default">Подробнее</a>
        <!-- <div class="img-inline"><img src="{{ $article.author_image }}"><a href="#">{{ $article.author }}</a> -->
        </div>
    </div>
</div>
