@extends('users.master')

@section('content')

<div class="container my-5">
    <div class="row">
        <div class="col-xl-6">
            <h1>Login Form</h1>
            <form method="post" action="{{route('userlogin')}}">
                @csrf
                @if(Session::has('error'))
                {{Session::get('error')}}
                @endif
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" value="{{old('email')}}" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <span class="text-danger">
                        @error('email')
                        {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password"  name="password" value="{{old('password')}}"  class="form-control" id="exampleInputPassword1">
                    <span class="text-danger">
                        @error('password')
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