@extends('layouts.cabinet')

@section('title' , 'Добавить новую задачу')

@section('content')
    <create-task :categories="{{ $categories }}"></create-task>
@endsection