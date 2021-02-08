@extends('layouts.frontend')

@section('title', $page->title)

@section('description', $page->description)

@section('content')
    <section class="small-page-title-banner" style="background-image:url(assets/img/des-9.jpg);">
        <div class="container">
            <div class="row">
                <div class="tr-list-center">
                    <h2>{{ $page->title }}</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="overlay-top p-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 m-b-40">
                    <!-- Default Style -->
                    <div class="single-page-head head-light style-1 mb-0">
                        <div class="single-page-left">
                            <div class="single-page-info">
                                <h4 class="single-page-title">{{ $page->title }}<span class="text-label-green full-time">информация</span></h4>
                                <ul class="tags-ul">
                                    <li><i class="ti-calendar"></i> {{ $page->created_at->diffForHumans() }}</li>
                                    <li><i class="fa fa-eye"></i> просмотры {{ $page->views }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <!-- Candidate Overview -->
                    <div class="tr-single-box mb-5">
                        <div class="tr-single-header">
                            <h4><i class="ti-info"></i>{{ $page->title }}</h4>
                        </div>
                        <div class="tr-single-body">
                            {!! $page->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection