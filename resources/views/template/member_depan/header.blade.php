<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ url('img/logo/invofest_logo.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Invofest 2018</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('font-awesome/css/font-awesome.min.css') }}" />
    <!-- CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ url('css/normalize.css') }}" />	
    <link href="{{ url('css/app.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('css/animate.css') }}" />
    <link href="{{ url('css/styles.css') }}" rel="stylesheet" />
    @yield('mycss')
</head>
<body class="landing-page sidebar-collapse" data-spy="scroll" data-target=".navbar" data-offset="50">
    <!-- preloader -->
    <div class="preloader">
        <div class="loading">
            <img src="{{ url('img/logo/invofest_logo.png') }}" width="150">
            <p>sedang memuat ...</p>
        </div>
    </div>
    <!-- end preloader -->
    
