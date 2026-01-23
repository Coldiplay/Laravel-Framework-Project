<!DOCTYPE html>
<html lang="en">

@section('head')
    @include("blocks.header")
@show

<body data-spy="scroll" data-target=".navbar-fixed-top">
<header>
    @section('top_bar')
        @include("blocks.top_bar")
    @show

    @section('navbar')
        @include("blocks.navbar")
    @show

</header>
<div class="clear"></div>
<div id="page-content">

    <section class="breadcrumb">
        <div class="container">
            @yield('breadcrumb')
            {{--}}
            @section('breadcrumb')
            @endsection
            {{--}}
            <!--
            {#            <h2>Blog Page</h2>#}
            {#            <ul>#}
                {#                <li><a href="layout.twig">Home</a> ></li>#}
                {#                <li><a href="#">Blog Page</a></li>#}
                {#            </ul>#} -->
        </div>
    </section>

    <section class="blog-page">
        <div class="container">
            <div class="row">
                @yield('content')
                {{--}}
                @section('content')
                @endsection
                {{--}}
            </div>
        </div>
    </section>
</div>
<div class="clear"></div>

@section('footer')
    @include("blocks.footer")
@endsection

@section('java_script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-hover-dropdown/2.2.1/bootstrap-hover-dropdown.min.js"></script>

    @vite(['resources/assets/front/js/custom.js'])
    <!-- <script src="assets/js/custom.js"></script> -->
@show
</body>
</html>
