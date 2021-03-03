@extends('layouts.cabinet')

@section('title' , 'Пополнение баланса')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Пополнение</h2>
                    <h5 class="text-white op-7 mb-2">Пополнить баланс через платёжную систему</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="card card-body full-height">
            <form action="{{ route('add-balance') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="amount">Сумма:</label>
                    <input type="text" class="form-control input-square @error('amount') is-invalid @enderror" id="amount" name="amount" placeholder="Введите сумму" value="{{ old('amount') }}">
                    @error('amount')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-round btn-sm">Пополнить</button>
                </div>
            </form>
        </div>
    </div>
@endsection