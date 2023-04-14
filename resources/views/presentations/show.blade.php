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

        .ck-editor__editable {
          min-height: 300px;
        }

        .outlined-div {
          border: 1px solid #000; 
          outline: 1px solid #00000072; 
        }

        .outlined-div2 {
          border: 1px solid #000; 
          outline: 2px solid #00000090; 
        }



    </style>

</head>

@php
    $count = 0; 
@endphp
<body>

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
        <div id="viewSlide{{ $count }}" class="py-4 px-5">
          <ul>
            <form id="editForm{{$count}}" method="POST" action="{{route('slides.update', ['id'=>$slide])}}">
              @csrf
              @method('PUT')
              <input type="hidden" name="editCheckbox1" value="">
              <input type="hidden" name="editCheckbox2" value="">
              <input type="hidden" name="editCheckbox3" value="">



            @if($slide->text1!=null && $slide->text1!="null")
            <li id="readOnly1{{$count}}"><b>Text Box 1:</b> <br>
              <div class="viewer1{{$count}} ck-editor__editable outlined-div" id="viewer1{{$count}}" style="width=50%;"></div>
            </li>
            <li><p>Text area 1 format: {{$slide->text1Format}}</p></li>
            <li id="editable1{{$count}}" style="display: none;"><b>Text Box 1:</b> <br>
              <div class="viewerEdit1{{$count}} ck-editor__editable outlined-div" id="viewer1{{$count}}" style="width=50%;"></div>
            </li>
            <div id="editDiv1{{$count}}" style="display: none;">
              <p>Change text box shape:</p>
              
              <div style="display: flex; flex-direction: row; align-items: center;">
                <input type="checkbox" class="editCheckboxes1" value="S" name="editCheckbox1[]">
                <label for="editCheckbox1">  Small Box</label>
              </div>
              <div style="display: flex; flex-direction: row; align-items: center;">
                <input type="checkbox" class="editCheckboxes1" value="V" name="editCheckbox1[]">
                <label for="editCheckbox2">  Vertical Rectangle</label>
              </div>
              <div style="display: flex; flex-direction: row; align-items: center;">
                <input type="checkbox" class="editCheckboxes1" value="H" name="editCheckbox1[]">
                <label for="editCheckbox3">  Horizontal Rectangle</label>
              </div>
              <div style="display: flex; flex-direction: row; align-items: center;">
                <input type="checkbox" class="editCheckboxes1" value="B" name="editCheckbox1[]">
                <label for="editCheckbox4">  Big Square</label>
              </div>
              <label for="editBoxColour1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Change box colour:</label>
              <select id="editBoxColour1" name="editBoxColour1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="null">No change</option>
                <option value="g">Light Green</option>
                <option value="p">Light Purple</option>
                <option value="w">White</option>
              </select>
              <br>
              <p>Change position for your text box (leave blank for no change):</p>
              <div class="relative mb-3 xl:w-96" data-te-input-wrapper-init>
                <textarea
                  class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outlined-div transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                  id="editBoxPos1"
                  rows="1"
                  name="editBoxPos1"
                  placeholder="Change text box position"></textarea>
                <label
                  for="editBoxPos1"
                  class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                  >Change text box position (e.g 1)</label
                >
              </div>

              

            </div>

            <br><br>
            @endif
            @if($slide->text2!=null && $slide->text2!="null")
            <li id="readOnly2{{$count}}"><b>Text Box 2:</b> <br>
              <div class="viewer2{{$count}} ck-editor__editable outlined-div" id="viewer2{{$count}}" style="width=50%;"></div>
            </li>
            <li id="editable2{{$count}}" style="display: none;"><b>Text Box 2:</b> <br>
              <div class="viewerEdit2{{$count}} ck-editor__editable outlined-div" id="viewer2{{$count}}" style="width=50%;"></div>
            </li>
            <div id="editDiv2{{$count}}" style="display: none;">
              <p>Change text box shape:</p>
              
              <div style="display: flex; flex-direction: row; align-items: center;">
                <input type="checkbox" class="editCheckboxes2" value="S" name="editCheckbox2[]">
                <label for="editCheckbox1">  Small Box</label>
              </div>
              <div style="display: flex; flex-direction: row; align-items: center;">
                <input type="checkbox" class="editCheckboxes2" value="V" name="editCheckbo2[]">
                <label for="editCheckbox2">  Vertical Rectangle</label>
              </div>
              <div style="display: flex; flex-direction: row; align-items: center;">
                <input type="checkbox" class="editCheckboxes2" value="H" name="editCheckbox2[]">
                <label for="editCheckbox3">  Horizontal Rectangle</label>
              </div>
              <div style="display: flex; flex-direction: row; align-items: center;">
                <input type="checkbox" class="editCheckboxes2" value="B" name="editCheckbox2[]">
                <label for="editCheckbox4">  Big Square</label>
              </div>
              <label for="editBoxColour2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Change box colour:</label>
              <select id="editBoxColour2" name="editBoxColour2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="null">No change</option>
                <option value="g">Light Green</option>
                <option value="p">Light Purple</option>
                <option value="w">White</option>
              </select>
              <br>
              <p>Change position for your text box (leave blank for no change):</p>
              <div class="relative mb-3 xl:w-96" data-te-input-wrapper-init>
                <textarea
                  class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outlined-div transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                  id="editBoxPos2"
                  rows="1"
                  name="editBoxPos2"
                  placeholder="Change text box position"></textarea>
                <label
                  for="editBoxPos2"
                  class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                  >Change text box position (e.g 1)</label
                >
              </div>
            <br><br>
            </div>
            @endif
            @if($slide->text3!=null && $slide->text3!="null")
            <li id="readOnly3{{$count}}"><b>Text Box 3:</b> <br>
              <div class="viewer3{{$count}} ck-editor__editable outlined-div" id="viewer3{{$count}}" style="width=50%;"></div>
            </li>
            <li id="editable3{{$count}}" style="display: none;"><b>Text Box 3:</b> <br>
              <div class="viewerEdit3{{$count}} ck-editor__editable outlined-div" id="viewer3{{$count}}" style="width=50%;"></div>
            </li>
            <div id="editDiv3{{$count}}" style="display: none;">
              <p>Change text box shape:</p>
              <div style="display: flex; flex-direction: row; align-items: center;">
                <input type="checkbox" class="editCheckboxes3" value="S" name="editCheckbox3[]">
                <label for="editCheckbox1">  Small Box</label>
              </div>
              <div style="display: flex; flex-direction: row; align-items: center;">
                <input type="checkbox" class="editCheckboxes3" value="V" name="editCheckbo3[]">
                <label for="editCheckbox2">  Vertical Rectangle</label>
              </div>
              <div style="display: flex; flex-direction: row; align-items: center;">
                <input type="checkbox" class="editCheckboxes3" value="H" name="editCheckbox3[]">
                <label for="editCheckbox3">  Horizontal Rectangle</label>
              </div>
              <div style="display: flex; flex-direction: row; align-items: center;">
                <input type="checkbox" class="editCheckboxes3" value="B" name="editCheckbox3[]">
                <label for="editCheckbox4">  Big Square</label>
              </div>
              <label for="editBoxColour3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Change box colour:</label>
              <select id="editBoxColour3" name="editBoxColour3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="null">No change</option>
                <option value="g">Light Green</option>
                <option value="p">Light Purple</option>
                <option value="w">White</option>
              </select>
              <br>
              <p>Change position for your text box (leave blank for no change):</p>
              <div class="relative mb-3 xl:w-96" data-te-input-wrapper-init>
                <textarea
                  class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outlined-div transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                  id="editBoxPos3"
                  rows="1"
                  name="editBoxPos3"
                  placeholder="Change text box position"></textarea>
                <label
                  for="editBoxPos3"
                  class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                  >--No Change--</label
                >
              </div>
            
            </div>
            @endif
            <br>
            <li id="modelLink{{$count}}"><b>3D Model Sketchfab Link:</b> <br> {{$slide->obj}}</li>
            <div id="editLink{{$count}}" style="display: none;">
            <p>3D Model link:</p>
            <div class="relative mb-3 xl:w-96" data-te-input-wrapper-init>
              <textarea
                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outlined-div transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                id="edioOjID"
                rows="1"
                name="editObj"
                type="text">{{$slide->obj}}</textarea>
            </div>
            </div>

            
            <input type="hidden" name="text1" id="editData1{{$count}}" value="null">
            <input type="hidden" name="text2" id="editData2{{$count}}" value="null">
            <input type="hidden" name="text3" id="editData3{{$count}}" value="null">
            

            <button
            onclick="submitForm{{$count}}()"
            id="updateSlide{{$count}}"
            style="display: none;"
            class="inline-block rounded-full border-2 border-danger px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-danger transition duration-150 ease-in-out hover:border-danger-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-danger-600 focus:border-danger-600 focus:text-danger-600 focus:outline-none focus:ring-0 active:border-danger-700 active:text-danger-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
            data-te-ripple-init>
              Update Slide
            </button>

          </form>





            

            <form method="POST" action="{{route('slides.destroy', ['id'=>$slide])}}">
                @csrf
                @method('DELETE')
                <button
                type="submit"
                class="inline-block rounded-full border-2 border-danger px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-danger transition duration-150 ease-in-out hover:border-danger-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-danger-600 focus:border-danger-600 focus:text-danger-600 focus:outline-none focus:ring-0 active:border-danger-700 active:text-danger-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                data-te-ripple-init>
                  Delete Slide
                </button>
            </form>

            <button
            type="submit"
            id="editSlideButton{{$count}}"
            class="inline-block rounded-full border-2 border-danger px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-danger transition duration-150 ease-in-out hover:border-danger-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-danger-600 focus:border-danger-600 focus:text-danger-600 focus:outline-none focus:ring-0 active:border-danger-700 active:text-danger-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
            data-te-ripple-init>
              Edit Slide
            </button>


          </ul>
        </div>
      </div>
    </div>
    <script>
      BalloonEditor
          .create( document.querySelector( '.viewer' + 1 + {{ $count }} ), {
  
          licenseKey: '',
          initialData: {!! json_encode($slide->text1) !!},
  
  
  
      } )
        .then( editor => {
           
           var name = 'viewer' + 1 + {{ $count }};
           editor.name = name;
           editor.enableReadOnlyMode(name);
           window.editor = editor;
  
  
          } )
            .catch( error => {
              console.error( 'Oops, something went wrong!' );
              console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
             console.warn( 'Build id: qr0wowhu05ri-ycwdx5r1c3oi' );
              console.error( error );
      } );

      BalloonEditor
          .create( document.querySelector( '.viewer' + 2 + {{ $count }} ), {
  
          licenseKey: '',
          initialData: {!! json_encode($slide->text2) !!},
  
  
  
      } )
        .then( editor => {
           
           var name = 'viewer' + 2 + {{ $count }};
           editor.name = name;
           editor.enableReadOnlyMode(name);
           window.editor = editor;
  
  
          } )
            .catch( error => {
              console.error( 'Oops, something went wrong!' );
              console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
             console.warn( 'Build id: qr0wowhu05ri-ycwdx5r1c3oi' );
              console.error( error );
      } );

      BalloonEditor
          .create( document.querySelector( '.viewer' + 3 + {{ $count }} ), {
  
          licenseKey: '',
          initialData: {!! json_encode($slide->text3) !!},
  
  
  
      } )
        .then( editor => {
           
           var name = 'viewer' + 3 + {{ $count }};
           editor.name = name;
           editor.enableReadOnlyMode(name);
           window.editor = editor;
  
  
          } )
            .catch( error => {
              console.error( 'Oops, something went wrong!' );
              console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
             console.warn( 'Build id: qr0wowhu05ri-ycwdx5r1c3oi' );
              console.error( error );
      } );

      BalloonEditor
          .create( document.querySelector( '.viewerEdit' + 1 + {{ $count }} ), {
  
          licenseKey: '',
          initialData: {!! json_encode($slide->text1) !!},
  
  
  
      } )
        .then( editor => {
           
           var name = 'viewerEdit' + 1 + {{ $count }};
           editor.name = name;
           window.editor = editor;
  
  
          } )
            .catch( error => {
              console.error( 'Oops, something went wrong!' );
              console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
             console.warn( 'Build id: qr0wowhu05ri-ycwdx5r1c3oi' );
              console.error( error );
      } );

      BalloonEditor
          .create( document.querySelector( '.viewerEdit' + 2 + {{ $count }} ), {
  
          licenseKey: '',
          initialData: {!! json_encode($slide->text2) !!},
  
  
  
      } )
        .then( editor => {
           
           var name = 'viewerEdit' + 2 + {{ $count }};
           editor.name = name;
           window.editor = editor;
  
  
          } )
            .catch( error => {
              console.error( 'Oops, something went wrong!' );
              console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
             console.warn( 'Build id: qr0wowhu05ri-ycwdx5r1c3oi' );
              console.error( error );
      } );

      BalloonEditor
          .create( document.querySelector( '.viewerEdit' + 3 + {{ $count }} ), {
  
          licenseKey: '',
          initialData: {!! json_encode($slide->text3) !!},
  
  
  
      } )
        .then( editor => {
           
           var name = 'viewerEdit' + 3 + {{ $count }};
           editor.name = name;
           window.editor = editor;
  
  
          } )
            .catch( error => {
              console.error( 'Oops, something went wrong!' );
              console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
             console.warn( 'Build id: qr0wowhu05ri-ycwdx5r1c3oi' );
              console.error( error );
      } );
    </script>

    <script>
        $(document).ready(function() {
          $('#editSlideButton'+{{ $count }}).click(function() {
            event.preventDefault();
              
              $('#editDiv1'+{{$count}}).toggle(); // Toggle the visibility of the section
              $('#editable1'+{{$count}}).toggle();
              $('#readOnly1'+{{$count}}).toggle();
              $('#editDiv2'+{{$count}}).toggle(); // Toggle the visibility of the section
              $('#editable2'+{{$count}}).toggle();
              $('#readOnly2'+{{$count}}).toggle();
              $('#editDiv3'+{{$count}}).toggle(); // Toggle the visibility of the section
              $('#editable3'+{{$count}}).toggle();
              $('#readOnly3'+{{$count}}).toggle();
              $('#updateSlide'+{{$count}}).toggle();
              
              $('#modelLink'+{{$count}}).toggle();
              $('#editLink'+{{$count}}).toggle();

              var button1 = document.getElementById('editSlideButton'+{{$count}});
              var buttonText = button1.textContent.trim();
              if (buttonText === 'Edit Slide') {
                  button1.textContent = 'Cancel Edit';
              } else if (buttonText === 'Cancel Edit') {
                  button1.textContent = 'Edit Slide';
              }

          });
        });
      </script>

      <script>

        
        function submitForm{{$count}}() {

            var form = document.getElementById('editForm'+{{$count}});
            

            var element1 = document.getElementById('viewerEdit1' + {{$count}});
            var data1 = "null";
            if (element1) {
                data1 = element1.innerHTML;
            }
            document.getElementById('editData1'+{{$count}}).value = data1;

            var element2 = document.getElementById('viewerEdit2' + {{$count}});
            var data2 = "null";
            if (element2) {
                data2 = element2.innerHTML;
            }
            document.getElementById('editData2'+{{$count}}).value = data2;

            var element3 = document.getElementById('viewerEdit3' + {{$count}});
            var data3 = "null";
            if (element3) {
                data3 = element3.innerHTML;
            }
            document.getElementById('editData3'+{{$count}}).value = data3;

            form.submit();

        };
        

      </script>

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
                <form id="form1" method="POST" action="{{route('slides.store', ['id'=>$presentation])}}">
                    @csrf


                    <div class="outlined-div2" style="display: flex; align-items: center; justify-content: center; display: none;" id="sectionToToggle1">
                      <div style="display: flex; flex-direction: row; align-items: center; justify-content: space-between; width: 100%;">
                        <div style="flex: 1; padding: 20px;">
                          <p><strong>Text Box 1:</strong></p><br>
                          <p>Choose a box shape:</p>
                          <input type="hidden" name="checkbox1" value="">
                          <div style="display: flex; flex-direction: row; align-items: center;">
                            <input type="checkbox" class="checkboxes1" value="S" name="checkbox1[]">
                            <label for="checkbox1">  Small Box</label>
                          </div>
                          <div style="display: flex; flex-direction: row; align-items: center;">
                            <input type="checkbox" class="checkboxes1" value="V" name="checkbox1[]">
                            <label for="checkbox2">  Vertical Rectangle</label>
                          </div>
                          <div style="display: flex; flex-direction: row; align-items: center;">
                            <input type="checkbox" class="checkboxes1" value="H" name="checkbox1[]">
                            <label for="checkbox3">  Horizontal Rectangle</label>
                          </div>
                          <div style="display: flex; flex-direction: row; align-items: center;">
                            <input type="checkbox" class="checkboxes1" value="B" name="checkbox1[]">
                            <label for="checkbox4">  Big Square</label>
                          </div>
                          <br>
                          <p>Your Text (select text to edit style):</p>
                          <div class="editor1 ck-editor__editable outlined-div" id="grid1" style="width=100%;"></div>
                          <br>
                          <label for="boxColour1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a box colour:</label>
                          <select id="boxColour1" name="boxColour1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected value="null">Choose a colour</option>
                            <option value="g">Light Green</option>
                            <option value="p">Light Purple</option>
                            <option value="w">White</option>
                          </select>
                          <br>
                          <p>Choose a position for your text box (visual tutorial for help->):</p>
                          <div class="relative mb-3 xl:w-96" data-te-input-wrapper-init>
                            <textarea
                              class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outlined-div transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                              id="boxPos1"
                              rows="1"
                              name="boxPos1"
                              placeholder="Text box grid position"></textarea>
                            <label
                              for="boxPos1"
                              class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                              >Text Box Position (e.g 1)</label
                            >
                          </div>
                          <br>
                        </div>
                        <div style="flex: 1;">
                          <img src="image.jpg" alt="Large Image" style="width: 100%; height: 300px;">
                        </div>
                      </div>
                    </div>
                   
                    <div class="outlined-div2" style="display: flex; align-items: center; justify-content: center; display: none;" id="sectionToToggle2">
                      <div style="display: flex; flex-direction: row; align-items: center; justify-content: space-between; width: 100%;">
                        <div style="flex: 1; padding: 20px;">
                          <p><strong>Text Box 2:</strong></p><br>
                          <p>Choose a box shape:</p>
                          <input type="hidden" name="checkbox2" value="">
                          <div style="display: flex; flex-direction: row; align-items: center;">
                            <input type="checkbox" class="checkboxes2" value="S" name="checkbox2[]">
                            <label for="checkbox1">  Small Box</label>
                          </div>
                          <div style="display: flex; flex-direction: row; align-items: center;">
                            <input type="checkbox" class="checkboxes2" value="V" name="checkbox2[]">
                            <label for="checkbox2">  Vertical Rectangle</label>
                          </div>
                          <div style="display: flex; flex-direction: row; align-items: center;">
                            <input type="checkbox" class="checkboxes2" value="H" name="checkbox2[]">
                            <label for="checkbox3">  Horizontal Rectangle</label>
                          </div>
                          <div style="display: flex; flex-direction: row; align-items: center;">
                            <input type="checkbox" class="checkboxes2" value="B" name="checkbox2[]">
                            <label for="checkbox4">  Big Square</label>
                          </div>
                          <br>
                          <p>Your Text (select text to edit style):</p>
                          <div class="editor2 ck-editor__editable outlined-div" id="grid2" style="width=100%;"></div>
                          <br>
                          <label for="boxColour2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a box colour:</label>
                          <select id="boxColour2" name="boxColour2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected value="null">Choose a colour</option>
                            <option value="g">Light Green</option>
                            <option value="p">Light Purple</option>
                            <option value="w">White</option>
                          </select>
                          <br>
                          <p>Choose a position for your text box (visual tutorial for help->):</p>
                          <div class="relative mb-3 xl:w-96" data-te-input-wrapper-init>
                            <textarea
                              class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outlined-div transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                              id="boxPos2"
                              rows="1"
                              name="boxPos2"
                              placeholder="Text box grid position"></textarea>
                            <label
                              for="boxPos2"
                              class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                              >Text Box Position (e.g 1):</label
                            >
                          </div>
                        </div>
                        <div style="flex: 1;">
                          <img src="image.jpg" alt="Large Image" style="width: 100%; height: 300px;">
                        </div>
                      </div>
                    </div>

                    <div class="outlined-div2" style="display: flex; align-items: center; justify-content: center; display: none;" id="sectionToToggle3">
                      <div style="display: flex; flex-direction: row; align-items: center; justify-content: space-between; width: 100%;">
                        <div style="flex: 1; padding: 20px;">
                          <p><strong>Text Box 3:</strong></p><br>
                          <p>Choose a box shape:</p>
                          <input type="hidden" name="checkbox3" value="">
                          <div style="display: flex; flex-direction: row; align-items: center;">
                            <input type="checkbox" class="checkboxes3" value="S" name="checkbox3[]">
                            <label for="checkbox1">  Small Box</label>
                          </div>
                          <div style="display: flex; flex-direction: row; align-items: center;">
                            <input type="checkbox" class="checkboxes3" value="V" name="checkbox3[]">
                            <label for="checkbox2">  Vertical Rectangle</label>
                          </div>
                          <div style="display: flex; flex-direction: row; align-items: center;">
                            <input type="checkbox" class="checkboxes3" value="H" name="checkbox3[]">
                            <label for="checkbox3">  Horizontal Rectangle</label>
                          </div>
                          <div style="display: flex; flex-direction: row; align-items: center;">
                            <input type="checkbox" class="checkboxes3" value="B" name="checkbox3[]">
                            <label for="checkbox4">  Big Square</label>
                          </div>
                          <br>
                          <p>Your Text (select text to edit style):</p>
                          <div class="editor3 ck-editor__editable outlined-div" id="grid3" style="width=100%;"></div>
                          <br>
                          <label for="boxColour3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a box colour:</label>
                          <select id="boxColour3" name="boxColour3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected value="null">Choose a colour</option>
                            <option value="g">Light Green</option>
                            <option value="p">Light Purple</option>
                            <option value="w">White</option>
                          </select>
                          <br>
                          <p>Choose a position for your text box (visual tutorial for help->):</p>
                          <div class="relative mb-3 xl:w-96" data-te-input-wrapper-init>
                            <textarea
                              class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outlined-div transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                              id="boxPos3"
                              rows="1"
                              name="boxPos3"
                              placeholder="Text box grid position"></textarea>
                            <label
                              for="boxPos3"
                              class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                              >Text Box Position (e.g 1):</label
                            >
                          </div>
                        </div>
                        <div style="flex: 1;">
                          <img src="image.jpg" alt="Large Image" style="width: 100%; height: 300px;">
                        </div>
                      </div>
                    </div>
                    
                    <button id="toggleButton">Add text box</button>

                    <input type="hidden" name="grid1_data" id="grid1_data" value="">
                    <input type="hidden" name="grid2_data" id="grid2_data" value="null">
                    <input type="hidden" name="grid3_data" id="grid3_data" value="null">

                    <br>

                    <br>
                    <p>Add a 3D Model:</p>
                    <div class="relative mb-3 xl:w-96" data-te-input-wrapper-init>
                      <textarea
                        class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outlined-div transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                        id="objID"
                        rows="1"
                        name="obj"
                        type="text"
                        placeholder="Sketchfab Model Link"></textarea>
                      <label
                        for="objID"
                        class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                        >Sketchfab Model Link</label
                      >
                    </div>
                    <br>

                    <button
                    onclick="submitNewSlide()"
                    class="inline-block rounded-full border-2 border-danger px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-danger transition duration-150 ease-in-out hover:border-danger-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-danger-600 focus:border-danger-600 focus:text-danger-600 focus:outline-none focus:ring-0 active:border-danger-700 active:text-danger-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                    data-te-ripple-init>
                      Save New Slide
                    </button>
                    <a href="{{route('presentations.index')}}">Cancel</a>
                </form>
            </div>
        </div>
      </div>
    </div>
    @endif


    <script>
      for (var i = 1; i <= 3; i++) {
        BalloonEditor
            .create( document.querySelector( '.editor'+i ), {
              
              licenseKey: '',
              
              
              
            } )
            .then( editor => {
              window.editor = editor;
              editor.name = 'editor' + i;
          
              
              
              
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
      
        submitNewSlide()
        {
          
          var sourceDiv = document.getElementById("grid1");
          var sourceContent = sourceDiv.innerHTML;
          var destInput = document.getElementById("grid1_data");
          destInput.value = sourceContent;
        

          /*

        var grid1Data = document.getElementById('grid1').innerHTML;
        if (grid1Data === null || grid1Data === "<p><br data-cke-filler=\"true\"></p>") {
              grid1Data = "null";
        }
        document.getElementById('grid1_data').value = grid1Data;
        var grid2Data = document.getElementById('grid2').innerHTML;
        if (grid2Data === null || grid2Data === "<p><br data-cke-filler=\"true\"></p>") {
              grid2Data = "null";
        }
        document.getElementById('grid2_data').value = grid2Data;
        var grid3Data = document.getElementById('grid3').innerHTML;
        if (grid3Data === null || grid3Data === "<p><br data-cke-filler=\"true\"></p>") {
              grid3Data = "null";
        }
        document.getElementById('grid3_data').value = grid3Data;
        */
        var form1 = document.getElementById('form1');
        
        form1.submit();

      };
    </script>
    @endauth
</div>


<br><br>






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
  const checkboxesClass1 = document.querySelectorAll('.checkboxes1'); // only one from each class can be selected
  const checkboxesClass2 = document.querySelectorAll('.checkboxes2');
  const checkboxesClass3 = document.querySelectorAll('.checkboxes3');

  const editCheckboxesClass1 = document.querySelectorAll('.editCheckboxes1');
  const editCheckboxesClass2 = document.querySelectorAll('.editCheckboxes2');
  const editCheckboxesClass3 = document.querySelectorAll('.editCheckboxes3');

  function limitCheckboxSelection(checkboxes) {
    checkboxes.forEach(checkbox => {
      checkbox.addEventListener('change', () => {
        checkboxes.forEach(cb => {
          if (cb !== checkbox) {
            cb.checked = false;
          }
        });
      });
    });
  }

  limitCheckboxSelection(checkboxesClass1);
  limitCheckboxSelection(checkboxesClass2);
  limitCheckboxSelection(checkboxesClass3);
  limitCheckboxSelection(editCheckboxesClass1);
  limitCheckboxSelection(editCheckboxesClass2);
  limitCheckboxSelection(editCheckboxesClass3);
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
