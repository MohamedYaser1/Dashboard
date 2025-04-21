<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.head')
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
    @include('layout.navbar')

    @yield('body')

    @include('layout.js')
</body>

</html>