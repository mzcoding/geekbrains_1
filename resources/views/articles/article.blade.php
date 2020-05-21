@extends('layouts.main')

@section('content')
<div style="margin-left: 15px;">
    @if((bool)$article->published === true)
    <h3>{{ $article->title }}</h3>
    <div>
        {!! $article->text !!}
    </div>
    @else
        <h3>Эта статья в разработке</h3>
    @endif
</div>
@stop