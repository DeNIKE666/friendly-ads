@extends('layouts.frontend')

@section('title', 'Главная страница')

@section('content')
    <!-- ============================ Job Featured End ================================== -->
    <section class="min-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <!-- Nav tabs -->
                    <div class="d-block">
                        <ul class="nav nav-tabs nav-advance bg-info" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#recent" role="tab">Дорогие задания</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#featured" role="tab">Средняя цена</a>
                            </li>
                        </ul>
                        <!-- Nav tabs -->
                    </div>

                    <div class="tab-content">

                        <!-- Recent Jobs -->
                        <div class="tab-pane fade in show active" id="recent" role="tabpanel">
                            <div class="row">

                                <!-- Single job -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="job-middle-grid">
                                        <div class="jmg-save">
                                            <a href="#" class="jmg-save"><i class="ti-bookmark"></i></a>
                                        </div>
                                        <div class="jmg-left">
                                            <div class="jmg-cmp-thumb">
                                                <a href="job-detail.html"><img src="assets/img/google.png" alt="" /></a>
                                            </div>
                                            <div class="jmg-post-date">
                                                <span>4 days ago</span>
                                            </div>
                                        </div>

                                        <div class="jmg-right">
                                            <h4 class="jmg-title"><a href="job-detail.html">Product Designer</a></h4>
                                            <div class="jmg-right-caption">

                                                <div class="jmg-right-caption-text">
                                                    <h4 class="jmg-company-title"><a href="job-detail.html">Product Designer</a></h4>
                                                    Greewood city, Canada<br>
                                                    Computer Solution
                                                </div>

                                                <div class="jmg-right-caption-text">
                                                    <ul>
                                                        <li><span>Designation:</span>UI/UX Designer</li>
                                                        <li><span>Job Type:</span>Full Time</li>
                                                        <li><span>Sallery:</span>$12000 - $15000 annually</li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="jmg-skills">
                                                <span class="skl-6">Web Design</span><span class="skl-2">Wordpress</span><span class="skl-3">Photoshop</span><span class="skl-5">3 more</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- Single job -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="job-middle-grid">
                                        <div class="jmg-save">
                                            <a href="#" class="jmg-save"><i class="ti-bookmark"></i></a>
                                        </div>
                                        <div class="jmg-left">
                                            <div class="jmg-cmp-thumb">
                                                <a href="job-detail.html"><img src="assets/img/asana.png" alt="" /></a>
                                            </div>
                                            <div class="jmg-post-date">
                                                <span>4 days ago</span>
                                            </div>
                                        </div>

                                        <div class="jmg-right">
                                            <h4 class="jmg-title"><a href="job-detail.html">Drupal Developer</a></h4>
                                            <div class="jmg-right-caption">

                                                <div class="jmg-right-caption-text">
                                                    <h4 class="jmg-company-title"><a href="job-detail.html">Drupal Developer</a></h4>
                                                    Greewood city, Canada<br>
                                                    Asana Solution
                                                </div>

                                                <div class="jmg-right-caption-text">
                                                    <ul>
                                                        <li><span>Designation:</span>Drupal Developer</li>
                                                        <li><span>Job Type:</span>Internship</li>
                                                        <li><span>Sallery:</span>$18000 - $2000 annually</li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="jmg-skills">
                                                <span class="skl-6">Web Design</span><span class="skl-2">Wordpress</span><span class="skl-3">Photoshop</span><span class="skl-5">3 more</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- Single job -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="job-middle-grid">
                                        <div class="jmg-save">
                                            <a href="#" class="jmg-save"><i class="ti-bookmark"></i></a>
                                        </div>
                                        <div class="jmg-left">
                                            <div class="jmg-cmp-thumb">
                                                <a href="job-detail.html"><img src="assets/img/adwords.png" alt="" /></a>
                                            </div>
                                            <div class="jmg-post-date">
                                                <span>4 days ago</span>
                                            </div>
                                        </div>

                                        <div class="jmg-right">
                                            <h4 class="jmg-title"><a href="job-detail.html">Logo Designer</a></h4>
                                            <div class="jmg-right-caption">

                                                <div class="jmg-right-caption-text">
                                                    <h4 class="jmg-company-title"><a href="job-detail.html">Logo Designer</a></h4>
                                                    Greewood city, Canada<br>
                                                    Logo Studio
                                                </div>

                                                <div class="jmg-right-caption-text">
                                                    <ul>
                                                        <li><span>Designation:</span>Logo Designer</li>
                                                        <li><span>Job Type:</span>Part Time</li>
                                                        <li><span>Sallery:</span>$18000 - $2200 annually</li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="jmg-skills">
                                                <span class="skl-6">Web Design</span><span class="skl-2">Wordpress</span><span class="skl-3">Photoshop</span><span class="skl-5">3 more</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- Single job -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="job-middle-grid">
                                        <div class="jmg-save">
                                            <a href="#" class="jmg-save"><i class="ti-bookmark"></i></a>
                                        </div>
                                        <div class="jmg-left">
                                            <div class="jmg-cmp-thumb">
                                                <a href="job-detail.html"><img src="assets/img/drive.png" alt="" /></a>
                                            </div>
                                            <div class="jmg-post-date">
                                                <span>4 days ago</span>
                                            </div>
                                        </div>

                                        <div class="jmg-right">
                                            <h4 class="jmg-title"><a href="job-detail.html">Magento Developer</a></h4>
                                            <div class="jmg-right-caption">

                                                <div class="jmg-right-caption-text">
                                                    <h4 class="jmg-company-title"><a href="job-detail.html">Magento Developer</a></h4>
                                                    Greewood city, Canada<br>
                                                    Maga Solution
                                                </div>

                                                <div class="jmg-right-caption-text">
                                                    <ul>
                                                        <li><span>Designation:</span>Magento Developer</li>
                                                        <li><span>Job Type:</span>Contract</li>
                                                        <li><span>Sallery:</span>$15000 - $18000 annually</li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="jmg-skills">
                                                <span class="skl-6">Web Design</span><span class="skl-2">Wordpress</span><span class="skl-3">Photoshop</span><span class="skl-5">3 more</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- Single job -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="job-middle-grid">
                                        <div class="jmg-save">
                                            <a href="#" class="jmg-save"><i class="ti-bookmark"></i></a>
                                        </div>
                                        <div class="jmg-left">
                                            <div class="jmg-cmp-thumb">
                                                <a href="job-detail.html"><img src="assets/img/safari.png" alt="" /></a>
                                            </div>
                                            <div class="jmg-post-date">
                                                <span>4 days ago</span>
                                            </div>
                                        </div>

                                        <div class="jmg-right">
                                            <h4 class="jmg-title"><a href="job-detail.html">WordPress Developer</a></h4>
                                            <div class="jmg-right-caption">

                                                <div class="jmg-right-caption-text">
                                                    <h4 class="jmg-company-title"><a href="job-detail.html">WordPress Developer</a></h4>
                                                    Greewood city, Canada<br>
                                                    safari Inc
                                                </div>

                                                <div class="jmg-right-caption-text">
                                                    <ul>
                                                        <li><span>Designation:</span>WordPress Developer</li>
                                                        <li><span>Job Type:</span>Full Time</li>
                                                        <li><span>Sallery:</span>$20000 - $2200 annually</li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="jmg-skills">
                                                <span class="skl-6">Web Design</span><span class="skl-2">Wordpress</span><span class="skl-3">Photoshop</span><span class="skl-5">3 more</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- Single job -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="job-middle-grid">
                                        <div class="jmg-save">
                                            <a href="#" class="jmg-save"><i class="ti-bookmark"></i></a>
                                        </div>
                                        <div class="jmg-left">
                                            <div class="jmg-cmp-thumb">
                                                <a href="job-detail.html"><img src="assets/img/photos.png" alt="" /></a>
                                            </div>
                                            <div class="jmg-post-date">
                                                <span>4 days ago</span>
                                            </div>
                                        </div>

                                        <div class="jmg-right">
                                            <h4 class="jmg-title"><a href="job-detail.html">UI/UX Developer</a></h4>
                                            <div class="jmg-right-caption">

                                                <div class="jmg-right-caption-text">
                                                    <h4 class="jmg-company-title"><a href="job-detail.html">UI/UX Developer</a></h4>
                                                    Greewood city, Canada<br>
                                                    Photopic Ltd
                                                </div>

                                                <div class="jmg-right-caption-text">
                                                    <ul>
                                                        <li><span>Designation:</span>UI/UX Developer</li>
                                                        <li><span>Job Type:</span>Part Time</li>
                                                        <li><span>Sallery:</span>$14000 - $17000 annually</li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="jmg-skills">
                                                <span class="skl-6">Web Design</span><span class="skl-2">Wordpress</span><span class="skl-3">Photoshop</span><span class="skl-5">3 more</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- featured Jobs -->
                        <div class="tab-pane fade" id="featured" role="tabpanel">
                            <div class="row">

                                <!-- Single job -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="job-middle-grid">
                                        <div class="jmg-save">
                                            <a href="#" class="jmg-save"><i class="ti-bookmark"></i></a>
                                        </div>
                                        <div class="jmg-left">
                                            <div class="jmg-cmp-thumb">
                                                <a href="job-detail.html"><img src="assets/img/photos.png" alt="" /></a>
                                            </div>
                                            <div class="jmg-post-date">
                                                <span>4 days ago</span>
                                            </div>
                                        </div>

                                        <div class="jmg-right">
                                            <h4 class="jmg-title"><a href="job-detail.html">UI/UX Developer</a></h4>
                                            <div class="jmg-right-caption">

                                                <div class="jmg-right-caption-text">
                                                    <h4 class="jmg-company-title"><a href="job-detail.html">UI/UX Developer</a></h4>
                                                    Greewood city, Canada<br>
                                                    Photopic Ltd
                                                </div>

                                                <div class="jmg-right-caption-text">
                                                    <ul>
                                                        <li><span>Designation:</span>UI/UX Developer</li>
                                                        <li><span>Job Type:</span>Part Time</li>
                                                        <li><span>Sallery:</span>$14000 - $17000 annually</li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="jmg-skills">
                                                <span class="skl-6">Web Design</span><span class="skl-2">Wordpress</span><span class="skl-3">Photoshop</span><span class="skl-5">3 more</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- Single job -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="job-middle-grid">
                                        <div class="jmg-save">
                                            <a href="#" class="jmg-save"><i class="ti-bookmark"></i></a>
                                        </div>
                                        <div class="jmg-left">
                                            <div class="jmg-cmp-thumb">
                                                <a href="job-detail.html"><img src="assets/img/safari.png" alt="" /></a>
                                            </div>
                                            <div class="jmg-post-date">
                                                <span>4 days ago</span>
                                            </div>
                                        </div>

                                        <div class="jmg-right">
                                            <h4 class="jmg-title"><a href="job-detail.html">WordPress Developer</a></h4>
                                            <div class="jmg-right-caption">

                                                <div class="jmg-right-caption-text">
                                                    <h4 class="jmg-company-title"><a href="job-detail.html">WordPress Developer</a></h4>
                                                    Greewood city, Canada<br>
                                                    safari Inc
                                                </div>

                                                <div class="jmg-right-caption-text">
                                                    <ul>
                                                        <li><span>Designation:</span>WordPress Developer</li>
                                                        <li><span>Job Type:</span>Full Time</li>
                                                        <li><span>Sallery:</span>$20000 - $2200 annually</li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="jmg-skills">
                                                <span class="skl-6">Web Design</span><span class="skl-2">Wordpress</span><span class="skl-3">Photoshop</span><span class="skl-5">3 more</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- Single job -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="job-middle-grid">
                                        <div class="jmg-save">
                                            <a href="#" class="jmg-save"><i class="ti-bookmark"></i></a>
                                        </div>
                                        <div class="jmg-left">
                                            <div class="jmg-cmp-thumb">
                                                <a href="job-detail.html"><img src="assets/img/drive.png" alt="" /></a>
                                            </div>
                                            <div class="jmg-post-date">
                                                <span>4 days ago</span>
                                            </div>
                                        </div>

                                        <div class="jmg-right">
                                            <h4 class="jmg-title"><a href="job-detail.html">Magento Developer</a></h4>
                                            <div class="jmg-right-caption">

                                                <div class="jmg-right-caption-text">
                                                    <h4 class="jmg-company-title"><a href="job-detail.html">Magento Developer</a></h4>
                                                    Greewood city, Canada<br>
                                                    Maga Solution
                                                </div>

                                                <div class="jmg-right-caption-text">
                                                    <ul>
                                                        <li><span>Designation:</span>Magento Developer</li>
                                                        <li><span>Job Type:</span>Contract</li>
                                                        <li><span>Sallery:</span>$15000 - $18000 annually</li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="jmg-skills">
                                                <span class="skl-6">Web Design</span><span class="skl-2">Wordpress</span><span class="skl-3">Photoshop</span><span class="skl-5">3 more</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- Single job -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="job-middle-grid">
                                        <div class="jmg-save">
                                            <a href="#" class="jmg-save"><i class="ti-bookmark"></i></a>
                                        </div>
                                        <div class="jmg-left">
                                            <div class="jmg-cmp-thumb">
                                                <a href="job-detail.html"><img src="assets/img/adwords.png" alt="" /></a>
                                            </div>
                                            <div class="jmg-post-date">
                                                <span>4 days ago</span>
                                            </div>
                                        </div>

                                        <div class="jmg-right">
                                            <h4 class="jmg-title"><a href="job-detail.html">Logo Designer</a></h4>
                                            <div class="jmg-right-caption">

                                                <div class="jmg-right-caption-text">
                                                    <h4 class="jmg-company-title"><a href="job-detail.html">Logo Designer</a></h4>
                                                    Greewood city, Canada<br>
                                                    Logo Studio
                                                </div>

                                                <div class="jmg-right-caption-text">
                                                    <ul>
                                                        <li><span>Designation:</span>Logo Designer</li>
                                                        <li><span>Job Type:</span>Part Time</li>
                                                        <li><span>Sallery:</span>$18000 - $2200 annually</li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="jmg-skills">
                                                <span class="skl-6">Web Design</span><span class="skl-2">Wordpress</span><span class="skl-3">Photoshop</span><span class="skl-5">3 more</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- Single job -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="job-middle-grid">
                                        <div class="jmg-save">
                                            <a href="#" class="jmg-save"><i class="ti-bookmark"></i></a>
                                        </div>
                                        <div class="jmg-left">
                                            <div class="jmg-cmp-thumb">
                                                <a href="job-detail.html"><img src="assets/img/asana.png" alt="" /></a>
                                            </div>
                                            <div class="jmg-post-date">
                                                <span>4 days ago</span>
                                            </div>
                                        </div>

                                        <div class="jmg-right">
                                            <h4 class="jmg-title"><a href="job-detail.html">Drupal Developer</a></h4>
                                            <div class="jmg-right-caption">

                                                <div class="jmg-right-caption-text">
                                                    <h4 class="jmg-company-title"><a href="job-detail.html">Drupal Developer</a></h4>
                                                    Greewood city, Canada<br>
                                                    Asana Solution
                                                </div>

                                                <div class="jmg-right-caption-text">
                                                    <ul>
                                                        <li><span>Designation:</span>Drupal Developer</li>
                                                        <li><span>Job Type:</span>Internship</li>
                                                        <li><span>Sallery:</span>$18000 - $2000 annually</li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="jmg-skills">
                                                <span class="skl-6">Web Design</span><span class="skl-2">Wordpress</span><span class="skl-3">Photoshop</span><span class="skl-5">3 more</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <!-- Single job -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="job-middle-grid">
                                        <div class="jmg-save">
                                            <a href="#" class="jmg-save"><i class="ti-bookmark"></i></a>
                                        </div>
                                        <div class="jmg-left">
                                            <div class="jmg-cmp-thumb">
                                                <a href="job-detail.html"><img src="assets/img/google.png" alt="" /></a>
                                            </div>
                                            <div class="jmg-post-date">
                                                <span>4 days ago</span>
                                            </div>
                                        </div>

                                        <div class="jmg-right">
                                            <h4 class="jmg-title"><a href="job-detail.html">Product Designer</a></h4>
                                            <div class="jmg-right-caption">

                                                <div class="jmg-right-caption-text">
                                                    <h4 class="jmg-company-title"><a href="job-detail.html">Product Designer</a></h4>
                                                    Greewood city, Canada<br>
                                                    Computer Solution
                                                </div>

                                                <div class="jmg-right-caption-text">
                                                    <ul>
                                                        <li><span>Designation:</span>UI/UX Designer</li>
                                                        <li><span>Job Type:</span>Full Time</li>
                                                        <li><span>Sallery:</span>$12000 - $15000 annually</li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="jmg-skills">
                                                <span class="skl-6">Web Design</span><span class="skl-2">Wordpress</span><span class="skl-3">Photoshop</span><span class="skl-5">3 more</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Job Featured End ================================== -->

    <!-- ============================ Step How To Use Start ================================== -->
    <section class="min-sec">
        <div class="container">

            <div class="row">
                <div class="col text-center">
                    <div class="sec-heading mx-auto">
                        <p>Процесс заказа</p>
                        <h2>Продвижение контента</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="middle-icon-features">
                        <div class="middle-icon-features-item">
                            <div class="middle-icon-large-features-box m-b-30">
                                <img src="{{ asset('images/frontend/steps/3.png') }}" alt="">
                            </div>
                            <div class="middle-icon-features-content">
                                <h4>Регистрация</h4>
                                <p>Зарегистрируйтесь, <b><a href="{{ route('login') }}">войдите в кабинет</a></b></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="middle-icon-features">
                        <div class="middle-icon-features-item">
                            <div class="middle-icon-large-features-box m-b-30">
                                <img src="{{ asset('images/frontend/steps/2.png') }}" alt="">
                            </div>
                            <div class="middle-icon-features-content">
                                <h4>Задание</h4>
                                <p>Создайте  <b><a class="font-weight-bold" href="{{ route('login') }}">заказ</a></b> в личном кабинете под ваши нужны</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="middle-icon-features">
                        <div class="middle-icon-features-item">
                            <div class="middle-icon-large-features-box m-b-30">
                                <img src="{{ asset('images/frontend/steps/1.png') }}" alt="">
                            </div>
                            <div class="middle-icon-features-content">
                                <h4>Получите отклики</h4>
                                <p>Получите отклики исполнителей на ваш заказ</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="middle-icon-features">
                        <div class="middle-icon-features-item">
                            <div class="middle-icon-large-features-box m-b-30">
                                <img src="{{ asset('images/frontend/steps/4.png') }}" alt="">
                            </div>
                            <div class="middle-icon-features-content">
                                <h4>Исполнение</h4>
                                <p>Как соберете нужные отклики, оплатите заказ</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <div class="clearfix"></div>
    <!-- ============================ Step How To Use End ================================== -->

    <!-- ============================ Counter Facts  Start================================== -->
    <section class="image-bg text-center" style="background:#00a94f url(assets/img/bg2.png);" data-overlay="0">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-3 col-sm-6 b-r">
                    <div class="count-facts">
                        <h4>2120</h4>
                        <span>Jobs Posted</span>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 b-r">
                    <div class="count-facts">
                        <h4>3117</h4>
                        <span>Jobs Filled</span>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 b-r">
                    <div class="count-facts">
                        <h4>872</h4>
                        <span>Companies</span>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="count-facts">
                        <h4>3740</h4>
                        <span>Freelancer</span>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ============================ Counter Facts End ================================== -->
@endsection