@extends('layouts.cabinet')

@section('title' , 'История пополнений')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Истрория</h2>
                    <h5 class="text-white op-7 mb-2">Ваша история пополнений средств</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="card card-body full-height">
            <table>
                <thead>
                <tr>
                    <th scope="col">Наименование</th>
                    <th scope="col">Сумма</th>
                    <th scope="col">Платёжная система</th>
                    <th scope="col">Статус</th>
                </tr>
                </thead>
                <tbody>

                @forelse($histories as $history)
                    <tr>
                        <td data-label="Наименование">{{ $history->title }}</td>
                        <td data-label="Сумма">{{ $history->amount }} руб.</td>
                        <td data-label="Платёжная система">{{ $history->pay_system }}</td>
                        <td data-label="Статус">
                            @if($history->status)
                                <span class="badge badge-success">Оплачен</span>
                            @else
                                <span class="badge badge-warning">Не оплачен</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center p-10">
                            На данный момент история пуста
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection