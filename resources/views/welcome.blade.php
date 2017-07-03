@extends('layouts.app')
@section('content')
    <section class="hero is-success is-fullheight">
      <!-- Hero header: will stick at the top -->
      <div class="hero-head">
        <header class="nav">
          <div class="container">
            <div class="nav-left">
              <a class="nav-item">
                <!-- <img src="images/bulma-type-white.png" alt="Logo"> -->
                WorkBuzz
              </a>
            </div>
            <span class="nav-toggle">
              <span></span>
              <span></span>
              <span></span>
            </span>
            <div class="nav-right nav-menu">
              <!-- <a class="nav-item is-active">
                Home
              </a>
              <a class="nav-item">
                Examples
              </a>
              <a class="nav-item">
                Documentation
              </a> -->
              <span class="nav-item">
                <a href="{{ route('login') }}" class="button is-success is-inverted">
                  <span class="icon">
                    <i class="fa fa-user"></i>
                  </span>
                  <span>Login</span>
                </a>
              </span>
            </div>
          </div>
        </header>
      </div>

      <!-- Hero content: will be in the middle -->
      <div class="hero-body">
        <div class="container has-text-centered">
          <h1 class="title">
            WorkBuzz
          </h1>
          <h2 class="subtitle">
            A World-Class HRM App
          </h2>
        </div>
      </div>
    </section>
@endsection