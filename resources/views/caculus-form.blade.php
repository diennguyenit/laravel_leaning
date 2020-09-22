<form method="post" action="{{'ptb2'}}">
    {{csrf_field()}}
    <label>a: <input type="text" name="a"></label>
    <label>b: <input type="text" name="b"></label>
    <label>c: <input type="text" name="c"></label>
    <input type="submit">
</form>
<label>result: {{$result}} </label>
