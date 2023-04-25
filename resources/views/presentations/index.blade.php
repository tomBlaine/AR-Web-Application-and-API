@extends('layouts.basic')

@section('title', 'Timeline')

@section('content')
<br>
<p>Your Presentations:</p>
<br>
@guest
<p style="font-size: 24px; font-weight: bold;"> Sign Up to create a presentation</p>
@endguest
<ul>
    @foreach ($presentations as $presentation)
        <li><a style="font-size: 24px; font-weight: bold;" href={{route('presentations.show', ['id'=>$presentation->id])}}>{{$presentation->title}}</a></li>
        <li>Description: {{$presentation->text}}</li>
        <p> </p>
        <p> </p>
    @endforeach
</ul>
</div>


@endsection