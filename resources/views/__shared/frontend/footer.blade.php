<!-- ============================ Footer Start ================================== -->

<footer class="dark-footer skin-dark-footer">
    <div>
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-3">
                    <div class="footer-widget">
                        <img src="assets/img/logo-light.png" class="img-footer" alt="" />
                        <div class="footer-add">
                            <p>Collins Street West, Victoria,</br> Australia (AU4578).</p>
                            <p><strong>Email:</strong></br><a href="#">hello@workstock.com</a></p>
                            <p><strong>Call:</strong></br>91 855 742 62548</p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-2">
                    <div class="footer-widget">
                        <h4 class="widget-title">Navigations</h4>
                        <ul class="footer-menu">
                            <li><a href="#">New Home Design</a></li>
                            <li><a href="#">Browse Candidates</a></li>
                            <li><a href="#">Browse Employers</a></li>
                            <li><a href="#">Advance Search</a></li>
                            <li><a href="#">Job With Map</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-2">
                    <div class="footer-widget">
                        <h4 class="widget-title">Исполнитель</h4>
                        <ul class="footer-menu">
                            <li><a href="{{ route('executor.sites.index') }}">Мои сайты</a></li>
                            <li><a href="{{ route('executor.sites.create') }}">Добавить сайт</a></li>
                            <li><a href="{{ route('executor.offers') }}">Все задания</a></li>
                            <li><a href="{{ route('executor.subs.task') }}">Мои отклики</a></li>
                            <li><a href="#">----</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-2">
                    <div class="footer-widget">
                        <h4 class="widget-title">Заказчик</h4>
                        <ul class="footer-menu">
                            <li><a href="{{ route('customer.tasks.index') }}">Мои задания</a></li>
                            <li><a href="{{ route('customer.tasks.create') }}">Создать задание</a></li>
                            <li><a href="#">Пополнить баланс</a></li>
                            <li><a href="#">Исполнители</a></li>
                            <li><a href="#">Расходы</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 col-md-6">
                    <p class="mb-0">© 2020 {{ env('APP_NAME') }}. All Rights Reserved</p>
                </div>

                <div class="col-lg-6 col-md-6 text-right">
                    <ul class="footer-bottom-social">
                        <li><a href="#"><i class="ti-facebook"></i></a></li>
                        <li><a href="#"><i class="ti-twitter"></i></a></li>
                        <li><a href="#"><i class="ti-instagram"></i></a></li>
                        <li><a href="#"><i class="ti-linkedin"></i></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</footer>
<!-- ============================ Footer End ================================== -->