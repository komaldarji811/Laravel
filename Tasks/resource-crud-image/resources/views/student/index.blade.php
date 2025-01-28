@extends('student.master')

@section('content')
<div class="container my-5">

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Student
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      
      </form>
    </div>
  </div>
</div>

<div class="row mx-5 my-5">
        <div class="col-xl-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Name</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($student as $s)
                    <tr>
                        <th scope="row">{{$s->id}}</th>
                        <td>
                            <img src="{{asset('images/'.$s->student_img)}}" alt="{{$s->student_img}}" width="30" height="30">
                        </td>
                        <td>{{$s->student_name}}</td>
                        <td>
                            <a href="{{route('student.show',$s->id)}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                            <a href="{{route('student.edit',$s->id)}}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                            <a href="{{route('student.destroy',$s->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection