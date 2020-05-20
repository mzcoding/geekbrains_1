
<form method="post" action="{{ route('articles') }}">
    @csrf
    <p>
        <input class="form-control" type="text" name="title" value="{{ old('title') }}" placeholder="Заголовок">
    </p>
    <p>
        <input class="form-control" type="date" name="created_at" placeholder="Дата добавления">
    </p>
    <p>
        <textarea class="form-control" name="text">{!! old('text') !!}</textarea>
    </p>
    <button type="submit" class="btn btn-danger">Add</button>
</form>