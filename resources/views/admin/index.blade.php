@extends('layouts.app')

@section('content')

    <div class="col-2" style="margin-left: 10px;">
        @foreach($uploads as $upload)
            <p><a href="{{ \Storage::disk('uploads')->url($upload->file) }}">{{ $upload->title }}</a></p>
        @endforeach
        <br><hr><br>
        <h2>Загрузить файл</h2>
        <br>
    <form method="post" enctype="multipart/form-data" action="{{ route('upload.save') }}">
        @csrf
        <p>Заголовок: <input type="text" name="title" class="form-control"></p>
        <p>File: <input type="file" name="file"></p>
<p><textarea id="text" name="text"></textarea></p>
        <br>
        <button class="btn btn-danger">Save</button>


    </form>
    </div>

@stop
@push('js')
    <script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
         CKEDITOR.replace('text');
    </script>
@endpush