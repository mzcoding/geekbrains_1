@extends('news.layouts.app')
@section('content')
    @include('news.partials.messages')
    <div>
        <form method="post" action="{{ route('news.store') }}">
            @csrf
            <p>Наименование: <input type="text" name="title"> </p>
            <p>Слаг: <input type="text" name="slug"> </p>
            <p>Статус: <select name="status">
                  <option value="new">New</option>
                  <option value="draft">Draft</option>
                  <option value="published">Published</option>
                </select> </p>
            <p>Текст: <textarea name="description"></textarea></p>
            <br><input type="submit" value="Ok">
        </form>
    </div>
@stop