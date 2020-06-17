<!DOCTYPE html>
<html>
<head></head>
<body>
    <form action="{{route('test')}}" enctype="multipart/form-data" method="post">
        @csrf
        <input name="image" type="file">
        <button type="submit">upload</button>
    </form>
</body>
</html>
