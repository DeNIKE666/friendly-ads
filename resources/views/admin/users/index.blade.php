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
                    <a href="{{ route('admin.users.create') }}" class="btn btn-white btn-border btn-round mr-2">Создать нового пользователя</a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="card">
            @if($users->isEmpty())
                <div class="card">
                    <div class="alert alert-danger mb-0" role="alert">
                        В системе пока нет категорий
                    </div>
                </div>
            @else
            <table>
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Логин</th>
                    <th scope="col">Почта</th>
                    <th scope="col">Телеграм</th>
                    <th scope="col">Сайтов</th>
                    <th scope="col">Рейтинг</th>
                    <th scope="col">Баланс</th>
                    <th scope="col">Бан</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td data-label="#">{{ $user->id }}</td>
                        <td data-label="Имя">{{ $user->name }}</td>
                        <td data-label="Логин">{{ $user->username }}</td>
                        <td data-label="Почта">{{ $user->email }}</td>
                        <td data-label="Телеграм">{{ $user->telegram_id ?: 'Не указан' }}</td>
                        <td data-label="Сайтов">{{ $user->sites->count() }}</td>
                        <td data-label="Рейтинг">{{ $user->sites->sum('rating') }}</td>
                        <td data-label="Баланс">{{ $user->balance }}</td>
                        <td data-label="Рейтинг">{{ $user->isBanned ? 'забанен' : 'не забанен' }}</td>
                        <td>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('users.sites', $user) }}" class="btn btn-sm btn-outline-secondary mr-1"><span class="fal fa-sitemap"></span></a>
                                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-outline-primary mr-1"><span class="fal fa-edit"></span></a>

                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-danger"><span class="fal fa-trash"></span></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                 @endforeach
                </tbody>
            </table>
           @endif
        </div>

        <div class="d-flex justify-content-center">
            {{ $users->links() }}
        </div>

    </div>
@endsection
