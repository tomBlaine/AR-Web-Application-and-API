@extends('layouts.basic')

@section('title', 'View')

@section('content')
<div>
<p>{{$presentation->title}}</p>
<p>{{$presentation->text}}</p>
<br>
<ul>
    <li>Slides:</li>
    @foreach ($slides as $slide)
        <li>{{$slide->text1}}</li>
        <li>{{$slide->text2}}</li>
        <li>{{$slide->text3}}</li>
        <li>{{$slide->obj}}</li>
        <li>{{$slide->objScale}}</li>
        <p> </p>
        <p> </p>
    @endforeach
</ul>

<div>
    @yield('addSlide')
</div>
</div>


<div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Accordion Item #1
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu magna sit amet tortor convallis fringilla. Donec ultricies elit vitae lectus volutpat, vel elementum metus laoreet. 
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Accordion Item #2
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          Sed bibendum lobortis urna eu lacinia. Nullam eu est vel turpis malesuada volutpat. Morbi sit amet velit ac eros pulvinar suscipit eget vel dolor. 
        </div>
      </div>
    </div>
  </div>


@auth
@if ($presentation->User->id == auth()->id())
    <p><a href={{route('slides.edit', ['id'=>$presentation])}}>Add Slide</a></p>
@endif
@endauth

@auth
@if ($presentation->User->id == auth()->id())
    <form method="POST" action="{{route('presentations.destroy', ['id'=>$presentation])}}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Presentation</button>
    </form>
@endif
@endauth

@endsection

@section
    <script src="{{ asset('js/app.js') }}"></script>
@endsection