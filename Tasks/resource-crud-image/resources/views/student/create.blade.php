@extends('student.master')

@section('content')
<div class="container">
    <form method="post" action="{{route('student.store')}}" enctype='multipart/form-data'>
        @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Student name</label>
        <input type="text" class="form-control" id="input1" aria-describedby="" name="student_name">
    </div>
    <div class="mb-3">
        <label for="photo" class="form-label">Photo</label>
        <input type="file" class="form-control" id="input2" aria-describedby="" name="student_img">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection