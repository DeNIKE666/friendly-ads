@extends('layouts.admin')

@section('title' , 'Создать категорию')

@section('content')
    <div class="page-inner">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Имя категории:</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                          <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    @include('__shared.component.categories', compact('categories'))

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">СОЗДАТЬ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
