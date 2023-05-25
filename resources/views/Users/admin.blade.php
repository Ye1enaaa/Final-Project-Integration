<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> ADMIN </title>
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  

</head>
<body>
<style>
    .content {
        margin: 0;
        padding: 0;
    }
    .top-navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
    }
    .search-bar {
    margin-left: 10px;
    background-color: #FFFFFF;
    }
    input::placeholder {
    color: #211a51;
    }
    .dashboard-container {
        margin: 0;
        padding: 0;
    }
    .side-navbar {
        padding: 10px;
    }
    .user-dropdown {
    position: relative;
    display: inline-block;
    }

  .user-dropdown .dropdown-menu {
    list-style: none;
    margin: 0;
    padding: 0;
    display: none;
    position: absolute;
    top: 100%;
    right: 0;
    background-color: white;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    }
  .user-dropdown.show .dropdown-menu {
    display: block;
    }
  .user-dropdown a {
    color: black;
    text-decoration: none;
    display: block;
    padding: 10px;
    }
  .user-dropdown .caret {
    display: inline-block;
    width: 0;
    height: 0;
    vertical-align: middle;
    border-top: 4px solid #ffd14f; /* Set the color to yellow using hex code */
    border-right: 4px solid transparent;
    border-left: 4px solid transparent;
    }
    .content-admin {
    display: flex;
    flex-direction: column; /* Change the flex direction to column */
    align-items: flex-start;
    overflow-x: auto; /* Enable horizontal scrolling if needed */
    }
    .menu {
    flex: 0 0 auto;
    margin-top: 35px; /* Set margin-top to 0 to align it at the top */
    width: 300px; /* Adjust the width as needed */
    }
    .form-container {
    display: flex;
    flex-direction: column;
    gap: 0px; /* Reduce the gap between form fields */
    align-items: flex-start; /* Align the form items to the left */
    }

    .form-buttons {
    display: flex;
    justify-content: space-between;
    margin-top: 0px; /* Reduce the top margin */
    }

    .profile-container {
    display: flex;
    align-items: center;
    }

    .profile-picture {
    width: 50px; /* Adjust the width as needed */
    height: 50px; /* Adjust the height as needed */
    margin-right: 10px; /* Add spacing between the picture and the name */
    }
</style>

<div class="content">
<div class="container">
<div class="top-navbar" style="background-color: #211a51;">
      <div class="bx bx-menu" id="menu-icon"></div>
      <div class="search-bar">
        <input type="text" placeholder="Search..." style="color: #FF0000;">
        <button><i class="bx bx-search" style="color: #211a51;"></i></button>
      </div>
      <div class="user-dropdown">
      <div class="profile-container" style="padding: 5px;">
    <img src="{{ asset('storage/' . Auth::user()->picture) }}" class="profile-picture">
    <span class="name" style="color: #FFFFFF;">{{ Auth::user()->name }}</span>&nbsp;<i class="caret"></i>
  </div>
<ul class="dropdown-menu" style="padding: 10px; border: 2px solid #211a51; border-radius: 5px;">
  <li style="margin-bottom: 2px;"><a href="#" onclick="handleProfileClick();"><i class="fas fa-user" style="color: #211a51;"></i> Profile</a></li>
  <li style="margin-bottom: 2px;"><a href="#" onclick="handleSettingsClick();"><i class="fas fa-cog" style="color: #211a51;"></i> Settings</a></li>
  <li><a href="#" onclick="handleLogoutClick();"><i class="fas fa-sign-out-alt" style="color: #211a51;"></i> Logout</a></li>
</ul>
    </div>
  </div>
</div>
  <div class="content-admin">
    <div class="menu">
      <h2 style="color: #201a50;"> CREATE EVENT</h2>
      <br>
      <form action="{{route('add.event')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-container border border-primary">
          <div class="form-group">
            <label for="eventName" style="color: #201a50;">Event Name</label>
            <input type="text" name="eventName" id="eventName" placeholder="Event Name">
          </div>
          <div class="form-group">
            <label for="eventDate" style="color: #201a50;">Event Date</label>
            <input type="date" name="eventDate" id="eventDate" placeholder="Event Date">
          </div>
          <div class="form-group">
            <label for="eventTime" style="color: #201a50;">Event Time</label>
            <input type="time" name="eventTime" id="eventTime" placeholder="Event Time">
          </div>
          <div class="form-group">
            <label for="eventPlace" style="color: #201a50;">Event Place</label>
            <input type="text" name="eventPlace" id="eventPlace" placeholder="Event Place">
          </div>
          <div class="form-group">
            <label for="eventDesc" style="color: #201a50;">Event Description</label>
            <input type="text" name="eventDesc" id="eventDesc" placeholder="Event Description">
          </div>
          <div class="form-group">
            <label for="eventPicture" style="color: #201a50; margin-bottom: 30px;"></label>
                <div>
                <input type="file" name="eventPicture" id="eventPicture" placeholder="Event Picture" style="border: none;" onchange="readURL(this)">
                </div>
                <img id="preview" src="#" alt="Chosen Picture" style="display: none; width: 250px; margin-top: 10px;">
                </div>
          <div class="form-buttons">
            <button type="submit" class="flex justify-center items-center bg-blue-900 hover:bg-#211a51 text-white font-bold py-2 px-10 rounded-lg" onclick="this.style.backgroundColor='#ffd14f'">Submit</button>
            <button type="cancel" class="flex justify-center items-center danger-button font-bold py-2 px-10 rounded-lg" onclick="this.style.backgroundColor='#ff0404'">Cancel</button>
          </div>
        </div>
      </form>
    </div>
    <div class="event-list">
      @foreach($events as $event)
      <h1>{{$event->eventName}}</h1>
      <img src="http://127.0.0.1:8000/storage/{{$event->eventPicture}}" alt="">
      @endforeach
    </div>
  </div>
</div>
    
<div class="dashboard-container">
    <aside class="side-navbar">
      <ul class="nav-list">
        <li>
          <a>
            <span class="icon"><ion-icon name="cube-outline"></ion-icon></i></span>
            <span class="text"><h2> USTP-EVENT </h2></span>
          </a>
          <li>
            <a class="side-link <?php if(basename($_SERVER['PHP_SELF']) == "index.php") echo "active"; ?>" href="sample.php">
              <span class="icon"> <ion-icon name="clipboard-outline"></ion-icon> </span>
              <span class="text">UPCOMING EVENTS</span>
            </a>
              <span class="tooltip"> UPCOMING EVENTS </span>
          </li>
          <li>
            <a class="side-link <?php if(basename($_SERVER['PHP_SELF']) == "transaction_log.php") echo "active"; ?>" href="sample.php">
              <span class="icon"> <ion-icon name="checkmark-done-outline"></ion-icon> </span>
              <span class="text">EVENT DETAILS</span>
            </a>
              <span class="tooltip"> EVENT DETAILS </span>
          </li>
      </ul>
    </aside>
  </div>

  <script>
  document.addEventListener("DOMContentLoaded", function() {
    var dropdown = document.querySelector(".user-dropdown");
    var dropdownMenu = document.querySelector(".dropdown-menu");

    dropdown.addEventListener("click", function() {
      dropdown.classList.toggle("show");
    });

    document.addEventListener("click", function(event) {
      if (!dropdown.contains(event.target)) {
        dropdown.classList.remove("show");
      }
    });
  });
  </script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script src="{{ asset('js/side-navbar.js') }}"></script>
  <script src="{{ asset('js/admin.js') }}"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

  
</body>
</html>