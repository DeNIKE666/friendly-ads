@extends('layouts.admin')

@section('title' , 'Создание страницы')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Создать страницу</h2>
                    <h5 class="text-white op-7 mb-2">Создание страницы для какой либо информации на сайте</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card card-body">
                    <form action="{{ route('admin.pages.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="title">Название страницы:</label>
                            <input name="title" class="form-control" id="title" placeholder="Введите текст">
                        </div>

                        <div class="form-group">
                            <label for="name">Имя страницы:</label>
                            <input name="name" class="form-control" id="name" placeholder="Введите текст">
                        </div>

                        <div class="form-group">
                            <label for="description">Описание страницы:</label>
                            <textarea name="description" class="form-control" id="description" rows="2" placeholder="Введите текст.."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="editor">Контент страницы:</label>
                            <textarea name="content" id="editor" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
    @endpush
@endsection
