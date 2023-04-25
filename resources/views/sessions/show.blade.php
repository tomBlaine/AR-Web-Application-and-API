@extends('layouts.basic')

@section('title', 'View')

@section('content')

<div

  style="border-radius: 5px; background-color: #ecf1ff;"
  class="rounded-lg bg-neutral-100 p-6 text-neutral-700 shadow-lg dark:bg-neutral-600 dark:text-neutral-200 dark:shadow-black/30">
  <h2 class="mb-5 text-3xl font-semibold">Join Code: {{$session->code}}</h2>
  <p>
    {{$presentation->title}}
  </p>
  <hr
    class="my-6 h-0.5 border-t-0 bg-neutral-200 opacity-100 dark:opacity-30" />
  <p class="mb-4">
    Session Type: @ {{$session->sessionType}}
  </p>
</div>

@if ($session->sessionType == "group")
<div>
<p>Current Slide: {{$session->currentSlide}}</p>
</div>
@auth
@if ($session->user_id == auth()->id())
    <form method="POST" action="{{route('sessions.increment', ['id'=>$session->id])}}">
        @csrf
        <button type="submit">Next Slide</button>
    </form>

    <form method="POST" action="{{route('sessions.decrement', ['id'=>$session->id])}}">
        @csrf
        <button type="submit">Prev Slide</button>
    </form>
@endif
@endauth
@endif

@endsection