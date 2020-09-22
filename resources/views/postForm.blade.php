<html>
<head>
</head>
<body>
<form method="post" action="{{route('FormPost')}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" name="hoten">
    <input type="text" name="tuoi">
    <input type="submit">
</form>
</body>
</html>