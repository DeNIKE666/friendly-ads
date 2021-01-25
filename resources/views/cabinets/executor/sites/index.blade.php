@extends('layouts.cabinets.executor')

@section('title' , 'Мои сайты')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Сайты</h2>
                    <h5 class="text-white op-7 mb-2">Все ваши сайты добавленные в проект</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row">
            @forelse($sites as $site)
                <div class="col-md-2">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('images/325x215.png') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title mb-2 fw-mediumbold">{{ $site->title }}</h5>
                            <p class="card-text">{{ $site->short }}</p>
                            <p class="card-text">Категория: {{ $site->category->name }}</p>
                            <a href="{{ $site->url }}" class="btn btn-warning">Перейти</a>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </div>
@endsection