<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>
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