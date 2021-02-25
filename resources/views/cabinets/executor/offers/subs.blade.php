@extends('layouts.cabinet')

@section('title' , 'Мои отклики на предложения')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Отклики (<span id="subsCount">{{ $offers->count() }}</span>)</h2>
                    <h5 class="text-white op-7 mb-2">Мои отклики на предложение заказчиков</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row">
            @if(! $offers->count())
                <div class="col-md-12">
                    <div class="card">
                        <div class="alert alert-danger mb-0" role="alert">
                            На данный момент нет откликов.
                        </div>
                    </div>
                </div>
            @else
            @foreach($offers as $offer)
                <div id="subscribe-task-{{ $offer->yourSubscribe->id }}" class="col-md-3">
                    <div class="card card-post card-round">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="avatar">
                                    <img src="{{ asset('images/noavatar.png') }}" alt="..." class="avatar-img rounded-circle">
                                </div>
                                <div class="info-post ml-2">
                                    <p class="username">{{ $offer->title }}</p>
                                    <div style="width: 285px">
                                        {{ $offer->user->username }}
                                    </div>
                                </div>
                            </div>
                            <div class="separator-solid"></div>
                            <p class="card-text text-black-50">{{ $offer->limitDescription() }}</p>
                            <p class="card-text m-0">Бюджет: <b>{{ $offer->amount }}</b> руб. </p>
                            <p class="card-text m-0">Бюджет на сайт: <b>550</b> руб. </p>
                            <p class="card-text m-0">Срок: <b>{{ $offer->period }}</b> дней. </p>
                            <p class="card-text m-0">Категория: <b>{{ $offer->category->name }}</b></p>

                            <p class="card-text m-0">
                                Тип контента:
                                <b>{{ config('ads_friendly.type_task.' . $offer->type_task ) }} </b>
                            </p>

                            <p class="card-text">
                                Позиция размещения:
                                <b>{{ config('ads_friendly.type_position.' . $offer->type_position ) }} </b>
                            </p>


                            @if($offer->IsResponses())
                                <p class="card-text text-success fw-bold">
                                    Максимальный набор: <i class="fal fa-box-check"></i>
                                </p>
                            @else
                                <p class="card-text">
                                    Требуется сайтов:
                                    <b>{{ $offer->site_count }} / {{ $offer->subscribe->count() }}  </b>
                                </p>
                            @endif

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('executor.show.task', $offer) }}" class="btn btn-primary btn-rounded">
                                    <i class="fal fa-eye"></i> Просмотр
                                </a>
                                <button data-id="{{ $offer->yourSubscribe->id }}" class="btn btn-danger btn-rounded unsubscribe">Отозвать отклик</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
          @endif
        </div>
    </div>
@endsection