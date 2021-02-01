@extends('layouts.admin')

@section('title' , 'Редактировать задачу')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Редактирование задания - {{ $task->title }}</h2>
                    <h5 class="text-white op-7 mb-2">Редактирование текущего задания, либо исправление, либо блокировка</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="d-flex justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form id="task-form" action="{{ route('admin.tasks.update', $task) }}" method="POST">
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
                                            <option value="1"  {{ old('period') == '1' ? 'selected' : ''  }} {{ $task->period == '1' ? 'selected' : '' }}>1 день</option>
                                            <option value="2"  {{ old('period') == '2' ? 'selected' : ''  }} {{ $task->period == '2' ? 'selected' : '' }}>2 дня</option>
                                            <option value="3"  {{ old('period') == '3' ? 'selected' : ''  }} {{ $task->period == '3' ? 'selected' : '' }}>3 дня</option>
                                            <option value="7"  {{ old('period') == '7' ? 'selected' : ''  }} {{ $task->period == '7' ? 'selected' : '' }}>Неделя</option>
                                            <option value="14" {{ old('period') == '14' ? 'selected' : '' }} {{ $task->period == '14' ? 'selected' : '' }}>2 недели</option>
                                            <option value="30" {{ old('period') == '30' ? 'selected' : '' }} {{ $task->period == '30' ? 'selected' : '' }}>Месяц</option>
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
                                        <label for="site_count">Сайтов:</label>
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
                                        <select class="form-control" id="type_task" name="type_task">
                                            <option value="" selected>-- Выберите тип продвигаемого контента</option>
                                            <option value="link_product" {{ old('type_task') == 'link_product' ? 'selected' : '' }} {{ $task->type_task == 'link_product' ? 'selected' : '' }}>Ссылка на продукт</option>
                                            <option value="link_video"   {{ old('type_task') == 'link_video' ? 'selected' : ''   }} {{ $task->type_task == 'link_video' ? 'selected' : '' }}>Ссылка на видео</option>
                                            <option value="page"         {{ old('type_task') == 'page' ? 'selected' : ''   }}       {{ $task->type_task == 'page' ? 'selected' : '' }}>Страница сайта</option>
                                            <option value="app"          {{ old('type_task') == 'app' ? 'selected' : ''   }}        {{ $task->type_task == 'app' ? 'selected' : '' }}>Приложение</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type_position">Позиция:</label>
                                        <select class="form-control" id="type_position" name="type_position">
                                            <option value="" selected>-- Выберите позицию в какой части сайта будет ваш контент</option>
                                            <option value="header"  {{ $task->type_position == 'header' ? 'selected' : '' }}>В хедере</option>
                                            <option value="sidebar" {{ $task->type_position == 'sidebar' ? 'selected' : '' }}>В сайдбаре</option>
                                            <option value="content" {{ $task->type_position == 'content' ? 'selected' : '' }}>В общем контенте</option>
                                            <option value="footer"  {{ $task->type_position == 'footer' ? 'selected' : '' }}>В футере</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    @include('__shared.component.categories' , ['categories' => $categories, 'current' => $task])
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="status">Статус:</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="" selected>-- Выберите статус</option>
                                            <option value="1" {{ $task->status == 1 ? 'selected' : '' }}>Активен</option>
                                            <option value="0" {{ $task->status == 0 ? 'selected' : '' }}>Не активен</option>
                                        </select>
                                        @error('type_position')
                                          <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" id="add-task" class="btn btn-primary">Обновить</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection