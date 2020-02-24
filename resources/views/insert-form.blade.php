<form action="{{route('products.store')}}" method="post">
    @csrf
    <input type="submit" value="Insert">
</form>
