@extends('layouts.cabinets.customer')

@section('title' , 'Добавить новую задачу')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Добавление задачи</h2>
                    <h5 class="text-white op-7 mb-2">Создайте новую задачу в общий список</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('customer.tasks.store') }}" method="POST">
                            <div class="row">

                                @csrf

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">Название:</label>
                                        <input name="title" id="title" type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Название вашей задачи" value="{{ old('title') }}">
                                        @error('title')
                                          <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="min_sum">Минимальная сумма:</label>
                                        <input name="min_sum" id="min_sum" type="text" class="form-control @error('min_sum') is-invalid @enderror" placeholder="500" value="{{ old('min_sum') }}">
                                        @error('min_sum')
                                          <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="max_sum">Максимальная сумма:</label>
                                        <input name="max_sum" id="max_sum" type="text" class="form-control @error('max_sum') is-invalid @enderror" placeholder="10000" value="{{ old('max_sum') }}">
                                        @error('max_sum')
                                          <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Описание задачи:</label>
                                        <textarea name="description" id="description" type="text" class="form-control @error('description') is-invalid @enderror" placeholder="Введите описание">{{ old('description') }}</textarea>
                                        @error('description')
                                          <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="type_task">Тип задачи:</label>
                                        <select class="form-control @error('type_task') is-invalid @enderror" id="type_task" name="type_task">
                                            <option value="" selected>-- Выберите тип продвигаемого контента</option>
                                            <option value="link_product" {{ old('type_task') == 'link_product' ? 'selected' : ''  }}>Ссылка на продукт</option>
                                            <option value="link_video"   {{ old('type_task') == 'link_video'   ? 'selected' : ''  }}>Ссылка на видео</option>
                                            <option value="page"         {{ old('type_task') == 'page'         ? 'selected' : ''  }}>Страница сайта</option>
                                            <option value="app"          {{ old('type_task') == 'app'          ? 'selected' : ''  }}>Приложение</option>
                                        </select>
                                        @error('type_task')
                                          <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="type_position">Позиция:</label>
                                        <select class="form-control @error('type_position') is-invalid @enderror" id="type_position" name="type_position">
                                            <option value="" selected>-- Выберите позицию в какой части сайта будет ваш контент</option>
                                            <option value="header"  {{ old('type_position') == 'header' ? 'selected' : ''  }}>В хедере</option>
                                            <option value="sidebar" {{ old('type_position') == 'sidebar' ? 'selected' : '' }}>В сайдбаре</option>
                                            <option value="content" {{ old('type_position') == 'content' ? 'selected' : '' }}>В общем контенте</option>
                                            <option value="footer"  {{ old('type_position') == 'footer' ? 'selected' : ''  }}>В футере</option>
                                        </select>
                                        @error('type_position')
                                          <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    @include('__shared.component.categories' , ['categories' => $categories])
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Добавить задание</button>
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