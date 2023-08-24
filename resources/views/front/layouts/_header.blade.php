<header>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="{{ asset('assets/front/image/logo-on-learn.png') }}" alt=""
                    style="width: 150px;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('levels.index') }}">levels</a>
                    </li>
                </ul>
                <a class="btn btn-outline-primary my-2 mr-md-2" href="{{ route('dashboard.login') }}">Admin Dashboard</a>
                @guest
                    <a class="btn btn-outline-primary my-2 mr-md-2" href="{{ route('login') }}">Sign in & Sign
                        up</a>
                @else
                    <!-- start dropdown user -->
                    <div class="dropdown">
                        <a class="text-white nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('profile.index')}}">Profile</a>
                            <a class="dropdown-item" href="{{route('grades.index')}}">Grades</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                    <!-- end dropdown user./ -->
                @endguest
            </div>
        </div>
    </nav>
</header>
