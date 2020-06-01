@extends('news.layouts.app')
@section('content')
    @include('news.partials.messages')
    <div>
        <form method="post" action="{{ route('categories.update', ['category' => $category]) }}">
            @csrf
            @method('PUT')
            <p>Наименование: <input type="text" name="title" value="{{ $category->title }}">
                @if($errors->has('title'))
                    <div class="alert alert-danger">
            @foreach($errors->get('title') as $error)
                <p>{{ $error }} </p>
        @endforeach
    </div>
    @endif
            </p>
            <p>Слаг: <input type="text" name="slug" value="{{ $category->slug }}">
                @if($errors->has('slug'))
                    <div class="alert alert-danger">
    @foreach($errors->get('slug') as $error)
        <p>{{ $error }} </p>
        @endforeach
        </div>
        @endif
            </p>
            <br><input type="submit" value="Ok">
        </form>
    </div>
@stop