@extends('student.master')

@section('content')
<div class="container">
    <form method="post" action="{{route('student.update',$student->id)}}" enctype='multipart/form-data'>
        @csrf
        @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Student name</label>
        <input type="text" class="form-control" id="input1" aria-describedby="" name="student_name" value="{{$student->student_name}}">
    </div>
    <div class="mb-3">
        <label for="photo" class="form-label">Photo</label>
        <input type="file" class="form-control" id="input2" aria-describedby="" name="student_img">
    </div>
    <img src="/images/{{$student->student_img}}" height="40">
    <br>
    <button type="submit" class="btn btn-primary my-4">Submit</button>
    </form>
</div>

@endsection