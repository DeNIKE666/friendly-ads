@extends('layouts.admin')

@section('title' , 'Все сайты')

@section('content')

    <div class="page-inner">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-bordered">
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
                            <td>{{ $site->id }}</td>
                            <td>{{ $site->url }}</td>
                            <td>{{ $site->rating }}</td>
                            <td>{{ $site->category->name }}</td>
                            <td>{{ $site->user->username }}</td>
                            <td>{{ $site->activated  ? 'активирован' : 'не активирован'}}</td>
                            <td>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('admin.sites.edit', $site) }}" class="btn btn-warning btn-sm w-100  mr-1"><i class="fal fa-edit"></i></a>
                                    <form action="{{ route('admin.sites.destroy', $site) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit"  class="btn btn-danger btn-sm w-100  mr-1"><i class="fal fa-trash"></i></button>
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

        </div>
    </div>
@endsection
