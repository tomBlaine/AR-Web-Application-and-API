@extends('layouts.basic')

@section('title', 'Timeline')

@section('content')
<p>Presentations:</p>
<ul>
    @foreach ($presentations as $presentation)
        <li>Title: {{$presentation->title}}</li>
        <li>Text: {{$presentation->text}}</li>
        <p> </p>
        <p> </p>
    @endforeach
</ul>
</div>


@endsection