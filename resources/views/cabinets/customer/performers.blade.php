@extends('layouts.cabinet')

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
                @if($users->isEmpty())
                    <div class="alert alert-danger mb-0" role="alert">
                        На данный момент отсутствуют исполнители
                    </div>
                @else
                    @foreach($users as $user)
                        <div class="d-flex">
                            <div class="avatar">
                                <span class="avatar-title rounded-circle border border-white bg-info">{{ ucfirst(substr($user->username , 0 , 1)) }}</span>
                            </div>

                            <div class="flex-wrap ml-3 pt-1">
                                <h6 class="text-uppercase fw-bold mb-3"><a href="{{ route('cabinet.show.profile', $user) }}">{{ $user->username }}</a></h6>
                                <p class="text-muted mb-1">Сайты: <i class="fal fa-sitemap"></i> ( {{ $user->sites->count() }} )</p>
                                <p class="text-muted m-0">Рейтинг: <i class="fad fa-star"></i> ( {{ $user->sites->sum('rating') }} )</p>
                            </div>


                        </div>
                        <div class="separator-dashed"></div>
                    @endforeach
                        {{ $users->links() }}
                @endif
            </div>
        </div>
    </div>
@endsection