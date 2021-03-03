@extends('layouts.cabinet')

@section('title' , 'Редактировать задание')

@section('content')
    <update-task :current="{{ $task }}" :categories="{{ $categories }}"></update-task>
@endsection