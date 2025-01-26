<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Create Category</h1>
<form action="{{ route('category.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Category Name">
    <textarea name="desc" placeholder="Description"></textarea>
    <button type="submit">Save</button>
</form>

</body>
</html>