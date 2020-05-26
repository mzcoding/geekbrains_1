@extends('news.layouts.app')
@section('content')
    @include('news.partials.messages')
    <div>
         <form method="post" action="{{ route('categories.store') }}">
             @csrf
             <p>Наименование: <input type="text" name="title"> </p>
             <p>Слаг: <input type="text" name="slug"> </p>
             <br><input type="submit" value="Ok">
         </form>
    </div>
@stop