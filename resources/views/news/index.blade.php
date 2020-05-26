@extends('news.layouts.app')
@section('content')
    @include('news.partials.messages')

    <a href="{{ route('news.create') }}">Add news</a><br>
    <a href="{{ route('categories.index') }}">List category</a><br>
    <table width="100%">
        <thead>

        </thead>
        <tbody>
        @foreach($news as $n)
            <tr>
                <td>{{ $n->id }}</td>
                <td>{{ $n->title }}</td>
                <td>{{ $n->slug }}</td>
                <td>{{ $n->status }}</td>
                <th><a href="{{ route('news.edit',
                              ['news' => $n]) }}">edit</a> |
                    <a href="{{ route('news.destroy',
                              ['news' => $n]) }}">delete</a></th>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $news->links() }}
@stop