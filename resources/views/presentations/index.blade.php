@extends('layouts.basic')

@section('title', 'Timeline')

@section('content')
<p>Presentations:</p>
<ul>
    @foreach ($presentations as $presentation)
        <li>Post: {{$presentation->text}}</li>
        <li>Date: {{$presentation->created_at}}</li>
        <p> </p>
        <p> </p>
    @endforeach
</ul>
</div>


@endsection