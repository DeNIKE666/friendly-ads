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
                <div class="col-md-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('images/no-image.jpg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title mb-2 fw-mediumbold">{{ $site->title }}</h5>
                            <p class="card-text">Категория: <span class="badge badge-default float-right">{{ $site->category->name }}</span></p>
                            <p class="card-text">Активация:
                                @if($site->activated == 0)
                                    <span class="badge badge-danger float-right">в процессе активации</span>
                                @else
                                    <span class="badge badge-success float-right">активирован</span>
                                @endif
                            </p>
                            <p class="card-text">Рейтинг: <span class="badge badge-default float-right">{{ $site->rating }}</span></p>
                            <hr>
                            <div class="d-flex justify-content-lg-between">
                                <a href="{{ $site->url }}" class="btn btn-primary mr-1"><i class="fad fa-external-link"></i></a>
                                <a href="{{ $site->url }}" class="btn btn-danger"><i class="far fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <div class="alert alert-warning" role="alert">
                        Извините, у вас на данный момент нет сайтов <a href="{{ route('executor.sites.create') }}"><b>добавьте</b></a> ваши сайты в систему.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection