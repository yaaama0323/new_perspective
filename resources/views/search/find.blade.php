
 <form action="/person/find" method="post">
    <input type="text" name="input" value="{{$input}}">
    <input type="submit" value="find">
</form>

@if (isset($item))

<table> 
    <tr><th>Name</th><th>mail</th>
    @foreach ($items as $item)
    <tr>
        <td>{{$item->user_id}}<td>
</tr>
@endforeach
</table>
@endif