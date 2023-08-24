<header>
    <nav class="navbar navbar-expand-lg">
      <a class="navbar-brand" href="#"><img src="{{asset('assets/dashboard/image/logo-on-learn.png')}}" alt="" style="height: 26px"></a>
      <i class="fas fa-bars" id="sidebarToggle"></i>
      <div class="dropdown ml-auto">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          {{Auth::user()->name}}
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <button type="submit" class="dropdown-item" form="form-logout">logout</button>
          <form method="POST" action="{{route('dashboard.logout')}}" id="form-logout">
            {{ csrf_field() }}
        </form>
        </div>
      </div>
      </div>
    </nav>
  </header>
