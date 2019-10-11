 <div class="sidebar" data-color="green" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="/home" class="simple-text logo-normal">
          <img src="{{ asset('images/Sanctuary.png') }}" alt="" style="width:100px; height:100px;">
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active ">
            <a class="nav-link" href="{{ route('home') }}">
              <i class="material-icons">person</i>
              <p>Your Profile</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ route('home') }}">
              <i class="material-icons">content_paste</i>
              <p>All Members</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ route('home') }}">
              <i class="material-icons">library_books</i>
              <p>Applicants</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ route('home') }}">
              <i class="material-icons">bubble_chart</i>
              <p>Attendance Panel</p>
            </a>
          </li>
        </ul>
      </div>
    </div>