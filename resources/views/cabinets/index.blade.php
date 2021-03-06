@extends('layouts.cabinet')

@section('title' , 'Личный кабинет пользователя')

@section('content')

    <div class="page-inner">
        @can('customer')
            @include('partials.customer.index_panel')
        @elsecan('executor')
            @include('partials.executor.index_panel')
        @endcan
    </div>
@endsection