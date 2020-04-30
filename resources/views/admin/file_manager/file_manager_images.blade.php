@extends('template_admin/main')
@section('title_post', 'File Manager Images')
@section('sub1', 'File Manager')
@section('sub2', 'Picture')

@section('content')

<iframe src="{{ url('laravel-filemanager?type=Images&CKEditor=content&CKEditorFuncNum=1&langCode=id') }}" style="width: 100%; height: 700px; overflow: hidden; border: none;"></iframe>

@endsection