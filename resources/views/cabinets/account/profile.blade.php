@extends('layouts.cabinet')

@section('title' , 'Профиль пользователя ' . $user->username)

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">{{ $user->username }}</h2>
                    <h5 class="text-white op-7 mb-2">Профиль пользователя</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card card-profile">
                    <div class="card-header">
                        <div class="profile-picture">
                            <div class="avatar avatar-xl">
                                <img src="{{ asset('images/noavatar.png') }}" alt="..." class="avatar-img rounded-circle">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="user-profile text-center">
                            <div class="name">{{ $user->username }}</div>
                            <div class="job">
                                @if($user->type_account == 1)
                                    Администратор
                                @elseif($user->type_account == 2)
                                    Пользователь
                                @elseif($user->type_account == 3)
                                    Исполнитель
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row user-stats text-center">
                            <div class="col">
                                <div class="number">{{ $user->sites->count() }}</div>
                                <div class="title">Сайтов</div>
                            </div>
                            <div class="col">
                                <div class="number">{{ $user->sites->sum('rating') }}</div>
                                <div class="title">Рейтинг</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection