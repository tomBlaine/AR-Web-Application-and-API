<!DOCTYPE html>
@vite('resources/css/app.css')
@vite('resources/js/app.js')
<style>
    body {
  background-color: #dae8ff;
}

.menu-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 60px;
    background-color: rgba(0, 0, 0, 0.378);
    color: #fff;
    }

    .menu-item {
    padding: 0 20px;
    font-size: 16px;
    cursor: pointer;
    font-family: "Helvetica", sans-serif;
    flex-grow:1;
    }
    .right-menu {
    display: flex;
    align-items: center;
    }

    .menu-item:hover {
    background-color: #444;
    }

    .custom-link {
    color: rgb(255, 255, 255);
    text-decoration: none;
    }
</style>
<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/css/app.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<div class="menu-bar">
    <div class="menu-item"><a href={{route('presentations.index')}} class="custom-link">My Presentations</a></div>
    <div class="menu-item create-post"><a href={{route('presentations.create')}} class="custom-link">Create Presentation</a></div>
    <div class="right-menu">
    @Auth
    <div class="menu-item"><a href={{route('profile.edit')}} class="custom-link">View profile</a></div>
    <div class="menu-item">
        <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button style="color: white">Log out</button>
    </form></div>
    @endauth
    @guest
        <div class="menu-item"><a href={{route('login')}} class="custom-link">Sign in</a></div>
        <div class="menu-item"><a href={{route('register')}} class="custom-link">Register</a></div>
    @endguest
    
    </div>
</div>
<body>
    <div>
        @if($errors->any())
        <div>
            Errors:
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @yield('content')
    </div>
</body>
</html>