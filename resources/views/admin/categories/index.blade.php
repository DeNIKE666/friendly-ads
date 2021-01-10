@extends('layouts.admin')

@section('title' , 'Управление категориями')

@section('content')
    <div class="page-inner">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Название</th>
                        <th scope="col">Путь</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($categories as $category)
                            <tr>
                                <td>
                                    @for ($i = 0; $i < $category->depth; $i++) &mdash; @endfor
                                    <a href="">{{ $category->name }}</a>
                                </td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->getPath() }}</td>
                                <td>
                                    <div class="d-flex flex-row">
                                        <form method="POST" action="{{ route('categories.first', $category) }}" class="mr-1">
                                            @csrf
                                            <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-double-up"></span></button>
                                        </form>
                                        <form method="POST" action="{{ route('categories.up', $category) }}" class="mr-1">
                                            @csrf
                                            <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-up"></span></button>
                                        </form>
                                        <form method="POST" action="{{ route('categories.down', $category) }}" class="mr-1">
                                            @csrf
                                            <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-down"></span></button>
                                        </form>
                                        <form method="POST" action="{{ route('categories.last', $category) }}" class="mr-1">
                                            @csrf
                                            <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-double-down"></span></button>
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
            </div>
        </div>
    </div>
@endsection
