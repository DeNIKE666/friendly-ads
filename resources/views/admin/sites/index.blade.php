@extends('layouts.admin')

@section('title' , 'Все сайты')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Все сайты</h2>
                    <h5 class="text-white op-7 mb-2">Список всеъ сайтов добавленых в проект</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="card card-body">
            <table>
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ссылка</th>
                    <th scope="col">Рейтинг</th>
                    <th scope="col">Категория</th>
                    <th scope="col">Пользователь</th>
                    <th scope="col">Статус</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @forelse($sites as $site)
                    <tr>
                        <td data-label="#">{{ $site->id }}</td>
                        <td data-label="Ссылка">{{ $site->url }}</td>
                        <td data-label="Рейтинг">{{ $site->rating }}</td>
                        <td data-label="Категория">{{ $site->category->name }}</td>
                        <td data-label="Пользователь">{{ $site->user->username }}</td>
                        <td data-label="Статус">{{ $site->activated  ? 'активирован' : 'не активирован'}}</td>
                        <td data-label="">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('admin.sites.edit', $site) }}" class="btn btn-warning btn-sm w-100  mr-1"><i class="fal fa-edit"></i></a>
                                <form action="{{ route('admin.sites.destroy', $site) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm w-100  mr-1"><i class="fal fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center fw-bold">НЕТ САЙТОВ</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $sites->links() }}
        </div>

    </div>
@endsection
