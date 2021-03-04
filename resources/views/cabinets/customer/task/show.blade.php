@extends('layouts.cabinet')

@section('title' , 'Отклики на задание - #' . $task->id)

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Задание - #{{ $task->id }}</h2>
                    <h5 class="text-white op-7 mb-2">Моё опубликованное задание на проекте</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="d-flex justify-content-center">
            <div id="subscribe-task" data-id="{{ $task->id }}" class="col-md-6">
                <div class="card card-post card-round">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="avatar">
                                <img src="{{ asset('images/noavatar.png') }}" alt="..." class="avatar-img rounded-circle">
                            </div>
                            <div class="info-post ml-2">
                                <p class="username">{{ $task->user->username }}</p>
                                <div id="task-title" style="width: 285px">
                                    {{ $task->title }}
                                </div>
                            </div>
                        </div>
                        <div class="separator-solid"></div>
                        <p class="card-text text-black-50">{{ $task->description }}</p>
                        <p class="card-text">Бюджет: <b>{{ number_format($task->amount , 0 , ', ' , ' ') }}</b> руб. </p>
                        <p class="card-text">Срок: <b>{{ $task->period }}</b> дней. </p>
                        <p class="card-text">Категория: <b>{{ $task->category->name }}</b></p>
                        <p class="card-text">Требуется сайтов: <b>{{ $task->site_count }} / {{ $task->subscribeAccepted()->count() }} </b></p>
                        <p class="card-text">Тип контента:<b>{{ config('ads_friendly.type_task.' . $task->type_task ) }} </b></p>
                        <p class="card-text">Позиция размещения:<b>{{ config('ads_friendly.type_position.' . $task->type_position ) }} </b></p>
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
                                        <a href="{{ $executor->sites }}">перейти</a>
                                    </td>
                                    <td data-label="Статус">
                                        @switch($executor->status)
                                            @case(1)
                                            <i class="text-success fal fa-check" data-toggle="tooltip" data-placement="top" title="Принят в проект"></i>
                                            @break
                                            @case(2)
                                            <i class="text-danger fal fa-times" data-toggle="tooltip" data-placement="top" title="Отклонён"></i>
                                            @break
                                            @case(0)
                                                @if($executor->status == 0)
                                                    <button data-id="{{ $executor->id }}" class="btn btn-primary accept-task btn-sm"><i class="fal fa-check"></i></button>
                                                    <button data-id="{{ $executor->id }}" class="btn btn-danger reject-task btn-sm"><i class="fal fa-times"></i></button>
                                                @endif
                                            @break
                                        @endswitch
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @if($task->subscribeAccepted()->count() >= $task->site_count)
                            <div class="alert alert-info mb-3 mt-3" role="alert">
                                Ваш заказ набрал максимальное число откликов, теперь вы можете <b>зарезервировать средства в системе</b>, и создать персональный код размешения на сайтах, для каждого исполнителя.
                            </div>
                           <div id="work">
                               @if(! $task->work)
                                   <form action="{{ route('order.pay.task', $task) }}" method="POST">
                                       @csrf
                                       <button class="btn btn-info-gradiant create-order-pay"><i class="fal fa-user-check"></i> <span id="text-pay-btn">Создать и оплатить заказ </span></button>
                                   </form>
                               @else
                                   @if($task->work->order->status)
                                       <p class="pt-2">Ваш заказ на сумму <b>{{ number_format($task->sum_pay  , 0 , ', ' , ' ') }}</b> руб. оплачен.</p>
                                   @else
                                       <form action="{{ route('order.pay.task', $task) }}" method="POST">
                                           @csrf
                                           <button class="btn btn-success create-order-pay"><i class="fal fa-wallet"></i> <span id="text-pay-btn">Оплатить </span></button>
                                       </form>
                                   @endif
                               @endif
                           </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            let taskId = $('#subscribe-task').data('id');

            let reject = $('.reject-task');
            let accept = $('.accept-task');

            reject.click(function () {
                let id = $(this).data('id');
                $.ajax({
                    type: "POST",
                    url: "/cabinet/manage-task/reject/" + id,
                    success: function (resp) {
                        $('#executor-' + id).fadeOut('slow');
                    }
                })
            })

            accept.click(function () {
                let id = $(this).data('id');
                $.ajax({
                    type: "POST",
                    url: "/cabinet/manage-task/accept/" + id,
                    success: function (resp) {
                        window.location.href = '/cabinet/tasks/' + taskId
                    }
                })
            })
        </script>
    @endpush
@endsection