@extends('layouts.basic')

@section('title', 'Timeline')

@section('content')
<p>Presentations:</p>
<ul>
    @foreach ($presentations as $presentation)
        <li><a href={{route('presentations.show', ['id'=>$presentation->id])}}>Title: {{$presentation->title}}</a></li>
        <li>Text: {{$presentation->text}}</li>
        <p> </p>
        <p> </p>
    @endforeach
</ul>
</div>


@endsection