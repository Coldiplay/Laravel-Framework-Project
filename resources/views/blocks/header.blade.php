@section('header')
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!--<title>  @{{title}} </title>-->
        <link rel="shortcut icon" href="/assets/images/favicon.png" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet" type="text/css">

        @vite([
                'resources/assets/front/css/icons.css',
                'resources/assets/front/ie7/ie7.css',
                'resources/assets/front/css/style.css'
                ])
        {{--}}
        <link href="assets/front/css/icons.css" rel="stylesheet" type="text/css">
        <!--[if lt IE 8]><!-->
        <link rel="stylesheet" href="/assets/front/ie7/ie7.css">
        <!--<![endif]-->
        <link href="/assets/front/css/style.css" rel="stylesheet" type="text/css">
        {{--}}

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
@endsection
