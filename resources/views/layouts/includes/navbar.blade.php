<style>

/* Custom Navbar Styling */
.navbar {
     font-family: sans-serif;
    background-color: #ffffff; /* White background with a shadow for depth */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.nav-link {
    color: #007bff !important; /* Bootstrap primary blue for links */
    transition: color 0.3s ease-in-out;
}

.nav-link:hover, .nav-link:focus {
    color: #0056b3 !important; /* Darker blue on hover */
}

.navbar-brand {
    color: #212529 !important; /* Bootstrap's default color for text */
    font-weight: normal;
    padding: 6px 12px;
}

.active{
    background-color :#f4f4f4;
}

.navbar-toggler {
    border-color: #007bff; /* Blue border color for the toggle button */
}

.navbar-toggler-icon {
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba(0, 123, 255, 0.7)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E"); /* SVG for the toggle icon colored blue */
}

.dropdown-menu {
    border-color: #007bff; /* Consistent blue theme for dropdown */
}
.user-logged-in{
    font-size: 18px;
    text-transform: uppercase;
}

.dropdown-item:focus, .dropdown-item:hover {
    background-color: #f8f9fa; /* Light background on hover for dropdown items */
}

.dropdown-item:active {

    color: white;
    background-color: #007bff; /* Blue background for active dropdown item */
}

</style>

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                   Home
                </a>

                @if (Auth::user())
                <a class="navbar-brand {{ request()->is('showRecords') ? 'active' : '' }}" href="{{ url('/showRecords') }}">
                   My Records
                </a>
                <a class="navbar-brand {{ request()->is('addRecord') ? 'active' : '' }}" href="{{ url('/addRecord') }}">
                   Add New Record
                </a>
                @endif


                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle user-logged-in" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                 Hi   {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
