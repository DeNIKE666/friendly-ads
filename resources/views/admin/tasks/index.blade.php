@extends('layouts.admin')

@section('title' , 'Все задания')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Задачи</h2>
                    <h5 class="text-white op-7 mb-2">Список всех заданий на проекте</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        @if($tasks->isEmpty())
            <div class="card">
                <div class="alert alert-danger mb-0" role="alert">
                    В системе пока нет заданий пользователей
                </div>
            </div>
        @else
            <table>
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Бюджет</th>
                    <th scope="col">Требуется сайтов</th>
                    <th scope="col">Категория</th>
                    <th scope="col">Пользователь</th>
                    <th scope="col">Период</th>
                    <th scope="col">Просмотров</th>
                    <th scope="col">Откликов</th>
                    <th scope="col">Статус</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>

                @foreach($tasks as $task)
                    <tr>
                        <td data-label="#">{{ $task->id }}</td>
                        <td data-label="Бюджет">{{ $task->amount }} руб. </td>
                        <td data-label="Требуется сайтов">{{ $task->site_count }}</td>
                        <td data-label="Категория">{{ $task->category->name }}</td>
                        <td data-label="Пользователь">{{ $task->user->username }}</td>
                        <td data-label="Период">{{ $task->period }} дней. </td>
                        <td data-label="Просмотров">{{ $task->views }}</td>
                        <td data-label="Откликов">{{ $task->subscribe->count() }}</td>
                        <td data-label="Статус">{{ $task->status ? 'активен' : 'не активен' }}</td>
                        <td data-label="">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('admin.tasks.edit', $task) }}" class="btn btn-primary btn-sm w-100  mr-1"><i class="fal fa-edit"></i></a>
                                <form action="{{ route('admin.tasks.destroy', $task) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit"  class="btn btn-danger btn-sm w-100  mr-1"><i class="fal fa-trash"></i></button>
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
        {{ $tasks->links() }}
    </div>
@endsection