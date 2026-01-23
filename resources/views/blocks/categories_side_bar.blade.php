<!-- @ section -->
<div class="blog-post">
    <h2>Categories</h2>
    <ul class="category-post">
        @section('categories')
            @foreach ($categories as $category)
                <li>
                    <a href="404"> <!-- href="@{{ category.path }}"> -->
                        <div class="inline-text">
                            <i class="glyphicon glyphicon-play blue-text"></i>
                            <h4>{{$category->title}}</h4>
                            <div class="margin-left-auto blue-text">
                                <span><!--@{{category.articlesCount}}--></span>
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach
        @show
        <!--   <?php // echo $categoriesData; ?> -->
    </ul>
</div>
