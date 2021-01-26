@extends('layouts.cabinets.customer')

@section('title' , 'Мои задания')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Задачи</h2>
                    <h5 class="text-white op-7 mb-2">Список всех ваших заданий</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="card">
            <div class="card-body table-responsive">
                @if($tasks->isEmpty())
                    <div class="alert alert-danger mt-3" role="alert">
                        У вас еще нет сайтов, но вы можете добавить их в систему <a href="{{ route('customer.tasks.create') }}"><b>добавить</b></a>
                    </div>
                @else
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Мин сумма</th>
                            <th scope="col">Макс сумма</th>
                            <th scope="col">Требуется сайтов</th>
                            <th scope="col">Категория</th>
                            <th scope="col">Период</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{ $task->id }}</td>
                                <td>{{ $task->min_sum }} руб. </td>
                                <td>{{ $task->max_sum }} руб. </td>
                                <td>{{ $task->site_count }}</td>
                                <td>{{ $task->category->name }}</td>
                                <td>{{ $task->period }} дней</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection