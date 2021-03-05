@extends('layouts.frontend')

@section('title', 'Просмотр задания - ' . $task->title)

@section('description', 'Подробное описание задания')

@section('content')
    <section class="section-white box-shadow">
        <div class="container">
            <div class="row">
                <div class="tr-list-center">
                    <h2>{{ $task->title }}</h2>
                    <p>размещённый проект на площадке от пользователя <span class="badge badge-secondary">{{ $task->user->username }}</span> , старайтесь как можно быстрее оставить свой отклик. </p>
                </div>
            </div>
        </div>
    </section>
    <section class="tr-single-detail gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="tr-single-box">
                        <div class="tr-single-header">
                            <h4><i class="ti-info"></i>Описание</h4>
                        </div>
                        <div class="tr-single-body">
                           {!! $task->description !!}
                        </div>
                    </div>

                    @can('customer')
                        <a href="{{ route('executor.show.task', $task) }}" class="btn btn-outline-info full-width mb-2"> ПЕРЕЙТИ К СВОЕМУ ЗАДАНИЮ</a>
                    @elsecan('executor')
                        <a href="{{ route('executor.show.task', $task) }}" class="btn btn-outline-info full-width mb-2"> ОСТАВИТЬ ОТКЛИК</a>
                    @else
                        <a href="{{ route('executor.show.task', $task) }}" class="btn btn-outline-info full-width mb-2"> ПЕРЕЙТИ К ЗАДАНИЮ</a>
                    @endif
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="tr-single-box">
                        <div class="tr-single-header">
                            <h4><i class="ti-book"></i> Требования к исполнителю</h4>
                        </div>
                        <div class="tr-single-body">
                            <ul class="jb-detail-list">
                                <li>Тип задания: <b>{{ config('ads_friendly.type_task.' . $task->type_task) }}</b></li>
                                <li>Позиция размещения: <b>{{ config('ads_friendly.type_position.' . $task->type_position) }}</b></li>
                            </ul>
                        </div>
                    </div>
                    <div class="tr-single-box">
                        <div class="tr-single-header">
                            <h4><i class="ti-direction"></i> Информация</h4>
                        </div>
                        <div class="tr-single-body">
                            <ul class="extra-service">
                                <li>
                                    <div class="icon-box-icon-block">
                                        <div class="icon-box-round">
                                            <i class="fal fa-ruble-sign"></i>
                                        </div>
                                        <div class="icon-box-text">
                                            <strong class="d-block">Цена</strong>
                                            {{ $task->amount() }}
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon-box-icon-block">
                                        <div class="icon-box-round">
                                            <i class="fal fa-box-check"></i>
                                        </div>
                                        <div class="icon-box-text">
                                            <strong class="d-block">Откликов</strong>
                                            {{ $task->subscribe->count() }}
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon-box-icon-block">
                                        <div class="icon-box-round">
                                            <i class="fal fa-clock"></i>
                                        </div>
                                        <div class="icon-box-text">
                                            <strong class="d-block">Период</strong>
                                            {{ $task->period }} дней
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /col-md-4 -->
            </div>
        </div>
    </section>
@endsection