@extends('layouts.basic')

@section('title', 'View')

@section('content')
<div>
<p>{{$session->code}}</p>
<br><br>
<p>{{$presentation->title}}</p>
<br>
<p>{{$presentation->text}}

@endsection