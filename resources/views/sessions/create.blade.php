
@extends('layouts.basic')

@section('title', 'Create')

@section('content')

<p>Create Session:</p>
<form method="POST" action="{{route('sessions.store')}}">
    @csrf
    <p>Presentation ID: </p>
    <textarea name="pres_id" rows=2 style="width: 80%"></textarea>
    <br>
    <br>
    <input type="submit" value="Post">
</form>

@endsection