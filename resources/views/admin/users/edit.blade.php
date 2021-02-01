@extends('layouts.admin')

@section('title' , 'Редактирование пользователя')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Редактирование - {{ $user->username }}</h2>
                    <h5 class="text-white op-7 mb-2">Редактирование пользователя в системе</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.users.update', $user) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="name">Имя:</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Введите имя пользователя" value="{{ old('name', $user->name) }}">
                        @error('name')
                          <span class="invalid-feedback">
                              <strong>
                                  {{ $message }}
                              </strong>
                          </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="type_account">Тип аккаунта:</label>
                        <select id="type_account" class="form-control @error('type_account') is-invalid @enderror" name="type_account">
                            <option value="" selected>-- Выберите тип аккаунта</option>
                            <option value="1" {{ $user->type_account == 1 ? 'selected' : '' }}>Администратор</option>
                            <option value="2" {{ $user->type_account == 2 ? 'selected' : '' }}>Пользователь</option>
                            <option value="2" {{ $user->type_account == 3 ? 'selected' : '' }}>Исполнитель</option>
                        </select>
                        @error('type_account')
                          <span class="invalid-feedback">
                              <strong>
                                  {{ $message }}
                              </strong>
                          </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="isBanned">Забанен:</label>
                        <select id="isBanned" class="form-control" name="isBanned">
                            <option value="" selected>-- Выберите статус аккаунта</option>
                            <option value="1" {{ $user->isBanned == '1' ? 'selected' : '' }} {{ old('isBanned') == '1' ? 'selected' : '' }}>Забанен</option>
                            <option value="0" {{ $user->isBanned == '0' ? 'selected' : '' }} {{ old('isBanned') == '0' ? 'selected' : '' }}>Не забанен</option>
                        </select>

                        <div class="mt-3">
                            <label for="timeBlocked">Время блокировки:</label>
                            <select id="timeBlocked" class="form-control" name="timeBlocked">
                                <option value="" selected>-- Выберите время блокировки</option>
                                <option value="1" {{ $user->timeBlocked == '1' ? 'selected' : ''  }}  {{ old('timeBlocked') == '1' ? 'selected' : '' }}>
                                    1 день
                                </option>
                                <option value="3" {{ $user->timeBlocked == '3' ? 'selected' : ''  }}  {{ old('timeBlocked') == '3' ? 'selected' : '' }}>
                                    3 дня
                                </option>
                                <option value="7" {{ $user->timeBlocked == '7' ? 'selected' : ''  }}  {{ old('timeBlocked') == '7' ? 'selected' : '' }}>
                                    1 неделя
                                </option>
                                <option value="14" {{ $user->timeBlocked == '14' ? 'selected' : '' }}  {{ old('timeBlocked') == '14' ? 'selected' : '' }}>
                                    2 недели
                                </option>
                                <option value="30" {{ $user->timeBlocked == '30' ? 'selected' : '' }}  {{ old('timeBlocked') == '30' ? 'selected' : '' }}>
                                    месяц
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Введите Email адрес пользователя" value="{{ old('email', $user->email) }}">
                        @error('email')
                          <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="username">Логин:</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Введите логин пользователя" value="{{ old('username', $user->username) }}">
                        @error('username')
                          <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="telegram_id">TELEGRAM ID:</label>
                        <input type="text" class="form-control" id="telegram_id" name="telegram_id" placeholder="Введите TELEGRAM ID для оповещений" value="{{ old('telegram_id', $user->telegram_id) }}">
                    </div>


                    <div class="form-group">
                        <label for="balance">Баланс:</label>
                        <input type="text" class="form-control" id="balance" name="balance" placeholder="1 500" value="{{ old('balance', $user->balance) }}">
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Обновить пользователя</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
