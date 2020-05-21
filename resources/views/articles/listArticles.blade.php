@extends('layouts.main')

@section('content')
   <div style="margin-left: 15px;">
       <p>Всего записей: {{ $countArticles }}</p>
       @foreach($articles as $article)
           <p>
               <a href="{{ route('article', ['id' => $article->id]) }}">
                   {{ $article->id }} - {{ $article->title }}
               </a>
           </p>
       @endforeach
   </div>
   <br>
   <div style="margin: 20px;">
     @include('articles.add')
   </div>
@stop