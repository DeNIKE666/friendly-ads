@extends('layouts.frontend')

@section('title', config('ads_friendly.meta.title'))

@section('description' , config('ads_friendly.seo_pages.index.description'))

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="sec-heading mx-auto">
                        <p>Последние задания исполнителей</p>
                        <h2>Заказы</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($tasks as $task)
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="wrf-joblist">
                            <div class="wrf-job-title-wrap">
                                <h4 class="wrf-job-title verified-job">
                                    <a href="{{ route('frontend.task.detail', $task) }}">
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
                                <a href="{{ route('frontend.task.detail', $task) }}">Перейти к заданию</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                    <div class="col-lg-12 col-md-12">
                        <div class="text-center">
                            <a href="{{ route('frontend.projects') }}" class="btn btn-info">Подобрать задания <i class="ti-arrow-right ml-2"></i></a>
                        </div>
                    </div>
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
                                <img src="{{ asset('images/frontend/steps/3.png') }}" alt="Регистрация на проекте, и создание первого задания для исполнителя">
                            </div>
                            <div class="middle-icon-features-content">
                                <h4>Регистрация</h4>
                                <p>Зарегистрируйтесь на проекте и <b><a href="{{ route('cabinets') }}">войдите в личный кабинет</a></b></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="middle-icon-features">
                        <div class="middle-icon-features-item">
                            <div class="middle-icon-large-features-box m-b-30">
                                <img src="{{ asset('images/frontend/steps/2.png') }}" alt="Создания задания для исполнителей">
                            </div>
                            <div class="middle-icon-features-content">
                                <h4>Задание</h4>
                                <p>Создайте  <b><a class="font-weight-bold" href="{{ route('customer.tasks.create') }}">задание</a></b> в личном кабинете и опишите что нужно сделать</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="middle-icon-features">
                        <div class="middle-icon-features-item">
                            <div class="middle-icon-large-features-box m-b-30">
                                <img src="{{ asset('images/frontend/steps/1.png') }}" alt="Получите отклики к своему заданию на площадке">
                            </div>
                            <div class="middle-icon-features-content">
                                <h4>Получите отклики</h4>
                                <p>Получите отклики исполнителей на ваш заказ и выберите нужных</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="middle-icon-features">
                        <div class="middle-icon-features-item">
                            <div class="middle-icon-large-features-box m-b-30">
                                <img src="{{ asset('images/frontend/steps/4.png') }}" alt="Оплата заказа">
                            </div>
                            <div class="middle-icon-features-content">
                                <h4>Исполнение</h4>
                                <p>Дайте задание исполнителям, и наблюдайте за процессом</p>
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
                        <h4>{{ $executors }}</h4>
                        <span>Исполнителей</span>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 b-r">
                    <div class="count-facts">
                        <h4>{{ $customers }}</h4>
                        <span>Заказчиков</span>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 b-r">
                    <div class="count-facts">
                        <h4>{{ $activeTasks }}</h4>
                        <span>Активных заданий</span>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="count-facts">
                        <h4>{{ $sumTasks }}</h4>
                        <span>Заданий на сумму</span>
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