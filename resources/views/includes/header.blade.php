<section class="hero is-success">
  <div class="hero-body">
    <div class="container">
      <nav class="nav">
        <!-- This "nav-toggle" hamburger menu is only visible on mobile -->
        <!-- You need JavaScript to toggle the "is-active" class on "nav-menu" -->
        <span class="nav-toggle">
          <span></span>
          <span></span>
          <span></span>
        </span>
        <!-- This "nav-menu" is hidden on mobile -->
        <!-- Add the modifier "is-active" to display it on mobile -->
        <a href="{{ route('home') }}" class="title">
          <h1 class="title">Workbuzz</h1>
        </a>
        <div class="nav-right nav-menu is-active">
          <a href="{{ route('home') }}" class="nav-item">
            Home
          </a>
          <a href="{{ route('profile') }}" class="nav-item">
            My Profile
          </a>
          <a href="{{ route('employees') }}" class="nav-item">
            Employees
          </a>
          @if (Auth::user()->role == 1)
            <a href="{{ route('adduser') }}" class="nav-item">
              Add User
            </a>
          @endif

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
          <a class="nav-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
              Logout
          </a>   
        </div>
      </nav> 
    </div>
  </div>
</section>