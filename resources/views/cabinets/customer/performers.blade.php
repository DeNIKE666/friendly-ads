@extends('layouts.cabinets.customer')

@section('title' , 'Исполнители')

@section('content')

    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Исполнители</h2>
                    <h5 class="text-white op-7 mb-2">Все исполнители проекта</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="page-inner mt--5">
        <div class="card full-height">
            <div class="card-body">
                @foreach($users as $user)
                    <div class="d-flex">
                        <div class="avatar avatar-online">
                            <span class="avatar-title rounded-circle border border-white bg-info">{{ ucfirst(substr($user->username , 0 , 1)) }}</span>
                        </div>
                        <div class="flex-1 ml-3 pt-1">
                            <h6 class="text-uppercase fw-bold mb-1">{{ $user->username }} <span class="fw-bold pl-3"><i class="fal fa-sitemap"></i> ( {{ $user->sites->count() }} )</span> <span class="fw-bold pl-3"><i class="fad fa-star"></i> ( {{ $user->sites->sum('rating') }} )</span> </h6>
                            <span class="text-muted">Пользователь который предоставляет рекламу на своем сайте</span>
                        </div>
                        <div class="float-right pt-1">
                            <button class="btn btn-primary btn-border"><i class="fal fa-paper-plane"></i> Предложить</button>
                        </div>
                    </div>
                    <div class="separator-dashed"></div>
                @endforeach
            </div>
        </div>
    </div>
@endsection