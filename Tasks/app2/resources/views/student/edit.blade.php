<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{URL::to('/')}}">Student Details</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{URL::to('create')}}">Create</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="{{URL::to('edit')}}">Edit</a>
    </li>
    </ul>
<div class="d-flex  px-4 py-5 justify-content-center">
    <form class="row g-3" method="post" action="{{URL::to('update',$student->id)}}">
        @csrf
        <div class="col-md-12">
            <label for="" class="form-label">Firstname</label>
            <input type="text" name="fname" class="form-control" id="" value="{{$student->firstname}}">
        </div>
        <div class="col-md-12">
            <label for="" class="form-label">Lastname</label>
            <input type="text" name="lname" class="form-control" id="" value="{{$student->lastname}}">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
        </form>
</div>
</body>
</html>