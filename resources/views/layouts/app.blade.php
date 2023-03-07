<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">


    <!-- Scripts -->
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt="Ảnh lỗi"> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span
                        class="nav_logo-name">BBBootstrap</span> </a>
                <div class="nav_list">
                    <a href="{{ auth()->user()->is_admin ? route('admin.user.index') : route('user.index') }}"
                        class="nav_link active">
                        <i class='bx bx-user nav_icon'></i>
                        <span class="nav_name">User</span>
                    </a>
                    <a href="{{ auth()->user()->is_admin ? route('admin.department.index') : route('department.index') }}"
                        class="nav_link">
                        <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Department</span>
                    </a>
                </div>
            </div>
            <div>
                <a href="{{ route('logout') }}" class="nav_link"
                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="" style="margin-top: 100px">
        @yield('content')
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>

</html>
