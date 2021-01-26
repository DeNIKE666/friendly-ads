@extends('layouts.cabinets.executor')

@section('title' , 'Мои сайты')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Сайты</h2>
                    <h5 class="text-white op-7 mb-2">Все ваши сайты добавленные в проект</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="card">
            <div class="card-body table-responsive">
                @if($sites->isEmpty())
                    <div class="alert alert-danger mt-3" role="alert">
                        У вас еще нет сайтов, но вы можете добавить их в систему <a href="{{ route('executor.sites.create') }}"><b>добавить</b></a>
                    </div>
                @else
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Ссылка</th>
                            <th scope="col">Рейтинг</th>
                            <th scope="col">Категория</th>
                            <th scope="col">Статус</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sites as $site)
                            <tr>
                                <td>{{ $site->id }}</td>
                                <td>{{ $site->url }}</td>
                                <td>{{ $site->rating }}</td>
                                <td>{{ $site->category->name }}</td>
                                <td>
                                    @if($site->activated)
                                        <span class="badge badge-success">активирован</span>
                                    @else
                                        <span class="badge badge-danger">не активирован</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection