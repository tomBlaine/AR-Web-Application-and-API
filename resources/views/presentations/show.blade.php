@extends('layouts.basic')

@section('title', 'View')

@section('content')
<p>{{$presentation->title}}</p>
<p>{{$presentation->text}}</p>
<br>
<ul>
    <li>Slides:</li>
    @foreach ($slides as $slide)
        <li>{{$slide->text1}}</li>
        <li>{{$slide->text2}}</li>
        <li>{{$slide->text3}}</li>
        <li>{{$slide->obj}}</li>
        <p> </p>
        <p> </p>
    @endforeach
</ul>
</div>


@endsection