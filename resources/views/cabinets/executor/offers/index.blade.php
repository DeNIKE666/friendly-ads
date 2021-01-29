@extends('layouts.cabinet')

@section('title' , 'Предложения заказчиков')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Предложения {{ $offers->count() }}</h2>
                    <h5 class="text-white op-7 mb-2">Все предложения заказчиков на продвижение контента</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row">
            @if($offers->isEmpty())
                <div class="col-md-12">
                    <div class="alert alert-danger mb-0" role="alert">
                        На данный момент нет новых предложений, ожидайте когда кто-то разместит задание.
                    </div>
                </div>
            @else
                @foreach($offers as $offer)
                    <div id="subscribe-task" class="col-md-3">
                        <div class="card card-post card-round">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="avatar">
                                        <img src="{{ asset('images/noavatar.png') }}" alt="..." class="avatar-img rounded-circle">
                                    </div>
                                    <div class="info-post ml-2">
                                        <p class="username">{{ $offer->user->username }}</p>
                                        <div style="width: 285px">
                                            {{ $offer->title }}
                                        </div>
                                    </div>
                                </div>
                                <div class="separator-solid"></div>
                                <p class="card-category text-info mb-1"><a href="#">{{ $offer->category->name }}</a></p>
                                <p class="card-text text-black-50">{{ $offer->limitDescription() }}</p>
                                <p class="card-text m-0">Бюджет: <b>{{ $offer->amount }}</b> руб. </p>
                                <p class="card-text m-0">Бюджет на сайт: <b>550</b> руб. </p>
                                <p class="card-text m-0">Срок: <b>{{ $offer->period }}</b> дней. </p>

                                <p class="card-text m-0">
                                    Тип контента:
                                    <b>{{ config('ads_friendly.type_task.' . $offer->type_task ) }} </b>
                                </p>

                                <p class="card-text">
                                    Позиция размещения:
                                    <b>{{ config('ads_friendly.type_position.' . $offer->type_position ) }} </b>
                                </p>

                                <p class="card-text text-secondary">
                                    Требуется сайтов:
                                    <b>{{ $offer->site_count }} / {{ $offer->subscribe->count() }}  </b>
                                </p>

                                <div class="d-flex justify-content-between">

                                    <a href="{{ route('executor.show.task', $offer) }}" class="btn btn-primary btn-rounded"><i class="fal fa-eye"></i> Просмотр</a >

                                    @if($offer->yourSubscribe)
                                        <button data-id="{{ $offer->id }}" class="btn btn-danger btn-rounded unsubscribe"> Отозвать отклик</button>
                                    @else
                                        <button data-id="{{ $offer->id }}" class="btn btn-success btn-rounded subscribe"> Откликнутся</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection