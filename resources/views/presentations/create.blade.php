
@extends('layouts.basic')

@section('title', 'Create')

@section('content')

<p>Create Presentation:</p>
<form method="POST" action="{{route('presentations.store')}}">
    @csrf
    <p>Title: </p>
    <textarea name="title" rows=2 style="width: 80%"></textarea>
    <p>Body: </p>
    <textarea name="body" rows=15 style="width: 80%"></textarea>

    <br>
    <br>
    <input type="submit" value="Post">
</form>

@endsection