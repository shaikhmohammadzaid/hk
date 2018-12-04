<div class="navbar navbar-main">
    <div class="container container-nav">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand" href="{{ url('/') }}"> <img src="{{ asset('public/images/logo1.png') }}" alt="" /> </a> </div>
      <nav class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
           
          <li class="{{ (Request::is('/') ? 'active' : '') }}"><a href="{{ url('/') }}">Home</a></li>
          <li class="{{ (Request::is('about') ? 'active' : '') }}"><a href="{{ url('/about') }}" >About</a> </li>
          
         <li class="{{ (Request::is('services') ? 'active' : '') }}"><a href="{{ url('/services') }}">Services</a> </li>
         
         <li class="{{ (Request::is('contact') ? 'active' : '') }}"><a href="{{ url('/contact') }}">Contact</a> </li>
          @if (Route::has('login'))          
          @auth
          <li class="{{ (Request::is('home') ? 'active' : '') }}"><a href="{{ url('/home') }}">Dashboard</a></li>
          <li> <a href="{{ route('logout') }}"  onclick="event.preventDefault();  document.getElementById('logout-form').submit();"> Logout </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </li>
          @else
          <li class="{{ (Request::is('login') ? 'active' : '') }}"><a href="{{ route('login') }}">Login</a></li>
         <li class="{{ (Request::is('register') ? 'active' : '') }}"> <a href="{{ route('register') }}">Register</a></li>
          @endauth
          
          @endif
        </ul>
        
      </nav>
    </div>
  </div>