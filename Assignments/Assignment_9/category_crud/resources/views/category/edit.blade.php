<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h1>Edit Category</h1>
<form action="{{ route('category.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $category->name }}">
    <textarea name="desc">{{ $category->desc }}</textarea>
    <button type="submit">Update</button>
</form>

</body>
</html>