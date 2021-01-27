@extends('layouts.cabinet')

@section('title' , 'Добавление нового сайта')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Сайты</h2>
                    <h5 class="text-white op-7 mb-2">Добавление нового сайта</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('executor.sites.store') }}" method="POST">

                    @csrf

                    <div class="form-group">
                        <label for="title">Название сайта: </label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title') }}">
                        @error('title')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="url">Ссылка на сайт: </label>
                        <input type="text" name="url" class="form-control @error('url') is-invalid @enderror" id="url" value="{{ old('url') }}">
                        @error('url')
                          <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="short">Описание вашего сайта: </label>
                        <textarea name="short" class="form-control @error('short') is-invalid @enderror" id="short" rows="3" placeholder="Введите описание минимум 150 символов максимум 300">{{ old('short') }}</textarea>
                        @error('short')
                          <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    @include('__shared.component.categories', compact('categories'))

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection