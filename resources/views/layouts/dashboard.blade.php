<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('custom.meta')

    <title>@yield('title', 'Dashbord') | Scrabit</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('global/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/admin.css') }}">
    @yield('custom.css')

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('global/fontawesome/css/all.min.css') }}">
    @yield('custom.fonts')
</head>
<body class="sidebar-mini">
    <div id="dashboard" @yield('data.sets')>
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <!-- Navbar -->
            @include('dashboard.partials.navbar')
            <!-- End Sidebar -->
            <!-- Sidebar -->
            @include('dashboard.partials.sidebar')
            <!-- End Sidebar -->
            <!-- Content -->
            <div class="main-content">

                <section class="section">
                    <div class="section-header">
                        <h1>@yield('title', 'Dashboard')</h1>
                    </div>

                    <div class="section-body">
                        <h2 class="section-title">@yield('section.title')</h2>
                        <p class="section-lead">@yield('section.lead')</p>

                        @yield('content')
                    </div>
                </section>

                @include('dashboard.partials.footer')
            </div>
        </div>
    </div>

    <script src="{{ asset('global/jquery.min.js') }}"></script>
    <script src="{{ asset('global/popper.js') }}"></script>
    <script src="{{ asset('global/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('global/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('admin/js/stisla.js') }}"></script>
    <script src="{{ asset('admin/js/scripts.js') }}"></script>
    <script src="{{ asset('admin/js/custom.js') }}"></script>
    <script src="{{ asset('admin/js/app.js') }}"></script>
    @yield('footer.scripts')
</body>
</html>