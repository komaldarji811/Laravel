<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <h1>Blog Posts</h1>
    <a href="{{ route('posts.create') }}"class="btn btn-info">Create Post</a>

    <div class="container">
        <div class="row justify-content-center">
           <div class="col-xl-12">
                
                <table class="table">
                    <thead class="">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Content</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($posts as $post)
                       <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->content }}</td>
                        <td>
                             <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Edit</a>
                             <form action="{{ route('posts.destroy', $post) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
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