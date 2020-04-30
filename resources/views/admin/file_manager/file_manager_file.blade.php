@extends('template_admin/main')
@section('title_post', 'File Manager File')
@section('sub1', 'File Manager')
@section('sub2', 'File')

@section('content')

<iframe src="{{ url('laravel-filemanager?type=File&CKEditor=content&CKEditorFuncNum=1&langCode=id')}}" style="width: 100%; height: 700px; overflow: hidden; border: none;"></iframe>

@endsection