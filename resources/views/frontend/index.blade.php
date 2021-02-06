@extends('layouts.frontend')

@section('title', 'Главная страница')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                @foreach($tasks as $task)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="wrf-joblist">
                            <div class="wrf-job-title-wrap">
                                <h4 class="wrf-job-title verified-job">
                                    <a href="job-detail.html">
                                        {{ $task->title }}
                                    </a>
                                </h4>

                                <hr>

                                <ul class="p-0">
                                    <li class="pb-3">Заказчик: {{ $task->user->username }}</li>
                                    <li class="pb-2">Тип задания: <span class="highlight">{{ config('ads_friendly.type_task.' . $task->type_task) }}</span></li>
                                    <li class="pb-2">Позиция размещения: <span class="highlight">{{ config('ads_friendly.type_position.' . $task->type_position) }}</span></li>
                                    <li class="pb-2">Срок размещения: <span class="highlight">{{ $task->period }} дней.</span></li>
                                    <li class="pb-2">Откликнулись: <span class="highlight">{{ $task->subscribe->count() }} исполнителей</span></li>
                                </ul>

                            </div>
                            <div class="wrf-job-caption">
                                <p class="content">{{ $task->description }}</p>
                                <a href="{{ route('frontend.task.detail', $task) }}">Перейти к заданию</a>

                                <div class="d-flex justify-content-between mt-4">
                                    <span><i class="fal fa-eye"></i> {{ $task->views }}</span>
                                    <span><i class="fal fa-ruble-sign"></i> {{ $task->amount() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ============================ Step How To Use Start ================================== -->
    <section class="min-sec">
        <div class="container">

            <div class="row">
                <div class="col text-center">
                    <div class="sec-heading mx-auto">
                        <p>Процесс заказа</p>
                        <h2>Продвижение контента</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="middle-icon-features">
                        <div class="middle-icon-features-item">
                            <div class="middle-icon-large-features-box m-b-30">
                                <img src="{{ asset('images/frontend/steps/3.png') }}" alt="">
                            </div>
                            <div class="middle-icon-features-content">
                                <h4>Регистрация</h4>
                                <p>Зарегистрируйтесь, <b><a href="{{ route('login') }}">войдите в кабинет</a></b></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="middle-icon-features">
                        <div class="middle-icon-features-item">
                            <div class="middle-icon-large-features-box m-b-30">
                                <img src="{{ asset('images/frontend/steps/2.png') }}" alt="">
                            </div>
                            <div class="middle-icon-features-content">
                                <h4>Задание</h4>
                                <p>Создайте  <b><a class="font-weight-bold" href="{{ route('login') }}">заказ</a></b> в личном кабинете под ваши нужны</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="middle-icon-features">
                        <div class="middle-icon-features-item">
                            <div class="middle-icon-large-features-box m-b-30">
                                <img src="{{ asset('images/frontend/steps/1.png') }}" alt="">
                            </div>
                            <div class="middle-icon-features-content">
                                <h4>Получите отклики</h4>
                                <p>Получите отклики исполнителей на ваш заказ</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="middle-icon-features">
                        <div class="middle-icon-features-item">
                            <div class="middle-icon-large-features-box m-b-30">
                                <img src="{{ asset('images/frontend/steps/4.png') }}" alt="">
                            </div>
                            <div class="middle-icon-features-content">
                                <h4>Исполнение</h4>
                                <p>Как соберете нужные отклики, оплатите заказ</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <div class="clearfix"></div>
    <!-- ============================ Step How To Use End ================================== -->

    <!-- ============================ Counter Facts  Start================================== -->
    <section class="image-bg text-center" style="background:#00a94f url({{ asset('images/frontend/bg2.png') }});" data-overlay="0">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-3 col-sm-6 b-r">
                    <div class="count-facts">
                        <h4>0</h4>
                        <span>Исполнителей</span>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 b-r">
                    <div class="count-facts">
                        <h4>0</h4>
                        <span>Заказчиков</span>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 b-r">
                    <div class="count-facts">
                        <h4>0</h4>
                        <span>пока не придумал</span>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="count-facts">
                        <h4>0</h4>
                        <span>пока не придумал</span>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ============================ Counter Facts End ================================== -->

    @push('scripts')
        <script src="{{ asset('assets/frontend/js/show-hide-text.js') }}"></script>
        <script>
            new showHideText('.content', {
                charQty     : 50,
                ellipseText :"..."
            });
        </script>
        <script>
            $('.selection_of_tasks').on('click',function () {
                let category = $('#category option:selected').val();
                $.ajax({
                    type: 'POST',
                    url: "{{ route('frontend') }}",
                    data: {category: category},
                    success: function () {
                        alert(1)
                    }
                })
            })
        </script>
    @endpush
@endsection