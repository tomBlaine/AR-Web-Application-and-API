@extends('layouts.basic')

@section('title', 'Create slide')

@section('content')
    <p>Edit Slide:</p>
    <form method="POST" action="{{route('slides.store', ['id'=>$presentation])}}">
        @csrf
        <p>Text 1: </p>
        <textarea type="text" name="title" rows=2 style="width: 80%"></textarea>

        <p>Text 2: </p>
        <textarea type="text" name="body" rows=15 style="width: 80%"></textarea>

        <p>Text 3: </p>
        <textarea type="text" name="img" rows=1 style="width: 80%"></textarea>

        <p>Object reference: </p>
        <textarea type="text" name="tags" rows=1 style="width: 80%"></textarea>
        <br>
        <br>
        <input type="submit" value="Post">
        <a href="{{route('presentations.index')}}">Cancel</a>
    </form>


@endsection