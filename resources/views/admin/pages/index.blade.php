@extends('layouts.admin')

@section('title' , 'Все страницы')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Страницы</h2>
                    <h5 class="text-white op-7 mb-2">Динамические страницы</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="d-flex justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @if($pages->isEmpty())
                        <div class="alert alert-danger mb-0" role="alert">
                            В системе пока нет созданных страниц
                        </div>
                    @else
                        <table>
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Название</th>
                                <th scope="col">Просмотры</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pages as $page)
                                <tr>
                                    <td data-label="#"><a href="{{ route('frontend.page', $page->name) }}">просмотр</a></td>
                                    <td data-label="Ссылка">{{ $page->name }}</td>
                                    <td data-label="Просмотры">{{ $page->views }}</td>
                                    <td data-label="">
                                        <div class="d-flex justify-content-end">
                                            <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-warning btn-sm w-100  mr-1"><i class="fal fa-edit"></i></a>
                                            <form action="{{ route('admin.pages.destroy', $page) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm w-100  mr-1"><i class="fal fa-trash"></i></button>
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
                    {{ $pages->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
