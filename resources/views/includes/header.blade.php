<section class="hero is-success">
  <div class="hero-body">
    <div class="container">
      <nav class="nav">
        <div class="container">
          <div class="nav-left">
            <a class="nav-item is-brand" href="{{ route('home') }}">
              <h1 class="title">Workbuzz</h1>
            </a>
          </div>
          <span id="nav-toggle" class="nav-toggle"  onclick="document.getElementById('nav-menu').classList.toggle('is-active');">
            <span></span>
            <span></span>
            <span></span>
          </span>
          <div id="nav-menu" class="nav-right nav-menu">
            <span class="nav-item">
              <a href="{{ route('home') }}" class="nav-item">
                  Home
                </a>
            </span>
            <span class="nav-item">
               <a href="{{ route('profile') }}" class="nav-item">
                  My Profile
                </a>
            </span>
            <span class="nav-item">
              <a href="{{ route('employees') }}" class="nav-item">
                  Employees
                </a>
            </span>
            <span class="nav-item">
               @if (Auth::user()->role == 1)
                  <a href="{{ route('adduser') }}" class="nav-item">
                    Add User
                  </a>
                  <a href="{{ route('getdeleted') }}" class="nav-item">
                    Deactivated Users
                  </a>
                @endif
            </span>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
              <a class="nav-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                  Logout
              </a>   
          </div>
        </div>
      </nav>
    </div>
  </div>
</section>
