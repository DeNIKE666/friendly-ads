@extends('layouts.admin')

@section('title' , 'Добавить пользователя')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Создать нового пользователя</h2>
                    <h5 class="text-white op-7 mb-2">Добавить нового пользователя в систему</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="POST">

                    @csrf

                    <div class="form-group">
                        <label for="name">Имя:</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Введите имя пользователя" value="{{ old('name') }}">
                        @error('name')
                          <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="type_account">Тип аккаунта:</label>
                        <select id="type_account" class="form-control @error('type_account') is-invalid @enderror" name="type_account">
                            <option value="" selected>-- Выберите тип аккаунта</option>
                            <option value="1">Администратор</option>
                            <option value="2">Пользователь</option>
                        </select>
                        @error('type_account')
                          <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="isBanned">Забанен:</label>
                        <select id="isBanned" class="form-control" name="isBanned">
                            <option value="" selected>-- Выберите статус аккаунта</option>
                            <option value="1" {{ old('isBanned') == '1' ? 'selected' : '' }}>Забанен</option>
                            <option value="0" {{ old('isBanned') == '0' ? 'selected' : '' }}>Не забанен</option>
                        </select>

                        <select id="timeBlocked" class="form-control mt-3" name="timeBlocked">
                            <option value="" selected>-- Выберите время блокировки</option>
                            <option value="1"  {{ old('timeBlocked') == '1' ? 'selected' : '' }}>1 день</option>
                            <option value="3"  {{ old('timeBlocked') == '3' ? 'selected' : '' }}>3 дня</option>
                            <option value="7"  {{ old('timeBlocked') == '7' ? 'selected' : '' }}>1 неделя</option>
                            <option value="14" {{ old('timeBlocked') == '14' ? 'selected' : '' }}>2 недели</option>
                            <option value="30" {{ old('timeBlocked') == '30' ? 'selected' : '' }}>месяц</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Введите Email адрес пользователя" value="{{ old('email') }}">
                        @error('email')
                          <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="username">Логин:</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Введите логин пользователя" value="{{ old('username') }}">
                        @error('username')
                          <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="telegram_id">TELEGRAM ID:</label>
                        <input type="text" class="form-control" id="telegram_id" name="telegram_id" placeholder="Введите TELEGRAM ID для оповещений" value="{{ old('telegram_id') }}">
                    </div>


                    <div class="form-group">
                        <label for="balance">Баланс:</label>
                        <input type="text" class="form-control" id="balance" name="balance" placeholder="1 500" value="{{ old('balance') }}">
                    </div>

                    <div class="form-group">
                        <label for="password">Пароль:</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Придумайте пароль" {{ old('password', request('password')) }}>
                        @error('password')
                          <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Создать пользователя</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
