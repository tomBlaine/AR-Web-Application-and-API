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


@endsection