@extends('layouts.admin')

@section('title' , 'Редактирование страницы')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Редактирование - {{ $page->name }}</h2>
                    <h5 class="text-white op-7 mb-2">Редактирование динамической страницы</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card card-body">
                    <form action="{{ route('admin.pages.update', $page) }}" method="POST">
                        @method('PUT')
                        @csrf

                        <div class="form-group">
                            <label for="title">Имя страницы:</label>
                            <input name="title" class="form-control" id="title" placeholder="Введите текст" value="{{ $page->title }}">
                        </div>

                        <div class="form-group">
                            <label for="name">Название страницы:</label>
                            <input name="name" class="form-control" id="name" placeholder="Введите текст" value="{{ $page->name }}">
                        </div>

                        <div class="form-group">
                            <label for="description">Описание страницы:</label>
                            <textarea name="description" class="form-control" id="description" rows="2" placeholder="Введите текст..">{{ $page->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="editor">Контент страницы:</label>
                            <textarea name="content" id="editor" cols="30" rows="10">{{ $page->content }}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary">Обновить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>ClassicEditor
                .create( document.querySelector( '#editor' ), {

                    toolbar: {
                        items: [
                            'heading',
                            '|',
                            'bold',
                            'italic',
                            'link',
                            'alignment',
                            'bulletedList',
                            'numberedList',
                            '|',
                            'fontBackgroundColor',
                            'indent',
                            'outdent',
                            'fontColor',
                            'fontSize',
                            'fontFamily',
                            'removeFormat',
                            'subscript',
                            'superscript',
                            'underline',
                            '|',
                            'horizontalLine',
                            'imageInsert',
                            'imageUpload',
                            'htmlEmbed',
                            'blockQuote',
                            'insertTable',
                            'mediaEmbed',
                            'undo',
                            'redo',
                            'CKFinder'
                        ]
                    },
                    language: 'ru',
                    image: {
                        toolbar: [
                            'imageTextAlternative',
                            'imageStyle:full',
                            'imageStyle:side',
                            'linkImage'
                        ]
                    },
                    table: {
                        contentToolbar: [
                            'tableColumn',
                            'tableRow',
                            'mergeTableCells',
                            'tableCellProperties',
                            'tableProperties'
                        ]
                    },
                    licenseKey: '',

                } )
                .then( editor => {
                    window.editor = editor;








                } )
                .catch( error => {
                    console.error( 'Oops, something went wrong!' );
                    console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
                    console.warn( 'Build id: f8x1dtvm0054-6sitfv8rdkwi' );
                    console.error( error );
                } );
        </script>
    @endpush
@endsection
