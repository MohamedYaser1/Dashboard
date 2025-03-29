<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.head')
</head>

<body>
    @include('layout.navbar')

    @yield('body')

    @include('layout.js')
</body>

</html>