@extends('layouts.main')

@section('content')
   <div style="margin-left: 15px;">
       @foreach($articles as $key => $value)
           <p><a href="{{ route('article', ['id' => $key]) }}">{{ $key }} - {{ $value }}</a></p>
       @endforeach
   </div>
   <br>
   <div style="margin: 20px;">
     @include('articles.add')
   </div>
@stop