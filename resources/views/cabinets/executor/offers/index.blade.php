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
                    <div id="subscribe-task" data-id="{{ $offer->id }}" class="col-md-3">
                        <div class="card card-post card-round">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="avatar">
                                        <img src="{{ asset('images/noavatar.png') }}" alt="..." class="avatar-img rounded-circle">
                                    </div>
                                    <div class="info-post ml-2">
                                        <p class="username">{{ $offer->user->username }}</p>
                                        <div style="width: 285px" id="projectTitleTask">
                                            {{ $offer->title }}
                                        </div>
                                    </div>
                                </div>
                                <div class="separator-solid"></div>
                                <p class="card-text text-black-50">{{ $offer->limitDescription() }}</p>
                                <p class="card-text m-0">Бюджет: <b>{{ $offer->amount }}</b> руб. </p>
                                <p class="card-text m-0">Категория: <b>{{ $offer->category->name }}</b></p>
                                <p class="card-text m-0">Срок: <b>{{ $offer->period }}</b> дней. </p>

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

                                    <a href="{{ route('executor.show.task', $offer) }}" class="btn btn-primary btn-rounded"><i class="fal fa-eye"></i> Просмотр</a >

                                    @if($offer->yourSubscribe)
                                        <button data-id="{{ $offer->yourSubscribe->id }}" class="btn btn-danger btn-rounded unsubscribe"> Отозвать отклик</button>
                                    @else
                                        <button data-id="{{ $offer->id }}" class="btn btn-success btn-rounded task">Откликнутся</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        {{ $offers->links() }}
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Подписка на задачу</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    @if(! auth()->user()->sites()->IsActive()->count())
                        <div class="alert alert-danger" role="alert">
                            Извините, у вас нет активированных сайтов, вам необходимо <a href="{{ route('executor.sites.create') }}"><b>добавить</b></a> сайт в систему и дождаться активации.
                        </div>
                    @else
                        <div class="alert alert-info" role="alert">
                            Отлично, вас заинтересовал проект.
                            Укажите пожалуйста из вашего списка сайты на которых вы готовы разместить рекламу данного заказчика.
                        </div>
                    @endif
                        <div class="select2-input select2-warning">
                            <select id="multiple" name="sites[]" class="form-control is-invalid" multiple="multiple">
                                @foreach(auth()->user()->sites()->isActive()->get() as $site)
                                    <option value="{{ $site->url }}">{{ $site->url }}</option>
                                @endforeach
                            </select>
                        </div>

                    <div id="errors"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary subscribe">Добавить</button>
                    <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $('#multiple').select2({
                width: '100%',
                placeholder: "Выберите сайт",
                allowClear: true,
                theme: "bootstrap"
            });
        </script>
    @endpush
@endsection