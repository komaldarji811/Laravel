<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body >
    <ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{URL::to('/')}}">Student Details</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{URL::to('create')}}">Create</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{URL::to('edit')}}">Edit</a>
    </li>
    </ul>

    <div class="d-flex  px-4 justify-content-center">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            
                @foreach($students as $student)
                <tr>
                    <td>{{$student->id}}</td>
                    <td>{{$student->firstname}}</td>
                    <td>{{$student->lastname}}</td>
                    <td>
                        <a href="{{URL::to('view',$student->id)}}" class="btn btn-info">View</a>
                        <a href="{{URL::to('edit',$student->id)}}" class="btn btn-warning">Edit</a>
                        <form method="post" action="{{URL::to('delete',$student->id)}}">
                        @csrf
                        <input type="submit" class="btn btn-danger" value="Delete"></button>
                        </form>
                        
                    </td>
                    </tr>
                @endforeach
            
            </tbody>
        </table>
        </div>
</body>
</html>