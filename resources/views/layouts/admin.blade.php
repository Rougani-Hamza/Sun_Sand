<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
    <link rel="icon" href="/assets/images/admin.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
     <link href="{{ asset ('assets/styles/style.css')}}" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
      function confirmDelete(event) {
        event.preventDefault(); // Prevent the default action of the delete button
      
        swal({
          title: "Are you sure?",
          text: "Once deleted, this item cannot be recovered!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            // If the user confirms the delete action, continue with the delete request
            window.location.href = event.target.href;
          }
        });
      }
      </script>      
</head>
<body>
<div id="wrapper">
    <nav class="navbar header-top fixed-top navbar-expand-lg  navbar-dark bg-dark">
      <div class="container">
      <a class="navbar-brand" href="#">Sun-Sand Admin</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarText">
        @auth('admin')

        <ul class="navbar-nav side-nav" >
          <li class="nav-item">
            <a class="nav-link" style="margin-left: 20px;" href="{{ route('admins.dashboard') }}">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admins.all.admins') }}" style="margin-left: 20px;">Admins</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('all.cities') }}" style="margin-left: 20px;">Cities</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('all.spots') }}" style="margin-left: 20px;">Spots</a>
          </li>  
          <li class="nav-item">
            <a class="nav-link" href="{{ route('all.bookings') }}" style="margin-left: 20px;">Bookings</a>
          </li>
        </ul>
        @endauth
        <ul class="navbar-nav ml-md-auto d-md-flex">
          @auth('admin')
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admins.dashboard') }}">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{Auth::guard('admin')->user()->name}}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">Logout</a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
               @csrf
              </form>
              
          </li>

          @else 


          <li class="nav-item">
            <a class="nav-link" href="{{ route('view.login') }}">Login
            </a>
          </li>
            
          @endauth  
          
        </ul>
      </div>
    </div>
    </nav>
    <div class="container-fluid">

        <main class="py-4">
            @yield('content')
        </main>

    </div>
</div>
<script type="text/javascript">

</script>
</body>
</html>