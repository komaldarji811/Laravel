@extends('student.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-6">
            <h1>{{$student->id}}</h1>
            <h2>{{$student->student_name}}</h2>
            <img src="/images/{{$student->student_img}}" height="40">
        </div>
    </div>
</div>
@endsection