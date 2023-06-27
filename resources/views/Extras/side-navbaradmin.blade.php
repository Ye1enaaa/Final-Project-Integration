<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- <link rel="stylesheet" href="{{ asset('css/admin.css') }}"> -->
  <link rel="stylesheet" href="{{ asset('css/side-navbar-admin.css') }}">
  <link rel="stylesheet" href="{{ asset('css/events-admin.css') }}">
  <title>USTP-CDO-EVENT</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body>
  <div class="dashboard-container">
    <aside class="side-navbar">
      <ul class="nav-list">
        <li>
          <a>
            <span class="icon"><ion-icon name="cube-outline"></ion-icon></span>
            <span class="text-lg text-white">USTP-EVENT</span>
          </a>
        </li>

        <!-- Alliana part -->
        <li>
          <a class="side-link <?php if(basename($_SERVER['PHP_SELF']) == "admin") echo "active"; ?>" href="/admin">
            <span class="icon"><ion-icon name="create-outline"></ion-icon></span>
            <span class="text">CREATE EVENT</span>
          </a>
        </li>

        <li class="tree-view">
          <button class="tree-view-header-button <?php if(basename($_SERVER['PHP_SELF']) == "upcomingEvents") echo "active"; ?> w-full" onclick="toggleTreeView(event)">
            <span class="icon"><ion-icon name="folder-outline"></ion-icon></span>
            <span class="text text-white">EVENTS</span>
          </button>

          <ul class="tree-view-menu" id="treeViewMenu" style="display: none;">
            <li>
              <a href="#upcomingevents" onclick="showUpcomingEvents()" class="tree-view-button">
                <span class="icon"><ion-icon name="clipboard-outline"></ion-icon></span>
                <span class="text">Upcoming Events</span>
              </a>
            </li>
            <li>
              <a href="#todaysevents" onclick="showTodaysEvents()" class="tree-view-button">
                <span class="icon"><ion-icon name="clipboard-outline"></ion-icon></span>
                <span class="text">Today's Event</span>
              </a>
            </li>
            <li>
              <a href="#pastevents" onclick="showPastEvents()" class="tree-view-button">
                <span class="icon"><ion-icon name="clipboard-outline"></ion-icon></span>
                <span class="text">Past Events</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </aside>

    <div class="content">
      <div id="top-navbar" class="top-navbar">
        <div class="bx bx-menu" id="menu-icon"></div>
        <div class="search-bar">
          <input type="text" id="search-input" placeholder="Search..." oninput="performSearch()" {{ Request::is('users/event/details/*') ? 'disabled' : '' }}>
          <button {{ Request::is('users/event/details/*') ? 'disabled' : '' }}><i class="bx bx-search"></i></button>
        </div>

        <div class="user-dropdown">
          @if(Auth::user()->picture)
          <div class="profile-container" style="padding: 5px;">
            <img src="http://127.0.0.1:8000/storage/{{Auth::user()->picture}}" class="profile-picture">
            <span class="name" style="color: #FFFFFF;">{{ Auth::user()->name }}</span>&nbsp;<i class="caret"></i>
          </div>
          @elseif(Auth::user()->picture == null)
          <div class="profile-container" style="padding: 5px;">
            <img src="{{asset('logo-logo.png')}}" class="profile-picture">
            <span class="name" style="color: #FFFFFF;">{{ Auth::user()->name }}</span>&nbsp;<i class="caret"></i>
          </div>
          @endif
          <ul class="dropdown-menu" style="padding: 10px; border: 2px solid #211a51; border-radius: 5px;">
            <li>
              <a href="#profile" onclick="showEditProfile()">
                <span class="fas fa-user" style="color: #211a51;"></ion-icon></span>
                <span class="text">Profile</span>
              </a>
            </li>
            <li style="margin-bottom: 2px;"><a href="#" onclick="handleSettingsClick();"><i class="fas fa-cog" style="color: #211a51;"></i> Settings</a></li>
            <form action="{{ route('user.logout') }}" method="post" id="log-out-form">
              @csrf
              <li><a href="#" onclick="handleLogoutClick(event);"><i class="fas fa-sign-out-alt" style="color: #211a51;"></i> Logout</a></li>
            </form>
          </ul>
        </div>
      </div>

      <div>
        @yield('content-admin')
      </div>

      <div>
        @yield('content-dashboard')
      </div>
    </div>

    <script src="{{ asset('js/side-navbar-admin.js') }}"></script>
</body>
</html>
