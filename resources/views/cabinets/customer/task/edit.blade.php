@extends('layouts.cabinets.customer')

@section('title' , 'Редактировать задание')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Редактирование</h2>
                    <h5 class="text-white op-7 mb-2">Редактирование активного задания</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('customer.tasks.update' , $task) }}" method="POST">
                            <div class="row">

                                @method('PUT')
                                @csrf

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">Название:</label>
                                        <input name="title" id="title" type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Название вашей задачи" value="{{ old('title', $task->title) }}">
                                        @error('title')
                                          <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="period">Период:</label>
                                        <select class="form-control @error('period') is-invalid @enderror" id="period" name="period">
                                            <option value="" selected>-- Выберите период размещения</option>
                                            <option value="1"  {{ old('period') == '1' ? 'selected' : ''  }}  {{ $task->period == '1' ? 'selected' : '' }}>1 день</option>
                                            <option value="2"  {{ old('period') == '2' ? 'selected' : ''  }}  {{ $task->period == '2' ? 'selected' : '' }}>2 дня</option>
                                            <option value="3"  {{ old('period') == '3' ? 'selected' : ''  }}  {{ $task->period == '3' ? 'selected' : '' }}>3 дня</option>
                                            <option value="7"  {{ old('period') == '7' ? 'selected' : ''  }}  {{ $task->period == '7' ? 'selected' : '' }}>Неделя</option>
                                            <option value="14" {{ old('period') == '14' ? 'selected' : '' }}  {{ $task->period == '14' ? 'selected' : '' }}>2 недели</option>
                                            <option value="30" {{ old('period') == '30' ? 'selected' : '' }}  {{ $task->period == '30' ? 'selected' : '' }}>Месяц</option>
                                        </select>
                                        @error('period')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="amount">Бюджет:</label>
                                        <input name="amount" id="amount" type="text" class="form-control @error('amount') is-invalid @enderror" placeholder="10000" value="{{ old('amount', $task->amount) }}">
                                        @error('amount')
                                          <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="site_count">Сколько сайтов необходимо:</label>
                                        <input name="site_count" id="site_count" type="text" class="form-control @error('site_count') is-invalid @enderror" placeholder="10" value="{{ old('site_count', $task->site_count) }}">
                                        @error('site_count')
                                          <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Описание задачи:</label>
                                        <textarea name="description" id="description" type="text" class="form-control @error('description') is-invalid @enderror" placeholder="Введите описание">{{ old('description', $task->description) }}</textarea>
                                        @error('description')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type_task">Тип задачи:</label>
                                        <select class="form-control @error('type_task') is-invalid @enderror" id="type_task" name="type_task">
                                            <option value="" selected>-- Выберите тип продвигаемого контента</option>
                                            <option value="link_product" {{ old('type_task') == 'link_product' ? 'selected' : ''  }} {{ $task->type_task == 'link_product' ? 'selected' : '' }}>Ссылка на продукт</option>
                                            <option value="link_video"   {{ old('type_task') == 'link_video'   ? 'selected' : ''  }} {{ $task->type_task == 'link_video' ? 'selected' : '' }}>Ссылка на видео</option>
                                            <option value="page"         {{ old('type_task') == 'page'         ? 'selected' : ''  }} {{ $task->type_task == 'page' ? 'selected' : '' }}>Страница сайта</option>
                                            <option value="app"          {{ old('type_task') == 'app'          ? 'selected' : ''  }} {{ $task->type_task == 'app' ? 'selected' : '' }}>Приложение</option>
                                        </select>
                                        @error('type_task')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type_position">Позиция:</label>
                                        <select class="form-control @error('type_position') is-invalid @enderror" id="type_position" name="type_position">
                                            <option value="" selected>-- Выберите позицию в какой части сайта будет ваш контент</option>
                                            <option value="header"  {{ old('type_position') == 'header' ? 'selected' : ''  }} {{ $task->type_position == 'header' ? 'selected' : '' }}>В хедере</option>
                                            <option value="sidebar" {{ old('type_position') == 'sidebar' ? 'selected' : '' }} {{ $task->type_position == 'sidebar' ? 'selected' : '' }}>В сайдбаре</option>
                                            <option value="content" {{ old('type_position') == 'content' ? 'selected' : '' }} {{ $task->type_position == 'content' ? 'selected' : '' }}>В общем контенте</option>
                                            <option value="footer"  {{ old('type_position') == 'footer' ? 'selected' : ''  }} {{ $task->type_position == 'footer' ? 'selected' : '' }}>В футере</option>
                                        </select>
                                        @error('type_position')
                                          <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    @include('__shared.component.categories' , ['categories' => $categories , 'current' => $task])
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Обновить</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function () {

                let data = {
                    price: 0,
                    period: 0
                }

                let amount    = $('#amount');
                let period    = $('#period');
                let siteCount = $('#site_count');

                amount.change(function () {
                    data.price = $(this).val();
                })

                amount.keyup(function () {
                    data.price  = parseInt($(this).val());
                    data.period = parseInt(period.val());
                    setCalc();
                })

                function setCalc() {
                    let days = 0;
                    if (data.period < 3)
                        days = 0;
                    if (data.period === 3)
                        days = 150;
                    else if (data.period === 7)
                        days = 300
                    else if (data.period === 14)
                        days = 450
                    else if (data.period === 30)
                        days = 850

                    if (data.period > data.price) return;

                    let siteSum = 0;
                    if (siteCount.val() > 5)
                        siteSum = 350;
                    else if (data.period > 10)
                        siteSum = 900


                    let final = (data.price - siteSum - days) / 250;

                    console.log(final)

                    let siteCount_int = parseFloat(final).toFixed(0)

                    if (siteCount_int > 0)
                        siteCount.val(parseFloat(siteCount_int).toFixed(0))
                }


            })
        </script>
    @endpush
@endsection