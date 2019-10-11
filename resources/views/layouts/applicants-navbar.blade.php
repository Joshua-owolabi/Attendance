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
            <li class="nav-item"><a class="nav-link" href="{{ route('join-sanctuary') }}">Join Us</a></li>
            <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
            
          </ul>
        </div>

      </div>
    </nav>