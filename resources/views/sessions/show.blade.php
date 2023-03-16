@extends('layouts.basic')

@section('title', 'View')

@section('content')
<div>
<p>Join Code: {{$session->code}}</p>
<p>Session Type: {{$session->sessionType}}</p>
<br><br>
<p>Title: {{$presentation->title}}</p>
<br>
<p>Description: {{$presentation->text}}

<p>Current Slide: {{$session->currentSlide}}</p>

@auth
@if ($session->User->id == auth()->id())
    <form method="POST" action="{{route('sessions.increment', ['id'=>$session->id])}}">
        @csrf
        <button type="submit">Next Slide</button>
    </form>
@endif
@endauth


@endsection