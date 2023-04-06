@extends('layouts.basic')

@section('title', 'View')

@section('content')

@php
    $count = 0; // Initialize count value
@endphp

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


</div>


<div id="accordionExample5">
    @foreach ($slides as $slide)
    @php
        $count++; // Increment the value
    @endphp
    <div
      class="rounded-t-lg border border-neutral-200 bg-white dark:border-neutral-600 dark:bg-neutral-800">
      <h2 class="mb-0" id="headingOne5">
        <button
          class="group relative flex w-full items-center rounded-t-[15px] border-0 bg-white py-4 px-5 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)]"
          type="button"
          data-te-collapse-init
          data-te-target="#collapse{{$count}}5"
          @if ($count==1)
            aria-expanded="true"
          @else
            aria-expanded="false"
          @endif
          aria-controls="collapse{{$count}}5">
          Slide {{$count}}
          <span
            class="ml-auto -mr-1 h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="h-6 w-6">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
          </span>
        </button>
      </h2>
      <div
        id="collapse{{$count}}5"
        class="!visible hidden"
        data-te-collapse-item
        aria-labelledby="headingOne5">
        <div class="py-4 px-5">
          <ul>
            <li>{{$slide->text1}}</li>
            <li>{{$slide->text2}}</li>
            <li>{{$slide->text3}}</li>
            <li>{{$slide->obj}}</li>
            <li>{{$slide->objScale}}</li>
          </ul>
        </div>
      </div>
    </div>
    @endforeach
    @auth
    @if ($presentation->User->id == auth()->id())

    <div
      class="rounded-t-lg border border-neutral-200 bg-white dark:border-neutral-600 dark:bg-neutral-800">
      <h2 class="mb-0" id="headingOne5">
        <button
          class="group relative flex w-full items-center rounded-t-[15px] border-0 bg-white py-4 px-5 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)]"
          type="button"
          data-te-collapse-init
          data-te-target="#collapseNew5"

          aria-expanded="true"
          aria-controls="collapseNew5">
          <strong>+ New Slide</strong>
          <span
            class="ml-auto -mr-1 h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="h-6 w-6">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
          </span>
        </button>
      </h2>
      <div
        id="collapseNew5"
        class="!visible hidden"
        data-te-collapse-item
        aria-labelledby="headingOne5">
        <div class="py-4 px-5">
            <div>
                <form method="POST" action="{{route('slides.store', ['id'=>$presentation])}}">
                    @csrf
                    <p>Text1: </p>
                    <textarea type="text" name="text1" rows=3 style="width: 30%"></textarea>
                    <p>Text1 Format: </p>
                    <textarea type="text" name="text1Format" rows=1 style="width: 30%"></textarea>
                    <br>
                    <p>Text2: </p>
                    <textarea type="text" name="text2" rows=3 style="width: 30%"></textarea>
                    <p>Text2 Format: </p>
                    <textarea type="text" name="text2Format" rows=1 style="width: 30%"></textarea>
                    <br>
                    <p>Text3: </p>
                    <textarea type="text" name="text3" rows=3 style="width: 30%"></textarea>
                    <p>Text3 Format: </p>
                    <textarea type="text" name="text3Format" rows=1 style="width: 30%"></textarea>
                    <br>
                    <p>Obj Ref: </p>
                    <textarea  type="text" name="obj" rows=3 style="width: 30%"></textarea>
                    <input type="submit" value="Save">
                    <a href="{{route('presentations.index')}}">Cancel</a>
                </form>
            </div>
        </div>
      </div>
    </div>
    @endif
    @endauth
</div>






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
