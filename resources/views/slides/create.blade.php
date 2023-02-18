@extends('presentations.show')

@section('addSlide')

<form method="POST" action="{{route('slides.store', ['id'=>$presentation])}}">
    @csrf
    <p>Text1: </p>
    <textarea type="text" name="text1" rows=3 style="width: 30%"></textarea>
    <p>Text2: </p>
    <textarea type="text" name="text2" rows=3 style="width: 30%"></textarea>
    <p>Text3: </p>
    <textarea type="text" name="text3" rows=3 style="width: 30%"></textarea>
    <p>Obj Ref: </p>
    <textarea  type="text" name="obj" rows=3 style="width: 30%"></textarea>
    <input type="submit" value="Save">
    <a href="{{route('presentations.index')}}">Cancel</a>
</form>

@endsection