<!--
@section('navPages')
    <div class="text-center">
        <ul class="pagination ins-page">
            @if ($pageslength > 0)
                <li><a href="#">Previous</a></li>
                @set count = 1 %}
                {% for page in pages %}
                    <li><a href="{{ $page.path }}">{{ $count }}</a></li>
                    {% set count = count + 1 %}
                {% endfor %}
                <li><a href="#">Next</a></li>
            @endif
            <!5--
    {#        <li><a href="#">1</a></li>#}
    {#        <li><a href="#">2</a></li>#}
    {#        <li><a href="#">3</a></li>#} --5>
        </ul>
    </div>
@endsection
-->
