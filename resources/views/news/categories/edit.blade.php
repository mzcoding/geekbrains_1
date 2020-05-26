@extends('news.layouts.app')
@section('content')
    @include('news.partials.messages')
    <div>
        <form method="post" action="{{ route('categories.update', ['category' => $category]) }}">
            @csrf
            @method('PUT')
            <p>Наименование: <input type="text" name="title" value="{{ $category->title }}"> </p>
            <p>Слаг: <input type="text" name="slug" value="{{ $category->slug }}"> </p>
            <br><input type="submit" value="Ok">
        </form>
    </div>
@stop