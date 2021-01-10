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

                    <div class="form-group">
                        <label for="parent_id" class="col-form-label">Выбрать родительскую категорию:</label>
                        <select id="parent_id" class="form-control{{ $errors->has('parent_id') ? ' is-invalid' : '' }}" name="parent_id">
                            <option value=""></option>
                            @foreach ($categories as $parent)
                                <option value="{{ $parent->id }}"{{ $parent->id == old('parent_id') ? ' selected' : '' }}>
                                    @for ($i = 0; $i < $parent->depth; $i++) &mdash; @endfor
                                    {{ $parent->name }}
                                </option>
                            @endforeach;
                        </select>
                        @if ($errors->has('parent_id'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('parent_id') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">СОЗДАТЬ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
