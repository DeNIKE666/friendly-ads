@extends('layouts.cabinet')

@section('title' , 'Отклики на задание - #' . $task->id)

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Отклики - #{{ $task->id }}</h2>
                    <h5 class="text-white op-7 mb-2">Все отклики на моё задание на площадке</h5>
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
                        <p class="card-category text-info mb-1"><a href="#">{{ $task->category->name }}</a></p>
                        <p class="card-text text-black-50">{!! $task->description !!}</p>
                        <p class="card-text">Бюджет: <b>{{ $task->amount }}</b> руб. </p>
                        <p class="card-text">Срок: <b>{{ $task->period }}</b> дней. </p>

                        <p class="card-text">
                            Тип контента:
                            <b>{{ config('ads_friendly.type_task.' . $task->type_task ) }} </b>
                        </p>

                        <p class="card-text">
                            Позиция размещения:
                            <b>{{ config('ads_friendly.type_position.' . $task->type_position ) }} </b>
                        </p>

                        <ol class="activity-feed" >
                            @forelse($task->subscribe as $executor)
                                <li id="executor-{{ $executor->id }}" class="feed-item feed-item-success">
                                <span class="d-block text-muted text-uppercase font-weight-bold mb-2">
                                    <a href="{{ route('cabinet.show.profile', $executor->user) }}">{{ $executor->user->username }}</a>
                                </span>
                                    <p class="text-muted pt-1"><i class="fal fa-check"></i> сделал(а) отклик</p>
                                    <p class="text-muted pt-1"><i class="fal fa-chart-bar"></i> Общий рейтинг всех сайтов: {{ $executor->user->sites->sum('rating') }}</p>
                                    @if($executor->status == 0)
                                        <button data-id="{{ $executor->id }}" class="btn btn-danger reject-task"><i class="fal fa-user-times"></i> Отклонить</button>
                                        <button data-id="{{ $executor->id }}" class="btn btn-primary accept-task"><i class="fal fa-user-check"></i> Принять</button>
                                    @elseif($executor->status == 1)
                                        <span class="badge badge-success">принят</span>
                                    @endif
                                </li>
                            @empty
                                <li>
                                    <div class="alert alert-info mb-0" role="alert">
                                        Нет откликов на ваше задание
                                    </div>
                                </li>
                            @endforelse
                        </ol>

                        <div class="border-top">
                            @if($task->IsResponses())
                                <div class="alert alert-info mb-3 mt-3" role="alert">
                                    Ваш заказ набрал максимальное число откликов, теперь вы можете <b>зарезервировать средства в системе</b>, и создать персональный код размешения на сайтах, для каждого исполнителя.
                                </div>
                                <button data-id="{{ $task->id }}" class="btn btn-info-gradiant work-send"><i class="fal fa-user-check"></i> Пополнить и создать заказ</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            let taskId = $('#subscribe-task').data('id');

            let workPay = $('.work-send');

            workPay.click(function () {
                $.ajax({
                    type: 'POST',
                    url: "/cabinet/pay/create-order-task/" + taskId,
                    success: function (response) {
                        console.log(response)
                    }
                })
            })

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