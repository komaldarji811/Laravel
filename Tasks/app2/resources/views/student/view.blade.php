<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <a href="{{URL::to('/')}}">Go back</a>
    <h1>View Details</h1>
    <h2>{{$student->id}}</h2>
    <h2>{{$student->firstname}}</h2>
    <h2>{{$student->lastname}}</h2>
</div>
</body>
</html>