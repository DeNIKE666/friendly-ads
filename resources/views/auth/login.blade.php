@extends('layouts.account')

@section('content')
    <div class="container container-login animated fadeIn">
        <h3 class="text-center">Авторизация в личном кабинете</h3>
        <form action="{{ route('login') }}" method="POST">
            @CSRF
            <div class="login-form">
                <div class="form-group">
                    <label for="email" class="placeholder"><b>E-mail</b></label>
                    <input id="email" name="email" type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="placeholder"><b>Пароль</b></label>
                    <a href="#" class="link float-right">Забали пароль ?</a>
                    <div class="position-relative">
                        <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="show-password">
                            <i class="icon-eye"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group form-action-d-flex justify-content-center mb-3">
                    <button type="submit" class="btn btn-primary col-md-5  mt-3 mt-sm-0 fw-bold">Войти</button>
                </div>
                <div class="login-account">
                    <span class="msg">Нет аккаунта ?</span>
                    <a href="{{ route('register')  }}" id="show-signup" class="link">Создать аккаунт</a>
                </div>
            </div>
        </form>
    </div>
@endsection
