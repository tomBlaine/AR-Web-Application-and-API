@extends('layouts.basic')

@section('title', 'View')

@section('content')
<head>
    <script src={{ asset('ckeditor/build/ckeditor.js')}}></script>
        
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

        .defaultShape {
            width: 100px;
            height: 100px;
            background-color: gray;
        }

        .small {
          border-radius: 50%;
          width: 100px;
          height: 100px;
        }

        .big {
            width: 200px;
            height: 200px;
        }

        .hor {
            width: 200px;
            height: 100px;
        }

        .vert {
            width: 100px;
            height: 200px;
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

                    <div id="sectionToToggle1" style="display: none;">
                      <input type="checkbox" id="checkbox1"> Small Square
                      <input type="checkbox" id="checkbox2"> Vertical Rectangle
                      <input type="checkbox" id="checkbox3"> Horizontal Rectangle
                      <input type="checkbox" id="checkbox4"> Big Square
                      <div class="editor1" id="grid1" name="grid1"></div>
                    </div>
                   
                    <div id="sectionToToggle2" style="display: none;">
                      <div class="editor2" id="grid2" name="grid2"></div>
                    </div>

                    <div id="sectionToToggle3" style="display: none;">
                      <div class="editor3" id="grid3" name="grid3"></div>
                    </div>
                    
                    <button id="toggleButton">Toggle Section</button>

                    <input type="hidden" name="grid1_data" id="grid1_data" value="">
                    <input type="hidden" name="grid2_data" id="grid2_data" value="">
                    <input type="hidden" name="grid3_data" id="grid3_data" value="">
                    <input type="hidden" name="grid4_data" id="grid4_data" value="">
                    <input type="hidden" name="grid5_data" id="grid5_data" value="">
                    <input type="hidden" name="grid6_data" id="grid6_data" value="">
                    <input type="hidden" name="grid7_data" id="grid7_data" value="">
                    <input type="hidden" name="grid8_data" id="grid8_data" value="">
                    <input type="hidden" name="grid9_data" id="grid9_data" value="">
                    <br>

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

    <div class="grid-container">

      <div class="editor4" id="grid4" name="grid4"></div>
      <div class="editor5" id="grid5" name="grid5"></div>
      <div class="editor6" id="grid6" name="grid6"></div>
      <div class="editor7" id="grid7" name="grid7"></div>
      <div class="editor8" id="grid8" name="grid8"></div>
      <div class="editor9" id="grid9" name="grid9"></div>
    </div>

    <script>
      // Add an event listener to the form submit event
        document.querySelector('form').addEventListener('submit', function() {
        // Get the data from the 'grid1' div element
        var grid1Data = document.getElementById('grid1').innerHTML;
        document.getElementById('grid1_data').value = grid1Data;
        
      });
    </script>
    @endauth
</div>


<br><br>



<script>
  for (var i = 1; i <= 3; i++) {
    BalloonEditor
				.create( document.querySelector( '.editor'+i ), {
					
					licenseKey: '',
					
					
					
				} )
				.then( editor => {
					window.editor = editor;
			
					
					
					
				} )
				.catch( error => {
					console.error( 'Oops, something went wrong!' );
					console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
					console.warn( 'Build id: qr0wowhu05ri-ycwdx5r1c3oi' );
					console.error( error );
				} );
  }


</script>


<script>
  $(document).ready(function() {
    var counter = 0;
      $('#toggleButton').click(function() {
        event.preventDefault();
          counter++;
          $('#sectionToToggle'+(counter)).toggle(); // Toggle the visibility of the section

          if (counter === 3) {
            $('#toggleButton').hide();
          }
      });
  });
  </script>

  <script>
    // Get the div element
      const textDiv = document.getElementById('grid1');

      const smallCheckbox = document.getElementById('checkbox1');
      const horCheckbox = document.getElementById('checkbox2');
      const vertCheckbox = document.getElementById('checkbox3');
      const bigCheckbox = document.getElementById('checkbox4');
      // Add event listeners to the checkboxes
      smallCheckbox.addEventListener('change', () => {
        if (smallCheckbox.checked) {
            textDiv.className = 'defaultShape small';
        }
      });

      vertCheckbox.addEventListener('change', () => {
        if (vertCheckbox.checked) {
          // Set the div's class to 'square' and remove other classes
          textDiv.className = 'defaultShape vert';
        }
      });

      horCheckbox.addEventListener('change', () => {
        if (horCheckbox.checked) {
          // Set the div's class to 'triangle' and remove other classes
          textDiv.className = 'defaultShape hor';
        }
      });

      bigCheckbox.addEventListener('change', () => {
        if (bigCheckbox.checked) {
          // Set the div's class to 'triangle' and remove other classes
          textDiv.className = 'defaultShape big';
        }
      });
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
