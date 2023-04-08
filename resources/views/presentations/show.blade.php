@extends('layouts.basic')

@section('title', 'View')

@section('content')
<head>
    <script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/multi-root/ckeditor.js"></script>
        
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: repeat(3, 1fr);
            gap: 10px;
            height: 100vh; 
        }
        
        .grid-item {
            background-color: #f0f0f0;
            padding: 20px;
        }
    </style>

</head>

@php
    $count = 0; // Initialize count value
@endphp
<body>

    <script src="{{ asset('node_modules/tinymce/tinymce.min.js') }}"></script>

<div>
<p>Title: {{$presentation->title}}</p>
<p>Description: {{$presentation->text}}</p>
<p>User: {{$presentation->User->name}}</p>
<br>



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

          aria-expanded="false"

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
        @if ($count==1)
          class="!visible"
        @else
          class="!visible hidden"
        @endif
        
        data-te-collapse-item
        @if ($count==1)
          data-te-collapse-show
        @endif
        
        aria-labelledby="headingOne5">
        <div class="py-4 px-5">
          <ul>
            <li><b>Text Box 1:</b> <br><br> {{$slide->text1}}</li>
            <br><br>
            <li><b>Text Box 2:</b> <br><br> {{$slide->text2}}</li>
            <br><br>
            <li><b>Text Box 3:</b> <br><br> {{$slide->text3}}</li>
            <br><br>
            <li><b>Model Reference:</b> <br><br> {{$slide->obj}}</li>
            <br><br>
            <li><b>Model Scale:</b> <br><br> {{$slide->objScale}}</li>
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

          aria-expanded="false"
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

                    


                    <textarea class="textarea1" id="textArea1" type="text" name="text1" rows=3 style="width: 30%"></textarea>
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

<div id="toolbar"></div>

<div class="grid-container">
    <div class="grid-item" id="grid1"></div>
    <div class="grid-item" id="grid2"></div>
    <div class="grid-item" id="grid3"></div>
    <div class="grid-item" id="grid4"></div>
    <div class="grid-item" id="grid5"></div>
    <div class="grid-item" id="grid6"></div>
    <div class="grid-item" id="grid7"></div>
    <div class="grid-item" id="grid8"></div>
    <div class="grid-item" id="grid9"></div>
</div>

<script>
    MultiRootEditor
        .create( {
            // Define roots / editable areas:
            grid1: document.getElementById( 'grid1' ),
            grid2: document.getElementById( 'grid2' ),
            grid3: document.getElementById( 'grid3' ),
            grid4: document.getElementById( 'grid4' ),
            grid5: document.getElementById( 'grid5' ),
            grid6: document.getElementById( 'grid6' ),
            grid7: document.getElementById( 'grid7' ),
            grid8: document.getElementById( 'grid8' ),
            grid9: document.getElementById( 'grid9' ),


        },)
        .then( editor => {
            window.editor = editor;

            // Append toolbar to a proper container.
            const toolbarContainer = document.getElementById( 'toolbar' );
            toolbarContainer.appendChild( editor.ui.view.toolbar.element );

            // Make toolbar sticky when the editor is focused.
            editor.ui.focusTracker.on( 'change:isFocused', () => {
                if ( editor.ui.focusTracker.isFocused ) {
                    toolbarContainer.classList.add( 'sticky' );
                } else {
                    toolbarContainer.classList.remove( 'sticky' );
                }
            } );
        } )

        .catch( error => {
            console.error( 'There was a problem initializing the editor.', error );
        } );
</script>



@auth
@if ($presentation->User->id == auth()->id())
    <form method="POST" action="{{route('presentations.destroy', ['id'=>$presentation])}}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Presentation</button>
    </form>
@endif
@endauth
</body>
@endsection
