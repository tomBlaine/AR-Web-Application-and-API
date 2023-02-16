
@extends('layouts.basic')

@section('title', 'Timeline')

@section('content')

<p>Create Presentation:</p>
<form method="POST" action="{{route('presentation.store')}}">
    @csrf
    <p>Title: </p>
    <textarea type="text" name="title" rows=2 style="width: 80%"></textarea>
    <p>Body: </p>
    <textarea type="text" name="body" rows=15 style="width: 80%"></textarea>

    <br>
    <br>
    <input type="submit" value="Post">
</form>

@endsection