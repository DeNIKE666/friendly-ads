@extends('layouts.frontend')

@section('title', 'О сервисе')

@section('content')
    <section class="small-page-title-banner" style="background-image:url(assets/img/des-9.jpg);">
        <div class="container">
            <div class="row">
                <div class="tr-list-center">
                    <h2>{{ $about->title }}</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="tr-single-detail gray-bg">
        <div class="container">
            <div class="tr-single-box">
                <div class="tr-single-header">
                    <h4><i class="ti-info"></i> {{ $about->title }}</h4>
                </div>
                <div class="tr-single-body">
                    {!! $about->content !!}
                </div>
            </div>
        </div>
    </section>
@endsection