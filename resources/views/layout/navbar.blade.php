<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand" href="{{route('index')}}">Dashboard</a>
        <!-- Toggel button -->
        <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- SideBar -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Dashboard</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <!-- SideBar Body -->
            <div class="offcanvas-body d-flex flex-column flex-lg-row">
                <ul class="navbar-nav justify-content-center align-items-center fs-7 flex-grow-1 pe-0">
                    @auth
                    <li class="nav-item mx-2">
                        <a class="nav-link  @yield('home')" aria-current="page" href="{{route('index')}}">Home</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link @yield('posts')" href="{{route('posts.index') }}">Posts</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link @yield('admins')" href="{{route('admins.index') }}">Admins</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link @yield('users')" href="{{route('users.index') }}">Users</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link @yield('categories')" href="{{route('categories.index')}}">Categoties</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link @yield('countries')" href="{{route('countries.index')}}">Countries</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link @yield('cities')" href="{{route('cities.index')}}">Cities</a>
                    </li>
                    @endauth
                </ul>
                <!-- Login / Sign up -->
                <div class="d-flex flex-lg-row justify-content-center align-items-center">

                    @guest
                    <a href="{{route('login.show')}}" class="text-black mx-3">Login</a>
                    <a href="{{ route('signup.show') }}" class="btn bg-success text-white px-3 py-1 rounded-3">Register
                    </a>
                    @endguest


                    @auth
                    <span class="px-3 border-3">Hello, {{ Auth::user()->name }}</span>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">LogOut</button>
                    </form>
                    @endauth

                </div>
            </div>
        </div>
    </div>
</nav>