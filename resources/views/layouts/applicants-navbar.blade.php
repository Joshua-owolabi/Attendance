<nav class="topbar topbar-inverse topbar-expand-md topbar-sticky">
      <div class="container">
        
        <div class="topbar-left">
          <button class="topbar-toggler">☰</button>
          <a class="topbar-brand" href="/">
            <img class="logo-default" src="{{ asset('images/Sanctuary.png') }}" alt="logo">
            <img class="logo-inverse" src="{{ asset('images/Sanctuary.png') }}" alt="logo">
          </a>
        </div>


        <div class="topbar-right">
          <ul class="topbar-nav nav">
             <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="/">About Us</a></li>
            @guest
            @if(Route::has('join-sanctuary'))
                <li class="nav-item"><a class="nav-link" href="{{ route('join-sanctuary') }}">Join Us</a></li> 
            @endif
            <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
            @else 
            <li class="nav-item dropdown">
               <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->sur_name }} <span class="caret"></span>
                                </a>
                              <div class="nav-submenu">
                                <a class="nav-link" href="{{ route('dashboard') }}" >Your Account</a>
                                  <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();                  document.getElementById('logout-form').submit();">Logout</a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                     @csrf
                                  </form>
                              </div>
            </li>
            @endguest
            
            <li class="nav-item">
          </ul>
        </div>

      </div>
    </nav>