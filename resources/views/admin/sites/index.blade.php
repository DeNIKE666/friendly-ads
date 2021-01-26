@extends('layouts.admin')

@section('title' , 'Все сайты')

@section('content')

    @push('styles')
        <style>
            .table-responsive-stack tr {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-orient: horizontal;
                -webkit-box-direction: normal;
                -ms-flex-direction: row;
                flex-direction: row;
            }

            .table-responsive-stack td,
            .table-responsive-stack th {
                display: block;
                /*
                   flex-grow | flex-shrink | flex-basis   */
                -ms-flex: 1 1 auto;
                flex: 1 1 auto;
            }

            .table-responsive-stack .table-responsive-stack-thead {
                font-weight: bold;
            }

            @media screen and (max-width: 768px) {
                .table-responsive-stack tr {
                    -webkit-box-orient: vertical;
                    -webkit-box-direction: normal;
                    -ms-flex-direction: column;
                    flex-direction: column;
                    border-bottom: 3px solid #ccc;
                    display: block;

                }

                /*  IE9 FIX   */
                .table-responsive-stack td {
                    float: left \9;
                    width: 100%;
                }
            }
        </style>
    @endpush

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
