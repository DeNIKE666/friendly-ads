@extends('layouts.frontend')

@section('title', 'Все активные проекты пользователей')

@section('content')
    <section class="small-page-title-banner" style="background-image:url(assets/img/des-9.jpg);">
        <div class="container">
            <div class="row">
                <div class="tr-list-center">
                    <h2>Проекты пользователей</h2>
                    <p>Здесь отображаются все актуальные задания заказчиков, если вы являетесь исполнителем - то вы можете ознакомиться с любым заданием, сделать выбор и приступеить к выполнению</p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="d-block d-none d-sm-block d-md-none mb-3">
                        <a href="javascript:void(0)" id="showFilters" class="btn btn-info full-width btn-md"><i class="ti-filter mrg-r-5"></i>Фильтры</a>
                    </div>
                    <div id="filters" class="sidebar-container d-sm-none d-md-block d-none">

                        <div class="sidebar-widget">
                            <div class="form-group">
                                <h5 class="mb-2">Категории:</h5>
                                <div class="side-imbo">
                                    <ul class="no-ul-list">
                                        @foreach($categories as $category)
                                            <li>
                                                <input id="category_id-{{ $category->id }}" data-id="{{ $category->id }}" class="radio-custom" name="category" type="radio">
                                                <label for="category_id-{{ $category->id }}" class="radio-custom-label">{{ $category->name }}</label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <div class="form-group">
                                <h5 class="mb-2">Тип задания:</h5>
                                <div class="side-imbo">
                                    <ul class="no-ul-list">
                                        <li>
                                            <input id="type_task_link_product" data-id="link_product" class="radio-custom type_task" name="type_task" type="radio" value="link_product">
                                            <label for="type_task_link_product" class="radio-custom-label">Cсылка на продукт</label>
                                        </li>
                                        <li>
                                            <input id="type_task_link_video" data-id="link_video" class="radio-custom type_task" name="type_task" type="radio" value="link_video">
                                            <label for="type_task_link_video" class="radio-custom-label">Cсылка на видео</label>
                                        </li>
                                        <li>
                                            <input id="type_task_page" data-id="page" class="radio-custom type_task" name="type_task" type="radio" value="page">
                                            <label for="type_task_page" class="radio-custom-label">Cтраница сайта</label>
                                        </li>
                                        <li>
                                            <input id="type_task_app" data-id="app" class="radio-custom type_task" name="type_task" type="radio" value="app">
                                            <label for="type_task_app" class="radio-custom-label">Приложение</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="sidebar-widget">
                            <div class="form-group">
                                <h5 class="mb-2">Цены:</h5>
                                <div class="side-imbo">
                                    <ul class="no-ul-list">
                                        <li>
                                            <input id="prices-filters-1" data-id="1" class="radio-custom" name="amount" type="radio" value="1">
                                            <label for="prices-filters-1" class="radio-custom-label">Больше</label>
                                        </li>
                                        <li>
                                            <input id="prices-filters-2" data-id="2" class="radio-custom" name="amount" type="radio" value="2">
                                            <label for="prices-filters-2" class="radio-custom-label">Меньше</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <!-- apply -->

                        <div class="sidebar-widget">
                            <div class="form-group">
                                <a href="#" id="apply-filter" class="btn btn-info full-width btn-md"><i class="ti-filter mrg-r-5"></i>Применить</a>
                                <a href="#" id="reset-filter" class="btn btn-secondary full-width btn-md mt-2"><i class="ti-filter mrg-r-5"></i>Сбросить</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-9 col-lg-8">
                    <div class="row">
                        @forelse($tasks as $task)
                            <div class="col-lg-6 col-md-6 col-sm-6">
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
                                            <li class="pb-2">Категория: <span class="highlight">{{ $task->category->name }}</span></li>

                                        </ul>

                                    </div>
                                    <div class="wrf-job-caption">
                                        <p class="content-text">{!! $task->description !!}</p>
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

                    </div>

                    <!-- Pagination -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            {{ $tasks->withQueryString()->links() }}
                        </div>
                    </div>
                    <!-- Pagination -->

                </div>

            </div>

        </div>
    </section>

    @push('scripts')
        <script src="{{ asset('assets/frontend/js/show-hide-text.js') }}"></script>
        <script>
            new showHideText('.content-text', {
                charQty     : 50,
                ellipseText :"..."
            });
        </script>
        <script>

            let filters = {
                category_id: null,
                type_task: null,
                amount: null
            }

            CurrentParams();

            function CurrentParams()  {

                @if(request('category_id'))
                    filters.category_id = "{{ request('category_id') }}"
                    $('#category_id-' + filters.category_id).prop('checked', true);
                @endif

                @if(request('type_task'))
                    filters.type_task = "{{ request('type_task') }}"
                    $('#type_task_' + filters.type_task).prop('checked', true);
                @endif

                @if(request('amount'))
                    filters.amount = "{{ request('amount') }}"
                    $('#prices-filters-' + filters.amount).prop('checked', true);
                 @endif

            }

            function clear()
            {
                filters.category_id = null;
                filters.type_task   = null;
                filters.amount      = null;
            }

            // Выбор категории

            let category = $('input[name="category"]');

            category.click(function () {
                filters.category_id = $(this).data('id');
            })

            // Выбор типа задания

            let type_task = $('.type_task');

            type_task.click(function () {
                filters.type_task   = $(this).data('id')
            })

            let amount = $('input[name="amount"]');

            amount.click(function () {
                filters.amount = $(this).data('id');
            })

            $('#apply-filter').on('click', function () {

                 let query = '';

                 $.each(filters, function (index, item) {
                     if (item !== null) {
                         query += index + '=' + item + '&';
                     }
                 })

                window.location.href = '/projects/?' + query.slice(0, -1);
            })

            $('#reset-filter').on('click', function () {

                clear();

                window.location.href = '/projects';
            });

            $('#showFilters').on('click', function () {

                let filters = $('#filters');

                if (filters.hasClass('d-none')) {
                    filters.removeClass('d-sm-none').removeClass('d-none');
                    $(this).text('Закрыть фильтры')
                } else {
                    filters.addClass('d-sm-none').addClass('d-none');
                    $(this).text('Открыть фильтры')
                }
            })

        </script>
    @endpush
@endsection