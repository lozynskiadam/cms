<form action="{{ $route }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-default text-danger">
        <i class="fas fa-trash"></i>
    </button>
</form>
