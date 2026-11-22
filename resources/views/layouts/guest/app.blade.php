<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Studiova')</title>
    @include('layouts.guest.css')
    @stack('css')
</head>

<body>

    @include('layouts.guest.header')

    <!--  Page Wrapper -->
    <div class="page-wrapper overflow-hidden">
        @yield('content')
    </div>

    @include('layouts.guest.footer')

    @include('layouts.guest.js')
    @stack('scripts')
</body>

</html>
