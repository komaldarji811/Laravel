@extends('users.master')

@section('content')

<div class="container my-5">
    <div class="row">
        <div class="col-xl-6">
            <h1>Registration Form</h1>
            <form method="post" action="{{route('useregister')}}">
                @csrf
                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                 {{Session::get('success')}}
                </div>
                @endif
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('username')}}">
                    <span class="text-danger">
                       @error('username')
                       {{$message}}
                       @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="useremail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('useremail')}}">
                    <span class="text-danger">
                       @error('useremail')
                       {{$message}}
                       @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="userpassword" class="form-control" id="exampleInputPassword1" value="{{old('userpassword')}}">
                    <span class="text-danger">
                       @error('userpassword')
                       {{$message}}
                       @enderror
                    </span>
                </div>
               <button type="submit" class="btn btn-primary">Submit</button>
                </form>
        </div>
    </div>
</div>

@endsection