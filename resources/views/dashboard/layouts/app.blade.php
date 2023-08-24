<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Varbalix</title>
    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <link rel="icon" type="image/x-icon" href="{{asset('assets/dashboard/image/logo-on-learn.png')}}">
    <!-- Bootstrab 4 -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/style.css') }}">
</head>

<body>
    <!--******************
      start header
    **********************-->
    @include('dashboard.layouts._header')
    <!--********************
       end header
      **********************-->

    <!--********************
      start sidebar
    ************************-->
    @include('dashboard.layouts._sidebar')
    <!--********************
      end sidebar
    ************************-->

    <!--********************
      start content
    ************************-->
    @yield('content')
    <!--*******************
      end content
    ***********************-->

    <!--*******************
      start footer
    ***********************-->
    <footer>
        <div class="copyright">
            <p><a href="https://saicopy.com">CopyRight@Saicopy</a></p>
        </div>
    </footer>
    <!--******************
      end footer
    **********************-->
    @stack('modal')
    <script src="{{ asset('assets/dashboard/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/dashboard/js/main.js') }}"></script>
    @stack('js')
    @include('dashboard.partials._errors')
    @include('dashboard.partials._session')
</body>

</html>
