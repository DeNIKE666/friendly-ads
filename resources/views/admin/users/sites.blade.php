@extends('layouts.admin')

@section('title' , 'Управление пользователями')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Сайты</h2>
                    <h5 class="text-white op-7 mb-2">Все сайты пользователя</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="card">
            <div class="card-header">
                Список сайтов
            </div>
            <div class="card-body">
                @forelse($sites as $site)
                    <blockquote class="blockquote mb-0">
                        <p>{{ $site->short }}</p>
                        <p>Название: {{ $site->title }}</p>
                        <p>Категория: {{ $site->category->name }}</p>
                        <p>Ссылка: <a href="{{ $site->url }}">перейти</a></p>
                    </blockquote>
                    <hr>
                @empty
                    <p class="text-center">НЕТ САЙТОВ</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
