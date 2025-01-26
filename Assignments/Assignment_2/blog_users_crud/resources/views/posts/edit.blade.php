<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Edit Post</h1>
<form action="{{ route('posts.update', $post) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Title:</label>
    <input type="text" name="title" value="{{ $post->title }}" required>
    <label>Content:</label>
    <textarea name="content" required>{{ $post->content }}</textarea>
    <button type="submit">Update</button>
</form>

</body>
</html>