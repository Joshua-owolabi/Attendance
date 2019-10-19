<div class="sidebar" data-color="green" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
  <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
        TODO: UPDATE SIDE NAVIGATION OF THIS PAGE, REDESIGN IT AND REMOVE SOCIAL LINKS.
    -->
  <div class="logo">
    <a href="/" class="simple-text logo-normal">
      <img src="{{ asset('images/Sanctuary.png') }}" alt="" style="width:100px; height:100px;">
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <i class="material-icons">person</i>
          <p>Your Profile</p>
        </a>
      </li>
      @if(Auth()->user()->user_rank == 'member')

      @else
      <li class="nav-item {{ Request::is('members') ? 'active' : ''  }}">
        <a class="nav-link" href="{{ route('members-all') }}">
          <i class="material-icons">content_paste</i>
          <p>All Members</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('attendance-panel') ? 'active' : ''  }}">
        <a class="nav-link" href="{{ route('attendance') }}">
          <i class="material-icons">bubble_chart</i>
          <p>Attendance Panel</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('print-panel') ? 'active' : ''  }}">
        <a class="nav-link" href="{{ route('print-panel') }}">
          <i class="material-icons">bubble_chart</i>
          <p>Printing Panel</p>
        </a>
      </li>
      @endif
      <li class="nav-item {{ Request::is('logout') ? 'active' : ''  }}">
        <a class="nav-link" href="{{ route('logout') }}"
          onclick="event.preventDefault();                  document.getElementById('logout-form').submit();">
          <i class="material-icons">fingerprint</i>
          <p>Logout</p>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>
    </ul>
  </div>
</div>