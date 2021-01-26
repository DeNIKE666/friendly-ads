@extends('layouts.cabinets.customer')

@section('title' , 'Все задачи')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Задачи</h2>
                    <h5 class="text-white op-7 mb-2">Добавить вашу задачу в общий список</h5>
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
                            <th scope="col">Ссылка</th>
                            <th scope="col">Рейтинг</th>
                            <th scope="col">Категория</th>
                            <th scope="col">Статус</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection