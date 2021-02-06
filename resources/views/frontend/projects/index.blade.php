@extends('layouts.frontend')

@section('title', 'Все активные проекты пользователей')

@section('content')
    <section class="small-page-title-banner" style="background-image:url(assets/img/des-9.jpg);">
        <div class="container">
            <div class="row">
                <div class="tr-list-center">
                    <h2>Проекты пользователей</h2>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">

            @if($category)
                <div class="col-md-12 card card-body mb-5">
                    <p>У вас выбрана категория : <span class="highlight">{{ $category->name }}</span></p>
                    <a id="reset-settings" href="#">сбросить</a>
                </div>
            @endif

            <div class="row">

                @forelse($tasks as $task)
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
                @empty
                    <div class="col-lg-12 col-md-12 col-sm-6">
                        <div class="alert alert-light text-center" role="alert">
                            НА ДАННЫЙ МОМЕНТ ОТСУТСТВУЮТ ПРОЕКТЫ
                        </div>
                    </div>
                @endforelse

                <div class="col-md-12">
                    {{ $tasks->links() }}
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
        <script src="{{ asset('assets/frontend/js/show-hide-text.js') }}"></script>
        <script>
            new showHideText('.content', {
                charQty     : 50,
                ellipseText :"..."
            });
        </script>
        <script>
            $('#reset-settings').on('click', function () {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('frontend.resetSetting') }}",
                    success: function () {
                        window.location.href = "{{ route('frontend.projects') }}"
                    }
                })
            })
        </script>
    @endpush
@endsection