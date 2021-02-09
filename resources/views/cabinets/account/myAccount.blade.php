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
                                <img src="{{ asset('images/noavatar.png') }}" alt="..."
                                     class="avatar-img rounded-circle">
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

                        <form action="{{ route('profile.update') }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Имя</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Заполните поле" value="{{ old('name', auth()->user()->name) }}">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Заполните поле"  value="{{ old('email', auth()->user()->email) }}">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telegram_id">Ваш телеграм</label>
                                        <input id="telegram_id" type="text" class="form-control" name="telegram_id" placeholder="Введите ваш телеграм id узнать можно @my_id_bot" value="{{ old('telegram_id', auth()->user()->telegram_id) }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Имя пользователя</label>
                                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Заполните поле"  value="{{ old('username', auth()->user()->username) }}">
                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="about-me">Обо мне: </label>
                                        <textarea id="about-me" class="form-control @error('about_me') is-invalid @enderror" name="about_me" placeholder="Расскажите о себе..." rows="3">{{ old('about_me', auth()->user()->about_me) }}</textarea>
                                        @error('about_me')
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary-light">СОХРАНИТЬ</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection