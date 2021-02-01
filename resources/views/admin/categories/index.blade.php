@extends('layouts.admin')

@section('title' , 'Управление категориями')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Категории</h2>
                    <h5 class="text-white op-7 mb-2">Список всех категорий добавленых в проект</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="card">
            @if($categories->isEmpty())
                <div class="card">
                    <div class="alert alert-danger mb-0" role="alert">
                        В системе пока нет категорий
                    </div>
                </div>
            @else
                <table>
                    <thead>
                    <tr>
                        <th scope="col">Название</th>
                        <th scope="col">Путь</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td data-label="Название">
                                @for ($i = 0; $i < $category->depth; $i++) &mdash; @endfor
                                <a href="">{{ $category->name }}</a>
                            </td>
                            <td data-label="Путь">{{ $category->getPath() }}</td>
                            <td data-label="Действия">
                                <div class="d-flex justify-content-end">
                                    <form class="mr-1">
                                        <a href="{{ route('categories.edit', $category) }}"
                                           class="btn btn-sm btn-outline-primary"><span class="fad fa-edit"></span></a>
                                    </form>

                                    <form method="POST" action="{{ route('categories.first', $category) }}"
                                          class="mr-1">
                                        @csrf
                                        <button class="btn btn-sm btn-outline-primary"><span
                                                    class="fa fa-angle-double-up"></span></button>
                                    </form>
                                    <form method="POST" action="{{ route('categories.up', $category) }}" class="mr-1">
                                        @csrf
                                        <button class="btn btn-sm btn-outline-primary"><span
                                                    class="fa fa-angle-up"></span></button>
                                    </form>
                                    <form method="POST" action="{{ route('categories.down', $category) }}" class="mr-1">
                                        @csrf
                                        <button class="btn btn-sm btn-outline-primary"><span
                                                    class="fa fa-angle-down"></span></button>
                                    </form>
                                    <form method="POST" action="{{ route('categories.last', $category) }}" class="mr-1">
                                        @csrf
                                        <button class="btn btn-sm btn-outline-primary"><span
                                                    class="fa fa-angle-double-down"></span></button>
                                    </form>
                                    <form method="POST" action="{{ route('categories.destroy', $category) }}"
                                          class="mr-1">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-sm btn-outline-primary"><span
                                                    class="fas fa-trash-alt"></span></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">НЕТ КАТЕГОРИЙ</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
