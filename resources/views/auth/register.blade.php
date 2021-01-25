@extends('layouts.account')

@section('content')
    <div class="container container-signup animated fadeIn">
        <h3 class="text-center">Создать аккаунт</h3>
        <form action="{{ route('register') }}" method="POST">
            @CSRF
            <div class="login-form">

                <div class="form-group">
                    <label for="name" class="placeholder"><b>Ваше имя:</b></label>
                    <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>

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
                    <label for="username" class="placeholder"><b>Логин</b></label>
                    <input id="username" name="username" type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}">
                    @error('username')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="type_account">Тип аккаунта:</label>
                    <select id="type_account" class="form-control @error('type_account') is-invalid @enderror" name="type_account">
                        <option value="">-- Выберите тип аккаунта</option>
                        <option value="2" {{ old('type_account') == 2 ? 'selected' : '' }}>Пользователь</option>
                        <option value="3" {{ old('type_account') == 3 ? 'selected' : '' }}>Исполнитель</option>
                    </select>
                    @error('type_account')
                      <span class="invalid-feedback">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="placeholder"><b>Пароль</b></label>
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
                    <button type="submit" class="btn btn-primary fw-bold">Зарегистрироваться</button>
                </div>

                <div class="login-account">
                    <span class="msg">Уже есть аккаунт ?</span>
                    <a href="{{ route('login')  }}" id="show-signup" class="link">Войдите</a>
                </div>

            </div>
        </form>
    </div>
@endsection
