@extends('layouts.cabinet')

@section('title' , 'Мой аккаунт')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Мой профиль</h2>
                    <h5 class="text-white op-7 mb-2">Вы сможете отредактировать ваш профиль в любой момент</h5>
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
                            <div class="name">{{ auth()->user()->username }}</div>
                            <span>
                                @if(auth()->user()->type_account == 1)
                                    Администратор
                                @elseif(auth()->user()->type_account == 2)
                                    Заказчик
                                @elseif(auth()->user()->type_account == 3)
                                    Исполнитель
                                @endif
                            </span>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label for="name">Имя</label>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ auth()->user()->name }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ auth()->user()->email }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label for="telegram_id">Ваш телеграм</label>
                                    <input id="telegram_id" type="text" class="form-control" name="telegram_id" placeholder="Введите ваш телеграм id узнать можно @my_id_bot" value="{{ auth()->user()->telegram_id }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label for="username">Имя пользователя</label>
                                    <input id="username" type="text" class="form-control" name="username" value="{{ auth()->user()->username }}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label for="about-me">Обо мне: </label>
                                    <textarea id="about-me" class="form-control" name="about" placeholder="Расскажите о себе..." rows="3"></textarea>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection