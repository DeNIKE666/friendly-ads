@extends('layouts.cabinet')

@section('title' , 'Просмотр предложения')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Просмотр</h2>
                    <h5 class="text-white op-7 mb-2">Просмотр предложения </h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="d-flex justify-content-center">
            <div id="subscribe-task" data-id="{{ $task->id }}" class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="avatar">
                                <img src="{{ asset('images/noavatar.png') }}" alt="..."
                                     class="avatar-img rounded-circle">
                            </div>
                            <div class="info-post ml-2">
                                <p class="username">{{ $task->user->username }}</p>
                                <div style="width: 285px">
                                    {{ $task->title }}
                                </div>
                            </div>
                        </div>
                        <div class="separator-solid"></div>
                        <p class="card-text text-black-50">{{ $task->full_description }}</p>
                        <p class="card-text">Бюджет: <b> {{ $task->amount }}</b> руб.</p>
                        <p class="card-text">Срок: <b>{{ $task->period }}</b> дней. </p>
                        <p class="card-text">Категория: <b>{{ $task->category->name }}</b></p>
                        <p class="card-text">Тип
                            контента:<b>{{ config('ads_friendly.type_task.' . $task->type_task ) }} </b></p>
                        <p class="card-text">Позиция
                            размещения:<b>{{ config('ads_friendly.type_position.' . $task->type_position ) }} </b></p>
                        <p class="card-text">Требуется сайтов: <b>{{ $task->site_count }}
                                / {{ $task->subscribeAccepted()->count() }} </b></p>
                        <div>
                            <span>Статус задания:</span>
                            <span>
                                @if($task->subscribeAccepted()->count() >= $task->site_count )
                                    <i class="text-danger fw-bold fal fa-lock" data-toggle="tooltip"
                                       data-placement="top"
                                       title="Задание недоступно для откликов"></i>
                                @else
                                    <i class="text-success fw-bold fal fa-lock-open" data-toggle="tooltip"
                                       data-placement="top"
                                       title="Задание доступно для откликов"></i>
                                @endif
                           </span>
                        </div>

                        <div>
                            @if($task->IsFull())
                                <hr>
                                <div class="alert alert-info" role="alert">
                                    Приём ставок завершен, данный заказ набрал необходимое число откликов
                                </div>
                            @endif
                        </div>

                        <hr>

                        <p class="card-text">Откликнулись: <b>{{ $task->subscribe->count() }}</b></p>

                        <hr>

                        <table>
                            <thead>
                            <tr>
                                <th scope="col">Пользователь</th>
                                <th scope="col">Рейтинг</th>
                                <th scope="col">Сайт</th>
                                <th scope="col">Статус</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($task->subscribe as $executor)
                                <tr>
                                    <td data-label="Пользователь">
                                        <a href="{{ route('cabinet.show.profile', $executor->user) }}">
                                            {{ $executor->user->username }}
                                        </a>
                                    </td>
                                    <td data-label="Рейтинг">{{ $executor->user->sites->sum('rating') }}</td>
                                    <td data-label="Сайт">
                                        @can('customer')
                                            {{ $executor->sites }}
                                        @elsecan('executor')
                                            <i class="fal fa-eye-slash" data-toggle="tooltip" data-placement="top"
                                               title="Просмотр сайта доступен только заказчику"></i>
                                        @endcan
                                    </td>
                                    <td data-label="Статус">
                                        @switch($executor->status)
                                            @case(1)
                                            <i class="text-success fal fa-check" data-toggle="tooltip"
                                               data-placement="top" title="Принят в проект"></i>
                                            @break
                                            @case(2)
                                            <i class="text-danger fal fa-times" data-toggle="tooltip"
                                               data-placement="top" title="Отклонён"></i>
                                            @break
                                            @case(0)
                                            <i class="text-warning fal fa-clock" data-toggle="tooltip"
                                               data-placement="top" title="Ожидает решения"></i>
                                            @break
                                        @endswitch
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection