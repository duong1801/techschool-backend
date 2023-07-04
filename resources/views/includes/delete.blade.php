<form action="{{ route($route, $id) }}" method="post" class=" d-inline">
    @csrf
    @method('DELETE')
    <button type="submit"class="btn btn-danger del">Xóa</button>
</form>


