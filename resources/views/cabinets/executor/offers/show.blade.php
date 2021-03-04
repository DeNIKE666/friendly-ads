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
                        <p class="card-category text-info mb-1"><a href="#">{{ $task->category->name }}</a></p>
                        <p class="card-text text-black-50">{{ $task->description}}</p>
                        <p class="card-text">Бюджет: <b>{{ $task->amount }}</b> руб. </p>
                        <p class="card-text">Срок: <b>{{ $task->period }}</b> дней. </p>
                        <p class="card-text">Категория: <b>{{ $task->category->name }}</b></p>

                        <p class="card-text">
                            Тип контента:
                            <b>{{ config('ads_friendly.type_task.' . $task->type_task ) }} </b>
                        </p>

                        <p class="card-text">
                            Позиция размещения:
                            <b>{{ config('ads_friendly.type_position.' . $task->type_position ) }} </b>
                        </p>

                        @if($task->IsResponses())
                            <div class="border-top pt-3"></div>
                            <div class="alert alert-info" role="alert">
                                Приём ставок завершен, данный заказ набрал необходимое число откликов
                            </div>
                        @else
                            <div class="border-top pt-3"></div>
                            <p class="card-text">
                                Требуется сайтов: <b> {{ $task->site_count }} / {{ $task->subscribe->count() }}  </b>
                            </p>
                        @endif


                        @if(! $task->yourSubscribe)
                            <div class="border-top pt-3"></div>
                            <div class="alert alert-info" role="alert">
                                У вас еще нет отклика на данное задание, но вы можете <b>оставить отклик</b>
                            </div>
                        @else
                            <div class="border-top pt-3"></div>
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
                                            @if($executor->status == 1)
                                                <i class="text-success fal fa-check" data-toggle="tooltip"
                                                   data-placement="top" title="Принят в проект"></i>
                                            @else
                                                <i class="text-warning fal fa-user-clock" data-toggle="tooltip"
                                                   data-placement="top" title="Ожидает решения"></i>
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
        </div>
    </div>
@endsection