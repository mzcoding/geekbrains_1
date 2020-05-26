@extends('news.layouts.app')
@section('content')
    @include('news.partials.messages')
    <a href="{{ route('news.index') }}">List news</a><br>
    <a href="{{ route('categories.create') }}">Add category</a><br>
    <table width="100%">
        <thead>

        </thead>
        <tbody>
         @foreach($categories as $category)
             <tr>
                 <td>{{ $category->id }}</td>
                 <td>{{ $category->title }}</td>
                 <th><a href="{{ route('categories.edit',
                              ['category' => $category]) }}">edit</a> |
                     <a href="{{ route('categories.destroy',
                              ['category' => $category]) }}">delete</a></th>
             </tr>
         @endforeach
        </tbody>
    </table>
@stop