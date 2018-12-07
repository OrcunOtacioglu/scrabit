<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | Scrabit</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('global/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('global/fontawesome/css/all.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
</head>

<body>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <img src="{{ asset('admin/img/stisla-fill.svg') }}" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>@yield('title')</h4>
                        </div>

                        <div class="card-body">
                            @yield('form-area')
                        </div>
                    </div>
                    <div class="simple-footer">
                        Copyright &copy; scrabit 2018
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- General JS Scripts -->
<script src="{{ asset('global/jquery.min.js') }}"></script>
<script src="{{ asset('global/popper.js') }}"></script>
<script src="{{ asset('global/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('global/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('admin/js/stisla.js') }}"></script>

<!-- Template JS File -->
<script src="{{ asset('admin/js/scripts.js') }}"></script>
<script src="{{ asset('admin/js/custom.js') }}"></script>
</body>
</html>