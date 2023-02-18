<!DOCTYPE html>
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