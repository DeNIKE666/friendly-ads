@extends('layouts.admin')

@section('title' , 'Добавить пользователя')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Создание задания</h2>
                    <h5 class="text-white op-7 mb-2">Добавить задание в систему</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="card">
            <div class="card-body">
                <form action="" method="POST">

                    @csrf

                    <div class="form-group">
                        <label for="name">Название:</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Введите название задания" value="{{ old('name') }}">
                        @error('name')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="email">Категория: </label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Введите Email адрес пользователя" value="{{ old('email') }}">
                        @error('email')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="username">Бюджет: </label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Выделяемый бюджет на продвижение контента" value="{{ old('price') }}">
                        @error('price')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Создать задание</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
