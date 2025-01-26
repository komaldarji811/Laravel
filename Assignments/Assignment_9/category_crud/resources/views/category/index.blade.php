<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        .table {
            text-align: center;
        }

        th, td {
            padding: 10px;
        }
    </style>
</head>
<body>
    
<h1>category Details</h1>
<a href="{{ route('category.create') }}" class="btn btn-info">Create Category</a>
<div class="container">
        <div class="row justify-content-center">
           <div class="col-xl-12">
                
                <table class="table">
                    <thead class="">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($category as $c)
                       <tr>
                        <td>{{ $c->id }}</td>
                        <td>{{ $c->name }}</td>
                        <td>{{ $c->desc }}</td>
                        <td>
                             <a href="{{ route('category.edit', $c->id) }}" class="btn btn-warning">Edit</a>
                             <form action="{{ route('category.destroy', $c->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        </td>
                       </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>