@extends('layouts.admin')

@section('title' , 'Управление пользователями')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Пользователи</h2>
                    <h5 class="text-white op-7 mb-2">Все пользователи сервиса</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <a href="{{ route('users.create') }}" class="btn btn-white btn-border btn-round mr-2">Создать нового пользователя</a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Имя</th>
                        <th scope="col">Логин</th>
                        <th scope="col">Почта</th>
                        <th scope="col">Телеграм</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->telegram_id ?: 'Не указан' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">НЕТ ПОЛЬЗОВАТЕЛЕЙ</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
