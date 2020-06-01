@extends('news.layouts.app')
@section('content')
    <div class="col-md-4">
        <form method="post" action="{{ route('categories.store') }}">
            @csrf
            <p>Наименование: <input type="text" name="title" class="form-control">
            @if($errors->has('title'))
            <div class="alert alert-danger">
            @foreach($errors->get('title') as $error)
                <p>{{ $error }} </p>
            @endforeach
           </div>
          @endif
    </p>
    <p>Слаг: <input type="text" name="slug" class="form-control">
        @if($errors->has('slug'))
            <div class="alert alert-danger">
        @foreach($errors->get('slug') as $error)
          <p>{{ $error }} </p>
        @endforeach
        </div>
        @endif
        </p>
        <br><input type="submit" value="Ok" class="btn btn-danger">
        </form>
        </div>
@stop